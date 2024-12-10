<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InventoryNumber;
use App\Models\InventoryType;
use App\Models\Member;
use App\Models\InventoryProject;
use App\Models\Group;
use App\Models\User;
use Illuminate\Support\Str;

class InventoryNumberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inventoryNumbers = InventoryNumber::orderBy('id', 'desc')->paginate(10);
        $itemTypes = InventoryType::orderBy('id','desc')->get();
        $members = User::role('MATERIAL-MANAGER')->get();
        $groups = Group::orderBy('id','desc')->get();
        $invProjects = InventoryProject::orderBy('id','desc')->where('status', 1)->get();
        
        return view('inventory.inventory-numbers.list', compact('inventoryNumbers','itemTypes','members','invProjects','groups'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $inventoryNumbers = InventoryNumber::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('id', 'like', '%' . $query . '%')
                    ->orWhere('inventory_type', 'like', '%' . $query . '%')
                    ->orWhere('number', 'like', '%' . $query . '%')
                    ->orWhere('status', '=', $query == 'Active' ? 1 : ($query == 'Inactive' ? 0 : null));
            })
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);

            return response()->json(['data' => view('inventory.inventory-numbers.table', compact('inventoryNumbers'))->render()]);
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
            'inventory_type' => 'required',
            'holder_id' => 'required',
            'status' => 'required',
        ]);

        $invNum = InventoryNumber::latest()->first();
        if(isset($invNum))
        {
            $serial_no = Str::substr($invNum->number, -1);
            $counter = $serial_no + 1;
            // dd($serial_no);
        } else {
            $counter = 1;
        }

        $inv_number = str_pad($counter, 4, '0', STR_PAD_LEFT);
       

        // store data
        $inventoryNumber = new InventoryNumber();
        $inventoryNumber->inventory_type = $request->inventory_type;
        $inventoryNumber->holder_id = $request->holder_id;
        $inventoryNumber->group_id = $request->group_id;
        $inventoryNumber->inventory_project_id = $request->inventory_project_id;
        $inventoryNumber->number = $inv_number;
        $inventoryNumber->status = $request->status;
        $inventoryNumber->remarks = $request->remarks; 
        $inventoryNumber->save();

        session()->flash('message', 'Inventory Number added successfully');
        return response()->json(['success' => 'Inventory Number added successfully']);

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
        
        $inventory_number = InventoryNumber::find($id);
        $members = User::role('MATERIAL-MANAGER')->get();
        $groups = Group::orderBy('id','desc')->get();
        $invProjects = InventoryProject::orderBy('id','desc')->where('status', 1)->get();
        $edit = true;
        return response()->json(['view' => view('inventory.inventory-numbers.form', compact('edit','inventory_number','members','groups','invProjects'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // validation
        $request->validate([
            'holder_id' => 'required',
            'status' => 'required',
        ]);

        $inventoryNumber = InventoryNumber::find($id);
        // $inventoryNumber->inventory_type = $request->inventory_type;
        $inventoryNumber->holder_id = $request->holder_id;
        $inventoryNumber->group_id = $request->group_id;
        $inventoryNumber->inventory_project_id = $request->inventory_project_id;
        $inventoryNumber->status = $request->status;
        $inventoryNumber->remarks = $request->remarks; 
        $inventoryNumber->update();

        session()->flash('message', 'Inventory Number updated successfully');
        return response()->json(['success' => 'Inventory Number updated successfully']);
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
        $inventoryNumber = InventoryNumber::findOrFail($id);
        $inventoryNumber->delete();
        
        
        return redirect()->route('inventory-numbers.index')->with('message', 'Inventory Number deleted successfully');
    }
}
