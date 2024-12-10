@if (isset($edit))
    <form action="{{ route('member-leaves.update', $memberLeave->id) }}" method="POST" id="member-leave-edit-form">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Member Name</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select search-select-box" name="member_id" id="member_id" disabled>
                                    <option value="">Select Member</option>
                                    @foreach ($members as $member)
                                        <option value="{{ $member->id }}" {{ ($member->id == $memberLeave->member_id) ? 'selected' : '' }}>{{ $member->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Leave Type</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="leave_type_id" id="leave_type_id" disabled>
                                    <option value="">Select Leave Type</option>
                                    @foreach ($leaveTypes as $leaveType)
                                        <option value="{{ $leaveType->id }}" {{ ($leaveType->id == $memberLeave->leave_type_id) ? 'selected' : '' }}>{{ $leaveType->leave_type }}</option>
                                    @endforeach 
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Start Date</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="start_date" id="start_date" value="{{ $memberLeave->start_date }}" readonly>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>End Date</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="end_date" id="end_date" value="{{ $memberLeave->end_date }}" readonly>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>


                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Leave Reason</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="reason" id="reason" value="{{ $memberLeave->reason }}"  readonly>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Leave count</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="no_of_days" id="no_of_days" value="{{ $memberLeave->no_of_days }}"  readonly>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Remaining Leaves</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="remaining_leaves" id="remaining_leaves" value="{{ $memberLeave->remaining_leaves }}"  readonly>
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
                                <select class="form-select" name="year" id="year" disabled>
                                    <option value="">Select Year</option>
                                    @foreach ($years as $year)
                                        <option value="{{ $year }}" {{ ($year == $memberLeave->year) ? 'selected' : '' }}>{{ $year }}</option>
                                    @endforeach
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
                                    <option value="0" {{ ($memberLeave->status == 0) ? 'selected' : '' }}>Pending</option>
                                    <option value="1" {{ ($memberLeave->status == 1) ? 'selected' : '' }}>Approved</option>
                                    <option value="2" {{ ($memberLeave->status == 2) ? 'selected' : '' }}>Rejected</option>
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
    <form action="{{ route('member-leaves.store') }}" method="POST" id="member-leave-create-form">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Member Name</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select search-select-box" name="member_id" id="member_id">
                                    <option value="">Select Member</option>
                                    @foreach ($members as $member)
                                        <option value="{{ $member->id }}">{{ $member->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Leave Type</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="leave_type_id" id="leave_type_id">
                                    <option value="">Select Leave Type</option>
                                    @foreach ($leaveTypes as $leaveType)
                                        <option value="{{ $leaveType->id }}">{{ $leaveType->leave_type_abbr }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Start Date</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="start_date" id="start_date" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>End Date</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="end_date" id="end_date" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Leave Reason</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="reason" id="reason"  >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Leave count</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="no_of_days" id="no_of_days"  readonly>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Remaining Leaves</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="remaining_leaves" id="remaining_leaves"  readonly>
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
                                <select class="form-select" name="year" id="year">
                                    @php $currentYear = date('Y'); @endphp
                                    <option value="">Select Year</option>
                                    @foreach ($years as $year)
                                        <option value="{{ $year }}" {{ ($year == $currentYear) ? 'selected' : '' }}>{{ $year }}</option>
                                    @endforeach
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
                                    <option value="0">Pending</option>
                                    <option value="1">Approved</option>
                                    <option value="2">Rejected</option>
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


