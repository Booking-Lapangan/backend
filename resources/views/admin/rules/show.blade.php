<!-- resources/views/admin/rules/detail.blade.php -->

@extends('admin.layouts.parent')

@section('title', 'Detail Rule')

@section('top', 'Detail Rule')

@section('content')
<div class="section-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">ID: {{ $rule->id_rules }}</h5>
                        <p class="card-text">Rules: {{ $rule->rules }}</p>
                        <p class="card-text">Category: {{ $rule->category->category }}</p>
                        <a href="{{ route('rules.index') }}" class="btn btn-primary">Back to Rules</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
