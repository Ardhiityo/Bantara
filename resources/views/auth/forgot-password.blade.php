@extends('layouts.auth')

@section('content')
    <div class="col-lg-5 col-12">
        <div id="auth-left">
            <h1 class="auth-title mb-0">Bantara</h1>
            <p>Banten Talenta Kreatif Disabilitas</p>
            <p class="auth-subtitle mb-5">Input your email and we will send you reset password link.</p>

            <form action="{{ route('password.email') }}" method="POST">
                @csrf
                @if (session('status'))
                    <div class="alert alert-success">
                        <p> {{ session('status') }}</p>
                    </div>
                @endif
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="email" class="form-control form-control-xl" placeholder="Email" name="email">
                    <div class="form-control-icon">
                        <i class="bi bi-envelope"></i>
                    </div>
                    @error('email')
                        <div class="text-danger fw-bold">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Send</button>
            </form>
            <div class="text-center mt-5 text-lg fs-4">
                <p class='text-gray-600'>Remember your account? <a href="{{ route('login') }}" class="font-bold">Log in</a>.
                </p>
            </div>
        </div>
    </div>
    <div class="col-lg-7 d-none d-lg-block">
        <div id="auth-right">

        </div>
    </div>
@endsection
