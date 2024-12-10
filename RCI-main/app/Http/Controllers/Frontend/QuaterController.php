<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quater;
use App\Models\Member;
use App\Models\GradePay;

class QuaterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quarters = Quater::orderBy('id', 'desc')->paginate(10);
        $grade_pays = GradePay::where('status', 1)->get();
        return view('frontend.quarter.list',compact('quarters','grade_pays'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {

            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $quarters = Quater::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('id', 'like', '%' . $query . '%')
                    ->orWhere('license_fee', 'like', '%' . $query . '%')
                    ->orWhere('qrt_type', 'like', '%' . $query . '%')
                    ->orWhere('qrt_charge', 'like', '%' . $query . '%')
                    ->orWhere('status', '=', $query == 'Active' ? 1 : ($query == 'Inactive' ? 0 : null));
            })
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);

            return response()->json(['data' => view('frontend.quarter.table', compact('quarters'))->render()]);
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
            'status' => 'required',
            'grade_pay_id' => 'required',
            'license_fee' => 'required',
            'qrt_type' => 'required',
            'qrt_charge' => 'required',
        ]);

        $quarter_value = new Quater();
        $quarter_value->grade_pay_id = $request->grade_pay_id;
        $quarter_value->license_fee = $request->license_fee;
        $quarter_value->qrt_type = $request->qrt_type;
        $quarter_value->qrt_charge = $request->qrt_charge;
        $quarter_value->status = $request->status;
        $quarter_value->save();

        session()->flash('message', 'Quarter added successfully');
        return response()->json(['success' => 'Quarter added successfully']);
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
        $quarter = Quater::find($id);
        $grade_pays = GradePay::where('status', 1)->get();
        $edit = true;
        return response()->json(['view' => view('frontend.quarter.form', compact('edit','quarter','grade_pays'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'status' => 'required',
            'grade_pay_id' => 'required',
            'license_fee' => 'required',
            'qrt_type' => 'required',
            'qrt_charge' => 'required',
        ]);

        $quarter_value = Quater::find($id);
        $quarter_value->grade_pay_id = $request->grade_pay_id;
        $quarter_value->license_fee = $request->license_fee;
        $quarter_value->qrt_type = $request->qrt_type;
        $quarter_value->qrt_charge = $request->qrt_charge;
        $quarter_value->status = $request->status;
        $quarter_value->update();

        session()->flash('message', 'Quarter updated successfully');
        return response()->json(['success' => 'Quarter updated successfully']);
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
        $related_members = Member::where('quater', $id)->exists();

        if ($related_members) {
            return redirect()->back()->with('error', 'Quater is related to members.Please remove the relation first.');
        } else {
            $quarter = Quater::find($id);
            $quarter->delete();
            return redirect()->back()->with('message', 'Quarter deleted successfully');
        }
    }
}
