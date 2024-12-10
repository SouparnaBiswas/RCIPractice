<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Division;
use App\Models\Member;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $divisions = Division::orderBy('id', 'desc')->paginate(10);
        return view('frontend.division.list',compact('divisions'));
    }


    public function fetchData(Request $request)
    {
        if ($request->ajax()) {

            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $divisions = Division::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('id', 'like', '%' . $query . '%')
                    ->orWhere('value', 'like', '%' . $query . '%')
                    ->orWhere('status', '=', $query == 'Active' ? 1 : ($query == 'Inactive' ? 0 : null));
            })
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);

            return response()->json(['data' => view('frontend.division.table', compact('divisions'))->render()]);
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

        $division_value = new Division();
        $division_value->value = $request->value;
        $division_value->status = $request->status;
        $division_value->save();

        session()->flash('message', 'Division added successfully');
        return response()->json(['success' => 'Division added successfully']);
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
        $division = Division::find($id);
        $edit = true;
        return response()->json(['view' => view('frontend.division.form', compact('edit','division'))->render()]);
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

        $division = Division::find($id);
        $division->value = $request->value;
        $division->status = $request->status;
        $division->save();

        session()->flash('message', 'Division updated successfully');
        return response()->json(['success' => 'Division updated successfully']);
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
        $related_members = Member::where('division', $id)->exists();

        if ($related_members) {
            return redirect()->back()->with('error', 'Division is related to members.Please remove the relation first.');
        } else {
            $division = Division::find($id);
            $division->delete();
            return redirect()->back()->with('message', 'Division deleted successfully');
        }
    }
}
