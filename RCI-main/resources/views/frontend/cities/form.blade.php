@if (isset($edit))
    <form action="{{ route('cities.update', $city->id) }}" method="POST" id="city-edit-form">
        @method('PUT')
        @csrf
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-7 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>City Name</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="name" id="name" value="{{ $city->name ?? '' }}"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-5 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>City Type</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select"  name="city_type" id="city_type">
                                    <option value="">Select City Type</option>
                                    <option value="X" {{ ($city->city_type == 'X') ? 'selected' : '' }}>X-City (50 lakhs and above)</option>
                                    <option value="Y" {{ ($city->city_type == 'Y') ? 'selected' : '' }}>Y-City (5 lakh to 50 lakhs)</option>
                                    <option value="Z" {{ ($city->city_type == 'Z') ? 'selected' : '' }}>Z-City (Below 5 lakh)</option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-5 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>TPT Type</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select"  name="tpt_type" id="tpt_type">
                                    
                                    <option value="higher" {{ ($city->tpt_type == 'higher') ? 'selected' : '' }}>Higher TPT City</option>
                                    <option value="other" {{ ($city->city_type == 'other') ? 'selected' : '' }}>Other places</option>
                                    
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
                                    <option value="1" {{ ($city->status == 1) ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ ($city->status == 0) ? 'selected' : '' }}>Inactive</option>
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
    <form action="{{ route('cities.store') }}" method="POST" id="city-create-form">
        @csrf
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-7 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>City Name</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="name" id="name" 
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-5 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>City Type</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select"  name="city_type" id="city_type">
                                    <option value="">Select City Type</option>
                                    <option value="X">X-City (50 lakhs and above)</option>
                                    <option value="Y">Y-City (5 lakh to 50 lakhs)</option>
                                    <option value="Z">Z-City (Below 5 lakh)</option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-5 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>TPT Type</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select"  name="tpt_type" id="tpt_type">
                                    <option value="">Select TPT Type</option>
                                    <option value="higher" >Higher TPT City</option>
                                    <option value="other" >Other places</option>
                                    
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
