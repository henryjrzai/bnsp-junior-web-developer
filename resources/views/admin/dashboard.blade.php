@extends('layout.main')

@section('title', 'Dashboard')

@section('header')
    @include('components.navbar')
@endsection

@section('content')
    <section class="container">
        <div class="row mt-4">
            <h2 class="fw-bold">Hi, {{ auth()->user()->name }} </h2>
            <h4>Selamat datang kembali</h4>
        </div>
        <hr>
        <div class="row justify-content-around gap-1 mt-2 px-2">
            <div class="card col-5 col-md-5 col-lg-2 bg-info" style="height: 100px">
                <div class="card-body">
                    <h4 class="card-title text-white"><i class="fa-regular fa-circle-user me-2"></i>Manager</h4>
                    <p class="text-white" id="manager">10 Orang</p>
                </div>
            </div>
            <div class="card col-5 col-md-5 col-lg-2 bg-info" style="height: 100px">
                <div class="card-body">
                    <h4 class="card-title text-white"><i class="fa-regular fa-circle-user me-2"></i>Lead</h4>
                    <p class="text-white" id="lead">10 Orang</p>
                </div>
            </div>
            <div class="card col-5 col-md-5 col-lg-2 bg-info" style="height: 100px">
                <div class="card-body">
                    <h4 class="card-title text-white"><i class="fa-regular fa-circle-user me-2"></i>Staff</h4>
                    <p class="text-white" id="staff">10 Orang</p>
                </div>
            </div>
            <div class="card col-5 col-md-5 col-lg-2 bg-info" style="height: 100px">
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
        <a href="{{ route('admin-employee-create') }}" class="btn btn-primary text-white mb-4"><i class="fa-solid fa-address-book me-2"></i>Tambah Data Pegawai</a>
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
    </section>
@endsection

@push('script')
    <script src="{{ asset('assets\js\DashboardAdmin.js') }}"></script>
@endpush
