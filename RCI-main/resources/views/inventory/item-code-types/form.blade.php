@if (isset($edit))
    <form action="{{ route('item-code-types.update', $item_code_type->id) }}" method="POST" id="item-code-types-edit-form">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-7 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Item Code Classification No. </label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="code_type_no" id="code_type_no">
                                    <option value="">Select Item Code Classification No.</option>
                                    <option value="1" {{ ($item_code_type->code_type_no == 1) ? 'selected' : '' }}>1</option>
                                    <option value="2" {{ ($item_code_type->code_type_no == 2) ? 'selected' : '' }}>2</option>
                                    <option value="3" {{ ($item_code_type->code_type_no == 3) ? 'selected' : '' }}>3</option>
                                    <option value="4" {{ ($item_code_type->code_type_no == 4) ? 'selected' : '' }}>4</option>
                                    <option value="5" {{ ($item_code_type->code_type_no == 5) ? 'selected' : '' }}>5</option>
                                    <option value="6" {{ ($item_code_type->code_type_no == 6) ? 'selected' : '' }}>6</option>
                                    <option value="7" {{ ($item_code_type->code_type_no == 7) ? 'selected' : '' }}>7</option>
                                    <option value="8" {{ ($item_code_type->code_type_no == 8) ? 'selected' : '' }}>8</option>
                                    <option value="9" {{ ($item_code_type->code_type_no == 9) ? 'selected' : '' }}>9</option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-5 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Item Code Classification Name</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="code_type_name" id="code_type_name"
                                    value="{{ $item_code_type->code_type_name }}" placeholder="">
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
    <form action="{{ route('item-code-types.store') }}" method="POST" id="item-code-types-create-form">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-7 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Item Code Classification No. </label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="code_type_no" id="code_type_no">
                                    <option value="">Select Item Code Classification No.</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-5 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Item Code Classification Name</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="code_type_name" id="code_type_name" value=""
                                    placeholder="">
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
