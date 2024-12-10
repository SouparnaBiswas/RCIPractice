<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CreditVoucherNumber;

class CreditVoucherNumberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $voucherNumbers = CreditVoucherNumber::orderBy('id','desc')->paginate(10);

        return view('inventory.credit-voucher-numbers.list',compact('voucherNumbers'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $voucherNumbers = CreditVoucherNumber::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('id', 'like', '%' . $query . '%')
                    ->orWhere('voucher_number', 'like', '%' . $query . '%')
                    ->orWhere('status', 'like', '%' . $query . '%');
            })
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);

            return response()->json(['data' => view('inventory.credit-voucher-numbers.table', compact('voucherNumbers'))->render()]);
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
            'voucher_no' => 'required',
        ]);

        $voucherNumber = new CreditVoucherNumber();
        $voucherNumber->voucher_number = $request->voucher_no;
        $voucherNumber->status = $request->status;
        
        if($voucherNumber->save()) {
            $lastSavedOrderId = CreditVoucherNumber::latest()->value('id');
            
            // update status to inactive except the last row
            CreditVoucherNumber::where('id', '!=', $lastSavedOrderId)->update(['status' => 0]);
        }

        session()->flash('message', 'Credit Voucher Number Created successfully');
        return response()->json(['success' => 'Credit Voucher Number Created successfully']);
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
        $voucherNumber = CreditVoucherNumber::find($id);
        $edit = true;
        return response()->json(['view' => view('inventory.credit-voucher-numbers.form', compact('edit', 'voucherNumber'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'voucher_no' => 'required',
        ]);

        $voucherNumber = CreditVoucherNumber::find($id);
        $voucherNumber->voucher_number = $request->voucher_no;
        $voucherNumber->status = $request->status;
        $voucherNumber->update();

        session()->flash('message', 'Credit Voucher Number updated successfully.');
        return response()->json(['success' => 'Credit Voucher Number updated successfully']);
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
        $voucherNumber = CreditVoucherNumber::find($id);
        $voucherNumber->delete();

        session()->flash('message', 'Credit Voucher Number deleted successfully.');
        return response()->json(['success' => 'Credit Voucher Number deleted successfully']);
    }
}
