@component('mail:message')
    <p>Halo {{ $registration->full_name }},</p>

    <p>Mohon maaf, pendaftaran kamu telah ditolak dengan alasan berikut:</p>

    <blockquote style="font-style: italic; color: #555;">
        {{ $reason }}
    </blockquote>

    <p>Jika masih membutuhkan bantuan, silakan hubungi admin kembali.</p>

    <p>Terima kasih.</p>
@endcomponent
