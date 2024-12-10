<?php

namespace App\Http\Controllers\Frontend\MemberInfo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\MemberGpf;
use App\Models\MemberCredit;
use App\Helpers\Helper;


class MemberGpfController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Member::orderBy('id', 'desc')->get();
        $member_gpfs = MemberGpf::orderBy('id', 'desc')->paginate(12);
        $financialYears = Helper::getFinancialYears();
        return view('frontend.member-info.gpf.list', compact('members','member_gpfs','financialYears'));
    }

    public function memberGpfCheckSubscription(Request $request)
    {
        
        $subscription_amount = $request->monthly_subscription;
        $member_basic = MemberCredit::where('member_id',$request->member)->orderBy('id', 'desc')->first();

        $errors = [];
        if ($member_basic->pay * 0.06 > $subscription_amount) {
            $errors[] = 'The Monthly Subscription must be at least 6% of the Basic Pay.';
        }
        if ($subscription_amount > $member_basic->pay) {
            $errors[] = 'The Monthly Subscription should not exceed the Basic Pay.';
        }
        if ($subscription_amount * 12 > 500000) {
            $errors[] = 'The total annual subscription (Monthly Subscription x 12) should not exceed 500,000.';
        }

        if (!empty($errors)) {
            return response()->json([
                'errors' => $errors,
                'status' => 'error'
            ]);
        } else {
            return response()->json(['success' => 'Monthly Subscription is valid', 'status' => 'success']);
        }

    }

    public function memberGpfFilter(Request $request)
    {
        $members = Member::orderBy('id', 'desc')->get();
        $member_gpfs = MemberGpf::where('member_id', $request->member_id)->orderBy('id', 'desc')->paginate(12);
        return view('frontend.member-info.gpf.list', compact('members','member_gpfs'));
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
            'finantial_year' => 'required',
            'monthly_subscription' => 'required',
            'month' =>'required',
            'openning_balance' => 'required',
            'closing_balance' => 'required',
            'year' => 'required',
        ]);

        $member_gpf = new MemberGpf();
        $member_gpf->member_id = $request->member_id;
        $member_gpf->finantial_year = $request->finantial_year;
        $member_gpf->monthly_subscription = $request->monthly_subscription;
        $member_gpf->refund = $request->refund;
        $member_gpf->month = $request->month;
        $member_gpf->closing_balance = $request->closing_balance;
        $member_gpf->openning_balance = $request->openning_balance;
        $member_gpf->year = $request->year;
        $member_gpf->save();

        session()->flash('message', 'Member Gpf added successfully');
        return response()->json(['success' => 'Member Gpf added successfully']);

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
        $member_gpf = MemberGpf::findOrFail($id);
        $members = Member::orderBy('id', 'desc')->get();
        $financialYears = Helper::getFinancialYears();
        $edit = true;

        return response()->json(['view' => view('frontend.member-info.gpf.form', compact('member_gpf', 'edit','members','financialYears'))->render()]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'member_id' => 'required',
            'finantial_year' => 'required',
            'monthly_subscription' => 'required',
            'month' =>'required',
            'openning_balance' => 'required',
            'closing_balance' => 'required',
            'year' => 'required',
        ]);

        $update_member_gpf = MemberGpf::findOrFail($id);
        $update_member_gpf->member_id = $request->member_id;
        $update_member_gpf->finantial_year = $request->finantial_year;
        $update_member_gpf->monthly_subscription = $request->monthly_subscription;
        $update_member_gpf->refund = $request->refund;
        $update_member_gpf->month = $request->month;
        $update_member_gpf->closing_balance = $request->closing_balance;
        $update_member_gpf->openning_balance = $request->openning_balance;
        $update_member_gpf->year = $request->year;
        $update_member_gpf->update();

        session()->flash('message', 'Member Gpf updated successfully');
        return response()->json(['success' => 'Member Gpf updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
