<?php

namespace App\Http\Controllers\Frontend;

use App\Constants\Quaterly;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\MemberCoreInfo;
use App\Models\MemberCredit;
use App\Models\MemberDebit;
use App\Models\MemberRecovery;
use App\Models\MemberPolicyInfo;
use App\Models\MemberLoan;
use App\Models\MemberIncomeTax;
use App\Models\MemberBagPurse;
use App\Models\PayCommission;
use App\Models\Payband;
use App\Models\PmLevel;
use App\Models\GradePay;
use App\Models\Group;
use App\Models\LandlineAllowance;
use App\Models\MemberPersonalInfo;
use App\Models\MemberChildAllowance;
use App\Models\MemberChildrenDetail;
use Carbon\Carbon;
use App\Models\User;

use App\Models\SiteLogo;
use App\Models\DearnessAllowancePercentage;
use Illuminate\Pagination\Paginator;
use PDF;
use App\Models\NewspaperAllowance;
use App\Helpers\Helper;
use App\Models\CreditVoucher;
use App\Models\CreditVoucherDetail;
use App\Models\IncomeTax;
use App\Models\MemberNewspaperAllowance;
use App\Models\DebitVoucher;
use App\Models\Category;
use App\Models\MemberFamily;
use App\Models\DebitVoucherDetail;
use App\Models\MemberGpf;
use App\Models\LeaveType;
use App\Models\MemberAllotedLeave;
use App\Models\MemberLeave;
use App\Models\MemberRetirementInfo;
use App\Models\PayMatrixRow;
use App\Models\PayMatrixBasic;
use App\Models\PmIndex;
use App\Models\Hra;
use App\Models\Pension;

class ReportController extends Controller
{
    //

    public function payslip()
    {
        $members = Member::where('e_status', '!=', 'retired')->where('e_status', '!=', 'transferred')->orderBy('id', 'desc')->get();
        return view('frontend.reports.payslip', compact('members'));
    }

