@extends('rules.layout')

@section('content')
    <h1>Rules</h1>
    <a href="{{ route('rules.create') }}">Create New Rule</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Rule</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rules as $rule)
                <tr>
                    <td>{{ $rule->id_rules }}</td>
                    <td>{{ $rule->rules }}</td>
                    <td>{{ $rule->category->category }}</td>
                    <td>
                        <a href="{{ route('rules.edit', $rule->id_rules) }}">Edit</a>
                        <form action="{{ route('rules.destroy', $rule->id_rules) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
