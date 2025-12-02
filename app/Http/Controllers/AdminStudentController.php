<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;
use App\Models\Payment;
use App\Models\Absents;
use App\Models\Levels;
use App\Exports\PaymentExport;
use App\Exports\AttendanceExport30Days;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\StudentsExport;
use App\Imports\StudentsImport;

class AdminStudentController extends Controller
{
    public function index()
    {
        $students = Students::latest()->paginate(10);
        return view('admins.student', compact('students'));
    }

    public function create()
    {
        return view('admin.students.create');
    }

    public function store(Request $request)
    {
        // simpan data siswa
    }

    public function export()
    {
        // return 'ciu';
        return Excel::download(new StudentsExport, 'students-data.xlsx');
    }

    // Import
    // public function import(Request $request)
    // {    
    //     $request->validate([
    //         'file' => 'required|mimes:xlsx,csv',
    //     ]);

    //     Excel::import(new StudentsImport, $request->file('file'));

    //     return redirect()->back()->with('success', 'Data berhasil diimport! 🎉');
    // }

    // Server-side DataTables AJAX
    public function getData(Request $request)
    {
        $columns = [
            'full_name',
            'student_email'
        ];

        $totalData = Students::count();
        $totalFiltered = $totalData;

        $limit  = intval($request->input('length', 10));
        $start  = intval($request->input('start', 0));
        $orderColumnIndex = intval($request->input('order.0.column', 0));
        $orderColumn = $columns[$orderColumnIndex - 1] ?? 'id'; // -1 karena no ada di front
        $orderDir = $request->input('order.0.dir', 'asc');
        $search = $request->input('search.value');

        $query = Students::select('students.*');

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('full_name', 'LIKE', "%{$search}%")
                    ->orWhere('student_email', 'LIKE', "%{$search}%");
            });

            $totalFiltered = $query->count();
        }

        $students = $query->orderBy('full_name', 'asc') // default order
            ->skip($start)
            ->take($limit)
            ->get();

        $data = [];
        foreach ($students as $index => $student) {
            $data[] = [
                'no' => $start + $index + 1,
                'student_email' => $student->student_email,
                'full_name' => $student->full_name,
            ];
        }

        return response()->json([
            "draw" => intval($request->input('draw', 1)),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data
        ]);
    }



    public function show($student)
    {
        $students = Students::findOrFail($student);
        $payments = Payment::where('student_id', $student)->get();
        $attendances = Absents::where('student_id', $student)->get();
        $jenjang = Levels::where('id', $students->levels_id)->first();

        return view('admins.student-show', compact('students', 'payments', 'attendances', 'jenjang'));
    }

    public function edit($student)
    {
        $students = Students::findOrFail($student);
        $jenjang = Levels::where('id', $students->levels_id)->first();


        return view('admins.student-edit', compact('students', 'jenjang'));
    }

    public function update(Request $request, $student)
    {
        // 1. Validasi Data
        $validatedData = $request->validate([
            'full_name'    => 'required|string|max:255',
            'phone_number' => 'required|string|max:20|unique:students,phone_number,' . $student, // Asumsi 'No. Siswa' adalah phone_number
            'parent_phone' => 'nullable|string|max:20', // Asumsi 'No. Orang Tua' adalah parent_phone
            'status'       => 'required|in:active,inactive',
            'address'      => 'nullable|string',
        ]);

        // 2. Cari Data Siswa (Find the record)
        $students = Students::findOrFail($student);

        // 3. Update Data Siswa dan Simpan (Update and Save)
        $updateData = [
            'full_name'    => $validatedData['full_name'],
            'phone_number' => $validatedData['phone_number'],
            'parent_phone' => $validatedData['parent_phone'],
            'status'       => $validatedData['status'],
            'address'      => $validatedData['address'],
        ];

        // Lakukan update:
        $students->update($updateData);

        // 4. Redirect 
        return redirect()->route('admin.students.index', $students->id);
    }

    public function destroy($id)
    {
        // hapus siswa
        Students::findOrFail($id)->delete();
        return redirect()->route('admin.students.index')->with('success', 'Siswa berhasil dihapus!');

    }

    public function importPayments(Request $request)
    {
        // logika untuk mengimpor riwayat pembayaran siswa dari file yang diunggah
    }

    public function importAttendances(Request $request)
    {
        // logika untuk mengimpor riwayat kehadiran siswa dari file yang diunggah
    }

    public function exportPayments($student)
    {
        $students = Students::findOrFail($student);
        $fileName = 'Riwayat_Pembayaran_' . str_replace(' ', '_', $students->full_name) . '_' . date('Y-m-d') . '.xlsx';

        return Excel::download(new PaymentExport($student), $fileName);
    }

    public function exportAttendances($student)
    {
        $students = Students::findOrFail($student);
        $fileName = 'Riwayat_Absensi_30Hari_' . str_replace(' ', '_', $students->full_name) . '_' . date('Y-m-d') . '.xlsx';

        return Excel::download(new AttendanceExport30Days($student), $fileName);
    }
}
