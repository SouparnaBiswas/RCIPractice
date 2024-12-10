<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GatePass;
use App\Models\ItemCode;
use App\Models\User;
use App\Models\InventoryNumber;
use App\Models\GatePassItem;
use App\Models\ExternalIssueVoucher;
use App\Models\Vendor;

class GatePassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gatePasses = GatePass::paginate(10);
        $items = ItemCode::orderBy('id','desc')->get();
        $vendors = Vendor::orderBy('id','desc')->get();
        $inventory_nos = InventoryNumber::orderBy('id','desc')->get();
        $external_issue_vouchers = ExternalIssueVoucher::orderBy('id','desc')->get();

        return view('inventory.gate-passes.list', compact('gatePasses','items','vendors','inventory_nos','external_issue_vouchers'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $gatePasses = GatePass::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('gate_pass_no', 'like', '%' . $query . '%')
                    ->orWhere('gate_pass_date', 'like', '%' . $query . '%');
            })
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);

            return response()->json(['data' => view('inventory.gate-passes.table', compact('gatePasses'))->render()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('inventory.gate-passes.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pass_no' => 'required|unique:gate_passes,gate_pass_no',
            'pass_date' => 'required',
            'pass_type' => 'required'
        ]);

        if($request->consignee == '0')
        {
            $user = new Vendor();
            $user->name = $request->other_consignee_name;
            $user->phone =  $request->other_consignee_number;
            $user->save();

        }

        $gatepass = new GatePass();
        $gatepass->gate_pass_no = $request->pass_no;
        $gatepass->gate_pass_date = $request->pass_date;
        $gatepass->gate_pass_type = $request->pass_type;
        $gatepass->eiv_no_id = $request->eiv_no;
        $gatepass->invoice_no = $request->invoice_no;
        $gatepass->date_of_return = $request->date_of_return;
        if($request->consignee == 0){
            $gatepass->consignee_id = $user->id;
        }else{
            $gatepass->consignee_id = $request->consignee;
        }
        $gatepass->save();

        // gatepass items
        foreach ($request->item_id as $key => $value) {
                   
            $get_pass_item = new GatePassItem();
            $get_pass_item->gate_pass_id = $gatepass->id;
            $get_pass_item->item_id = $value;
            $get_pass_item->description = $request->description[$key];
            $get_pass_item->unit_cost = $request->unit_cost[$key];
            $get_pass_item->quantity = $request->received_quantity[$key];
            $get_pass_item->total_cost = $request->total_amount[$key];
            $get_pass_item->au_status = $request->au_status[$key];
            $get_pass_item->save();
        }

        session()->flash('message', 'Gate Pass added successfully');
        return response()->json(['success' => 'Gate Pass added successfully']);
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
        $gatepass = GatePass::findOrFail($id);
        $itemCodes = ItemCode::orderBy('id','desc')->get();
        $vendors = User::role('MATERIAL-MANAGER')->get();
        $edit = true;

        return response()->json(['view' => view('inventory.gate-passes.form', compact('gatepass', 'edit','itemCodes','vendors'))->render()]);

        // return view('inventory.gate-passes.form', compact('gatepass', 'edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'pass_no' => 'required|unique:gate_passes,gate_pass_no,' . $id . ',id',
            'pass_date' => 'required',
            'pass_type' => 'required',
        ]);

        $gatepass = GatePass::findOrFail($id);
        $gatepass->gate_pass_no = $request->pass_no;
        $gatepass->gate_pass_date = $request->pass_date;
        $gatepass->gate_pass_type = $request->pass_type;
        $gatepass->save();

        return redirect()->route('gate-passes.index')->with('success', 'Gate Pass updated successfully.');
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
        $gatepass = GatePass::findOrFail($id);
        $gatepass->delete();

        return redirect()->back()->with('message', 'Gate Pass deleted successfully.');
    }
}
