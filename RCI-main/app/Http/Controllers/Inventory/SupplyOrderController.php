<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SupplyOrder;

class SupplyOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supplyOrders = SupplyOrder::orderBy('id','desc')->paginate(10);

        return view('inventory.supply-orders.list',compact('supplyOrders'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $supplyOrders = SupplyOrder::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('id', 'like', '%' . $query . '%')
                    ->orWhere('order_number', 'like', '%' . $query . '%')
                    ->orWhere('status', 'like', '%' . $query . '%');
            })
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);

            return response()->json(['data' => view('inventory.supply-orders.table', compact('supplyOrders'))->render()]);
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
            'order_no' => 'required',
            'date' => 'required',
        ]);

        $supplyOrder = new SupplyOrder();
        $supplyOrder->order_number = $request->order_no;
        $supplyOrder->date = $request->date;
        $supplyOrder->status = $request->status;
        $supplyOrder->save();

        session()->flash('message', 'Supply Order Created successfully');
        return response()->json(['success' => 'Supply Order Created successfully']);
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
        $supplyOrder = SupplyOrder::find($id);
        $edit = true;
        return response()->json(['view' => view('inventory.supply-orders.form', compact('edit', 'supplyOrder'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'order_no' => 'required',
            'date' => 'required',
        ]);

        $supplyOrder = SupplyOrder::find($id);
        $supplyOrder->order_number = $request->order_no;
        $supplyOrder->date = $request->date;
        $supplyOrder->status = $request->status;
        $supplyOrder->save();

        session()->flash('message', 'Supply Order Updated successfully');
        return response()->json(['success' => 'Supply Order Updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function delete(string $id)
    {
        $supplyOrder = SupplyOrder::find($id);
        $supplyOrder->delete();

        session()->flash('message', 'Supply Order Deleted successfully');
        return response()->json(['success' => 'Supply Order Deleted successfully']);
    }
}
