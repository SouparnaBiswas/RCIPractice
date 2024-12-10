<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GradePay;
use App\Models\PmLevel;

class GradePayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gradePays = GradePay::orderBy('id', 'desc')->paginate(10);
        $pay_levels = PmLevel::where('status', 1)->get();
        return view('frontend.grade-pays.list',compact('gradePays','pay_levels'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {

            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $gradePays = GradePay::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('id', 'like', '%' . $query . '%')
                    ->orWhere('amount', 'like', '%' . $query . '%')
                    ->orWhere('status', '=', $query == 'Active' ? 1 : ($query == 'Inactive' ? 0 : null));
            })
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);

            return response()->json(['data' => view('frontend.grade-pays.table', compact('gradePays'))->render()]);
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
            'pm_level' => 'required',
            'amount' => 'required|max:255',
            'status' => 'required',
        ]);

        $grade_pay = new GradePay();
        $grade_pay->pay_level = $request->pm_level;
        $grade_pay->amount = $request->amount;
        $grade_pay->status = $request->status;
        $grade_pay->save();

        session()->flash('message', 'Grade Pay added successfully');
        return response()->json(['success' => 'Grade Pay added successfully']);
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
        $grade_pay = GradePay::find($id);
        $pay_levels = PmLevel::where('status', 1)->get();
        $edit = true;
        return response()->json(['view' => view('frontend.grade-pays.form', compact('edit','grade_pay','pay_levels'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'pm_level' => 'required',
            'amount' => 'required|max:255',
            'status' => 'required',
        ]);

        $grade_update = GradePay::find($id);
        $grade_update->pay_level = $request->pm_level;
        $grade_update->amount = $request->amount;
        $grade_update->status = $request->status;
        $grade_update->update();

        session()->flash('message', 'Grade Pay updated successfully');
        return response()->json(['success' => 'Grade Pay updated successfully']);
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
        $grade_pay = GradePay::find($id);
        $grade_pay->delete();

        session()->flash('message', 'Grade Pay deleted successfully');
        return response()->json(['success' => 'Grade Pay deleted successfully']);
    }
}
