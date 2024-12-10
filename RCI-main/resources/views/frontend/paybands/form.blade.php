@if (isset($edit))
    <form action="{{ route('paybands.update', $payband->id) }}" method="POST" id="payband-edit-form">
        @method('PUT')
        @csrf
        <div class="row">
        <div class="col-md-9">
            <div class="row">
                <div class="form-group col-md-5 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Financial year</label>
                        </div>
                        <div class="col-md-12">
                            <select class="form-select" name="financial_year" id="financial_year">
                                <option value="">Select Financial year</option>
                                @foreach ($financialYears as $financialYear)
                                    <option value="{{ $financialYear}}" {{$payband->year == $financialYear ? 'selected':''}}>{{ $financialYear }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-7 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>PayBand</label>
                        </div>
                        <div class="col-md-12">
                            <select class="form-select" name="payband_type_id" id="payband_type_id">
                                <option value="">Select PayBand</option>
                                @foreach ($payband_types as $paybandType)
                                    <option value="{{ $paybandType->id }}" {{ ($payband->payband_type_id == $paybandType->id) ? 'selected' : '' }}>{{ $paybandType->payband_type }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger" id="payband_type_id-error"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-5 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>High Band</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" value="{{ $payband->high_band }}" name="high_band"
                                id="high_band" placeholder="">
                            <span class="text-danger" id="high_band-error"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-7 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Low Band</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" value="{{ $payband->low_band }}" name="low_band"
                                id="low_band" placeholder="">
                            <span class="text-danger" id="low_band-error"></span>
                        </div>
                    </div>
                </div>

               


                {{-- <div class="form-group col-md-5 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Grade Pay</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" value="{{ $payband->grade_pay }}" name="grade_pay"
                                id="grade_pay" placeholder="">
                            <span class="text-danger" id="grade_pay-error"></span>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
        <div class="col-md-3">
          <label></label>   
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
    <form action="{{ route('paybands.store') }}" method="POST" id="payband-create-form">
        @csrf
        <div class="row">
        <div class="col-md-9">
            <div class="row">
                 {{-- financialYears field --}}
                 <div class="form-group col-md-5 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Financial year</label>
                        </div>
                        <div class="col-md-12">
                            <select class="form-select" name="financial_year" id="financial_year">
                                <option value="">Select Financial year</option>
                                @foreach ($financialYears as $financialYear)
                                    <option value="{{ $financialYear}}">{{ $financialYear }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-7 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>PayBand</label>
                        </div>
                        <div class="col-md-12">
                            <select class="form-select" name="payband_type_id" id="payband_type_id">
                                <option value="">Select PayBand</option>
                                @foreach ($payband_types as $paybandType)
                                    <option value="{{ $paybandType->id }}">{{ $paybandType->payband_type }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-5 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>High Band</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control"  name="high_band"
                                id="high_band" placeholder="">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-7 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Low Band</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control"  name="low_band"
                                id="low_band" placeholder="">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>

                {{-- <div class="form-group col-md-5 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Grade Pay</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control"  name="grade_pay"
                                id="grade_pay" placeholder="">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
        <div class="col-md-3">
             <label></label>   
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
