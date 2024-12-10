@if (isset($edit))
    <form action="{{ route('grade-pays.update', $grade_pay->id) }}" method="POST" id="grade-pays-edit-form">
        @method('PUT')
        @csrf
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-5 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Pm Level</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="pm_level" id="pm_level">
                                    @foreach($pay_levels as $pay_level)
                                        <option value="{{ $pay_level->id }}" {{$grade_pay->pay_level == $pay_level->id ? 'selected':''}}>{{ $pay_level->value }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-5 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Amount</label>
                            </div>
                            <div class="col-md-12">
                               <input type="text" class="form-control" name="amount" id="amount" value="{{ $grade_pay->amount ?? '' }}"
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
                                    <option value="1" {{ ($grade_pay->status == 1) ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ ($grade_pay->status == 0) ? 'selected' : '' }}>Inactive</option>
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
    <form action="{{ route('grade-pays.store') }}" method="POST" id="grade-pays-create-form">
        @csrf
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-5 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Pm Level</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="pm_level" id="pm_level">
                                    <option value="">Select PM Level</option>
                                    @foreach($pay_levels as $pay_level)
                                        <option value="{{ $pay_level->id }}">{{ $pay_level->value }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-5 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Amount</label>
                            </div>
                            <div class="col-md-12">
                               <input type="text" class="form-control" name="amount" id="amount" value="{{ old('amount') ?? '' }}"
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
