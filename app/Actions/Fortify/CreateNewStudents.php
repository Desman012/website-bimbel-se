<?php

namespace App\Actions\Fortify;

use App\Models\Registrations;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Illuminate\Validation\ValidationException;
use App\Notifications\AccountPending;

class CreateNewStudents implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Create a new student.
     * $input berasal dari Fortify, berupa array.
     */
    public function create(array $input)
    {
        // Validasi input
        $validator = Validator::make($input, [
            'full-name' => ['required', 'string', 'max:50'],
            'address' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'digits_between:10,15'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:students,student_email'],
            'password' => ['required', 'string', 'min:8'],
            'parent-name' => ['required', 'string', 'max:255'],
            'parent-email' => ['required', 'string', 'email', 'max:255'],
            'parent-phone' => ['required', 'digits_between:10,15'],
            'level-id' => ['required', 'integer'],
            'class-id' => ['required', 'integer'],
            'program-id' => ['required', 'integer'],
            'curriculum-id' => ['required', 'integer'],
            'payment-proof' => ['required', 'image', 'max:2048'], // max 2MB
        ], [
            'full-name.required' => 'Nama lengkap wajib diisi.',
            'address.required' => 'Alamat wajib diisi.',
            'phone.required' => 'Nomor WA wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.required' => 'Password wajib diisi.',
            'parent-name.required' => 'Nama orang tua wajib diisi.',
            'parent-email.required' => 'Email orang tua wajib diisi.',
            'parent-phone.required' => 'Nomor WA orang tua wajib diisi.',
            'level-id.required' => 'Jenjang wajib dipilih.',
            'class-id.required' => 'Kelas wajib dipilih.',
            'program-id.required' => 'Program wajib dipilih.',
            'curriculum-id.required' => 'Kurikulum wajib dipilih.',
            'payment-proof.required' => 'Bukti pembayaran wajib diunggah.',
            'payment-proof.image' => 'File bukti pembayaran harus berupa gambar.',
            'payment-proof.max' => 'Ukuran gambar maksimal 2MB.',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        // Upload file bukti pembayaran
        $file = $input['payment-proof']; // ini harus instance UploadedFile dari form
        $path = $file->store('payment_proofs', 'public');

        // Simpan data ke DB
        $student = Registrations::create([
            'role_id' => 2,
            'full_name' => $input['full-name'],
            'address' => $input['address'],
            'phone_number' => $input['phone'],
            'student_email' => $input['email'],
            'password' => Hash::make($input['password']),
            'parent_name' => $input['parent-name'],
            'parent_email' => $input['parent-email'],
            'parent_phone' => $input['parent-phone'],
            'levels_id' => $input['level-id'],
            'class_id' => $input['class-id'],
            'programs_id' => $input['program-id'],
            'curriculum_id' => $input['curriculum-id'],
            'month' => $input['month'] ?? date('F'),
            'amount_paid' => $input['amount-paid'] ?? 0,
            'payment_proof' => $path,
        ]);

        // Kirim notifikasi
        $student->notify(new AccountPending());

        return $student;
    }
}
