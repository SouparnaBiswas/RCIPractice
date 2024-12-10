@if (isset($edit))
    <form action="{{ route('categories.update', $category->id) }}" method="POST" id="category-edit-form">
        @method('PUT')
        @csrf
        
        <div class="row">
        <div class="col-md-9">
            <div class="row">
                <div class="form-group col-md-7 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Category</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="category" id="category" value="{{ $category->category }}"
                                placeholder="">
                            <span class="text-danger" id="category-error"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-5 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Gaz or Non</label>
                        </div>
                        <div class="col-md-12">
                            <select class="form-select" name="gazetted" id="gazetted">
                                <option value="">Select Gazetted</option>
                                <option value="1" {{ ($category->gazetted == 1) ? 'selected' : '' }}>Yes</option>
                                <option value="0" {{ ($category->gazetted == 0) ? 'selected' : '' }}>No</option>
                            </select>
                            <span class="text-danger" id="gazetted-error"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-7 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Designation Type</label>
                        </div>
                        <div class="col-md-12">
                            <select class="form-select" name="designation_type_id" id="designation_type_id">
                                <option value="">Select Designation Type</option>
                                @foreach ($designation_types as $designationType)
                                    <option value="{{ $designationType->id }}" {{ ($category->designation_type_id == $designationType->id) ? 'selected' : '' }}>{{ $designationType->designation_type }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger" id="designation_type_id-error"></span>
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
                                <option value="1" {{ ($category->status == 1) ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ ($category->status == 0) ? 'selected' : '' }}>Inactive</option>
                            </select>
                            <span class="text-danger" id="status-error"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <label></label>   
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
    <form action="{{ route('categories.store') }}" method="POST" id="category-create-form">
        @csrf
        <div class="row">
        <div class="col-md-9">
            <div class="row">
                <div class="form-group col-md-7 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Category</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="category" id="category" value=""
                                placeholder="">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-5 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Gaz or Non</label>
                        </div>
                        <div class="col-md-12">
                            <select class="form-select" name="gazetted" id="gazetted">
                                <option value="">Select Gazetted</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-7 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Designation Type</label>
                        </div>
                        <div class="col-md-12">
                            <select class="form-select" name="designation_type_id" id="designation_type_id">
                                <option value="">Select Designation Type</option>
                                @foreach ($designation_types as $designationType)
                                    <option value="{{ $designationType->id }}">{{ $designationType->designation_type }}</option>
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
            </div>
        </div>
        <div class="col-md-3">
            <label></label>  
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
