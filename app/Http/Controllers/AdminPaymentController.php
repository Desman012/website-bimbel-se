<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPaymentController extends Controller
{
    public function index()
    {
        return view('admin.payments.index');
    }

    public function show($id)
    {
        return view('admin.payments.show', compact('id'));
    }
}