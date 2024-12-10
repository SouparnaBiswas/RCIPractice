<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Models\SecurityGateStore;
use App\Models\SupplyOrder;
use App\Models\Vendor;
use Illuminate\Http\Request;

class SecurityGateStoresController extends Controller
{
    public function index()
    {
        $securityGates = SecurityGateStore::orderBy('id', 'desc')->paginate(10);
        $vendors = Vendor::where('status', 1)->get();
        $supplyOrders = SupplyOrder::where('status', 1)->get();
        return view('inventory.security-gate-stores.list', compact('securityGates', 'vendors', 'supplyOrders'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $securityGates = SecurityGateStore::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('id', 'like', '%' . $query . '%')
                    ->orWhere('entry_time', 'like', '%' . $query . '%')
                    ->orWhere('dc_invoice_bill_voucher_no', 'like', '%' . $query . '%')
                    ->orWhere('dc_invoice_bill_voucher_date', 'like', '%' . $query . '%')
                    ->orWhere('no_of_package', 'like', '%' . $query . '%')
                    ->orWhere('vehicle_no', 'like', '%' . $query . '%')
                    ->orWhereHas('supplyOrder', function($queryBuilder) use ($query) {
                        $queryBuilder->where('order_number', 'like', '%' . $query . '%');
                    })
                    ->orWhereHas('vendor', function($queryBuilder) use ($query) {
                        $queryBuilder->where('name', 'like', '%' . $query . '%');
                    });
            })
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);

            return response()->json(['data' => view('inventory.security-gate-stores.table', compact('securityGates'))->render()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {



    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'entry_time' => 'required',
            'supply_order_id' => 'required|integer',
            'vendor_id' => 'required|integer',
            'dc_invoice_bill_voucher_no' => 'required|string|max:255',
            'dc_invoice_bill_voucher_date' => 'required',
            'no_of_package' => 'required|string|max:255',
            'vehicle_no' => 'nullable|string|max:255',
            'remarks' => 'nullable|string|max:255',
        ]);

        $supplyOrder = new SecurityGateStore();
        $supplyOrder->entry_time = $request->entry_time;
        $supplyOrder->supply_order_id = $request->supply_order_id;
        $supplyOrder->vendor_id = $request->vendor_id;
        $supplyOrder->dc_invoice_bill_voucher_no = $request->dc_invoice_bill_voucher_no;
        $supplyOrder->dc_invoice_bill_voucher_date = $request->dc_invoice_bill_voucher_date;
        $supplyOrder->no_of_package = $request->no_of_package;
        $supplyOrder->vehicle_no = $request->vehicle_no;
        $supplyOrder->remarks = $request->remarks;
        $supplyOrder->save();

        session()->flash('success', 'Supply Order created successfully');

        return response()->json(['success' => 'Supply Order created successfully']);
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
        $securityGate = SecurityGateStore::findOrFail($id);
        $vendors = Vendor::where('status', 1)->get();
        $supplyOrders = SupplyOrder::where('status', 1)->get();
        $edit = true;
        return response()->json(['view' => view('inventory.security-gate-stores.form', compact('securityGate', 'edit', 'vendors', 'supplyOrders'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'entry_time' => 'required',
            'supply_order_id' => 'required|integer',
            'vendor_id' => 'required|integer',
            'dc_invoice_bill_voucher_no' => 'required|string|max:255',
            'dc_invoice_bill_voucher_date' => 'required',
            'no_of_package' => 'required|string|max:255',
            'vehicle_no' => 'required|string|max:255',
            'remarks' => 'nullable|string|max:255',
        ]);

        $supplyOrder = SecurityGateStore::findOrFail($id);
        $supplyOrder->entry_time = $request->entry_time;
        $supplyOrder->supply_order_id = $request->supply_order_id;
        $supplyOrder->vendor_id = $request->vendor_id;
        $supplyOrder->dc_invoice_bill_voucher_no = $request->dc_invoice_bill_voucher_no;
        $supplyOrder->dc_invoice_bill_voucher_date = $request->dc_invoice_bill_voucher_date;
        $supplyOrder->no_of_package = $request->no_of_package;
        $supplyOrder->vehicle_no = $request->vehicle_no;
        $supplyOrder->remarks = $request->remarks;
        $supplyOrder->update();

        session()->flash('success', 'Supply Order updated successfully');

        return response()->json(['success' => 'Supply Order updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
