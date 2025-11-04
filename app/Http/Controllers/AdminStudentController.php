<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminStudentController extends Controller
{
    public function index()
    {
        return view('admin-students-index');
    }

    public function create()
    {
        return view('admin.students.create');
    }

    public function store(Request $request)
    {
        // simpan data siswa
    }

    public function show($id)
    {
        return view('admin.students.show', compact('id'));
    }

    public function edit($id)
    {
        return view('admin.students.edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        // update data siswa
    }

    public function destroy($id)
    {
        // hapus siswa
    }
}
