@if (isset($edit))
    <form action="{{ route('member-alloted-leave.update', $allotedLeave->id) }}" method="POST" id="member-alloted-leave-edit-form">
        @method('PUT')
        @csrf
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Member Name</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="member_id" id="member_id" disabled>
                                    <option value="">Select Member</option>
                                    @foreach ($members as $member)
                                        <option value="{{ $member->id }}" {{ ($member->id == $allotedLeave->member_id) ? 'selected' : '' }}>{{ $member->name }}</option>
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
                                        <option value="{{ $leaveType->id }}" {{ ($leaveType->id == $allotedLeave->leave_type_id) ? 'selected' : '' }}>{{ $leaveType->leave_type }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Alloted Leaves</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="alloted_leaves" id="alloted_leaves" value="{{ $allotedLeave->alloted_leaves }}" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    
                
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Year</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="year" id="year" disabled>
                                    <option value="">Select Year</option>
                                    @foreach ($years as $year)
                                        <option value="{{ $year }}" {{ ($year == $allotedLeave->year) ? 'selected' : '' }}>{{ $year }}</option>
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
                                    <option value="1" {{ ($allotedLeave->status == '1') ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ ($allotedLeave->status == '0') ? 'selected' : '' }}>Inactive</option>
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
    <form action="{{ route('member-alloted-leave.store') }}" method="POST" id="member-alloted-leave-create-form">
        @csrf
        <div class="row align-items-center">
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
                                <label>Alloted Leaves</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="alloted_leaves" id="alloted_leaves" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Year</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="year" id="year">
                                    <option value="">Select Year</option>
                                    @foreach ($years as $year)
                                        <option value="{{ $year }}">{{ $year }}</option>
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
