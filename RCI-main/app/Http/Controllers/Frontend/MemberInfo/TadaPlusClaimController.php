<?php

namespace App\Http\Controllers\Frontend\MemberInfo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Member;
use App\Models\Project;
use App\Models\TadaAdvance;
use App\Models\TadaPriority;
use App\Models\MemberCoreInfo;
use App\Models\MemberPersonalInfo;

use App\Helpers\Helper;
use PDF;

class TadaPlusClaimController extends Controller
{
    public function index(){
        $data = TadaAdvance::orderBy('id', 'desc')->paginate(5);
        $member = Member::where('member_status', '1')->get();
        $project = Project::where('status', '1')->get();
        return view('frontend.member-info.tada-advance.list-plus',compact('member','project','data'));
    }



    public function fetchdata(Request $request)
    {
        $sort_by = $request->get('sortby');
        $sort_type = $request->get('sorttype');
        $query = $request->get('query');
        $query = str_replace(" ", "%", $query);
        $data = TadaAdvance::where(function($queryBuilder) use ($query) {
            $queryBuilder->where('bill_no', 'like', '%' . $query . '%')
                ->orWhere('amount_requested', 'like', '%' . $query . '%');
        })
        ->orderBy($sort_by, $sort_type)
        ->paginate(5);
        $member = Member::where('member_status', '1')->get();
        $project = Project::where('status', '1')->get();

        return response()->json(['view' => view('frontend.member-info.tada-advance.table-plus', compact('member','project','data'))->render()]);
    }



    public function report(Request $request)
    {
        $id=$request->id;
        $data = TadaAdvance::findOrFail($id);
        $member = Member::with('desigs')->where('id', $data->member_id)->get()->first() ?? '';

        $project = Project::where('id', $data->project_id)->get()->first() ?? '';
        $memberInfo = MemberCoreInfo::where('member_id', $data->member_id)->first() ?? '';


        $pdf1 = PDF::loadView('frontend.member-info.tada-advance.report-plus',compact('member','project','data','memberInfo'));
        return $pdf1->download('tadaPlus-'.$member->name.'-'. time() . '.pdf');

    }






    public function edit(string $id)
    {
        $data = TadaAdvance::findOrFail($id);
        $edit = true;

        return response()->json(['view' => view('frontend.member-info.tada-advance.form-plus', compact('data','edit'))->render()]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $tada = TadaAdvance::findOrFail($id);
        $tada->claim_amount = $request->claim_amount;
        $tada->pass_amount = $request->pass_amount;
        $tada->mro = $request->mro;
        $tada->due_amount = $request->due_amount;
        $tada->updated_at = now();
        $tada->update();

        session()->flash('success', 'Data updated successfully.');
        return redirect()->route('tada-plus.index')->with('success', 'Data updated successfully.');
    }


}
