<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentPaymentController extends Controller
{
    public function index()
    {
        return view('students.payment.index');
    }

    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'tanggal' => 'required|date',
            'periode' => 'required|string',
            'jenjang' => 'required|string',
            'jenis_paket' => 'required|string',
            'nominal' => 'required|numeric',
            'bukti' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Upload bukti pembayaran
        $path = $request->file('bukti')->store('bukti_pembayaran', 'public');

        // Simpan ke tabel payments
        Payment::create([
            'student_id' => Auth::id(), // pastikan user login sebagai student
            'month' => $request->periode,
            'amount_paid' => $request->nominal,
            'payment_proof' => $path,
            'status' => 'pending',
        ]);

        // Redirect dengan status
        return redirect()->back()->with('status', 'Process');
    }

    public function history()
    {
        $payments = \App\Models\Payment::where('student_id', \Illuminate\Support\Facades\Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('students.payment.history', compact('payments'));
    }
}