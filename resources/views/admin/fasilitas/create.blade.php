@extends('admin.layouts.parent')

@section('title', 'Fasilitas')

@section('top', 'Fasilitas Create')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <form action="{{route('fasilitas.create.process')}}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label>Nama Fasilitas</label>
                        <input type="text" name="name" class="form-control">
                      </div>
                    <div class="form-group">
                        <label for="" class="form-label">Detail Fasilitas</label>
                        <input type="text" name="detail_fasilitas" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Deskripsi</label>
                        <input type="text" name="descripsi" class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection