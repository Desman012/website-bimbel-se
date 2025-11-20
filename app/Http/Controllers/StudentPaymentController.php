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
    
    if (! $authUser || ! $authUser->student) { 
        return redirect()->back()->with('status', 'Akun ini tidak memiliki data siswa.'); 
    } 
    
    $monthNow = now()->format('F Y'); 
    $levels_id = $authUser->levels_id; 
    $class_id = $authUser->class_id; 
    
    // CEK BUKTI YANG MASIH PENDING 
    $existingPayment = Payment::where('id', $id) 
    ->where('month', $monthNow) 
    ->where('status', 'pending') 
    ->first(); 
    
    // AMBIL HARGA DARI PRICES 
    $price = Prices::where('level_id', $authUser->levels_id) 
    ->where('class_id', $authUser->class_id) 
    ->first(); 

    $amountPaid = $price ? $price->price : 0; 
    return view('students.payment.index', compact( 'levels_id', 'class_id', 'authUser', 'monthNow', 'amountPaid', 'existingPayment' )); 
    } 
    public function store(Request $request) { 
        $student = Auth::user(); // karena student yang login 

        // Ambil harga berdasarkan level & class 
        $price = Prices::where('level_id', (int) $authUser->levels_id) 
        ->where('class_id', (int) $authUser->class_id) 
        ->first(); 
    
    if (! $price) { 
        return redirect()->back()->with('status', 'Harga belum diatur.');
    } 
    
        // Validasi upload 
        $request->validate([ 'month' => 'required|string', 'payment_proof' => 'required|image|mimes:jpeg,png,jpg|max:2048', ]); 
        
        // Cek apakah sudah upload bulan ini 
        $exists = Payment::where('student_id', $student->id) 
        ->where('month', $request->month) ->where('status', 'pending') 
        ->exists(); if ($exists) { return redirect()->back()->with('status', 'Sudah upload bulan ini.'); } 
        
        // Upload 
        $path = $request->file('payment_proof')->store('bukti_pembayaran', 'public'); 
        
        // Simpan pembayaran 
        Payment::create([ 
            'student_id' => $student->id, 
            'admin_id' => null, 
            'month' => $request->month, 
            'amount_paid' => $price->price, 
            'payment_proof' => $path, 
            'status' => 'pending', ]); 
            return redirect()->back()->with('status', 'Upload berhasil!'); 
    } 

    public function history() { 
        $authUser = Auth::guard('student')->user(); 
        if (empty($authUser)) { return redirect()->back()->with('status', 'Akun ini tidak memiliki data siswa.'); 
        } 

        $id = $authUser->id; 
        $payments = Payment::where('student_id', $id) ->orderBy('created_at', 'desc') ->get(); 
        $monthNow = now()->format('F Y'); $price = Prices::where('level_id', $authUser->level_id) ->where('class_id', $authUser->class_id) ->first(); 
        $amountPaid = $price ? $price->price : 0; return view('students.payment.history', compact( 'payments', 'monthNow', 'amountPaid' )); 
    } 

    public function cancel($id) { $authUser = Auth::user(); 
        if (! $authUser || ! $authUser->student) { return redirect()->back()->with('status', 'Akun ini tidak memiliki data siswa.'); 
        } $student = $authUser->student; $payment = Payment::findOrFail($id); 
        
        // Cek kepemilikan 
         if ($payment->student_id !== $student->id) { abort(403); } 

        // Hapus file jika ada 
        $filePath = storage_path('app/public/'.$payment->payment_proof); 
        if (file_exists($filePath)) { unlink($filePath); } $payment->delete(); 
        return redirect()->back()->with('status', 'Pembayaran berhasil dibatalkan.'); } }