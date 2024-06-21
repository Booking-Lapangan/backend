@extends('admin.layouts.parent')

@section('title', 'Detail Lapangan')

@section('top', 'Detail Lapangan')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <img src="{{ asset('storage/' . $lapangan->image) }}" class="card-img-top" alt="{{ $lapangan->title }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Nama Lapangan: {{ $lapangan->title }}</h5>
                    <p class="card-text">Price: {{ $lapangan->price }}</p>

                    <hr>

                    <h6 class="card-subtitle mb-2 text-muted">Fasilitas:</h6>
                    @php
                        $fasilitas = json_decode($lapangan->fasilitas, true);
                    @endphp
                    <ul class="list-unstyled">
                        @if ($fasilitas)
                            @foreach ($fasilitas as $fasilitas_name)
                                <li>{{ $fasilitas_name }}</li>
                            @endforeach
                        @else
                            <li>Tidak ada fasilitas tersedia.</li>
                        @endif
                    </ul>

                    <hr>

                    <h6 class="card-subtitle mb-2 text-muted">Rules:</h6>
                    @php
                        $rules = json_decode($lapangan->rules, true);
                    @endphp
                    <ul class="list-unstyled">
                        @if ($rules)
                            @foreach ($rules as $rules_name)
                                <li>{{ $rules_name }}</li>
                            @endforeach
                        @else
                            <li>Tidak ada rules tersedia.</li>
                        @endif
                    </ul>

                    <a href="{{ route('lapangan.index') }}" class="btn btn-primary mt-3">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
