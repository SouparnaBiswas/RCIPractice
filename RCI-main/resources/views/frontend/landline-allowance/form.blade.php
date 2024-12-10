@if (isset($edit))
    <form action="{{ route('hras.update', $landline_allowance->id) }}" method="POST" id="hra-edit-form">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label> Category</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="category_id" id="category_id">
                                    <option value="">Select Category</option>
                                    <option value="NPS">NPS</option>
                                    <option value="GPF">GPF</option>
                                    {{-- @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $landline_allowance->category_id == $category->id ?'selected':''}}>{{ $category->category }}</option>
                                     @endforeach --}}
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Mobile max Allocation</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="mobile_max_allo" id="mobile_max_allo" value="{{ $landline_allowance->mobile_max_allo }}">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Landline max Allocation</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="landline_max_allo" id="landline_max_allo" value="{{ $landline_allowance->landline_max_allo }}">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Broadband max Allocation</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="broad_band_max_allo" id="broad_band_max_allo" value="{{ $landline_allowance->broad_band_max_allo }}">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Total max Allocation</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="total_amount_allo" id="total_amount_allo" value="{{ $landline_allowance->total_amount_allo }}">
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
    <form action="{{ route('landline-allowance.store') }}" method="POST" id="landline-allowance-create-form">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label> Category</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="category_id" id="category_id">
                                    <option value="">Select Category</option>
                                    <option value="NPS">NPS</option>
                                    <option value="GPF">GPF</option>
                                    
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Mobile max Allocation</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="mobile_max_allo" id="mobile_max_allo" value="{{ old('mobile_max_allo') }}">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Landline max Allocation</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="landline_max_allo" id="landline_max_allo" value="{{ old('landline_max_allo') }}">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Broadband max Allocation</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="broad_band_max_allo" id="broad_band_max_allo" value="{{ old('broad_band_max_allo') }}">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Total max Allocation</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="total_amount_allo" id="total_amount_allo" value="{{ old('total_amount_allo') }}">
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
