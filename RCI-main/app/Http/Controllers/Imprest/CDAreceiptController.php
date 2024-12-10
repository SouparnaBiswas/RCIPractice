<?php

namespace App\Http\Controllers\Imprest;

use App\Http\Controllers\Controller;
use App\Models\CDAReceipt;
use Illuminate\Http\Request;
use App\Models\CdaReceiptDetail;
use App\Models\ImprestResetVoucher;
use Illuminate\Support\Str;

class CdaReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cdaReceipts = CDAReceipt::orderBy('id', 'desc')->with('cdaReceiptDetails')->paginate(10);
        $cdaReceiptDetails = CdaReceiptDetail::all();
        return view('imprest.cda-receipts.list', compact('cdaReceipts', 'cdaReceiptDetails'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $cdaReceipts = CDAReceipt::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('voucher_no', 'like', '%' . $query . '%')
                    ->orWhere('voucher_date', 'like', '%' . $query . '%')
                    ->orWhere('amount', 'like', '%' . $query . '%');
            })
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);

            return response()->json(['data' => view('imprest.cda-receipts.table', compact('cdaReceipts'))->render()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cdaReceiptDetails = CdaReceiptDetail::all();
        return view('imprest.cda-receipts.form', compact('cdaReceiptDetails'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'voucher_date' => 'required',
            'vr_amount' => 'required|numeric',
            'details' => 'required',
        ]);

        $voucherText = ImprestResetVoucher::where('status', 1)->first();
        $cdaReceipt = CDAReceipt::latest()->first();

        $constantString = $voucherText->voucher_no_text ?? 'RCI-CHESS-';
        if(isset($cdaReceipt))
        {
            $serial_no = Str::substr($cdaReceipt->voucher_no, -1);
            $counter = $serial_no + 1;
            // dd($serial_no);
        } else {
            $counter = 1;
        }

        $cdaReceipt = new CDAReceipt();
        $cdaReceipt->voucher_no = $constantString . $counter;
        $cdaReceipt->voucher_date = $request->voucher_date;
        $cdaReceipt->cheq_no = $request->cheq_no;
        $cdaReceipt->cheq_date = $request->cheq_date;
        $cdaReceipt->amount = $request->vr_amount;
        $cdaReceipt->details = $request->details;
        $cdaReceipt->save();

        session()->flash('message', 'CDA receipt added successfully');
        return response()->json(['success' => 'CDA receipt added successfully']);
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
        
        $cdaReceipt = CDAReceipt::findOrFail($id);
        $cdaReceiptDetails = CdaReceiptDetail::all();
        $edit = true;
       
        return response()->json(['view' => view('imprest.cda-receipts.form', compact('edit','cdaReceipt','cdaReceiptDetails'))->render()]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $request->validate([
            'voucher_date' => 'required',
            'amount' => 'required|numeric',
            'details' => 'required',
        ]);

        $cdaReceipt = CDAReceipt::findOrFail($id);
        $cdaReceipt->voucher_date = $request->voucher_date;
        $cdaReceipt->cheq_no = $request->chq_no;
        $cdaReceipt->cheq_date = $request->cheq_date;
        $cdaReceipt->amount = $request->amount;
        $cdaReceipt->details = $request->details;
        $cdaReceipt->update();

        session()->flash('message', 'CDA receipt updated successfully');
        return response()->json(['success' => 'CDA receipt updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Delete record
     */
    public function delete($id)
    {
       
        $cdaReceipt = CDAReceipt::findOrFail($id);
        $cdaReceipt->delete();

        return redirect()->back()->with('message', 'CDA Receipt deleted successfully.');
    }
}
