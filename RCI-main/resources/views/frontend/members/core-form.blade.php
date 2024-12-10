<form action="{{ route('members.core-info.update') }}"
id="member-core-form" method="post">
@csrf

<input type="hidden" name="member_id" value="{{ $member->id }}">
<div class="row">
    <div class="col-md-3">
        <div class="form-group mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>Bank A/c No.</label>
                </div>
                <div class="col-md-12">
                    <input type="text" class="form-control"
                        name="bank_acc_no" id="bank_acc_no"
                        value="{{ $member_core->bank_acc_no ?? (old('bank_acc_no') ?? '') }}"
                        placeholder="">
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>CCM Mem No</label>
                </div>
                <div class="col-md-12">
                    <input type="text" class="form-control"
                        name="ccs_mem_no" id="ccs_mem_no"
                        value="{{ $member_core->ccs_mem_no ?? (old('ccs_mem_no') ?? '') }}"
                        placeholder="">
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>FPA</label>
                </div>
                <div class="col-md-12">
                    <input type="text" class="form-control"
                        name="fpa" id="fpa"
                        value="{{ $member_core->fpa ?? (old('fpa') ?? '') }}"
                        placeholder="">
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
                    <label>Bank</label>
                </div>
                <div class="col-md-12">
                    <select class="form-select" name="bank"
                        id="bank">
                        <option value="">Select Bank</option>
                        @foreach ($banks as $bank)
                            <option value="{{ $bank->id }}"
                                {{ isset($member_core->bank) && $bank->id == $member_core->bank ? 'selected' : '' }}>
                                {{ $bank->bank_name }}</option>
                        @endforeach
                    </select>
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>IFSC</label>
                </div>
                <div class="col-md-12">
                    <input type="text"  name="ifsc"  id="ifsc" class="form-control"
                        value="{{ $member_core->ifsc ?? (old('ifsc') ?? '') }}"
                        placeholder="">
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>GPF Sub</label>
                </div>
                <div class="col-md-12">
                    <input type="text" class="form-control"
                        name="gpf_sub" id="gpf_sub"
                        value="{{ $member_core->gpf_sub ?? (old('gpf_sub') ?? '') }}"
                        placeholder="">
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
                    <label>2 Add</label>
                </div>
                <div class="col-md-12">
                    <input type="text" class="form-control"
                        name="add2" id="add2"
                        value="{{ $member_core->add2 ?? (old('add2') ?? '') }}"
                        placeholder="">
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
    </div>
    @if($member->nps_available == 'No')
    <div class="col-md-3">
        <div class="form-group mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>GPF A/c No</label>
                </div>
                <div class="col-md-12">
                    <input type="text" class="form-control"
                        name="gpf_acc_no" id="gpf_acc_no"
                        value="{{ $member_core->gpf_acc_no ?? (old('gpf_acc_no') ?? '') }}"
                        placeholder="">
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
    </div>
    @endif
    <div class="col-md-3">
        <div class="form-group mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>I.Tax</label>
                </div>
                <div class="col-md-12">
                    <input type="text" class="form-control"
                        name="i_tax" id="i_tax"
                        value="{{ $member_core->i_tax ?? (old('i_tax') ?? '') }}"
                        placeholder="">
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    
    @if($member->nps_available == 'Yes')
    <div class="col-md-3">
        <div class="form-group mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>PRAN No</label>
                </div>
                <div class="col-md-12">
                    <input type="text" class="form-control"
                        name="pran_no" id="pran_no"
                        value="{{ $member_core->pran_no ?? (old('pran_no') ?? '') }}"
                        placeholder="">
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
    </div>
    @endif
    <div class="col-md-3">
        <div class="form-group mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>PAN No</label>
                </div>
                <div class="col-md-12">
                    <input type="text" class="form-control"
                        name="pan_no" id="pan_no"
                        value="{{ $member_core->pan_no ?? (old('pan_no') ?? '') }}"
                        placeholder="">
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>Ecess</label>
                </div>
                <div class="col-md-12">
                    <input type="text" class="form-control"
                        name="ecess" id="ecess"
                        value="{{ $member_core->ecess ?? (old('ecess') ?? '') }}"
                        placeholder="">
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
                    <label>Ben A/C No</label>
                </div>
                <div class="col-md-12">
                    <input type="text" class="form-control"
                        name="ben_acc_no" id="ben_acc_no"
                        value="{{ $member_core->ben_acc_no ?? (old('ben_acc_no') ?? '') }}"
                        placeholder="">
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>DCMAF No</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control"
                                name="dcmaf_no" id="dcmaf_no"
                                value="{{ $member_core->dcmaf_no ?? (old('dcmaf_no') ?? '') }}"
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
                            <label>S.Pay</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control"
                                name="s_pay" id="s_pay"
                                value="{{ $member_core->s_pay ?? (old('s_pay') ?? '') }}"
                                placeholder="">
                            <span class="text-danger"></span>
                        </div>
                    </div>
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
                        <button type="submit"
                            class="listing_add">Update</button>
                    </div>
                    <div class="form-group col-md-3 mb-2">
                        <button type="reset"
                            class="listing_exit">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>