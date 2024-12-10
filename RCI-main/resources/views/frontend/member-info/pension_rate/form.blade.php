@if (isset($edit))
    <form action="{{ route('pension-rate.update', $pensionRate->id) }}" method="POST" id="pension-rate-edit-form">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>NPSC Credit Rate</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="npsc_credit_rate" id="npsc_credit_rate" value="{{ $pensionRate->npsc_credit_rate }}" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>NPSG Credit Rate</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="npsg_credit_rate" id="npsg_credit_rate" placeholder="" value="{{ $pensionRate->npsg_credit_rate }}">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>NPSC Debit Rate</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="npsc_debit_rate" id="npsc_debit_rate" placeholder="" value="{{ $pensionRate->npsc_debit_rate }}">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>NPSG Debit Rate</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="npsg_debit_rate" id="npsg_debit_rate" placeholder="" value="{{ $pensionRate->npsg_debit_rate }}">
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
                                <input type="text" class="form-control" name="year" id="year" value="{{ $pensionRate->year }}" readonly>
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
                                    <option value="1" {{ ($pensionRate->status == 1) ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ ($pensionRate->status == 0) ? 'selected' : '' }}>Inactive</option>
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
    <form action="{{ route('pension-rate.store') }}" method="POST" id="pension-rate-create-form">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>NPSC Credit Rate</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="npsc_credit_rate" id="npsc_credit_rate" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>NPSG Credit Rate</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="npsg_credit_rate" id="npsg_credit_rate" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>NPSC Debit Rate</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="npsc_debit_rate" id="npsc_debit_rate" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>NPSG Debit Rate</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="npsg_debit_rate" id="npsg_debit_rate" placeholder="">
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
                                <select name="year" class="form-select" id="report_year">
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
