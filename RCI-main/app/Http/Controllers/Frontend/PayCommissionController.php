<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PayCommission;

class PayCommissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payCommissions = PayCommission::paginate(10);

        return view('frontend.pay-commissions.list', compact('payCommissions'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {

            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $payCommissions = PayCommission::where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('id', 'like', '%' . $query . '%')
                    ->orWhere('name', 'like', '%' . $query . '%')
                    ->orWhere('year', 'like', '%' . $query . '%');
                })
                ->orderBy($sort_by, $sort_type)
                ->paginate(10);

            return response()->json(['data' => view('frontend.pay-commissions.table', compact('payCommissions'))->render()]);
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
            'name' => 'required',
            'year' => 'required',
        ]);

        $payCommission = new PayCommission();
        $payCommission->name = $request->name;
        $payCommission->year = $request->year;
        $payCommission->is_active = $request->status;
        $payCommission->save();

        session()->flash('message', 'Pay Commission updated successfully');
        return response()->json([
            'message' => 'Pay Commission created successfully!'
        ]);

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
        $payCommission = PayCommission::findOrFail($id);
        $edit = true;

        return response()->json([
            'view' => view('frontend.pay-commissions.form', compact('payCommission', 'edit'))->render()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'year' => 'required',
        ]);

        $payCommission = PayCommission::findOrFail($id);
        $payCommission->name = $request->name;
        $payCommission->year = $request->year;
        $payCommission->is_active = $request->status;
        $payCommission->update();

        session()->flash('message', 'Pay Commission updated successfully');
        return response()->json([
            'message' => 'Pay Commission updated successfully!'
        ]);
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
        $payCommission = PayCommission::findOrFail($id);
        $payCommission->delete();

        return redirect()->back()->with('message', 'Pay Commission deleted successfully.');
    }
}
