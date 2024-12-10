<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\IncomeTax;
use App\Models\PayCommission;
use Illuminate\Http\Request;

class IncomeTaxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $incomeTaxes = IncomeTax::paginate(10);
        // $payCommissions = PayCommission::where('is_active', '1')->get();

        return view('frontend.income-tax.list', compact('incomeTaxes'));
    }

    public function fetchdata(Request $request)
    {
        $sort_by = $request->get('sortby');
        $sort_type = $request->get('sorttype');
        $query = $request->get('query');
        $query = str_replace(" ", "%", $query);
        $incomeTax = IncomeTax::where(function($queryBuilder) use ($query) {
            $queryBuilder->where('regime', 'like', '%' . $query . '%')
                ->orWhere('slab_amount', 'like', '%' . $query . '%')
                ->orWhere('tax_rate', 'like', '%' . $query . '%')
                ->orWhere('edu_cess_rate', 'like', '%' . $query . '%');
        })
        ->orderBy($sort_by, $sort_type)
        ->paginate(10);
        // $payCommissions = PayCommission::where('status', '1')->get();

        return response()->json(['view' => view('frontend.income-tax.table', compact('incomeTax'))->render()]);
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
            'regime' => 'required',
            'higher_slab_amount' => 'required',
            'lower_slab_amount' => 'required',
            'tax_rate' => 'required',
            'edu_cess_rate' => 'required',
        ]);

        $currentDate = now();
        $currentYear = $currentDate->year;

        // Determine financial year based on your organization's fiscal year start
        $fiscalYearStartMonth = 4; // For example, April
        if ($currentDate->month < $fiscalYearStartMonth) {
            $financialYear = $currentYear - 1 . '-' . $currentYear;
        } else {
            $financialYear = $currentYear . '-' . ($currentYear + 1);
        }



        $incomeTax = new IncomeTax();
        $incomeTax->regime = $request->regime;
        $incomeTax->higher_slab_amount = $request->higher_slab_amount;
        $incomeTax->lower_slab_amount = $request->lower_slab_amount;
        $incomeTax->tax_rate = $request->tax_rate;
        $incomeTax->edu_cess_rate = $request->edu_cess_rate;
        $incomeTax->financial_year = $financialYear;
        $incomeTax->record_add_date = $currentDate;
        $incomeTax->save();

        session()->flash('success', 'Income tax slab added successfully');
        return redirect()->route('income-taxes.index')->with('success', 'Income tax slab added successfully');
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
        $incomeTax = IncomeTax::findOrFail($id);
        $payCommissions = PayCommission::where('is_active', '1')->get();
        $edit = true;

        return response()->json(['view' => view('frontend.income-tax.form', compact('incomeTax', 'payCommissions', 'edit'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            // 'commission' => 'required',
            'lower_slab_amount' => 'required',
            'higher_slab_amount' => 'required',
            // 'tax_rate' => 'required',
        ]);

        $incomeTax = IncomeTax::findOrFail($id);
        // $incomeTax->commission = $request->commission;
        $incomeTax->higher_slab_amount = $request->higher_slab_amount;
        $incomeTax->lower_slab_amount = $request->lower_slab_amount;
        $incomeTax->tax_rate = $request->tax_rate;
        $incomeTax->edu_cess_rate = $request->edu_cess_rate;
        $incomeTax->update();

        session()->flash('success', 'Income tax slab updated successfully');
        return redirect()->route('income-taxes.index')->with('success', 'Income tax slab updated successfully');
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
        $incomeTax = IncomeTax::findOrFail($id);
        $incomeTax->delete();

        return redirect()->route('income-taxes.index')->with('success', 'Income tax slab deleted successfully');
    }
}
