

@if (isset($edit))

<form action="{{ route('members.loan.create') }}" id="member-loan-edit-form" method="post">
    @csrf
    
    <input type="text" name="member_id" value="vxcfxc">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Loan Name</label>
                    </div>
                    <div class="col-md-12">
                        <select class="form-select" name="loan_name" id="loan_name">
                            @foreach ($loans as $loan)
                                <option value="{{ $loan->id }}">
                                    {{ $loan->loan_name }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Present InstNo</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="present_inst_no" value="{{  }}" id="present_inst_no"
                            value="" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Tot No of Inst</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="tot_no_of_inst" id="tot_no_of_inst"
                            value="" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Remarks</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="remark" id="remark" value=""
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
                        <label>Inst Amt</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="inst_amount" id="inst_amount" value=""
                            placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Tot Amt</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="total_amount" id="total_amount" value=""
                            placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Balance</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="balance" id="balance" value=""
                            placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-end">
        <div class="col-md-6">
            <div class="row justify-content-end">
                <div class="form-group col-md-6 mb-2">
                    <button type="submit" class="listing_add">Save</button>
                </div>
                <div class="form-group col-md-6 mb-2">
                    <button type="" class="delete-btn-1">Delete</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-end">
        <div class="col-md-6">
            <div class="row justify-content-end">
                <div class="form-group col-md-4 mb-2">
                    <a href="{{ route('members.create') }}"><button type="button"
                        class="another-btn">Another</button></a>
                </div>
                <div class="form-group col-md-4 mb-2">
                    <button type="submit" class="listing_add">Save</button>
                </div>
                <div class="form-group col-md-4 mb-2">
                    <button type="reset" class="listing_exit">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</form>

@else

<form action="{{ route('members.loan.create') }}" id="member-loan-info-form" method="post">
    @csrf
    
    <input type="text" name="member_id" value="create">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Loan Name</label>
                    </div>
                    <div class="col-md-12">
                        <select class="form-select" name="loan_name" id="loan_name">
                            @foreach ($loans as $loan)
                                <option value="{{ $loan->id }}">
                                    {{ $loan->loan_name }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Present InstNo</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="present_inst_no" value="{{  }}" id="present_inst_no"
                            value="" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Tot No of Inst</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="tot_no_of_inst" id="tot_no_of_inst"
                            value="" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Remarks</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="remark" id="remark" value=""
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
                        <label>Inst Amt</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="inst_amount" id="inst_amount" value=""
                            placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Tot Amt</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="total_amount" id="total_amount" value=""
                            placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Balance</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="balance" id="balance" value=""
                            placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-end">
        <div class="col-md-6">
            <div class="row justify-content-end">
                <div class="form-group col-md-6 mb-2">
                    <button type="submit" class="listing_add">Save</button>
                </div>
                <div class="form-group col-md-6 mb-2">
                    <button type="#" class="delete-btn-1">Delete</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-end">
        <div class="col-md-6">
            <div class="row justify-content-end">
                <div class="form-group col-md-4 mb-2">
                    <a href="{{ route('members.create') }}"><button type="button"
                        class="another-btn">Another</button></a>
                </div>
                <div class="form-group col-md-4 mb-2">
                    <button type="submit" class="listing_add">Save</button>
                </div>
                <div class="form-group col-md-4 mb-2">
                    <button type="reset" class="listing_exit">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</form>


@endif
