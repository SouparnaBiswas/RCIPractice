@if (isset($edit))
    <form action="{{ route('cghs.update', $cghs->id) }}" method="POST" id="cghs-edit-form">
        @method('PUT')
        @csrf
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-5 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Pay Level</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="group_id" id="group_id">
                                    @foreach($pay_levels as $pay_level)
                                        <option value="{{ $pay_level->id }}" {{ ($cghs->pay_level_id == $pay_level->id) ? 'selected' : '' }}>{{ $pay_level->value }}</option>
                                    @endforeach    
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-7 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>CGHS Contribution</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="contribution" id="contribution" value="{{ $cghs->contribution ?? '' }}"
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
                                    <option value="1" {{ ($cghs->status == 1) ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ ($cghs->status == 0) ? 'selected' : '' }}>Inactive</option>
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
    <form action="{{ route('cghs.store') }}" method="POST" id="cghs-create-form">
        @csrf
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-5 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Pay Level</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="pay_level_id" id="pay_level_id">
                                    <option value="">Select Pay Level</option>
                                    @foreach($pay_levels as $pay_level)
                                        <option value="{{ $pay_level->id }}" >{{ $pay_level->value }}</option>
                                    @endforeach    
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-7 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>CGHS Contribution</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="contribution" id="contribution" >
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
