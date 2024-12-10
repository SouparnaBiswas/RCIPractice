<form action="{{ route('penal-interest.store') }}" method="POST" id="penal-interest-add-form">
    @csrf

    <div class="row">
        <div class="col-md-12">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="form-group col-md-12 mb-2">
                        <div class="row align-items-center">


                            <div class="form-group col-md-4 mb-2">
                                <div class="col-md-12">
                                    <label>Member</label>
                                </div>
                                <div class="col-md-12">
                                    <select name="member_id" id="member_id" class="form-select search-select-box">
                                        <option value="">Select Member</option>
                                        @foreach ($memberloans as $member)
                                            <option value="{{ $member->member_id }}">
                                                {{ $member->member->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('member_id'))
                                        <div class="error" style="color:red;">
                                            {{ $errors->first('member_id') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-4 mb-2">
                                <div class="col-md-12">
                                    <label>Loan Type</label>
                                </div>
                                <div class="col-md-12">
                                    <select name="loan_type" id="loan_type" class="form-select">
                                        {{-- <option value="">Select loan</option> --}}

                                    </select>
                                    @if ($errors->has('loan_type'))
                                        <div class="error" style="color:red;">
                                            {{ $errors->first('loan_type') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-4 mb-2">
                                <div class="col-md-12">
                                    <label>Interest Rate</label>
                                </div>
                                <div class="col-md-12">
                                    <input type="text" name="interest_rate" id="interest_rate" class="form-control"
                                        placeholder="Interest Rate" readonly>
                                    <input type="hidden" name="principal_amount" id="principal_amount"
                                        class="form-control">
                                    @if ($errors->has('interest_rate'))
                                        <div class="error" style="color:red;">
                                            {{ $errors->first('interest_rate') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-4 mb-2">
                                <div class="col-md-12">
                                    <label>No. of Days</label>
                                </div>
                                <div class="col-md-12">
                                    <input type="text" name="days" id="days" class="form-control"
                                        placeholder="No. of Days">
                                    @if ($errors->has('days'))
                                        <div class="error" style="color:red;">
                                            {{ $errors->first('days') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-4 mb-2">
                                <div class="col-md-12">
                                    <label>Status</label>
                                </div>
                                <div class="col-md-12">
                                    <select name="status" id="status" class="form-select">
                                        <option value="">Select Status</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                    @if ($errors->has('status'))
                                        <div class="error" style="color:red;">
                                            {{ $errors->first('status') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-4 mb-2">
                                <div class="col-md-12">
                                    <label>Penal Interest Amount</label>
                                </div>
                                <div class="col-md-12">
                                    <input type="text" name="penal_interest" id="penal_interest" class="form-control"
                                        placeholder="Penal Interest Amount" readonly>
                                    @if ($errors->has('penal_interest'))
                                        <div class="error" style="color:red;">
                                            {{ $errors->first('penal_interest') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-4 mb-2">
                                <div class="col-md-12">
                                    <label>Year</label>
                                </div>
                                <div class="col-md-12">
                                    <select name="year" class="form-select" id="year">
                                        <option value="">Select Year</option>
                                        @for ($i = date('Y'); $i >= 1958; $i--)
                                            <option value="{{ $i }}">
                                                {{ $i }}</option>
                                        @endfor
                                    </select>
                                    @if ($errors->has('penal_interest'))
                                        <div class="error" style="color:red;">
                                            {{ $errors->first('penal_interest') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-3 mb-2">
                                <div class="col-md-12">
                                    <label>Month</label>
                                </div>
                                <div class="col-md-12">
                                    <select name="month" class="form-select" id="month">
                                        <option value="">Select Month</option>
                                    </select>
                                    @if ($errors->has('penal_interest'))
                                        <div class="error" style="color:red;">
                                            {{ $errors->first('penal_interest') }}</div>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="mb-1">
                        <button type="submit" class="listing_add">Add</button>
                    </div>
                    <div class="mb-1">
                        <a href="" class="listing_exit">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- save cancel button design in right corner --}}
    {{-- <div class="row">
        <div class="col-md-12">
            <div class="row justify-content-end">
                <div class="col-md-3">
                    <div class="row">
                        <div class="form-group col-md-6 mb-2">
                            <button type="submit" class="listing_add">Add</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</form>
