<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PayMatrixRow;

class PayMatrixRowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rows = PayMatrixRow::paginate(10);

        return view('frontend.pay-matrix-rows.list', compact('rows'));
    }

    public function fetchData(Request $request)
    {
        if($request->ajax()) {

            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $rows = PayMatrixRow::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('row_name', 'like', '%' . $query . '%');
            })
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);

            return response()->json(['data' => view('frontend.pay-matrix-rows.table', compact('rows'))->render()]);
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
            'row_name' => 'required',
        ]);

        $payMatrixRow = new PayMatrixRow();
        $payMatrixRow->row_name = $request->row_name;
        $payMatrixRow->status = $request->status;
        $payMatrixRow->save();

        session()->flash('success', 'Pay Matrix Row created successfully!');
        return response()->json(['success' => 'Pay Matrix Row created successfully!']);
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
        $payMatrixRow = PayMatrixRow::findOrFail($id);
        $edit = true;

        return response()->json(['view' => view('frontend.pay-matrix-rows.form', compact('payMatrixRow', 'edit'))->render()]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'row_name' => 'required',
        ]);

        $payMatrixRow = PayMatrixRow::findOrFail($id);
        $payMatrixRow->row_name = $request->row_name;
        $payMatrixRow->status = $request->status;
        $payMatrixRow->update();

        session()->flash('success', 'Pay Matrix Row updated successfully!');
        return response()->json(['success' => 'Pay Matrix Row updated successfully!']); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
