<?php

namespace App\Http\Controllers\Frontend\MemberInfo;

use App\Http\Controllers\Controller;
use App\Models\Loan;
use Illuminate\Http\Request;

use App\Models\Member;
use App\Models\MemberLoan;
use App\Models\MemberLoanInfo;
use App\Models\PenalInterest;

class PenalInterestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $members = Member::all();
        $memberloans = MemberLoanInfo::with('member')->get();
        $penalInterests = PenalInterest::paginate(10);

        return view('frontend.member-info.penalInterest.list', compact('memberloans', 'penalInterests'));
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
            'loan_type' => 'required',
            'penal_interest' => 'required',
            'days' => 'required',
            'principal_amount' => 'required',
            'year' => 'required',
            'month' => 'required',
        ]);


        $penalInterest = new PenalInterest();
        $penalInterest->member_id = $request->member_id;
        $penalInterest->loan_id = $request->loan_type;
        $penalInterest->penal_interest = $request->penal_interest;
        $penalInterest->no_of_days = $request->days;
        $penalInterest->principal_amount = $request->principal_amount;
        $penalInterest->year = $request->year;
        $penalInterest->month = $request->month;
        $penalInterest->status = $request->status;
        $penalInterest->save();

        session()->flash('success', 'Penal Interest Added Successfully');
        return response()->json(['success' => 'Penal Interest Added Successfully']);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getMemberLoanInfo(Request $request)
    {
        // dd($request->all());
        $memberloans = MemberLoanInfo::where('member_id', $request->member_id)->with('loan')->get();
        return response()->json($memberloans);
    }

    public function getLoanInfo(Request $request)
    {
        // dd($request->all());
        $loan = MemberLoanInfo::where('loan_id', $request->loan_id)->with('loan')->first();
        return response()->json($loan);
    }
}
