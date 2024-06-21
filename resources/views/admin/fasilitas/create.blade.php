@extends('admin.layouts.parent')

@section('title', 'Fasilitas')

@section('top', 'Fasilitas Create')

@section('content')
    <div class="section-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('fasilitas.create.process') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Nama Fasilitas</label>
                                    <input type="text" id="name" name="name" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="detail_fasilitas">Detail Fasilitas</label>
                                    <input type="text" id="detail_fasilitas" name="detail_fasilitas" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea id="deskripsi" name="descripsi" class="form-control"></textarea>
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