@extends('admin.layouts.parent')

@section('title', 'Gallery')

@section('top', 'Daftar Gallery')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <form class="col-12" action="{{route('gallery.process')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="form-group">
                    <label for="" class="form-label">Gallery</label>
                    <input type="file" name="gallery" class="form-control">
                    <input type="hidden" name="lapangan_id" value="{{$lapangan->id}}">
                </div>
                <button type="submit" class="btn btn-primary mb-5">Submit</button>
           </form>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        @foreach ($gallery as $item)
                            <img src="{{asset('storage/' . $item->gallery)}}" alt="" class="mb-2" style="width: 280px">
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection