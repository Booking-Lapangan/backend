@extends('admin.layouts.parent')

@section('title', 'Lapangan')

@section('top', 'Daftar Lapangan')

@section('content')
    <div class="section-body">
        <div class="container-fluid">
            <a href="{{ route('lapangan.create') }}" class="btn btn-primary mb-3">Tambah Lapangan</a>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Lapangan</th>
                                    <th>Price</th>
                                    <th>Fasilitas</th>
                                    <th>Gallery</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lapangan as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td>
                                            @php
                                                $fasilitas = json_decode($item->fasilitas, true);
                                            @endphp
                                            <ul>
                                                @if ($fasilitas)
                                                    @foreach ($fasilitas as $fasilitas_name)
                                                        <li>{{ $fasilitas_name }}</li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                        </td>
                                        <td>
                                            <a href="{{ route('gallery.index', $item->id) }}" class="btn btn-primary">Gallery</a>
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('lapangan.show', $item->id) }}" class="btn btn-primary">Detail</a>
                                            </div>
                                                <a href="{{ route('lapangan.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                            <form action="{{ route('lapangan.destroy', $item->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin akan dihapus?')">Delete</button>
                                            </form>
                                        </td>
                                        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
