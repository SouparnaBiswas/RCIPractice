@if (isset($edit))
<form action="{{ route('conversion-vouchers.update', $conversionVoucher->id) }}" method="POST"
    id="conversion-vouchers-edit-form">
    @method('PUT')
    @csrf
    <div class="row justify-content-end">
        <div class="col-md-12">
            <div class="row">
                <div class="form-group col-md-4 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Voucher Number</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="voucher_no" id="voucher_no"
                                value="{{ $conversionVoucher->voucher_no ?? '' }}" placeholder="" readonly>
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-4 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Item Code</label>
                        </div>
                        <div class="col-md-12">
                            <select class="form-select" name="item_code_id" id="edit_item_code" disabled>
                                <option value="">Select</option>
                                @foreach($itemCodes as $item)
                                <option value="{{ $item->item_code_id }}" {{ $item->id == $conversionVoucher->item_id ?
                                    'selected' : '' }}>{{ $item->code }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>



                <div class="form-group col-md-4 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Voucher Date</label>
                        </div>
                        <div class="col-md-12">
                            <input type="date" class="form-control" name="voucher_date" id="voucher_date"
                                value="{{ $conversionVoucher->voucher_date ?? '' }}" placeholder="" readonly>
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Inventory Number</label>
                        </div>
                        <div class="col-md-12">
                            <select class="form-select" name="inv_no" id="inv_no" disabled>
                                <option value="">Select</option>
                                @foreach($inventoryNumbers as $inventoryNumber)
                                <option value="{{ $inventoryNumber->id }}" {{ $inventoryNumber->id ==
                                    $conversionVoucher->inv_no ? 'selected' : '' }}>{{ $inventoryNumber->number }}
                                </option>
                                @endforeach
                            </select>
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
                            <input type="text" class="form-control" name="quantity" id="quantity"
                                value="{{ $conversionVoucher->quantity ?? '' }}" placeholder="" readonly>
                            <span class="text-danger"></span>

                        </div>
                    </div>
                </div>


            </div>
            <div class="row">

                <div class="form-group col-md-8 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Remarks</label>
                        </div>
                        <div class="col-md-12">
                            <textarea class="form-control" name="remark" id="remark"
                                placeholder="">{{ $conversionVoucher->remarks ?? '' }}</textarea>
                            <span class="text-danger"></span>
                            <div class="text-danger" id="quantity_no"></div>
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
<form action="{{ route('conversion-vouchers.store') }}" method="POST" id="conversion-vouchers-create-form">
    @csrf
    <div class="row justify-content-end">
        <div class="col-md-12">
            <div class="row mb-4">
                {{-- <div class="form-group col-xl-3 col-md-4 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Voucher Number</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="voucher_no" id="voucher_no" placeholder="">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div> --}}
                <div class="form-group col-xl-3 col-md-4 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Type of voucher</label>
                        </div>
                        <div class="col-md-12">
                            <select class="form-select" name="voucher_type" id="voucher_type">
                                <option value="">Select</option>
                                <option value="one-to-one">One to One</option>
                                <option value="many-to-one">Many to One</option>
                                <option value="one-to-many">One to Many</option>
                            </select>
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group col-xl-3 col-md-4 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Voucher Date</label>
                        </div>
                        <div class="col-md-12">
                            <input type="date" class="form-control" name="voucher_date" id="voucher_date" value=""
                                placeholder="">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group col-xl-3 col-md-4 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Transfer Voucher Number</label>
                        </div>
                        <div class="col-md-12">
                            <select class="form-select" name="transfer_voucher_number" id="transfer_voucher_number">
                                <option value="">Select</option>
                                @foreach($transferVouchers as $transferVoucher)
                                <option value="{{ $transferVoucher->voucher_no }}">{{ $transferVoucher->voucher_no }}
                                </option>
                                @endforeach
                            </select>
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>
            </div>

            <hr>

            <div class="row mb-4">
                <div class="col-md-12">
                    <h5>Strike Off</h5>
                </div>
                <div class="form-group col-xl-3 col-md-4 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Item Code</label>
                        </div>
                        <div class="col-md-12">
                            <select class="form-select" name="strike_item_code[]" id="strike_item_code">
                                <option value="">Select</option>
                                @foreach($itemCodes as $itemCode)
                                <option value="{{ $itemCode->item_code_id }}">{{ $itemCode->item_code_id }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group col-xl-3 col-md-4 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Ledger No.</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="strike_ledger[]" id="strike_ledger">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group col-xl-3 col-md-4 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Desc</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="strike_description[]" id="strike_description">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group col-xl-3 col-md-4 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>C/NC/NCF</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="strike_c_nc[]" id="strike_c_nc">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group col-xl-3 col-md-4 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Unit Rate</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="" id="strike_rate">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group col-xl-3 col-md-4 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Quantity</label>
                        </div>
                        <div class="col-md-12">
                            <select name="strike_quantity[]" class="form-select" id="strike_quantity">
                            </select>
                            <span class="text-danger"></span>
                            <div class="text-danger" id="quantity_no"></div>
                        </div>
                    </div>
                </div>
                <div class="form-group col-xl-3 col-md-4 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Rate</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="strike_rate[]" id="strike_total_rate" >
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-12">
                    <h5>Brought on change</h5>
                </div>
                <div class="form-group col-xl-3 col-md-4 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Item Code</label>
                        </div>
                        <div class="col-md-12">
                            <select class="form-select" name="brought_item_code[]" id="brought_item_code">
                                <option value="">Select</option>
                                @foreach($itemCodes as $itemCode)
                                <option value="{{ $itemCode->item_code_id }}">{{ $itemCode->item_code_id }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group col-xl-3 col-md-4 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Ledgar No.</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="brought_ledger[]" id="brought_ledger">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group col-xl-3 col-md-4 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Desc</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="brought_description[]" id="brought_description">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group col-xl-3 col-md-4 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>C/NC/NCF</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="brought_c_nc[]" id="brought_c_nc"
                                placeholder="">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group col-xl-3 col-md-4 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Unit Rate</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control"  id="brought_rate">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group col-xl-3 col-md-4 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Quantity</label>
                        </div>
                        <div class="col-md-12">
                            <select name="brought_quantity[]" id="brought_quantity" class="form-select">
                            </select>
                            <span class="text-danger"></span>
                            <div class="text-danger" id="quantity_no"></div>
                        </div>
                    </div>
                </div>
                <div class="form-group col-xl-3 col-md-4 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Rate</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="brought_rate[]" id="brought_total_rate">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="col-md-12">
                        <h5>Reason For Conversion</h5>
                    </div>
                    <div class="form-group col-md-12 mb-2">
                        <div class="row align-items-center">

                            <div class="col-md-12">
                                <textarea class="form-control" name="reason[]" id="remark" value=""
                                    placeholder=""></textarea>
                                <span class="text-danger"></span>
                                <div class="text-danger" id="reason"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 ms-auto">
                    <div class="add-more form-group mt-4">
                        <a href="javascript:void(0);" class="listing_add add-more-conv"><i
                                class="fas fa-plus-circle"></i> Add More</a>
                    </div>
                </div>

                <div id="conv_form_add_new_row"></div>
            </div>
        </div>

        <div class="col-md-6 col-xl-2 col-lg-3">
            <div class="mb-1">
                <button type="submit" class="listing_add">Save</button>
            </div>
        </div>
        <div class="col-md-6 col-xl-2 col-lg-3">
            <div class="mb-1">
                <a href="" class="listing_exit">Back</a>
            </div>
        </div>
    </div>
</form>

{{-- conv add more div --}}

<div id="conv_new_html" hidden>
    <div class="new_html">
        <hr />
        <div class="col-md-12 count-class">
            <div class="row">
                <div class="row mb-4">
                    <div class="col-md-12">
                        <h5>Strike Off</h5>
                    </div>
                    <div class="form-group col-xl-3 col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Item Code</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select strike_item_code" name="strike_item_code[]">
                                    <option value="">Select</option>
                                    @foreach($itemCodes as $itemCode)
                                    <option value="{{ $itemCode->item_code_id }}">{{ $itemCode->item_code_id }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xl-3 col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Ledger No.</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control strike_ledger" name="strike_ledger[]" 
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xl-3 col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Desc</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control strike_description" name="strike_description[]" 
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xl-3 col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>C/NC/NCF</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control strike_c_nc" name="strike_c_nc[]" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xl-3 col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Unit Rate</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control strike_more_rate"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xl-3 col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Quantity</label>
                            </div>
                            <div class="col-md-12">
                                <select name="strike_quantity[]" class="form-select strike_more_quantity" >
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xl-3 col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Rate</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control strike_total_rate" name="strike_rate[]" 
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-12">
                        <h5>Brought on change</h5>
                    </div>
                    <div class="form-group col-xl-3 col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Item Code</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select brought_item_code" name="brought_item_code[]">
                                    <option value="">Select</option>
                                    @foreach($itemCodes as $itemCode)
                                    <option value="{{ $itemCode->item_code_id }}">{{ $itemCode->item_code_id }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xl-3 col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Ledgar No.</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control brought_ledger" name="brought_ledger[]" 
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xl-3 col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Desc</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control brought_description" name="brought_description[]" 
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xl-3 col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>C/NC/NCF</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control brought_c_nc" name="brought_c_nc[]" 
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xl-3 col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Unit Rate</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control brought_rate" name="" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xl-3 col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Quantity</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-control brought_more_quantity" name="brought_quantity[]" >

                                </select>
                                <span class="text-danger"></span>
                                <div class="text-danger" id="quantity_no"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xl-3 col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Rate</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control brought_total_rate" name="brought_rate[]" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="col-md-12">
                            <h5>Reason For Conversion</h5>
                        </div>
                        <div class="form-group col-md-12 mb-2">
                            <div class="row align-items-center">

                                <div class="col-md-12">
                                    <textarea class="form-control" name="reason[]" ></textarea>
                                    <span class="text-danger"></span>
                                    <div class="text-danger" id="quantity_no"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2 ms-auto">
                        <label>&nbsp;</label>
                        <button class="listing_add w-100 trash form-control"><i class="fa fa-times"></i></button>
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endif