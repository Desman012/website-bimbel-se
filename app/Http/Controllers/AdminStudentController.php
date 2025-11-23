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
        // 1. Validasi Data Input
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'no_siswa' => 'required|string|max:20|unique:students,no_siswa,' . $student,
            'levels_id' => 'required|exists:levels,id', // Perhatikan, ini harus sesuai dengan nama input Jenjang di form
            'no_orang_tua' => 'nullable|string|max:20',
            'status_akun' => 'required|in:Aktif,Nonaktif,Diblokir', // Sesuaikan dengan opsi yang Anda miliki
        ]);

        // 2. Cari Data Siswa (Find the record)
        // Ambil data siswa berdasarkan ID yang dilewatkan
        $studentData = Students::findOrFail($student);

        // 3. Update Data Siswa dan Simpan (Update and Save)
        $studentData->update($validatedData);

        // 4. Redirect dan Berikan Pesan Sukses
        return redirect()->route('admin.students.index', $studentData->id)
            ->with('success', 'Data siswa berhasil diperbarui!');
    }

    public function destroy($id)
    {
        // hapus siswa
    }
}
