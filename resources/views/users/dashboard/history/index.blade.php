@extends('users.dashboard.layouts.parent')

@section('title','History Booking')

@section('top','History Booking')

@section('content')
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Lapangan</th>
            <th>Waktu</th>
            <th>Status Pembayaran</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($bookings as $booking)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $booking->lapangan->title }}</td>
            <td>{{ $booking->schedule->formatted_time }}</td>
            <td>{{ $booking->status }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection