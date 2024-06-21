@extends('admin.layouts.parent')

@section('title', 'Create Rules')

@section('top', 'Create Rules')

@section('content')
    <div class="section-body">
        <div class="container mt-4">
            <form action="{{ route('rules.storeMultiple') }}" method="POST">
                @csrf
                <div id="rules-container">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h4>Rule Item</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Rule</label>
                                <textarea class="form-control" name="rules[]" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control" name="id_category[]">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id_category }}">{{ $category->category }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="button" class="btn btn-danger btn-sm" onclick="removeRule(this)">Remove Rule</button>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="button" class="btn btn-primary" onclick="addRule()">Add Rule</button>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function addRule() {
            const container = document.getElementById('rules-container');
            const newRule = document.createElement('div');
            newRule.className = 'card mb-3';
            newRule.innerHTML = `
                <div class="card-header">
                    <h4>Rule Item</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Rule</label>
                        <textarea class="form-control" name="rules[]" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="id_category[]">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id_category }}">{{ $category->category }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="button" class="btn btn-danger btn-sm" onclick="removeRule(this)">Remove Rule</button>
                </div>
            `;
            container.appendChild(newRule);
        }

        function removeRule(button) {
            const ruleItem = button.closest('.card');
            ruleItem.remove();
        }
    </script>
@endsection
