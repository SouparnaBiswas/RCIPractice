<?php

namespace App\Http\Controllers\Frontend\MemberInfo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PensionRate;

class PensionRateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pensionRates = PensionRate::paginate(10);
        return view('frontend.member-info.pension_rate.list', compact('pensionRates'));
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
            'npsc_credit_rate' => 'required',
            'npsg_credit_rate' => 'required',
            'npsc_debit_rate' => 'required',
            'npsg_debit_rate' => 'required',
        ]);

        $pensionRate = new PensionRate();
        $pensionRate->npsc_credit_rate = $request->npsc_credit_rate;
        $pensionRate->npsg_credit_rate = $request->npsg_credit_rate;
        $pensionRate->npsc_debit_rate = $request->npsc_debit_rate;
        $pensionRate->npsg_debit_rate = $request->npsg_debit_rate;
        $pensionRate->year = $request->year;
        $pensionRate->status = $request->status;
        $pensionRate->save();

        session()->flash('success', 'Pension rate created successfully');
        return response()->json(['success' => 'Pension rate created successfully']);
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
        $pensionRate = PensionRate::findOrFail($id);
        $edit = true;

        return response()->json([
            'view' => view('frontend.member-info.pension_rate.form', compact('pensionRate', 'edit'))->render(),
            'pensionRate' => $pensionRate,
            'edit' => $edit
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'npsc_credit_rate' => 'required',
            'npsg_credit_rate' => 'required',
            'npsc_debit_rate' => 'required',
            'npsg_debit_rate' => 'required',
        ]);

        $pensionRate = PensionRate::findOrFail($id);
        $pensionRate->npsc_credit_rate = $request->npsc_credit_rate;
        $pensionRate->npsg_credit_rate = $request->npsg_credit_rate;
        $pensionRate->npsc_debit_rate = $request->npsc_debit_rate;
        $pensionRate->npsg_debit_rate = $request->npsg_debit_rate;
        $pensionRate->status = $request->status;
        $pensionRate->update();

        session()->flash('success', 'Pension rate updated successfully');
        return response()->json(['success' => 'Pension rate updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
