<?php

namespace App\Http\Controllers\Frontend\MemberInfo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\MemberRetirementInfo;

class MemberRetirementInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Member::all();
        $retirementInfos = MemberRetirementInfo::paginate(10);
        return view('frontend.member-info.retirement-info.list', compact('members', 'retirementInfos'));
    }

    public function fetchData(Request $request)
    {
        if($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $retirementInfos = MemberRetirementInfo::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('retirement_date', 'like', '%' . $query . '%')
                    ->orWhere('retirement_type', 'like', '%' . $query . '%');
            })
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);
            $members = Member::all();

            return response()->json(['data' => view('frontend.member-info.retirement-info.table', compact('retirementInfos', 'members'))->render()]);
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
            'member_id' => 'required',
            'retirement_age' => 'required|numeric',
            'retirement_date' => 'required',
            'retirement_type' => 'required',
            'el_days' => 'required',
            'hpl_days' => 'required',
        ]);

        $retirement = new MemberRetirementInfo();
        $retirement->member_id = $request->member_id;
        $retirement->retirement_age = $request->retirement_age;
        $retirement->retirement_date = $request->retirement_date;
        $retirement->retirement_type = $request->retirement_type;
        $retirement->el_days = $request->el_days;
        $retirement->hpl_days = $request->hpl_days;
        $retirement->save();

        session()->flash('success', 'Member retirement info created successfully.');
        return redirect()->route('member-retirement.index')->with('success', 'Member retirement info created successfully.');
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
        $retirementInfo = MemberRetirementInfo::findOrFail($id);
        $members = Member::all();
        $edit = true;

        // return view('frontend.member-info.retirement-info.form', compact('retirementInfo', 'members', 'edit'));
        return response()->json(['view' => view('frontend.member-info.retirement-info.form', compact('retirementInfo', 'members', 'edit'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'member_id' => 'required',
            'retirement_age' => 'required|numeric',
            'retirement_date' => 'required',
            'retirement_type' => 'required',
            'el_days' => 'required',
            'hpl_days' => 'required',
        ]);
        // dd($request->all());
        $retirement = MemberRetirementInfo::findOrFail($id);
        $retirement->member_id = $request->member_id;
        $retirement->retirement_age = $request->retirement_age;
        $retirement->retirement_date = $request->retirement_date;
        $retirement->retirement_type = $request->retirement_type;
        $retirement->el_days = $request->el_days;
        $retirement->hpl_days = $request->hpl_days;
        $retirement->update();

        session()->flash('success', 'Member retirement info updated successfully.');
        return redirect()->route('member-retirement.index')->with('success', 'Member retirement info updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
