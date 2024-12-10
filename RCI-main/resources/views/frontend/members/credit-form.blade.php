<form action="{{ route('members.credit.update') }}" id="member-credit-form" method="post">
    @csrf

    <input type="hidden" name="member_id" value="{{ $member->id }}">
    <div class="row">
        <div class="col-md-3">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Basic Pay</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="pay" id="basic-pay"
                            value="{{ $member->basic  ?? (old('basic') ?? '') }}" placeholder="" >
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>DA</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="da"
                            value="{{ $member_credit->da ?? (old('da') ?? '') }}" placeholder="" id="da_percentage" readonly>
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>TPT</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="tpt" id="tpt"
                            value="{{ $member_credit->tpt ?? (old('tpt') ?? '') }}" placeholder="" readonly>
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Cr Rent</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="cr_rent" id="cr_rent"
                            value="{{ $member_credit->cr_rent ?? (old('cr_rent') ?? '') }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>G.Pay</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="g_pay" id="g_pay"
                            value="{{ $member_credit->g_pay  ?? $member->g_pay ?? '' }}" placeholder="" readonly>
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>HRA</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="hra" id="hra"
                            value="{{ $member_credit->hra ?? (old('hra') ?? '') }}" placeholder="" readonly>
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>DA on TPT</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="da_on_tpt" id="da_on_tpt"
                            value="{{ $member_credit->da_on_tpt ?? (old('da_on_tpt') ?? '') }}" placeholder="" readonly>
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Cr Elec</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="cr_elec" id="cr_elec"
                            value="{{ $member_credit->cr_elec ?? (old('cr_elec') ?? '') }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>FPA</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="fpa" id="fpa"
                            value="{{ $member_credit->fpa ?? (old('fpa') ?? '') }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Spl Pay</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="s_pay" id="s_pay"
                            value="{{ $member_credit->s_pay ?? (old('s_pay') ?? '') }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Hindi</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="hindi" id="hindi"
                            value="{{ $member_credit->hindi ?? (old('hindi') ?? '') }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>2 Add Inc</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="add_inc2" id="add_inc2"
                            value="{{ $member_credit->add_inc2 ?? (old('add_inc2') ?? '') }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="col-md-3">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Cr Water</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="cr_water" id="cr_water"
                            value="{{ $member_credit->cr_water ?? (old('cr_water') ?? '') }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
    <div class="row">
        
        <div class="col-md-3">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>NPA</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="npa" id="npa"
                            value="{{ $member_credit->npa ?? (old('npa') ?? '') }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Deptn Alw</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="deptn_alw" id="deptn_alw"
                            value="{{ $member_credit->deptn_alw ?? (old('deptn_alw') ?? '') }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Misc Credit(IT)</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="misc_1" id="misc_1"
                            value="{{ $member_credit->misc1 ?? (old('misc_1') ?? '') }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Var Incr</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="var_incr" id="var_incr"
                            value="{{ $member_credit->var_incr ?? (old('var_incr') ?? '') }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        
        <div class="col-md-3">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Wash Alw</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="wash_alw" id="wash_alw"
                            value="{{ $member_credit->wash_alw ?? (old('wash_alw') ?? '') }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Dress Alw</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="dis_alw" id="dis_alw"
                            value="{{ $member_credit->dis_alw ?? (old('dis_alw') ?? '') }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Misc Credit</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="misc_2" id="misc_2"
                            value="{{ $member_credit->misc2 ?? (old('misc_2') ?? '') }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>SPL Incentive</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="spl_incentive" id="spl_incentive"
                            value="{{ $member_credit->spl_incentive ?? (old('spl_incentive') ?? '') }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Incentive</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="incentive" id="incentive"
                                    value="{{ $member_credit->incentive ?? (old('incentive') ?? '') }}"
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
                                <label>Risk Alw</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="risk_alw" id="risk_alw"
                                    value="{{ $member_credit->risk_alw ?? (old('risk_alw') ?? '') }}" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Landline Alw</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="landline_allow" id="landline_allow"
                                    value="{{ $member_credit->landline_allow ?? (old('landline_allow') ?? '') }}" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Mobile Alw</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="mobile_allow" id="mobile_allow"
                                    value="{{ $member_credit->mobile_allow ?? (old('mobile_allow') ?? '') }}"
                                    placeholder="" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="col-md-6">
            <div class="row">
                {{-- <div class="col-md-6">
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Broad band Alw</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="broad_band_allow" id="broad_band_allow"
                                    value="{{ $member_credit->broad_band_allow ?? (old('broad_band_allow') ?? '') }}"
                                    placeholder="" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div> --}}
                
                <div class="col-md-6">
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Tot.Credits</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="tot_credits" id="tot_credits"
                                    value="{{ $member_credit->tot_credits ?? (old('tot_credits') ?? '') }}"
                                    placeholder="" readonly>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Variable Amount</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="var_amount" id="var_amount"
                                    value="{{ $member_credit->variable_amount ?? (old('var_amount') ?? '') }}" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                
                
            </div>
        </div>

    </div>
    
    <div class="row">
        <div class="col-md-3">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>PUA</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="pua" id="pua"
                            value="{{ $member_credit->pua ?? (old('pua') ?? '') }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Arrs of Pay & Allowance</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="arrs_pay_allowance" id="arrs_pay_allowance"
                            value="{{ $member_credit->arrs_pay_allowance ?? (old('arrs_pay_allowance') ?? '') }}"
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
                        <label>Remarks</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="remarks" id="remarks"
                            value="{{ $member_credit->remarks ?? (old('remarks') ?? '') }}" placeholder="">
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
                            <button type="submit" class="listing_add">Update</button>
                        </div>
                        <div class="form-group col-md-3 mb-2">
                            <button type="reset" class="listing_exit">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
