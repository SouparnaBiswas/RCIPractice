@if (isset($edit))
    <form action="{{ route('hras.update', $hra->id) }}" method="POST" id="hra-edit-form">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>HRA Percentage</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="percentage" id="percentage" value="{{ $hra->percentage }}" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>City Category</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="city_category" id="city_category">
                                    <option value="">Select City Category</option>
                                    <option value="x" {{ ($hra->city_category == 'x') ? 'selected' : '' }}>X</option>
                                    <option value="y" {{ ($hra->city_category == 'y') ? 'selected' : '' }}>Y</option>
                                    <option value="z" {{ ($hra->city_category == 'z') ? 'selected' : '' }}>Z</option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Pay Commision name</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="pay_commission_id" id="pay_commission_id">
                                    <option value="">Select Pay Commision</option>
                                    @foreach ($paycommissions as $paycommission)
                                        <option value="{{ $paycommission->id }}" {{ ($hra->pay_commission_id == $paycommission->id) ? 'selected' : '' }}>{{ $paycommission->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    
                    <div class="form-group col-md-5 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Status</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="status" id="status">
                                    <option value="1" {{ ($hra->status == 1) ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ ($hra->status == 0) ? 'selected' : '' }}>Inactive</option>
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
    <form action="{{ route('hras.store') }}" method="POST" id="hra-create-form">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>HRA percentage</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="percentage" id="percentage" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>City Category</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="city_category" id="city_category">
                                    <option value="">Select Category</option>
                                    <option value="x">X</option>
                                    <option value="y">Y</option>
                                    <option value="z">Z</option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Pay Commision name</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="pay_commission_id" id="pay_commission_id">
                                    <option value="">Select Pay Commision</option>
                                    @foreach ($paycommissions as $paycommission)
                                        <option value="{{ $paycommission->id }}">{{ $paycommission->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    
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
