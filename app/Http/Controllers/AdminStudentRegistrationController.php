<?php

namespace App\Http\Controllers;

use App\Models\Registrations;
use Illuminate\Http\Request;
use App\Notifications\StudentRejectedNotification;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use App\Mail\StudentRejectedMail;
use Illuminate\Support\Facades\Validator;
use App\Models\Students;
use App\Mail\StudentVerifiedMail;
use App\Models\Payment;
use App\Models\ScheduleStudentRegistrations;
use App\Models\StudentSchedule;

class AdminStudentRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Registrations::all();
        return view('admins.registrations', compact('data'));
    }

    // Server-side DataTables AJAX
    public function getData(Request $request)
    {
        $columns = [
            'id',
            'full_name',
            'student_email',
            'phone_number',
            'levels_id',
            'class_id',
            'status',
            'status_order', // tambahkan
        ];

        $totalData = Registrations::count();
        $totalFiltered = $totalData;

        $limit  = intval($request->input('length', 10));
        $start  = intval($request->input('start', 0));
        $orderColumnIndex = intval($request->input('order.0.column', 0));
        $orderColumn = $columns[$orderColumnIndex] ?? 'id';
        $orderDir = $request->input('order.0.dir', 'desc');
        $search = $request->input('search.value');

        $query = Registrations::with(['level'])
            ->select('registrations.*')
            ->selectRaw("
            CASE 
                WHEN status = 'pending' THEN 1
                WHEN status = 'active' THEN 2
                WHEN status = 'ditolak' THEN 3
                ELSE 4
            END AS status_order
        ");

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('full_name', 'LIKE', "%{$search}%")
                    ->orWhere('student_email', 'LIKE', "%{$search}%")
                    ->orWhere('phone_number', 'LIKE', "%{$search}%");
            });

            $totalFiltered = $query->count();
        }

        $students = $query->orderBy($orderColumn, $orderDir)
            ->skip($start)
            ->take($limit)
            ->get();

        $data = [];
        foreach ($students as $index => $student) {
            $data[] = [
                'no' => $start + $index + 1,  // nomor urut
                'id' => $student->id,
                'full_name' => $student->full_name,
                'student_email' => $student->student_email,
                'phone_number' => $student->phone_number,
                'address' => $student->address,
                'parent_name' => $student->parent_name,
                'parent_email' => $student->parent_email,
                'parent_phone' => $student->parent_phone,
                'level_name' => $student->level->name_level ?? '-',
                'class_name' => $student->class->name_class ?? '-',
                'programs_id' => $student->programs_id,
                'curriculum_id' => $student->curriculum_id,
                'month' => $student->month,
                'amount_paid' => $student->amount_paid,
                'payment_proof' => $student->payment_proof
                    ? asset('storage/' . $student->payment_proof)
                    : null,
                'status' => $student->status,
                'status_order' => $student->status_order,
            ];
        }

        return response()->json([
            "draw"            => intval($request->input('draw', 1)),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data
        ]);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function reject(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:registrations,id',
            'reason' => 'required|string',
        ]);

        $reg = Registrations::find($request->id);

        if (!$reg) {
            return response()->json([
                'success' => false,
                'message' => 'Data pendaftar tidak ditemukan.'
            ], 404);
        }

        // Ambil email dari field yang benar
        $email = $reg->student_email;

        // Update status
        $reg->reason = $request->reason;
        $reg->status = 'ditolak';
        $reg->save();

        // Kirim email penolakan
        Mail::to($email)->send(new StudentRejectedMail($request->reason, $reg));

        return response()->json([
            'success' => true,
            'message' => 'Pendaftaran berhasil ditolak dan email telah dikirim.'
        ]);
    }


    public function verify(Request $request)
    {
        try {
            // $request->validate([
            //     'id' => 'required|integer',
            //     'email' => 'required|email'
            // ]);

            $reg = Registrations::find($request->id);

            //     if (!$reg) {
            //         return response()->json(['success' => false, 'message' => 'Pendaftar tidak ditemukan']);
            //     }

            $adminId = auth()->id();
            // Pindahkan data ke tabel siswa
            $student = Students::create([
                'role_id' => 2,
                'full_name' => $reg->full_name,
                'address' => $reg->address,
                'phone_number' => $reg->phone_number,
                'student_email' => $reg->student_email,
                'password' => $reg->password, // password dipindah apa adanya
                'parent_name' => $reg->parent_name,
                'parent_email' => $reg->parent_email,
                'parent_phone' => $reg->parent_phone,
                'levels_id' => (int)$reg->levels_id,
                'class_id' => $reg->class_id,
                'programs_id' => (int)$reg->programs_id,
                'curriculum_id' => (int)$reg->curriculum_id,
                'status' => 'active'
            ]);


            $schedule = ScheduleStudentRegistrations::where('registration_id', $reg->id)->get();

            // return response()->json([
            //     'success' => true,
            //     'schedule' => $schedule
            // ]);
            foreach ($schedule as $item) {
                StudentSchedule::create([
                    'student_id' => $student->id, // id siswa baru
                    'day_id' => $item->day_id,
                    'time_id' => $item->time_id,
                ]);
            }
            $payment = Payment::create([
                'student_id' => $student->id,
                'admin_id' => $adminId, // atau admin yang memverifikasi
                'month' => $reg->month,
                'amount_paid' => $reg->amount_paid,
                'payment_proof' => $reg->payment_proof,
                'status' => 'verified',
            ]);


            // Update status registrasi
            $reg->update([
                'status' => 'active'
            ]);

            try {
                Mail::to($reg->student_email)->send(new StudentVerifiedMail($student));
            } catch (\Exception $e) {
                // jangan sampai error mail menggagalkan seluruh proses
            }

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $student = Registrations::with(['level', 'class'])->findOrFail($id);
        return response()->json([
            'id' => $student->id,
            'full_name' => $student->full_name,
            'student_email' => $student->student_email,
            'phone_number' => $student->phone_number,
            'address' => $student->address,
            'parent_name' => $student->parent_name,
            'parent_email' => $student->parent_email,
            'parent_phone' => $student->parent_phone,
            'level_name' => $student->level->name_level ?? '-',
            'class_name' => $student->class->name_class ?? '-',
            'programs_id' => $student->programs_id,
            'curriculum_id' => $student->curriculum_id,
            'month' => $student->month,
            'amount_paid' => $student->amount_paid,
            'payment_proof' => $student->payment_proof ? asset('storage/' . $student->payment_proof) : null,
            'status' => $student->status,
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
