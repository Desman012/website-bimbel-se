<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Prices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentPaymentController extends Controller
{
    public function index()
    {

        // CEK USER LOGIN 
        $authUser = Auth::guard('student')->user();
        $id = $authUser->id; // relasi ke tabel lain 

        $monthNow = now()->format('F Y');
        $levels_id = $authUser->levels_id;
        $class_id = $authUser->class_id;

        // CEK BUKTI YANG MASIH PENDING 
        $existingPayment = Payment::where('student_id', $id)
            ->where('month', $monthNow)
            ->first();

        // AMBIL HARGA DARI PRICES 
        $price = Prices::where('level_id', $authUser->levels_id)
            ->where('class_id', $authUser->class_id)
            ->first();

        $amountPaid = $price ? $price->price : 0;
        // return $existingPayment->status;
        return view('students.payment.index', compact('levels_id', 'class_id', 'authUser', 'monthNow', 'amountPaid', 'existingPayment'));
    }
    

    public function store(Request $request)
    {
        $authUser = Auth::guard('student')->user();

        // CEK HARGA
        $price = Prices::where('level_id', $authUser->levels_id)
            ->where('class_id', $authUser->class_id)
            ->first();

        if (!$price) {
            return redirect()->back()->with('status', 'Harga belum diatur.');
        }

        // VALIDASI
        $request->validate([
            'month' => 'required|string',
            'payment_proof' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // CEK apakah sudah upload bulan ini
        $exists = Payment::where('student_id', $authUser->id)
            ->where('month', $request->month)
            ->where('status', 'pending')
            ->exists();

        if ($exists) {
            return redirect()->back()->with('status', 'Bukti pembayaran bulan ini sudah diupload.');
        }

        // UPLOAD
        $path = $request->file('payment_proof')->store('bukti_pembayaran', 'public');

        // SIMPAN DATA
        Payment::create([
            'student_id'     => $authUser->id,
            'admin_id'       => null,
            'month'          => $request->month,
            'amount_paid'    => $price->price,
            'payment_proof'  => $path,
            'status'         => 'pending',
        ]);

        return redirect()->back()->with('status', 'Upload berhasil, menunggu verifikasi admin.');
    }


    public function history()
    {
        $authUser = Auth::guard('student')->user();
        $id = $authUser->id;

        $payments = Payment::where('student_id', $id)
            ->orderBy('created_at', 'desc')
            ->get();

        $monthNow = now()->format('F Y');

        // CEK HARGA
        $price = Prices::where('level_id', $authUser->levels_id)
            ->where('class_id', $authUser->class_id)
            ->first();

        $amountPaid = $price ? $price->price : 0;

        return view('students.payment.history', compact(
            'payments',
            'monthNow',
            'amountPaid'
        ));
    }


    public function cancel($id)
    {
        $authUser = Auth::guard('student')->user();

        if (!$authUser) {
            return redirect()->back()->with('status', 'Akun tidak valid.');
        }

        $payment = Payment::findOrFail($id);

        // CEK KEPEMILIKAN
        if ($payment->student_id !== $authUser->id) {
            abort(403, 'Tidak boleh menghapus pembayaran orang lain.');
        }

        // HAPUS FILE
        $filePath = storage_path('app/public/' . $payment->payment_proof);
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        // HAPUS DATA
        $payment->delete();

        return redirect()->back()->with('status', 'Pembayaran berhasil dibatalkan.');
    }
}
