@extends('auth.layouts.layout')

@section('title', 'Reset Password')

@section('content')
<h2>Reset Password</h2>
<p class="text-center">Masukkan password baru Anda</p>
<form method="POST" action="{{ route('validasi.forgot.password.act') }}" class="needs-validation">
    @csrf
  <div class="divider form-text">Reset Password</div>
  <input type="hidden" name="otp" value="{{ $otp }}">
  <div class="mb-3">
    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" tabindex="1" placeholder="Password Baru">
    @error('password')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
  </div>
  <div class="mb-3">
    <input id="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="Konfirmasi Password Baru">
    @error('password_confirmation')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
  </div>
  <div class="d-grid">
    <button type="submit" class="btn btn-primary">Confirm</button>
  </div>
</form>

@endsection
