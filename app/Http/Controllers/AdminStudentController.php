<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;
use App\Models\Payment;
use App\Models\Absents;
use App\Models\Levels;

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
    }

    public function importPayments(Request $request)
    {
        // logika untuk mengimpor riwayat pembayaran siswa dari file yang diunggah
    }

    public function importAttendances(Request $request)
    {
        // logika untuk mengimpor riwayat kehadiran siswa dari file yang diunggah
    }
}
