<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentCategory;
use App\Models\ChequePayment;
use App\Models\ResetVoucher;
use Illuminate\Support\Str;
use App\Models\Member;
use App\Models\Receipt;
use App\Models\Designation;

class ChequePaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $receipt_nos = Receipt::where('receipt_type', 'cheque')->get();
        $cheque_receipt_nos = Receipt::where('receipt_type', 'cheque')->paginate(10);
        $paymentCategories = PaymentCategory::where('status', 1)->orderBy('id', 'desc')->get();
        $members = Member::orderBy('id', 'desc')->get();
        return view('frontend.public-fund.cheque-payment.list', compact('cheque_receipt_nos', 'paymentCategories','members','receipt_nos'));
    }

    public function getReceiptNoDetail(Request $request)
    {
        $rct_no = $request->rcpt_no;
        $detail = true;
        $receipt = Receipt::where('id', $rct_no)->with('fundVendor','category')->first();
        if($receipt)
        {
            return response()->json(['view' => view('frontend.public-fund.cheque-payment.details', compact('receipt','detail'))->render()]);
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
        return view('frontend.public-fund.cheque-payment.form', compact('paymentCategories'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $chequePayments = ChequePayment::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('vr_no', 'like', '%' . $query . '%')
                    ->orWhere('vr_date', 'like', '%' . $query . '%')
                    ->orWhere('amount', 'like', '%' . $query . '%')
                    ->orWhere('sr_no', 'like', '%' . $query . '%')
                    ->orWhereHas('member', function($q) use ($query) {
                        $q->where('name', 'like', '%' . $query . '%');
                    })
                    ->orWhere('designation', 'like', '%' . $query . '%')
                    ->orWhere('bill_ref', 'like', '%' . $query . '%')
                    ->orWhere('bank_account', 'like', '%' . $query . '%')
                    ->orWhere('dv_no', 'like', '%' . $query . '%')
                    ->orWhere('cheque_no', 'like', '%' . $query . '%')
                    ->orWhere('cheque_date', 'like', '%' . $query . '%')
                    ->orWhere('narration', 'like', '%' . $query . '%')
                    ->orWhere('category', 'like', '%' . $query . '%');
            })
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);

            return response()->json(['data' => view('frontend.public-fund.cheque-payment.table', compact('chequePayments'))->render()]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $rct_no = $request->rcpt_no;
        foreach($request->amount as $key => $amount) {
            $chequePayment = new ChequePayment();
            $chequePayment->rct_no = $rct_no;
            $chequePayment->amount = $amount;
            $chequePayment->date = $request->date[$key];
            $chequePayment->status = 'pending';
            $chequePayment->save();
        }

        session()->flash('message', 'Cheque Payment added successfully');
        return response()->json(['success' => 'Cheque Payment added successfully']);
        
    }

    public function fetchMemberDesig(Request $request)
    {
        $member_id = $request->member;
        $member = Member::findOrFail($member_id);
        $get_designation = Designation::where('designation_type_id', $member->desig)->first();
        return response()->json(['designation' => $get_designation]);
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
       
        $receipt_nos = Receipt::where('receipt_type', 'cheque')->get();
        $receipt = Receipt::where('id', $id)->first();
        $chequePayments = ChequePayment::where('rct_no', $id)->get();
        $members = Member::orderBy('id', 'desc')->get();
        $edit = true;

        return response()->json(['view' => view('frontend.public-fund.cheque-payment.form', compact('edit', 'receipt_nos', 'receipt','chequePayments','members'))->render()]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'vr_date' => 'required',
            'sr_no' => 'required',
            'amount' => 'required|numeric',
            'member_id' => 'required',
        ]);

        $chequePayment = ChequePayment::findOrFail($id);
        $chequePayment->vr_no = $request->vr_no;
        $chequePayment->vr_date = $request->vr_date;
        $chequePayment->sr_no = $request->sr_no;
        $chequePayment->amount = $request->amount;
        $chequePayment->member_id = $request->member_id;
        $chequePayment->designation = $request->designation;
        $chequePayment->bill_ref = $request->bill_ref;
        $chequePayment->bank_account = $request->bank_account;
        $chequePayment->dv_no = $request->dv_no;
        $chequePayment->cheque_no = $request->cheque_no;
        $chequePayment->cheque_date = $request->cheque_date;
        $chequePayment->narration = $request->narration;
        $chequePayment->category = $request->category;
        $chequePayment->save();

        session()->flash('message', 'Cheque Payment updated successfully');
        return response()->json(['success' => 'Cheque Payment updated successfully']);
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
        $chequePayment = ChequePayment::findOrFail($id);
        $chequePayment->delete();
        return redirect()->route('cheque-payments.index')->with('message', 'Cheque Payment deleted successfully.');
    }
}
