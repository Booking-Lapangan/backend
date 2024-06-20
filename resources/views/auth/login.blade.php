@extends('auth.layouts.layout')

@section('title', 'Login Page')

@section('content')
<h2>Selamat Datang Kembali</h2>
        <p class="text-center">
          Untuk tetap terhubung dengan kami,<br />silakan login dengan akun anda
        </p>
        <form method="POST" action="{{ route('login.process') }}">
          @csrf
          <div class="divider form-text">Login menggunakan Akun</div>
          <div class="mb-3">
            <input id="login" type="text" class="form-control @error('login') is-invalid @enderror" name="login" value="{{ old('login') }}"  placeholder="Email atau No HP">
            @error('login')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="mb-3">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password">
            @error('password')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="mb-3 form-text">
            Lupa Password?<a href="{{ route('forgot.password') }}"> Klik disini</a>
          </div>
          <div class="d-grid">
            <button type="submit" class="btn btn-primary">Login</button>
          </div>
          <div class="mt-3 form-text">
            Belum memiliki akun? <a href="{{ route('register') }}">Daftar disini</a>
          </div>
        </form>

@endsection
