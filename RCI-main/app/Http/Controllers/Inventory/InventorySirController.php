<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InventorySir;

class InventorySirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $sirs = InventorySir::orderBy('id','desc')->paginate(10);
        return view('inventory.sirs.list',compact('sirs'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $sirs = InventorySir::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('id', 'like', '%' . $query . '%')
                    ->orWhere('sir_no', 'like', '%' . $query . '%')
                    ->orWhere('sir_date', 'like', '%' . $query . '%')
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
        // validation 
        $request->validate([
            'sir_no' => 'required',
            'sir_date' => 'required',
            'status' => 'required',
        ]);

        $sir_save = InventorySir::create([
            'sir_no' => $request->sir_no,
            'sir_date' => $request->sir_date,
            'status' => $request->status,
        ]);

        session()->flash('message', 'Sir added successfully');
        return response()->json(['success' => 'Sir added successfully']);
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
        $sir = InventorySir::where('id',$id)->first();
        $edit = true;
        return response()->json(['view' => view('inventory.sirs.form', compact('edit','sir'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         // validation 
         $request->validate([
            'sir_no' => 'required',
            'sir_date' => 'required',
            'status' => 'required',
        ]);

        $sir_save = InventorySir::where('id',$id)->update([
            'sir_no' => $request->sir_no,
            'sir_date' => $request->sir_date,
            'status' => $request->status,
        ]);


        session()->flash('message', 'Sir updated successfully');
        return response()->json(['success' => 'Sir updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
