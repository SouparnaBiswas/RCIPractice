<form action="{{ route('members.personal.update') }}" id="member-personal-form" method="post">
    @csrf
    <input type="hidden" name="member_id" value="{{ $member->id }}">
    <div class="row mb-3">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Basic</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="basic" id="basic"
                                    value="{{ $member_personal->basic ?? ($member->basic ?? '') }}" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>G.pay</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="g_pay" id="g_pay"
                                    value="{{ $member_personal->g_pay ?? ($member->gPay->amount ?? '') }}" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Cadre</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="cadre" id="cadre">
                                    <option value="">Select</option>
                                    @foreach ($cadres as $cadre)
                                        <option value="{{ $cadre->id }}"
                                            {{ (isset($member_personal->cadre) || isset($member->cadre)) && ($cadre->id == ($member_personal->cadre ?? $member->cadre ?? null)) ? 'selected' : '' }}>
                                            {{ $cadre->value }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>DOB</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="dob" id="dob"
                                    value="{{ $member_personal->dob ?? ($member->dob) ?? '' }}" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Next Incr</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="next_inr" id="next_inr"
                                    value="{{ $member_personal->next_inr ?? ($member->next_inr) ?? '' }}" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Ex-Service</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="ex_service" id="ex_service">
                                    @foreach ($exServices as $exService)
                                        <option value="{{ $exService->id }}"
                                            {{ (isset($member_personal->ex_service) || isset($member->ex_service)) && ($exService->id == ($member_personal->ex_service ?? $member->ex_service ?? null)) ? 'selected' : '' }}>
                                            {{ $exService->value }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>PayBand</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="payband" id="payband">
                                    @foreach ($paybands as $payband)
                                        <option value="{{ $payband->id }}"
                                            {{ (isset($member_personal->payband) || isset($member->payband)) && ($payband->id == ($member_personal->payband ?? $member->payband ?? null)) ? 'selected' : '' }}>
                                            {{ $payband->payband_type }}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>PM Level</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="pm_level" id="pm_level">
                                    @foreach ($pmLevels as $pmLevel)
                                        <option value="{{ $pmLevel->id }}"
                                            {{ (isset($member_personal->pm_level) || isset($member->pm_level)) && ($pmLevel->id == ($member_personal->pm_level ?? $member->pm_level ?? null)) ? 'selected' : '' }}>
                                            {{ $pmLevel->value }}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>EMP-ID</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="emp_id" id="emp_id"
                                    value="{{ $member_personal->emp_id ?? ($member->emp_id ?? '') }}" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Gender</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="gender" id="gender">
                                    <option value="Male"
                                        {{ (isset($member_personal->gender) || isset($member->gender)) &&
                                            (($member_personal->gender ?? null) == 'Male' || ($member->gender ?? null) == 'Male')
                                           ? 'selected'
                                           : '' }}>
                                        Male</option>
                                    <option value="Female"
                                        {{ (isset($member_personal->gender) || isset($member->gender)) &&
                                            (($member_personal->gender ?? null) == 'Female' || ($member->gender ?? null) == 'Female')
                                           ? 'selected'
                                           : '' }}>
                                        Female</option>
                                    <option value="Others"
                                        {{ (isset($member_personal->gender) || isset($member->gender)) &&
                                            (($member_personal->gender ?? null) == 'Others' || ($member->gender ?? null) == 'Others')
                                           ? 'selected'
                                           : '' }}>
                                        Others</option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Status</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="status" id="status">
                                    <option value="">Select</option>
                                    <option value="Yes"
                                        {{ (isset($member_personal->status) || isset($member->status)) &&
                                            (($member_personal->status ?? null) == 'Yes' || ($member->status ?? null) == 'Yes')
                                           ? 'selected'
                                           : '' }}>
                                        Yes</option>
                                    <option value="No"
                                        {{ (isset($member_personal->status) || isset($member->status)) &&
                                            (($member_personal->status ?? null) == 'No' || ($member->status ?? null) == 'No')
                                           ? 'selected'
                                           : '' }}>
                                        No</option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>DOJ Lab</label>
                            </div>
                            <div class="col-md-12">
                                <input type="Date" class="form-control" name="doj_lab" id="doj_lab"
                                    value="{{ $member_personal->doj_lab ?? ($member->doj_lab ?? '') }}" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Quater</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="quater" id="quater">
                                    <option value="">Select</option>
                                    @foreach ($quaters as $quater)
                                        <option value="{{ $quater->id }}"
                                            {{ (isset($member_personal->quater) || isset($member->quater)) && ($quater->id == ($member_personal->quater ?? $member->quater ?? null)) ? 'selected' : '' }}>
                                            {{ $quater->qrt_type }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                   
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>PH Allowance</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="ph" id="ph"
                                    value="{{ $member_personal->ph ?? 0 }}">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Old Basic</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="old_basic" id="old_basic"
                                    value="{{ $member_personal->old_basic ?? ($member->old_bp ?? '') }}"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>PM Index</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="pm_index" id="pm_index">
                                    <option value="">Select</option>
                                    @foreach ($pmIndexes as $pmIndex)
                                        <option value="{{ $pmIndex->id }}"
                                            {{ (isset($member_personal->pm_index) || isset($member->pm_index)) && ($pmIndex->id == ($member_personal->pm_index ?? $member->pm_index ?? null)) ? 'selected' : '' }}>
                                            {{ $pmIndex->value }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    
                </div>
            </div>
        </div>
        <div class="col-md-6">
            
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Name</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="name" id="name"
                            value="{{ $member_personal->name ?? ($member->name ?? '') }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Landline Number</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="landline_no" id="landline_no"
                                    value="{{ $member_personal->landline_no ?? '' }}"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Mobile Number</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="mobile_no" id="mobile_no"
                                    value="{{ $member_personal->mobile_no ?? '' }}"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Mobile Allowance</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="mobile_allowance" id="mobile_allowance"
                                    value="{{ $member_personal->mobile_allowance ?? '' }}"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Broadband Allowance</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="broadband_allowance" id="broadband_allowance"
                                    value="{{ $member_personal->broadband_allowance ?? '' }}"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Landline Allowance</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="landline_allowance" id="landline_allowance"
                                    value="{{ $member_personal->landline_allowance ?? '' }}"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Cr Water</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="cr_water" id="cr_water"
                                    value="{{ $member_personal->cr_water ?? '' }}"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Desig</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="desig" id="desig">
                                    <option value="">Select</option>
                                    @foreach ($designations as $designation)
                                        <option value="{{ $designation->id }}"
                                            {{ (isset($member_personal->desig) || isset($member->desig)) && ($designation->id == ($member_personal->desig ?? $member->desig ?? null)) ? 'selected' : '' }}>
                                            {{ $designation->designation }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Category</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="category" id="category">
                                    <option value="">Select</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ (isset($member_personal->category) || isset($member->category)) && ($category->id == ($member_personal->category ?? $member->category ?? null)) ? 'selected' : '' }}>
                                            {{ $category->category }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Employment Status</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="e_status" id="e_status">
                                    <option value="">Select</option>
                                    <option value="active" {{ (isset($member_personal->e_status) || isset($member->e_status)) &&
                                        (($member_personal->e_status ?? null) == 'active' || ($member->e_status ?? null) == 'active')
                                       ? 'selected'
                                       : '' }}>Active</option>
                                    <option value="deputation" {{ (isset($member_personal->e_status) || isset($member->e_status)) &&
                                        (($member_personal->e_status ?? null) == 'deputation' || ($member->e_status ?? null) == 'deputation')
                                        ? 'selected'
                                        : '' }}>On Deputation</option>
                                    <option value="retired" {{ (isset($member_personal->e_status) || isset($member->e_status)) &&
                                        (($member_personal->e_status ?? null) == 'retired' || ($member->e_status ?? null) == 'retired')
                                       ? 'selected'
                                       : '' }}>Retired</option>
                                    <option value="suspended" {{ (isset($member_personal->e_status) || isset($member->e_status)) &&
                                        (($member_personal->e_status ?? null) == 'suspended' || ($member->e_status ?? null) == 'suspended')
                                       ? 'selected'
                                       : '' }}>Suspended</option>
                                    <option value="transferred" {{ (isset($member_personal->e_status) || isset($member->e_status)) &&
                                        (($member_personal->e_status ?? null) == 'transferred' || ($member->e_status ?? null) == 'transferred')
                                       ? 'selected'
                                       : '' }}>Transferred</option> 
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>DOJ Service</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="doj_service" id="doj_service"
                                    value="{{ $member_personal->doj_service ?? ($member->doj_service1 ?? '') }}"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Quater No</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="quater_no" id="quater_no"
                                    value="{{ $member_personal->quater_no ?? ($member->quater_no ?? '') }}"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>DOP</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="dop" id="dop"
                                    value="{{ $member_personal->dop ?? ($member->dop ?? '') }}" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">  
                <div class="col-md-6">  
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Fund Type</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="fund_type" id="fund_type"
                                    value="{{ $member_personal->fund_type ?? ($member->fund_type ?? '') }}"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">  
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>CGEGIS</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="cgegis" id="cgegis">
                                    <option value="">Select</option>
                                    @foreach ($cgegises as $cgegis)
                                        <option value="{{ $cgegis->id }}"
                                            {{ (isset($member_personal->cgegis) || isset($member->cgegis)) && ($cgegis->id == ($member_personal->cgegis ?? $member->cgegis ?? null)) ? 'selected' : '' }}>
                                            {{ $cgegis->value }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">    
                <div class="col-md-6">
                    <input type="text" class="form-control" name="cgegis_text" id="cgegis_text"
                        value="{{ $member_personal->cgegis_text ?? ($member->cgegis_text ?? '') }}"
                        placeholder="">
                    <span class="text-danger"></span>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Paystop</label>
                            </div>
                            <div class="col-md-12">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pay_stop" id="inlineRadio1"
                                        value="Yes"
                                        {{ (isset($member_personal->pay_stop) || isset($member->pay_stop)) &&
                                        (($member_personal->pay_stop ?? null) == 'Yes' || ($member->pay_stop ?? null) == 'Yes')
                                       ? 'checked'
                                       : '' }}>
                                    <label class="form-check-label" for="inlineRadio1">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pay_stop" id="inlineRadio2"
                                        value="No"
                                        {{ (isset($member_personal->pay_stop) || isset($member->pay_stop)) &&
                                        (($member_personal->pay_stop ?? null) == 'No' || ($member->pay_stop ?? null) == 'No')
                                       ? 'checked'
                                       : '' }}>
                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                    
          

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group mb-2">
                        <button type="submit" class="listing_add">Save &
                            Update</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="gross-div mt-3">
        <div class="row row-cols-xxl-5 row-cols-lg-3 row-cols-md-2 row-cols-1">
            <div class="col">
                <div class="form-group mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-4">
                            <label>Gross Pay</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="form-group mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-4">
                            <label>Top Debits</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="form-group mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-4">
                            <label>Net Pay</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="form-group mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-4">
                            <label>Tot Rec</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="form-group mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-4">
                            <label>Take Home</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="row justify-content-end">
                <div class="col-md-6">
                    <div class="row justify-content-end">
                        <div class="form-group col-md-3 mb-2">
                            <a href="{{ route('members.create') }}"><button type="button"
                                    class="another-btn">Another</button></a>
                        </div>
                        <div class="form-group col-md-3 mb-2">
                            <button type="submit" class="listing_add">Update</button>
                        </div>
                        <div class="form-group col-md-3 mb-2">
                            <button type="reset" class="listing_exit">Exit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>


