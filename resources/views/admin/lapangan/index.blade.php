@extends('admin.layouts.parent')

@section('title', 'Lapangan')

@section('top', 'Lapangan')

@section('content')
    <a href="{{ route('lapangan.create') }}" class="btn btn-primary mb-2">Add Lapangan</a>
    <table class="table bordered">
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
                        <a href="{{route('gallery.index',$item->title)}}" class="btn btn-primary">Klik</a>
                    </td>
                    <td>
                        <a href="{{ route('lapangan.show', $item->id) }}" class="btn btn-primary">Show</a>
                        <a href="{{ route('lapangan.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('lapangan.destroy', $item->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
