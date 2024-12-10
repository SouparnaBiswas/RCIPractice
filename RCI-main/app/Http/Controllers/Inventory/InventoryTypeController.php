<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InventoryType;

class InventoryTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $itemTypes = InventoryType::orderBy('id', 'desc')->paginate(10);
        return view('inventory.inventory-types.list', compact('itemTypes'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $itemTypes = InventoryType::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('id', 'like', '%' . $query . '%')
                    ->orWhere('name', 'like', '%' . $query . '%')
                    ->orWhere('status', '=', $query == 'Active' ? 1 : ($query == 'Inactive' ? 0 : null));
            })
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);

            return response()->json(['data' => view('inventory.inventory-types.table', compact('itemTypes'))->render()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:inventory_types,name',
            'status' => 'required',
        ]);

        $item_type = new InventoryType();
        $item_type->name = $request->name;
        $item_type->status = $request->status;
        $item_type->save();

        session()->flash('message', 'Inventory Type added successfully');
        return response()->json(['success' => 'Inventory Type added successfully']);
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
        $item_type = InventoryType::find($id);
        $edit = true;
        return response()->json(['view' => view('inventory.inventory-types.form', compact('edit','item_type'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|unique:item_types,name,'.$id,
            'status' => 'required',
        ]);

        $item_type = InventoryType::find($id);
        $item_type->name = $request->name;
        $item_type->status = $request->status;
        $item_type->update();

        session()->flash('message', 'Inventory Type updated successfully');
        return response()->json(['success' => 'Inventory Type updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function delete($id)
    {
        $item_type = InventoryType::find($id);
        $item_type->delete();

        return redirect()->back()->with('message','Inventory Type deleted succsessfully');
    }
}
