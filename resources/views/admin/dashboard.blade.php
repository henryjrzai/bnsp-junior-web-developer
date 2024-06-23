@extends('layout.main')

@section('title', 'Dashboard')

@section('header')
    @include('components.navbar')
@endsection

@section('content')
    <section class="container">
        <div class="row mt-4">
            <h2 class="fw-bold slide-in-left">Hi, {{ auth()->user()->name }} </h2>
            <h4 class="slide-in-left">Selamat datang kembali</h4>
        </div>
        <hr>
        <div class="row justify-content-around gap-1 mt-2 px-2">
            <div class="card col-5 col-md-5 col-lg-2 bg-info swing-in-top-fwd " style="height: 100px">
                <div class="card-body">
                    <h4 class="card-title text-white"><i class="fa-regular fa-circle-user me-2"></i>Manager</h4>
                    <p class="text-white" id="manager">10 Orang</p>
                </div>
            </div>
            <div class="card col-5 col-md-5 col-lg-2 bg-info swing-in-top-fwd " style="height: 100px">
                <div class="card-body">
                    <h4 class="card-title text-white"><i class="fa-regular fa-circle-user me-2"></i>Lead</h4>
                    <p class="text-white" id="lead">10 Orang</p>
                </div>
            </div>
            <div class="card col-5 col-md-5 col-lg-2 bg-info swing-in-top-fwd " style="height: 100px">
                <div class="card-body">
                    <h4 class="card-title text-white"><i class="fa-regular fa-circle-user me-2"></i>Staff</h4>
                    <p class="text-white" id="staff">10 Orang</p>
                </div>
            </div>
            <div class="card col-5 col-md-5 col-lg-2 bg-info swing-in-top-fwd " style="height: 100px">
                <div class="card-body">
                    <h4 class="card-title text-white"><i class="fa-regular fa-circle-user me-2"></i>Intern</h4>
                    <p class="text-white" id="intern">10 Orang</p>
                </div>
            </div>
        </div>
        <hr>
    </section>
    <section class="container">
        <h2>Data Pegawai</h2>
        <a href="{{ route('admin-employee-create') }}" class="btn btn-primary text-white mb-4"><i
                class="fa-solid fa-address-book me-2"></i>Tambah Data Pegawai</a>
        <div class="overflow-auto">
            <table id="employee" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Jabatan</th>
                        <th>No Telp</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </section>
@endsection

@push('script')
    <script src="{{ asset('assets\js\DashboardAdmin.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        $('#employee').on('click', '#delete', function() {
            var id = $(this).data('id');

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `admin/employee/${id}`,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}',
                            _method: 'DELETE'
                        },
                        success: function(data) {
                            $('#employee').DataTable().ajax.reload();
                            Swal.fire({
                                title: 'Berhasil!',
                                text: data.success,
                                icon: 'success',
                            })
                        },
                        error: function(data) {
                            Swal.fire({
                                title: 'Gagal!',
                                text: data.error,
                                icon: 'error',
                            })
                        }
                    });
                }
            })
        });
    </script>
@endpush
