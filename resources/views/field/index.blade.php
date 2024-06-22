@extends('layouts.parent')

@section('title','Field')

@section('content')
    <table class="table bordered">
        <thead>
            <th>ID</th>
            <th>Field</th>
            <th>Price</th>
            <th>Fasilitas</th>
            <th>Gallery</th>
            <th>Action</th>
        </thead>
        @foreach ($data as $item)
            <tbody>
                <td>{{$item->id}}</td>
                <td>{{$item->title}}</td>
                <td>{{$item->price}}</td>
                <td>{{$item->fasilitas}}</td>
                <td><button onclick="" class="btn btn-primary">Klik</button></td>
                <td>
                    <a href="{{route('field.show',$item->id)}}" class="btn btn-primary">Show</a>
                    <a href="{{route('field.edit',$item->id)}}" class="btn btn-warning">Edit</a>
                    <form action="{{route('field.destroy',$item->id)}}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tbody>
        @endforeach
    </table>
@endsection
