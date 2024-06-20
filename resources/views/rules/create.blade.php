@extends('rules.layout')

@section('content')
    <h1>Create Rule</h1>
    <form action="{{ route('rules.storeMultiple') }}" method="POST">
        @csrf
        <div id="rules-container">
            <div class="rule-item">
                <div>
                    <label>Rule:</label>
                    <textarea name="rules[]"></textarea>
                </div>
                <div>
                    <label>Category:</label>
                    <select name="id_category[]">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id_category }}">{{ $category->category }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="button" class="remove-rule" onclick="removeRule(this)">Remove Rule</button>
            </div>
        </div>
        <button type="button" onclick="addRule()">Add Rule</button>
        <button type="submit">Save</button>
    </form>

    <script>
        function addRule() {
            const container = document.getElementById('rules-container');
            const newRule = document.createElement('div');
            newRule.className = 'rule-item';
            newRule.innerHTML = `
                <div>
                    <label>Rule:</label>
                    <textarea name="rules[]"></textarea>
                </div>
                <div>
                    <label>Category:</label>
                    <select name="id_category[]">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id_category }}">{{ $category->category }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="button" class="remove-rule" onclick="removeRule(this)">Remove Rule</button>
            `;
            container.appendChild(newRule);
        }

        function removeRule(button) {
            const ruleItem = button.parentElement;
            ruleItem.remove();
        }
    </script>
@endsection
