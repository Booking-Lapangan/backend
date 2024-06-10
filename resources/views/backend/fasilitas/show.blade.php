@extends('layouts.parent')

@section('title', 'Detail Fasilitas')

@section('top', 'Detail Fasilitas')

@section('content')
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <label for="" class="form-label">ID Fasilitas</label>
            <h5 class="card-title">{{ $fasilitas->id }}</h5>
            <label for="" class="form-label">Nama Fasilitas</label>
            <h5 class="card-title">{{ $fasilitas->name }}</h5>
            <label for="" class="form-label">Detail Fasilitas</label>
            <span class="card-title">{{ $fasilitas->detail_fasilitas }}</span><br>
            <label for="" class="form-label">Deskripsi</label>
            <h5 class="card-title">{{ $fasilitas->descripsi }}</h5>
            <a href="{{ route('fasilitas.index') }}" class="btn btn-primary">Go Back</a>
        </div>
    </div>
@endsection
