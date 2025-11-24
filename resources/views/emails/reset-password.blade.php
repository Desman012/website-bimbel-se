@component('mail::message')
# Halo!

Anda menerima email ini karena kami mendapatkan permintaan reset password untuk akun Anda.

@component('mail::button', ['url' => $resetLink])
Reset Password
@endcomponent

Link reset password ini berlaku selama **60 menit**.

Jika Anda tidak meminta reset password, abaikan email ini.

Terima kasih,<br>
**Bimbel Sinar Education**
@endcomponent
