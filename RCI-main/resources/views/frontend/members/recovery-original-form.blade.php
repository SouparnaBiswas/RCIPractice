<form action="{{ route('members.recovery-original.update') }}" id="member-original-recovery-form" method="post">
    @csrf

    <input type="hidden" name="member_id" value="{{ $member->id ?? '' }}">
    <div class="row">
        <div class="col-md-3">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>CCS Sub</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="ccs_sub" id="ccs_sub" value="{{ $member_original_recovery->ccs_sub ?? (old('ccs_sub') ?? '') }}">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>MESS</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="mess" id="mess" value="{{ $member_original_recovery->mess ?? (old('mess') ?? '') }}"
                            >
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Security</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="security" id="security" value="{{ $member_original_recovery->security ?? (old('security') ?? '') }}"
                           >
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Misc 1</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="misc1" id="misc1" value="{{ $member_original_recovery->misc1 ?? (old('misc1') ?? '') }}"
                           >
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
                        <label>CCS Rec</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="ccs_rec" id="ccs_rec"  value="{{ $member_original_recovery->ccs_rec ?? (old('ccs_rec') ?? '') }}"
                            >
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Asso Fee</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="asso_fee" id="asso_fee" value="{{ $member_original_recovery->asso_fee ?? (old('asso_fee') ?? '') }}"
                            >
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>DBF</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="dbf" id="dbf" value="{{ $member_original_recovery->dbf ?? (old('dbf') ?? '') }}"
                            >
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Misc 2</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="misc2" id="misc2" value="{{ $member_original_recovery->misc2 ?? (old('misc2') ?? '') }}"
                           >
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
                        <label>WEL Sub</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="wel_sub" id="wel_sub" value="{{ $member_original_recovery->wel_sub ?? (old('wel_sub') ?? '') }}"
                            >
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>BEN</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="ben" id="ben" value="{{ $member_original_recovery->ben ?? (old('ben') ?? '') }}"
                            >
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Med Ins</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="med_ins" id="med_ins" value="{{ $member_original_recovery->med_ins ?? (old('med_ins') ?? '') }}"
                           >
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Tot Rec</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="tot_rec" id="tot_rec" value="{{ $member_original_recovery->tot_rec ?? (old('tot_rec') ?? '') }}"
                            >
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
                        <label>WEL Rec</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="wel_rec" id="wel_rec" value="{{ $member_original_recovery->wel_rec ?? (old('wel_rec') ?? '') }}"
                           >
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>HDFC</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="hdfc" id="hdfc" value="{{ $member_original_recovery->hdfc ?? (old('hdfc') ?? '') }}"
                            >
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>MAF</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="maf" id="maf" value="{{ $member_original_recovery->maf ?? (old('maf') ?? '') }}"
                           >
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Final Pay</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="final_pay" id="final_pay" value="{{ $member_original_recovery->final_pay ?? (old('final_pay') ?? '') }}"
                            >
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
                        <label>LIC</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="lic" id="lic" value="{{ $member_original_recovery->lic ?? (old('lic') ?? '') }}"
                            >
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>CortAtch</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="cort_atch" id="cort_atch" value="{{ $member_original_recovery->cort_atch ?? (old('cort_atch') ?? '') }}"
                            >
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>OGPF</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="ogpf" id="ogpf" value="{{ $member_original_recovery->ogpf ?? (old('ogpf') ?? '') }}"
                            >
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>NTP</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="ntp" id="ntp" value="{{ $member_original_recovery->ntp ?? (old('ntp') ?? '') }}"
                            >
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>     
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Remarks</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="remarks" id="remarks"
                        value="{{ $member_original_recovery->remarks ?? (old('remarks') ?? '') }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="row justify-content-end">
                <div class="col-md-8">
                    <div class="row justify-content-end">
                        <div class="form-group col-md-3 mb-2">
                            <a href="{{ route('members.create') }}"><button type="button"
                                class="another-btn">Another</button></a>
                        </div>
                        <div class="form-group col-md-3 mb-2">
                            <button type="submit" class="listing_add" id="recovry-update">Update</button>
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
