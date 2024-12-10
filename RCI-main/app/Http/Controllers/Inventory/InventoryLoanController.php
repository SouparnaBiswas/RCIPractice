<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InventoryLoan;
use App\Models\InventoryNumber;
use App\Models\ItemCode;


class InventoryLoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inventories = InventoryNumber::where('status',1)->orderBy('id','desc')->get();
        $itemCodes = ItemCode::orderBy('id','desc')->get();
        $inventoryLoans = InventoryLoan::orderBy('id','desc')->paginate(10);

    
        return view('inventory.inventory-loans.list',compact('inventories','itemCodes','inventoryLoans'));
    }

    public function inventoryLoanFetchData(Request $request)
    {
        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $inventoryLoans = InventoryLoan::with(['itemCode', 'inventory'])
            ->where(function($queryBuilder) use ($query) {
                $queryBuilder->where('id', 'like', '%' . $query . '%')
                    ->orWhere('quantity_issue', 'like', '%' . $query . '%')
                    ->orWhereHas('itemCode', function($q) use ($query) {
                        $q->where('code', 'like', '%' . $query . '%');
                    })
                    ->orWhereHas('inventory', function($q) use ($query) {
                        $q->where('number', 'like', '%' . $query . '%');
                    })
                    ->orWhere('cost', 'like', '%' . $query . '%');
            })
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);

            return response()->json(['data' => view('inventory.inventory-loans.table', compact('inventoryLoans'))->render()]);
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
            'inventory_id' => 'required',
            'item_code_id' => 'required',
            'quantity_issue' => 'required',
            'total_cost' => 'required',
            'date_of_return' => 'required',
            'date_of_issue' => 'required',
        ]);

        $inventoryLoan = new InventoryLoan();
        $inventoryLoan->icc_no = $request->inventory_id;
        $inventoryLoan->item_code = $request->item_code_id;
        $inventoryLoan->nomenclature = $request->nomenclature;
        $inventoryLoan->unit_price = $request->unit_price;
        $inventoryLoan->quantity_issue = $request->quantity_issue;
        $inventoryLoan->cost = $request->total_cost;
        $inventoryLoan->name_of_borrower = $request->borrower_name;
        $inventoryLoan->date_of_issue =$request->date_of_issue;
        $inventoryLoan->date_of_return =$request->date_of_return;
        $inventoryLoan->remarks = $request->remarks;
        $inventoryLoan->save();

        session()->flash('message', 'Inventory loan created successfully');
        return response()->json(['message' => 'Inventory loan created successfully']);
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
        $inventoryLoan = InventoryLoan::findOrFail($id);
        $inventories = InventoryNumber::where('status',1)->orderBy('id','desc')->get();
        $itemCodes = ItemCode::orderBy('id','desc')->get();
        $edit = true;

        return response()->json(['view' => view('inventory.inventory-loans.form', compact('inventoryLoan', 'edit','inventories','itemCodes'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $inventoryLoan = InventoryLoan::where('id',$id)->first();
        $inventoryLoan->icc_no = $request->inventory_id;
        $inventoryLoan->item_code = $request->item_code_id;
        $inventoryLoan->nomenclature = $request->nomenclature;
        $inventoryLoan->unit_price = $request->unit_price;
        $inventoryLoan->quantity_issue = $request->quantity_issue;
        $inventoryLoan->cost = $request->total_cost;
        $inventoryLoan->name_of_borrower = $request->borrower_name;
        $inventoryLoan->date_of_issue =$request->date_of_issue;
        $inventoryLoan->date_of_return =$request->date_of_return;
        $inventoryLoan->remarks = $request->remarks;
        $inventoryLoan->update();

        session()->flash('message', 'Inventory loan updated successfully');
        return response()->json(['message' => 'Inventory loan updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function inventoryLoanItemData(Request $request)
    {
        $get_item_detail = ItemCode::where('id', $request->item_code)->first();
        return response()->json(['success' => true,'item_detail' => $get_item_detail]);
    }
}
