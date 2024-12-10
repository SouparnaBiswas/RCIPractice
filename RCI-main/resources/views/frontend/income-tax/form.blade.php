@if (isset($edit))
    <form action="{{ route('income-taxes.update', $incomeTax->id) }}" method="POST" id="income-tax-edit-form">
        @method('PUT')
        @csrf
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Regime</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="regime" id="regime" disabled>
                                    <option value="">Select Regime</option>
                                    <option value="Old Regime" {{ ($incomeTax->regime == 'Old Regime') ? 'selected' : '' }}>Old Regime</option>
                                    <option value="New Regime" {{ ($incomeTax->regime == 'New Regime') ? 'selected' : '' }}>New Regime</option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Lower Tax Slab</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="lower_slab_amount" id="lower_slab_amount" value="{{ $incomeTax->lower_slab_amount }}" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Higher Tax Slab</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="higher_slab_amount" id="higher_slab_amount" value="{{ $incomeTax->higher_slab_amount }}" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-5 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Tax Rate</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="tax_rate" id="tax_rate" value="{{ $incomeTax->tax_rate }}" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                
                    <div class="form-group col-md-5 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Educational CESS Rate</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="edu_cess_rate" id="edu_cess_rate" value="{{ $incomeTax->edu_cess_rate }}" >
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
    <form action="{{ route('income-taxes.store') }}" method="POST" id="income-tax-create-form">
        @csrf
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Regime</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="regime" id="regime">
                                    <option value="">Select Regime</option>
                                    <option value="Old Regime" >Old Regime</option>
                                    <option value="New Regime">New Regime</option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Lower Tax Slab</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="lower_slab_amount" id="lower_slab_amount" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Higher Tax Slab</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="higher_slab_amount" id="higher_slab_amount" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Tax Rate</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="tax_rate" id="tax_rate" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-5 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Educational CESS Rate</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="edu_cess_rate" id="edu_cess_rate" >
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
