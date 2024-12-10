<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FundType;
use App\Models\Member;

class FundTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fundTypes = FundType::orderBy('id', 'desc')->paginate(10);
        return view('frontend.fund-types.list',compact('fundTypes'));
    }


    public function fetchData(Request $request)
    {
        if ($request->ajax()) {

            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $fundTypes = FundType::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('id', 'like', '%' . $query . '%')
                    ->orWhere('value', 'like', '%' . $query . '%')
                    ->orWhere('status', '=', $query == 'Active' ? 1 : ($query == 'Inactive' ? 0 : null));
            })
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);

            return response()->json(['data' => view('frontend.fund-types.table', compact('fundTypes'))->render()]);
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
            'status' => 'required',
        ]);

        $fund_Type_value = new FundType();
        $fund_Type_value->value = $request->value;
        $fund_Type_value->status = $request->status;
        $fund_Type_value->save();

        session()->flash('message', 'Fund Type added successfully');
        return response()->json(['success' => 'Fund Type added successfully']);
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
        $fundType = FundType::find($id);
        $edit = true;
        return response()->json(['view' => view('frontend.fund-types.form', compact('edit','fundType'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'value' => 'required|max:255',
            'status' => 'required',
        ]);

        $fundType = FundType::find($id);
        $fundType->value = $request->value;
        $fundType->status = $request->status;
        $fundType->save();

        session()->flash('message', 'Fund Type updated successfully');
        return response()->json(['success' => 'Fund Type updated successfully']);
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
        $related_members = Member::where('fund_type', $id)->exists();

        if ($related_members) {
            return redirect()->back()->with('error', 'Fund Type is related to members.Please remove the relation first.');
        } else {
            $fundType = FundType::find($id);
            $fundType->delete();
            return redirect()->back()->with('message', 'Fund Type deleted successfully');
        }
    }
}
