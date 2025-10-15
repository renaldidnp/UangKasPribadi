@extends('layouts.guest')

@section('title', 'Login')

@section('auth-title', 'Kas Kecil')

@section('auth-subtitle', 'Kelola keuangan pribadi dengan mudah')

@section('content')
    <!-- Session Status -->
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <!-- Form Login -->
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email -->
        <div class="form-group">
            <label for="email" class="form-label">Email</label>
            <input id="email" type="email" name="email" class="form-input @error('email') error @enderror"
                value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="nama@email.com">
            @error('email')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <!-- Password -->
        <div class="form-group">
            <label for="password" class="form-label">Password</label>
            <input id="password" type="password" name="password" class="form-input @error('password') error @enderror"
                required autocomplete="current-password" placeholder="Masukkan password">
            @error('password')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <!-- Remember Me & Forgot Password -->
        <div class="remember-forgot">
            <label class="remember-me">
                <input type="checkbox" name="remember" id="remember_me">
                <span>Ingat saya</span>
            </label>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="forgot-link">
                    Lupa password?
                </a>
            @endif
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn-primary">
            Masuk
        </button>
    </form>

    <!-- Divider -->
    <div class="divider">
        <span>atau</span>
    </div>

    <!-- Register Link -->
    <div class="auth-link">
        Belum punya akun? <a href="{{ route('register') }}">Daftar sekarang</a>
    </div>
@endsection
