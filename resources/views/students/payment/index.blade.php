@extends('students.layouts.app')
@section('title','Sinar Education | Pembayaran Siswa')
@section('title-content', 'Pembayaran Bulanan')
@section('content')

    <div class="content-card">

        <h3>Pembayaran Bulanan</h3>

        {{-- Alert --}}
        @if (session('status'))
            <div class="alert alert-success mb-3">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('students.payment.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="mb-3">
                    <label class="form-label">Bulan</label>
                    <input type="text" name="month" value="{{ $monthNow }}" readonly class="form-control bg-light">
                </div>

                <div class="mb-3">
                    <label class="form-label">Nominal</label>
                    <input type="text" name="amount_paid" value="{{ number_format($amountPaid, 0, ',', '.') }}" readonly
                        class="form-control bg-light">
                </div>

            {{-- Status jika sudah ada pembayaran --}}
            @if (isset($existingPayment))

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <br>

                    @if ($existingPayment->status == 'pending')
                        <span class="badge bg-warning text-dark">Pending</span>
                    @elseif ($existingPayment->status == 'rejected')
                        <span class="badge bg-danger">Ditolak</span>
                    @elseif ($existingPayment->status == 'verified')
                        <span class="badge bg-success">Verifikasi</span>
                    @else
                        <span class="badge bg-secondary">{{ $existingPayment->status }}</span>
                    @endif
                </div>

                {{-- Tampilkan bukti kalau masih pending --}}
                @if ($existingPayment->status == 'pending')
                    <div class="mb-3">
                        <label class="form-label">Bukti Saat Ini</label>
                        <div>
                            <img src="{{ asset('storage/' . $existingPayment->payment_proof) }}"
                                class="img-thumbnail rounded" style="max-width: 240px;">
                        </div>
                    </div>
                @endif
            @else
                {{-- Upload bukti --}}
                <div class="mb-3">
                    <label class="form-label">Upload Bukti Pembayaran</label>
                    <input type="file" name="payment_proof" accept="image/*" required class="form-control">
                </div>
            @endif

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('students.payment.history') }}" class="btn btn-outline-warning text-danger">
                    Lihat History Pembayaran
                </a>

                @if (!isset($existingPayment) || $existingPayment->status == 'rejected')
                    <button type="submit" class="btn btn-warning">
                        Kirim Pembayaran
                    </button>
                @endif
            </div>

        </form>

    </div>

@endsection

@push('scripts')
    <script>
        document.getElementById('monthSelect').addEventListener('change', function() {
            const m = this.value;
            const url = new URL(window.location.href);
            url.searchParams.set('month', m);
            window.location.href = url.toString();
        });
    </script>
@endpush
