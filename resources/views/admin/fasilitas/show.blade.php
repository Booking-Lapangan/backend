@extends('admin.layouts.parent')

@section('title', 'Detail Fasilitas')

@section('top', 'Detail Fasilitas')

@section('content')
<div class="section-body">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Detail Fasilitas</h5>
                        <div class="form-group">
                            <label for="id">ID Fasilitas</label>
                            <p class="card-text">{{ $fasilitas->id }}</p>
                        </div>
                        <div class="form-group">
                            <label for="name">Nama Fasilitas</label>
                            <p class="card-text">{{ $fasilitas->name }}</p>
                        </div>
                        <div class="form-group">
                            <label for="detail">Detail Fasilitas</label>
                            <p class="card-text">{{ $fasilitas->detail_fasilitas }}</p>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <p class="card-text">{{ $fasilitas->descripsi }}</p>
                        </div>
                        <a href="{{ route('fasilitas.index') }}" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
