<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CashPayment;
use Illuminate\Http\Request;
use App\Models\PaymentCategory;
use App\Models\ResetVoucher;
use Illuminate\Support\Str;
use App\Models\Receipt;
use App\Models\Member;
use App\Models\PublicFundVendor;
use Illuminate\Support\Facades\DB;

class CashPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $receipt_nos = Receipt::where('receipt_type', 'cash')->get();
        $cash_receipt_nos = Receipt::where('receipt_type', 'cash')->paginate(10);
        $paymentCategories = PaymentCategory::where('status', 1)->orderBy('id', 'desc')->get();
        $members = Member::orderBy('id', 'desc')->get();
        return view('frontend.public-fund.cash-payment.list', compact('receipt_nos','cash_receipt_nos', 'paymentCategories','members'));
    }

    public function fetchData(Request $request)
    {
        
        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $cashPayments = CashPayment::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('vr_no', 'like', '%' . $query . '%')
                    ->orWhere('vr_date', 'like', '%' . $query . '%')
                    ->orWhere('amount', 'like', '%' . $query . '%')
                    ->orWhere('category', 'like', '%' . $query . '%');
            })
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);

            return response()->json(['data' => view('frontend.public-fund.cash-payment.table', compact('cashPayments'))->render()]);
        }
    }

    public function getRctNoDetail(Request $request)
    {
        $rct_no = $request->rcpt_no;
        $detail = true;
        $receipt = Receipt::where('id', $rct_no)->with('fundVendor','category')->first();
        if($receipt)
        {
            return response()->json(['view' => view('frontend.public-fund.cash-payment.details', compact('receipt','detail'))->render()]);
        } else {
            return response()->json(['error' => 'Receipt not found']);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $paymentCategories = PaymentCategory::where('status', 1)->orderBy('id', 'desc')->get();
        return view('frontend.public-fund.cash-payment.form', compact('paymentCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $rct_no = $request->rcpt_no;

        foreach($request->amount as $key => $amount) {
            $cashPayment = new CashPayment();
            $cashPayment->rct_no = $rct_no;
            $cashPayment->amount = $amount;
            $cashPayment->date = $request->date[$key];
            $cashPayment->status = 'pending';
            $cashPayment->save();
        }
        

        session()->flash('message', 'Cash Payment added successfully');
        return response()->json(['success' => 'Cash Payment added successfully']);
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
        $receipt_nos = Receipt::where('receipt_type', 'cash')->get();
        $receipt = Receipt::where('id', $id)->first();
        $cashPayments = CashPayment::where('rct_no', $id)->get();
        $edit = true;
        return response()->json(['view' => view('frontend.public-fund.cash-payment.form', compact('edit', 'cashPayments', 'receipt','receipt_nos'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'vr_date' => 'required',
            'amount' => 'required|numeric',
            'rct_no' => 'required',
            'member_id' => 'required',
        ]);

        $cashPayment = CashPayment::findOrFail($id);
        $cashPayment->vr_date = $request->vr_date;
        $cashPayment->amount = $request->amount;
        $cashPayment->rct_no = $request->rct_no;
        $cashPayment->form = $request->form;
        $cashPayment->details = $request->details;
        $cashPayment->member_id = $request->member_id;
        $cashPayment->category = $request->category;
        $cashPayment->save();

        session()->flash('message', 'Cash Payment updated successfully');
        return response()->json(['success' => 'Cash Payment updated successfully']);
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
        $cashPayment = CashPayment::find($id);
        $cashPayment->delete();
        return redirect()->back()->with('message', 'Cash Payment deleted successfully');
    }
}
