@if (isset($edit))
    <form action="{{ route('banks.update', $bank->id) }}" method="POST" id="banks-edit-form">
        @method('PUT')
        @csrf
        <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="form-group col-md-4 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Bank</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="bank_name" id="bank" value="{{ $bank->bank_name }}"
                                placeholder="">
                            <span class="text-danger" id="bank-error"></span>
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-4 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>IFSC </label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="ifsc" id="ifsc" value="{{ $bank->ifsc }}"
                                placeholder="">
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
                                <option value="1" {{ ($bank->status == 1) ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ ($bank->status == 0) ? 'selected' : '' }}>Inactive</option>
                            </select>
                            <span class="text-danger" id="status-error"></span>
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
    <form action="{{ route('banks.store') }}" method="POST" id="banks-create-form">
        @csrf
        <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="form-group col-md-4 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Bank</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="bank_name" id="bank_name" value=""
                                placeholder="">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-4 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>IFSC </label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="ifsc" id="ifsc" value=""
                                placeholder="">
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
