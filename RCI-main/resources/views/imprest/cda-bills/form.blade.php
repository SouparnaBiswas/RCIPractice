@if (isset($edit))
    <form action="{{ route('cda-bills.update', $cdaBill->id) }}" method="POST" id="cda-bills-edit-form">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Pc No</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="pc_no" id="pc_no"
                                    value="{{ $cdaBill->pc_no ?? '' }}" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Project</label>
                            </div>
                            <div class="col-md-12">
                                <select name="project_id" id="project_id" class="form-select">
                                    <option value="">Select Project</option>
                                    @foreach ($projects as $project)
                                        <option value="{{ $project->id }}" {{ $cdaBill->project_id == $project->id ? 'selected' : '' }}>{{ $project->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Adv No</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="adv_no" id="adv_no"
                                    value="{{ $cdaBill->adv_no ?? '' }}" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Adv Dt</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="adv_date" id="adv_date"
                                    value="{{ $cdaBill->adv_date ?? '' }}" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Adv Amt</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="adv_amount" id="adv_amount"
                                    value="{{ $cdaBill->adv_amount ?? '' }}" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Sett. Vr Dt</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="var_date" id="var_date"
                                    value="{{ $cdaBill->var_date ?? '' }}" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Sett. Amt</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="var_amount" id="var_amount"
                                    value="{{ $cdaBill->var_amount ?? '' }}" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Crv No</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="crv_no" id="crv_no" value="{{ $cdaBill->crv_no ?? '' }}"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                   
                {{--  <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Vr Type</label>
                            </div>
                            <div class="col-md-12">
                                <select name="var_type_id" id="var_type_id" class="form-select">
                                    <option value="">Select</option>
                                    @foreach ($variable_types as $variable_type)
                                        <option value="{{ $variable_type->id }}">{{ $variable_type->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div> --}}
                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Firm Name</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="firm_name" id="firm_name"
                                    placeholder="" value="{{ $cdaBill->firm_name ?? '' }}">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>CDA Bill No</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="cda_bill_no" id="cda_bill_no"
                                    placeholder="" value="{{ $cdaBill->cda_bill_no ?? '' }}">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>CDA Bill Date</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="cda_bill_date" id="cda_bill_date"
                                    placeholder="" value="{{ $cdaBill->cda_bill_date ?? '' }}">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>CDA Bill Amount</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="cda_bill_amount" id="cda_bill_amount"
                                    placeholder="" value="{{ $cdaBill->cda_bill_amount ?? '' }}">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-end">
            <div class="col-md-2">
                <div class="mb-1">
                    <button type="submit" class="listing_add">Update</button>
                </div>
            </div>
            <div class="col-md-2">
                <div class="mb-1">
                    <a href="" class="listing_exit">Back</a>
                </div>
            </div>
        </div>
    </form>
@else
    <form action="{{ route('cda-bills.store') }}" method="POST" id="cda-bills-create-form">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Pc No</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="pc_no" id="pc_no"
                                    value="{{ $cdaBill->pc_no ?? '' }}" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Project</label>
                            </div>
                            <div class="col-md-12">
                                <select name="project_id" id="project_id" class="form-select">
                                    <option value="">Select Project</option>
                                    @foreach ($projects as $project)
                                        <option value="{{ $project->id }}">{{ $project->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Adv No</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="adv_no" id="adv_no"
                                    value="{{ $cdaBill->adv_no ?? '' }}" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Adv Dt</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="adv_date" id="adv_date"
                                    value="{{ $cdaBill->adv_date ?? '' }}" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Adv Amt</label>
                            </div>
                            <div class="col-md-12">
                                <input type="number"  min="0" class="form-control" name="adv_amount" id="adv_amount"
                                    value="{{ $cdaBill->adv_amount ?? '' }}" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Sett. Vr Dt</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="var_date" id="var_date"
                                    value="{{ $cdaBill->var_date ?? '' }}" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Sett. Amt</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="var_amount" id="var_amount"
                                    value="{{ $cdaBill->var_amount ?? '' }}" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Crv No</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="crv_no" id="crv_no"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                   
                {{--  <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Vr Type</label>
                            </div>
                            <div class="col-md-12">
                                <select name="var_type_id" id="var_type_id" class="form-select">
                                    <option value="">Select</option>
                                    @foreach ($variable_types as $variable_type)
                                        <option value="{{ $variable_type->id }}">{{ $variable_type->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div> --}}
                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Firm Name</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="firm_name" id="firm_name"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>CDA Bill No</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="cda_bill_no" id="cda_bill_no"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>CDA Bill Date</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="cda_bill_date" id="cda_bill_date"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>CDA Bill Amount</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="cda_bill_amount" id="cda_bill_amount"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-end">
            <div class="col-md-2">
                <div class="mb-1">
                    <button type="submit" class="listing_add">Add</button>
                </div>
            </div>
            <div class="col-md-2">
                <div class="mb-1">
                    <a href="" class="listing_exit">Back</a>
                </div>
            </div>
        </div>
</form>
@endif
