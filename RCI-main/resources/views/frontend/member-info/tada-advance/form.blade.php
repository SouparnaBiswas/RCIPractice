@if (isset($edit))
    <form  action="{{ route('tada-advance.update', $data->id) }}" method="POST" id="tada-edit-form">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Member</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="member_id" id="member_id">
                                    <option value="">Select Member</option>
                                    @if($member)
                                        @foreach ($member as $val)
                                            <option value="{{$val->id}}" {{ ($data->member_id == $val->id) ? 'selected' : '' }}>{{$val->name}}</option>
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
                                <label>Project</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="project_id" id="project_id">
                                    <option value="">Select Project</option>
                                    @if($project)
                                        @foreach ($project as $val)
                                            <option value="{{$val->id}}" {{ ($data->project_id == $val->id) ? 'selected' : '' }}>{{$val->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Bill Date</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="bill_date" id="bill_date" value="{{date('Y-m-d',strtotime($data->bill_date))}}"/>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Departure Date&Time</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="dept_date" id="dept_date" value="{{date('Y-m-d H:i',strtotime($data->dept_date))}}"/>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Amount Request</label>
                            </div>
                            <div class="col-md-12">
                                <input type="number" class="form-control" name="amount_requested" id="amount_requested" value="{{$data->amount_requested}}"/>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Amount Allowed</label>
                            </div>
                            <div class="col-md-12">
                                <input type="number" class="form-control" name="amount_allowed" id="amount_allowed" value="{{$data->amount_allowed}}"/>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Amount Disallowed</label>
                            </div>
                            <div class="col-md-12">
                                <input type="number" class="form-control" name="amount_disallowed" id="amount_disallowed" value="{{$data->amount_disallowed}}"/>
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
                                        <option value="0" {{ ($data->status == 0) ? 'selected' : '' }}>Pending</option>
                                        <option value="1" {{ ($data->status == 1) ? 'selected' : '' }}>Accepted</option>
                                    </select>
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

    <script>
        jQuery(document).ready(function () {
            'use strict';
            jQuery('#dept_date').datetimepicker();
        });
    </script>
@else
    <form  action="{{ route('tada-advance.store') }}" method="POST" id="tada-create-form">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Member</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select search-select-box" name="member_id" id="member_id">
                                    <option value="">Select Member</option>
                                    @if($member)
                                        @foreach ($member as $val)
                                            <option value="{{$val->id}}">{{$val->name}}</option>
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
                                <label>Project</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="project_id" id="project_id">
                                    <option value="">Select Project</option>
                                    @if($project)
                                        @foreach ($project as $val)
                                            <option value="{{$val->id}}">{{$val->name}}</option>
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
                                <label>Bill Date</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="bill_date" id="bill_date"/>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Departure Date&Time</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="dept_date" id="dept_date" />
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Amount Request</label>
                            </div>
                            <div class="col-md-12">
                                <input type="number" class="form-control" name="amount_requested" id="amount_requested"/>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Amount Allowed</label>
                            </div>
                            <div class="col-md-12">
                                <input type="number" class="form-control" name="amount_allowed" id="amount_allowed"/>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Amount Disallowed</label>
                            </div>
                            <div class="col-md-12">
                                <input type="number" class="form-control" name="amount_disallowed" id="amount_disallowed"/>
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
                                    <option value="0">Pending</option>
                                    <option value="1">Accepted</option>
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


