@if (isset($edit))
    <form action="{{ route('transports.update', $transport->id) }}" method="POST" id="transport-edit-form">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Transport Name  </label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="name" id="name" value="{{  $transport->name ?? '' }}"
                                    placeholder="">
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
                                <input type="email" class="form-control" name="email" id="email" value="{{  $transport->email ?? '' }}"
                                    placeholder="">
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
                                <input type="text" class="form-control" name="phone" id="phone" value="{{  $transport->phone ?? '' }}"
                                    placeholder="" pattern="[6-9]{1}[0-9]{9}" title="Please enter a valid mobile no.">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Address</label>
                            </div>
                            <div class="col-md-12">
                                <textarea class="form-control" name="address" id="address"
                                    placeholder="">{{ $transport->address }}</textarea>
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
                                    <option value="1" {{ $transport->status == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ $transport->status == 0 ? 'selected' : '' }}>Inactive</option>
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
    <form action="{{ route('transports.store') }}" method="POST" id="transport-create-form">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Transport Name  </label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="name" id="name" value=""
                                    placeholder="">
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
                                <input type="email" class="form-control" name="email" id="email" value=""
                                    placeholder="">
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
                                <input type="text" class="form-control" name="phone" id="phone" value=""
                                    placeholder="" pattern="[6-9]{1}[0-9]{9}" title="Please enter a valid mobile no.">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Address</label>
                            </div>
                            <div class="col-md-12">
                                <textarea class="form-control" name="address" id="address" value=""
                                    placeholder=""></textarea>
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
