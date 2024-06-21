@extends('admin.layouts.parent')

@section('title', 'Fasilitas')

@section('top', 'Daftar Fasilitas')

@section('content')
<div class="section-body">
    <div class="container-fluid">
        <a href="{{ route('fasilitas.create') }}" class="btn btn-primary mb-3">Tambah Fasilitas</a>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nama Fasilitas</th>
                                <th style="width: 200px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('fasilitas.show', $item->id) }}" class="btn btn-primary mr-1">Detail</a>
                                            <a href="{{ route('fasilitas.edit', $item->id) }}" class="btn btn-warning mr-1">Edit</a>
                                            <form action="{{ route('fasilitas.delete', $item->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button value="{{ $item->id }}" class="btn btn-danger" type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus fasilitas ini?')">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2">Tidak ada fasilitas yang tersedia.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
