@if (isset($edit))
    <form action="{{ route('tptas.update', $tpta->id) }}" method="POST" id="tpta-edit-form">
        @method('PUT')
        @csrf
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Pay Level</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="pay_level_id" id="pay_level_id">
                                    <option value="">Select Pay Level</option>
                                    @foreach ($payLevels as $payLevel)
                                        <option value="{{ $payLevel->id }}" {{ ($tpta->pay_level_id == $payLevel->id) ? 'selected' : '' }}>{{ $payLevel->value }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>TPT Type</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="tpt_type" id="tpt_type">
                                    <option value="">Select TPT Type</option>
                                    <option value="higher" {{ ($tpta->tpt_type == 'higher') ? 'selected' : '' }}>Higher</option>
                                    <option value="other" {{ ($tpta->tpt_type == 'other') ? 'selected' : '' }}>Other</option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Allowance</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="tpt_allowance" id="tpt_allowance" value="{{ $tpta->tpt_allowance }}" readonly>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-5 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>DA</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="tpt_da" id="tpt_da" value="{{ $tpta->tpt_da }}" readonly >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-5 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Status</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="status" id="status">
                                    <option value="1" {{ ($tpta->status == 1) ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ ($tpta->status == 0) ? 'selected' : '' }}>Inactive</option>
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
    <form action="{{ route('tptas.store') }}" method="POST" id="tpta-create-form">
        @csrf
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Pay Level</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="pay_level_id" id="pay_level_id">
                                    <option value="">Select Pay Level</option>
                                    @foreach ($payLevels as $payLevel)
                                        <option value="{{ $payLevel->id }}">{{ $payLevel->value }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>TPT Type</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="tpt_type" id="tpt_type">
                                    <option value="">Select TPT Type</option>
                                    <option value="higher">Higher</option>
                                    <option value="other">Other</option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Allowance</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="tpt_allowance" id="tpt_allowance" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>DA</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="tpt_da" id="tpt_da" readonly>
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
