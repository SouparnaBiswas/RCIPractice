@if (isset($edit))
    <form action="{{ route('inventory-numbers.update', $inventory_number->id) }}" method="POST" id="inventory-numbers-edit-form">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Inv Type</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="inventory_type" id="inventory_type" disabled>
                                    <option value="">Select Inventory Type</option>
                                    <option value="Individual" {{ $inventory_number->inventory_type == 'Individual' ? 'selected':'' }}>Individual</option>
                                    <option value="Project" {{ $inventory_number->inventory_type == 'Project' ? 'selected':'' }}>Project</option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    
                    <div class="form-group col-md-4 mb-2 holder-div" >
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Inv Holder</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="holder_id" id="holder_id">
                                    <option value="">Select Holder</option>
                                    @foreach($members as $member)
                                        <option value="{{ $member->id }}" {{ $inventory_number->holder_id == $member->id ? 'selected':'' }}>{{ $member->user_name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    @if($inventory_number->inventory_type == 'Individual')
                    <div class="form-group col-md-4 mb-2 group-div">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Group</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="group_id" id="group_id">
                                    <option value="">Select Group</option>
                                    @foreach($groups as $group)
                                        <option value="{{ $group->id }}" {{ $inventory_number->group_id == $group->id ? 'selected':'' }}>{{ $group->value }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if($inventory_number->inventory_type == 'Project')
                    <div class="form-group col-md-4 mb-2 project-div">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Project Name</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="inventory_project_id" id="inventory_project_id">
                                    <option value="">Select Project Name</option>
                                    @foreach($invProjects as $invProject)
                                        <option value="{{ $invProject->id }}" {{ $inventory_number->inventory_project_id == $invProject->id ? 'selected':'' }}>{{ $invProject->project_name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Status</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="status" id="status">
                                    <option value="1" {{ $inventory_number->status == 1 ? 'selected':'' }}>Active</option>
                                    <option value="0" {{ $inventory_number->status == 0 ? 'selected':'' }}>Inactive</option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-5 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Remarks</label>
                            </div>
                            <div class="col-md-12">
                                <textarea name="remarks" class="form-control" >{{ $inventory_number->remarks ?? ''}}</textarea>
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
    <form action="{{ route('inventory-numbers.store') }}" method="POST" id="inventory-numbers-create-form">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Inv Type</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="inventory_type" id="inventory_type" >
                                    <option value="">Select Inventory Type</option>
                                    <option value="Individual">Individual</option>
                                    <option value="Project">Project</option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    
                    <div class="form-group col-md-4 mb-2 holder-div" >
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Inv Holder</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="holder_id" id="holder_id">
                                    <option value="">Select Holder</option>
                                    @foreach($members as $member)
                                        <option value="{{ $member->id }}">{{ $member->user_name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2 group-div">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Group</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="group_id" id="group_id">
                                    <option value="">Select Group</option>
                                    @foreach($groups as $group)
                                        <option value="{{ $group->id }}">{{ $group->value }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2 project-div">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Project Name</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="inventory_project_id" id="inventory_project_id">
                                    <option value="">Select Project Name</option>
                                    @foreach($invProjects as $invProject)
                                        <option value="{{ $invProject->id }}">{{ $invProject->project_name }}</option>
                                    @endforeach
                                </select>
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

                    <div class="form-group col-md-5 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Remarks</label>
                            </div>
                            <div class="col-md-12">
                                <textarea name="remarks" class="form-control" ></textarea>
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
