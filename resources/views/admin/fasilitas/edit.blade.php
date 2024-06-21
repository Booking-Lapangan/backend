@extends('admin.layouts.parent')

@section('title', 'Edit Fasilitas')

@section('top', 'Fasilitas Edit')

@section('content')
<div class="section-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('fasilitas.update', $fasilitas->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Nama Fasilitas</label>
                                <input type="text" id="name" name="name" class="form-control" value="{{ $fasilitas->name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="detail_fasilitas">Detail Fasilitas</label>
                                <input type="text" id="detail_fasilitas" name="detail_fasilitas" class="form-control" value="{{ $fasilitas->detail_fasilitas }}">
                            </div>
                            <div class="form-group">
                                <label for="descripsi">Deskripsi</label>
                                <textarea id="descripsi" name="descripsi" class="form-control">{{ $fasilitas->descripsi }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
