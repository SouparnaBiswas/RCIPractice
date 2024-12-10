@if (isset($edit))
    <form action="{{ route('pm-levels.update', $pm_level->id) }}" method="POST" id="pm-level-edit-form">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Year</label>
                            </div>
                            <div class="col-md-12">
                                <select name="year" class="form-select" id="year">
                                    <option value="">Select Year</option>
                                    @foreach($financialYears as $financialYear)
                                        <option value="{{ $financialYear }}" {{ $pm_level->year == $financialYear ? 'selected':'' }}>{{ $financialYear }}</option>
                                    @endforeach
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
                                    <option value="01"  {{ $pm_level->month == '01' ? 'selected' : ''}}>January</option>
                                    <option value="02"  {{ $pm_level->month == '02' ? 'selected' : ''}}>February</option>
                                    <option value="03"  {{ $pm_level->month == '03' ? 'selected' : ''}}>March</option>
                                    <option value="04"  {{ $pm_level->month == '04' ? 'selected' : ''}}>April</option>
                                    <option value="05"  {{ $pm_level->month == '05' ? 'selected' : ''}}>May</option>
                                    <option value="06"  {{ $pm_level->month == '06' ? 'selected' : ''}}>June</option>
                                    <option value="07" {{ $pm_level->month == '07' ? 'selected' : ''}}>July</option>
                                    <option value="08" {{ $pm_level->month == '08' ? 'selected' : ''}}>August</option>
                                    <option value="09" {{ $pm_level->month == '09' ? 'selected' : ''}}>September</option>
                                    <option value="10" {{ $pm_level->month == '10' ? 'selected' : ''}}>October</option>
                                    <option value="11" {{ $pm_level->month == '11' ? 'selected' : ''}}>November</option>
                                    <option value="12" {{ $pm_level->month == '12' ? 'selected' : ''}}>December</option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Payband</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="payband" id="payband">
                                    @foreach($pay_bands as $pay_band)
                                        <option value="{{ $pay_band->id }}" {{ $pm_level->payband == $pay_band->id ? 'selected':'' }}>{{ $pay_band->high_band }} @if($pay_band->low_band) - {{ $pay_band->low_band }} @endif</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>PM Level Value</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="value" id="value" value="{{ $pm_level->value }}" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Entry Pay</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="entry_pay" id="entry_pay" value="{{ $pm_level->entry_pay }}"  placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Var Incr.</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="var_incr" id="var_incr" value="{{ $pm_level->var_incr }}"  placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>NOI</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="noi" id="noi" value="{{ $pm_level->noi }}"  placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Status</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="status" id="status">
                                    <option value="1" {{ $pm_level->status == 1 ? 'selected' : ''}}>Active</option>
                                    <option value="0" {{ $pm_level->status == 0 ? 'selected' : ''}}>Inactive</option>
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
@else
    <form action="{{ route('pm-levels.store') }}" method="POST" id="pm-levels-create-form">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    {{-- <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Pay Commission</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="pay_commission" id="pay_commission">
                                    <option value="">Select Commission</option>
                                    @foreach($pay_commissions as $pay_commission)
                                        <option value="{{ $pay_commission->id }}">{{ $pay_commission->name }}</option>
                                    @endforeach
                                </select>    
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div> --}}

                    
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Year</label>
                            </div>
                            <div class="col-md-12">
                                <select name="year" class="form-select" id="year">
                                    <option value="">Select Year</option>
                                    @foreach($financialYears as $financialYear)
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
                                <label>Month</label>
                            </div>
                            <div class="col-md-12">
                                <select name="month" class="form-select" id="month">
                                    <option value="">Select Month</option>
                                    <option value="01">January</option>
                                    <option value="02">February</option>
                                    <option value="03">March</option>
                                    <option value="04">April</option>
                                    <option value="05">May</option>
                                    <option value="06">June</option>
                                    <option value="07">July</option>
                                    <option value="08">August</option>
                                    <option value="09">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Payband</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="payband" id="payband">
                                    <option value="">Select Payband</option>
                                   
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>PM Level Value</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="value" id="value" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Entry Pay</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="entry_pay" id="entry_pay"  placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Var Incr.</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="var_incr" id="var_incr"  placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>NOI</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="noi" id="noi"  placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
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
