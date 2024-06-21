@extends('admin.layouts.parent')

@section('title', 'Rules')

@section('top', 'Daftar Rules')

@section('content')
<div class="section-body">
    <div class="container-fluid">
        <a href="{{ route('rules.create') }}" class="btn btn-primary mb-3">Tambah Lapangan</a>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-md">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Rules</th>
                                        <th>Kategori</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rules as $rule)
                                    <tr>
                                        <td>{{ $rule->id_rules }}</td>
                                        <td>{{ $rule->rules }}</td>
                                        <td>{{ $rule->category->category }}</td>
                                        <td>
                                            <div class="btn-group" >
                                                <a href="{{ route('rules.show', $rule->id_rules) }}" class="btn btn-primary mr-2">Detail</a>
                                                <a href="{{ route('rules.edit', $rule->id_rules) }}" class="btn btn-warning mr-1">Edit</a>
                                                <form action="{{ route('rules.destroy', $rule->id_rules) }}" method="POST" onsubmit="return confirm('Yakin akan dihapus?')" class="ml-1">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
