<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payband;
use App\Models\Category;
use App\Models\Member;
use App\Models\PmLevel;
use App\Models\PmIndex;
use App\Models\Division;
use App\Models\Group;
use App\Models\Cadre;
use App\Models\DesignationType;
use App\Models\FundType;
use App\Models\Quater;
use App\Models\ExService;
use App\Models\Pg;
use App\Models\Cgegis;
use App\Models\PaybandType;
use App\Models\MemberCredit;
use App\Models\MemberDebit;
use App\Models\MemberRecovery;
use App\Models\PayMatrixBasic;
use App\Models\MemberCoreInfo;
use App\Models\MemberPersonalInfo;
use App\Models\Bank;
use App\Models\Loan;
use App\Models\MemberLoanInfo;
use App\Models\Policy;
use App\Models\MemberPolicyInfo;
use App\Models\MemberExpectation;
use App\Models\MemberOriginalRecovery;
use App\Models\ResetEmployeeId;
use App\Models\City;
use App\Models\DearnessAllowancePercentage;
use App\Models\GradePay;
use App\Models\Designation;
use App\Models\Hra;
use App\Models\Tpta;
use App\Models\IncomeTax;
use App\Models\MemberLeave;
use App\Models\MemberLoan;
use App\Models\LeaveType;
use App\Models\MemberGpf;
use App\Models\Cghs;
use App\Models\Rule;
use Illuminate\Support\Str;



