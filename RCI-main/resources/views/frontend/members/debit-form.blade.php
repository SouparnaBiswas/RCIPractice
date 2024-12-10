<form action="{{ route('members.debit.update') }}" id="member-debit-form" method="post">
    @csrf

    <input type="hidden" name="member_id" value="{{ $member->id }}">
    <div class="row">
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>GPF Sub</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="gpa_sub" id="gpa_sub"
                            value="{{ $member_debit->gpa_sub ?? $memberGpf->monthly_subscription  ?? '' }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>GPF Adv</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="gpa_adv" id="gpa_adv"
                            value="{{ $member_debit->gpf_adv ?? '' }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Eol/Hpl</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="eol" id="eol"
                            value="{{ $member_debit->eol ??  ''}}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>CCL</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="ccl" id="ccl"
                            value="{{ $member_debit->ccl ??  ''}}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Rent</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="rent" id="rent"
                            value="{{ $member_debit->rent ?? '' }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>LF Arr</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="lf_arr" id="lf_arr"
                            value="{{ $member_debit->lf_arr  ?? '' }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>TADA</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="tada" id="tada"
                            value="{{ $member_debit->tada  ?? '' }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
    
    
        @php
        if($check_hba){
            $isReadonly = ($check_hba->loan_name !== 'HBA' && $check_hba->loan_name !== 'hba');
        }else{
            $isReadonly = true;
        }
        @endphp
    
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>HBA Adv</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="hba" id="hba"
                            value="{{ $member_debit->hba  ?? '' }}" placeholder="0" {{ $isReadonly ? 'readonly' : '' }}>
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>HBA Interest</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="hba_interest" id="hba_interest"
                            value="{{ $member_debit->hba_int  ?? '' }}" placeholder="0" {{ $isReadonly ? 'readonly' : '' }}>
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>HBA Curr Instll</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="hba_cur_instl" id="hba_cur_instl"
                            value="{{ $member_debit->hba_cur_instl  ?? '' }}" placeholder="0" {{ $isReadonly ? 'readonly' : '' }}>
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>HBA int current instll</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="hba_int_cur_instl" id="hba_int_cur_instl"
                            value="{{ $member_debit->hba_int_cur_instl  ?? '' }}" placeholder="0" {{ $isReadonly ? 'readonly' : '' }}>
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>HBA int total install</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="hba_int_total_instl" id="hba_int_total_instl"
                            value="{{ $member_debit->hba_int_total_instl  ?? '' }}" placeholder="0" {{ $isReadonly ? 'readonly' : '' }}>
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Comp Adv</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="comp_adv" id="comp_adv"
                            value="{{ $member_debit->comp_adv  ?? '' }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Comp Int</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="comp_int" id="comp_int"
                            value="{{ $member_debit->comp_int  ?? '' }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Comp prin curr install</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="comp_prin_curr_instl" id="comp_prin_curr_instl"
                            value="{{ $member_debit->comp_prin_curr_instl  ?? '' }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Comp prin total install</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="comp_prin_total_instl" id="comp_prin_total_instl"
                            value="{{ $member_debit->comp_prin_total_instl  ?? '' }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Comp adv interest</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="comp_adv_int" id="comp_adv_int"
                            value="{{ $member_debit->comp_adv_int  ?? '' }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Comp int curr install</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="comp_int_curr_instl" id="comp_int_curr_instl"
                            value="{{ $member_debit->comp_int_curr_instl  ?? '' }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Comp int total install</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="comp_int_total_instl" id="comp_int_total_instl"
                            value="{{ $member_debit->comp_int_total_instl  ?? '' }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Leave Rec</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="leave_rec" id="leave_rec"
                            value="{{ $member_debit->leave_rec  ?? '' }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Pension Rec</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="pension_rec" id="pension_rec"
                            value="{{ $member_debit->pension_rec  ?? '' }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Misc Debit</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="misc1" id="misc1"
                            value="{{ $member_debit->misc1  ?? '' }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>GPF Rec</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="gpf_rec" id="gpf_rec"
                            value="{{ $member_debit->gpf_rec  ?? '' }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>I.Tax</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_tax" id="i_tax"
                            value="{{ $member_debit->i_tax ?? '' }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Elec</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="elec" id="elec"
                            value="{{ $member_debit->elec ?? ''}}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Elec Arr</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="elec_arr" id="elec_arr"
                            value="{{ $member_debit->elec_arr  ?? '' }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Medi</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="medi" id="medi"
                            value="{{ $member_debit->medi ??  ''}}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Pc</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="pc" id="pc"
                            value="{{ $member_debit->pc  ?? '' }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Misc Debit(it)</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="misc2" id="misc2"
                            value="{{ $member_debit->misc2  ?? '' }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>GPF Arr</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="gpf_arr" id="gpf_arr"
                            value="{{ $member_debit->gpf_arr  ?? '' }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Edu cess</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="ecess" id="ecess"
                            value="{{ $member_debit->ecess  ?? '' }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Water</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="water" id="water"
                            value="{{ $member_debit->water  ?? '' }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Water Arr</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="water_arr" id="water_arr"
                            value="{{ $member_debit->water_arr  ?? '' }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Arrear Pay</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="arrear_pay" id="arrear_pay"
                            value="{{ $member_debit->arrear_pay  ?? '' }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>NPSG</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="npsg" id="npsg"
                            value="{{ $member_debit->npsg  ?? '' }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>NPSG Arrear</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="npsg_arr" id="npsg_arr"
                            value="{{ $member_debit->npsg_arr  ?? '' }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>NPSG Adj</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="npsg_adj" id="npsg_adj"
                            value="{{ $member_debit->npsg_adj  ?? '' }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Car adv princ install</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="car_adv_prin_instl" id="car_adv_prin_instl"
                            value="{{ $member_debit->car_adv_prin_instl  ?? '' }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Car adv total install</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="car_adv_total_instl" id="car_adv_total_instl"
                            value="{{ $member_debit->car_adv_total_instl  ?? '' }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Scooter Adv princ instll</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="scot_adv_prin_instl" id="scot_adv_prin_instl"
                            value="{{ $member_debit->scot_adv_prin_instl  ?? '' }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Scooter Adv current instll</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="sco_adv_int_curr_instl" id="sco_adv_int_curr_instl"
                            value="{{ $member_debit->sco_adv_int_curr_instl  ?? '' }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Scooter adv total install</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="sco_adv_int_total_instl" id="sco_adv_int_total_instl"
                            value="{{ $member_debit->sco_adv_int_total_instl  ?? '' }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Festival adv prin curr</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="fest_adv_prin_cur" id="fest_adv_prin_cur"
                            value="{{ $member_debit->fest_adv_prin_cur  ?? '' }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Festival adv total curr</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="fest_adv_total_cur" id="fest_adv_total_cur"
                            value="{{ $member_debit->fest_adv_total_cur  ?? '' }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Ltc Recovery</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="ltc_rec" id="ltc_rec"
                            value="{{ $member_debit->ltc_rec  ?? '' }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Medical Recovery</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="medical_rec" id="medical_rec"
                            value="{{ $member_debit->medical_rec  ?? '' }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Tada Recovery</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="tada_rec" id="tada_rec"
                            value="{{ $member_debit->tada_rec  ?? '' }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div> 
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>LTC</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="ltc" id="ltc"
                            value="{{ $member_debit->ltc  ?? ''}}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Fest adv</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="fadv" id="fadv"
                            value="{{ $member_debit->fadv  ?? '' }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Misc3</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="misc3" id="misc3"
                            value="{{ $member_debit->misc3  ?? '' }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>CGEGIS</label>
                    </div>
                    <div class="col-md-12">
                       
                        <input type="text" class="form-control" name="cgegis" id="cgegis"
                            value="{{ $member_debit->cgegis  ?? '' }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>CDA</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="cda" id="cda"
                            value="{{ $member_debit->cda  ?? '' }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Furn</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="furn" id="furn"
                            value="{{ $member_debit->furn ??  ''}}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Furn Arr</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="furn_arr" id="furn_arr"
                            value="{{ $member_debit->furn_arr  ?? '' }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>CAR Adv</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="car" id="car"
                            value="{{ $member_debit->car  ?? '' }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>CAR Interest</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="car_interest" id="car_interest"
                            value="{{ $member_debit->car_int  ?? '' }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>HRA Rec</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="hra_rec" id="hra_rec"
                            value="{{ $member_debit->hra_rec  ?? ''}}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>TotDebits</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="tot_debits" id="tot_debits"
                            value="{{ $member_debit->tot_debits  ?? '' }}" placeholder="" readonly>
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>CGHS </label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="cghs" id="cghs"
                            value="{{ $member_debit->cghs  ?? $member_cghs->contribution ?? '' }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>P.Tax</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="ptax" id="ptax"
                            value="{{ $member_debit->ptax  ?? ''}}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>CMG</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="cmg" id="cmg"
                            value="{{ $member_debit->cmg  ?? '' }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>PL INSUR</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="pli" id="pli"
                            value="{{ $member_debit->pli  ?? '' }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Scooter</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="scooter" id="scooter"
                            value="{{ $member_debit->scooter  ?? '' }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Scooter Interest</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="scooter_interest" id="scooter_interest"
                            value="{{ $member_debit->sco_int  ?? '' }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>TPT Rec</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="tpt_rec" id="tpt_rec"
                            value="{{ $member_debit->tpt_rec  ?? '' }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Net Pay</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="net_pay" id="net_pay"
                            value="{{ $member_credit->tot_credits ?? (old('tot_credits') ?? 0) }}" readonly>
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Basic</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="basics" id="basics"
                            value="{{ $member_debit->basic ?? $member->basic ?? '' }}" placeholder="" readonly>
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Quarter Charge</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="quarter_charge" id="quarter_charge"
                            value="{{ $member_debit->quarter_charges ?? $member->quarter->qrt_charge ?? ''}}" placeholder="" readonly>
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>CGEIS Arr</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="cgeis_arr" id="cgeis_arr"
                            value="{{ $member_debit->cgeis_arr ?? '' }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Penal Interest</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="penal_interest" id="penal_interest"
                            value="{{ $member_debit->penal_intr ??  '' }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Society</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="society" id="society"
                            value="{{ $member_debit->society  ?? '' }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Remarks</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="remarks" id="remarks"
                            value="{{ $member_debit->remarks  ?? ''}}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                            <button type="submit" class="listing_add" id="debit-update">Update</button>
                        </div>
                        <div class="form-group col-md-3 mb-2">
                            <button type="reset" class="listing_exit">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <input type="hidden" name="tot_credits" value="{{ $member_credit->tot_credits ?? '' }}">


</form>
