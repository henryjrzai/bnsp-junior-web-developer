@extends('layout.main')

@section('title', 'Tambah Data Pegawai')

@section('header')
    @include('components.navbar')
@endsection

@section('content')
    <div class="container">
        <div class="d-flex justify-content-center align-items-center" style="height: 85vh">
            <div class="card shadow-sm p-3 col-md-8 col-lg-6">
                <a href="{{ route('dashboard') }}" class="text-decoration-none mb-3"><i
                        class="fa-solid fa-circle-left me-2"></i>Kembali ke dashboard</a>
                <h3>Data Pegawai</h3>
                <form id="employee-form" method="POST" action="{{ route('admin-employee-store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="name" placeholder="Nama Lengkap" name="name">
                        <label for="name" class="text-black-50">Nama Lengkap</label>
                        @error('name')
                            <span class="text-danger fst-italic">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" placeholder="Email pegawai"
                            name="email">
                        <label for="email" class="text-black-50">Email Pegawai</label>
                        @error('email')
                            <span class="text-danger fst-italic">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <select class="form-select py-3" name="position">
                            <option selected hidden class="text-black-50">Pilih Posisi Pegawai</option>
                            <option value="Manager">Manager</option>
                            <option value="Lead">Lead</option>
                            <option value="Staff">Staff</option>
                            <option value="Intern">Intern</option>
                        </select>
                        @error('position')
                            <span class="text-danger fst-italic">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="phone" placeholder="Nomor Telepon"
                            name="phone">
                        <label for="phone" class="text-black-50">Nomor Telepon</label>
                        @error('phone')
                            <span class="text-danger fst-italic">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="Alamat" id="address" name="address"></textarea>
                        <label for="address">Alamat</label>
                        @error('address')
                            <span class="text-danger fst-italic">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Foto Pegawai</label>
                        <input class="form-control" type="file" id="image" name="image" accept=".jpg,.jpeg,.png">
                        @error('image')
                            <span class="text-danger fst-italic">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary text-white float-end"><i
                            class="fa-solid fa-floppy-disk me-2"></i>Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
