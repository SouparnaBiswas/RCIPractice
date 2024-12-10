<?php

namespace App\Http\Controllers\Frontend\MemberInfo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\MemberNewspaperAllowance;
use App\Models\Category;

class MemberNewspaperAllowanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $members = Member::where('member_status', 1)->get();
        $categories = Category::orderBy('id', 'desc')->get();
        $member_newspapers = MemberNewspaperAllowance::paginate(10);
        return view('frontend.member-info.newspaper-allowance.list', compact('members','member_newspapers','categories'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $member_newspapers = MemberNewspaperAllowance::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('amount', 'like', '%' . $query . '%')
                    ->orWhere('year', 'like', '%' . $query . '%')
                    ->orWhereHas('member', function($queryBuilder) use ($query) {
                        $queryBuilder->where('name', 'like', '%' . $query . '%');
                            
                    });
                    
            })
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);

            return response()->json(['data' => view('frontend.member-info.newspaper-allowance.table', compact('member_newspapers'))->render()]);
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
            'amount' => 'required',
            'year' => 'required',
            'remarks' =>'required',
        ]);

        //check member newspaper allowance in same year already exists
        $member_newspaper = MemberNewspaperAllowance::where('member_id', $request->member_id)
            ->where('year', $request->year)
            ->first() ?? null;
        if ($member_newspaper) {

            return response()->json(['error' => 'Member Newspaper Amount already exists for this year']);
        }

        $member_newspaper = new MemberNewspaperAllowance();
        $member_newspaper->member_id = $request->member_id;
        $member_newspaper->amount = $request->amount;
        $member_newspaper->year = $request->year;
        $member_newspaper->remarks = $request->remarks;
        $member_newspaper->save();

        session()->flash('message', 'Member Newspaper Amount added successfully');
        return response()->json(['success' => 'Member Newspaper Amount added successfully']);
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
        $member_newspaper = MemberNewspaperAllowance::findOrFail($id);
        $members = Member::orderBy('id','desc')->get();
        $edit = true;

        return response()->json(['view' => view('frontend.member-info.newspaper-allowance.form', compact('member_newspaper', 'edit','members'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'member_id' => 'required',
            'amount' => 'required',
            'year' => 'required',
            'remarks' =>'required',
        ]);

        $member_newspaper = MemberNewspaperAllowance::findOrFail($id);
        $member_newspaper->member_id = $request->member_id;
        $member_newspaper->amount = $request->amount;
        $member_newspaper->year = $request->year;
        $member_newspaper->remarks = $request->remarks;
        $member_newspaper->update();

        session()->flash('message', 'Member Newspaper Allowance updated successfully!');
        return redirect()->route('member-newspaper-allowance.index')->with('message', 'Member Newspaper Allowance updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
