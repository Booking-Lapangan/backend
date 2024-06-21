@extends('admin.layouts.parent')

@section('title', 'Detail Lapangan')

@section('top', 'Detail Lapangan')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <img src="{{asset('storage/' . $lapangan->image)}}" alt="" style="width: 500px">
            </div>
            <div class="col-6">
                <div class="card-body">
                    <label for="" class="form-label">Nama Lapangan</label>
                    <h5 class="card-title">{{ $lapangan->title }}</h5>
                    <label for="" class="form-label">Price</label>
                    <p class="card-text">{{ $lapangan->price }}</p>
                    <label for="" class="form-label">Fasilitas</label>
                    @php
                        $fasilitas = json_decode($lapangan->fasilitas, true);
                    @endphp
                        <ul>
                            @if ($fasilitas)
                                @foreach ($fasilitas as $fasilitas_name)
                                    <li>{{ $fasilitas_name }}</li>
                                @endforeach
                            @endif
                        </ul>
                    <a href="{{ route('lapangan.index') }}" class="btn btn-primary">Go Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
