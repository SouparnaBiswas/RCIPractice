<?php

namespace App\Http\Controllers\Frontend\MemberInfo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MemberAllotedLeave;
use App\Models\Member;
use App\Models\LeaveType;

class MemberAllotedLeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allotedLeaves = MemberAllotedLeave::paginate(10);
        $members = Member::all();
        $leaveTypes = LeaveType::all();

        $startYear = 1958; 
        $currentYear = date('Y');
        
        $years = range($startYear, $currentYear);

        return view('frontend.member-info.member-alloted-leave.list', compact('allotedLeaves', 'members', 'leaveTypes', 'years'));
    }

    public function fetchData(Request $request)
    {
        if($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $allotedLeaves = MemberAllotedLeave::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('member_id', 'like', '%' . $query . '%')
                    ->orWhere('leave_type_id', 'like', '%' . $query . '%')
                    ->orWhere('alloted_leaves', 'like', '%' . $query . '%')
                    ->orWhere('status', '=', $query == 'Active' ? 1 : ($query == 'Inactive' ? 0 : null));
            })
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);

            $members = Member::all();
            $leaveTypes = LeaveType::all();

            $startYear = 1958; 
            $currentYear = date('Y');
            
            $years = range($startYear, $currentYear);

            return response()->json(['data' => view('frontend.member-info.member-alloted-leave.table', compact('allotedLeaves', 'members', 'leaveTypes', 'years'))->render()]);
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
            'leave_type_id' => 'required',
            'alloted_leaves' => 'required',
        ]);

        $allotedLeave = new MemberAllotedLeave();
        $allotedLeave->member_id = $request->member_id;
        $allotedLeave->leave_type_id = $request->leave_type_id;
        $allotedLeave->alloted_leaves = $request->alloted_leaves;
        $allotedLeave->year = $request->year;
        $allotedLeave->status = $request->status;
        $allotedLeave->save();

        session()->flash('success', 'Member alloted leave created successfully');
        return response()->json(['success' => 'Member alloted leave created successfully']);
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
        $allotedLeave = MemberAllotedLeave::findOrFail($id);
        $members = Member::all();
        $leaveTypes = LeaveType::all();
        $startYear = 1958; 
        $currentYear = date('Y');
        
        $years = range($startYear, $currentYear);
        $edit = true;

        return response()->json(['view' => view('frontend.member-info.member-alloted-leave.form', compact('allotedLeave', 'edit', 'members', 'leaveTypes', 'years'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            // 'member_id' => 'required',
            'leave_type_id' => 'required',
            'alloted_leaves' => 'required',
        ]);

        $allotedLeave = MemberAllotedLeave::findOrFail($id);
        // $allotedLeave->member_id = $request->member_id;
        $allotedLeave->leave_type_id = $request->leave_type_id;
        $allotedLeave->alloted_leaves = $request->alloted_leaves;
        // $allotedLeave->year = $request->year;
        $allotedLeave->status = $request->status;
        $allotedLeave->update();

        session()->flash('success', 'Member alloted leave updated successfully');
        return response()->json(['success' => 'Member alloted leave updated successfully']);
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
        $allotedLeave = MemberAllotedLeave::findOrFail($id);
        $allotedLeave->delete();

        session()->flash('success', 'Member alloted leave deleted successfully');
        return redirect()->route('member-alloted-leave.index')->with('success', 'Member alloted leave deleted successfully');
    }
}
