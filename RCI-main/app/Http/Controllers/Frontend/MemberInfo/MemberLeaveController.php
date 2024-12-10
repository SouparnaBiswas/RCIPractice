<?php

namespace App\Http\Controllers\Frontend\MemberInfo;

use App\Http\Controllers\Controller;
use App\Models\LeaveType;
use App\Models\Member;
use App\Models\MemberAllotedLeave;
use App\Models\MemberLeave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemberLeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $leaves = MemberLeave::paginate(10);
        $members = Member::all();
        $subQuery = DB::table('member_leaves')
            ->select('member_id', 'leave_type_id', DB::raw('SUM(no_of_days) as total_days'))
            ->where('year', date('Y'))
            ->groupBy('member_id', 'leave_type_id');

        $leaves = DB::table('member_leaves')
            ->joinSub($subQuery, 'sub', function ($join) {
                $join->on('member_leaves.member_id', '=', 'sub.member_id')
                    ->on('member_leaves.leave_type_id', '=', 'sub.leave_type_id');
            })
            ->join('members', 'member_leaves.member_id', '=', 'members.id')
            ->join('leave_types', 'member_leaves.leave_type_id', '=', 'leave_types.id')
            ->where('member_leaves.year', date('Y'))
            ->select('member_leaves.*', 'members.name', 'leave_types.leave_type_abbr as leave_type', 'sub.total_days')
            ->paginate(10);

        $leaveTypes = LeaveType::all();
        $allotedLeaves = MemberAllotedLeave::all();

        $startYear = 1958;
        $endYear = date('Y');
        $years = range($endYear, $startYear, -1);
        
        return view('frontend.member-info.member-leave.list', compact('leaves', 'members', 'leaveTypes', 'years', 'allotedLeaves'));
    }

    /**
     * Display a listing of the member leaves.
     */
    public function memberLeaves() 
    {
        $members = Member::all();
        $leaveTypes = LeaveType::all();
        $memberLeaves = MemberLeave::paginate(10);

        $startYear = 1958;
        $endYear = date('Y');
        $years = range($startYear, $endYear);

        return view('frontend.member-info.member-leave.leave-list', compact('members', 'leaveTypes', 'years', 'memberLeaves'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $leaves = MemberLeave::all();
        // $members = Member::all();
        // $leaveTypes = LeaveType::all();

        // $startYear = 1958;
        // $endYear = date('Y');

        // $years = range($startYear, $endYear);

        // return view('frontend.memberInfo.member-leave.form', compact('members', 'leaveTypes', 'years'));
    }

    public function leaveFetchData(Request $request)
    {
        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $memberLeaves = MemberLeave::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('start_date', 'like', '%' . $query . '%')
                    ->orWhere('end_date', 'like', '%' . $query . '%')
                    ->orWhere('no_of_days', 'like', '%' . $query . '%')
                    ->orWhere('year', 'like', '%' . $query . '%')
                    ->orWhere('status', 'like', '%' . $query . '%');
            })
            ->orWhereHas('member', function($queryBuilder) use ($query) {
                $queryBuilder->where('name', 'like', '%' . $query . '%'); // Adjust this to match the field in the related model
            })
            ->orWhereHas('leaveType', function($queryBuilder) use ($query) {
                $queryBuilder->where('leave_type_abbr', 'like', '%' . $query . '%'); // Adjust this to match the field in the related model
            })
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);

            $members = Member::all();
            $leaveTypes = LeaveType::all();

            $startYear = 1958;
            $endYear = date('Y');

            $years = range($startYear, $endYear);

            return response()->json(['data' => view('frontend.member-info.member-leave.leave-table', compact('memberLeaves', 'members', 'leaveTypes', 'years'))->render()]);
        }
    }

    public function yearSearch(Request $request)
    {

        if ($request->ajax()) {
            $year = $request->get('year');
            $subQuery = DB::table('member_leaves')
            ->select('member_id', 'leave_type_id', DB::raw('SUM(no_of_days) as total_days'))
            ->where('year', $year)
            ->groupBy('member_id', 'leave_type_id');

            
            $leaves = DB::table('member_leaves')
            ->joinSub($subQuery, 'sub', function ($join) {
                $join->on('member_leaves.member_id', '=', 'sub.member_id')
                    ->on('member_leaves.leave_type_id', '=', 'sub.leave_type_id');
            })
            ->join('members', 'member_leaves.member_id', '=', 'members.id')
            ->join('leave_types', 'member_leaves.leave_type_id', '=', 'leave_types.id')
            ->where('member_leaves.year', $year)
            ->select('member_leaves.*', 'members.name', 'leave_types.leave_type_abbr as leave_type', 'sub.total_days')
            ->paginate(10);

            $leaveTypes = LeaveType::all();
            $allotedLeaves = MemberAllotedLeave::all();
            $members = Member::all();
            $startYear = 1958;
            $endYear = date('Y');

            $years = range($startYear, $endYear);

            return response()->json(['data' => view('frontend.member-info.member-leave.table', compact('leaves', 'members', 'leaveTypes', 'years','allotedLeaves'))->render()]);
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'member_id' => 'required',
            'leave_type_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'reason' => 'required',
            'no_of_days' => 'required',
            'year' => 'required',
            'status' => 'required',
        ]);

        //check if start date is between start date and end date of leave application is already in database which status is not rejected
        $checkStartDate = MemberLeave::where('member_id', $request->member_id)
            ->where('start_date', $request->start_date)
            ->where('status', '!=', 2)
            ->first();

        $memberLeave = new MemberLeave();
        $memberLeave->member_id = $request->member_id;
        $memberLeave->leave_type_id = $request->leave_type_id;
        $memberLeave->start_date = $request->start_date;
        $memberLeave->end_date = $request->end_date;
        $memberLeave->reason = $request->reason;
        $memberLeave->no_of_days = $request->no_of_days;
        $memberLeave->remaining_leaves = $request->remaining_leaves;
        $memberLeave->year = $request->year;
        $memberLeave->status = $request->status;
        

        // update member alloted leave if status is approved
        if ($request->status == 1) {
            $memberAllotedLeave = MemberAllotedLeave::where('member_id', $request->member_id)
                ->where('leave_type_id', $request->leave_type_id)
                ->where('year', $request->year)
                ->first();
            $memberLeave->remaining_leaves = $memberAllotedLeave->alloted_leaves - $request->no_of_days;
        }
        $memberLeave->save();

        session()->flash('success', 'Member Leave Created Successfully!');
        // return redirect()->route('member-leaves.index')->with('success', 'Member Leave Created Successfully!');
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
        $memberLeave = MemberLeave::findOrFail($id);
        $members = Member::all();
        $leaveTypes = LeaveType::all();

        $startYear = 1958;
        $endYear = date('Y');

        $years = range($startYear, $endYear);
        $edit = true;

        return response()->json(['view' => view('frontend.member-info.member-leave.form', compact('memberLeave', 'members', 'leaveTypes', 'edit', 'years'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            // 'member_id' => 'required',
            // 'leave_type_id' => 'required',
            // 'start_date' => 'required',
            // 'end_date' => 'required',
            // 'reason' => 'required',
            // 'no_of_days' => 'required',
            // 'year' => 'required',
            // 'status' => 'required',
        ]);

        $memberLeave = MemberLeave::findOrFail($id);
        // $memberLeave->member_id = $request->member_id;
        // $memberLeave->leave_type_id = $request->leave_type_id;
        // $memberLeave->start_date = $request->start_date;
        // $memberLeave->end_date = $request->end_date;
        // $memberLeave->reason = $request->reason;
        // $memberLeave->no_of_days = $request->no_of_days;
        // $memberLeave->year = $request->year;
        $memberLeave->status = $request->status;

        // update member alloted leave if status is approved
        if ($request->status == 1) {
            $memberAllotedLeave = MemberAllotedLeave::where('member_id', $memberLeave->member_id)
                ->where('leave_type_id', $memberLeave->leave_type_id)
                ->where('year', $memberLeave->year)
                ->first();
            $memberLeave->remaining_leaves = $memberAllotedLeave->alloted_leaves - $memberLeave->no_of_days;
        }

        $memberLeave->update();

        session()->flash('success', 'Member Leave Updated Successfully!');
        return redirect()->route('member-leaves.index')->with('success', 'Member Leave Updated Successfully!');
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
        $memberLeave = MemberLeave::findOrFail($id);
        $memberLeave->delete();

        session()->flash('success', 'Member Leave Deleted Successfully!');
        return redirect()->route('member-leaves.index')->with('success', 'Member Leave Deleted Successfully!');
    }

    public function getAllotedLeaves(Request $request)
    {
        $member_id = $request->memberId;
        $leave_type_id = $request->leaveTypeId;
        $year = ($request->year) ? $request->year : date('Y');

        $allotedLeaves = MemberAllotedLeave::where('member_id', $member_id)
            ->where('leave_type_id', $leave_type_id)
            ->where('year', $year)
            ->first();

        if(is_null($allotedLeaves) || $allotedLeaves->alloted_leaves == 0) {
            $memberAlltedleaves = 0;
        } else {
            $memberAlltedleaves = $allotedLeaves->alloted_leaves;
        }

        $remainingLeaves = MemberLeave::where('member_id', $member_id)
            ->where('leave_type_id', $leave_type_id)
            ->where('year', $year)
            ->where('status', 1)
            ->select('remaining_leaves')->latest()->first();

        if(is_null($remainingLeaves) || $remainingLeaves->remaining_leaves == 0) {
            $remainingLeaves = $memberAlltedleaves;
        } else {
            $remainingLeaves = $remainingLeaves->remaining_leaves;
        }

        return response()->json(['data' => $remainingLeaves]);
        
    }
    
}
