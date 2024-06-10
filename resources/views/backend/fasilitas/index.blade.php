@extends('layouts.parent')

@section('title', 'Fasilitas')

@section('top', 'Daftar Fasilitas')

@section('content')
<div class="container-fluid">
    <a href="{{ route('fasilitas.create') }}" class="btn btn-primary mb-3">Tambah Fasilitas</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Fasilitas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>
                        <a href="{{ route('fasilitas.show', $item->id) }}" class="btn btn-primary">Detail</a>
                        <a href="{{ route('fasilitas.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('fasilitas.delete', $item->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button value="{{ $item->id }}" class="btn btn-danger" type="submit">Delete</button>
                        </form>
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
@endsection


@push('js')
    @if (session('success'))
        <script>
            Swal.fire({
                icon: "success",
                title: "Yeayyy",
                text: "{{ session('success') }}",
            });
        </script>
    @endif
@endpush