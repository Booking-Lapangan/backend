@extends('admin.layouts.parent')

@section('title', 'Edit Rules')

@section('top', 'Edit Rules')

@section('content')
<div class="section-body">
    <div class="container mt-4">
        <form action="{{ route('rules.update', $rule->id_rules) }}" method="POST">
            @csrf
            @method('PUT')
            <div id="rules-container">
                <div class="card mb-3">
                    <div class="card-header">
                        <h4>Edit Rule</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="rules">Rules</label>
                            <textarea class="form-control" name="rules" rows="3">{{ $rule->rules }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="id_category">Kategori</label>
                            <select class="form-control" name="id_category">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id_category }}" {{ $rule->id_category == $category->id_category ? 'selected' : '' }}>{{ $category->category }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
