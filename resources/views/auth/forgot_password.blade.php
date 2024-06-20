@extends('auth.layouts.layout')

@section('title', 'Login Page')

@section('content')
<h5 class="text-center" style="margin-top: 150px;">
    Jika Anda Lupa Kata sandi anda, anda bisa memasukan email Akun yang terdaftar di Mahir.Futsal
  </h5>
  <form method="POST" action="{{ route('forgot.password.act') }}" class="needs-validation">
    @csrf
    <div class="mb-3">
        <input id="credential" type="text" class="form-control @error('credential') is-invalid @enderror" name="credential" value="{{ old('credential') }}" placeholder="Email" >
        @error('credential')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror   
    </div>
    <div class="d-grid">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
@endsection
