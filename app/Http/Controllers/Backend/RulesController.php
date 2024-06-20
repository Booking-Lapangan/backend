<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Rules;
use App\Models\RulesCategory;
use Illuminate\Http\Request;

class RulesController extends Controller
{
    public function index()
    {
        $rules = Rules::with('category')->get();
        return view('admin.rules.index', compact('rules'));
    }

    public function create()
    {
        $categories = RulesCategory::all();
        return view('admin.rules.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'rules' => 'required',
            'id_category' => 'required|exists:rules_category,id_category'
        ]);

        Rules::create($request->all());
        return redirect()->route('rules.index')->with('success', 'Rule created successfully.');
    }

    public function storeMultiple(Request $request)
    {
        $rules = $request->input('rules');
        $categories = $request->input('id_category');

        foreach ($rules as $index => $rule) {
            Rules::create([
                'rules' => $rule,
                'id_category' => $categories[$index]
            ]);
        }

        return redirect()->route('rules.index')->with('success', 'Rules created successfully.');
    }

    public function show($id)
    {
        $rule = Rules::find($id);
        return view('admin.rules.show', compact('rule'));
    }

    public function edit($id)
    {
        $rule = Rules::find($id);
        $categories = RulesCategory::all();
        return view('admin.rules.edit', compact('rule', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'rules' => 'required',
            'id_category' => 'required|exists:rules_category,id_category'
        ]);

        $rule = Rules::find($id);
        $rule->update($request->all());
        return redirect()->route('rules.index')->with('success', 'Rules Berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $rule = Rules::find($id);
        $rule->delete();
        return redirect()->route('rules.index')->with('success', 'Rules Berhasil dihapus.');
    }
}
