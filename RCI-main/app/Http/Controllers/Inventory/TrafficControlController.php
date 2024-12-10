<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Models\SupplyOrder;
use App\Models\TrafficControl;
use App\Models\Transport;
use App\Models\Vendor;
use Illuminate\Http\Request;

class TrafficControlController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trafficControls = TrafficControl::orderBy('id', 'desc')->paginate(10);
        $transports = Transport::where('status', 1)->get();
        $vendors = Vendor::where('status', 1)->get();
        $supplyOrders = SupplyOrder::where('status', 1)->get();
        return view('inventory.traffic-controls.list', compact('trafficControls', 'transports', 'vendors', 'supplyOrders'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {
            // Get sorting and query parameters from request
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query); // Replacing spaces with % for searching

            // Build the query with filters
            $trafficControls = TrafficControl::where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('id', 'like', '%' . $query . '%')
                    // tcr_number
                    ->orWhere('tcr_number', 'like', '%' . $query . '%')
                    ->orWhere('lr_rr_awb_bl_app_rpp_number', 'like', '%' . $query . '%')
                    ->orWhere('lr_rr_awb_bl_app_rpp_date', 'like', '%' . $query . '%')
                    ->orWhere('date_of_collection_of_stores', 'like', '%' . $query . '%')
                    ->orWhere('no_of_package', 'like', '%' . $query . '%')
                    ->orWhere('gross_weight', 'like', '%' . $query . '%')
                    ->orWhere('condition_of_package', 'like', '%' . $query . '%')
                    ->orWhere('amount', 'like', '%' . $query . '%')
                    ->orWhere('remarks', 'like', '%' . $query . '%');
            })
                // Handle relations (supplyOrder, vendor, transport) using orWhereHas
                ->orWhereHas('supplyOrder', function ($q) use ($query) {
                    $q->where('order_number', 'like', '%' . $query . '%');
                })
                ->orWhereHas('vendor', function ($q) use ($query) {
                    $q->where('name', 'like', '%' . $query . '%');
                })
                ->orWhereHas('transport', function ($q) use ($query) {
                    $q->where('name', 'like', '%' . $query . '%');
                })
                // Add ordering and pagination
                ->orderBy($sort_by, $sort_type)
                ->paginate(10); // Adjust the pagination as needed

            // Return the view with the data
            return response()->json([
                'data' => view('inventory.traffic-controls.table', compact('trafficControls'))->render()
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tcr_number' => 'required|unique:traffic_controls,tcr_number',
            'supply_order_id' => 'required|integer',
            'vendor_id' => 'required|integer',
            'transport_id' => 'required|integer',
            'lr_rr_awb_bl_app_rpp_number' => 'required|string|max:255',
            'lr_rr_awb_bl_app_rpp_date' => 'required',
            // 'contract_no' => 'required|string|max:255',
            // 'authority_and_date' => 'required|string|max:255',
            'date_of_collection_of_stores' => 'required|string|max:255',
            'no_of_package' => 'required|string|max:255',
            'gross_weight' => 'required|string|max:255',
            'condition_of_package' => 'required|string|max:255',
            'amount' => 'required|string|max:255',
            'remarks' => 'nullable|string|max:255',
        ]);

        $trafficControl = new TrafficControl();
        $trafficControl->tcr_number = $request->tcr_number;
        $trafficControl->supply_order_id = $request->supply_order_id;
        $trafficControl->vendor_id = $request->vendor_id;
        $trafficControl->transport_id = $request->transport_id;
        $trafficControl->lr_rr_awb_bl_app_rpp_number = $request->lr_rr_awb_bl_app_rpp_number;
        $trafficControl->lr_rr_awb_bl_app_rpp_date = $request->lr_rr_awb_bl_app_rpp_date;
        // $trafficControl->contract_no = $request->contract_no;
        // $trafficControl->authority_and_date = $request->authority_and_date;
        $trafficControl->date_of_collection_of_stores = $request->date_of_collection_of_stores;
        $trafficControl->no_of_package = $request->no_of_package;
        $trafficControl->gross_weight = $request->gross_weight;
        $trafficControl->condition_of_package = $request->condition_of_package;
        $trafficControl->amount = $request->amount;
        $trafficControl->remarks = $request->remarks;
        $trafficControl->save();

        session()->flash('success', 'Traffic Control created successfully');

        return response()->json(['success' => 'Traffic Control created successfully']);
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
        $trafficControl = TrafficControl::findOrFail($id);
        $transports = Transport::where('status', 1)->get();
        $vendors = Vendor::where('status', 1)->get();
        $supplyOrders = SupplyOrder::where('status', 1)->get();
        $edit = true;
        return response()->json(['view' => view('inventory.traffic-controls.form', compact('trafficControl', 'edit', 'transports', 'vendors', 'supplyOrders'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tcr_number' => 'required|unique:traffic_controls,tcr_number,' . $id,
            'supply_order_id' => 'required|integer',
            'vendor_id' => 'required|integer',
            'transport_id' => 'required|integer',
            'lr_rr_awb_bl_app_rpp_number' => 'required|string|max:255',
            'lr_rr_awb_bl_app_rpp_date' => 'required',
            // 'authority_and_date' => 'required|string|max:255',
            'date_of_collection_of_stores' => 'required|string|max:255',
            'no_of_package' => 'required|string|max:255',
            'gross_weight' => 'required|string|max:255',
            'condition_of_package' => 'required|string|max:255',
            'amount' => 'required|string|max:255',
            'remarks' => 'nullable|string|max:255',
        ]);

        $trafficControl = TrafficControl::findOrFail($id);
        $trafficControl->tcr_number = $request->tcr_number;
        $trafficControl->supply_order_id = $request->supply_order_id;
        $trafficControl->vendor_id = $request->vendor_id;
        $trafficControl->transport_id = $request->transport_id;
        $trafficControl->lr_rr_awb_bl_app_rpp_number = $request->lr_rr_awb_bl_app_rpp_number;
        $trafficControl->lr_rr_awb_bl_app_rpp_date = $request->lr_rr_awb_bl_app_rpp_date;
        // $trafficControl->contract_no = $request->contract_no;
        // $trafficControl->authority_and_date = $request->authority_and_date;
        $trafficControl->date_of_collection_of_stores = $request->date_of_collection_of_stores;
        $trafficControl->no_of_package = $request->no_of_package;
        $trafficControl->gross_weight = $request->gross_weight;
        $trafficControl->condition_of_package = $request->condition_of_package;
        $trafficControl->amount = $request->amount;
        $trafficControl->remarks = $request->remarks;
        $trafficControl->update();

        session()->flash('success', 'Traffic Control updated successfully');

        return response()->json(['success' => 'Traffic Control updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
