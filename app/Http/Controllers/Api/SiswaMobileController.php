<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Students;
use App\Models\Payment;
use App\Models\Absents;
use App\Models\Levels;
use App\Exports\PaymentExport;
use App\Exports\AttendanceExport30Days;
use App\Exports\StudentsExport;
use App\Imports\StudentsImport;
use Maatwebsite\Excel\Facades\Excel;

class SiswaMobileController extends Controller
{
    // ============================
    // LIST STUDENTS
    // ============================
    public function index()
    {
        $students = Students::latest()->paginate(10);

        return response()->json([
            'status' => true,
            'data'   => $students
        ]);
    }

    // ============================
    // CREATE STUDENT
    // ============================
    public function store(Request $request)
{
    $validated = $request->validate([
        'full_name'     => 'required|string|max:255',
        'student_email' => 'required|email|unique:students',
        'phone_number'  => 'required|string|max:20|unique:students',
        'parent_name'   => 'required|string|max:255',
        'parent_phone'  => 'nullable|string|max:20',
        'status'        => 'required|in:active,inactive',
        'address'       => 'nullable|string',
        'levels_id'     => 'required|exists:levels,id',
        'programs_id'   => 'required|exists:programs,id',
        'curriculum_id'  => 'required|exists:curriculums,id'
    ]);

    $validated['role_id']  = 2;        // siswa
    $validated['password'] = '123456'; // auto-hashed oleh model

    $student = Students::create($validated);

    return response()->json([
        'status'  => true,
        'message' => 'Siswa berhasil ditambahkan',
        'data'    => $student
    ], 201);

    $validated['role_id'] = 2;
    $validated['password'] = Hash::make('123456');

    $student = Students::create($validated);

    return response()->json([
        'status' => true,
        'message' => 'Siswa berhasil ditambahkan',
        'data' => $student
    ], 201);
}


    // ============================
    // DATATABLES SERVER-SIDE
    // ============================
    public function getData(Request $request)
    {
        $columns = ['full_name', 'student_email'];

        $totalData = Students::count();
        $totalFiltered = $totalData;

        $limit  = intval($request->input('length', 10));
        $start  = intval($request->input('start', 0));
        $orderColumnIndex = intval($request->input('order.0.column', 0));
        $orderColumn = $columns[$orderColumnIndex - 1] ?? 'id';
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

        $students = $query->orderBy($orderColumn, $orderDir)
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

    // ============================
    // SHOW STUDENT DETAIL
    // ============================
    public function show($id)
    {
        $student = Students::find($id);

        if (!$student) {
            return response()->json([
                'status' => false,
                'message' => 'Data siswa tidak ditemukan'
            ], 404);
        }

        $payments = Payment::where('student_id', $id)->get();
        $attendances = Absents::where('student_id', $id)->get();
        $jenjang = Levels::find($student->levels_id);

        return response()->json([
            'status' => true,
            'data' => [
                'student' => $student,
                'payments' => $payments,
                'attendances' => $attendances,
                'level' => $jenjang
            ]
        ]);
    }

    // ============================
    // EDIT / UPDATE STUDENT
    // ============================
    public function update(Request $request, $id)
    {
        $student = Students::find($id);

        if (!$student) {
            return response()->json([
                'status' => false,
                'message' => 'Data siswa tidak ditemukan'
            ], 404);
        }

        $validated = $request->validate([
            'full_name'    => 'required|string|max:255',
            'phone_number' => 'required|string|max:20|unique:students,phone_number,' . $id,
            'parent_phone' => 'nullable|string|max:20',
            'status'       => 'required|in:active,inactive',
            'address'      => 'nullable|string',
        ]);

        $student->update($validated);

        return response()->json([
            'status' => true,
            'message' => 'Data siswa berhasil diperbarui',
            'data' => $student
        ]);
    }

    // ============================
    // DELETE STUDENT
    // ============================
    public function destroy($id)
    {
        $student = Students::find($id);

        if (!$student) {
            return response()->json([
                'status' => false,
                'message' => 'Data siswa tidak ditemukan'
            ], 404);
        }

        $student->delete();

        return response()->json([
            'status' => true,
            'message' => 'Siswa berhasil dihapus'
        ]);
    }
}
