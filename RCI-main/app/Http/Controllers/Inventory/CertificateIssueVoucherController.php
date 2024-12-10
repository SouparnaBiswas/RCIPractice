<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\CertificateIssueVoucher;
use App\Models\ItemCode;
use App\Models\CreditVoucher;
use App\Models\CreditVoucherDetail;
use App\Models\CertificateIssueVoucherDetail;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;
use App\Models\InventoryNumber;

class CertificateIssueVoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $members = User::role('MATERIAL-MANAGER')->get();
        $inventoryNumbers = InventoryNumber::all();
        $itemCodes = CreditVoucherDetail::groupBy('item_code','item_code_id')->select('item_code','item_code_id', DB::raw('SUM(quantity) as total_quantity'))->get();
        $certificateIssueVouchers = CertificateIssueVoucher::paginate(10);

        return view('inventory.certificate-issue-vouchers.list', compact('members', 'itemCodes', 'certificateIssueVouchers','inventoryNumbers'));

    }

    public function getInventoryHolder(Request $request)
    {
       
         $inventoryHolder = InventoryNumber::where('id', $request->inventory_no)->with('member')->latest()->first();
        return response()->json(['inventoryHolder' => $inventoryHolder]);
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $certificateIssueVouchers = CertificateIssueVoucher::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('member_id', 'like', '%' . $query . '%')
                    ->orWhere('item_id', 'like', '%' . $query . '%')
                    ->orWhere('price', 'like', '%' . $query . '%')
                    ->orWhere('item_type', 'like', '%' . $query . '%')
                    ->orWhere('description', 'like', '%' . $query . '%');
            })
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);

            $members = Member::all();
            $items = CreditVoucherDetail::groupBy('item_code')->select('item_code', DB::raw('SUM(quantity) as total_quantity'))->get();

            return response()->json(['data' => view('inventory.certificate-issue-vouchers.table', compact('certificateIssueVouchers', 'members', 'items'))->render()]);
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
       
        // $request->validate([
        //     'inv_no' => 'required',
        //     'inventory_holder' => 'required',
        //     'voucher_date' => 'required',
        // ]);

        // voucher no generate
        $currentDate = Carbon::today();
        $resetDate = Carbon::createFromFormat('Y-m-d', date('Y') . '-04-01')->subDay()->endOfDay();
 
        if ($currentDate < $resetDate) {
            $resetDate = Carbon::createFromFormat('Y-m-d', (date('Y') - 1) . '-04-01')->subDay()->endOfDay();
        }
 
        $lastVoucher = CertificateIssueVoucher::where('created_at', '<', $resetDate)
             ->orderBy('voucher_no', 'desc')
             ->first() ?? CertificateIssueVoucher::latest()->first();
 
        $voucherNo = str_pad($lastVoucher ? ((int) $lastVoucher->voucher_no) + 1 : 1, 4, '0', STR_PAD_LEFT);

        $certificateIssueVoucher = new CertificateIssueVoucher();
        $certificateIssueVoucher->voucher_no = $voucherNo;
        $certificateIssueVoucher->voucher_date = $request->voucher_date;
        $certificateIssueVoucher->inv_no = $request->inv_no;
        $certificateIssueVoucher->inventory_holder = $request->inventory_holder;
        $certificateIssueVoucher->save();

        // CertificateIssueVoucherDetail data add
        foreach($request->item_id as $key => $itemCode) {

            $certificateIssueVoucherDetail = new CertificateIssueVoucherDetail();
            $certificateIssueVoucherDetail->certicate_issue_voucher_id = $certificateIssueVoucher->id;
            $certificateIssueVoucherDetail->item_code = $itemCode;
            $certificateIssueVoucherDetail->price = $request->price[$key];
            $certificateIssueVoucherDetail->description = $request->description[$key];
            $certificateIssueVoucherDetail->quantity = $request->quantity[$key];
            $certificateIssueVoucherDetail->total_price = $request->total_price[$key];
            $certificateIssueVoucherDetail->au_status = $request->au_status[$key];
            $certificateIssueVoucherDetail->remarks = $request->remarks[$key];
            $certificateIssueVoucherDetail->save();

            $creditVouchers = CreditVoucherDetail::where('item_code', $itemCode)
                    ->where('inv_no', $request->inv_no)
                    ->orderBy('id', 'asc') // Assuming you want to reduce from the oldest records first
                    ->get();

                    $remainingQuantity = $request->quantity[$key];

                    // Iterate over the credit vouchers and reduce the quantity
                    foreach ($creditVouchers as $credit) {
                        if ($credit->quantity >= $remainingQuantity) {
                            $credit->quantity -= $remainingQuantity;
                            $credit->save();
                            $remainingQuantity = 0;
                            break; // Exit the loop once quantity is reduced
                        } else {
                            $remainingQuantity -= $credit->quantity;
                            $credit->quantity = 0;
                            $credit->save();
                        }
                    }
        }

        session()->flash('message', 'Certificate Issue Voucher created successfully');
        return response()->json(['success' => 'Certificate Issue Voucher created successfully']);
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
        $certificateIssueVoucher = CertificateIssueVoucher::findOrFail($id);
        $edit = true;
        $members = Member::all();
        $items = CreditVoucherDetail::groupBy('item_code')->select('item_code', DB::raw('SUM(quantity) as total_quantity'))->get();

        return response()->json(['view' => view('inventory.certificate-issue-vouchers.form', compact('certificateIssueVoucher', 'edit', 'members', 'items'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'member_id' => 'required',
            'price' => 'required',
        ]);

        $certificateIssueVoucher = CertificateIssueVoucher::findOrFail($id);
        $certificateIssueVoucher->member_id = $request->member_id;
        // $certificateIssueVoucher->item_id = $request->item_id;
        $certificateIssueVoucher->price = $request->price;
        // $certificateIssueVoucher->item_type = $request->item_type;
        // $certificateIssueVoucher->description = $request->description;
        // $certificateIssueVoucher->quantity = $request->quantity;
        // $certificateIssueVoucher->price = $request->price;
        $certificateIssueVoucher->update();

        session()->flash('message', 'Certificate Issue Voucher updated successfully');
        return response()->json(['success' => 'Certificate Issue Voucher updated successfully']);
    }

    public function getItemDetail(Request $request)
    {
        $item = ItemCode::findOrFail($request->item_id);
        return response()->json(['item_type' => $item->item_type, 'item_description' => $item->description, 'item_price' => $item->item_price]);
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
        $certificateIssueVoucher = CertificateIssueVoucher::findOrFail($id);
        $certificateIssueVoucher->delete();

        return redirect()->route('certificate-issue-vouchers.index')->with('message', 'Certificate Issue Voucher deleted successfully');
    }
}
