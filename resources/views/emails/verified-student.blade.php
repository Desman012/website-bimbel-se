<!DOCTYPE html>
<html>
<body>
    <h2>Pendaftaran Berhasil Diverifikasi</h2>

    <p>Halo {{ $student->full_name }},</p>

    <p>Pendaftaran Anda telah berhasil diverifikasi oleh admin.</p>

    <p>Silakan login menggunakan akun berikut:</p>

    <ul>
        <li>Email: {{ $student->student_email }}</li>
        <li>Password: (password yang sama ketika mendaftar)</li>
    </ul>

    <p>Terima kasih.</p>
</body>
</html>
