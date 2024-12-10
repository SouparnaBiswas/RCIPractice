<?php

namespace App\Http\Controllers\Imprest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VariableType;

class VariableTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $variableTypes = VariableType::orderBy('id', 'desc')->paginate(10);
        return view('imprest.variable-types.list', compact('variableTypes'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $variableTypes = VariableType::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('name', 'like', '%' . $query . '%')
                    ->orWhere('status', '=', $query == 'Active' ? 1 : ($query == 'Inactive' ? 0 : null));
            })
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);

            return response()->json(['data' => view('imprest.variable-types.table', compact('variableTypes'))->render()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('imprest.variable-types.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'var_type' => 'required|string',
            'status' => 'required',
        ]);

        $variableType = new VariableType();
        $variableType->name = $request->var_type;
        $variableType->status = $request->status;
        $variableType->save();

        session()->flash('message', 'Variable types added successfully');
        return response()->json(['success' => 'Variable types added successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $variableType = VariableType::findOrFail($id);
        $edit = true;
        return response()->json(['view' => view('imprest.variable-types.form', compact('variableType', 'edit'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        $variableType = VariableType::findOrFail($id);
        $variableType->name = $request->name;
        $variableType->status = $request->status;
        $variableType->save();

        session()->flash('message', 'Variable types updated successfully');
        return response()->json(['success' => 'Variable types updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $variableType = VariableType::where('id', $id)->first();
        $variableType->delete();

        return redirect()->route('variable-type.index')->with('message', 'Variable Type deleted successfully.');
    }
}
