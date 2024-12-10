<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TransferVoucher;
use App\Models\InventoryNumber;
use App\Models\CreditVoucher;
use App\Models\CreditVoucherDetail;
use App\Models\ItemCode;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class TransferVoucherController extends Controller
{  
    public function index()
    {
        $transferVouchers = TransferVoucher::paginate(10);
        $inventoryNumbers = InventoryNumber::all();
        $creditVouchers = CreditVoucherDetail::groupBy('item_code_id')->select('item_code_id', DB::raw('SUM(quantity) as total_quantity'))->get();
        return view('inventory.transfer-vouchers.list',compact('transferVouchers','inventoryNumbers','creditVouchers'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $date = $request->get('date_entry');

            $transferVoucherQuery = TransferVoucher::query();
            if($query){
                $query = str_replace(" ", "%", $query);
                $transferVoucherQuery->where(function($queryBuilder) use ($query) {
                    $queryBuilder->where('voucher_no', 'like', '%' . $query . '%')
                    ->orWhere('voucher_no', 'like', '%' . $query . '%')
                    ->orWhere('voucher_date', 'like', '%' . $query . '%');
                });
            }

            if ($date) {
                $transferVoucherQuery->whereDate('voucher_date', $date);
            }

            $transferVouchers = $transferVoucherQuery->orderBy($sort_by, $sort_type)->paginate(10);

            return response()->json(['data' => view('inventory.transfer-vouchers.table', compact('transferVouchers'))->render()]);
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
            'voucher_date' => 'required|date',
            'from_inv_number' => 'required',
            'to_inv_number' => 'required',
            'item_code_id' => 'required',
            'quantity' => 'required',
        ]);

        $currentDate = Carbon::today();
        $resetDate = Carbon::createFromFormat('Y-m-d', date('Y') . '-04-01')->subDay()->endOfDay();

        if ($currentDate < $resetDate) {
            $resetDate = Carbon::createFromFormat('Y-m-d', (date('Y') - 1) . '-04-01')->subDay()->endOfDay();
        }

        $lastVoucher = TransferVoucher::where('created_at', '<', $resetDate)
            ->orderBy('voucher_no', 'desc')
            ->first() ?? TransferVoucher::latest()->first();

        $voucherNo = str_pad($lastVoucher ? ((int) $lastVoucher->voucher_no) + 1 : 1, 4, '0', STR_PAD_LEFT);

       
        $transfer_voucher = new TransferVoucher();
        $transfer_voucher->voucher_no = $voucherNo;
        $transfer_voucher->voucher_date = $request->voucher_date;
        $transfer_voucher->from_inv_number = $request->from_inv_number;
        $transfer_voucher->to_inv_number = $request->to_inv_number;
        $transfer_voucher->item_id = $request->item_code_id;
        $transfer_voucher->quantity = $request->quantity;
        $transfer_voucher->remarks = $request->remarks;
        $transfer_voucher->save();

        $creditVouchers = CreditVoucherDetail::where('item_code_id', $request->item_code_id)->get();

        foreach ($creditVouchers as $credit) {
            if ($credit->quantity >= $request->quantity) {
                $credit->quantity -= $request->quantity;
                $credit->save();
                $request->quantity = 0;
                break;
            } else {
                $request->quantity -= $credit->quantity;
                $credit->quantity = 0;
                $credit->save();
            }
        }

        session()->flash('message', 'Transfer Voucher added successfully');
        return response()->json(['success' => 'Transfer Voucher added successfully']);
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
        $transfer_voucher = TransferVoucher::find($id);
        $inventoryNumbers = InventoryNumber::all();
        $creditVouchers = CreditVoucherDetail::groupBy('item_code_id')->select('item_code_id', DB::raw('SUM(quantity) as total_quantity'))->get();
        $edit = true;
        return response()->json(['view' => view('inventory.transfer-vouchers.form', compact('edit','transfer_voucher','creditVouchers','inventoryNumbers'))->render()]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'voucher_date' => 'required|date',
        ]);

        $transfer_voucher = TransferVoucher::find($id);
        $transfer_voucher->voucher_date = $request->voucher_date;
        // $transfer_voucher->from_inv_number = $request->from_inv_number;
        // $transfer_voucher->to_inv_number = $request->to_inv_number;
        // $transfer_voucher->item_id = $request->item_code_id;
        // $transfer_voucher->quantity = $request->quantity;
        $transfer_voucher->remarks = $request->remarks;
        $transfer_voucher->update();

        session()->flash('message', 'Transfer Voucher updated successfully');
        return response()->json(['success' => 'Transfer Voucher updated successfully']); 
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
        $transferVoucher = TransferVoucher::find($id);
        $transferVoucher->delete();
       
        return back()->with('message', 'Transfer Voucher deleted successfully');
    }
}
