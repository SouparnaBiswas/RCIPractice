<?php

namespace App\Http\Controllers\Imprest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ImprestResetVoucher;

class ImprestResetVoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vouchers = ImprestResetVoucher::orderBy('id', 'desc')->paginate(10);
        return view('imprest.reset-vouchers.list', compact('vouchers'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $vouchers = ImprestResetVoucher::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('voucher_no_text', 'like', '%' . $query . '%')
                    ->orWhere('status', '=', $query == 'Active' ? 1 : ($query == 'Inactive' ? 0 : null));
            })
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);

            return response()->json(['data' => view('imprest.reset-vouchers.table', compact('vouchers'))->render()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('imprest.reset-vouchers.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'voucher_no_text' => 'required',
            'status' => 'required',
        ]);

        $voucher = new ImprestResetVoucher();
        $voucher->voucher_no_text = $request->voucher_no_text;
        $voucher->status = $request->status;
        // $voucher->save();

        if($voucher->save()) {
            $lastSavedOrderId = ImprestResetVoucher::latest()->value('id');
            
            // update status to inactive except the last row
            ImprestResetVoucher::where('id', '!=', $lastSavedOrderId)->update(['status' => 0]);
        }

        session()->flash('message', 'Voucher added successfully');
        return response()->json(['success' => 'Voucher added successfully']);
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
        $voucher = ImprestResetVoucher::findOrFail($id);
        $edit = true;
        return response()->json(['view' => view('imprest.reset-vouchers.form', compact('edit','voucher'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $request->validate([
        //     'voucher_no_text' => 'required|string|max:255',
        // ]);

        $voucher = ImprestResetVoucher::findOrFail($id);
        $voucher->voucher_no_text = $request->voucher_no_text;
        $voucher->status = $request->status;
        $voucher->update();

        session()->flash('message', 'Voucher updated successfully');
        return response()->json(['success' => 'Voucher updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        if(ImprestResetVoucher::where('id', $id)->where('status', 1)->exists()) {
            return redirect()->back()->with(['error' => 'This Voucher is active, you can not delete this.']);
        }

        $voucher = ImprestResetVoucher::findOrFail($id);
        $voucher->delete();
        return redirect()->route('imprest-reset-voucher.index')->with('success', 'Voucher deleted successfully.');
    }
}
