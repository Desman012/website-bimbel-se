<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sinar Education | Data Pendaftar</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/overlayScrollbars/css/overlayScrollbars.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Bisa di head atau tepat sebelum script JS datatable/modal -->
    </head>

<body class="hold-transition sidebar-mini layout-fixed">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        @include('admins.layouts.navbar')
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        @include('admins.layouts.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>List Pendaftar Siswa</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">Pendaftar</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                    <!-- Card -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 bg-[#F9EAB4]">
                            {{-- <h6 class="m-0 font-weight-bold text-white">Daftar Pendaftar</h6> --}}
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="studentsTable" class="table table-bordered table-hover" width="100%"
                                    cellspacing="0">
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
        </div>
        <!-- /.content-wrapper -->
    </div>



    <!-- Modal Detail Pendaftar -->
    <!-- Modal Detail Pendaftar -->
    <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="detailModalLabel">Detail Pendaftar</h5>
                <button type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
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
                    <div class="row mb-2">
                        <div class="col-md-4 font-weight-bold">Bukti Pembayaran</div>
                        <div class="col-md-8" id="modalPaymentProof"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>


    <!-- ./wrapper -->
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

        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>

        <script>
            $(document).ready(function() {
    var table = $('#studentsTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('admin.students.registration.data') }}",
        columns: [
            { data: 'id', name: 'id' },
            { data: 'full_name', name: 'full_name' },
            { data: 'student_email', name: 'student_email' },
            { data: 'level_name', name: 'level_name' },
            { 
                data: 'status', 
                name: 'status',
                render: function(data) {
                    if (data.toLowerCase() === 'pending') return '<span class="badge bg-warning">Pending</span>';
                    if (data.toLowerCase() === 'verified') return '<span class="badge bg-success">Verified</span>';
                    if (data.toLowerCase() === 'rejected') return '<span class="badge bg-danger">Rejected</span>';
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
            }
        ]
    });

    // Delegated event listener supaya tombol yang di-generate DataTable bisa diklik
    $('#studentsTable tbody').on('click', '.btn-detail', function() {
        var data = table.row($(this).parents('tr')).data();

        // Isi modal
        $('#modalFullName').text(data.full_name || '-');
        $('#modalEmail').text(data.student_email || '-');
        $('#modalPhone').text(data.phone_number || '-');
        $('#modalLevel').text(data.level_name || '-');
        $('#modalClass').text(data.class_name || '-');
        $('#modalParentName').text(data.parent_name || '-');
        $('#modalParentEmail').text(data.parent_email || '-');
        $('#modalParentPhone').text(data.parent_phone || '-');
        $('#modalStatus').html(function(){
            if(data.status.toLowerCase() === 'pending') return '<span class="badge bg-warning">Pending</span>';
            if(data.status.toLowerCase() === 'verified') return '<span class="badge bg-success">Verified</span>';
            if(data.status.toLowerCase() === 'rejected') return '<span class="badge bg-danger">Rejected</span>';
            return '<span class="badge bg-secondary">'+data.status+'</span>';
        });
        $('#modalMonth').text(data.month || '-');
        $('#modalAmountPaid').text(data.amount_paid || '-');
        if(data.payment_proof){
    $('#modalPaymentProof').html(`<img src="${data.payment_proof}" class="img-fluid" />`);
} else {
    $('#modalPaymentProof').text('-');
}


        // Tampilkan modal
        $('#detailModal').modal('show');
    });
});

        </script>

    </body>

    </html>
