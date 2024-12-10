<?php

namespace App\Http\Controllers\Frontend\MemberInfo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\MemberChildrenDetail;
use App\Models\MemberChildAllowance;
use Illuminate\Support\Facades\DB;

class MemberChildAllowanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Member::orderBy('id','desc')->get();
        $member_allowances = MemberChildAllowance::select(
            'member_id'  // Count of records
        )
        ->where('year', date('Y'))
        ->groupBy('member_id')
        ->paginate(10);

        return view('frontend.member-info.child-allowance.list', compact('members','member_allowances'));
    }

    public function childallowancefetch(Request $request)
    {
        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $member_allowances = MemberChildAllowance::selectRaw('member_id, MAX(id) as id')
                ->where(function($queryBuilder) use ($query) {
                    $queryBuilder->whereHas('member', function($queryBuilder) use ($query) {
                        $queryBuilder->where('name', 'like', '%' . $query . '%');
                    });
                })
                ->where('year', date('Y'))
                ->groupBy('member_id')
                ->orderBy($sort_by, $sort_type)
                ->paginate(10);

            return response()->json(['data' => view('frontend.member-info.child-allowance.table', compact('member_allowances'))->render()]);
        }
    }

    public function memberChildDataFetch(Request $request)
    {
        $member_childs = MemberChildrenDetail::where('member_id', $request->member_id)->get();
        $childs = true;
        return response()->json(['view' => view('frontend.member-info.child-allowance.child-form', compact('member_childs','childs'))->render()]);
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
        // validation member_id and date
        $request->validate([
            'member_id' => 'required',
            'year' => 'required',
        ]);

        // check if this member already has child allowance for this year
        $member_child_allowance = MemberChildAllowance::where('member_id', $request->member_id)->where('year', $request->year)->count();
        if ($member_child_allowance > 0) {
            return response()->json(['error' => 'This member already has child allowance for this year']);
        }
        // if child_name is not empty
        if (!empty($request->child_name)) {
            foreach ($request->child_name as $key => $value) {
                $member_child_allowance = new MemberChildAllowance();
                $member_child_allowance->member_id = $request->member_id;
                $member_child_allowance->year = $request->year;
                $member_child_allowance->child_id = $request->child_id[$key];
                $member_child_allowance->child_name = $value;
                $member_child_allowance->child_dob = $request->child_dob[$key];
                $member_child_allowance->child_school = $request->child_school[$key];
                $member_child_allowance->child_class = $request->child_class[$key];
                $member_child_allowance->academic_year = $request->academic_year[$key];
                $member_child_allowance->allowance_amount = $request->allowance_amount[$key];
                $member_child_allowance->save();
            }
        }

        session()->flash('message', 'Member child allowance added successfully');
        return response()->json(['success' => 'Member child allowance added successfully']);

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
    public function edit(string $id, Request $request)
    {
        $members = Member::orderBy('id','desc')->get();
        $member_id = $id;
        $edit_year = $request->year;
        $member_childs = MemberChildAllowance::where('member_id', $id)->where('year', $request->year)->get();
        $childs = true;
        $edit = true;
        return response()->json(['view' => view('frontend.member-info.child-allowance.form', compact('member_childs','childs','members','edit','member_id','edit_year'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $delete_member_allowances = MemberChildAllowance::where('member_id', $id)->where('year', $request->year)->delete();
        // if child_name is not empty
        if (!empty($request->child_name)) {
            foreach ($request->child_name as $key => $value) {
                $member_child_allowance = new MemberChildAllowance();
                $member_child_allowance->member_id = $id;
                $member_child_allowance->year = $request->year;
                $member_child_allowance->child_id = $request->child_id[$key];
                $member_child_allowance->child_name = $value;
                $member_child_allowance->child_dob = $request->child_dob[$key];
                $member_child_allowance->child_school = $request->child_school[$key];
                $member_child_allowance->child_class = $request->child_class[$key];
                $member_child_allowance->academic_year = $request->academic_year[$key];
                $member_child_allowance->allowance_amount = $request->allowance_amount[$key];
                $member_child_allowance->save();
            }
        }

        session()->flash('message', 'Member child allowance updated successfully');
        return response()->json(['success' => 'Member child allowance updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
