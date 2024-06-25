@extends('admin.layouts.parent')

@section('title', 'Detail Booking')

@section('top', 'Detail Booking')

@section('content')
<div class="section-body">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Detail Booking</h5>
                        <div class="form-group">
                            <label for="id">ID Fasilitas</label>
                            <p class="card-text">{{ $detail->id }}</p>
                        </div>
                        <div class="form-group">
                            <label for="name">Nama Tim</label>
                            <p class="card-text">{{ $detail->nama_tim }}</p>
                        </div>
                        <div class="form-group">
                            <label for="detail">Email</label>
                            <p class="card-text">{{ $detail->email }}</p>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">No Hp</label>
                            <p class="card-text">{{ $detail->no_hp }}</p>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Note</label>
                            <p class="card-text">{{ $detail->note }}</p>
                        </div>
                        <a href="{{ route('booking.index') }}" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
