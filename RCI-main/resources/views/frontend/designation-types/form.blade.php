@if (isset($edit))
    <form action="{{ route('designation-types.update', $designation_type->id) }}" method="POST" id="designation-type-edit-form">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="form-group col-md-6 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Section</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="section_id" id="section_id">
                                    @foreach($sections as $section)
                                        <option value="{{ $section->id }}" {{ ($section->id == $designation_type->section_id) ? 'selected' : '' }}>{{ $section->name }}</option>
                                    @endforeach    
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-6 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Designation Type</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="designation_type" id="designation_type" value="{{ $designation_type->designation_type ?? '' }}"
                                    placeholder="">
                                <span class="text-danger" id="designation_type-error"></span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-3">
             <label></label>
              <div class="mb-1">
                 <button type="submit" class="listing_add me-2">Update</button>
              </div>
              <div class="mb-1">
                <a href="" class="listing_exit">Back</a>
              </div>
            </div>
         </div>
    </form>
@else
    <form action="{{ route('designation-types.store') }}" method="POST" id="designation-type-create-form">
        @csrf
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="form-group col-md-6 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Section</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="section_id" id="section_id">
                                    <option value="">Select Section</option>
                                    @foreach($sections as $section)
                                        <option value="{{ $section->id }}" >{{ $section->name }}</option>
                                    @endforeach    
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-6 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Designation Type</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="designation_type" id="designation_type"
                                    value="" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <label></label>
                <div class="mb-1">
                    <button type="submit" class="listing_add me-2">Add</button>
                </div>
                <div class="mb-1">
                    <a href="" class="listing_exit">Back</a>
                </div>
            </div>
        </div>
    </form>
@endif
