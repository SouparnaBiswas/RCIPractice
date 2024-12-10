@if (isset($edit))
    <form action="{{ route('fund-vendors.update', $public_fund_vendor->id) }}" method="POST" id="public-vendor-edit-form">
        @method('PUT')
        @csrf
        <div class="row align-items-center">
            <div class="col-md-10">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>First Name</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="f_name" id="f_name" value="{{ $public_fund_vendor->f_name ?? '' }}">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
        
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Last Name</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="l_name" id="l_name" value="{{ $public_fund_vendor->l_name ?? '' }}">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
        
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Email</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="email" id="email" value="{{ $public_fund_vendor->email ?? ''}}">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
        
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Phone</label>
                            </div>
                            <div class="col-md-12">
                                <input type="number" class="form-control" name="phone" id="phone" value="{{ $public_fund_vendor->phone ?? ''}}">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Desig</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="desig" id="desig" value="{{ $public_fund_vendor->desig ?? ''}}">
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
                                    <option value="1" {{ ($public_fund_vendor->status) == 1 ? 'selected': '' }}>Active</option>
                                    <option value="0" {{ ($public_fund_vendor->status) == 0 ? 'selected': '' }}>Inactive</option>
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
    <form action="{{ route('fund-vendors.store') }}" method="POST" id="public-vendor-create-form">
        @csrf
        <div class="row align-items-center">
            <div class="col-md-10">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>First Name</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="f_name" id="f_name" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
        
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Last Name</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="l_name" id="l_name" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
        
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Email</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="email" id="email" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
        
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Phone</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="phone" id="phone">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Desig</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="desig" id="desig">
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
                                    <option value="1" >Active</option>
                                    <option value="0" >Inactive</option>
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
