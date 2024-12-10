<?php

namespace App\Http\Controllers\Imprest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CashWithdrawal;
use App\Models\ImprestResetVoucher;
use App\Models\ChequePayment;
use Illuminate\Support\Str;

class CashWithdrawalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cashWithdrawals = CashWithdrawal::orderBy('id', 'desc')->paginate(10);
        return view('imprest.cash-withdrawals.list', compact('cashWithdrawals'));
    }

    public function fetchData(Request $request)
    {

        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $cashWithdrawals = CashWithdrawal::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('vr_no', 'like', '%' . $query . '%')
                    ->orWhere('vr_date', 'like', '%' . $query . '%')
                    ->orWhere('chq_no', 'like', '%' . $query . '%')
                    ->orWhere('chq_date', 'like', '%' . $query . '%')
                    ->orWhere('amount', 'like', '%' . $query . '%');
            })
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);

            return response()->json(['data' => view('imprest.cash-withdrawals.table', compact('cashWithdrawals'))->render()]);
           
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
            'vr_date' => 'required',
            'chq_no' => 'required',
            'chq_date' => 'required',
            'amount' => 'required|numeric',
        ]);

        $voucherText = ImprestResetVoucher::where('status', 1)->first();
        $cashwithdrawal = CashWithdrawal::latest()->first();

        $constantString = $voucherText->voucher_no_text ?? 'RCI-CHESS-IMPRESS-';
        if(isset($cashwithdrawal))
        {
            $serial_no = Str::substr($cashwithdrawal->vr_no, -1);
            $counter = $serial_no + 1;
            // dd($serial_no);
        } else {
            $counter = 1;
        }
        
        $cashwithdrawal = new CashWithdrawal();
        $cashwithdrawal->vr_no = $constantString . $counter;
        $cashwithdrawal->vr_date = $request->vr_date;
        $cashwithdrawal->chq_no = $request->chq_no;
        $cashwithdrawal->chq_date = $request->chq_date;
        $cashwithdrawal->amount = $request->amount;
        $cashwithdrawal->save();

        // deduction of cash from cheque total
        // $chequeTotal = ChequePayment::get()->sum('amount');
        $cheques = ChequePayment::all();

        foreach ($cheques as $cheque) {
            // $cheque->amount = $cheque->amount - $request->amount;
            // $cheque->update();

            if ($cheque->amount >= $request->amount) {
                $cheque->amount -= $request->amount;
                $cheque->save();
                $request->amount = 0; // Optionally set to 0, if you want to stop further reductions
                break; // Exit the loop once a single cheque voucher's amount is reduced
            } else {
                
                $request->amount -= $cheque->amount;
                $cheque->amount = 0;
                $cheque->save();
            }
        }

        

        session()->flash('message', 'Cash Withdrawal updated successfully');
        return response()->json(['success' => 'Cash Withdrawal updated successfully']);
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
        $cashwithdrawal = CashWithdrawal::find($id);
        $edit = true;
       
        return response()->json(['view' => view('imprest.cash-withdrawals.form', compact('edit','cashwithdrawal'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'vr_date' => 'required',
            'chq_no' => 'required',
            'chq_date' => 'required',
            'amount' => 'required|numeric',
        ]);

        $cashwithdrawal = CashWithdrawal::findOrFail($id);
        $cashwithdrawal->vr_date = $request->vr_date;
        $cashwithdrawal->chq_no = $request->chq_no;
        $cashwithdrawal->chq_date = $request->chq_date;
        $cashwithdrawal->amount = $request->amount;
        $cashwithdrawal->update();

        session()->flash('message', 'Cashwithdrawal updated successfully');
        return response()->json(['success' => 'Cashwithdrawal updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function delete( string $id)
    {
        $cashwithdrawal = CashWithdrawal::find($id);
        $cashwithdrawal->delete();
        
        return redirect()->back()->with('message', 'Cash Withdrawal deleted successfully');
    }
}
