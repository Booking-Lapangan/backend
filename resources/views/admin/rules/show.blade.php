@extends('rules.layout')

@section('content')
    <h1>Rule Details</h1>
    <p>ID: {{ $rule->id_rules }}</p>
    <p>Rule: {{ $rule->rules }}</p>
    <p>Category: {{ $rule->category->category }}</p>
    <a href="{{ route('rules.index') }}">Back</a>
@endsection
