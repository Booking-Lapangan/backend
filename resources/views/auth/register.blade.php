@extends('auth.layouts.layout')

@section('title', 'Register')

@section('content')
<h2>Buat Akun</h2>  
<div class="divider form-text">Registrasi Akun</div>

<form action="{{ route('register.process') }}" method="POST">
    @csrf
    <div class="mb-3">
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Nama">
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="Nomor HP">
        @error('phone')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email">
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password">
        @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <input id="password" type="password" class="form-control  @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="Konfirmasi Password">
        @error('password_confirmation')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="d-grid">
      <button type="submit" class="btn btn-primary">Daftar</button>
    </div>
    <div class="mt-3 form-text">
      Sudah memiliki akun? <a href="{{ route('login') }}">Masuk disini</a>
    </div>
  </form>

@endsection
