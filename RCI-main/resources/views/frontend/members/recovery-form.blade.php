<form action="{{ route('members.recovery.update') }}" id="member-recovery-form" method="post">
    @csrf

    <input type="hidden" name="member_id" value="{{ $member->id }}">
    <div class="row">
        <div class="col-md-3">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>V.Incr</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="v_incr" id="v_incr"
                            value="{{ $member_var_info->var_incr ?? $member_recovery->v_incr ?? (old('v_incr') ?? '') }}" placeholder="">
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
                        <label>NOI</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="noi" id="noi"
                            value="{{ $member_var_info->noi ?? $member_recovery->noi ?? (old('noi') ?? '') }}" placeholder="">
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
                        <label>Total</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="total" id="total"
                            value="{{ $member_recovery->total ?? (old('total') ?? '') }}" placeholder="">
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
                        <label>Stop</label>
                    </div>
                    <div class="col-md-12">
                        <select class="form-select" name="stop" id="stop">
                            <option value="">Select</option>
                            <option value="Yes"
                                {{ (isset($member_recovery->stop) && $member_recovery->stop == 'Yes') || old('stop') == 'Yes' ? 'selected' : '' }}>
                                Yes</option>
                            <option value="No"
                                {{ (isset($member_recovery->stop) && $member_recovery->stop == 'No') || old('stop') == 'No' ? 'selected' : '' }}>
                                No</option>
                        </select>
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="form-group col-md-3 mb-2">
                            <button type="submit" class="listing_add">Save</button>
                        </div>
                        <div class="form-group col-md-3 mb-2">
                            <a class="delete_acma"  id="delete-recovery" data-id="{{ isset($member_recovery->id) ? $member_recovery->id :'#' }}">
                                <button type="button" class="delete-btn-1">Delete</button>
                            </a>

                        </div>
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
