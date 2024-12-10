<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PmLevel;
use App\Models\Member;
use App\Models\Payband;
use App\Helpers\Helper;
use App\Models\PayCommission;

class PmLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pm_levels = PmLevel::orderBy('id', 'desc')->paginate(10);
        $pay_commissions = PayCommission::orderBy('id', 'desc')->get();
        $financialYears = Helper::getFinancialYears();
        $pay_bands = Payband::get();
        return view('frontend.pm-levels.list', compact('pm_levels','pay_commissions', 'pay_bands','financialYears'));
    }


    public function fetchData(Request $request)
    {
        if ($request->ajax()) {

            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $pm_levels = PmLevel::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('id', 'like', '%' . $query . '%')
                    ->orWhere('value', 'like', '%' . $query . '%')
                    ->orWhere('basic', 'like', '%' . $query . '%')
                    ->orWhere('year', 'like', '%' . $query . '%')
                    ->orWhere('status', '=', $query == 'Active' ? 1 : ($query == 'Inactive' ? 0 : null));
                
            })
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);
            $pay_commissions = PayCommission::orderBy('id', 'desc')->get();
            $pay_bands = Payband::get();


            return response()->json(['data' => view('frontend.pm-levels.table', compact('pm_levels', 'pay_commisions', 'pay_bands'))->render()]);
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
            'value' => 'required|max:255',
            'payband' => 'required',
            'entry_pay' => 'required|numeric',
            'year' => 'required',
            'status' => 'required',
        ]);

        
        $pm_level_value = new PmLevel();
        $pm_level_value->payband = $request->payband;
        $pm_level_value->pay_commission = $request->pay_commission;
        $pm_level_value->value = $request->value;
        $pm_level_value->var_incr = $request->var_incr;
        $pm_level_value->noi = $request->noi;
        $pm_level_value->entry_pay = $request->entry_pay;
        $pm_level_value->month = $request->month;
        $pm_level_value->year = $request->year;
        $pm_level_value->status = $request->status;
        $pm_level_value->save();

        session()->flash('message', 'PM Level added successfully');
        return response()->json(['success' => 'PM Level added successfully']);
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
        $pm_level = PmLevel::find($id);
        $pay_commissions = PayCommission::orderBy('id', 'desc')->get();
        
        $financialYears = Helper::getFinancialYears();
        $pay_bands = Payband::where('year', $pm_level->year)->get();
        $edit = true;
        return response()->json(['view' => view('frontend.pm-levels.form', compact('edit', 'pm_level','pay_commissions', 'pay_bands','financialYears'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'value' => 'required|max:255',
            'payband' => 'required',
            'entry_pay' => 'required|numeric',
            'year' => 'required',
            'status' => 'required',
        ]);

        $pm_level = PmLevel::find($id);
        $pm_level->payband = $request->payband;
        $pm_level->pay_commission = $request->pay_commission;
        $pm_level->value = $request->value;
        $pm_level->var_incr = $request->var_incr;
        $pm_level->noi = $request->noi;
        $pm_level->entry_pay = $request->entry_pay;
        $pm_level->month = $request->month;
        $pm_level->year = $request->year;
        $pm_level->status = $request->status;
        $pm_level->update();

        session()->flash('message', 'PM Level updated successfully');
        return response()->json(['success' => 'PM Level updated successfully']);
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
        $related_members = Member::where('pm_level', $id)->exists();

        if ($related_members) {
            return redirect()->back()->with('error', 'PM Level is related to members.Please remove the relation first.');
        } else {

            $pm_level = PmLevel::find($id);
            $pm_level->delete();
            return redirect()->back()->with('message', 'PM Level deleted successfully');
        }
    }

    public function getPayBands(Request $request)
    {
        $pay_bands = Payband::where('year', $request->year)->get();
        return response()->json(['pay_bands' => $pay_bands]);
    }
}
