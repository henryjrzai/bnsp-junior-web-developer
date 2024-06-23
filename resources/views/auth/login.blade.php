@extends('layout.main')

@section('title', 'Login')

@section('content')
    <div class="container min-vh-100 d-flex align-items-center">
        <div class="card p-5 shadow-sm col-md-8 col-lg-4 m-auto">
			<img src="{{ asset('assets/image/login.png') }}" alt="login" class="img-fluid fade-in-top">
            <h2 class="text-center my-3 flicker-in-1">Login</h2>
            <form method="POST" action="{{ route('authenticate') }}">
                @csrf
				<div class="form-floating mb-3 slide-in-left">
					<input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
					<label for="floatingInput">Email address</label>
                    @error('email')
                        <span class="text-danger fst-italic">{{ $message }}</span>
                    @enderror
				  </div>
                <div class="input-group mb-3 slide-in-left">
				    <div class="form-floating">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                        <label for="floatingPassword">Password</label>
                        @error('password')
                            <span class="text-danger fst-italic">{{ $message }}</span>
                        @enderror
				    </div>
                </div>
                <div class="d-flex mt-5 justify-content-center slide-in-left">
                    <button type="submit" class="btn btn-primary text-white w-50"><i class="fa-solid fa-right-to-bracket me-2"></i> Login</button>
                </div>
            </form>
        </div>
    </div>
@endsection
