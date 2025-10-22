@extends('layouts.guest')

@section('title', 'Daftar')

@section('auth-title', 'Daftar Akun')

@section('auth-subtitle', 'Buat akun baru untuk mulai mencatat keuangan')

@section('content')
    <!-- Form Register -->
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="form-group">
            <label for="name" class="form-label">Nama Lengkap</label>
            <input id="name" type="text" name="name" class="form-input @error('name') error @enderror"
                value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="Masukkan nama lengkap">
            @error('name')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <!-- Phone (ganti dari email) -->
        <div class="form-group">
            <label for="phone" class="form-label">Nomor HP</label>
            <input id="phone" type="text" name="phone" class="form-input @error('phone') error @enderror"
                value="{{ old('phone') }}" required autocomplete="tel" placeholder="08123456789">
            @error('phone')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <!-- Password -->
        <div class="form-group">
            <label for="password" class="form-label">Password</label>
            <input id="password" type="password" name="password" class="form-input @error('password') error @enderror"
                required autocomplete="new-password" placeholder="Minimal 8 karakter">
            @error('password')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="form-group">
            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" class="form-input" required
                autocomplete="new-password" placeholder="Ulangi password">
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn-primary">
            Daftar Sekarang
        </button>
    </form>

    <!-- Divider -->
    <div class="divider">
        <span>atau</span>
    </div>

    <!-- Login Link -->
    <div class="auth-link">
        Sudah punya akun? <a href="{{ route('login') }}">Masuk di sini</a>
    </div>
@endsection