    public function payslipGenerate(Request $request)
    {
        $request->validate([
            'month' => 'required',
            'year' => 'required',
            'report_type' => 'required',
        ]);

        if($request->report_type == 'group')
        {
            
        $month = $request->month;
        $year = $request->year;

        $all_members = Member::with([
            'memberCredit' => function ($query) use ($month, $year) {
                $query->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year);
            },
            'memberOneDebit' => function ($query) use ($month, $year) {
                $query->whereMonth('created_at', $month)
                    ->whereYear('created_at', $year);
            },
            'memberCoreInfo' => 
            function ($query) {
                $query->latest();
            },
            'memberOneRecovery' => 
            // no month year ch3ecking
            function ($query) {
                $query->latest();
            },
        ])
        
        ->where('pay_stop','No')   
        ->orderBy('id', 'desc')
        ->get();

        $dateObj = \DateTime::createFromFormat('!m', $month);
        $monthName = $dateObj->format('F');

        $member_data_collection = [];

        foreach ($all_members as $member) {
            if ($member->memberCredit || $member->memberOneDebit || $member->memberCoreInfo || $member->memberOneRecovery) {
                $member_quarter_charge = ($member->memberOneDebit->quarter_charges ?? 0) +
                    ($member->memberOneDebit->elec ?? 0) +
                    ($member->memberOneDebit->water ?? 0) +
                    ($member->memberOneDebit->furn ?? 0) +
                    ($member->memberOneDebit->misc2 ?? 0);

                $member_data_collection[] = [
                    'member_data' => $member,
                    'member_credit_data' => $member->memberCredit,
                    'member_debit_data' => $member->memberOneDebit,
                    'member_core_info' => $member->memberCoreInfo,
                    'member_recoveries_data' => $member->memberOneRecovery,
                    'member_quarter_charge' => $member_quarter_charge,
                ];
            }
        }

        

        $pdf = PDF::loadView('frontend.reports.group-payslip-generate', compact('member_data_collection', 'monthName', 'year'));
        return $pdf->download('payslip-' . $monthName . '-' . $year . '.pdf');



        }else{ 

            if( $request->member_id == null){
                return redirect()->back()->with('error', 'Please select a member');
            }


            $member_data = Member::where('id', $request->member_id)->first() ?? '';
            $member_credit_data = MemberCredit::where('member_id', $request->member_id)->first() ?? '';
            $member_debit_data = MemberDebit::where('member_id', $request->member_id)->first() ?? '';
            $member_core_info = MemberCoreInfo::where('member_id', $request->member_id)->first() ?? '';
            $member_recoveries_data = MemberRecovery::where('member_id', $request->member_id)->first() ?? '';
            $month = $request->month;
            $dateObj = \DateTime::createFromFormat('!m', $month);
            $monthName = $dateObj->format('F');
            $year = $request->year;
            $member_quarter_charge = ($member_debit_data->quarter_charges ?? 0) + ($member_debit_data->elec ?? 0) + ($member_debit_data->water ?? 0) + ($member_debit_data->furn ?? 0) + ($member_debit_data->misc2 ?? 0);

            $pdf = PDF::loadView('frontend.reports.payslip-generate', compact('member_data', 'member_credit_data', 'member_debit_data', 'member_core_info', 'monthName', 'year', 'member_quarter_charge'));
            return $pdf->download('payslip-' . $member_data->name . '-' . $monthName . '-' . $year . '.pdf');
        }
    }

    // public function crv()
    // {
    //     $groups = Group::where('status', 1)->get()->chunk(2); // Fetch and chunk groups
    public function paybill()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('frontend.reports.paybill', compact('categories'));
    }

    public function paybillGenerate(Request $request)
    {
        $request->validate([
            'e_status' => 'required',
            'category' => 'required',
            'month' => 'required',
            'year' => 'required',
        ]);

            $pay_bill_no = $request->year . '-' . 'RCI-CHESS' . $request->month . $request->year . rand(1000, 9999);
            $all_members_info = [];
            $member_datas = Member::where('e_status', $request->e_status)
                ->where('category', $request->category)
                ->where('member_status', 1)
                ->where('pay_stop', 'No')
                ->orderBy('id', 'desc')
                ->with('desigs')
                ->get();


                if($member_datas->count() == 0){
                    return redirect()->back()->with('error', 'No data found for the selected criteria');
                }

            foreach ($member_datas as $member_data) {
                $member_details = [
                    'member_credit' => MemberCredit::where('member_id', $member_data->id)
                        ->whereYear('created_at', $request->year)
                        ->whereMonth('created_at', $request->month)
                        ->first(),
                    'member_debit' => MemberDebit::where('member_id', $member_data->id)
                        ->whereYear('created_at', $request->year)
                        ->whereMonth('created_at', $request->month)
                        ->first(),
                    'member_core_info' => MemberCoreInfo::where('member_id', $member_data->id)
                        ->whereYear('created_at', $request->year)
                        ->whereMonth('created_at', $request->month)
                        ->with('banks')
                        ->first(),
                    'member_recovery' => MemberRecovery::where('member_id', $member_data->id)
                        ->whereYear('created_at', $request->year)
                        ->whereMonth('created_at', $request->month)
                        ->first(),
                ];

                $combined_member_info = [
                    'member_data' => $member_data,
                    'details' => $member_details,
                ];

                $all_members_info[] = $combined_member_info;
            }

            // Convert the array to a Laravel Collection to use chunk method
            $groupedData = collect($all_members_info)->chunk(3); 

        // dd($all_members_info);
        $month =  date('F', mktime(0, 0, 0, $request->month, 10));
        $year = $request->year;
        $logo = SiteLogo::first() ?? null;
        $da_percent = DearnessAllowancePercentage::where('year', $year)->first();
        // dd($member_datas);
        $pdf = PDF::loadView('frontend.reports.paybill-generate', compact('pay_bill_no', 'month', 'year', 'logo', 'da_percent', 'all_members_info', 'groupedData'));

        return $pdf->download('paybill-' . $month . '-' . $year . '.pdf');
    }



    // public function crv()
    // {
    //     $groups = Group::where('status', 1)->get()->chunk(2); // Fetch and chunk groups

    //     $pdf = PDF::loadView('frontend.reports.test-crv', compact('groups'));
    //     return $pdf->download('document.pdf');


    //     // return view('frontend.reports.crv');
    // }

    public function plWithdrawl()
    {
        return view('frontend.reports.pl-withdrawl');
    }

    public function annualIncomeTaxReport()
    {
        $members = Member::where('e_status', '!=', 'retired')->where('e_status', '!=', 'transferred')->orderBy('id', 'desc')->get();
        $financialYears = Helper::getFinancialYears();
        return view('frontend.reports.income-tax-report', compact('members', 'financialYears'));
    }

    public function annualIncomeTaxReportGenerate(Request $request)
    {
        $request->validate([
            'member_id' => 'required',
            'report_year' => 'required',
        ]);

        $memberId = $request->member_id;
        // $startOfYear = Carbon::now()->startOfYear();
        // $endOfYear = Carbon::now()->endOfYear();
        [$startYear, $endYear] = explode('-', $request->report_year);
        $startOfYear = Carbon::createFromDate($startYear, 4, 1)->startOfDay();
        $endOfYear = Carbon::createFromDate("$endYear", 3, 31)->endOfDay();

        $yearMonths = [];
        $current = $startOfYear->copy();

        while ($current->lessThanOrEqualTo($endOfYear)) {
            $yearMonths[] = $current->format('M-y');
            $current->addMonth();
        }

        $member_data = Member::where('id', $memberId)->first();
        $member_credit_data = MemberCredit::where('member_id', $memberId)->whereBetween('created_at', [$startOfYear, $endOfYear])->get();
        $member_debit_data = MemberDebit::where('member_id', $memberId)->whereBetween('created_at', [$startOfYear, $endOfYear])->get();
        $member_core_info = MemberCoreInfo::where('member_id', $memberId)->first();
        $member_recoveries_data = MemberRecovery::where('member_id', $memberId)->whereBetween('created_at', [$startOfYear, $endOfYear])->get();
        $member_policy_info = MemberPolicyInfo::where('member_id', $memberId)->sum('amount');
        $member_loan_info = MemberLoan::where('member_id', $memberId)->whereBetween('created_at', [$startOfYear, $endOfYear])->with('loan')->get();
        $member_it_exemption_info = MemberIncomeTax::where('member_id', $memberId)->whereBetween('created_at', [$startOfYear, $endOfYear])->get();
        $incometaxRate = IncomeTax::where('financial_year', $request->report_year)->get();
        $year = $request->report_year;
        $months = $yearMonths;

        // create an array to store the result month wise
        $result = [];

        $total_credit = [
            'basic_pay' => 0,
            'g_pay' => 0,
            's_pay' => 0,
            'f_pay' => 0,
            'add_inc2' => 0,
            'var_incr' => 0,
            'da' => 0,
            'hra' => 0,
            'tpt' => 0,
            'wash_alw' => 0,
            'misc2' => 0,
            'ot' => 0,
            'total' => 0
        ];

        $total_debit = [
            'gpf' => 0,
            'cgegis' => 0,
            'cghs' => 0,
            'ptax' => 0,
            'hba' => 0,
            'pli' => 0,
            'eol' => 0,
            'hdfc' => 0,
            'misc1' => 0,
            'i_tax' => 0
        ];

        $total_policy = 0;
        $standard_deduction = 50000;
        $professional_update_allowance = 0;
        $ceaus = 0;
        $fixed_deposit = 0;
        $nsc = 0;
        $letOutProperty = 0;
        $pensionIncome = 0;
        $savingsInterest = 0;
        $ppf = 0;
        $otherBonds = 0;
        $nsc_ctd = 0;
        $hbaRefund = 0;
        $tutionFee = 0;
        $jeevanSuraksha = 0;
        $ulip = 0;
        $otherSavings = 0;
        $relief87A = 0;
        $relief89 = 0;

        foreach ($yearMonths as $month) {
            $result[$month]['credit'] = [
                'basic_pay' => 0,
                'g_pay' => 0,
                's_pay' => 0,
                'f_pay' => 0,
                'add_inc2' => 0,
                'var_incr' => 0,
                'da' => 0,
                'hra' => 0,
                'tpt' => 0,
                'wash_alw' => 0,
                'misc2' => 0,
                'ot' => 0,
                'total' => 0
            ];
            $result[$month]['debit'] = [
                'gpf' => 0,
                'cgegis' => 0,
                'cghs' => 0,
                'ptax' => 0,
                'hba' => 0,
                'pli' => 0,
                'eol' => 0,
                'hdfc' => 0,
                'misc1' => 0,
                'i_tax' => 0
            ];
            $result[$month]['policy'] = [
                'amount' => 0
            ];

            // Set the policy amount if available for the current month
            $result[$month]['policy']['amount'] = $member_policy_info[$month] ?? 0;
            $total_policy += $result[$month]['policy']['amount'];

            foreach ($member_credit_data as $credit) {
                if (Carbon::parse($credit->created_at)->format('M-y') == $month) {
                    $result[$month]['credit']['basic_pay'] += $credit->pay ?? 0;
                    $result[$month]['credit']['g_pay'] += $credit->g_pay ?? 0;
                    $result[$month]['credit']['s_pay'] += $credit->s_pay ?? 0;
                    $result[$month]['credit']['f_pay'] += $credit->f_pay ?? 0;
                    $result[$month]['credit']['add_inc2'] += $credit->add_inc2 ?? 0;
                    $result[$month]['credit']['var_incr'] += $credit->var_incr ?? 0;
                    $result[$month]['credit']['da'] += $credit->da ?? 0;
                    $result[$month]['credit']['hra'] += $credit->hra ?? 0;
                    $result[$month]['credit']['tpt'] += $credit->tpt ?? 0;
                    $result[$month]['credit']['wash_alw'] += $credit->wash_alw ?? 0;
                    $result[$month]['credit']['misc2'] += $credit->misc2 ?? 0;
                    $result[$month]['credit']['ot'] += $credit->ot ?? 0;
                }
            }

            // Calculate the total credit amount for the current month
            $result[$month]['credit']['total'] = array_sum($result[$month]['credit']);

            // Accumulate total credits for each field
            foreach ($result[$month]['credit'] as $key => $value) {
                $total_credit[$key] += $value;
            }

            foreach ($member_debit_data as $debit) {
                if (Carbon::parse($debit->created_at)->format('M-y') == $month) {
                    $result[$month]['debit']['gpf'] += $debit->gpa_sub ?? 0;
                    $result[$month]['debit']['cgegis'] += $debit->cgegis ?? 0;
                    $result[$month]['debit']['cghs'] += $debit->cghs ?? 0;
                    $result[$month]['debit']['ptax'] += $debit->ptax ?? 0;
                    $result[$month]['debit']['hba'] += $debit->hba ?? 0;
                    $result[$month]['debit']['pli'] += $debit->pli ?? 0;
                    $result[$month]['debit']['eol'] += $debit->eol ?? 0;
                    $result[$month]['debit']['hdfc'] += $debit->hdfc ?? 0;
                    $result[$month]['debit']['misc1'] += $debit->misc1 ?? 0;
                    $result[$month]['debit']['i_tax'] += $debit->i_tax ?? 0;
                }
            }

            // Accumulate total debits for each field
            foreach ($result[$month]['debit'] as $key => $value) {
                $total_debit[$key] += $value;
            }
        }
        $hbaInterest = 0;
        if ($member_loan_info) {

            $member_loan_info->filter(function ($memberLoan) {
                return $memberLoan->loan->loan_name === 'hba';
            })->sum(function ($memberLoan) {
                return $memberLoan->interest_amount;
            });
        }

        // create an array to store exemption data for each exemption section
        $exemption_result = [];
        foreach ($member_it_exemption_info as $exemption) {
            $exemption_result[$exemption->section]['section'] = $exemption->section;
            $exemption_result[$exemption->section]['member_deduction'] = $exemption->member_deduction;
            $exemption_result[$exemption->section]['max_deduction'] = $exemption->max_deduction;
        }

        // total for member exemption
        $total_exemption = 0;
        foreach ($exemption_result as $exemption) {
            if (preg_match('/\b80\s*d\b/i', $exemption['section']) || preg_match('/\b80\s*d{2}\b/i', $exemption['section']) || preg_match('/\b80\s*ddb\b/i', $exemption['section']) || preg_match('/\b80\s*u\b/i', $exemption['section']) || preg_match('/\b80\s*e\b/i', $exemption['section']) || preg_match('/\b80\s*g\b/i', $exemption['section']) || preg_match('/\b80\s*tta\b/i', $exemption['section']) || preg_match('/\b80\s*cc\s*g\b/i', $exemption['section']) || preg_match('/\b80\s*ee\b/i', $exemption['section'])) {
                $total_exemption += $exemption['member_deduction'];
            }
        }


        $pdf = PDF::loadView('frontend.reports.annual-income-tax-report-generate', compact('member_data', 'member_credit_data', 'member_debit_data', 'member_core_info', 'year', 'months', 'result', 'total_credit', 'total_debit', 'total_policy', 'standard_deduction', 'professional_update_allowance', 'member_loan_info', 'hbaInterest', 'member_it_exemption_info', 'exemption_result', 'total_exemption', 'ceaus', 'fixed_deposit', 'nsc', 'letOutProperty', 'pensionIncome', 'savingsInterest', 'ppf', 'otherBonds', 'nsc_ctd', 'hbaRefund', 'tutionFee', 'jeevanSuraksha', 'ulip', 'otherSavings', 'incometaxRate', 'relief87A', 'relief89'));
        return $pdf->download('income-tax-' . $member_data->name . '-' . $request->report_year . '.pdf');
    }

    public function salaryCertificate()
    {
        // $members = Member::where('e_status', '!=', 'retired')->where('e_status', '!=', 'transferred')->orderBy('id', 'desc')->get();

        $startYear = 1958;
        $endYear = date('Y');
        $accountants = User::role('ACCOUNTANT')->get();
        $years = range($startYear, $endYear);

        return view('frontend.reports.salary-certificate', compact('years','accountants'));
    }

    public function salaryCertificateGenerate(Request $request)
    {
        $request->validate([
            'member_id' => 'required',
            'year' => 'required',
            'month' => 'required',
            'accountant' => 'required',
        ]);

        $accountant = $request->accountant;
        $member_data = Member::where('id', $request->member_id)->with('desigs')->first();
        $member_credit_data = MemberCredit::where('member_id', $request->member_id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->first();
        $member_debit_data = MemberDebit::where('member_id', $request->member_id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->first();
        $year = $request->year;
        $requestMonth = $request->month;
        $dateStr = sprintf('2024-%02d-01', $requestMonth);
        $month = date('M', strtotime($dateStr));

        $pdf = PDF::loadView('frontend.reports.salary-certificate-generate', compact('member_credit_data', 'member_debit_data', 'member_data', 'year', 'month','accountant'));
        return $pdf->download('salary-certificate-' . $member_data->name . '.pdf');
    }

    public function bonusSchedule()
    {
        $financialYears = Helper::getFinancialYears();
        return view('frontend.reports.bonus-schedule', compact('financialYears'));
    }

    public function bonusScheduleGenerate(Request $request)
    {
        $request->validate([
            'report_year' => 'required',
        ]);

        [$startYear, $endYear] = explode('-', $request->report_year);
        $startOfYear = Carbon::createFromDate($startYear, 4, 1)->startOfDay();
        $endOfYear = Carbon::createFromDate("$endYear", 3, 31)->endOfDay();

        $yearMonths = [];
        $current = $startOfYear->copy();

        while ($current->lessThanOrEqualTo($endOfYear)) {
            $yearMonths[] = $current->format('M-y');
            $current->addMonth();
        }
        $category = Category::where('category', 'C')->first() ?? '';
        if($category){
            
            $member_data = Member::where('e_status', $request->e_status)->where('category', $category->id)->where('pay_stop','No')->with('desigs', 'groups')->get() ?? '';
            $member_credit_data = MemberCredit::whereBetween('created_at', [$startOfYear, $endOfYear])->get();
            $member_debit_data = MemberDebit::whereBetween('created_at', [$startOfYear, $endOfYear])->get();
            $year = $request->report_year;
            $months = $yearMonths;
            $unitCode = 'RCI-CHESS-' . rand(1000, 9999);
            // $category = Category::where('id', $request->category)->first();

            // create an array to store the result member wise
            $result = [];
            $total_credit = [
                'dress_alw' => 0,
                'bonus' => 0,
            ];
            $total_debit = [
                'eol' => 0,
            ];

            foreach ($member_data as $member) {
                $result[$member->id] = [
                    'name' => $member->name,
                    'gpf_nps' => $member->gpf_number ?? $member->pran_number ?? 'N/A',
                    'emp_id' => $member->emp_id,
                    'designation' => $member->desigs->designation ?? 'N/A',
                    'doj' => $member->doj_lab,
                    'credit' => [
                        'basic_pay' => 0,
                        'dress_alw' => 0,
                        'bonus' => 0,
                    ],
                    'debit' => [
                        'eol' => 0,
                    ],
                    'total' => 0
                ];
            }

            foreach ($member_credit_data as $credit) {
                $memberId = $credit->member_id;
                if (isset($result[$memberId])) {
                    $result[$memberId]['credit']['basic_pay'] += $credit->pay;
                    $result[$memberId]['credit']['dress_alw'] += $credit->dis_alw;
                    $result[$memberId]['credit']['bonus'] += $credit->incentive;

                    $total_credit['dress_alw'] += $credit->dis_alw;
                    $total_credit['bonus'] += $credit->incentive;
                }
            }

            foreach ($member_debit_data as $debit) {
                $memberId = $debit->member_id;
                if (isset($result[$memberId])) {
                    $result[$memberId]['debit']['eol'] += $debit->eol;

                    $total_debit['eol'] += $debit->eol;
                }
            }

            foreach ($result as $memberId => $data) {
                $creditTotal = array_sum($data['credit']);
                $debitTotal = array_sum($data['debit']);
                $result[$memberId]['total'] = $creditTotal - $debitTotal;
            }
        }else{
            $member_data = [];
            $member_credit_data = [];
            $member_debit_data = [];
            $year = '';
            $months = [];
            $unitCode = '';
            $result = [];
            $total_credit = [];
            $total_debit = [];
            $category = '';
        }

        $pdf = PDF::loadView('frontend.reports.bonus-schedule-generate', compact('member_data', 'member_credit_data', 'member_debit_data', 'year', 'months', 'unitCode', 'result', 'total_credit', 'total_debit', 'category'));
        return $pdf->download('bonus-schedule-' . $request->report_year . '.pdf');
    }

    public function lastPayCertificate()
    {
        $members = Member::orderBy('id', 'desc')->where('e_status', 'retired')->orWhere('e_status', 'transferred')->get();
        return view('frontend.reports.last-pay-certificate', compact('members'));
    }

    public function lastPayCertificateGenerate(Request $request)
    {
        $request->validate([
            'member_id' => 'required',
        ]);

        $member_data = Member::where('id', $request->member_id)->with('desigs', 'payLevels')->first();
        $dojYear = Carbon::parse($member_data->doj_lab)->format('Y');
        $member_credit_data = MemberCredit::where('member_id', $request->member_id)->first();
        $member_debit_data = MemberDebit::where('member_id', $request->member_id)->first();
        $member_recoveries_data = MemberRecovery::where('member_id', $request->member_id)->first();
        $member_core_info = MemberCoreInfo::where('member_id', $request->member_id)->first();
        $drdoPin = $dojYear . 'AD' . str_pad($request->member_id, 4, '0', STR_PAD_LEFT);

        $pdf = PDF::loadView('frontend.reports.last-pay-certificate-generate', compact('member_credit_data', 'member_debit_data', 'member_data', 'drdoPin', 'member_core_info', 'member_recoveries_data'));
        return $pdf->download('last-pay-certificate-' . $member_data->name . '.pdf');
    }

    public function getMemberInfo(Request $request)
    {
        $members = Member::where('e_status', $request->e_status)->where('pay_stop','No')->orderBy('id', 'desc')->get();
        return response()->json(['members' => $members]);
    }

    public function getMemberGpf(Request $request)
    {
        $members = Member::where('e_status', $request->e_status)->where('pay_stop','No')->where('fund_type','GPF')->orderBy('id', 'desc')->get();
        return response()->json(['members' => $members]);
    }

    public function payroll(Request $request)
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('frontend.reports.payroll', compact('categories'));
    }

    public function payrollGenerate(Request $request)
    {

        $request->validate([
            'e_status' => 'required',
            'category' => 'required',
            'year' => 'required',
            'month' => 'required',
        ]);

        $month = $request->month;
        $get_month_name = date('F', mktime(0, 0, 0, $month, 10));
        $year = $request->year;
        $cat = $request->category;
        $category = Category::where('id', $cat)->first()->category;
        $today = Carbon::now()->format('d/m/Y g:i:s A');


        // return $request->all();
        $total = [
            'basic' => 0, 'special' => 0, '2incr' => 0, 'var_incr' => 0, 'da' => 0, 'house_rent' => 0, 'transport' => 0, 'family_alw' => 0, 'hindi' => 0,
            'deptn_alw' => 0, 'disable_alw' => 0, 'wash_alwn' => 0, 'risk_alwn' => 0, 'non_pract_alwn' => 0, 'cr_rent' => 0, 'cr_elec' => 0, 'cr_water' => 0,
            'misc1' => 0, 'misc2' => 0, 'gross' => 0, 'nps_subsc' => 0, 'nps_refunds' => 0, 'rent' => 0, 'elec' => 0, 'water' => 0, 'furn' => 0, 'rent_arr' => 0,
            'elec_arr' => 0, 'water_arr' => 0, 'furn_arr' => 0, 'car_adv' => 0, 'car_adv_intrst' => 0, 'sctr_adv_intrst' => 0, 'cycle_adv' => 0, 'cycle_adv_intrst' => 0,
            'hba_adv' => 0, 'hba_adv_int' => 0, 'pli' => 0, 'cgegis' => 0, 'cghs' => 0, 'it' => 0, 'ecess' => 0, 'tada' => 0, 'ltc' => 0, 'medical' => 0,
            'eol_hpl' => 0, 'pc_adv' => 0, 'festival_adv_rec' => 0,  'professional_tx' => 0, 'hra_rec' => 0, 'tpt_rec' => 0, 'misc1_debit' => 0,
            'misc2_debit' => 0, 'misc3_debit' => 0, 'total_debit' => 0, 'net_pay' => 0
        ];

        $members = Member::where('category', $request->category)->where('e_status', $request->e_status)->where('pay_stop','No')->get();
        foreach ($members as $member) {
            // sum value of basicpay this month of this category member
            $total['basic'] += MemberCredit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('pay') ?? 0;
            $total['special'] += MemberCredit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('s_pay');
            $total['2incr'] += MemberCredit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('add_inc2');
            $total['var_incr'] += MemberCredit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('var_incr');
            $total['da'] += MemberCredit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('da');
            $total['house_rent'] += MemberCredit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('hra');
            $total['transport'] += MemberCredit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('tpt');
            // $total['family_alw'] += MemberCredit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('wash_alw');
            $total['hindi'] += MemberCredit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('hindi');
            $total['deptn_alw'] += MemberCredit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('deptn_alw');
            // $total['disable_alw'] += MemberCredit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('');
            $total['wash_alwn'] += MemberCredit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('wash_alw');
            $total['risk_alwn'] += MemberCredit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('risk_alw');
            $total['non_pract_alwn'] += MemberCredit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('npa');
            $total['cr_rent'] += MemberCredit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('cr_rent');
            $total['cr_elec'] += MemberCredit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('cr_elec');
            $total['cr_water'] += MemberCredit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('cr_water');
            $total['misc1'] += MemberCredit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('misc1');
            $total['misc2'] += MemberCredit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('misc2');
            $total['gross'] += $total['basic'] + $total['special'] + $total['2incr'] + $total['var_incr'] + $total['da'] + $total['house_rent'] + $total['transport'] + $total['hindi'] + $total['deptn_alw'] + $total['wash_alwn'] + $total['risk_alwn'] + $total['non_pract_alwn'] + $total['cr_rent'] + $total['cr_elec'] + $total['cr_water'] + $total['misc1'] + $total['misc2'];

            //deductions

            // $total['nps_subsc'] += MemberCredit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('misc2');
            // $total['nps_refunds'] += MemberCredit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('misc2');
            $total['rent'] += MemberDebit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('rent');
            $total['elec'] += MemberDebit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('elec');
            $total['water'] += MemberDebit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('water');
            $total['furn'] += MemberDebit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('furn');
            // $total['rent_arr'] += MemberDebit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('furn');
            $total['elec_arr'] += MemberDebit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('elec_arr');
            $total['water_arr'] += MemberDebit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('water_arr');
            $total['furn_arr'] += MemberDebit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('furn_arr');
            $total['car_adv'] += MemberDebit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('car_adv');
            $total['car_adv_intrst'] += MemberDebit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('car_int');
            $total['sctr_adv_intrst'] += MemberDebit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('sco_int');
            //    $total['cycle_adv'] += MemberDebit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('sco_int');
            //  $total['cycle_adv_intrst'] += MemberDebit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('sco_int');
            $total['hba_adv'] += MemberDebit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('hba_adv');
            $total['hba_adv_int'] += MemberDebit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('hba_int');
            $total['pli'] += MemberDebit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('pli');
            $total['cgegis'] += MemberDebit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('cgegis');
            $total['cghs'] += MemberDebit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('cghs');
            $total['it'] += MemberDebit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('i_tax');
            $total['ecess'] += MemberDebit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('ecess');
            //  $total['it_surcharge'] += MemberDebit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('ecess');
            $total['tada'] += MemberDebit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('tada');
            $total['ltc'] += MemberDebit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('ltc');
            $total['medical'] += MemberDebit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('medi');
            $total['eol_hpl'] += MemberDebit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('eol');
            $total['pc_adv'] += MemberDebit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('pc');
            // $total[' '] += MemberDebit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('pc');
            $total['festival_adv_rec'] += MemberDebit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('fadv');
            $total['professional_tx'] += MemberDebit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('ptax');
            $total['hra_rec'] += MemberDebit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('hra_rec');
            $total['tpt_rec'] += MemberDebit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('tpt_rec');
            $total['misc1_debit'] += MemberDebit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('misc1');
            $total['misc2_debit'] += MemberDebit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('misc2');
            $total['misc3_debit'] += MemberDebit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('misc3');
            // $total['nps_arr'] += MemberDebit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('misc3');
            $total['total_debit'] += MemberDebit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('tot_debits');
            $total['net_pay'] += MemberDebit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('net_pay');
        }

        $pdf = PDF::loadView('frontend.reports.payroll-generate', compact('total', 'get_month_name', 'year', 'category', 'today'));
        return $pdf->download('payroll-' . $month . '-' . $year . '.pdf');
    }

    public function cildrenAllowance()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        $accountants = User::role('ACCOUNTANT')->get();
        return view('frontend.reports.children-allowance', compact('categories','accountants'));
    }

    public function cildrenAllowanceGenerate(Request $request)
    {
        $request->validate([
            'report_type' => 'required',
            'year' => 'required',
            'e_status' => 'required'
        ]);

       

        $data = $request->all(); 
        $timestamp = now()->format('YmdHis');
        $bill_no = date('Y').'-PGB'.str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT). $timestamp;
        $today =  Carbon::now()->format('d-M-Y');
        $accountant = $request->accountant;
        

        if($request->report_type == 'individual') {

            $request->validate([
                'member_id' => 'required',
            ]);

            $member_detail = Member::where('id', $request->member_id)->first();
            $child_datas = [
                'child_name' => $request->input('child_name'),
                'child_dob' => $request->input('child_dob'),
                'child_scll_name' => $request->input('child_scll_name'),
                'child_class' => $request->input('child_class'),
                'child_academic' => $request->input('child_academic'),
                'child_amount' => $request->input('child_amount')
            ];

            $children = [];
            $total = 0;

            // Check if 'child_name' exists and is an array, otherwise set $num_of_children to 0
            $num_of_children = isset($child_datas['child_name']) && is_array($child_datas['child_name']) 
                            ? count($child_datas['child_name']) 
                            : 0;

            for ($i = 0; $i < $num_of_children; $i++) {
                $children[] = [
                    'child_name' => $child_datas['child_name'][$i],
                    'child_dob' => $child_datas['child_dob'][$i],
                    'child_scll_name' => $child_datas['child_scll_name'][$i],
                    'child_class' => $child_datas['child_class'][$i],
                    'child_academic' => $child_datas['child_academic'][$i],
                    'child_amount' => $child_datas['child_amount'][$i]
                ];

                $total += $child_datas['child_amount'][$i];
            }

            // Check if $children has no value
            if (empty($children)) {
                return redirect()->back()->with('error', 'No children data found.');
            }

            $pdf = PDF::loadView('frontend.reports.children-allowance-report', compact('data', 'total','bill_no','today','children','member_detail','accountant'));
            return $pdf->download('children-allowance-report-' . $member_detail->name . '.pdf');
        } else {
            // call this function groupChildrenAllowanceGenerate()
            $members = Member::where('category', $request->category)->where('pay_stop','No')->get();
            $total = 0;
            $accountant = $request->accountant;
            
            // Prepare data to pass to the view
            $members_data = [];

            foreach ($members as $member) {
                $member_childrens = MemberChildAllowance::where('member_id', $member->id)->where('year',$request->year)->get();

                // Collecting member and their children's data
                $members_data[] = [
                    'member' => $member,
                    'children' => $member_childrens,
                ];

                // Calculating the total allowance
                foreach ($member_childrens as $child) {
                    $total += ($child->allowance_amount ?? 0);
                }
            }

            $pdf = PDF::loadView('frontend.reports.group-children-allowance-report', compact('members_data','data','total','bill_no','today','accountant'));
            return $pdf->download('group-children-allowance-report-' . 'all members' . '.pdf');
        }
        
    }

    public function getMemberChildren(Request $request)
    {
        
        $year = $request->year ?? date('Y');

        $child_allowance_count = MemberChildAllowance::where('member_id', $request->member_id)->where('year', $year)->count();
        if($child_allowance_count > 0) {
            $children_allowances = MemberChildAllowance::where('member_id', $request->member_id)->where('year', $year)->get();
            $edit = true;
        } else {
            $children_allowances = MemberChildrenDetail::where('member_id', $request->member_id)->get();
            $edit = false;
        }

        return response()->json(['view' => view('frontend.reports.children-allowance-children-list', compact('edit', 'children_allowances'))->render(), 'status' => 'success']);
    }

    public function professionalUpdateAllowance()
    {
        $category = Category::where('category', 'A')->first();
        if(!$category) {
            return redirect()->back()->with('error', 'Category A not found!');
        }
        $members = Member::where('e_status', 'active')->where('category', $category->id)->orderBy('id', 'desc')->get();

        
        $financialYears = Helper::getFinancialYears();
        return view('frontend.reports.professional-update-allowance', compact('category', 'members', 'financialYears'));
    }

    public function professionalUpdateAllowanceGenerate(Request $request) 
    {
        // dd($request->all());
        $type = $request->type;
        if($request->type == 'individual') {
            $request->validate([
                'member_id' => 'required',
                'report_year' => 'required',
            ]);
            $year = $request->report_year;
        } else {
            $request->validate([
                'report_year_group' => 'required',
            ]);
            $year = $request->report_year_group;
        }

        [$startYear, $endYear] = explode('-', $year);
        $startOfYear = Carbon::createFromDate($startYear, 4, 1)->startOfDay();
        $endOfYear = Carbon::createFromDate("$endYear", 3, 31)->endOfDay();

        if($request->type == 'individual') {
            $member = Member::where('id', $request->member_id)->with('desigs', 'payLevels')->first();
            $category = Category::where('id', $member->category)->first();
            $member_credit_data = MemberCredit::where('member_id', $request->member_id)->whereBetween('created_at', [$startOfYear, $endOfYear])->get();

            $total_pua = 0;

            foreach($member_credit_data as $member_credit) {
                $total_pua += $member_credit->pua;
            }

            if($member->isEmpty()) {
                return redirect()->back()->with('error', 'No data available');
            }

            $member_data = [
                'member' => $member,
                'total_pua' => $total_pua
            ];

        } else {
            $members = Member::where('category', $request->category)->where('e_status', $request->e_status)->with('desigs', 'payLevels')->get();
            $category = Category::where('id', $request->category)->first();

            $member_data = [];
            
            foreach($members as $member) {
                $member_credit_data = MemberCredit::where('member_id', $member->id)->whereBetween('created_at', [$startOfYear, $endOfYear])->get();

                $total_pua = 0;

                if(count($member_credit_data) > 0)
                {
                    foreach($member_credit_data as $credit_data) {  
                        $total_pua += $credit_data->pua;
                    }
                } else {
                    $total_pua = 0;
                }
                

                $all_members_data = [
                    'member' => $member,
                    'total_pua' => $total_pua
                ];
                $member_data[] = $all_members_data;
            }
            // dd($member_data);
        }

        $pdf = PDF::loadView('frontend.reports.professional-update-allowance-generate', compact('member_data', 'type', 'category', 'year'));

        return $pdf->download('professional-update-allowance' . $year . '.pdf');
    }

    public function gpfWithdrawal() 
    {
        // $members = Member::all();
        return view('frontend.reports.gpf-withdrawal');
    }

    public function gpfWithdrawalGenerate(Request $request)
    {
        // dd($request->all());

        $member = Member::where('id', $request->member_id)->with('desigs')->first();
        $apply_date = $request->apply_date;
        $required_date = $request->required_date;
        $required_amount = $request->amount;
        $received_amount = $request->received_amount;
        $reason = $request->reason;
        $month = Carbon::parse($request->apply_date)->subMonth();

        $member_core_data = MemberCoreInfo::where('member_id', $request->member_id)->first();
        $member_gpf_datas = MemberGpf::where('member_id', $request->member_id)->where('created_at', '<', $month)->where('created_at', '=', $month)->get();
        $gpf_data = MemberGpf::where('member_id', $request->member_id)->where('created_at', '<', $month)->where('created_at', '=', $month)->latest()->first();
        $member_credit_data = MemberCredit::where('member_id', $request->member_id)->latest()->first();

        $total_sub_amt = 0;
        $total_refund = 0;

        if($member_gpf_datas->isEmpty()) {
            return redirect()->back()->with('error', 'No GPF data found for the selected month');
        }

        foreach($member_gpf_datas as $gpf_data) {
            $total_sub_amt += $gpf_data->monthly_subscription;
            $total_refund += $gpf_data->refund;
        }

        $pdf = PDF::loadView('frontend.reports.gpf-withdrawal-generate', compact('member', 'apply_date', 'required_date', 'required_amount', 'received_amount', 'reason', 'member_core_data', 'gpf_data', 'total_sub_amt', 'member_credit_data', 'month', 'total_refund'));
        return $pdf->download('gpf-withdrawal-' . $member->name . '.pdf');
    }

    public function gpfSubscription() 
    {
        $startYear = 1958;
        $endYear = date('Y');
        $accountants = User::role('ACCOUNTANT')->get();
        $years = range($startYear, $endYear);
        return view('frontend.reports.gpf-subscription', compact('years','accountants'));
    }

    public function gpfSubscriptionGenerate(Request $request)
    {
        // dd($request->all());
        $accountant = $request->accountant;
        $e_status = $request->e_status;
        $member_id = $request->member_id;
        $from_year = $request->from_year;
        $from_month = $request->from_month;
        $to_year = $request->to_year;
        $to_month = $request->to_month;

        // Construct the start and end dates
        $start_date = Carbon::create($from_year, $from_month, 1)->startOfMonth();
        $end_date = Carbon::create($to_year, $to_month, 1)->endOfMonth();

        // Fetch the GPF details
        $totalGpfDetails = MemberGpf::where('member_id', $member_id)
            ->whereBetween('created_at', [$start_date, $end_date])
            ->get();

        $total_refund = 0;
        $total_sub_amt = 0;

        foreach($totalGpfDetails as $gpf) {
            $total_refund += $gpf->refund;
            $total_sub_amt += $gpf->monthly_subscription;
        }

        $gpfData = MemberGpf::where('member_id', $member_id)->latest()->first();
        
        $member = Member::where('id', $member_id)->with('desigs')->first();
        $member_core_info = MemberCoreInfo::where('member_id', $member_id)->first();

        if($totalGpfDetails->isEmpty()) {
            return redirect()->back()->with('error', 'No data found for the selected month');
        }
        

        $pdf = PDF::loadView('frontend.reports.gpf-subscription-generate', compact('member', 'totalGpfDetails', 'gpfData', 'member', 'from_year', 'from_month', 'to_year', 'to_month', 'member_core_info', 'total_refund', 'total_sub_amt', 'start_date', 'end_date','accountant'));
        return $pdf->download('gpf-subscription-' . $member->name . '.pdf');
    }

    public function quaterlyTds()
    {
       
        $financialYears = Helper::getFinancialYears();
        return view('frontend.reports.quaterly-tds-report', compact('financialYears'));
    }

    public function quaterlyTdsGenerate(Request $request)
    {
        $request->validate([
            'e_status' => 'required',
            'report_quarter' => 'required',
            'report_year' => 'required',
        ]);

        $report_quarter = $request->report_quarter;
        $report_year = $request->report_year;
        $years = explode('-', $report_year);

        if ($report_quarter == 'Q1') {
            $startYear = $years[0];
            $endYear = $years[0];
            $startMonthDate = Carbon::createFromDate($startYear, 4, 1)->startOfDay();
            $endMonthDate = Carbon::createFromDate($endYear, 6, 30)->endOfDay();
            $months = ['Apr', 'May', 'Jun'];
            $year = $years[0];
            $cap_months  = ['APRIL', 'MAY', 'JUNE'];
            $number_months = ['04', '05', '06'];
        } elseif ($report_quarter == 'Q2') {
            $startYear = $years[0];
            $endYear = $years[0];
            $startMonthDate = Carbon::createFromDate($startYear, 7, 1)->startOfDay();
            $endMonthDate = Carbon::createFromDate($endYear, 9, 30)->endOfDay();
            $months = ['Jul', 'Aug', 'Sep'];
            $year = $years[0];
            $cap_months  = ['JULY', 'AUGUST', 'SEPTEMBER'];
            $number_months = ['07', '08', '09'];
        } elseif ($report_quarter == 'Q3') {
            $startYear = $years[0];
            $endYear = $years[0];
            $startMonthDate = Carbon::createFromDate($startYear, 10, 1)->startOfDay();
            $endMonthDate = Carbon::createFromDate($endYear, 12, 31)->endOfDay();
            $months = ['Oct', 'Nov', 'Dec'];
            $year = $years[0];
            $cap_months  = ['OCOTBER', 'NOVEMBER', 'DECEMBER'];
            $number_months = ['10', '11', '12'];
        } elseif ($report_quarter == 'Q4') {
            $startYear = $years[1];
            $endYear = $years[1];
            $startMonthDate = Carbon::createFromDate($startYear, 1, 1)->startOfDay();
            $endMonthDate = Carbon::createFromDate($endYear, 3, 31)->endOfDay();
            $months = ['Jan', 'Feb', 'Mar'];
            $year = $years[1];
            $cap_months  = ['JAUNARY', 'FEBRUARY', 'MARCH'];
            $number_months = ['01', '02', '03'];
        }

        $members = Member::where('e_status', $request->e_status)->where('pay_stop','No')
            ->get();

        $pdf = PDF::loadView('frontend.reports.quaterly-tds-report-generate', compact('members', 'cap_months','months', 'year', 'report_quarter', 'report_year','number_months'));
        return $pdf->download('quaterly-tds-report-' . $report_quarter . '-' . $report_year . '.pdf');
    }
    public function groupChildrenAllowance()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('frontend.reports.group-children-allowance',compact('categories'));
    }

    public function groupChildrenAllowanceGenerate(Request $request)
    {
        // find out the member respect to category then member family table detail loop

        $members = Member::where('category',$request->category)->get();
        $data = $request;
        $timestamp = now()->format('YmdHis');
        $bill_no = date('Y').'-PGB'.str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT). $timestamp;
        $today =  Carbon::now()->format('d-M-Y');
        $total = 0;

        foreach($members as $member)
        {
            $member_detail = Member::where('id', $member->id)->first();
            $member_children = MemberFamily::where('member_id', $member->id)->first();
            $total += ($member_children->child1_amount ?? 0) + ($member_children->child2_amount ?? 0);
        }

        $pdf = PDF::loadView('frontend.reports.group-children-allowance-report', compact('members','data','total','bill_no','today'));
        return $pdf->download('group-children-allowance-report-' . 'fgd' . '.pdf');
       

    }

    public function newspaperAllowance(Request $request)
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('frontend.reports.newspaper-allowance',compact('categories'));
    }

    public function getMemberNewspaperAllocation(Request $request)
    {
        $member_detail = Member::where('id', $request->member_id)->first();
        $get_news_allow = NewspaperAllowance::where('category_id', $member_detail->category)->where('year', $request->year)->first();
        return response()->json(['get_news_allow' => $get_news_allow]);
    }

    public function newspaperReportGenerate(Request $request)
    {
  
        $request->validate([
            'report_type' => 'required',
            //if $request->report_type == 'individual'
            'member_id' => 'required_if:report_type,individual',
            'e_status' =>'required_if:report_type,individual',
            //if $request->report_type == 'group'
            'category' => 'required_if:report_type,group',

        ]); 
        $data = $request->all();

        if($request->report_type == 'individual') {
            $member_detail = Member::where('id', $request->member_id)->first();
            $pdf = PDF::loadView('frontend.reports.newspaper-allowance-report-generate', compact('member_detail','data'));
            return $pdf->download('newspaper-allowance-report-' . $member_detail->name . '.pdf');
        }else{

            $members = Member::where('category',$request->category)->get();
            $total = 0;
            foreach($members as $member)
            {
                $amount = MemberNewspaperAllowance::where('member_id', $member->id)->first();
                $total += $amount->amount ?? 0;
            }

            $pdf = PDF::loadView('frontend.reports.group-newspaper-report-generate', compact('members','total'));
            return $pdf->download('newspaper-allowance-report-' . 'all-members' . '.pdf');
        } 
    }

    public function groupNewspaperAllocation()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('frontend.reports.group-newspaper-allowance',compact('categories'));
    }

    public function groupNewspaperReportGenerate(Request $request)
    {
        $members = Member::where('category',$request->category)->get();
        $total = 0;
        foreach($members as $member)
        {
            $amount = MemberNewspaperAllowance::where('member_id', $member->id)->first();
            $total += $amount->amount;
        }

        $pdf = PDF::loadView('frontend.reports.group-newspaper-report-generate', compact('members','total'));
        return $pdf->download('newspaper-allowance-report-' . 'all-members' . '.pdf');
    }

    public function landlineAllocation()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('frontend.reports.landline-allowance',compact('categories'));
    }

    public function landlineReportGenerate(Request $request)
    {
        $request->validate([
            'member_id' => 'required_if:report_type,individual',
            'e_status' =>'required_if:report_type,individual',
            //if $request->report_type == 'group'
            'category' => 'required_if:report_type,group',

        ]);

        $data = $request->all();

        $month_name = date('F', mktime(0, 0, 0, $request->month, 10));
        $member_detail = Member::where('id', $request->member_id)->first();
        if($member_detail == null) {
            return redirect()->back()->with('error', 'Member not found!');
        }
        $member_personal_detail = MemberPersonalInfo::where('member_id', $request->member_id)->first();
        $landline_allowance = LandlineAllowance::where('category_id', $member_detail->category)->orderBy('id','desc')->first() ?? 0;
        $member_all_allowance = MemberCredit::where('member_id', $request->member_id)->whereMonth('created_at', $request->month)->first() ?? 0;
        $total = ($member_all_allowance->landline_allow ?? 0) + ($member_all_allowance->mobile_allow ?? 0) + ($member_all_allowance->broad_band_allow ?? 0);

        $pdf = PDF::loadView('frontend.reports.landline-allow-report-generate', compact('member_detail','member_all_allowance','data', 'total','landline_allowance','month_name'));
        return $pdf->download('landline-allowance-report-' . $member_detail->name . '.pdf');
    
    }

    public function bagPurseAllowanceReport()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('frontend.reports.bag-purse-allowance',compact('categories'));
    }

    public function bagPurseAllowanceReportGenerate(Request $request)
    {
        $request->validate([
            'report_type' => 'required',
            'year' => 'required',
            //if $request->report_type == 'individual'
            'member_id' => 'required_if:report_type,individual',
            'e_status' =>'required_if:report_type,individual',
            //if $request->report_type == 'group'
            'category' => 'required_if:report_type,group',

        ]); 
        $data = $request->all();

        if($request->report_type == 'individual') {
            $member_detail = Member::where('id', $request->member_id)->first();
            $member_purse_allowances = MemberBagPurse::where('member_id', $request->member_id)->where('year', $request->year)->get();

            $pdf = PDF::loadView('frontend.reports.bag-purse-allowance-report-generate', compact('member_purse_allowances','member_detail','data'));
            return $pdf->download('bag-purse-allowance-report-' . '.pdf');
        }else{

            $members = Member::where('category', $request->category)->where('pay_stop','No')->get();
            $total = 0;
            $member_purse_allowances = [];

            foreach ($members as $member) {
                $amount = MemberBagPurse::where('member_id', $member->id)
                                        ->where('year', $request->year)
                                        ->first();
                
                if ($amount) {
                    $total += $amount->amount ?? 0;

                    $member_details = [
                        'name' => $member->name,
                        'gpf_pran' => $member->gpf_number ?? $member->pran_number ?? 'N/A',
                        'designation' => $member->desigs->designation ?? 'N/A',
                        'pay_level' => $member->payLevels->value ?? 'N/A',
                        'entitle_amount' => $amount->entitle_amount ?? 0,
                        'bill_amount' => $amount->bill_amount ?? 0,
                        'net_amount' => $amount->net_amount ?? 0,
                        'remarks' => $amount->remarks ?? 'N/A'
                    ];

                    $member_purse_allowances[] = $member_details;
                }
            }

            $pdf = PDF::loadView('frontend.reports.group-bag-purse-report-generate', compact('member_purse_allowances','total'));
            return $pdf->download('bag-purse-allowance-report-' . 'all-members' . '.pdf');
        } 
    }

    public function terminalBenefits()
    {
        $members = Member::whereHas('memberRetirementInfo')->with('memberRetirementInfo')->get();
        $accountants = User::role('ACCOUNTANT')->get();

        return view('frontend.reports.terminal-benefits', compact('members','accountants'));
    }

    public function terminalBenefitsGenerate(Request $request) 
    {
        // validation 
        $request->validate([
            'member_id' => 'required',
        ]);
        $member_id = $request->member_id;
        $member = Member::where('id', $member_id)->with('memberRetirementInfo')->first();
        $member_retirement_info = MemberRetirementInfo::where('member_id', $member_id)->first();
        $member_credit_data = MemberCredit::where('member_id', $member_id)->latest()->first();
        $da_percentage = DearnessAllowancePercentage::where('is_active', 1)->first();
        $accountant = $request->accountant;

        if($member_retirement_info->retirement_type == 'voluntary') {
            $retirement_type = 'VRS';
        } else {
            $retirement_type = '';
        }

        $pdf = PDF::loadView('frontend.reports.terminal-benefits-generate', compact('member', 'member_retirement_info', 'member_credit_data', 'retirement_type', 'da_percentage','accountant'));
        return $pdf->download('terminal-benefits-' . $member->name . '.pdf');
    }

    public function formSixteenB()
    {
        $members = Member::all();
        $assessment_year = Helper::getFinancialYears();

        return view('frontend.reports.form-sixteen-b', compact('members', 'assessment_year'));

    }

    public function formSixteenBGenerate(Request $request)
    {
        $member = Member::where('id', $request->member_id)->with('desigs')->first();
        $assessment_year = $request->report_year;
        $current_financial_year = date('Y') . '-' . (date('Y') + 1);
        $income_from_other_sources = $request->other_income;
        $income_from_house_property = $request->house_property_income;
        $prerequisite172 = 0; $profits_in_lieu = 0; $total_from_other_employer = 0; $amt10a = 0; $amt10b = 0; $exemption10 = 0;
        $standard_deduction_16 = 0; $entertainment_allow = 0; $profession_tax = 0; $other_deduction_via = 0; $surcharge = 0;

        [$startYear, $endYear] = explode('-', $request->report_year);
        $startOfYear = Carbon::createFromDate($startYear, 4, 1)->startOfDay();
        $endOfYear = Carbon::createFromDate("$endYear", 3, 31)->endOfDay();

        $member_it_exemption = MemberIncomeTax::where('member_id', $request->member_id)->whereBetween('created_at', [$startOfYear, $endOfYear])->get();
        $member_credit_data = MemberCredit::where('member_id', $request->member_id)->whereBetween('created_at', [$startOfYear, $endOfYear])->latest()->first();  
        $member_core_info = MemberCoreInfo::where('member_id', $request->member_id)->first();      
        $incometaxRate = IncomeTax::where('financial_year', $request->report_year)->get();

        if($member_it_exemption->count() == 0) {
            return redirect()->back()->with('error', 'No data found for the selected year');  
        }


        $pdf = PDF::loadView('frontend.reports.form-sixteen-b-generate', compact('member', 'assessment_year', 'member_credit_data', 'member_it_exemption', 'current_financial_year', 'income_from_other_sources', 'income_from_house_property', 'member_core_info', 'prerequisite172', 'profits_in_lieu', 'total_from_other_employer', 'amt10a', 'amt10b', 'exemption10', 'standard_deduction_16', 'entertainment_allow', 'profession_tax', 'other_deduction_via', 'incometaxRate', 'surcharge'));
        return $pdf->download('form-sixteen-b-' . $member->name . '.pdf');
    }

    public function ltcAdvance()
    {
        $members = Member::orderBy('id', 'desc')->get();
        $assessment_years = Helper::getFinancialYears();
        $leave_types = LeaveType::where('status',1)->orderBy('id','desc')->get();
        return view('frontend.reports.ltc-advancement',compact('members','assessment_years','leave_types'));
    }

    public function getMemberLeave(Request $request)
    {
        $leave = MemberLeave::where('member_id', $request->member_id)
        ->where('leave_type_id', $request->leave_type)
        ->where('year', date('Y'))
        ->sum('remaining_leaves');
        return response()->json(['leave' => $leave->remaining_leaves]);
    }

    public function ltcAdvanceSettlement()
    {
        return view('frontend.reports.ltc-advance-settlement');
    }

    public function ltcAdvanceReport()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        $members = Member::orderBy('id', 'desc')->get();
        return view('frontend.reports.ltc-advance-report',compact('members','categories'));
    }

    public function ltcAdvanceReportGenerate(Request $request)
    {
        $member = Member::where('id', $request->member_id)->first();
        $pdf = PDF::loadView('frontend.reports.ltc-advance-report-generate',compact('member'));
        return $pdf->download('ltc-advance-' .'.pdf');
    }

    public function formsixteen()
    {
        $members = Member::all();
        $assessment_year = Helper::getFinancialYears();

        return view('frontend.reports.form-sixteen', compact('members', 'assessment_year'));
    }

    public function formSixteenGenerate(Request $request)
    {
        $member = Member::where('id', $request->member_id)->with('desigs')->first();
        $assessment_year = $request->report_year;
        $current_financial_year = date('Y') . '-' . (date('Y') + 1);
        $prerequisite172 = 0; $profits_in_lieu = 0; $total_from_other_employer = 0; $amt10a = 0; $amt10b = 0; $exemption10 = 0;
        $standard_deduction_16 = 0; $entertainment_allow = 0; $profession_tax = 0; $other_deduction_via = 0; $other_income = 0;
        $surcharge = 0; $tax_deducted_192i = 0; $tax_paid_192ia = 0;

        [$startYear, $endYear] = explode('-', $request->report_year);
        $startOfYear = Carbon::createFromDate($startYear, 4, 1)->startOfDay();
        $endOfYear = Carbon::createFromDate("$endYear", 3, 31)->endOfDay();

        $member_it_exemption = MemberIncomeTax::where('member_id', $request->member_id)->whereBetween('created_at', [$startOfYear, $endOfYear])->get();
        $member_credit_data = MemberCredit::where('member_id', $request->member_id)->whereBetween('created_at', [$startOfYear, $endOfYear])->latest()->first();  
        $member_debit_data = MemberDebit::where('member_id', $request->member_id)->whereBetween('created_at', [$startOfYear, $endOfYear])->latest()->first();
        $member_core_info = MemberCoreInfo::where('member_id', $request->member_id)->first();
        $incometaxRate = IncomeTax::where('financial_year', $request->report_year)->get();

        if($member_it_exemption->count() == 0) {
            return redirect()->back()->with('error', 'No data found for the selected year');  
        }

        $pdf = PDF::loadView('frontend.reports.form-sixteen-generate', compact('member', 'assessment_year', 'member_credit_data', 'member_it_exemption', 'current_financial_year',  'member_core_info', 'prerequisite172', 'profits_in_lieu', 'total_from_other_employer', 'amt10a', 'amt10b', 'exemption10', 'standard_deduction_16', 'entertainment_allow', 'profession_tax', 'other_deduction_via', 'startYear', 'endYear', 'member_debit_data', 'other_income', 'incometaxRate', 'surcharge', 'tax_deducted_192i', 'tax_paid_192ia'));
        return $pdf->download('form-sixteen-' . $member->name . '.pdf');
    }

    public function formSixteenA()
    {
        $members = Member::all();
        $assessment_year = Helper::getFinancialYears();

        return view('frontend.reports.form-sixteen-a', compact('members', 'assessment_year'));
    }

    public function formSixteenAGenerate(Request $request)
    {
        $member = Member::where('id', $request->member_id)->with('desigs')->first();
        $assessment_year = $request->report_year;
        $current_financial_year = date('Y') . '-' . (date('Y') + 1);
        $prerequisite172 = 0; $profits_in_lieu = 0; $total_from_other_employer = 0; $amt10a = 0; $amt10b = 0; $exemption10 = 0;
        $standard_deduction_16 = 0; $entertainment_allow = 0; $profession_tax = 0; $other_deduction_via = 0;

        [$startYear, $endYear] = explode('-', $request->report_year);
        $startOfYear = Carbon::createFromDate($startYear, 4, 1)->startOfDay();
        $endOfYear = Carbon::createFromDate("$endYear", 3, 31)->endOfDay();

        $member_it_exemption = MemberIncomeTax::where('member_id', $request->member_id)->whereBetween('created_at', [$startOfYear, $endOfYear])->get();
        $member_credit_data = MemberCredit::where('member_id', $request->member_id)->whereBetween('created_at', [$startOfYear, $endOfYear])->latest()->first();  
        $member_core_info = MemberCoreInfo::where('member_id', $request->member_id)->first();

        $pdf = PDF::loadView('frontend.reports.form-sixteen-a-generate', compact('member', 'assessment_year', 'member_credit_data', 'member_it_exemption', 'current_financial_year',  'member_core_info', 'prerequisite172', 'profits_in_lieu', 'total_from_other_employer', 'amt10a', 'amt10b', 'exemption10', 'standard_deduction_16', 'entertainment_allow', 'profession_tax', 'other_deduction_via', 'startYear', 'endYear'));
        return $pdf->download('form-sixteen-a-' . $member->name . '.pdf');
    }

    public function payMatrixReport()
    {
        $pay_commissions = PayCommission::orderBy('id', 'desc')->get();
        $financial_years = Helper::getFinancialYears();
        return view('frontend.reports.pay-matrix-report', compact('pay_commissions','financial_years'));
    }

    public function payMatrixReportGenerate(Request $request)
    {

        $pay_bands = Payband::where('year',$request->financial_year)->get();
        $pm_levels = PmLevel::where('year',$request->financial_year)->get();
        $pay_level_counts = [];
        foreach($pay_bands as $pay_band)
        {
            $pay_levels = PmLevel::where('payband',$pay_band->id)->count();
            $pay_level_counts[$pay_band->id] = $pay_levels;
        }

        $gradePayArray = [];
        $entryPayArray = [];
        $levelArray = [];
        $pmIndexArray = [];
        $pmRowArray = [];

        // Initialize the pmRowArray with empty arrays for each row
        $pm_rows = PayMatrixRow::all();
        foreach ($pm_rows as $row) {
            $pmRowArray[$row->id] = []; // Initialize empty array for each row
        }

        foreach ($pm_levels as $pm_level) {
            $grade_pay = GradePay::where('pay_level', $pm_level->id)->first();
            $pm_index = PmIndex::where('pm_level_id', $pm_level->id)->first();

            $gradePayArray[] = $grade_pay->amount ?? '';
            $entryPayArray[] = $pm_level->entry_pay ?? '';
            $levelArray[] = $pm_level->value;
            $pmIndexArray[] = $pm_index->value ?? '';

            foreach ($pm_rows as $row) {
                $pay_matrix_basic = PayMatrixBasic::where('pay_matrix_row_id', $row->id)
                                                ->where('pm_level_id', $pm_level->id)
                                                ->first();

                
                                            
                $pmRowArray[$row->id][] = $pay_matrix_basic->basic_pay ?? '';
            }
        }

        // Create the final structured array
        $structuredArray = [
            'GradePay' => $gradePayArray,
            'EntryPay' => $entryPayArray,
            'Level' => $levelArray,
            'PmIndex' => $pmIndexArray,
            'PmRow' => array_values($pmRowArray) // Convert associative array to indexed array
        ];
     
        // dd($level_array);
        $pdf = PDF::loadView('frontend.reports.pay-matrix-report-generate', compact('pay_bands','pay_level_counts','pm_levels','structuredArray'));
        return $pdf->download('pay-matrix-commission-report-' . $request->financial_year . '.pdf');
    }

    public function daArrears()
    {
        // $financialYears = Helper::getFinancialYears();
        $categories = Category::orderby('id','desc')->get();
        return view('frontend.reports.da-arrears', compact('categories'));
    }

    public function daArrearsGenerate(Request $request)
    {
        $from_year = $request->from_year;
        $from_month = $request->from_month;
        $to_year = $request->to_year;
        $to_month = $request->to_month;
        $category = Category::where('id', $request->category)->first();

        $start_date = Carbon::create($from_year, $from_month, 1)->startOfMonth();
        $end_date = Carbon::create($to_year, $to_month, 1)->endOfMonth();

        $members = Member::where('e_status', $request->e_status)->where('category', $request->category)->get();
        // Chunk the collection into groups of 10
        $chunkedMembers = $members->chunk(2);

        $due_da_percentage_for_heading = DearnessAllowancePercentage::whereBetween('year', [$from_year, $to_year])
            ->where(function($query) use ($from_year, $to_year, $from_month, $to_month) {
                $query->where(function($subQuery) use ($from_year, $from_month) {
                    $subQuery->where('year', $from_year)
                            ->where('month', '>=', $from_month);
                })
                ->orWhere(function($subQuery) use ($to_year, $to_month) {
                    $subQuery->where('year', $to_year)
                            ->where('month', '<=', $to_month);
                })
                ->orWhere(function($subQuery) use ($from_year, $to_year) {
                    $subQuery->whereBetween('year', [strval($from_year + 1), strval($to_year - 1)]);
                });
            })
            ->latest()->first();

        $drawn_da_percentage_for_heading = DearnessAllowancePercentage::whereBetween('year', [$from_year, $to_year])
            ->where(function($query) use ($from_year, $to_year, $from_month, $to_month) {
                $query->where(function($subQuery) use ($from_year, $from_month) {
                    $subQuery->where('year', $from_year)
                            ->where('month', '>=', $from_month);
                })
                ->orWhere(function($subQuery) use ($to_year, $to_month) {
                    $subQuery->where('year', $to_year)
                            ->where('month', '<=', $to_month);
                })
                ->orWhere(function($subQuery) use ($from_year, $to_year) {
                    $subQuery->whereBetween('year', [strval($from_year + 1), strval($to_year - 1)]);
                });
            })
            ->where('is_active', 0)
            ->latest()->first();

        $da_percentage_diff_heading = $due_da_percentage_for_heading->percentage - $drawn_da_percentage_for_heading->percentage;

        $report = []; // Initialize the report array outside the loop

        foreach($chunkedMembers as $chunkedIndex => $chunkMember) {
            $chunkReport = []; // Initialize a temporary array for each chunk

            foreach ($chunkMember as $index => $member) { // Iterate over the members in the current chunk
                $member_basic = MemberCredit::where('member_id', $member->id)
                    ->whereBetween('created_at', [$start_date, $end_date])
                    ->select('pay', 'g_pay')
                    ->latest()
                    ->first();
                $basic = $member_basic->pay ?? 0;
                $g_pay = $member_basic->g_pay ?? 0;

                $current_date = clone $start_date;
                $memberData = [
                    'Sl_No' => $index + 1,
                    'Emp_ID' => $member->emp_id,
                    'Name' => $member->name,
                    'Desig' => $member->designation->designation,
                    'Basic' => $basic,
                    'GPAY' => $g_pay,
                    'monthly_data' => [],
                    'total_diff' => 0,
                    'total_tpt_diff' => 0,
                ];

                $cumulativeDiff = 0;
                $cumulativeTptDiff = 0;

                while ($current_date <= $end_date) {
                    $year = $current_date->year;
                    $month = $current_date->month;

                    $da_percentage = DearnessAllowancePercentage::where('year', $year)
                                                                ->where('month', $month)
                                                                ->where('is_active', 1)
                                                                ->latest()
                                                                ->first();
                    $da_now_percentage = $da_percentage->percentage ?? 0;

                    $prev_percentage = DearnessAllowancePercentage::where('year', $year)
                                                                    ->where('month', $month)
                                                                    ->where('is_active', 0)
                                                                    ->latest()
                                                                    ->first();
                    $prev_da_percentage = $prev_percentage->percentage ?? 0;

                    $da_due = $basic * $da_now_percentage / 100;
                    $da_drawn = $basic * $prev_da_percentage / 100;
                    $diff = $da_due - $da_drawn;

                    $tptData = MemberCredit::where('member_id', $member->id)
                                            ->whereYear('created_at', $year)
                                            ->whereMonth('created_at', $month)
                                            ->select('tpt', 'da_on_tpt')
                                            ->first();
                    $tpt_due_amt = $tptData->tpt ?? 0;
                    $tpt_da = $tptData->da_on_tpt ?? 0;

                    $da_for_tpt_percentage = DearnessAllowancePercentage::where('year', $year)
                                                                ->where('is_active', 1)
                                                                ->latest()
                                                                ->first();
                    $da_now_tpt_percentage = $da_for_tpt_percentage->percentage ?? 0;

                    $tpt_due = $tpt_due_amt + ($tpt_due_amt * $da_now_tpt_percentage / 100);
                    $tpt_drawn = $tpt_due_amt + $tpt_da;
                    $tpt_diff = $tpt_due - $tpt_drawn;

                    $npsData = MemberDebit::where('member_id', $member->id)
                                        ->whereYear('created_at', $year)
                                        ->whereMonth('created_at', $month)
                                        ->select('pension_rec', 'eol', 'npsg')
                                        ->first();

                    $nps = ($npsData->npsg ?? 0) + ($npsData->pension_rec ?? 0);
                    $eol = $npsData->eol ?? 0;

                    $total = $da_due + $tpt_due - $da_drawn - $tpt_drawn;
                    $final = $total - $nps;

                    $cumulativeDiff += $diff;
                    $cumulativeTptDiff += $tpt_diff;

                    $memberData['monthly_data'][] = [
                        'Month' => $current_date->format('M-Y'),
                        'Due' => $da_due,
                        'Drawn' => $da_drawn,
                        'Diff' => $diff,
                        'TPT_Due' => $tpt_due,
                        'TPT_Drawn' => $tpt_drawn,
                        'TPT_Diff' => $tpt_diff,
                        'NPS' => $nps,
                        'EOl' => $eol,
                        'Final' => $final,
                    ];

                    // Move to the next month
                    $current_date->addMonth();
                }

                // Store cumulative values separately
                $memberData['total_diff'] = $cumulativeDiff;
                $memberData['total_tpt_diff'] = $cumulativeTptDiff;

                // Add member data to the chunk report
                $chunkReport[] = $memberData;
            }

            // Add the chunk report to the main report array
            $report[$chunkedIndex] = $chunkReport;
        }
        // dd($report);


        // Now $report contains separate arrays for each chunk of members


        if($chunkedMembers->isEmpty())
        {
            return redirect()->back()->with('error','No data found');
        }


        $pdf = PDF::loadView('frontend.reports.da-arrears-generate-new', compact('report', 'da_percentage_diff_heading', 'due_da_percentage_for_heading', 'drawn_da_percentage_for_heading', 'start_date', 'end_date', 'chunkedMembers'));
        return $pdf->download('da-arrears-' . Carbon::parse($start_date)->format('M-Y') . 'to' . Carbon::parse($end_date)->format('M-Y') . '.pdf');
    }


    public function cgegis()
    {
       
        return view('frontend.reports.cgegis', compact('members', 'financialYears'));
    }

    public function iTaxRecovery()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        $accountants = User::role('ACCOUNTANT')->get();
        return view('frontend.reports.i-tax-recovery', compact('categories','accountants'));
    }

    public function iTaxReportGenerate(Request $request)
    {
        $members = Member::where('category', $request->category)->get();
        if($members->count() == 0)
        {
            return redirect()->back()->with('error','No data found');
        }
       
        $chunkedMembers = $members->chunk(10); // Chunk the collection into groups of 8
        $category = Category::where('id', $request->category)->first(); 
        $year = $request->year;
        $month = $request->month;
        $accountant = $request->accountant;
        $month_name = date('F', mktime(0, 0, 0, $request->month, 10));
        $pdf = PDF::loadView('frontend.reports.i-tax-report-generate', compact('chunkedMembers','category','month_name','year','accountant','month'));
        return $pdf->download('i-tax-recovery-report-' . '.pdf');

    }

    public function lfChanges()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        $accountants = User::role('ACCOUNTANT')->get();
        return view('frontend.reports.lf-changes', compact('categories','accountants'));
    }

    public function lfReportGenerate(Request $request)
    {
        $members = Member::where('category', $request->category)->get();

        foreach($members as $member)
        {
            $member->credit = MemberCredit::where('member_id', $member->id)
                ->whereYear('created_at', $request->year)
                ->whereMonth('created_at', $request->month)
                ->first() ?? null;

            $member->debit = MemberDebit::where('member_id', $member->id)
                ->whereYear('created_at', $request->year)
                ->whereMonth('created_at', $request->month)
                ->first() ?? null;
        }

        // Chunk the collection into groups of 10
        $chunkedMembers = $members->chunk(10);
        
        // Additional variables
        $category = Category::where('id', $request->category)->first();
        $year = $request->year;
        $month = $request->month;
        $accountant = $request->accountant;
        $month_name = date('F', mktime(0, 0, 0, $request->month, 10));

        if($members->count() == 0)
        {
            return redirect()->back()->with('error','No data found');
        }

        // Generate the PDF
        $pdf = PDF::loadView('frontend.reports.lf-chnages-reports', compact('chunkedMembers', 'category', 'month_name', 'year', 'accountant','month'));
        
        return $pdf->download('lf-chnages-recovery-report-' . '.pdf');
    }

    public function miscReport()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('frontend.reports.misc-report', compact('categories'));
    }

    public function miscReportGenerate(Request $request)
    {
        $members = Member::where('category', $request->category)->get();
        $chunkedMembers = $members->chunk(10); // Chunk the collection into groups of 8
        $category = Category::where('id', $request->category)->first(); 
        $year = $request->year;
        $month = $request->month;
        $accountant = $request->accountant;
        $month_name = date('F', mktime(0, 0, 0, $request->month, 10));
        if($members->count() == 0)
        {
            return redirect()->back()->with('error','No data found');
        }
        $pdf = PDF::loadView('frontend.reports.misc-report-generate', compact('chunkedMembers','category','month_name','year','accountant','month'));
        return $pdf->download('misc-report-' . '.pdf');
    }

    public function npsReport()
    {
        $financialYears = Helper::getFinancialYears();
        return view('frontend.reports.nps-report', compact('financialYears'));
    }

    public function npsReportGenerate(Request $request)
    {                                                                       
        $members = Member::orderBy('id','desc')->where('fund_type', 'NPS')->get();
        $chunkedMembers = $members->chunk(10); 
        $financial_year = $request->financial_year;
        $year = $request->year;
        $da = $request->da;
        $accountant = $request->accountant;
        $month = $request->month;
        
        $month_name = date('F', mktime(0, 0, 0, $request->month, 10));
        if($members->count() == 0)
        {
            return redirect()->back()->with('error','No data found');
        }
        $pdf = PDF::loadView('frontend.reports.nps-report-generate', compact('chunkedMembers','financial_year','month_name','year','da','accountant','month'));
        return $pdf->download('nps-report-' . '.pdf');
    }

    public function getDaPercentNps(Request $request)
    {
        $get_da_percenrtage = DearnessAllowancePercentage::where('financial_year', $request->financial_year)->where('year', $request->year)->where('is_active',1)->first();
        return response()->json(['da_percentage' => $get_da_percenrtage->percentage]);
    }

    public function cgegisReport()
    {
        $categories = Category::orderby('id','desc')->get();
        $accountants = User::role('ACCOUNTANT')->get();
        return view('frontend.reports.cgegis-report', compact('categories','accountants'));
    }

    public function cgegisReportGenerate(Request $request)
    {
        $members = Member::where('category', $request->category)->get();
        if($members->count() == 0)
        {
            return redirect()->back()->with('error','No data found');
        }
        $chunkedMembers = $members->chunk(10); // Chunk the collection into groups of 8
        $category = Category::where('id', $request->category)->first(); 
        $year = $request->year;
        $month = $request->month;
        $accountant = $request->accountant;
        $month_name = date('F', mktime(0, 0, 0, $request->month, 10));
        $pdf = PDF::loadView('frontend.reports.cgegis-report-generate', compact('chunkedMembers','category','month_name','year','accountant','month'));
        return $pdf->download('cgegis-report-' . '.pdf');
    }

    public function cghsReport()
    {
        $categories = Category::orderby('id','desc')->get();
        $accountants = User::role('ACCOUNTANT')->get();
        return view('frontend.reports.cghs-report', compact('categories','accountants'));
    }

    public function cghsReportGenerate(Request $request)
    {
        $members = Member::where('category', $request->category)->get();
        $chunkedMembers = $members->chunk(10); // Chunk the collection into groups of 8
        $category = Category::where('id', $request->category)->first(); 
        $year = $request->year;
        $month = $request->month;
        $accountant = $request->accountant;
        $month_name = date('F', mktime(0, 0, 0, $request->month, 10));
        if($members->count() == 0)
        {
            return redirect()->back()->with('error','No data found');
        }
        $pdf = PDF::loadView('frontend.reports.cghs-report-generate', compact('chunkedMembers','category','month_name','year','accountant','month'));
        return $pdf->download('cghs-report-' . '.pdf');
    }

    public function hbaReport()
    {
        $categories = Category::orderby('id','desc')->get();
        $accountants = User::role('ACCOUNTANT')->get();
        return view('frontend.reports.hba-report', compact('categories','accountants'));
    }

    public function hbaReportGenerate(Request $request)
    {
        $members = Member::where('category', $request->category)->get();
        $chunkedMembers = $members->chunk(10); // Chunk the collection into groups of 8
        $category = Category::where('id', $request->category)->first(); 
        $year = $request->year;
        $accountant = $request->accountant;
        $month = $request->month;
        $month_name = date('F', mktime(0, 0, 0, $request->month, 10));
        if($members->count() == 0)
        {
            return redirect()->back()->with('error','No data found');
        }
        $pdf = PDF::loadView('frontend.reports.hba-report-generate', compact('chunkedMembers','category','month_name','year','accountant','month'));
        return $pdf->download('hba-report-' . '.pdf');
    }

    public function payFixationArrears()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        $accountants = User::role('ACCOUNTANT')->get();
        return view('frontend.reports.pay-fixation-arrears', compact('categories', 'accountants'));
    }

    public function payFixationArrearsGenerate(Request $request)
    {
        $member = Member::where('id', $request->member_id)->first(); 
        $from_year = $request->from_year;
        $from_month = $request->from_month;
        $to_year = $request->to_year;
        $to_month = $request->to_month;
        $accountant = $request->accountant;
        $due_basic = $request->due_basic;
        $due_tpt = $request->due_tpt;
        $pran_no = $member->pran_number ?? '';

        $start_date = Carbon::create($from_year, $from_month, 1)->startOfMonth();
        $end_date = Carbon::create($to_year, $to_month, 1)->endOfMonth();

        $monthlyData = []; // Initialize an array to hold the monthly data

        $current_date = clone $start_date;
        while ($current_date <= $end_date) {
            $year = $current_date->year;
            $month = $current_date->month;

            // Query MemberCredit table for the current month and year
            $memberCredit = MemberCredit::where('member_id', $member->id)
                                        ->whereYear('created_at', $year)
                                        ->whereMonth('created_at', $month)
                                        ->first();

            // Query MemberDebit table for the current month and year
            $npsData = Pension::where('user_id', $member->id)
                                ->whereYear('year', $year)
                                ->whereMonth('month', $month)
                                ->first();

            // Query HRA table for the current month and year
            $hraData = Hra::where('status')->latest()->first();
            $hra_percentage = $hraData->percentage ?? 0;

            // Default values if no data exists for the month
            $drawn_basic = $memberCredit->pay ?? 0;

            // Calculate DA Due and Drawn
            $da_percentage = DearnessAllowancePercentage::where('year', $year)
                                                            ->where('month', $month)
                                                            ->where('is_active', 1)
                                                            ->latest()
                                                            ->first()
                                                            ->percentage ?? 0;

            $da_due = $due_basic * $da_percentage / 100;
            $da_drawn = $drawn_basic * $da_percentage / 100;
            $diff = $da_due - $da_drawn;

            // Calculate TPT Due and Drawn
            $tpt_due = $due_tpt;
            $tpt_drawn = $memberCredit->tpt ?? 0;
            $tpt_diff = $tpt_due - $tpt_drawn;

            $due_tpt_da = $tpt_due * $da_percentage / 100;
            $drawn_tpt_da = $tpt_drawn * $da_percentage / 100;

            // Calculate HRA Due and Drawn
            $hra_due = $due_basic * $hra_percentage / 100;
            $hra_drawn = $drawn_basic * $hra_percentage / 100;

            // Calculate the total due and drawn
            $total_due = $due_basic + $da_due + $tpt_due + $hra_due + $due_tpt_da;
            $total_drawn = $drawn_basic + $da_drawn + $tpt_drawn + $hra_drawn + $drawn_tpt_da;

            // Difference between total due and drawn
            if($total_drawn == 0 || $total_due == 0)
            {
                $total_diff = 0;
            }
            else
            {
                $total_diff = $total_due - $total_drawn;
            }

            // nps amount
            $nps = $npsData->npsg_sub_amt ?? 0;

            // total amount
            $total_amt = $total_diff - $nps;

            // Store the data for this month (even if it's all zeros)
            $monthlyData[] = [
                'Year' => $year,
                'Month' => $current_date->format('F'),
                'Due_Basic' => $due_basic,
                'Drawn_Basic' => $drawn_basic,
                'DA_Due' => $da_due,
                'DA_Drawn' => $da_drawn,
                'TPT_Due' => $tpt_due,
                'TPT_Drawn' => $tpt_drawn,
                'HRA_Due' => $hra_due,
                'HRA_Drawn' => $hra_drawn,
                'tpt_da_due' => $due_tpt_da,
                'tpt_da_drawn' => $drawn_tpt_da,
                'Total_Due' => $total_due,
                'Total_Drawn' => $total_drawn,
                'Total_Diff' => $total_diff,
                'NPS' => $nps,
                'Total_Amt' => $total_amt,  
            ];

            // Move to the next month
            $current_date->addMonth();
        }

        // The $monthlyData array now contains all the data for each month within the specified range
        
        
        $pdf = PDF::loadView('frontend.reports.pay-fixation-arrears-generate', compact('monthlyData', 'member', 'accountant', 'pran_no', 'start_date', 'end_date'))->setPaper('a4', 'landscape');
        return $pdf->download('pay-fixation-arrears-' . '.pdf');
    }

    public function getNpsMemberInfo(Request $request)
    {
        $members = Member::where('e_status', $request->e_status)->where('pay_stop','No')->where('fund_type', 'NPS')->orderBy('id', 'desc')->get();
        return response()->json(['members' => $members]);
    }
    
    
}
