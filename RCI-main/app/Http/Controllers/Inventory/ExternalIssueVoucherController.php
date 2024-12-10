<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExternalIssueVoucher;
use App\Models\ExternalIssueVoucherDetail;
use App\Models\CreditVoucher;
use App\Models\CreditVoucherDetail;
use App\Models\InventoryNumber;
use App\Models\ItemCode;
use App\Models\GatePass;
use App\Models\Vendor;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;


class ExternalIssueVoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $externalIssueVouchers = ExternalIssueVoucher::paginate(10);
        $inventoryNumbers = InventoryNumber::all();
        $itemCodes = ItemCode::all();
        $gatePasses = GatePass::where('gate_pass_type','non-returnable')->orderBy('id','desc')->get();
        $vendors = Vendor::orderBy('id','desc')->get();
        $creditVouchers = CreditVoucherDetail::groupBy('item_code_id','item_code')->select('item_code_id','item_code', DB::raw('SUM(quantity) as total_quantity'))->get();
        return view('inventory.external-issue-vouchers.list', compact('externalIssueVouchers', 'creditVouchers', 'inventoryNumbers', 'itemCodes', 'gatePasses','vendors'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $date = $request->get('date_entry');

            $externalIssueVoucherQuery = ExternalIssueVoucher::query();
            if($query){
                $query = str_replace(" ", "%", $query);
                $externalIssueVoucherQuery->where(function($queryBuilder) use ($query) {
                    $queryBuilder->where('voucher_no', 'like', '%' . $query . '%')
                    ->orWhere('voucher_date', 'like', '%' . $query . '%')
                    ->orWhere('inv_no', 'like', '%' . $query . '%')
                    ->orWhere('item_id', 'like', '%' . $query . '%')
                    ->orWhereHas('itemCode', function ($q) use ($query) {
                        $q->where('code', 'like', '%' . $query . '%');
                    })
                    
                    ->orWhereHas('gatePass', function ($q) use ($query) {
                        $q->where('gate_pass_no', 'like', '%' . $query . '%');
                    })
                    ->orWhere('gate_pass_id', 'like', '%' . $query . '%');
                });
            }

            if ($date) {
                $externalIssueVoucherQuery->whereDate('voucher_date',  '<=', $date);
            }

            $externalIssueVouchers = $externalIssueVoucherQuery->orderBy($sort_by, $sort_type)->paginate(10);
            $inventoryNumbers = InventoryNumber::all();
            $itemCodes = ItemCode::all();
            $gatePasses = GatePass::all();
            $creditVouchers = CreditVoucherDetail::groupBy('item_code_id','item_code')->select('item_code_id','item_code', DB::raw('SUM(quantity) as total_quantity'))->get();

            return response()->json(['data' => view('inventory.external-issue-vouchers.table', compact('externalIssueVouchers', 'inventoryNumbers', 'itemCodes', 'gatePasses', 'creditVouchers'))->render()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('inventory.external-issue-vouchers.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

      
        $request->validate([
            'voucher_date' => 'required',
            'inv_no' => 'required',
            'consignee' => 'required',
            // 'gate_pass_id' => 'required',
            'authority_of_issue' => 'required',
        ]);

        $currentDate = Carbon::today();
        $resetDate = Carbon::createFromFormat('Y-m-d', date('Y') . '-04-01')->subDay()->endOfDay();

        if ($currentDate < $resetDate) {
            $resetDate = Carbon::createFromFormat('Y-m-d', (date('Y') - 1) . '-04-01')->subDay()->endOfDay();
        }

        $lastVoucher = ExternalIssueVoucher::where('created_at', '<', $resetDate)
            ->orderBy('voucher_no', 'desc')
            ->first() ?? ExternalIssueVoucher::latest()->first();

        $voucherNo = str_pad($lastVoucher ? ((int) $lastVoucher->voucher_no) + 1 : 1, 4, '0', STR_PAD_LEFT);

        if($request->consignee == '0'){
            $request->validate([
                'other_consignee_name' => 'required',
                'other_consignee_number' => 'required',
            ]);

            //create new vendor
            $vendor = new Vendor();
            $vendor->name = $request->other_consignee_name;
            $vendor->phone = $request->other_consignee_number;
            $vendor->save();
        }

        $externalIssueVoucher = new ExternalIssueVoucher();
        if($request->consignee == 0){
            $externalIssueVoucher->vendor_id = $vendor->id;
        }else{
            $externalIssueVoucher->vendor_id = $request->consignee;
        }
        $externalIssueVoucher->other_consignee_name = $request->other_consignee_name;
        $externalIssueVoucher->other_consignee_number = $request->other_consignee_number;
        $externalIssueVoucher->voucher_no = $voucherNo;
        $externalIssueVoucher->voucher_date = $request->voucher_date;
        $externalIssueVoucher->inv_no = $request->inv_no;
        $externalIssueVoucher->gate_pass_id = $request->gate_pass_id;
        $externalIssueVoucher->authority_of_issue = $request->authority_of_issue;
        $externalIssueVoucher->save();


        foreach($request->item_code_id as $key => $itemCode) {

            $externalIssueVoucherDetail = new ExternalIssueVoucherDetail();
            $externalIssueVoucherDetail->external_issue_voucher_id = $externalIssueVoucher->id;
            $externalIssueVoucherDetail->item_id = $itemCode;
            $externalIssueVoucherDetail->unit_price = $request->unit_price[$key];
            $externalIssueVoucherDetail->description = $request->description[$key];
            $externalIssueVoucherDetail->au_status = $request->au_status[$key];
            $externalIssueVoucherDetail->quantity = $request->quantity[$key];
            $externalIssueVoucherDetail->total_cost = $request->total_price[$key];
            $externalIssueVoucherDetail->remarks = $request->remarks[$key];
            $externalIssueVoucherDetail->save();
        }

        session()->flash('message', 'External Issue Voucher added successfully');
        return response()->json(['success' => 'External Issue Voucher added successfully']);
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
        $externalIssueVoucher = ExternalIssueVoucher::findOrFail($id);
        $inventoryNumbers = InventoryNumber::all();
        $itemCodes = ItemCode::all();
        $gatePasses = GatePass::all();
        $vendors = Vendor::orderBy('id','desc')->get();
        $creditVouchers = CreditVoucherDetail::groupBy('item_code','item_code_id')->select('item_code','item_code_id', DB::raw('SUM(quantity) as total_quantity'))->get();
        $edit = true;

        return response()->json(['view' => view('inventory.external-issue-vouchers.form', compact('externalIssueVoucher', 'edit', 'itemCodes', 'gatePasses', 'creditVouchers', 'inventoryNumbers','vendors'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'voucher_date' => 'required',
        ]);

        $externalIssueVoucher = ExternalIssueVoucher::findOrFail($id);
        $externalIssueVoucher->voucher_date = $request->voucher_date;
        $externalIssueVoucher->au_status = $request->au_status;
        $externalIssueVoucher->remarks = $request->remarks;
        $externalIssueVoucher->update();

        session()->flash('message', 'External Issue Voucher updated successfully');
        return response()->json(['success' => 'External Issue Voucher updated successfully']);
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
        $externalIssueVoucher = ExternalIssueVoucher::findOrFail($id);
        $externalIssueVoucher->delete();

        return redirect()->back()->with('message', 'External Issue Voucher deleted successfully.');
    }
}