class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Member::orderBy('id', 'desc')->with('designation')->paginate(10);
        return view('frontend.members.list', compact('members'));
    }

    public function fetchData(Request $request)
    {

        if ($request->ajax()) {

            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $members = Member::where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('id', 'like', '%' . $query . '%')
                    ->orWhere('pers_no', 'like', '%' . $query . '%')
                    ->orWhere('emp_id', 'like', '%' . $query . '%')
                    ->orWhere('gender', 'like', '%' . $query . '%')
                    ->orWhere('name', 'like', '%' . $query . '%')
                    ->orWhere('status', '=', $query == 'Active' ? 1 : ($query == 'Inactive' ? 0 : null));
            })
                ->orderBy($sort_by, $sort_type)
                ->paginate(10);

            return response()->json(['data' => view('frontend.members.table', compact('members'))->render()]);
        }
    }

    public function editMember()
    {
        return view('frontend.members.edit');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $paybands = PaybandType::orderBy('id', 'desc')->get();
        $categories = Category::orderBy('id', 'desc')->where('status', 1)->get();
        $pmLevels = PmLevel::orderBy('id', 'desc')->where('status', 1)->get();
        $pmIndexes = PmIndex::orderBy('id', 'desc')->where('status', 1)->get();
        $divisions = Division::orderBy('id', 'desc')->where('status', 1)->get();
        $groups = Group::orderBy('id', 'desc')->where('status', 1)->get();
        $cadres = Cadre::orderBy('id', 'desc')->where('status', 1)->get();
        // $designations = DesignationType::orderBy('id', 'desc')->get();
        $designations = Designation::orderBy('id', 'desc')->get();
        $fundTypes = FundType::orderBy('id', 'desc')->where('status', 1)->get();
        $quaters = Quater::orderBy('id', 'desc')->where('status', 1)->get();
        $exServices = ExService::orderBy('id', 'desc')->where('status', 1)->get();
        $pgs = Pg::orderBy('id', 'desc')->where('status', 1)->get();
        $cgegises = Cgegis::orderBy('id', 'desc')->where('status', 1)->get();
        $cities = City::orderBy('id', 'desc')->get();

        return view('frontend.members.form', compact('paybands', 'cities', 'categories', 'pmLevels', 'pmIndexes', 'divisions', 'groups', 'cadres', 'designations', 'fundTypes', 'quaters', 'exServices', 'pgs', 'cgegises'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'pers_no' => 'required|max:255',
            'gender' => 'required',
            'name' => 'required|max:255',
            'pm_level' => 'required',
            'pm_index' => 'required',
            'basic' => 'required',
            'desig' => 'required',
            'division' => 'required',
            'group' => 'required',
            'cadre' => 'required',
            'category_id' => 'required',
            'status' => 'required',
            'old_bp' => 'required',
            'g_pay_val' => 'required',
            'fund_type' => 'required',
            'dob' => 'required|date',
            'doj_lab' => 'required|date',
            'adhar_number' => 'required',
            'app_date' => 'required',
            'pran_number' => 'required',
            'e_status' => 'required',
        ]);

        //check employee id 
        $employeeIdText = ResetEmployeeId::where('status', 1)->first();
        $latest_member = Member::latest()->first();

        $constantString = $employeeIdText->employee_id_text ?? 'RCI-CHESS-EMP-';
        if (isset($latest_member)) {
            $serial_no = Str::substr($latest_member->emp_id, -1);
            $counter = $serial_no + 1;
            // dd($serial_no);
        } else {
            $counter = 1;
        }

        // store data
        $member = new Member();
        $member->e_status = $request->e_status;
        $member->pers_no = $request->pers_no;
        $member->name = $request->name;
        $member->emp_id = $constantString . $counter++;
        $member->gender = $request->gender;
        $member->pm_level = $request->pm_level;
        $member->pm_index = $request->pm_index;
        $member->basic = $request->basic;
        $member->desig = $request->desig;
        $member->division = $request->division;
        $member->group = $request->group;
        $member->cadre = $request->cadre;
        $member->category = $request->category_id;
        $member->status = $request->status;
        $member->old_bp = $request->old_bp;
        $member->g_pay = $request->g_pay_val;
        $member->pay_band = $request->pay_band_id;
        $member->fund_type = $request->fund_type;
        $member->dob = $request->dob;
        $member->doj_lab = $request->doj_lab;
        $member->doj_service1 = $request->doj_service1;
        $member->adhar_number = $request->adhar_number;
        $member->gpf_number = $request->gpf_number;
        $member->app_date = $request->app_date;
        $member->dop = $request->dop;
        $member->next_inr = $request->next_inr;
        $member->quater = $request->quater;
        $member->quater_no = $request->quater_no;
        $member->doj_service2 = $request->doj_service2;
        $member->cgeis = $request->cgeis;
        $member->ex_service = $request->ex_service;
        $member->pg = $request->pg;
        $member->cgegis = $request->cgegis;
        $member->pay_stop = $request->pay_stop;
        $member->pis = $request->pis;
        $member->pis_address = $request->pis_address;
        $member->sos = $request->sos;
        $member->sos_address = $request->sos_address;
        $member->member_city = $request->member_city;
        $member->rent_or_not = $request->rent_or_not;
        $member->pran_number = $request->pran_number;
        $member->member_status = 1;
        $member->save();

        session()->flash('message', 'Member added successfully');
        return response()->json(['success' => 'Member added successfully']);
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
        $member = Member::with('designation', 'divisions', 'groups')->where('id', $id)->with('cgegisVal', 'gPay')->first();
        $member_credit = MemberCredit::where('member_id', $id)->orderBy('id', 'desc')->first() ?? '';
        $member_debit = MemberDebit::where('member_id', $id)->orderBy('id', 'desc')->first() ?? '';
        $member_recovery = MemberRecovery::where('member_id', $id)->orderBy('id', 'desc')->first() ?? '';
        $member_core = MemberCoreInfo::where('member_id', $id)->orderBy('id', 'desc')->first() ?? '';
        $member_personal = MemberPersonalInfo::where('member_id', $id)->orderBy('id', 'desc')->first() ?? '';
        $member_policies = MemberPolicyInfo::where('member_id', $id)->orderBy('id', 'desc')->get() ?? '';
        $member_expectations = MemberExpectation::where('member_id', $id)->orderBy('id', 'desc')->get() ?? '';
        $member_cghs = Cghs::where('pay_level_id', $member->pm_level)->orderBy('id', 'desc')->first() ?? '';
        $paybands = PaybandType::orderBy('id', 'desc')->get() ?? '';
        $categories = Category::orderBy('id', 'desc')->where('status', 1)->get() ?? '';
        $pmLevels = PmLevel::orderBy('id', 'desc')->where('status', 1)->get() ?? '';
        $pmIndexes = PmIndex::orderBy('id', 'desc')->where('status', 1)->get() ?? '';
        $divisions = Division::orderBy('id', 'desc')->where('status', 1)->get() ?? '';
        $groups = Group::orderBy('id', 'desc')->where('status', 1)->get() ?? '';
        $cadres = Cadre::orderBy('id', 'desc')->where('status', 1)->get() ?? '';
        $designations = Designation::orderBy('id', 'desc')->get() ?? '';
        $fundTypes = FundType::orderBy('id', 'desc')->where('status', 1)->get() ?? '';
        $quaters = Quater::orderBy('id', 'desc')->where('status', 1)->get() ?? '';
        $exServices = ExService::orderBy('id', 'desc')->where('status', 1)->get() ?? '';
        $pgs = Pg::orderBy('id', 'desc')->where('status', 1)->get() ?? '';
        $cgegises = Cgegis::orderBy('id', 'desc')->where('status', 1)->get() ?? '';
        $banks = Bank::orderBy('id', 'desc')->get() ?? '';
        $loans = Loan::orderBy('id', 'desc')->get() ?? '';
        $policies = Policy::orderBy('id', 'desc')->get() ?? '';
        $daPercentage = DearnessAllowancePercentage::where('is_active', 1)->get() ?? '';
        $memberGpf = MemberGpf::where('member_id', $id)->orderBy('id', 'desc')->first() ?? '';
        $rules = Rule::orderBy('id','desc')->get() ?? '';

        $members_loans_info = MemberLoanInfo::where('member_id', $id)->orderBy('id', 'desc')->get();
        $member_original_recovery = MemberOriginalRecovery::where('member_id', $id)->latest()->first() ?? '';

        $member_var_info = PmLevel::where('id', $member->pm_level)->select('var_incr', 'noi')->first() ?? '';

        $check_hba = MemberLoanInfo::where('member_id', $id)->first() ?? '';

        return view('frontend.members.edit', compact('member', 'member_credit', 'member_debit', 'member_recovery', 'banks', 'member_core', 'member_personal', 'cadres', 'exServices', 'paybands', 'quaters', 'pgs', 'pmLevels', 'designations', 'pmIndexes', 'cgegises', 'categories', 'loans', 'members_loans_info', 'policies', 'member_policies', 'member_expectations', 'member_original_recovery','member_cghs','memberGpf', 'daPercentage', 'check_hba', 'member_var_info','rules'));
    }

    public function memberCreditUpdate(Request $request)
    {
        //validation 
        // $validated = $request->validate([
        //     'pay' => 'required',
        //     // 'da' => 'required',
        //     // 'tpt' => 'required',
        //     // 'cr_rent' => 'required',
        //     // 'g_pay' => 'required',
        //     // 'hra' => 'required',
        //     // 'da_on_tpt' => 'required',
        //     // 'cr_elec' => 'required',
        //     // 'fpa' => 'required',
        //     // 's_pay' => 'required',
        //     // 'hindi' => 'required',
        //     // 'cr_water' => 'required',
        //     // 'add_inc2' => 'required',
        //     // 'npa' => 'required',
        //     // 'deptn_alw' => 'required',
        //     // 'misc_1' => 'required',
        //     // 'var_incr' => 'required',
        //     // 'wash_alw' => 'required',
        //     // 'dis_alw' => 'required',
        //     // 'misc_2' => 'required',
        //     // 'risk_alw' => 'required',
        //     // 'tot_credits' => 'required',
        //     // 'remarks' => 'required',
        // ]);
        $inputs = $request->all();
        $rules = [];
        $requiredField = 'pay';
        $nonNumericField = 'remarks';

        // if (array_key_exists($requiredField, $inputs)) {
        //     $rules[$requiredField] = 'required|numeric';
        // }

        foreach ($inputs as $field => $value) {
            if ($field === $nonNumericField) {
                $rules[$field] = 'string';
            } elseif ($field !== $requiredField) {
                $rules[$field] = 'numeric';
            }
        }


        $check_credit_member = MemberCredit::where('member_id', $request->member_id)
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->get();

        if (count($check_credit_member) > 0) {
            $update_credit_member = MemberCredit::where('member_id', $request->member_id)->whereMonth('created_at', now()->month)->whereYear('created_at',now()->year)->first();
            $update_credit_member->pay = $request->pay;
            $update_credit_member->da = $request->da;
            $update_credit_member->tpt = $request->tpt;
            $update_credit_member->cr_rent = $request->cr_rent;
            $update_credit_member->g_pay = $request->g_pay;
            $update_credit_member->hra = $request->hra;
            $update_credit_member->da_on_tpt = $request->da_on_tpt;
            $update_credit_member->cr_elec = $request->cr_elec;
            $update_credit_member->fpa = $request->fpa;
            $update_credit_member->s_pay = $request->s_pay;
            $update_credit_member->pua = $request->pua;
            $update_credit_member->hindi = $request->hindi;
            $update_credit_member->cr_water = $request->cr_water;
            $update_credit_member->add_inc2 = $request->add_inc2;
            $update_credit_member->npa = $request->npa;
            $update_credit_member->deptn_alw = $request->deptn_alw;
            $update_credit_member->misc1 = $request->misc_1;
            $update_credit_member->var_incr = $request->var_incr;
            $update_credit_member->wash_alw = $request->wash_alw;
            $update_credit_member->dis_alw = $request->dis_alw;
            $update_credit_member->misc2 = $request->misc_2;
            $update_credit_member->risk_alw = $request->risk_alw;
            $update_credit_member->spl_incentive = $request->spl_incentive;
            $update_credit_member->incentive = $request->incentive;
            $update_credit_member->variable_amount = $request->var_amount;
            $update_credit_member->arrs_pay_alw = $request->arrs_pay_allowance;
            $update_credit_member->tot_credits = $request->tot_credits;
            $update_credit_member->remarks = $request->remarks;
            $update_credit_member->update();


           
            // session()->flash('message', 'Member credit updated successfully');
            return response()->json(['message' => 'Member credit updated successfully']);
        } else {
            $member_credit = new MemberCredit();
            $member_credit->member_id = $request->member_id;
            $member_credit->pay = $request->pay;
            $member_credit->da = $request->da;
            $member_credit->tpt = $request->tpt;
            $member_credit->cr_rent = $request->cr_rent;
            $member_credit->g_pay = $request->g_pay;
            $member_credit->hra = $request->hra;
            $member_credit->da_on_tpt = $request->da_on_tpt;
            $member_credit->cr_elec = $request->cr_elec;
            $member_credit->fpa = $request->fpa;
            $member_credit->s_pay = $request->s_pay;
            $member_credit->pua = $request->pua;
            $member_credit->hindi = $request->hindi;
            $member_credit->cr_water = $request->cr_water;
            $member_credit->add_inc2 = $request->add_inc2;
            $member_credit->npa = $request->npa;
            $member_credit->deptn_alw = $request->deptn_alw;
            $member_credit->misc1 = $request->misc_1;
            $member_credit->var_incr = $request->var_incr;
            $member_credit->wash_alw = $request->wash_alw;
            $member_credit->dis_alw = $request->dis_alw;
            $member_credit->misc2 = $request->misc_2;
            $member_credit->risk_alw = $request->risk_alw;
            $member_credit->spl_incentive = $request->spl_incentive;
            $member_credit->incentive = $request->incentive;
            $member_credit->variable_amount = $request->var_amount;
            $member_credit->arrs_pay_alw = $request->arrs_pay_allowance;
            $member_credit->tot_credits = $request->tot_credits;
            $member_credit->remarks = $request->remarks;
            $member_credit->save();


            // session()->flash('message', 'Member credit added successfully');
            return response()->json(['message' => 'Member credit added successfully']);
        }
    }

    public function memberCheckCreditAvailability(Request $request)
    {
        $check_credit_member = MemberCredit::where('member_id', $request->memberID)->whereMonth('created_at', now()->month)->whereYear('created_at', now()->year)->get();
        if (count($check_credit_member) > 0) {
            return response()->json(['message' => 'Member credit already added', 'status' => 'success']);
        } else {
            return response()->json(['message' => 'Credit member addition is required.', 'status' => 'error']);
        }
    }

    

    public function memberDebitUpdate(Request $request)
    {
        //validation 
        // $validated = $request->validate([
        //     'gpa_sub' => 'required',
        //     'eol' => 'required',
        //     'rent' => 'required',
        //     'lf_arr' => 'required',
        //     'tada' => 'required',
        //     'hba' => 'required',
        //     'misc1' => 'required',
        //     'gpf_rec' => 'required',
        //     'i_tax' => 'required',
        //     'elec' => 'required',
        //     'elec_arr' => 'required',
        //     'medi' => 'required',
        //     'pc' => 'required',
        //     'misc2' => 'required',
        //     'gpf_arr' => 'required',
        //     'ecess' => 'required',
        //     'water' => 'required',
        //     'water_arr' => 'required',
        //     'ltc' => 'required',
        //     'fadv' => 'required',
        //     'misc3' => 'required',
        //     'cgegis' => 'required',
        //     'cda' => 'required',
        //     'furn' => 'required',
        //     'furn_arr' => 'required',
        //     'car' => 'required',
        //     'hra_rec' => 'required',
        //     'tot_debits' => 'required',
        //     'cghs' => 'required',
        //     'ptax' => 'required',
        //     'cmg' => 'required',
        //     'pli' => 'required',
        //     'scooter' => 'required',
        //     'tpt_rec' => 'required',
        //     'net_pay' => 'required',
        //     'basics' => 'required',
        //     'remarks' => 'required',
        // ]);

        // $inputs = $request->all();
        // $rules = [];

        // foreach ($inputs as $field => $value) {
        //     // Apply numeric validation to each field
        //     $rules[$field] = 'numeric';
        // }
        // $request->validate($rules);


        $check_debit_member = MemberDebit::where('member_id', $request->member_id)->whereMonth('created_at', now()->month)->whereYear('created_at', now()->year)->get();
        if (count($check_debit_member) > 0) {
            $update_debit_member = MemberDebit::where('member_id', $request->member_id)->whereMonth('created_at', now()->month)->whereYear('created_at',now()->year)->first();
            $update_debit_member->gpa_sub = $request->gpa_sub;
            $update_debit_member->eol = $request->eol;
            $update_debit_member->ccl = $request->ccl;
            $update_debit_member->rent = $request->rent;
            $update_debit_member->lf_arr = $request->lf_arr;
            $update_debit_member->tada = $request->tada;
            $update_debit_member->hba = $request->hba;
            $update_debit_member->misc1 = $request->misc1;
            $update_debit_member->gpf_rec = $request->gpf_rec;
            $update_debit_member->i_tax = $request->i_tax;
            $update_debit_member->elec = $request->elec;
            $update_debit_member->elec_arr = $request->elec_arr;
            $update_debit_member->medi = $request->medi;
            $update_debit_member->pc = $request->pc;
            $update_debit_member->misc2 = $request->misc2;
            $update_debit_member->gpf_arr = $request->gpf_arr;
            $update_debit_member->ecess = $request->ecess;
            $update_debit_member->water = $request->water;
            $update_debit_member->water_arr = $request->water_arr;
            $update_debit_member->ltc = $request->ltc;
            $update_debit_member->fadv = $request->fadv;
            $update_debit_member->misc3 = $request->misc3;
            $update_debit_member->cgegis = $request->cgegis;
            $update_debit_member->cda = $request->cda;
            $update_debit_member->furn = $request->furn;
            $update_debit_member->furn_arr = $request->furn_arr;
            $update_debit_member->car = $request->car;
            $update_debit_member->hra_rec = $request->hra_rec;
            $update_debit_member->tot_debits = $request->tot_debits;
            $update_debit_member->cghs = $request->cghs;
            $update_debit_member->ptax = $request->ptax;
            $update_debit_member->cmg = $request->cmg;
            $update_debit_member->pli = $request->pli;
            $update_debit_member->scooter = $request->scooter;
            $update_debit_member->tpt_rec = $request->tpt_rec;
            $update_debit_member->net_pay = $request->net_pay;
            $update_debit_member->basic = $request->basics;
            $update_debit_member->gpf_adv = $request->gpa_adv;
            $update_debit_member->hba_int = $request->hba_interest;
            $update_debit_member->comp_adv = $request->comp_adv;
            $update_debit_member->comp_int = $request->comp_int;
            $update_debit_member->leave_rec = $request->leave_rec;
            $update_debit_member->pension_rec = $request->pension_rec;
            $update_debit_member->car_int = $request->car_interest;
            $update_debit_member->sco_int = $request->scooter_interest;
            $update_debit_member->quarter_charges = $request->quarter_charge;
            $update_debit_member->cgeis_arr = $request->cgeis_arr;
            $update_debit_member->penal_intr = $request->penal_interest;
            $update_debit_member->society = $request->society;
            $update_debit_member->arrear_pay = $request->arrear_pay;
            $update_debit_member->npsg = $request->npsg;
            $update_debit_member->npsg_arr = $request->npsg_arr;
            $update_debit_member->npsg_adj = $request->npsg_adj;
            $update_debit_member->hba_cur_instl = $request->hba_cur_instl;
            $update_debit_member->hba_total_instl = $request->hba_total_instl;
            $update_debit_member->hba_int_cur_instl = $request->hba_int_cur_instl;
            $update_debit_member->hba_int_total_instl = $request->hba_int_total_instl;
            $update_debit_member->car_adv_prin_instl = $request->car_adv_prin_instl;
            $update_debit_member->car_adv_total_instl = $request->car_adv_total_instl;
            $update_debit_member->scot_adv_prin_instl = $request->scot_adv_prin_instl;
            $update_debit_member->sco_adv_int_curr_instl = $request->sco_adv_int_curr_instl;
            $update_debit_member->sco_adv_int_total_instl = $request->sco_adv_int_total_instl;
            $update_debit_member->comp_prin_curr_instl = $request->comp_prin_curr_instl;
            $update_debit_member->comp_prin_total_instl = $request->comp_prin_total_instl;
            $update_debit_member->comp_adv_int = $request->comp_adv_int;
            $update_debit_member->comp_int_curr_instl = $request->comp_int_curr_instl;
            $update_debit_member->comp_int_total_instl = $request->comp_int_total_instl;
            $update_debit_member->fest_adv_prin_cur = $request->fest_adv_prin_cur;
            $update_debit_member->fest_adv_total_cur = $request->fest_adv_total_cur;
            $update_debit_member->ltc_rec = $request->ltc_rec;
            $update_debit_member->medical_rec = $request->medical_rec;
            $update_debit_member->tada_rec = $request->tada_rec;
            $update_debit_member->remarks = $request->remarks;
            $update_debit_member->update();

            // session()->flash('message', 'Member debit updated successfully');
            return response()->json(['message' => 'Member debit updated successfully']);
        } else {

            $found_credit = MemberCredit::where('member_id', $request->member_id)->first();

            $debit_member = new MemberDebit();
            $debit_member->member_id = $request->member_id;
            $debit_member->gpa_sub = $request->gpa_sub;
            $debit_member->eol = $request->eol;
            $debit_member->ccl = $request->ccl;
            $debit_member->rent = $request->rent;
            $debit_member->lf_arr = $request->lf_arr;
            $debit_member->tada = $request->tada;
            $debit_member->hba = $request->hba;
            $debit_member->misc1 = $request->misc1;
            $debit_member->gpf_rec = $request->gpf_rec;
            $debit_member->i_tax = $request->i_tax;
            $debit_member->elec = $request->elec;
            $debit_member->elec_arr = $request->elec_arr;
            $debit_member->medi = $request->medi;
            $debit_member->pc = $request->pc;
            $debit_member->misc2 = $request->misc2;
            $debit_member->gpf_arr = $request->gpf_arr;
            $debit_member->ecess = $request->ecess;
            $debit_member->water = $request->water;
            $debit_member->water_arr = $request->water_arr;
            $debit_member->ltc = $request->ltc;
            $debit_member->fadv = $request->fadv;
            $debit_member->misc3 = $request->misc3;
            $debit_member->cgegis = $request->cgegis;
            $debit_member->cda = $request->cda;
            $debit_member->furn = $request->furn;
            $debit_member->furn_arr = $request->furn_arr;
            $debit_member->car = $request->car;
            $debit_member->hra_rec = $request->hra_rec;
            $debit_member->tot_debits = $request->tot_debits;
            $debit_member->cghs = $request->cghs;
            $debit_member->ptax = $request->ptax;
            $debit_member->cmg = $request->cmg;
            $debit_member->pli = $request->pli;
            $debit_member->scooter = $request->scooter;
            $debit_member->tpt_rec = $request->tpt_rec;
            $debit_member->net_pay = $request->net_pay;
            $debit_member->basic = $request->basic;
            $debit_member->gpf_adv = $request->gpa_adv;
            $debit_member->hba_int = $request->hba_interest;
            $debit_member->comp_adv = $request->comp_adv;
            $debit_member->comp_int = $request->comp_int;
            $debit_member->leave_rec = $request->leave_rec;
            $debit_member->pension_rec = $request->pension_rec;
            $debit_member->car_int = $request->car_interest;
            $debit_member->sco_int = $request->scooter_interest;
            $debit_member->quarter_charges = $request->quarter_charge;
            $debit_member->cgeis_arr = $request->cgeis_arr;
            $debit_member->penal_intr = $request->penal_interest;
            $debit_member->society = $request->society;
            $debit_member->arrear_pay = $request->arrear_pay;
            $debit_member->npsg = $request->npsg;
            $debit_member->npsg_arr = $request->npsg_arr;
            $debit_member->npsg_adj = $request->npsg_adj;
            $debit_member->hba_cur_instl = $request->hba_cur_instl;
            $debit_member->hba_total_instl = $request->hba_total_instl;
            $debit_member->hba_int_cur_instl = $request->hba_int_cur_instl;
            $debit_member->hba_int_total_instl = $request->hba_int_total_instl;
            $debit_member->car_adv_prin_instl = $request->car_adv_prin_instl;
            $debit_member->car_adv_total_instl = $request->car_adv_total_instl;
            $debit_member->scot_adv_prin_instl = $request->scot_adv_prin_instl;
            $debit_member->sco_adv_int_curr_instl = $request->sco_adv_int_curr_instl;
            $debit_member->sco_adv_int_total_instl = $request->sco_adv_int_total_instl;
            $debit_member->comp_prin_curr_instl = $request->comp_prin_curr_instl;
            $debit_member->comp_prin_total_instl = $request->comp_prin_total_instl;
            $debit_member->comp_adv_int = $request->comp_adv_int;
            $debit_member->comp_int_curr_instl = $request->comp_int_curr_instl;
            $debit_member->comp_int_total_instl = $request->comp_int_total_instl;
            $debit_member->fest_adv_prin_cur = $request->fest_adv_prin_cur;
            $debit_member->fest_adv_total_cur = $request->fest_adv_total_cur;
            $debit_member->ltc_rec = $request->ltc_rec;
            $debit_member->medical_rec = $request->medical_rec;
            $debit_member->tada_rec = $request->tada_rec;
            $debit_member->remarks = $request->remarks;

            $debit_member->save();

            // session()->flash('message', 'Member debit added successfully');
            return response()->json(['message' => 'Member debit added successfully']);
        }
    }

    public function memberRecoveryOriginalUpdate(Request $request)
    {
        
        $check_original_recovery_member = MemberOriginalRecovery::where('member_id', $request->member_id)->whereMonth('created_at', now()->month)->whereYear('created_at', now()->year)->get();
        if (count($check_original_recovery_member) > 0) {
            $update_recovery_org_member = MemberOriginalRecovery::where('member_id', $request->member_id)->whereMonth('created_at', now()->month)->whereYear('created_at',now()->year)->first();
            $update_recovery_org_member->ccs_sub = $request->ccs_sub;
            $update_recovery_org_member->mess = $request->mess;
            $update_recovery_org_member->security = $request->security;
            $update_recovery_org_member->misc1 = $request->misc1;
            $update_recovery_org_member->ccs_rec = $request->ccs_rec;
            $update_recovery_org_member->asso_fee = $request->asso_fee;
            $update_recovery_org_member->dbf = $request->dbf;
            $update_recovery_org_member->misc2 = $request->misc2;
            $update_recovery_org_member->wel_sub = $request->wel_sub;
            $update_recovery_org_member->ben = $request->ben;
            $update_recovery_org_member->med_ins = $request->med_ins;
            $update_recovery_org_member->tot_rec = $request->tot_rec;
            $update_recovery_org_member->wel_rec = $request->wel_rec;
            $update_recovery_org_member->hdfc = $request->hdfc;
            $update_recovery_org_member->maf = $request->maf;
            $update_recovery_org_member->final_pay = $request->final_pay;
            $update_recovery_org_member->lic = $request->lic;
            $update_recovery_org_member->cort_atch = $request->cort_atch;
            $update_recovery_org_member->ogpf = $request->ogpf;
            $update_recovery_org_member->ntp = $request->ntp;
            $update_recovery_org_member->remarks = $request->remarks;
            $update_recovery_org_member->update();

            // session()->flash('message', 'Member debit updated successfully');
            return response()->json(['message' => 'Member recovery updated successfully']);
        } else {

            $recovery_org_member = new MemberOriginalRecovery();
            $recovery_org_member->member_id = $request->member_id;
            $recovery_org_member->ccs_sub = $request->ccs_sub;
            $recovery_org_member->mess = $request->mess;
            $recovery_org_member->security = $request->security;
            $recovery_org_member->misc1 = $request->misc1;
            $recovery_org_member->ccs_rec = $request->ccs_rec;
            $recovery_org_member->asso_fee = $request->asso_fee;
            $recovery_org_member->dbf = $request->dbf;
            $recovery_org_member->misc2 = $request->misc2;
            $recovery_org_member->wel_sub = $request->wel_sub;
            $recovery_org_member->ben = $request->ben;
            $recovery_org_member->med_ins = $request->med_ins;
            $recovery_org_member->tot_rec = $request->tot_rec;
            $recovery_org_member->wel_rec = $request->wel_rec;
            $recovery_org_member->hdfc = $request->hdfc;
            $recovery_org_member->maf = $request->maf;
            $recovery_org_member->final_pay = $request->final_pay;
            $recovery_org_member->lic = $request->lic;
            $recovery_org_member->cort_atch = $request->cort_atch;
            $recovery_org_member->ogpf = $request->ogpf;
            $recovery_org_member->ntp = $request->ntp;
            $recovery_org_member->remarks = $request->remarks;
            $recovery_org_member->save();

            // session()->flash('message', 'Member debit added successfully');
            return response()->json(['message' => 'Member recovery added successfully']);
        }
    }

    public function memberRecoveryUpdate(Request $request)
    {
        //validation 
        // $validated = $request->validate([
        //     'v_incr' => 'required',
        //     'noi' => 'required',
        //     'total' => 'required',
        //     'stop' => 'required',

        // ]);

        $check_recovery_member = MemberRecovery::where('member_id', $request->member_id)->get();
        if (count($check_recovery_member) > 0) {
            $update_recovery_member = MemberRecovery::where('member_id', $request->member_id)->first();
            $update_recovery_member->v_incr = $request->v_incr;
            $update_recovery_member->noi = $request->noi;
            $update_recovery_member->total = $request->total;
            $update_recovery_member->stop = $request->stop;
            $update_recovery_member->update();
        } else {
            $update_recovery_member = new MemberRecovery();
            $update_recovery_member->member_id = $request->member_id;
            $update_recovery_member->v_incr = $request->v_incr;
            $update_recovery_member->noi = $request->noi;
            $update_recovery_member->total = $request->total;
            $update_recovery_member->stop = $request->stop;
            $update_recovery_member->save();
        }

        // session()->flash('message', 'Member recovery updated successfully');

        return response()->json(['message' => 'Member recovery updated successfully', 'data' => $update_recovery_member]);
    }
    public function memberRecoveryDelete($id)
    {

        $delete_recovery = MemberRecovery::where('id', $id)->first();
        $delete_recovery->delete();

        return response()->json(['message' => 'Member recovery deleted successfully']);
    }

    public function memberCoreInfoUpdate(Request $request)
    {
        //validation 
        // $validated = $request->validate([
        //     'bank_acc_no' => 'required',
        //     'ccs_mem_no' => 'required',
        //     'fpa' => 'required',
        //     'bank' => 'required',
        //     'gpf_sub' => 'required',
        //     'add2' => 'required',
        //     'gpf_acc_no' => 'required',
        //     'i_tax' => 'required',
        //     'pran_no' => 'required',
        //     'pan_no' => 'required',
        //     'ecess' => 'required',
        //     'ben_acc_no' => 'required',
        //     'dcmaf_no' => 'required',
        //     's_pay' => 'required',

        // ]);

        $check_core_member = MemberCoreInfo::where('member_id', $request->member_id)->get();
        if (count($check_core_member) > 0) {
            $update_core_member = MemberCoreInfo::where('member_id', $request->member_id)->first();
            $update_core_member->bank_acc_no = $request->bank_acc_no;
            $update_core_member->ccs_mem_no = $request->ccs_mem_no;
            $update_core_member->fpa = $request->fpa;
            $update_core_member->bank = $request->bank;
            $update_core_member->gpf_sub = $request->gpf_sub;
            $update_core_member->add2 = $request->add2;
            $update_core_member->gpf_acc_no = $request->gpf_acc_no;
            $update_core_member->i_tax = $request->i_tax;
            $update_core_member->pran_no = $request->pran_no;
            $update_core_member->pan_no = $request->pan_no;
            $update_core_member->ecess = $request->ecess;
            $update_core_member->ben_acc_no = $request->ben_acc_no;
            $update_core_member->dcmaf_no = $request->dcmaf_no;
            $update_core_member->s_pay = $request->s_pay;
            $update_core_member->ifsc = $request->ifsc;
            $update_core_member->update();
        } else {
            $core_member = new MemberCoreInfo();
            $core_member->member_id = $request->member_id;
            $core_member->bank_acc_no = $request->bank_acc_no;
            $core_member->ccs_mem_no = $request->ccs_mem_no;
            $core_member->fpa = $request->fpa;
            $core_member->bank = $request->bank;
            $core_member->gpf_sub = $request->gpf_sub;
            $core_member->add2 = $request->add2;
            $core_member->gpf_acc_no = $request->gpf_acc_no;
            $core_member->i_tax = $request->i_tax;
            $core_member->pran_no = $request->pran_no;
            $core_member->pan_no = $request->pan_no;
            $core_member->ecess = $request->ecess;
            $core_member->ben_acc_no = $request->ben_acc_no;
            $core_member->dcmaf_no = $request->dcmaf_no;
            $core_member->s_pay = $request->s_pay;
            $core_member->ifsc = $request->ifsc;
            $core_member->save();
        }

        // session()->flash('message', 'Member recovery updated successfully');
        return response()->json(['message' => 'Member recovery updated successfully']);
    }

    public function memberPersonalUpdate(Request $request)
    {
        //validation 
        // $validated = $request->validate([
        //     'basic' => 'required',
        //     'emp_id' => 'required',
        //     'g_pay' => 'required',
        //     'cadre' => 'required',
        //     'dob' => 'required',
        //     'next_inr' => 'required',
        //     'ex_service' => 'required',
        //     'payband' => 'required',
        //     'pm_level' => 'required',
        //     'gender' => 'required',
        //     'status' => 'required',
        //     'doj_lab' => 'required',
        //     'quater' => 'required',
        //     'ph' => 'required',
        //     'old_basic' => 'required',
        //     'pm_index' => 'required',
        //     'name' => 'required',
        //     'desig' => 'required',
        //     'category' => 'required',
        //     'doj_service' => 'required',
        //     'quater_no' => 'required',
        //     'dop' => 'required',
        //     'fund_type' => 'required',
        //     'cgegis' => 'required',
        //     'cgegis_text' => 'required',
        //     'pay_stop' => 'required'
        // ]);

        $check_personal_member = MemberPersonalInfo::where('member_id', $request->member_id)->get();
        if (count($check_personal_member) > 0) {
            $update_personal_member = MemberPersonalInfo::where('member_id', $request->member_id)->first();
            $update_personal_member->basic = $request->basic;
            $update_personal_member->emp_id = $request->emp_id;
            $update_personal_member->name = $request->name;
            $update_personal_member->g_pay = $request->g_pay;
            $update_personal_member->cadre = $request->cadre;
            $update_personal_member->dob = $request->dob;
            $update_personal_member->next_inr = $request->next_inr;
            $update_personal_member->ex_service = $request->ex_service;
            $update_personal_member->payband = $request->payband;
            $update_personal_member->pm_level = $request->pm_level;
            $update_personal_member->gender = $request->gender;
            $update_personal_member->status = $request->status;
            $update_personal_member->doj_lab = $request->doj_lab;
            $update_personal_member->quater = $request->quater;
            $update_personal_member->ph = $request->ph;
            $update_personal_member->old_basic = $request->old_basic;
            $update_personal_member->pm_index = $request->pm_index;
            $update_personal_member->desig = $request->desig;
            $update_personal_member->category = $request->category;
            $update_personal_member->doj_service = $request->doj_service;
            $update_personal_member->quater_no = $request->quater_no;
            $update_personal_member->dop = $request->dop;
            $update_personal_member->fund_type = $request->fund_type;
            $update_personal_member->cgegis = $request->cgegis;
            $update_personal_member->cgegis_text = $request->cgegis_text;
            $update_personal_member->pay_stop = $request->pay_stop;
            $update_personal_member->landline_no = $request->landline_no;
            $update_personal_member->mobile_no = $request->mobile_no;
            $update_personal_member->mobile_allowance = $request->mobile_allowance;
            $update_personal_member->broadband_allowance = $request->broadband_allowance;
            $update_personal_member->landline_allowance = $request->landline_allowance;
            $update_personal_member->cr_water = $request->cr_water;
            $update_personal_member->e_status = $request->e_status;
            $update_personal_member->update();

            //memebers details update
            $member_details = Member::where('id', $request->member_id)->first();
            $member_details->emp_id = $request->emp_id;
            $member_details->gender = $request->gender;
            $member_details->name = $request->name;
            $member_details->pm_level = $request->pm_level;
            $member_details->pm_index = $request->pm_index;
            $member_details->basic = $request->basic;
            $member_details->desig = $request->desig;
            $member_details->group = $request->group;
            $member_details->cadre = $request->cadre;
            $member_details->category = $request->category;
            $member_details->status = $request->status;
            $member_details->g_pay = $request->g_pay;
            $member_details->fund_type = $request->fund_type;
            $member_details->dob = $request->dob;
            $member_details->doj_lab = $request->doj_lab;
            $member_details->dop = $request->dop;
            $member_details->next_inr = $request->next_inr;
            $member_details->quater = $request->quater;
            $member_details->quater_no = $request->quater_no;
            $member_details->ex_service = $request->ex_service;
            $member_details->cgegis = $request->cgegis;

            $member_details->pay_stop = $request->pay_stop;
            $member_details->e_status = $request->e_status;
            $member_details->update();

            // session()->flash('message', 'Member personal info updated successfully');
            return response()->json(['message' => 'Member personal info updated successfully']);
        } else {

            $personal_member = new MemberPersonalInfo();
            $personal_member->member_id = $request->member_id;
            $personal_member->basic = $request->basic;
            $personal_member->emp_id = $request->emp_id;
            $personal_member->name = $request->name;
            $personal_member->g_pay = $request->g_pay;
            $personal_member->cadre = $request->cadre;
            $personal_member->dob = $request->dob;
            $personal_member->next_inr = $request->next_inr;
            $personal_member->ex_service = $request->ex_service;
            $personal_member->payband = $request->payband;
            $personal_member->pm_level = $request->pm_level;
            $personal_member->gender = $request->gender;
            $personal_member->status = $request->status;
            $personal_member->doj_lab = $request->doj_lab;
            $personal_member->quater = $request->quater;
            $personal_member->ph = $request->ph;
            $personal_member->old_basic = $request->old_basic;
            $personal_member->pm_index = $request->pm_index;
            $personal_member->desig = $request->desig;
            $personal_member->category = $request->category;
            $personal_member->doj_service = $request->doj_service;
            $personal_member->quater_no = $request->quater_no;
            $personal_member->dop = $request->dop;
            $personal_member->fund_type = $request->fund_type;
            $personal_member->cgegis = $request->cgegis;
            $personal_member->cgegis_text = $request->cgegis_text;
            $personal_member->pay_stop = $request->pay_stop;
            $personal_member->landline_no = $request->landline_no;
            $personal_member->mobile_no = $request->mobile_no;
            $personal_member->mobile_allowance = $request->mobile_allowance;
            $personal_member->broadband_allowance = $request->broadband_allowance;
            $personal_member->landline_allowance = $request->landline_allowance;
            $personal_member->cr_water = $request->cr_water;
            $personal_member->e_status = $request->e_status;
            $personal_member->save();


            // session()->flash('message', 'Member personal info added successfully');  
            return response()->json(['message' => 'Member personal info added successfully']);
        }
    }

    public function memberLoanInfoStore(Request $request)
    {
        $loan_detail = Loan::where('id', $request->loan_name)->first() ?? '';

        $loan_info = new MemberLoanInfo;
        $loan_info->member_id = $request->member_id;
        $loan_info->loan_id = $request->loan_name;
        $loan_info->loan_name = $loan_detail->loan_name;
        $loan_info->present_inst_no = $request->present_inst_no;
        $loan_info->tot_no_of_inst = $request->tot_no_of_inst;
        $loan_info->inst_amount = $request->inst_amount;
        $loan_info->inst_rate = $request->inst_rate;
        $loan_info->total_amount = $request->total_amount;
        $loan_info->balance = $request->balance;
        $loan_info->penal_inst_rate = $request->penal_inst_rate;
        $loan_info->start_date = $request->start_date;
        $loan_info->end_date = $request->end_date;
        $loan_info->remark = $request->remark;
        $loan_info->save();

        $startDate = new \DateTime($request->start_date);
        $endDate = new \DateTime($request->end_date);
        $interval = $startDate->diff($endDate);
        $totalMonths = ($interval->y * 12) + $interval->m;
        
        // Creating a monthly interval
        $monthInterval = new \DateInterval('P1M');
        $endDate->modify('+1 day'); // To include the end date in the period
        $period = new \DatePeriod($startDate, $monthInterval, $endDate);
        
        $totalAmount = $request->total_amount; // Principal amount
        $annualRate = $request->inst_rate; // Annual interest rate
        $monthlyRate = $annualRate / 12 / 100; // Monthly interest rate
        
        // EMI Calculation using the corrected monthly interest rate
        $emiAmount = $totalAmount * $monthlyRate * pow(1 + $monthlyRate, $totalMonths) / (pow(1 + $monthlyRate, $totalMonths) - 1);
        
        // Monthly interest for the first month
        $monthlyInterest = $totalAmount * $monthlyRate;
        foreach ($period as $date) {
            $loanInstallment = new MemberLoan();
            $loanInstallment->member_id = $request->member_id;
            $loanInstallment->loan_id = $request->loan_name;
            $loanInstallment->interest_rate = $annualRate;
            $loanInstallment->emi_amount = $emiAmount;
            $loanInstallment->interest_amount = $monthlyInterest; // Update this logic if interest changes monthly
            $loanInstallment->emi_month = $date->format('F Y');
            $loanInstallment->emi_date = $date->format('Y-m-d');
            $loanInstallment->penal_interest = ''; // Handle penal interest logic if needed
            $loanInstallment->save();
        }
        
        return response()->json(['message' => 'Member loan info added successfully', 'data' => $loan_info]);
    }

    public function memberLoanEdit($id)
    {

        $member_loan = MemberLoanInfo::find($id);
        $edit = true;
        $loans = Loan::orderBy('id', 'desc')->get();
        return response()->json(['view' => view('frontend.members.loan.form', compact('edit', 'member_loan', 'loans'))->render()]);
    }

    public function memberLoanUpdate(Request $request)
    {
        $validated = $request->validate([
            'loan_name' => 'required',
            'present_inst_no' => 'required',
            'total_amount' => 'required',
        ]);

        if (!isset($request->member_loan_id)) {
            $loan_detail = Loan::where('id', $request->loan_name)->first() ?? '';
            $loan_info = new MemberLoanInfo;
            $loan_info->member_id = $request->member_id;
            $loan_info->loan_id = $request->loan_name;
            $loan_info->loan_name = $loan_detail->loan_name;
            $loan_info->present_inst_no = $request->present_inst_no;
            $loan_info->tot_no_of_inst = $request->tot_no_of_inst;
            $loan_info->inst_amount = $request->inst_amount;
            $loan_info->inst_rate = $request->inst_rate;
            $loan_info->total_amount = $request->total_amount;
            $loan_info->balance = $request->balance;
            $loan_info->penal_inst_rate = $request->penal_inst_rate;
            $loan_info->start_date = $request->start_date;
            $loan_info->end_date = $request->end_date;
            $loan_info->remark = $request->remark;
            $loan_info->save();

            return response()->json(['message' => 'Member loan info added successfully', 'data' => $loan_info, 'save' => true]);
        }

        $loan_detail = Loan::where('id', $request->loan_name)->first() ?? '';
        $loan_info = MemberLoanInfo::where('id', $request->member_loan_id)->first();
        $loan_info->loan_id = $request->loan_name;
        $loan_info->loan_name = $loan_detail->loan_name;
        $loan_info->present_inst_no = $request->present_inst_no;
        $loan_info->tot_no_of_inst = $request->tot_no_of_inst;
        $loan_info->inst_amount = $request->inst_amount;
        $loan_info->inst_rate = $request->inst_rate;
        $loan_info->total_amount = $request->total_amount;
        $loan_info->balance = $request->balance;
        $loan_info->penal_inst_rate = $request->penal_inst_rate;
        $loan_info->start_date = $request->start_date;
        $loan_info->end_date = $request->end_date;
        $loan_info->remark = $request->remark;
        $loan_info->update();

        return response()->json(['message' => 'Member loan info updated successfully', 'data' => $loan_info]);
    }

    public function memberLoanDelete($id)
    {
        $delete_loan = MemberLoanInfo::where('id', $id)->first();
        $delete_loan->delete();

        return response()->json(['message' => 'Member loan deleted successfully']);
    }

    public function memberPolicyInfoStore(Request $request)
    {

        $policy_store = new MemberPolicyInfo;
        $policy_store->member_id = $request->member_id;
        $policy_store->policy_name = $request->policy_name;
        $policy_store->policy_no = $request->policy_no;
        $policy_store->amount = $request->amount;
        $policy_store->rec_stop = $request->rec_stop;
        $policy_store->save();

        return response()->json(['message' => 'Member policy info added successfully', 'data' => $policy_store]);
    }

    public function memberPolicyInfoEdit($id)
    {

        $member_policy = MemberPolicyInfo::find($id);
        $edit = true;
        $policies = Policy::orderBy('id', 'desc')->get();
        return response()->json(['view' => view('frontend.members.policy-info.form', compact('edit', 'member_policy', 'policies'))->render()]);
    }

    public function memberPolicyInfoUpdate(Request $request)
    {
        $validated = $request->validate([
            'policy_name' => 'required',
            'policy_no' => 'required',
            'amount' => 'required',
        ]);

        if (!isset($request->member_policy_id)) {
            $policy_info = new MemberPolicyInfo;
            $policy_info->member_id = $request->member_id;
            $policy_info->policy_name = $request->policy_name;
            $policy_info->policy_no = $request->policy_no;
            $policy_info->amount = $request->amount;
            $policy_info->rec_stop = $request->rec_stop;
            $policy_info->save();

            return response()->json(['message' => 'Member policy info added successfully', 'data' => $policy_info, 'save' => true]);
        }

        $policy_info = MemberPolicyInfo::where('id', $request->member_policy_id)->first();
        $policy_info->policy_name = $request->policy_name;
        $policy_info->policy_no = $request->policy_no;
        $policy_info->amount = $request->amount;
        $policy_info->rec_stop = $request->rec_stop;
        $policy_info->update();

        return response()->json(['message' => 'Member policy info updated successfully', 'data' => $policy_info]);
    }

    public function memberPolicyInfoDelete($id)
    {

        $delete_policy = MemberPolicyInfo::where('id', $id)->first();
        $delete_policy->delete();

        return response()->json(['message' => 'Member policy deleted successfully']);
    }

    public function memberExpectationStore(Request $request)
    {
        $validated = $request->validate([
            'rule_name' => 'required',
            'percent' => 'required',
            'amount' => 'required',
        ]);

        $selectedValue = $request->rule_name; 
        $data = explode(',', $selectedValue);
        $rule_name = $data[0];

        $expectation_store = new MemberExpectation;
        $expectation_store->member_id = $request->member_id;
        $expectation_store->rule_name = $rule_name;
        $expectation_store->percent = $request->percent;
        $expectation_store->amount = $request->amount;
        $expectation_store->year = $request->year;
        $expectation_store->month = $request->month;
        $expectation_store->remark = $request->remark;
        $expectation_store->save();

        return response()->json(['message' => 'Member expectation added successfully', 'data' => $expectation_store]);
    }

    public function memberExpectationEdit($id)
    {
        $member_expectation = MemberExpectation::find($id);
        $rules = Rule::orderBy('id','desc')->get() ?? '';
        $edit = true;
        return response()->json(['view' => view('frontend.members.expectation.form', compact('edit', 'member_expectation','rules'))->render()]);
    }

    public function memberExpectationUpdate(Request $request)
    {
        // $validated = $request->validate([
        //     'rule_name' => 'required',
        //     'percent' => 'required',
        //     'amount' => 'required',
        // ]);

        $selectedValue = $request->rule_name; 
        $data = explode(',', $selectedValue);
        $rule_name = $data[0];

        if (!isset($request->member_expectation_id)) {

            $expectation_info = new MemberExpectation;
            $expectation_info->member_id = $request->member_id;
            $expectation_info->rule_name = $rule_name;
            $expectation_info->percent = $request->percent;
            $expectation_info->amount = $request->amount;
            $expectation_info->year = $request->year;
            $expectation_info->month = $request->month;
            $expectation_info->remark = $request->remark;
            $expectation_info->save();

            return response()->json(['message' => 'Member expectation updated successfully', 'data' => $expectation_info, 'save' => true]);
        }

        $expectation_info = MemberExpectation::where('id', $request->member_expectation_id)->first();
        $expectation_info->percent = $request->percent;
        $expectation_info->amount = $request->amount;
        $expectation_info->year = $request->year;
        $expectation_info->month = $request->month;
        $expectation_info->remark = $request->remark;
        $expectation_info->update();

        session()->flash('message', 'Member expectation updated successfully');
        return response()->json(['message' => 'Member expectation updated successfully', 'data' => $expectation_info]);
    }

    public function memberExpectationDelete($id)
    {
        $delete_expectation = MemberExpectation::where('id', $id)->first();
        $delete_expectation->delete();

        return response()->json(['message' => 'Member expectation deleted successfully']);
    }

    public function memberLoanEmiInfo()
    {
        $members = Member::orderBy('id', 'desc')->get();
        $loans = Loan::where('status', 1)->get();
        return view('frontend.members.loan.emi-info',compact('loans','members'));
    }

    public function memberLoanList(Request $request)
    {
        
        $members_loans_info = MemberLoanInfo::where('member_id',$request->member_id)->orderBy('id', 'desc')->get();
        $loans = Loan::where('status', 1)->get();

        return response()->json(['message' => 'Member loan found successfully', 'data' => $members_loans_info]);
    }

    public function memberLoanEmiSubmit(Request $request)
    {
    
        $validated = $request->validate([
            'member_id' => 'required',
            'loan_id' => 'required',
        ]);
        $members = Member::orderBy('id', 'desc')->get();
        $loans = Loan::where('status', 1)->get();
        $loan_emi_list = MemberLoan::where('member_id', $request->member_id)->where('loan_id', $request->loan_id)->paginate(10);
        $emiInfo = true;

        return response()->json(['view' => view('frontend.members.loan.emi-info-table', compact('members', 'loans', 'loan_emi_list','emiInfo'))->render()]);
    }

    public function fetchEmiList(Request $request)
    {
       
        $loanEmiQuery = MemberLoan::query();
        if ($request->member_id) {
            $loanEmiQuery->where('member_id', $request->member_id);
        }

        if ($request->loan_id) {
            $loanEmiQuery->where('loan_id', $request->loan_id);
        }

        $loan_emi_list = $loanEmiQuery->paginate(10, ['*'], 'page', $request->page);
        $members = Member::orderBy('id', 'desc')->get();
        $loans = Loan::where('status', 1)->get();
        $emiInfo = true;
        // Return the partial view with the data
        if ($request->ajax()) {
            return response()->json([
                'view' => view('frontend.members.loan.emi-info-table', compact('loan_emi_list','members','loans','emiInfo'))->render()
            ]);
        }
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return $id;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $id;
    }

    public function deleteMember($id)
    {
        $delete_member = Member::where('id', $id)->first();
        $delete_member->delete();

        return redirect()
            ->route('members.index')
            ->with('message', 'Member deleted successfully');
    }

    public function getMemberGradePay(Request $request)
    {
        $grade_pay = GradePay::where('pay_level', $request->pm_level)->where('status', 1)->first() ?? '';
        $basic_pays = PayMatrixBasic::where('pm_level_id',$request->pm_level)->where('status',1)->get() ?? '';
        $quarter = '';
        if($grade_pay != null) {
            $quarter = Quater::where('grade_pay_id', $grade_pay->id)->first() ?? '';
        }
        $payBand = PmLevel::where('id',$request->pm_level)->where('status',1)->orderBy('id','desc')->with('payBand')->first() ?? '';
        $pm_index = PmIndex::where('pm_level_id',$request->pm_level)->where('status',1)->first();

        $quarter = Quater::where('grade_pay_id', $grade_pay->id)->where('status',1)->first() ?? '';

        return response()->json(['grade_pay' => $grade_pay, 'quarter' => $quarter, 'basic_pays' => $basic_pays, 'pm_index' => $pm_index, 'payBand' => $payBand]);
    }

    public function getmemberCgegisvalue(Request $request)
    {
        $designations = Designation::where('group_id', $request->group)->get() ?? '';
        $cgegis_value = Cgegis::where('group_id', $request->group)->where('status', 1)->first() ?? '';
        return response()->json(['cgegis_value' => $cgegis_value, 'desigs' => $designations]);
    }

   

    public function getmemberCategoryValue(Request $request)
    {
        $get_designation = Designation::where('designation_type_id', $request->desig)->first();
        $category_value = Category::where('id', $get_designation->category_id)->where('status', 1)->first();
        $payband_type = PaybandType::where('id', $get_designation->payband_type_id)->first();
        $section = DesignationType::where('id', $get_designation->designation_type_id)->with('section')->first();

        return response()->json(['category_value' => $category_value, 'payband_type' => $payband_type, 'section' => $section]);
    }

    public function memberCreditDaPercentage(Request $request)
    {
        $da_percentage = DearnessAllowancePercentage::where('is_active', 1)->first();
        $member = Member::where('id', $request->memberID)->first();
        $hra_percentage = Hra::where('city_category', $member->cities->city_type)->where('status', 1)->first();
        $tptAmount = Tpta::where('tpt_type', $member->cities->tpt_type)->where('pay_level_id', $member->pm_level)->where('status', 1)->first();
        $basicPay = $request->basicPay;

        $daAmount = ($basicPay * $da_percentage->percentage) / 100;
        $hraAmount = ($basicPay * $hra_percentage->percentage) / 100;


        return response()->json(['daAmount' => $daAmount, 'hraAmount' => $hraAmount, 'tptAmount' => $tptAmount->tpt_allowance, 'tptDa' => $tptAmount->tpt_da]);
    }

    

    public function memberDebitEducationCess(Request $request)
    {

        // check under range of tax
        $tax_rate = IncomeTax::where('lower_slab_amount', '<=', $request->i_tax)
            ->where('higher_slab_amount', '>=', $request->i_tax)
            ->first();

        $edu_cess_rate = $tax_rate->edu_cess_rate;
        $edu_cal = (($request->i_tax * $edu_cess_rate) / 100);

        return response()->json(['edu_cal' => $edu_cal]);
    }

    public function checkEolHplCcl(Request $request) 
    {
        // dd($request->all());

        $member = Member::where('id', $request->memberID)->first();
        $member_leaves = MemberLeave::where('member_id', $request->memberID)->with('leaveType')->get();

        // Check if member has EOL or HPL
        $hasEOL = false;
        $hasHPL = false;
        $hasCCL = false;
        $cclDays = 0;
        $result = [];
        $total_deduction = 0;
        $cclDeduction = 0;
        
        foreach ($member_leaves as $leave) {
            $result[$leave->leave_type_id]['leave_name'] = $leave->leaveType->leave_type_abbr;

            if ($result[$leave->leave_type_id]['leave_name'] === 'EOL') {
                $hasEOL = true;
            }
            if ($result[$leave->leave_type_id]['leave_name'] === 'HPL') {
                $hasHPL = true;
            }
            if ($result[$leave->leave_type_id]['leave_name'] === 'CCL') {
                $hasCCL = true;
                $cclDays += $leave->no_of_days;
            }
            if(($hasEOL) || ($hasHPL)) {
                // check if member has nps
                $coreInfo = MemberCoreInfo::where('member_id', $request->memberID)->first();
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
                    $basic = $member->basic;
                    $da = $member->da;

                    $result[$leave->leave_type_id]['eolHplDeduction'] = number_format((float)((($basic + $da) * $result[$leave->leave_type_id]['no_of_days']) / $result[$leave->leave_type_id]['daysInMonth']), 2);

                    if($nps != null) {
                        $npsDeductionown = ($result[$leave->leave_type_id]['eolHplDeduction'] * 10) / 100;
                        $npsDeductionGovt = ($result[$leave->leave_type_id]['eolHplDeduction'] * 14) / 100;
                        $result[$leave->leave_type_id]['npsDeductionown'] = $npsDeductionown;
                        $result[$leave->leave_type_id]['npsDeductionGovt'] = $npsDeductionGovt;
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
                    $basic = $member->basic;
                    $da = $member->da;

                    $startmonthDeduction = (($basic + $da) * $result[$leave->leave_type_id]['leaveDaysInStartMonth']) / $result[$leave->leave_type_id]['daysInStartMonth'];
                    $endmonthDeduction = (($basic + $da) * $result[$leave->leave_type_id]['leaveDaysInEndMonth']) / $result[$leave->leave_type_id]['daysInEndMonth'];

                    $result[$leave->leave_type_id]['eolHplDeduction'] = number_format((float)($startmonthDeduction + $endmonthDeduction), 2);
                    
                    
                }
                $total_deduction += floatval(str_replace(',', '', $result[$leave->leave_type_id]['eolHplDeduction']));
            } elseif ($hasCCL) {
                $totalDaysCCL = $cclDays;
                $basic = $member->basic;
                $da = $member->da;

                if ($totalDaysCCL > 365) {
                    // Apply 20% deduction if CCL days exceed 365
                    // $salary = $basic + $da;
                    $cclDeduction = number_format((float)($basic * 0.20), 2);
                    // $total_deduction += floatval(str_replace(',', '', $cclDeduction));
                } 
            }
            // dd($total_deduction);
        }
        

        return response()->json(['result' => $result, 'total_deduction' => $total_deduction, 'ccldeduction' => $cclDeduction]);
    }

    public function memberBankIfsc(Request $request)
    {
        $get_ifsc = Bank::where('id', $request->bank_id)->first();
        return response()->json(['ifsc' => $get_ifsc]);
    }

    public function memberExpRuleDetail(Request $request)
    {
        $get_rule_detail = Rule::where('id',$request->rule_id)->first();
        return response()->json(['data' => $get_rule_detail]);
    }

  
}
