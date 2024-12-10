@if (isset($edit))
    <form action="{{ route('users.update', $user_detail->id) }}" method="POST" id="new-users-edit-form">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>First Name</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="first_name" id="first_name" value="{{ $user_detail->first_name }}">
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
                                <input type="text" class="form-control" name="last_name" id="last_name" value="{{ $user_detail->last_name }}">
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
                                <input type="text" class="form-control" name="email" id="email" value="{{ $user_detail->email }}">
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
                                <input type="text" class="form-control" name="phone" id="phone" value="{{ $user_detail->phone }}">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
        
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Password</label>
                            </div>
                            <div class="col-md-12">
                                <input type="password" class="form-control" name="password" id="password">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Confirm Password</label>
                            </div>
                            <div class="col-md-12">
                                <input type="password" class="form-control" name="confirm_password" id="confirm_password">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-6 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Role</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="role" id="role">
                                    <option value="">Select Role</option>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}" {{ $role->id == $role_id ? 'selected':''}}>{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-6 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Status</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="status" id="status">
                                    <option value="1" {{ ($user_detail->status) == 1 ? 'selected': '' }}>Active</option>
                                    <option value="0" {{ ($user_detail->status) == 0 ? 'selected': '' }}>Inactive</option>
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
                    <button type="submit" class="listing_add">Update</button>
                </div>
                <div class="mb-1">
                    <a href="" class="listing_exit">Back</a>
                </div>
            </div>
        </div>
    </form>
@else
    <form action="{{ route('users.store') }}" method="POST" id="new-users-create-form">
        @csrf
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>First Name</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="first_name" id="first_name" >
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
                                <input type="text" class="form-control" name="last_name" id="last_name" >
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
                                <label>Password</label>
                            </div>
                            <div class="col-md-12">
                                <input type="password" class="form-control" name="password" id="password">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Confirm Password</label>
                            </div>
                            <div class="col-md-12">
                                <input type="password" class="form-control" name="confirm_password" id="confirm_password">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-6 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Role</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="role" id="role">
                                    <option value="">Select Role</option>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-6 mb-2">
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
