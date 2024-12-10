@if (isset($edit))
    <form action="{{ route('member-pension.update', $member_pension->id) }}" method="POST" id="pension-edit-form">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="row">

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Member Name</label>
                            </div>
                            <div class="col-md-12">
                                <select name="member_id" class="form-select" id="member_id">
                                    <option value="">Select Member</option>
                                    @foreach ($members as $member)
                                        <option value="{{ $member->id }}" {{ ($member_pension->user_id == $member->id) ? 'selected' : '' }}>
                                            {{ $member->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>NPSC Sub. Amount</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="npsc_sub_amt" id="npsc_sub_amt" value="{{ $member_pension->npsc_sub_amt }}" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>NPSG Sub. Amount</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="npsg_sub_amt" id="npsg_sub_amt" placeholder="" value="{{ $member_pension->npsg_sub_amt }}">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>NPSC EOL Deduction Amt</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="npsc_eol_deduction_amt" id="npsc_eol_deduction_amt" placeholder="" value="{{ $member_pension->npsc_eol_deduction_amt }}">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>NPSG EOL Deduction Amt</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="npsg_eol_deduction_amt" id="npsg_eol_deduction_amt" placeholder="" value="{{ $member_pension->npsg_eol_deduction_amt }}">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>NPSC EOL Credit Amt</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="npsc_eol_credit_amt" id="npsc_eol_credit_amt" placeholder="" value="{{ $member_pension->npsc_eol_credit_amt }}">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>NPSG EOL Credit Amt</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="npsg_eol_credit_amt" id="npsg_eol_credit_amt" placeholder="" value="{{ $member_pension->npsg_eol_credit_amt }}">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>NPSC HPL Amt</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="npsc_hpl_amt" id="npsc_hpl_amt" placeholder="" value="{{ $member_pension->npsc_hpl_amt }}">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>NPSG HPL Amt</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="npsg_hpl_amt" id="npsg_hpl_amt" placeholder="" value="{{ $member_pension->npsg_hpl_amt }}">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Year</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="year" id="year" value="{{ $member_pension->year }}" readonly>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Month</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="month" id="month" value="{{ $member_pension->month }}" readonly>
                                @if ($errors->has('month'))
                                    <div class="error" style="color:red;">
                                        {{ $errors->first('month') }}</div>
                                @endif
                                
                            </div>
                        </div>
                    </div> 
                </div>
            
            </div>
            <div class="col-md-2">
                <div class="mb-1">
                    <button type="submit" class="listing_add">Update</button>
                </div>
                <div class="mb-1">
                    <a href="" class="listing_exit">Back</a>
                </div>
            </div>
        </div>
    </form>
@else
    <form action="{{ route('member-pension.store') }}" method="POST" id="pension-create-form">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="row">

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Member Name</label>
                            </div>
                            <div class="col-md-12">
                                <select name="member_id" class="form-select search-select-box" id="member_id">
                                    <option value="">Select Member</option>
                                    @foreach ($members as $member)
                                        <option value="{{ $member->id }}">
                                            {{ $member->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>NPSC Sub. Amount</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="npsc_sub_amt" id="npsc_sub_amt" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>NPSG Sub. Amount</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="npsg_sub_amt" id="npsg_sub_amt" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>NPSC EOL Deduction Amt</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="npsc_eol_deduction_amt" id="npsc_eol_deduction_amt" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>NPSG EOL Deduction Amt</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="npsg_eol_deduction_amt" id="npsg_eol_deduction_amt" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>NPSC EOL Credit Amt</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="npsc_eol_credit_amt" id="npsc_eol_credit_amt" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>NPSG EOL Credit Amt</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="npsg_eol_credit_amt" id="npsg_eol_credit_amt" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>NPSC HPL Amt</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="npsc_hpl_amt" id="npsc_hpl_amt" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>NPSG HPL Amt</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="npsg_hpl_amt" id="npsg_hpl_amt" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Year</label>
                            </div>
                            <div class="col-md-12">
                                <select name="year" class="form-select" id="year">
                                    <option value="">Select Year</option>
                                    @for ($i = date('Y'); $i >= 1950; $i--)
                                        <option value="{{ $i }}">
                                            {{ $i }}</option>
                                    @endfor
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Month</label>
                            </div>
                            <div class="col-md-12">
                                <select name="month" class="form-select" id="month">
                                    <option value="">Select Month</option>
                                </select>
                                @if ($errors->has('month'))
                                    <div class="error" style="color:red;">
                                        {{ $errors->first('month') }}</div>
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
    </form>
@endif
