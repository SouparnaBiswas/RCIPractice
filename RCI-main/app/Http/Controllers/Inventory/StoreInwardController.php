<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SupplyOrder;
use App\Models\Vendor;
use App\Models\TrafficControl;
use App\Models\StoreInward;

class StoreInwardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $storeInward = StoreInward::orderBy('id', 'desc')->paginate(10);
        $vendors = Vendor::where('status', 1)->get();
        $supplyOrders = SupplyOrder::where('status', 1)->get();
        return view('inventory.store-inward.list', compact('storeInward', 'vendors', 'supplyOrders'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $storeInward = StoreInward::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('id', 'like', '%' . $query . '%')
                    ->orWhere('tcr_number', 'like', '%' . $query . '%')
                    ->orWhere('dc_invoice_bill_voucher_no', 'like', '%' . $query . '%')
                    ->orWhere('dc_invoice_bill_voucher_date', 'like', '%' . $query . '%')
                    ->orWhere('qty_received', 'like', '%' . $query . '%')
                    ->orWhere('rin_no', 'like', '%' . $query . '%')
                    ->orWhereHas('supplyOrder', function($queryBuilder) use ($query) {
                        $queryBuilder->where('order_number', 'like', '%' . $query . '%');
                    })
                    ->orWhereHas('vendor', function($queryBuilder) use ($query) {
                        $queryBuilder->where('name', 'like', '%' . $query . '%');
                    });
            })
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);

            return response()->json(['data' => view('inventory.store-inward.table', compact('storeInward'))->render()]);
        }
    }

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
            'date_of_receipt' => 'required',
            'supply_order_id' => 'required|integer',
            'vendor_id' => 'required|integer',
            'dc_invoice_bill_voucher_no' => 'required|string|max:255',
            'dc_invoice_bill_voucher_date' => 'required',
            'qty_received' => 'required|string|max:255',
            'rin_no' => 'required|string|max:255',
            'rin_date' => 'required',
            'nomenclature' =>'nullable|string|max:255',
            'remarks' => 'nullable|string|max:255',
        ]);

        $storeInward = new StoreInward();
        $storeInward->tcr_number = $request->tcr_number;
        $storeInward->date_of_receipt = $request->date_of_receipt;
        $storeInward->supply_order_id = $request->supply_order_id;
        $storeInward->vendor_id = $request->vendor_id;
        $storeInward->dc_invoice_bill_voucher_no = $request->dc_invoice_bill_voucher_no;
        $storeInward->dc_invoice_bill_voucher_date = $request->dc_invoice_bill_voucher_date;
        $storeInward->rin_no = $request->rin_no;
        $storeInward->rin_date = $request->rin_date;
        $storeInward->qty_received = $request->qty_received;
        $storeInward->nomenclature = $request->nomenclature;
        $storeInward->remarks = $request->remarks;
        $storeInward->save();

        session()->flash('success', 'Store Inward created successfully');

        return response()->json(['success' => 'Store Inward created successfully']);
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
        $storeInward = StoreInward::findOrFail($id);
        $vendors = Vendor::where('status', 1)->get();
        $supplyOrders = SupplyOrder::where('status', 1)->get();
        $edit = true;
        return response()->json(['view' => view('inventory.store-inward.form', compact('storeInward', 'edit', 'vendors', 'supplyOrders'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'date_of_receipt' => 'required',
            'supply_order_id' => 'required|integer',
            'vendor_id' => 'required|integer',
            'dc_invoice_bill_voucher_no' => 'required|string|max:255',
            'dc_invoice_bill_voucher_date' => 'required',
            'qty_received' => 'required|string|max:255',
            'rin_no' => 'required|string|max:255',
            'rin_date' => 'required',
            'nomenclature' =>'nullable|string|max:255',
            'remarks' => 'nullable|string|max:255',
        ]);

        $storeInward = StoreInward::findOrFail($id);
        $storeInward->tcr_number = $request->tcr_number;
        $storeInward->date_of_receipt = $request->date_of_receipt;
        $storeInward->supply_order_id = $request->supply_order_id;
        $storeInward->vendor_id = $request->vendor_id;
        $storeInward->dc_invoice_bill_voucher_no = $request->dc_invoice_bill_voucher_no;
        $storeInward->dc_invoice_bill_voucher_date = $request->dc_invoice_bill_voucher_date;
        $storeInward->rin_no = $request->rin_no;
        $storeInward->rin_date = $request->rin_date;
        $storeInward->qty_received = $request->qty_received;
        $storeInward->nomenclature = $request->nomenclature;
        $storeInward->remarks = $request->remarks;
        $storeInward->update();

        session()->flash('success', 'Store Inward updated successfully');

        return response()->json(['success' => 'Store Inward updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
