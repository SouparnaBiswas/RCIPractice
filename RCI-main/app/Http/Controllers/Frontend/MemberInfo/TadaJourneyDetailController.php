<?php

namespace App\Http\Controllers\Frontend\MemberInfo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use PDF;
use App\Models\Member;
use App\Models\Project;
use App\Models\TadaAdvance;
use App\Models\TadaPriority;
use App\Models\TadaJourneyDetail;
use App\Models\MemberCoreInfo;
use App\Models\MemberPersonalInfo;


class TadaJourneyDetailController extends Controller
{
    public function index(Request $request){
        $id = $request->id;
        $tadaAdv = TadaAdvance::findOrFail($id);
        $data = TadaJourneyDetail::where('tada_adv_id', $id)->get();

        $member = Member::where('id', $tadaAdv->member_id)->get()->first() ?? '';
        return view('frontend.member-info.tada-advance.list-journey',compact('tadaAdv','data','member'));
    }


    public function report(Request $request)
    {

        $id=$request->id;
        $tadaAdv = TadaAdvance::findOrFail($id);
        $data = TadaJourneyDetail::where('tada_adv_id', $id)->get();

        $member = Member::with('desigs')->where('id', $tadaAdv->member_id)->get()->first() ?? '';

        $pdf = PDF::loadView('frontend.member-info.tada-advance.report-journey',compact('data','tadaAdv'));
        return $pdf->download('tadaJourney-'.$member->name.'-'. time() . '.pdf');

    }


    public function store(Request $request)
    {
        $tada_adv_id = $request->tada_adv_id;

        $request->validate([
            'tada_adv_id' => 'required',
            'from_location' => 'required',
            'to_location' => 'required'
        ]);

        $tada = new TadaJourneyDetail();
        $tada->tada_adv_id = $request->tada_adv_id;
        $tada->from_location = $request->from_location;
        $tada->to_location = $request->to_location;
        $tada->dep_datetime = $request->dep_datetime;
        $tada->distance = $request->distance;
        $tada->con_mode = $request->con_mode;
        $tada->arrival_datetime = $request->arrival_datetime;
        $tada->amount = $request->amount;
        $tada->remark = $request->remark;
        $tada->created_at = now();
        $tada->save();

        session()->flash('success', 'Data Stored successfully.');
        return redirect('/member-info/tada-advance/tada-journey-table/'.$tada_adv_id)->with('success', 'Data Stored successfully.');
    }


    public function delete(string $id,string $tada_adv_id)
    {
        $data = TadaJourneyDetail::findOrFail($id);
        $data->delete();

        session()->flash('success', 'Data deleted successfully.');
        return redirect('/member-info/tada-advance/tada-journey-table/'.$tada_adv_id)->with('success', 'Data deleted successfully.');
    }
}
