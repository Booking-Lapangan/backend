@extends('rules.layout')

@section('content')
    <h1>Edit Rule</h1>
    <form action="{{ route('rules.update', $rule->id_rules) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label>Rule:</label>
            <textarea name="rules">{{ $rule->rules }}</textarea>
        </div>
        <div>
            <label>Category:</label>
            <select name="id_category">
                @foreach ($categories as $category)
                    <option value="{{ $category->id_category }}" {{ $rule->id_category == $category->id_category ? 'selected' : '' }}>{{ $category->category }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit">Update</button>
    </form>
@endsection
