@if (isset($edit))
    <form action="{{ route('pay-matrix-basics.update', $payMatrixBasic->id) }}" method="POST" id="pay-matrix-basics-edit-form">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>PM Level Value</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="pm_level_id" id="pm_level_id">
                                    <option value="">Select PM Level</option>
                                    @foreach($pmLevels as $level)
                                        <option value="{{ $level->id }}" {{ $level->id == $payMatrixBasic->pm_level_id ? 'selected':'' }}>{{ $level->value }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>PM Row</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="pay_matrix_row_id" id="pay_matrix_row_id">
                                    <option value="">Select Row</option>
                                    @foreach($pmRows as $row)
                                        <option value="{{ $row->id }}" {{ $row->id == $payMatrixBasic->pay_matrix_row_id ? 'selected':'' }}>{{ $row->row_name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Basic Pay</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="basic_pay" id="basic_pay" value="{{ $payMatrixBasic->basic_pay ?? '' }}"
                                    placeholder="">
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
                                    <option value="1" {{ ($payMatrixBasic->status == 1) ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ ($payMatrixBasic->status == 0) ? 'selected' : '' }}>Inactive</option>
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
    <form action="{{ route('pay-matrix-basics.store') }}" method="POST" id="pay-matrix-basics-create-form">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>PM Level Value</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="pm_level_id" id="pm_level_id">
                                    <option value="">Select PM Level</option>
                                    @foreach($pmLevels as $level)
                                        <option value="{{ $level->id }}">{{ $level->value }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>PM Row</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="pay_matrix_row_id" id="pay_matrix_row_id">
                                    <option value="">Select Row</option>
                                    @foreach($pmRows as $row)
                                        <option value="{{ $row->id }}">{{ $row->row_name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Basic Pay</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="basic_pay" id="basic_pay" value="{{ $pm_level->basic_pay ?? '' }}"
                                    placeholder="">
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
