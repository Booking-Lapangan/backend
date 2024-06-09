@extends('layouts.custom')

@section('title', 'Register')

@section('content')

<div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
 <div class="login-brand">
   <img src="stisla/assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
 </div>

 <div class="card card-primary">
   <div class="card-header"><h4>Register</h4></div>

   <div class="card-body">
    <form action="{{ route('register.process') }}" method="POST">
      @csrf
  
      <div class="row">
          <div class="form-group col-6">
              <label for="name">Nama</label>
              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
              @error('name')
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
          </div>
          <div class="form-group col-6">
              <label for="phone">Nomor HP</label>
              <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}">
              @error('phone')
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
          </div>
      </div>
  
      <div class="form-group">
        <label for="email">Email</label>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    
  
      <div class="row">
          <div class="form-group col-6">
              <label for="password" class="d-block">Password</label>
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">
              @error('password')
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
          </div>
          <div class="form-group col-6">
              <label for="password" class="d-block">Password Confirmation</label>
              <input id="password" type="password" class="form-control  @error('password_confirmation') is-invalid @enderror" name="password_confirmation">
              @error('password_confirmation')
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
          </div>
      </div>
  
      <div class="form-group">
          <div class="custom-control custom-checkbox">
              <input type="checkbox" name="agree" class="custom-control-input" id="agree">
              <label class="custom-control-label" for="agree">I agree with the terms and conditions</label>
          </div>
          @error('agree')
              <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
          @enderror
      </div>
  
      <div class="form-group">
          <button type="submit" class="btn btn-primary btn-lg btn-block">Register</button>
      </div>
  </form>
  
   </div>
 </div>
 <div class="simple-footer">
   Copyright &copy; Stisla 2018
 </div>
</div>

@endsection