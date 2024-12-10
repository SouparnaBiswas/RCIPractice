<?php

namespace App\Http\Controllers\Frontend\MemberInfo;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\MemberCredit;
use App\Models\Pension;
use App\Models\PensionRate;
use App\Models\MemberLeave;
use App\Models\MemberCoreInfo;
use Illuminate\Http\Request;

class PensionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Member::where('category', 'NPS')->get();
        $pensions = Pension::paginate(10);
        return view('frontend.member-info.pension.list', compact('members', 'pensions'));
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
            'npsc_sub_amt' => 'required',
            'npsg_sub_amt' => 'required',
            'year' => 'required',
            'month' => 'required',
        ]);

        $pension = new Pension();
        $pension->user_id = $request->member_id; 
        $pension->npsc_sub_amt = $request->npsc_sub_amt;
        $pension->npsg_sub_amt = $request->npsg_sub_amt;
        $pension->npsc_eol_credit_amt = $request->npsc_eol_credit_amt;
        $pension->npsg_eol_credit_amt = $request->npsg_eol_credit_amt;
        $pension->npsc_eol_deduction_amt = $request->npsc_eol_deduction_amt;
        $pension->npsg_eol_deduction_amt = $request->npsg_eol_deduction_amt;
        $pension->npsc_hpl_amt = $request->npsc_hpl_amt;
        $pension->npsg_hpl_amt = $request->npsg_hpl_amt;
        $pension->year = $request->year;
        $pension->month = $request->month;
        $pension->save();

        session()->flash('success', 'Pension added successfully');
        return response()->json(['success' => 'Pension added successfully']);
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
        $member_pension = Pension::findOrFail($id);
        $members = Member::where('category', 'NPS')->get();
        $edit = true;

        return response()->json(['view' => view('frontend.member-info.pension.form', compact('member_pension', 'edit', 'members'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'member_id' => 'required',
            'npsc_sub_amt' => 'required',
            'npsg_sub_amt' => 'required',
            'year' => 'required',
            'month' => 'required',
        ]);

        $pension = Pension::findOrFail($id);
        $pension->user_id = $request->member_id; 
        $pension->npsc_sub_amt = $request->npsc_sub_amt;
        $pension->npsg_sub_amt = $request->npsg_sub_amt;
        $pension->npsc_eol_credit_amt = $request->npsc_eol_credit_amt;
        $pension->npsg_eol_credit_amt = $request->npsg_eol_credit_amt;
        $pension->npsc_eol_deduction_amt = $request->npsc_eol_deduction_amt;
        $pension->npsg_eol_deduction_amt = $request->npsg_eol_deduction_amt;
        $pension->npsc_hpl_amt = $request->npsc_hpl_amt;
        $pension->npsg_hpl_amt = $request->npsg_hpl_amt;
        $pension->year = $request->year;
        $pension->month = $request->month;
        $pension->update();

        session()->flash('success', 'Pension updated successfully');
        return response()->json(['success' => 'Pension updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getMemberSalaryDetail(Request $request)
    {
        $member_credit = MemberCredit::where('member_id', $request->member_id)->first();
        $pensionRates = PensionRate::where('year', date('Y'))->first();
        $member_leaves = MemberLeave::where('member_id', $request->member_id)->with('leaveType')->get();

        $data = [];

        // Check if member has EOL or HPL
        $hasEOL = false;
        $hasHPL = false;
        $result = [];
        $total_deduction = 0;
        
        if($member_credit)
        {
            foreach ($member_leaves as $leave) {
                $result[$leave->leave_type_id]['leave_name'] = $leave->leaveType->leave_type_abbr;
    
                if ($result[$leave->leave_type_id]['leave_name'] === 'EOL') {
                    $hasEOL = true;
                }
                if ($result[$leave->leave_type_id]['leave_name'] === 'HPL') {
                    $hasHPL = true;
                }
    
                if(($hasEOL) || ($hasHPL)) {
                    // check if member has nps
                    $coreInfo = MemberCoreInfo::where('member_id', $request->member_id)->first();
                    $nps = $coreInfo->pran_no ?? null;
    
                    $no_of_days = $leave->no_of_days;
                    $startDate = new \DateTime($leave->start_date);
                    $endDate = new \DateTime($leave->end_date);
    
                    // extract the month and year from the start date and end date
                    $startMonth = $startDate->format('m');
                    $startYear = $startDate->format('Y');
                    $endMonth = $endDate->format('m');
                    $endYear = $endDate->format('Y');
    
                    // check if the start date and end date are in the same month and year
                    if ($startMonth === $endMonth && $startYear === $endYear) {
                        $result[$leave->leave_type_id]['no_of_days'] = $leave->no_of_days;
    
                        // calculate the number of days in the month
                        $result[$leave->leave_type_id]['daysInMonth'] = cal_days_in_month(CAL_GREGORIAN, $startMonth, $startYear);
    
                        //calculate EOL/HPL deduction
                        $basic = $member_credit->pay;
                        $da = $member_credit->da;
    
                        $result[$leave->leave_type_id]['eolHplDeduction'] = number_format((float)((($basic + $da) * $result[$leave->leave_type_id]['no_of_days']) / $result[$leave->leave_type_id]['daysInMonth']), 2);
    
                        if($nps != null) {
                            // calculate NPS deduction
                            $eolHplAmount = (str_replace(',', '', $result[$leave->leave_type_id]['eolHplDeduction']));
                            $npsDeductionown = (number_format($eolHplAmount, 2, '.', ',') * (number_format((float)$pensionRates->npsc_debit_rate)) / 100);
                            $npsDeductionGovt = (number_format($eolHplAmount, 2, '.', ',')* number_format($pensionRates->npsg_debit_rate)) / 100;
                            $npsCreditOwn = (number_format($eolHplAmount, 2, '.', ',') * number_format($pensionRates->npsc_credit_rate)) / 100;
                            $npsCreditGovt = (number_format($eolHplAmount, 2, '.', ',') * number_format($pensionRates->npsg_credit_rate)) / 100;
                            $result[$leave->leave_type_id]['npsDeductionown'] = $npsDeductionown;
                            $result[$leave->leave_type_id]['npsDeductionGovt'] = $npsDeductionGovt;
                            $result[$leave->leave_type_id]['npsCreditOwn'] = $npsCreditOwn;
                            $result[$leave->leave_type_id]['npsCreditGovt'] = $npsCreditGovt;
                        }
                    } else {
                        // calculate the number of days in each month
                        $result[$leave->leave_type_id]['startDay'] = $startDate->format('d');
                        $result[$leave->leave_type_id]['endDay'] = $endDate->format('d');
                        $result[$leave->leave_type_id]['daysInStartMonth'] = cal_days_in_month(CAL_GREGORIAN, $startMonth, $startYear);
                        $result[$leave->leave_type_id]['daysInEndMonth'] = cal_days_in_month(CAL_GREGORIAN, $endMonth, $endYear);
    
                        // calculate leave days per month according to the start and end date and no of days if 30 or 31
                        
                        $result[$leave->leave_type_id]['leaveDaysInStartMonth'] = $result[$leave->leave_type_id]['daysInStartMonth'] - $result[$leave->leave_type_id]['startDay'] + 1;
                        $result[$leave->leave_type_id]['leaveDaysInEndMonth'] = $result[$leave->leave_type_id]['endDay'];
    
                        // calculation for EOL/HPL deduction
                        $basic = $member_credit->pay;
                        $da = $member_credit->da;
    
                        $startmonthDeduction = (($basic + $da) * $result[$leave->leave_type_id]['leaveDaysInStartMonth']) / $result[$leave->leave_type_id]['daysInStartMonth'];
                        $endmonthDeduction = (($basic + $da) * $result[$leave->leave_type_id]['leaveDaysInEndMonth']) / $result[$leave->leave_type_id]['daysInEndMonth'];
    
                        $result[$leave->leave_type_id]['eolHplDeduction'] = number_format((float)($startmonthDeduction + $endmonthDeduction), 2);

                        if($nps != null) {
                            // calculate NPS deduction
                            $npsDeductionown = (number_format((float)($result[$leave->leave_type_id]['eolHplDeduction']) * $pensionRates->npsc_debit_rate) / 100);
                            $npsDeductionGovt = (number_format((float)($result[$leave->leave_type_id]['eolHplDeduction']) * $pensionRates->npsg_debit_rate)) / 100;
                            $npsCreditOwn = (number_format((float)($result[$leave->leave_type_id]['eolHplDeduction']) * $pensionRates->npsc_credit_rate)) / 100;
                            $npsCreditGovt = (number_format((float)($result[$leave->leave_type_id]['eolHplDeduction']) * $pensionRates->npsg_credit_rate)) / 100;
                            $result[$leave->leave_type_id]['npsDeductionown'] = $npsDeductionown;
                            $result[$leave->leave_type_id]['npsDeductionGovt'] = $npsDeductionGovt;
                            $result[$leave->leave_type_id]['npsCreditOwn'] = $npsCreditOwn;
                            $result[$leave->leave_type_id]['npsCreditGovt'] = $npsCreditGovt;
                        }
                        
                        
                    }
                    $total_deduction += floatval(str_replace(',', '', $result[$leave->leave_type_id]['eolHplDeduction']));
                }
            }
        }
        dd($result);
        
        return response()->json($result);
    }
}
