<?php

namespace App\Http\Controllers\Frontend\MemberInfo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;
use App\Models\Member;
use App\Models\Project;
use App\Models\TadaAdvance;
use App\Models\TadaPriority;
use App\Models\MemberCoreInfo;
use App\Models\MemberPersonalInfo;

use App\Helpers\Helper;


class TaDaAdvanceController extends Controller
{
    public function index(){
        $data = TadaAdvance::orderBy('id', 'desc')->paginate(5);
        $member = Member::where('member_status', '1')->get();
        $project = Project::where('status', '1')->get();
        return view('frontend.member-info.tada-advance.list',compact('member','project','data'));
    }

    public function priority_list(Request $request){
        $id = $request->id;
        $tadaAdv = TadaAdvance::findOrFail($id);
        $dataPriority = TadaPriority::where('tada_adv_id', $id)->get();

        $member = Member::where('id', $tadaAdv->member_id)->get()->first() ?? '';
        return view('frontend.member-info.tada-advance.list-priority',compact('tadaAdv','dataPriority','member'));
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

        return response()->json(['view' => view('frontend.member-info.tada-advance.table', compact('member','project','data'))->render()]);
    }



    public function report(Request $request)
    {
        $id=$request->id;
        $data = TadaAdvance::findOrFail($id);
        $member = Member::with('desigs')->where('id', $data->member_id)->where('pay_stop','No')->get()->first() ?? '';

        $project = Project::where('id', $data->project_id)->get()->first() ?? '';
        $memberInfo = MemberCoreInfo::where('member_id', $data->member_id)->first() ?? '';


        $pdf1 = PDF::loadView('frontend.member-info.tada-advance.report',compact('member','project','data','memberInfo'));
        return $pdf1->download('tadaAdvance-'.$member->name.'-'. time() . '.pdf');

    }

    public function report_priority(Request $request)
    {

        $id=$request->id;
        $tadaAdv = TadaAdvance::findOrFail($id);
        $data = TadaPriority::where('tada_adv_id', $id)->get();

        $member = Member::with('desigs')->where('id', $tadaAdv->member_id)->get()->first() ?? '';

        $project = Project::where('id', $tadaAdv->project_id)->get()->first() ?? '';
        $memberInfo = MemberCoreInfo::where('member_id', $tadaAdv->member_id)->first() ?? '';
        $memberPerInfo = MemberPersonalInfo::where('member_id', $tadaAdv->member_id)->first() ?? '';

        $fontPath = asset('frontend_assets/fonts/Mangal-Bold.ttf');



        $pdf = PDF::loadView('frontend.member-info.tada-advance.report-priority',compact('data','tadaAdv','project','member','memberInfo','memberPerInfo'));
        return $pdf->download('tadaAdvance-'.$member->name.'-'. time() . '.pdf');

    }


    public function store_priority(Request $request)
    {
        $tada_adv_id = $request->tada_adv_id;

        $request->validate([
            'tada_adv_id' => 'required',
            'from_location' => 'required',
            'to_location' => 'required'
        ]);

        $tada = new TadaPriority();
        $tada->tada_adv_id = $request->tada_adv_id;
        $tada->from_location = $request->from_location;
        $tada->to_location = $request->to_location;
        $tada->food_day = $request->food_day;
        $tada->food_amount = $request->food_amount;
        $tada->hotel_day = $request->hotel_day;
        $tada->hotel_amount = $request->hotel_amount;
        $tada->total_da = $request->total_da;
        $tada->created_at = now();
        $tada->save();

        session()->flash('success', 'Data Stored successfully.');
        return redirect('/member-info/tada-advance/tada-priority-table/'.$tada_adv_id)->with('success', 'Data Stored successfully.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'member_id' => 'required',
            'project_id' => 'required',
            'bill_date' => 'required',
            'amount_requested' => 'required',
        ]);

        $tada = new TadaAdvance();
        $tada->member_id = $request->member_id;
        $tada->project_id = $request->project_id;
        $tada->bill_no = "MOB00".date('Y').rand(10,10000).date('i').date('h');
        $tada->toplist_no = "0".date('Y').rand(10,10000).date('s');
        $tada->bill_date = $request->bill_date;
        $tada->dept_date = $request->dept_date;
        $tada->amount_requested = $request->amount_requested;
        $tada->amount_allowed = $request->amount_allowed;
        $tada->amount_disallowed = $request->amount_disallowed;
        $tada->status = $request->status;
        $tada->created_at = now();
        $tada->save();

        session()->flash('success', 'Data Stored successfully.');
        return redirect()->route('tada-advance.index')->with('success', 'Data Stored successfully.');
    }


    public function edit(string $id)
    {
        $data = TadaAdvance::findOrFail($id);
        $member = Member::where('member_status', '1')->get();
        $project = Project::where('status', '1')->get();
        $edit = true;

        return response()->json(['view' => view('frontend.member-info.tada-advance.form', compact('member','project','data','edit'))->render()]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'member_id' => 'required',
            'project_id' => 'required',
            'bill_date' => 'required',
            'amount_requested' => 'required',
        ]);

        $tada = TadaAdvance::findOrFail($id);
        $tada->member_id = $request->member_id;
        $tada->project_id = $request->project_id;
        $tada->bill_date = $request->bill_date;
        $tada->dept_date = $request->dept_date;
        $tada->amount_requested = $request->amount_requested;
        $tada->amount_allowed = $request->amount_allowed;
        $tada->amount_disallowed = $request->amount_disallowed;
        $tada->status = $request->status;
        $tada->updated_at = now();
        $tada->update();

        session()->flash('success', 'Data updated successfully.');
        return redirect()->route('tada-advance.index')->with('success', 'Data updated successfully.');
    }


    public function delete(string $id)
    {
        $data = TadaAdvance::findOrFail($id);
        $data->delete();

        session()->flash('success', 'Data deleted successfully.');
        return redirect()->route('tada-advance.index')->with('success', 'Data deleted successfully.');
    }

    public function delete_priority(string $id,string $tada_adv_id)
    {
        $data = TadaPriority::findOrFail($id);
        $data->delete();

        session()->flash('success', 'Data deleted successfully.');
        return redirect('/member-info/tada-advance/tada-priority-table/'.$tada_adv_id)->with('success', 'Data deleted successfully.');
    }

}
