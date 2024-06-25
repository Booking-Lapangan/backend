@extends('users.dashboard.layouts.parent')

@section('title','History Booking')

@section('top','History Booking')

@section('content')
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Lapangan</th>
                <th>Status Pembayaran</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookings as $booking )
                
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $booking->lapangan->title }}</td>
                <td>Sudah Dibayar</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection