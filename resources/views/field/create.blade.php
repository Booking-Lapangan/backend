@extends('layouts.parent')

@section('title','Field Create')

@section('content')
    <form action="{{route('field.store')}}" method="POST">
        @csrf
        @method('POST')
        <div class="mt-3 mb-3">
            <label class="form-label" for="title">Field</label>
            <input class="form-control" type="text" name="title" id="title">
        </div>
        <div class="mt-3 mb-3">
            <label class="form-label" for="price">Price</label>
            <input class="form-control" type="int" name="price" id="price">
        </div>
        {{-- <div class="mt-3 mb-3">
            <label class="form-label" for="fasilitas_id">Fasilitas ID</label>
            <input class="form-control" type="text" name="fasilitas_id" id="fasilitas_id">
        </div> --}}
        <div class="mb-3">
            <button class="btn btn-warning" type="submit">Submit</button>
        </div>
    </form>
@endsection