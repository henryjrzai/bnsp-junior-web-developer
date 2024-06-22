@extends('layout.main')

@section('title', 'Detail Pegawai')

@section('header')
    @include('components.navbar')
@endsection

@section('content')
    <div class="container mt-4">
		<div class="row shadow p-5 justify-content-center gap-3">
			<a href="{{ route('dashboard') }}" class="text-decoration-none mb-3"><i
					class="fa-solid fa-circle-left me-2"></i>Kembali ke data pegawai</a>
            <div class=" col-md-10 col-lg-5">
                <h3>Detail Pegawai</h3>
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="name" value="{{ $employee->name }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email Pegawai</label>
                    <input type="email" class="form-control" id="email" value="{{ $employee->email }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="position" class="form-label">Posisi Pegawai</label>
                    <input type="text" class="form-control" id="position" value="{{ $employee->position }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Nomor Telepon</label>
                    <input type="text" class="form-control" id="phone" value="{{ $employee->phone }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Alamat</label>
                    <textarea class="form-control" id="address" rows="3" readonly>{{ $employee->address }}</textarea>
                </div>
            </div>
            <div class="p-3 col-md-10 col-lg-5">
                <div class="mb-3">
                    <img src="{{ asset('assets/employee/' . $employee->image) }}" class="img-thumbnail rounded-3" alt="Foto Pegawai">
                </div>
            </div>
        </div>
    @endsection
