@extends('layouts.parent')

@section('title', 'Master Data')

@section('top', 'Master Data')

@section('content')
    <div class="container-fluid">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Master</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Fasilitas</td>
                    <td>
                        <a href="#" class="btn btn-primary">Create</a>
                        <a href="#" class="btn btn-warning">Edit</a>
                    </td>
                </tr>
                <tr>
                    <td>Rules</td>
                    <td>
                        <a href="#" class="btn btn-primary">Create</a>
                        <a href="#" class="btn btn-warning">Edit</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
