@extends('users.dashboard.layouts.parent')

@section('title','Profile')

@section('top','Profile')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <form action="{{route('user.edit.profile',Auth::user()->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{Auth::user()->id}}">
                    <div class="form-group">
                        <label for="" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Phone</label>
                        <input type="text" class="form-control" name="phone" value="{{Auth::user()->phone}}">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Email</label>
                        <input type="text" class="form-control" name="email" value="{{Auth::user()->email}}">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection