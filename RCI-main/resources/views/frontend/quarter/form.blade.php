@if (isset($edit))
    <form action="{{ route('quarters.update', $quarter->id) }}" method="POST" id="quarter-edit-form">
        @method('PUT')
        @csrf
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-5 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Grade Pay</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="grade_pay_id" id="grade_pay_id">
                                    @foreach($grade_pays as $grade_pay)
                                    <option value="{{ $grade_pay->id }}" {{ ($quarter->grade_pay_id == $grade_pay->id) ? 'selected' : '' }}>{{ $grade_pay->amount }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-5 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>License Fee</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="license_fee" id="license_fee" value="{{ $quarter->license_fee }}"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-5 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Quarter Type</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control"  name="qrt_type" id="qrt_type" value="{{ $quarter->qrt_type }}"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-5 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Quarter Charge</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control"  name="qrt_charge" id="qrt_charge" value="{{ $quarter->qrt_charge }}"
                                    placeholder="">
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
                                    <option value="1" {{ ($quarter->status == 1) ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ ($quarter->status == 0) ? 'selected' : '' }}>Inactive</option>
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
    <form action="{{ route('quarters.store') }}" method="POST" id="quarter-create-form">
        @csrf
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-5 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Grade Pay</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="grade_pay_id" id="grade_pay_id">
                                    <option value="">Select Grade Pay</option>
                                    @foreach($grade_pays as $grade_pay)
                                    <option value="{{ $grade_pay->id }}" >{{ $grade_pay->amount }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-5 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>License Fee</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control"  name="license_fee" id="license_fee" 
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-5 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Quarter Type</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="qrt_type" id="qrt_type" 
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-5 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Quarter Charge</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="qrt_charge" id="qrt_charge" 
                                    placeholder="">
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
