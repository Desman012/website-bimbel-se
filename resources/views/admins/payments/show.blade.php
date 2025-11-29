<h4>Detail Pembayaran Siswa</h4>

<p><strong>Nama:</strong> {{ $payment->student->name }}</p>
<p><strong>Bulan:</strong> {{ $payment->month }}</p>
<p><strong>Jumlah:</strong> Rp {{ number_format($payment->amount_paid) }}</p>

<p><strong>Bukti Pembayaran:</strong></p>
<img src="{{ asset('storage/'.$payment->payment_proof) }}" width="300">

<form action="{{ route('admin.payments.update', $payment->id) }}" method="POST" class="mt-3">
    @csrf
    @method('PUT')

    <label>Status Pembayaran</label>
    <select name="status" class="form-control" onchange="this.form.submit()">
        <option value="pending" {{ $payment->status == 'pending' ? 'selected' : '' }}>Pending</option>
        <option value="verified" {{ $payment->status == 'verified' ? 'selected' : '' }}>Verified</option>
        <option value="rejected" {{ $payment->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
    </select>
</form>
