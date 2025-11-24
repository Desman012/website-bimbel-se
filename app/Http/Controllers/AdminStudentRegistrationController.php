<?php

namespace App\Http\Controllers;

use App\Models\Registrations;
use Illuminate\Http\Request;

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
        $columns = ['id', 'full_name', 'student_email', 'phone_number', 'levels_id', 'class_id', 'status', 'created_at'];

        $totalData = Registrations::count();
        $totalFiltered = $totalData;

        $limit = intval($request->input('length', 10));
        $start = intval($request->input('start', 0));
        $orderColumnIndex = intval($request->input('order.0.column', 0));
        $orderColumn = $columns[$orderColumnIndex] ?? 'id';
        $orderDir = $request->input('order.0.dir', 'desc');
        $search = $request->input('search.value');

        $query = Registrations::with(['level', 'class']);

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
            // return $students;

        $data = [];
        foreach ($students as $index => $student) {
            $data[] = [
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
        'payment_proof' => $student->payment_proof ? asset('storage/'.$student->payment_proof) : null,
        'status' => $student->status,
                // 'created_at' => $student->created_at->format('d-m-Y H:i'),
            ];
        }

        return response()->json([
            "draw" => intval($request->input('draw', 1)),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data
        ]);
        // return $students;
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
        'payment_proof' => $student->payment_proof ? asset('storage/'.$student->payment_proof) : null,
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
