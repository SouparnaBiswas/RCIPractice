<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Payband;
use App\Models\PaybandType;
use App\Helpers\Helper;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PaybandController extends Controller
{
    public function index()
    {
        $payband_types = PaybandType::orderBy('payband_type', 'asc')->get();
        $financialYears = Helper::getFinancialYears();
        $paybands = Payband::orderBy('id', 'desc')->paginate(10);
        return view('frontend.paybands.list', compact('paybands', 'payband_types','financialYears'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {

            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $paybands = Payband::where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('id', 'like', '%' . $query . '%')
                    ->orWhere('low_band', 'like', '%' . $query . '%')
                    ->orWhere('high_band', 'like', '%' . $query . '%')
                    // ->orWhere('grade_pay', 'like', '%' . $query . '%')
                    ->orWhereHas('paybandType', function ($queryBuilder) use ($query) {
                        $queryBuilder->where('payband_type', 'like', '%' . $query . '%');
                    });
            })
                ->orderBy($sort_by, $sort_type)
                ->paginate(10);
            return response()->json(['data' => view('frontend.paybands.table', compact('paybands'))->render()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        

        $request->validate([
            'payband_type_id' => 'required',
            // 'low_band' => 'required|numeric',
            'high_band' => 'required|numeric',
            'financial_year' => 'required',
        ]);

        [$startYear, $endYear] = explode('-', $request->financial_year);
        $startOfYear = Carbon::createFromDate($startYear, 4, 1)->startOfDay();
        $endOfYear = Carbon::createFromDate($endYear, 3, 31)->endOfDay();
        
        $yearMonths = [];
        for ($current = $startOfYear->copy(); $current->lessThanOrEqualTo($endOfYear); $current->addMonth()) {
            $yearMonths[] = $current->copy();
        }
        
        $firstMonth = reset($yearMonths)->format('m');
        $lastMonth = end($yearMonths)->format('m');

        $payband = new Payband();
        $payband->payband_type_id = $request->payband_type_id;
        $payband->low_band = $request->low_band;
        $payband->high_band = $request->high_band;
        // $payband->month = $firstMonth . ' - ' . $lastMonth;
        $payband->year = $request->financial_year;
        $payband->save();

        session()->flash('message', 'Payband added successfully');
        return response()->json(['success' => 'Payband added successfully']);
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
        $payband_types = PaybandType::orderBy('payband_type', 'asc')->get();
        $financialYears = Helper::getFinancialYears();
        $payband = Payband::find($id);
        $edit = true;
        return response()->json(['view' => view('frontend.paybands.form', compact('edit', 'payband', 'payband_types','financialYears'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'payband_type_id' => 'required',
            // 'low_band' => 'required|numeric',
            'high_band' => 'required|numeric',
            'financial_year' => 'required',
        ]);

        [$startYear, $endYear] = explode('-', $request->financial_year);
        $startOfYear = Carbon::createFromDate($startYear, 4, 1)->startOfDay();
        $endOfYear = Carbon::createFromDate($endYear, 3, 31)->endOfDay();
        
        $yearMonths = [];
        for ($current = $startOfYear->copy(); $current->lessThanOrEqualTo($endOfYear); $current->addMonth()) {
            $yearMonths[] = $current->copy();
        }
        
        $firstMonth = reset($yearMonths)->format('m');
        $lastMonth = end($yearMonths)->format('m');

        $payband = Payband::find($id);
        $payband->payband_type_id = $request->payband_type_id;
        $payband->low_band = $request->low_band;
        $payband->high_band = $request->high_band;
        // $payband->month = $firstMonth . ' - ' . $lastMonth;
        $payband->year = $request->financial_year;
        $payband->update();

        session()->flash('message', 'Payband updated successfully');
        return response()->json(['success' => 'Payband updated successfully']);
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
        $payband = Payband::find($id);
        $payband->delete();
        return redirect()->back()->with('message', 'Payband deleted successfully');
    }
}
