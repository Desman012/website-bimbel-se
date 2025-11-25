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
            'created_at'
        ];

        $totalData = Registrations::count();
        $totalFiltered = $totalData;

        $limit  = intval($request->input('length', 10));
        $start  = intval($request->input('start', 0));
        $orderColumnIndex = intval($request->input('order.0.column', 0));
        $orderColumn = $columns[$orderColumnIndex] ?? 'id';
        $orderDir = $request->input('order.0.dir', 'desc');
        $search = $request->input('search.value');

        $query = Registrations::with(['level', 'class'])
            ->select('registrations.*')
            ->selectRaw("
            CASE 
                WHEN status = 'pending' THEN 1
                WHEN status = 'verified' THEN 2
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
        $reg->status = 'ditolak';
        $reg->save();

        // Kirim email penolakan
        Mail::to($email)->send(new \App\Mail\StudentRejectedMail($request->reason, $reg));

        return response()->json([
            'success' => true,
            'message' => 'Pendaftaran berhasil ditolak dan email telah dikirim.'
        ]);
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
