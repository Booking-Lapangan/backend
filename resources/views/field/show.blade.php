@extends('layouts.parent')

@section('title','Field Show')

@section('content')
    <div class="card" style="width: 18rem;">
    <img class="card-img-top" src="..." alt="Foto Lapangan">
    <div class="card-body">
        <h5 class="card-title">{{$data->title}}</h5>
        <p class="card-text">{{$data->price}}</p>
    </div>
</div>
@endsection