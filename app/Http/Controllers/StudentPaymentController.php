<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentPaymentController extends Controller
{
    public function index()
    {
        return view('student.payment.index');
    }

    public function store(Request $request)
    {
        // kirim bukti pembayaran
    }

    public function history()
    {
        return view('student.payment.history');
    }
}
