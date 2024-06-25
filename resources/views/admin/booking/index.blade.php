@extends('admin.layouts.parent')

@section('title', 'Booking')

@section('top', 'Detail Booking')

@section('content')
    <div class="section-body">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Tim</th>
                                    <th>No HP</th>
                                    <th>Note</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($detail as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama_tim }}</td>
                                        <td>{{ $item->no_hp }}</td>
                                        <td>{{ $item->note }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('booking.show', $item->id) }}" class="btn btn-primary">Show</a>
                                            </div>
                                            <form action="{{ route('booking.destroy', $item->id) }}" method="POST" class="d-inline">
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
