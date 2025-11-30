@extends('admins.layouts.app')
@section('title', 'Sinar Education | Pendaftar')
@section('title-content', 'Data Pendaftar')

@section('content') 
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- Card -->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="studentsTable" class="table table-bordered table-hover" width="100%" cellspacing="0">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Nama Lengkap</th>
                                    <th>Email</th>
                                    <th>Jenjang</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Modal Detail Pendaftar -->
    <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel"
        aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-[#F9EAB4]">
                    <h3 class="modal-title fw-bold" id="detailModalLabel">Detail Pendaftar</h3>
                    <button type="button" class="close text-danger" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <!-- Grid Data -->
                        <div class="row mb-2">
                            <div class="col-md-4 font-weight-bold">Nama Lengkap</div>
                            <div class="col-md-8" id="modalFullName"></div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4 font-weight-bold">Email Siswa</div>
                            <div class="col-md-8" id="modalEmail"></div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4 font-weight-bold">No. HP</div>
                            <div class="col-md-8" id="modalPhone"></div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4 font-weight-bold">Jenjang</div>
                            <div class="col-md-8" id="modalLevel"></div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4 font-weight-bold">Kelas</div>
                            <div class="col-md-8" id="modalClass"></div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4 font-weight-bold">Nama Orang Tua</div>
                            <div class="col-md-8" id="modalParentName"></div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4 font-weight-bold">Email Orang Tua</div>
                            <div class="col-md-8" id="modalParentEmail"></div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4 font-weight-bold">No. HP Orang Tua</div>
                            <div class="col-md-8" id="modalParentPhone"></div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4 font-weight-bold">Status</div>
                            <div class="col-md-8" id="modalStatus"></div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4 font-weight-bold">Bulan</div>
                            <div class="col-md-8" id="modalMonth"></div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4 font-weight-bold">Jumlah Dibayar</div>
                            <div class="col-md-8" id="modalAmountPaid"></div>
                        </div>
                        <div class="font-weight-bold">Bukti Pembayaran</div>
                        <div class="" id="modalPaymentProof"></div>
                    </div>
                    <input type="hidden" id="verifiedStudentId">
                    <input type="hidden" id="verifiedStudentEmail">
                </div>
                <!-- Hidden input untuk proses Verified / Reject -->
                <div class="modal-footer d-flex justify-content-between">
                    <div>
                        <button type="button" class="btn btn-danger" id="btn-reject">Reject</button>
                    </div>
                    <button type="button" class="btn btn-success" id="btnVerified">Verified</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Reject -->
    <div class="modal fade" id="rejectModal" tabindex="-1" role="dialog" aria-labelledby="rejectModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="rejectModalLabel">Tolak Pendaftaran</h5>
                    <button type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="rejectForm">
                    @csrf
                    <input type="hidden" id="rejectStudentId" name="student_id" />
                    <input type="hidden" id="rejectStudentEmail" name="student_email" />

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="rejectReason">Alasan Penolakan</label>
                            <textarea class="form-control" id="rejectReason" name="reason" rows="4" required></textarea>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" id="rejectSubmitBtn" class="btn btn-danger">Tolak Pendaftaran</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <!-- jQuery -->
    <script src="{{ Vite::asset('resources/js/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ Vite::asset('resources/js/boostrap/js/bootstrap.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ Vite::asset('resources/css/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ Vite::asset('resources/js/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ Vite::asset('resources/js/js/demo.js') }}"></script>

    <script src="https://cdn.datatables.net/2.3.5/js/dataTables.js"></script>
    {{-- <script src="https://cdn.datatables.net/2.3.5/js/dataTables.bootstrap5.min.js"></script> --}}

    <script>
        $(document).ready(function() {
            // Inisialisasi DataTable
            var table = $('#studentsTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.students.registration.data') }}",
                order: [
                    [6, 'asc']
                ], // sort by status_order (pending dulu)
                columns: [{
                        data: 'no',
                        name: 'no',
                        orderable: false,
                        searchable: false
                    }, {
                        data: 'full_name',
                        name: 'full_name'
                    },
                    {
                        data: 'student_email',
                        name: 'student_email'
                    },
                    {
                        data: 'level_name',
                        name: 'level_name'
                    },
                    {
                        data: 'status',
                        name: 'status',
                        render: function(data) {
                            if (!data) return '<span class="badge bg-secondary">-</span>';
                            var s = data.toString().toLowerCase();
                            if (s === 'pending')
                                return '<span class="badge bg-warning">Pending</span>';
                            if (s === 'active')
                                return '<span class="badge bg-success">Active</span>';
                            if (s === 'ditolak')
                                return '<span class="badge bg-danger">Ditolak</span>';
                            return '<span class="badge bg-secondary">' + data + '</span>';
                        }
                    },
                    {
                        data: null,
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            return `<button class="btn btn-sm btn-primary btn-detail" data-id="${row.id}">Detail</button>`;
                        }
                    },
                    { // status_order (HARUS DI PALING BELAKANG)
                        data: 'status_order',
                        visible: false,
                        searchable: false
                    }
                ],
                columnDefs: [{
                        targets: '_all',
                        orderable: true
                    },
                    {
                        targets: 0,
                        orderable: false
                    }, // nomor urut
                    {
                        targets: 6,
                        orderable: false
                    } // action
                ],
                responsive: true,
                lengthMenu: [10, 25, 50, 100],
                pageLength: 10,
                // tampilkan search di pojok kanan
                dom: "<'row mb-3'<'col-sm-6'l><'col-sm-6 d-flex justify-content-end'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row mt-3'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>"
            });

            // When "Detail" clicked, populate detail modal and set hidden inputs (id + email)
            $('#studentsTable tbody').on('click', '.btn-detail', function() {
                var rowData = table.row($(this).closest('tr')).data();
                if (!rowData) return;

                // set hidden fields for reject action
                $('#rejectStudentId').val(rowData.id || '');
                $('#rejectStudentEmail').val(rowData.student_email || '');

                // populate modal detail fields
                $('#modalFullName').text(rowData.full_name || '-');
                $('#modalEmail').text(rowData.student_email || '-');
                $('#modalPhone').text(rowData.phone_number || '-');
                $('#modalLevel').text(rowData.level_name || '-');
                $('#modalClass').text(rowData.class_name || '-');
                $('#modalParentName').text(rowData.parent_name || '-');
                $('#modalParentEmail').text(rowData.parent_email || '-');
                $('#modalParentPhone').text(rowData.parent_phone || '-');
                $('#modalMonth').text(rowData.month || '-');

                $('#verifiedStudentId').val(rowData.id || '');
                $('#verifiedStudentEmail').val(rowData.student_email || '');

                // amount formatting (jika angka), else tampilkan '-'
                if (rowData.amount_paid) {
                    // pastikan amount_paid numeric string (mis: '200000') -> format 200.000
                    var amt = Number(rowData.amount_paid); // pastikan jadi number
                    amt = Math.floor(amt); // buang angka di belakang koma
                    var fmt = amt.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."); // format ribuan
                    $('#modalAmountPaid').text('Rp ' + fmt);
                } else {
                    $('#modalAmountPaid').text('-');
                }

                // status badge
                var st = (rowData.status || '').toString().toLowerCase();
                var badgeHtml = '<span class="badge bg-secondary">-</span>';
                if (st === 'pending') badgeHtml = '<span class="badge bg-warning">Pending</span>';
                if (st === 'active') badgeHtml = '<span class="badge bg-success">Active</span>';
                if (st === 'ditolak') badgeHtml = '<span class="badge bg-danger">Ditolak</span>';
                $('#modalStatus').html(badgeHtml);

                // kontrol tombol Verified & Reject
                if (st === 'active') {
                    $('#btnVerified').hide();
                    $('#btn-reject').hide();
                } else {
                    $('#btnVerified').show();
                    $('#btn-reject').show();
                }
                // payment proof image (if stored as path like "/storage/payment_proofs/xxx.jpg" OR full URL)
                if (rowData.payment_proof) {
                    var imgSrc = rowData.payment_proof;
                    // if server returns relative path without asset prefix, prefix it:
                    if (!imgSrc.startsWith('http') && !imgSrc.startsWith('/')) {
                        // assume storage path stored like "payment_proofs/xxx.jpg"
                        imgSrc = "{{ asset('storage') }}/" + imgSrc;
                    }
                    $('#modalPaymentProof').html(
                        `<img src="${imgSrc}" class="img-fluid rounded" alt="Bukti Pembayaran">`);
                } else {
                    $('#modalPaymentProof').text('-');
                }

                // show modal detail
                $('#detailModal').modal({
                    backdrop: 'static',
                    keyboard: false
                });
                $('#detailModal').modal('show');
            });

            // Open reject modal from detail: clears textarea, uses hidden inputs already set
            $('#btn-reject').on('click', function() {
                $('#rejectReason').val('');
                // ensure hidden email/id exist
                var id = $('#rejectStudentId').val();
                var email = $('#rejectStudentEmail').val();
                if (!id || !email) {
                    alert('Data pendaftar tidak tersedia. Silakan buka detail pendaftar terlebih dahulu.');
                    return;
                }
                $('#rejectModal').modal('show');
            });

            // Submit reject form (AJAX)
            $('#rejectForm').on('submit', function(e) {
                e.preventDefault();

                var id = $('#rejectStudentId').val();
                var email = $('#rejectStudentEmail').val();
                var reason = $('#rejectReason').val();

                if (!reason || !reason.trim()) {
                    alert('Alasan penolakan wajib diisi.');
                    return;
                }

                var submitBtn = $('#rejectSubmitBtn');
                // if button doesn't exist (older markup), find by selector
                if (submitBtn.length === 0) submitBtn = $('#rejectForm button[type="submit"]');

                submitBtn.prop('disabled', true).text('Mengirim...');

                // CSRF token from meta
                var csrfToken = $('meta[name="csrf-token"]').attr('content');

                fetch("{{ route('admin.students.registration.reject') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken,
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({
                            id: id,
                            email: email,
                            reason: reason
                        })
                    })
                    .then(function(res) {
                        // sahkan res kode 200-299
                        if (!res.ok) return res.json().then(x => Promise.reject(x));
                        return res.json();
                    })
                    .then(function(json) {
                        submitBtn.prop('disabled', false).text('Tolak Pendaftaran');
                        if (json.success) {
                            $('#rejectModal').modal('hide');
                            $('#detailModal').modal('hide');
                            table.ajax.reload(null, false); // reload tanpa reset page
                        } else {
                            alert(json.message || 'Gagal menolak pendaftaran');
                        }
                    })
                    .catch(function(err) {
                        submitBtn.prop('disabled', false).text('Tolak Pendaftaran');
                        console.error('Reject error:', err);
                        // jika server mengembalikan struktur pesan error
                        if (err && err.message) alert(err.message);
                        else if (err && err.errors) {
                            // show first validation error
                            var first = Object.values(err.errors)[0];
                            if (first && first[0]) alert(first[0]);
                        } else alert('Terjadi kesalahan server. Cek log (Network tab).');
                    });
            });

            $('#btnVerified').on('click', function() {

                var id = $('#verifiedStudentId').val();
                var email = $('#verifiedStudentEmail').val();

                if (!confirm('Yakin ingin menandai sebagai VERIFIED?')) return;

                fetch("{{ route('admin.students.registration.verify') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({
                            id: id,
                            email: email
                        })
                    })
                    .then(r => r.json())
                    .then(json => {

                        // Tutup SEMUA modal
                        $('.modal').modal('hide');

                        // Reload datatable
                        table.ajax.reload(null, false);

                        // OPTIONAL redirect halaman
                        // window.location.reload();
                    })
                    .catch(err => {
                        console.error(err);
                        alert("Server error");
                    });

            });

        }); // end document.ready
    </script>
@endpush
