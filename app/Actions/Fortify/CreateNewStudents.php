<?php

namespace App\Actions\Fortify;

use App\Models\Registrations;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Illuminate\Validation\ValidationException;

class CreateNewStudents implements CreatesNewUsers
{
    use PasswordValidationRules;

    public function create(array $input)
    {
        // Validasi input
        $validator = Validator::make($input, [
            'full-name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:registrations,student_email'],
            'password' => $this->passwordRules(),
            'phone' => ['required', 'digits_between:10,15'],
            'address' => ['required', 'string', 'max:255'],
            'parent-name' => ['required', 'string', 'max:255'],
            'parent-email' => ['required', 'string', 'email', 'max:255'],
            'parent-phone' => ['required', 'digits_between:10,15'],
            'program-id' => ['required', 'integer'],
            'curriculum-id' => ['required', 'integer'],
            'level-id' => ['required', 'integer'],
            'class-id' => ['required', 'integer'],
            'payment-proof' => ['required', 'image', 'max:2048'], // max 2MB
        ], [
            'full-name.required' => 'Nama lengkap wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.required' => 'Password wajib diisi.',
            'phone.required' => 'Nomor WA wajib diisi.',
            'address.required' => 'Alamat wajib diisi.',
            'parent-name.required' => 'Nama orang tua wajib diisi.',
            'parent-email.required' => 'Email orang tua wajib diisi.',
            'parent-phone.required' => 'Nomor WA orang tua wajib diisi.',
            'program-id.required' => 'Program wajib dipilih.',
            'level-id.required' => 'Jenjang wajib dipilih.',
            'class-id.required' => 'Kelas wajib dipilih.',
            'payment-proof.required' => 'Bukti pembayaran wajib diunggah.',
            'payment-proof.image' => 'File bukti pembayaran harus berupa gambar.',
            'payment-proof.max' => 'Ukuran gambar maksimal 2MB.',
        ]);

        // Jika validasi gagal, lempar error ke form
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        // Upload file bukti pembayaran
        $path = $input['payment-proof']->store('payment_proofs', 'public');

        // Simpan data
        $student = Registrations::create([
            'full_name' => $input['full-name'],
            'student_email' => $input['email'],
            'password' => Hash::make($input['password']),
            'phone_number' => $input['phone'],
            'address' => $input['address'],
            'parent_name' => $input['parent-name'],
            'parent_email' => $input['parent-email'],
            'parent_phone' => $input['parent-phone'],
            'programs_id' => $input['program-id'],
            'curriculums_id' => $input['curriculum-id'],
            'levels_id' => $input['level-id'],
            'class_id' => $input['class-id'],
            'month' => $input['month'] ?? date('F'), // default current month
            'payment_proof' => $path,
        ]);

        return $student;
    }
}
