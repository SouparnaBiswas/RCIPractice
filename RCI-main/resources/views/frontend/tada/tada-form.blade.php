@if (isset($edit))
    <form  action="{{ route('tada.update', $data->id) }}" method="POST" id="tada-edit-form">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Category</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="category_id" id="category_id">
                                    <option value="">Select Category</option>
                                    @if($category)
                                        @foreach ($category as $val)
                                            <option value="{{$val->id}}" {{ ($data->category_id == $val->id) ? 'selected' : '' }}>{{$val->category}}</option>
                                        @endforeach
                                    @endif
                                </select>
                                <span class="text-danger"></span>
                            </div>

                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Title</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="title" id="title" value="{{$data->title}}"/>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Purpose</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="purpose" id="purpose" value="{{$data->purpose}}"/>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-2 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Currency</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="currency" id="currency">
                                    <option value="1" {{ ($data->currency == 1) ? 'selected' : '' }}>INR</option>
                                    <option value="2" {{ ($data->currency == 2) ? 'selected' : '' }}>USD</option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Amount</label>
                            </div>
                            <div class="col-md-12">
                                <input type="number" class="form-control" name="amount" id="amount" value="{{$data->amount}}"/>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-2 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Payment Type</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="payment_type" id="payment_type">
                                    <option  value="">Select</option>
                                    <option {{ ($data->payment_type == 'onetime') ? 'selected' : '' }} value="onetime">Onetime</option>
                                    <option {{ ($data->payment_type == 'perday') ? 'selected' : '' }} value="perday">Per Day</option>
                                    <option {{ ($data->payment_type == 'perkm') ? 'selected' : '' }} value="perkm">Per KM</option>
                                    <option {{ ($data->payment_type == 'permonth') ? 'selected' : '' }} value="permonth">Per Month</option>
                                    <option {{ ($data->payment_type == 'peryear') ? 'selected' : '' }} value="peryear">Per Year</option>
                                    <option {{ ($data->payment_type == 'perweek') ? 'selected' : '' }} value="perweek">Per Week</option>
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
                                    <option value="1" {{ ($data->status == 1) ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ ($data->status == 0) ? 'selected' : '' }}>Inactive</option>
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
    <form  action="{{ route('tada.store') }}" method="POST" id="tada-create-form">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Category</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="category_id" id="category_id">
                                    <option value="">Select Category</option>
                                    @if($category)
                                        @foreach ($category as $val)
                                            <option value="{{$val->id}}">{{$val->category}}</option>
                                        @endforeach
                                    @endif
                                </select>
                                <span class="text-danger"></span>
                            </div>

                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Title</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="title" id="title"/>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Purpose</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="purpose" id="purpose"/>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-2 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Currency</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="currency" id="currency">
                                    <option value="1">INR</option>
                                    <option value="2">USD</option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Amount</label>
                            </div>
                            <div class="col-md-12">
                                <input type="number" class="form-control" name="amount" id="amount"/>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-2 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Payment Type</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="payment_type" id="payment_type">
                                    <option value="">Select</option>
                                    <option value="onetime">Onetime</option>
                                    <option value="perday">Per Day</option>
                                    <option value="perkm">Per KM</option>
                                    <option value="permonth">Per Month</option>
                                    <option value="peryear">Per Year</option>
                                    <option value="perweek">Per Week</option>
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
