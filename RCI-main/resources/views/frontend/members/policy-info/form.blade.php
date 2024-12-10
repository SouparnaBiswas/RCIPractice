@if (isset($edit))

    <form action="{{ route('members.policy-info.update') }}" id="member-edit-policy-form" method="post">
        @csrf

        <input type="hidden" name="member_policy_id" id="member_policy_id" value="{{ $member_policy->id }}">
        <input type="hidden" name="member_id" id="policy_member_id" value="{{  $member_policy->member_id }}">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Policy Name</label>
                        </div>
                        <div class="col-md-12">
                            <select class="form-select" name="policy_name" id="policy_name">
                                <option value="">Select</option>
                                @foreach ($policies as $policy)
                                    <option value="{{ $policy->policy_name }}"
                                        {{ isset($member_policy->policy_name) && $policy->policy_name == $member_policy->policy_name ? 'selected' : '' }}>
                                        {{ $policy->policy_name }}</option>
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
                            <label>Policy No</label>
                        </div>
                        <div class="col-md-12">
                            <select class="form-select" name="policy_no" id="policy_no">
                                <option value="">Select</option>
                                @foreach ($policies as $policy)
                                    <option value="{{ $policy->policy_no }}"
                                        {{ isset($member_policy->policy_no) && $policy->policy_no == $member_policy->policy_no ? 'selected' : '' }}>
                                        {{ $policy->policy_no }}</option>
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
                            <label>Amount</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="amount" id="amount"
                                value="{{ $member_policy->amount }}" placeholder="">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Rec Stop</label>
                        </div>
                        <div class="col-md-12">
                            <select class="form-select" name="rec_stop" id="rec_stop">
                                <option value="Yes" {{ $member_policy->rec_stop == 'Yes' ? 'selected' : '' }}>Yes
                                </option>
                                <option value="No" {{ $member_policy->rec_stop == 'No' ? 'selected' : '' }}>No
                                </option>
                            </select>
                            <span class="text-danger"></span>
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
                                    <button type="submit" class="listing_add" id="policy-update">update</button>
                                </div>
                                
                                <div class="form-group col-md-3 mb-2">
                                    <button type="reset" class="listing_exit">Cancel</button>
                                </div>
                                <div class="form-group col-md-3 mb-2">
                                    <button type="button" id="policy-delete" class="delete-btn-1" data-id="{{ isset($member_policy->id) ? $member_policy->id :'#' }}">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="row mt-3">
                <div class="col-md-12">
                    <div class="row justify-content-end">
                        <div class="col-md-6">
                            <div class="row justify-content-end">
                                <div class="form-group col-md-3 mb-2">
                                    <button type="submit" class="another-btn">Another</button>
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
            </div> --}}
        </div>
    </form>
@else
    <form action="{{ route('members.policy-info.submit') }}" id="member-create-policy-form" method="post">
        @csrf

        <input type="hidden" name="member_id" value="{{ $member->id }}">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Policy Name</label>
                        </div>
                        <div class="col-md-12">
                            <select class="form-select" name="policy_name" id="policy_name">
                                <option value="">Select</option>
                                @foreach ($policies as $policy)
                                    <option value="{{ $policy->policy_name }}">{{ $policy->policy_name }}</option>
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
                            <label>Policy No</label>
                        </div>
                        <div class="col-md-12">
                            <select class="form-select" name="policy_no" id="policy_no">
                                <option value="">Select</option>
                                @foreach ($policies as $policy)
                                    <option value="{{ $policy->policy_no }}">{{ $policy->policy_no }}</option>
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
                            <label>Amount</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="amount" id="amount"
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
                            <label>Rec Stop</label>
                        </div>
                        <div class="col-md-12">
                            <select class="form-select" name="rec_stop" id="rec_stop">
                                <option value="">Select</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="row mt-3">
                <div class="col-md-12">
                    <div class="row justify-content-end">
                        <div class="col-md-6">
                            <div class="row justify-content-end">
                                <div class="form-group col-md-3 mb-2">
                                    <button type="submit" class="listing_add">Save</button>
                                </div>
                                <div class="form-group col-md-3 mb-2">
                                    <button type="button" id="policy-delete" class="delete-btn-1" data-id="{{ isset($member_policy->id) ? $member_policy->id :'#' }}">Delete</button>
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
                                {{-- <div class="form-group col-md-3 mb-2">
                                    <a href="{{ route('members.create') }}" >
                                    <button type="button" class="another-btn">Another</button></a>
                                </div> --}}
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
        </div>
    </form>
@endif
