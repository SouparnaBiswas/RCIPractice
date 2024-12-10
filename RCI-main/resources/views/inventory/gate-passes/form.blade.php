@if (isset($edit))
    <form action="{{ route('gate-passes.update', $gatepass->id) }}" method="POST" id="gate-pass-edit-form">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-5 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Item Code</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select search-select-box" name="item_code_id" id="item_code_id" disabled>
                                    <option value="">Select</option>
                                    @foreach ($itemCodes as $item)
                                        <option value="{{ $item->id }}" {{ $gatepass->item_code_id ==  $item->id ? 'selected': ''}}>
                                            {{ $item->code }} ({{ $item->item_name }})</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-5 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Gate Pass No.</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="pass_no" id="pass_no" value="{{ $gatepass->gate_pass_no ?? '' }}"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-5 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Gate Pass Date</label>
                            </div>
                            <div class="col-md-12">
                                 <input type="date" class="form-control" name="pass_date" id="pass_date" value="{{ $gatepass->gate_pass_date ?? '' }}" max="{{ date('Y-m-d') }}">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-5 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Gate Pass Type</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="pass_type" id="">
                                    <option value="">Select Gate Pass Type</option>
                                    <option value="returnable" {{ ($gatepass->gate_pass_type == 'returnable') ? 'selected' : '' }}>Returnable</option>
                                    <option value="non-returnable" {{ ($gatepass->gate_pass_type == 'non-returnable') ? 'selected' : '' }}>Non-Returnable</option>
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
    <form action="{{ route('gate-passes.store') }}" method="POST" id="gate-pass-create-form">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Gate Pass No. </label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="pass_no" id="pass_no" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Gate Pass Date</label>
                            </div>
                            <div class="col-md-12">
                                 <input type="date" class="form-control" name="pass_date" id="pass_date"  max="{{ date('Y-m-d') }}">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Probable Date Of Return</label>
                            </div>
                            <div class="col-md-12">
                                 <input type="date" class="form-control" name="date_of_return" id="date_of_return" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Invoice No.</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="invoice_no" id="invoice_no">
                                    <option value="">Select Invoice No</option>
                                    @foreach($inventory_nos as $inventory_no)
                                    <option value="{{ $inventory_no->id }}">{{ $inventory_no->number }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Consignee name</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select search-select-box" name="consignee" id="consignee">
                                    <option value="">Select</option>
                                    @foreach($vendors as $vendor)
                                        <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                                    @endforeach
                                    <option value="0">Other</option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2 consignee_other_name" style="display:none;">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Other consignee name</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="other_consignee_name" id="other_consignee_name" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2 consignee_other_number" style="display:none;">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Other consignee number</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="other_consignee_number" id="other_consignee_number" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Gate Pass Type</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="pass_type" id="pass_type">
                                    <option value="">Select Gate Pass Type</option>
                                    <option value="returnable">Returnable</option>
                                    <option value="non-returnable">Non-Returnable</option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2 eiv_div" style="display:none;">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>EIV no</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="eiv_no" id="eiv_no">
                                    <option value="">Select EIV No</option>
                                    @foreach($external_issue_vouchers as $external_issue_voucher)
                                    <option value="{{ $external_issue_voucher->id }}">{{ $external_issue_voucher->voucher_no }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>
            </div>
        </div>

       

        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Item Code  </label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select item_id" name="item_id[]" id="item_id" >
                                    <option value="">Select Item Code </option>
                                    @foreach ($items as $item)
                                        <option value="{{ $item->id }}">{{ $item->code }}</option> 
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Description</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control description" name="description[]" id="description" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Unit Cost</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="unit_cost[]" id="unit_cost">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label> Quantity</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="received_quantity[]" id="received_quantity">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label> Total Cost</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="total_amount[]" id="total_amount">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>A/U Status</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="au_status[]" id="au_status">
                                    <option value="">Select A/U Status</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2 ms-auto">
                        <div class="add-more form-group mt-4">
                            <a href="javascript:void(0);" class="listing_add add-more-gate-pass"><i
                                    class="fas fa-plus-circle"></i> Add More</a>
                        </div>
                    </div>
                </div>
                <div id="credit_form_add_new_row"></div>
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

    <div id="gate_pass_new_html" hidden>
        <div class="new_html">
            <hr />
            <div class="col-md-12 count-class">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Item Code  </label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select item_id" name="item_id[]" id="" >
                                    <option value="">Select Item Code </option>
                                    @foreach ($items as $item)
                                        <option value="{{ $item->id }}">{{ $item->code }}</option> 
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Description</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control description" name="description[]" id="description" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Unit Cost</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control unit_price" name="unit_cost[]" id="" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Quantity</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control rcv_quantity" name="received_quantity[]" id="received_quantity" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label> Total Cost</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control total_cost" name="total_amount[]" id="total_cost" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>A/U Status</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="au_status[]" id="au_status">
                                    <option value="">Select A/U Status</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2 ms-auto">
                        <label>&nbsp;</label>
                        <button class="listing_add w-100 trash form-control"><i class="fa fa-times"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endif
