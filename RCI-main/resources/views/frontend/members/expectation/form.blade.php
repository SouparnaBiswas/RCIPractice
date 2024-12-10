@if (isset($edit))
    <form action="{{ route('members.expectation.update') }}" id="member-edit-expectation-form" method="post">
        @csrf

        <input type="hidden" name="member_expectation_id" id="member_edit_exp_id" value="{{ $member_expectation->id }}">
        <input type="hidden" name="member_id" id="exp_member_id" value="{{  $member_expectation->member_id }}">
        <div class="form-group mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>Rule Name</label>
                </div>
                <div class="col-md-12">
                    {{-- <input type="text" class="form-control" name="rule_name" id="exp_rule_name"
                        value="{{ $member_expectation->rule_name }}" placeholder=""> --}}
                    <select class="form-select" name="" id="exp_rule_edit" disabled>
                        @foreach($rules as $rule)
                            <option value="{{ $rule->rule_name }}" {{  $rule->rule_name == $member_expectation->rule_name ? 'selected' : '' }}>{{ $rule->rule_name }}</option>
                        @endforeach
                    </select>
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Percent </label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="percent" id="exp_percent"
                                value="{{ $member_expectation->percent }}"  readonly>
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Amount</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="amount" id="exp_amount"
                                value="{{ $member_expectation->amount }}" readonly>
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Year</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text"  value="{{ $member_expectation->year }}" name="year" class="form-control" id="exp_year" readonly>
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Month</label>
                        </div>
                        <div class="col-md-12">
                                <input type="text"  value="{{ $member_expectation->month }}" name="month" class="form-control" id="exp_month" readonly>
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>Remark</label>
                </div>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="remark" id="exp_remark" value="{{ $member_expectation->remark }}" >
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="row justify-content-end">
                    <div class="col-md-9">
                        <div class="row justify-content-end">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <div class="row justify-content-end">
                    <div class="col-md-9">
                        <div class="row justify-content-end">
                            <div class="form-group col-md-3 mb-2">
                                <a href="{{ route('members.create') }}"><button type="button"
                                    class="another-btn">Another</button></a>
                            </div>
                            <div class="form-group col-md-3 mb-2">
                                <button type="submit" class="listing_add" id="button-update">Update</button>
                            </div>
                            <div class="form-group col-md-3 mb-2">
                                <button type="button" id="expectation-delete" class="delete-btn-1" data-id="{{ isset($member_expectation->id) ? $member_expectation->id :'#' }}">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@else
    <form action="{{ route('members.expectation.store') }}" id="member-expectation-form" method="post">
        @csrf

        <input type="hidden" name="member_id" value="{{ $member->id }}">

        <div class="form-group mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>Rule Name</label>
                </div>
                <div class="col-md-12">
                    <select class="form-select exp_rule_create" name="rule_name" id="exp_rule_name">
                        <option value="">Select</option>
                        {{-- <input type="text" class="form-control" name="rule_name" id="exp_rule_name"> --}}
                        @foreach($rules as $rule)
                            <option value="{{ $rule->rule_name }},{{ $rule->id }}">{{ $rule->rule_name }}</option>
                        @endforeach
                    </select>
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Percent </label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="percent" id="exp_percent" value=""
                                placeholder="">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Amount</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="amount" id="exp_amount" 
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
                            <label>Year</label>
                        </div>
                        <div class="col-md-12">
                            {{-- <select class="form-select" name="year" id="exp_year"> --}}
                             <input type="text" class="form-control" name="year" id="exp_year" >  
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Month</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="month" id="exp_month" >  
                            {{-- <select class="form-select" name="month" id="exp_month">
                                <option value="">Select</option>
                                <option value="1">January</option>
                                <option value="2">February</option>
                                <option value="3">March</option>
                                <option value="4">April</option>
                                <option value="5">May</option>
                                <option value="6">June</option>
                                <option value="7">July</option>
                                <option value="8">August</option>
                                <option value="9">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select> --}}
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>Remark</label>
                </div>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="remark" id="exp_remark">
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
        {{-- <div class="row mt-3">
            <div class="col-md-12">
                <div class="row justify-content-end">
                    <div class="col-md-9">
                        <div class="row justify-content-end">
                            <div class="form-group col-md-3 mb-2">
                                <button type="submit" class="listing_add">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="row mt-3">
            <div class="col-md-12">
                <div class="row justify-content-end">
                    <div class="col-md-9">
                        <div class="row justify-content-end">
                            <div class="form-group col-md-3 mb-2">
                                <a href="{{ route('members.create') }}"><button type="button"
                                    class="another-btn">Another</button></a>
                            </div>
                            <div class="form-group col-md-3 mb-2">
                                <button type="submit" class="listing_add">Save</button>
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
@endif
