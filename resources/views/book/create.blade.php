@extends('layouts.parent')

@section('title','Book Create')

@section('content')
    <form action="{{route('book.store')}}" method="POST">
        @csrf
        @method('POST')
        <div class="mt-3 mb-3">
            <label class="form-label" for="field">Field</label>
            <select class="form-select" name="" id="">
                <option value="">Lapangan Sintetis</option>
                <option value="">Lapangan Organik</option>
            </select>
        </div>
        <div class="mt-3 mb-3">
            <label class="form-label" for="date">Date</label>
            <input class="form-control" type="date" name="date" id="">
        </div>
        <div class="mt-3 mb-3">
            <label class="form-label" for="status">Status</label>
            <select class="form-select" name="" id="">
                <option value="">Booking</option>
                <option value="">Available</option>
            </select>
        </div>
        <div class="mb-3">
            <button class="btn btn-warning" type="submit">Submit</button>
        </div>
    </form>
@endsection