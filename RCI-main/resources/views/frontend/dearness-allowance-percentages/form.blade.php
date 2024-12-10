@if (isset($edit))
    <form action="{{ route('dearness-allowance-percentages.update', $dearnessAllowancePercentage->id) }}" method="POST" id="da-percentage-edit-form">
        @method('PUT')
        @csrf
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Financial Year</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="financial_year" id="financial_year">
                                    <option value="">Select Year</option>
                                    @foreach ($financialYears as $financialYear)
                                        <option value="{{ $financialYear }}" {{ ($dearnessAllowancePercentage->financial_year == $financialYear) ? 'selected' : '' }}>{{ $financialYear }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Financial Year Quarter</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="quarter" id="quarter">
                                    <option value="">Select Quarter</option>
                                    <option value="q1" {{ ($dearnessAllowancePercentage->quarter == 'q1') ? 'selected' : '' }}>Q1</option>
                                    <option value="q2" {{ ($dearnessAllowancePercentage->quarter == 'q2') ? 'selected' : '' }}>Q2</option>
                                    <option value="q3" {{ ($dearnessAllowancePercentage->quarter == 'q3') ? 'selected' : '' }}>Q3</option>
                                    <option value="q4" {{ ($dearnessAllowancePercentage->quarter == 'q4') ? 'selected' : '' }}>Q4</option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Percentage</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="percentage" id="percentage" value="{{ $dearnessAllowancePercentage->percentage }}" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Pay Commision name</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="pay_commission_id" id="pay_commission_id">
                                    <option value="">Select Pay Commision</option>
                                    @foreach ($payCommissions as $paycommission)
                                        <option value="{{ $paycommission->id }}" {{ ($dearnessAllowancePercentage->pay_commission_id == $paycommission->id) ? 'selected' : '' }}>{{ $paycommission->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Year</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="year" id="year" value="{{ $dearnessAllowancePercentage->year }}" readonly>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Month</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="month" id="month" value="{{ $dearnessAllowancePercentage->month }}" readonly>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Status</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="status" id="status">
                                    <option value="1" {{ ($dearnessAllowancePercentage->is_active == 1) ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ ($dearnessAllowancePercentage->is_active == 0) ? 'selected' : '' }}>Inactive</option>
                                </select>
                                <span class="text-danger"></span>
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
    <form action="{{ route('dearness-allowance-percentages.store') }}" method="POST" id="da-percentage-create-form">
        @csrf
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Financial Year</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="financial_year" id="financial_year">
                                    <option value="">Select Year</option>
                                    @foreach ($financialYears as $financialYear)
                                        <option value="{{ $financialYear }}">{{ $financialYear }}</option>
                                        
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Financial Year Quarter</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="quarter" id="quarter">
                                    <option value="">Select Quarter</option>
                                    <option value="q1">Q1</option>
                                    <option value="q2">Q2</option>
                                    <option value="q3">Q3</option>
                                    <option value="q4">Q4</option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Percentage</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="percentage" id="percentage" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Pay Commision name</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="pay_commission_id" id="pay_commission_id">
                                    <option value="">Select Pay Commision</option>
                                    @foreach ($payCommissions as $paycommission)
                                        <option value="{{ $paycommission->id }}">{{ $paycommission->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Year</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="year" id="year">
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
                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Month</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="month" id="month">
                                    <option value="">Select Month</option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Status</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="status" id="status">
                                    <option value="">Select Status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                                <span class="text-danger"></span>
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
