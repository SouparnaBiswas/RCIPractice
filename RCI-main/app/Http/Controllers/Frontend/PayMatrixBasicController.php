<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PayMatrixBasic;
use App\Models\PmLevel;
use App\Models\PayMatrixRow;

class PayMatrixBasicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $basics = PayMatrixBasic::with('pmLevel', 'payMatrixRow')->paginate(10);
        $pmLevels = PmLevel::all();
        $pmRows = PayMatrixRow::all();

        return view('frontend.pay-matrix-basics.list', compact('basics', 'pmLevels', 'pmRows'));

    }

    public function fetchData(Request $request)
    {
        if($request->ajax()) {

            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $basics = PayMatrixBasic::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('basic_pay', 'like', '%' . $query . '%');
            })
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);

            return response()->json(['data' => view('frontend.pay-matrix-basics.table', compact('basics'))->render()]);
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
            'basic_pay' => 'required',
            'pm_level_id' => 'required',
            'pay_matrix_row_id' => 'required',
        ]);

        $payMatrixBasic = new PayMatrixBasic();
        $payMatrixBasic->basic_pay = $request->basic_pay;
        $payMatrixBasic->pm_level_id = $request->pm_level_id;
        $payMatrixBasic->pay_matrix_row_id = $request->pay_matrix_row_id;
        $payMatrixBasic->status = $request->status;
        $payMatrixBasic->save();

        session()->flash('success', 'Pay Matrix Basic created successfully!');
        return response()->json(['success' => 'Pay Matrix Basic created successfully!']);
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
        $payMatrixBasic = PayMatrixBasic::findOrFail($id);
        $pmRows = PayMatrixRow::all();
        $pmLevels = PmLevel::all();
        $edit = true;

        return response()->json(['view' => view('frontend.pay-matrix-basics.form', compact('payMatrixBasic', 'pmRows', 'pmLevels', 'edit'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'basic_pay' => 'required',
            'pm_level_id' => 'required',
            'pay_matrix_row_id' => 'required',
        ]);

        $payMatrixBasic = PayMatrixBasic::findOrFail($id);
        $payMatrixBasic->basic_pay = $request->basic_pay;
        $payMatrixBasic->pm_level_id = $request->pm_level_id;
        $payMatrixBasic->pay_matrix_row_id = $request->pay_matrix_row_id;
        $payMatrixBasic->status = $request->status;
        $payMatrixBasic->update();

        session()->flash('success', 'Pay Matrix Basic updated successfully!');
        return response()->json(['success' => 'Pay Matrix Basic updated successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
