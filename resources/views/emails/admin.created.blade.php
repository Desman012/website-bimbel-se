@component('mail::message')
# Selamat Datang, {{ $adminName }}!

Akun Admin Panel Sinar Education Anda telah berhasil dibuat.

Berikut adalah detail login Anda:

* **Email:** {{ $email }}
* **Password:** **{{ $password }}**

Harap segera ganti password Anda setelah login pertama kali.

@component('mail::button', ['url' => url('/admin')])
Login ke Admin Panel
@endcomponent

Terima kasih,<br>
Tim Admin
@endcomponent