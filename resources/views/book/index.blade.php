@extends('layouts.parent')

@section('title','Book')

@section('content')
    <table class="table bordered">
        <thead>
            <th>ID</th>
            {{-- <th>User</th> --}}
            <th>Field</th>
            {{-- <th>Schedule</th> --}}
            <th>Date</th>
            <th>Status</th>
        </thead>
        @foreach ($data as $item)
            <tbody>
                <td>{{$item->id}}</td>
                {{-- <td>{{$item->user}}</td> --}}
                <td>{{$item->field}}</td>
                {{-- <td>{{$item->schedule}}</td> --}}
                <td>{{$item->date}}</td>
                <td>{{$item->status}}</td>
                {{-- <td>
                    <a href="{{route('field.show',$item->id)}}" class="btn btn-primary">Show</a>
                    <a href="{{route('field.edit',$item->id)}}" class="btn btn-warning">Edit</a>
                    <form action="{{route('field.destroy',$item->id)}}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>  --}}
            </tbody>
        @endforeach
    </table>
@endsection 


