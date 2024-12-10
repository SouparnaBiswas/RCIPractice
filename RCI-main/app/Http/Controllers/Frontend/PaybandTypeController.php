<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\PaybandType;
use App\Models\Member;
use Illuminate\Http\Request;

class PaybandTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payband_types = PaybandType::orderBy('id', 'desc')->paginate(10);
        return view('frontend.payband-types.list', compact('payband_types'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {

            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $payband_types = PaybandType::where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('id', 'like', '%' . $query . '%')
                    ->orWhere('payband_type', 'like', '%' . $query . '%');
            })
                ->orderBy($sort_by, $sort_type)
                ->paginate(10);

            return response()->json(['data' => view('frontend.payband-types.table', compact('payband_types'))->render()]);
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
            'payband_type' => 'required|max:255',
        ]);

        $payband_type = new PaybandType();
        $payband_type->payband_type = $request->payband_type;
        $payband_type->save();

        session()->flash('message', 'Payband Type added successfully');
        return response()->json(['success' => 'Payband Type added successfully']);
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
        $payband_type = PaybandType::find($id);
        $edit = true;
        return response()->json(['view' => view('frontend.payband-types.form', compact('edit', 'payband_type'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'payband_type' => 'required|max:255',
        ]);

        $payband_type = PaybandType::find($id);
        $payband_type->payband_type = $request->payband_type;
        $payband_type->save();

        session()->flash('message', 'Payband Type updated successfully');
        return response()->json(['success' => 'Payband Type updated successfully']);
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
        $related_members = Member::where('pay_band', $id)->exists();

        if ($related_members) {
            return redirect()->back()->with('error', 'Pay band is related to members.Please remove the relation first.');
        } else {
            $payband_type = PaybandType::find($id);
            $payband_type->delete();
            return redirect()->back()->with('message', 'Payband Type deleted successfully');
        }
    }
}
