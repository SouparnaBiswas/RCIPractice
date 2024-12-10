<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rin;
use App\Models\ItemCode;
use App\Models\SupplyOrder;
use App\Models\Vendor;
use App\Models\InventoryNumber;
use App\Models\InventorySir;
use App\Models\GstPercentage;
use App\Models\User;
use App\Models\Designation;
use DB;

class RinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rins = Rin::select('rins.rin_no', 'rins.id')
                ->join(DB::raw('(SELECT rin_no, MAX(id) as max_id FROM rins GROUP BY rin_no) as subquery'), function($join) {
                    $join->on('rins.id', '=', 'subquery.max_id');
                })
                ->orderBy('rins.id', 'desc')
                ->paginate(10);
  
        $items = ItemCode::all();
        $vendors = Vendor::orderBy('id','desc')->get();
        $supply_orders = SupplyOrder::all();
        $sir_nos = InventorySir::where('status', 1)->orderBy('id','desc')->get();
        $inventory_nos = InventoryNumber::where('status', 1)->orderBy('id','desc')->get();
        $gsts = GstPercentage::orderBy('id','desc')->get();
        $authorities = User::role('MATERIAL-MANAGER')->get();
        $designations = Designation::orderBy('id', 'desc')->paginate(10);

        return view('inventory.rins.list',compact('rins', 'items','vendors', 'supply_orders','sir_nos','inventory_nos','gsts','authorities','designations'));
    }

    public function rinsTotalValue()
    {

    }


    public function fetchData(Request $request)
    {
        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $rins = Rin::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('id', 'like', '%' . $query . '%')
                    ->orWhere('item_id', 'like', '%' . $query . '%')
                    ->orWhere('description', 'like', '%' . $query . '%')
                    ->orWhere('received_quantity', 'like', '%' . $query . '%')
                    ->orWhere('accepted_quantity', 'like', '%' . $query . '%')
                    ->orWhere('rejected_quantity', 'like', '%' . $query . '%')
                    ->orWhere('remarks', 'like', '%' . $query . '%')
                    ->orWhere('nc_status', 'like', '%' . $query . '%')
                    ->orWhere('au_status', 'like', '%' . $query . '%');
            })
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);
            $items = ItemCode::all();
            $supply_orders = SupplyOrder::all();

            return response()->json(['data' => view('inventory.rins.table', compact('rins', 'items', 'supply_orders'))->render()]);
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
            'item_id.*' => 'required',
            // 'received_quantity' => 'required',
            // 'accepted_quantity' => 'required',
            // 'rejected_quantity' => 'required',
            // 'nc_status' => 'required',
            // 'au_status' => 'required',
        ]);
        // auto generate rin id
        $lastRin = Rin::orderBy('id', 'desc')->first();

        if ($lastRin) {
            // Extract the numeric part of rin_no
            $lastNumber = (int) filter_var($lastRin->rin_no, FILTER_SANITIZE_NUMBER_INT);
        
            // Increment the numeric part and format it with leading zeros
            $rin_id = 'RIN' . str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
        } else {
            // If no RIN exists, start with RIN0001
            $rin_id = 'RIN' . str_pad(1, 4, '0', STR_PAD_LEFT);
        }

        $sir_detail = InventorySir::where('id',$request->sir_no)->first();

        if($request->item_id){
           foreach($request->item_id as $key => $item){
                $rin = new Rin();
                $rin->sir_no = $request->sir_no;
                $rin->sir_date = $sir_detail->sir_date;
                $rin->inventory_id = $request->inventory_no;
                $rin->authority_id = $request->authority_id;
                $rin->desig_id = $request->authority_designation;
                $rin->rin_no = $rin_id;
                $rin->item_id = $item;
                $rin->description = $request->description[$key];
                $rin->received_quantity = $request->received_quantity[$key];
                // $rin->accepted_quantity = $request->accepted_quantity[$key];
                //$rin->rejected_quantity = $request->rejected_quantity[$key];
                $rin->remarks = $request->remarks[$key];
                $rin->unit_cost = $request->unit_cost[$key];
                $rin->total_cost = $request->total_cost[$key];
                $rin->nc_status = $request->nc_status[$key];
                $rin->au_status = $request->au_status[$key];
                $rin->gst = $request->gst[$key];
                $rin->gst_amount = $request->gst_amount[$key];
                $rin->total_amount = $request->total_amount[$key];
                $rin->vendor_id = $request->vendor_id;
                $rin->supply_order_no = $request->supply_order_no;
                $rin->save();
           }
        }
        
        session()->flash('message', 'RIN Created successfully');
        return response()->json(['success' => 'RIN Created successfully']);
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
        $rin = Rin::find($id);
        $all_rins = Rin::where('rin_no', $rin->rin_no)->get();
        $items = ItemCode::all();
        $vendors = Vendor::orderBy('id','desc')->get();
        $supply_orders = SupplyOrder::all();
        $edit = true;
        return response()->json(['view' => view('inventory.rins.form', compact('edit','rin', 'items','all_rins','vendors', 'supply_orders'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // return $request;
        $rin_id = Rin::where('id', $request->id)->first();
        $rin_no = $rin_id->rin_no;

        $delte_old_rins = Rin::where('rin_no', $rin_no)->delete();

        if($request->item_id){
            foreach($request->item_id as $key => $item){
                if($item != null){

                    $rin = new Rin();
                    $rin->rin_no = $rin_no;
                    $rin->item_id = $item;
                    $rin->description = $request->description[$key];
                    $rin->received_quantity = $request->received_quantity[$key];
                    $rin->accepted_quantity = $request->accepted_quantity[$key];
                    $rin->rejected_quantity = $request->rejected_quantity[$key];
                    $rin->remarks = $request->remarks[$key];
                    $rin->unit_cost = $request->unit_cost [$key];
                    $rin->total_cost = $request->total_cost[$key];
                    $rin->nc_status = $request->nc_status[$key];
                    $rin->au_status = $request->au_status[$key];
                    $rin->vendor_id = $request->vendor_id[$key];
                    $rin->supply_order_no = $request->supply_order_no;
                    $rin->save();
                }
            }
         }


        session()->flash('message', 'RIN Updated successfully');
        return response()->json(['success' => 'RIN Updated successfully']);
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
        $rin = Rin::find($id);
        $rin->delete();

        return redirect()->back()->with('message', 'RIN deleted successfully.');
    }

    public function getItemDescription(Request $request)
    {
        $item = ItemCode::find($request->id);
        return response()->json(['description' => $item->description, 'price' => $item->item_price]);
    }

    
    
}
