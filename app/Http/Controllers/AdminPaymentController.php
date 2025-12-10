<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Exports\AdminPaymentStudentExport;
use Maatwebsite\Excel\Facades\Excel;

class AdminPaymentController extends Controller
{
    /**
     * Menampilkan semua data pembayaran
     */
    public function index()
    {
        // Ambil semua pembayaran + siswa terkait
        $payments = Payment::with('student')->orderBy('created_at', 'desc')->get();

        return view('admins.payments.index', compact('payments'));
    }

    /**
     * Menampilkan detail pembayaran berdasarkan ID
     */
    public function show($id)
    {
        $payment = Payment::with('student')->findOrFail($id);

        return view('admins.payments.show', compact('payment'));
    }

    /**
     * Update status pembayaran
     */

    public function export()
    {
        // return 'ciu';
        return Excel::download(new AdminPaymentStudentExport, 'payment-data.xlsx');
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,verified,rejected'
        ]);

        $payment = Payment::findOrFail($id);
        $payment->status = $request->status;
        $payment->admin_id = auth()->id(); // admin yang memverifikasi
        $payment->save();

        return redirect()->back()->with('success', 'Status pembayaran berhasil diperbarui.');
    }
}
