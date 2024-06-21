@extends('layout.main')

@section('title', 'Dashboard')
@include('components.navbar')
<div class="container">
    <div class="row mt-4">
        <h2 class="fw-bold">Hi, {{ auth()->user()->name }} </h2>
        <h4>Selamat datang kembali</h4>
    </div>
    <div class="row mt-2">
        <div class="card col-md-2 col-lg-3 bg-info" style="height: 100px">
            <div class="card-body">
                <h4 class="card-title">Manager</h4>
                <p>10 Orang</p>
            </div>
        </div>
    </div>
</div>
@section('header')
@endsection
