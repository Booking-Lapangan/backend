@extends('admin.layouts.parent')

@section('title','Lapangan Edit')

@section('top',"Lapangan $lapangan->title")

@section('content')
    <form action="{{route('lapangan.update',$lapangan->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mt-3 mb-3">
            <label class="form-label" for="image">Image</label>
            <input class="form-control" type="file" name="image" id="image">
        </div>
        <div class="mt-3 mb-3">
            <label class="form-label" for="title">Field</label>
            <input class="form-control" type="text" name="title" value="{{$lapangan->title}}" id="title">
        </div>
        <div class="mt-3 mb-3">
            <label class="form-label" for="price">Price</label>
            <input class="form-control" type="string" value="{{$lapangan->price}}" name="price" id="price">
        </div>
        <label class="form-label" for="fasilitas_id">Fasilitas</label>
        <div class=" mb-3">
            @php
                $fasilitasArray = json_decode($lapangan->fasilitas);
            @endphp
            @forelse ($fasilitas as $item)
            <div class="d-flex">
                <input class="form-checkbox mr-2" type="checkbox" value="{{$item->name}}"  {{ in_array($item->name, $fasilitasArray) ? 'checked' : '' }} name="fasilitas[]" id="fasilitas_id">
                <label class="form-label mt-2" for="fasilitas_id">{{$item->name}}</label>
            </div>
            @empty
            @endforelse
        </div>
        <label class="form-label" for="rules_id">Rules</label>
        <div class=" mb-3">
            @php
                $rulesArray = json_decode($lapangan->rules);
            @endphp
            @forelse ($rules as $item)
            <div class="d-flex">
                <input class="form-checkbox mr-2" type="checkbox" value="{{$item->rules}}"  {{ in_array($item->rules, $rulesArray) ? 'checked' : '' }} name="rules[]" id="rules_id">
                <label class="form-label mt-2" for="rules_id">{{$item->rules}}</label>
            </div>
            @empty
            @endforelse
        </div>
        <div class="mb-3">
            <button class="btn btn-warning" type="submit">Submit</button>
        </div>
    </form>
@endsection