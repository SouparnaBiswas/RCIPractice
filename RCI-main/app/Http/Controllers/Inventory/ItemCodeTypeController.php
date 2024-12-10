<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ItemCodeType;

class ItemCodeTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $itemCodeTypes = ItemCodeType::paginate(10);

        return view('inventory.item-code-types.list', compact('itemCodeTypes'));
    }

    public function fetchData(Request $request) {
        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $itemCodeTypes = ItemCodeType::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('code_type_no', 'like', '%' . $query . '%')
                    ->orWhere('code_type_name', 'like', '%' . $query . '%');
            })
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);

            return response()->json(['data' => view('inventory.item-code-types.table', compact('itemCodeTypes'))->render()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('inventory.item-code-types.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'code_type_no' => 'required|string|max:255',
            'code_type_name' => 'required|string|max:255',
        ]);

        $item_code_type = new ItemCodeType();
        $item_code_type->code_type_no = $request->code_type_no;
        $item_code_type->code_type_name = $request->code_type_name;
        $item_code_type->save();

        session()->flash('message', 'Item Code Type added successfully');
        return response()->json(['success' => 'Item Code Type added successfully']);


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
        $item_code_type = ItemCodeType::find($id);
        $edit = true;

        // return view('inventory.item-code-types.form', compact('item_code_type', 'edit'));
        return response()->json(['view' => view('inventory.item-code-types.form', compact('edit','item_code_type'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'code_type_no' => 'required|string|max:255',
            'code_type_name' => 'required|string|max:255',
        ]);

        $item_code_type = ItemCodeType::find($id);
        $item_code_type->code_type_no = $request->code_type_no;
        $item_code_type->code_type_name = $request->code_type_name;
        $item_code_type->save();

        session()->flash('message', 'Item Code Type updated successfully');
        return response()->json(['success' => 'Item Code Type updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function delete(Request $request)
    {
        $item_code_type = ItemCodeType::find($request->id);
        $item_code_type->delete();

        return redirect()->back()->with('message','Item Code Type deleted succsessfully');
    }
}
