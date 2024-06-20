@extends('auth.layouts.layout')

@section('title', 'Reset Password Page')

@section('content')
<h2>Verifikasi Nomor HP</h2>
<p class="text-center">
  Kode sudah dikirim melalui Nomor WhatsApp<br />silakan masukkan kode
  anda
</p>
<form method="POST" action="{{ route('verify.process') }}" class="needs-validation">
@csrf
  <div class="divider form-text">Verifikasi Akun</div>
  <div class="mb-3">
    <input id="otp" type="text" class="form-control @error('otp') is-invalid @enderror" name="otp" tabindex="1"  >
    @error('otp')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>

  <div class="d-grid">
    <button type="submit" class="btn btn-primary">Verify</button>
  </div>
</form>

@endsection
