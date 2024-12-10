@if (isset($edit))
    <form action="{{ route('member-gpf.update', $member_gpf->id) }}" method="POST" id="gpfs-edit-form">
        @method('PUT')
        @csrf
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Members</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="" id="member_id" disabled>
                                    <option value="">Select member</option>
                                    @foreach($members as $member)
                                        <option value="{{ $member->id }}"{{ $member_gpf->member_id == $member->id ? 'selected' : ''}}>{{ $member->name }}</option>
                                    @endforeach
                                </select>
                                <input type="hidden"  value="{{$member_gpf->member_id}}" name="member_id">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Finantial Year</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="finantial_year" id="finantial_year">
                                    <option value="">Select Finantial Year</option>
                                    @foreach($financialYears as $finantial_year)
                                        <option value="{{ $finantial_year }}" {{ $member_gpf->finantial_year == $finantial_year ? 'selected' : ''}}>{{ $finantial_year }}</option>
                                    @endforeach
                                </select>
                                {{-- <input type="text" class="form-control" name="finantial_year" value="{{ $member_gpf->finantial_year }}" placeholder="yyyy - yyyy" style=""> --}}
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
                            <select name="year" class="form-select" id="year">
                                <option value="">Select Year</option>
                                @for ($i = date('Y'); $i >= 1950; $i--)
                                    <option value="{{ $i }}" {{ $member_gpf->year == $i ? 'selected' :''}}>
                                        {{ $i }}</option>
                                @endfor
                            </select>
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
                                    <option value="Jan" {{ $member_gpf->month == "Jan" ? 'selected': "" }}>Jan</option>
                                    <option value="Feb" {{ $member_gpf->month == "Feb" ? 'selected': "" }}>Feb</option>
                                    <option value="March" {{ $member_gpf->month == "March" ? 'selected': "" }}>March</option>
                                    <option value="April" {{ $member_gpf->month == "April" ? 'selected': "" }}>April</option>
                                    <option value="May" {{ $member_gpf->month == "May" ? 'selected': "" }}>May</option>
                                    <option value="June" {{ $member_gpf->month == "June" ? 'selected': "" }}>June</option>
                                    <option value="July" {{ $member_gpf->month == "July" ? 'selected': "" }}>July</option>
                                    <option value="Aug" {{ $member_gpf->month == "Aug" ? 'selected': "" }}>Aug</option>
                                    <option value="Sept" {{ $member_gpf->month == "Sept" ? 'selected': "" }}>Sept</option>
                                    <option value="Oct" {{ $member_gpf->month == "Oct" ? 'selected': "" }}>Oct</option>
                                    <option value="Nov" {{ $member_gpf->month == "Nov" ? 'selected': "" }}>Nov</option>
                                    <option value="Dec" {{ $member_gpf->month == "Dec" ? 'selected': "" }}>Dec</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Monthly Subscription</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="monthly_subscription" value="{{ $member_gpf->monthly_subscription }}" id="monthly_subscription" >
                                <span class="text-danger" id="subscription_error_message"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Refund of Advance(If Any)</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="refund" value="{{ $member_gpf->refund }}" id="refund" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Openning Balance</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" value="{{ $member_gpf->openning_balance }}" name="openning_balance" id="" placeholder="" style="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-8 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Closing Balance</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" value="{{ $member_gpf->closing_balance }}" name="closing_balance" id="" placeholder="" style="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="mb-1">
                    <button type="submit" class="listing_add gpf_sub_btn">Update</button>
                </div>
                <div class="mb-1">
                    <a href="" class="listing_exit">Back</a>
                </div>
            </div>
        </div>
    </form>
@else
    <form action="{{ route('member-gpf.store')}}" method="POST" id="member-gpf-create-form">
        @csrf
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Members</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select search-select-box" name="member_id" id="member_id" >
                                    <option value="">Select member</option>
                                    @foreach($members as $member)
                                        <option value="{{ $member->id }}">{{ $member->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Finantial Year</label>
                            </div>
                            <div class="col-md-12">
                                {{-- <input type="text" class="form-control" name="finantial_year"  placeholder="yyyy - yyyy" style=""> --}}
                                <select class="form-select" name="finantial_year" id="finantial_year">
                                    <option value="">Select Finantial Year</option>
                                    @foreach($financialYears as $finantial_year)
                                        <option value="{{ $finantial_year }}" >{{ $finantial_year }}</option>
                                    @endforeach
                                </select>
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
                            <select name="year" class="form-select" id="year">
                                <option value="">Select Year</option>
                                @for ($i = date('Y'); $i >= 1958; $i--)
                                    <option value="{{ $i }}">
                                        {{ $i }}</option>
                                @endfor
                            </select>
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
                                    <option value="Jan">Jan</option>
                                    <option value="Feb">Feb</option>
                                    <option value="March">March</option>
                                    <option value="April">April</option>
                                    <option value="May">May</option>
                                    <option value="June">June</option>
                                    <option value="July">July</option>
                                    <option value="Aug">Aug</option>
                                    <option value="Sept">Sept</option>
                                    <option value="Oct">Oct</option>
                                    <option value="Nov">Nov</option>
                                    <option value="Dec">Dec</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Monthly Subscription</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="monthly_subscription" id="monthly_subscription" readonly>
                                <span class="text-danger" id="subscription_error_message"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Refund of Advance(If Any)</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="refund" id="refund" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Openning Balance</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="openning_balance" id="" placeholder="" style="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Closing Balance</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="closing_balance" id="" placeholder="" style="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="mb-1">
                    <button type="submit" class="listing_add gpf_sub_btn">Add</button>
                </div>
                <div class="mb-1">
                    <a href="" class="listing_exit">Back</a>
                </div>
            </div>
        </div>
    </form>
@endif
