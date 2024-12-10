@if (isset($edit))
    <form action="{{ route('debit-vouchers.update', $debitVoucher->id) }}" method="POST" id="debit-vouchers-edit-form">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Inventory Number</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-control" name="inv_no" id="inv_no">
                                    <option value="">Select</option>
                                    @foreach($inventoryNumbers as $inventoryNumber)
                                        <option value="{{ $inventoryNumber->id }}" {{ $inventoryNumber->id == $debitVoucher->inv_no ? 'selected' : '' }}>{{ $inventoryNumber->number }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Item Code(Quantity)</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-control" name="item_code_id" id="item_code_id" disabled>
                                    <option value="">Select</option>
                                    @foreach($creditVouchers as $item)
                                        <option value="{{ $item->item_code_id }}" {{ $item->item_code_id == $debitVoucher->item_id ? 'selected' : '' }}>{{ $item->itemCode->code }}({{ $item->total_quantity }})</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Voucher Number</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="voucher_no" id="voucher_no" value="{{ $debitVoucher->voucher_no ?? '' }}"
                                    placeholder="" readonly>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    
                </div>
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Voucher Date</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="voucher_date" id="voucher_date" value="{{ $debitVoucher->voucher_date ?? '' }}"
                                    placeholder="" readonly>
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
                                <input type="text" class="form-control" name="quantity" id="quantity" value="{{ $debitVoucher->quantity ?? '' }}"
                                    placeholder="" readonly>
                                    {{-- <div class="text-danger" id="quantity_no"></div> --}}
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Voucher Type</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-control" name="voucher_type" id="voucher_type">
                                    <option value="">Select</option>
                                    <option value="transfer" {{ $debitVoucher->voucher_type == 'transfer' ? 'selected' : '' }}>Transfer</option>
                                    <option value="voucher" {{ $debitVoucher->voucher_type == 'voucher' ? 'selected' : '' }}>Voucher</option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Remarks</label>
                            </div>
                            <div class="col-md-12">
                                <textarea class="form-control" name="remarks" id="remarks" 
                                    placeholder="" >{{ $debitVoucher->remarks }}</textarea>
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
    <form action="{{ route('debit-vouchers.store') }}" method="POST" id="debit-vouchers-create-form">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Voucher date</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" name="voucher_date" class="form-control" value="{{ now()->format('Y-m-d') }}">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Voucher Type</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="voucher_type" id="voucher_type_1" onchange="getVoucherType(this)">
                                    <option value="">Select</option>
                                    <option value="transfer">Transfer</option>
                                    <option value="voucher">Voucher</option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Inv. No.</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="inv_no" id="inv_no_1">
                                    <option value="">Select</option>
                                    @foreach($inventoryNumbers as $inventoryNumber)
                                        <option value="{{ $inventoryNumber->id }}">{{ $inventoryNumber->number }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Item List(Quantity)</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="item_code_id[]" id="item_code_id_1" disabled>
                                    {{-- <option value="">Select</option>
                                    @foreach($creditVouchers as $item)
                                        <option value="{{ $item->item_code_id }}" data-hidden-value="{{ $item->total_quantity }}">{{ $item->itemCodes->code }}({{ $item->total_quantity }})</option>
                                    @endforeach --}}
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Item Type</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="item_type[]" id="item_type_1" value=""
                                    placeholder="" readonly>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Item Desc</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="item_desc[]" id="item_desc_1" value=""
                                    placeholder="" readonly>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row mb-2">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Quantity</label>
                            </div>
                            <div class="col-md-12">
                                    <select class="form-select" name="quantity[]" id="quantity">
                                        <option value="">Select</option>
                                    </select>
                                    <div class="text-danger" id="quantity_no"></div>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Remarks</label>
                            </div>
                            <div class="col-md-12">
                                <textarea class="form-control" name="remarks[]" id="remarks" 
                                    placeholder=""></textarea>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 ms-auto">
                        <div class="add-more form-group mt-4">
                            <a href="javascript:void(0);" class="listing_add add-pre_qualification" id="add-row"><i
                                    class="fas fa-plus-circle"></i> Add More</a>
                        </div>
                    </div>
                </div>
                
                <div id="debit_form_add_new_row"></div>
            </div>
            <div class="col-md-2">
                <div class="mb-1">
                    <button type="submit" class="listing_add">Save</button>
                </div>
                <div class="mb-1">
                    <a href="" class="listing_exit">Back</a>
                </div>
            </div>
        </div>
    </form>

    <div id="debit_new_html" hidden>
        <div class="row new_html">
            <hr />
            <div class="col-md-12 count-class">
                <div class="row">
                    {{-- <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Inv. No.</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select inv_no" name="inv_no" id="inv_no" disabled>
                                    <option value="">Select</option>
                                    @foreach($inventoryNumbers as $inventoryNumber)
                                        <option value="{{ $inventoryNumber->id }}">{{ $inventoryNumber->number }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div> --}}
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Item List(Quantity)</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select item_code_id" name="item_code_id[]" id="item_code_id" onchange="getQuantity(this)">
                                    {{-- <option value="">Select</option> --}}
                                    {{-- @foreach($creditVouchers as $item)
                                        <option value="{{ $item->item_code_id }}" data-hidden-value="{{ $item->total_quantity }}">{{ $item->itemCodes->code }}({{ $item->total_quantity }})</option>
                                    @endforeach --}}
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Item Desc</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="item_desc[]" id="item_desc" value=""
                                    placeholder="" readonly>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Item Type</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control item-type" name="item_type[]" id="item_type" value=""
                                    placeholder="" readonly>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div> 
                </div>
                <div class="row">
                   
                    {{-- <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Voucher Number</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control voucher-no" name="voucher_no" id="voucher_no" value=""
                                    placeholder="" readonly>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div> --}}

                   
                    {{-- <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Voucher Date</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control voucher-date" name="voucher_date" id="voucher_date" value="{{ now()->format('Y-m-d') }}"
                                    placeholder="" readonly>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div> --}}
                </div>
                <div class="row mb-2">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Quantity</label>
                            </div>
                            <div class="col-md-12">
                                    <select class="form-select" name="quantity[]" id="quantity">
                                        <option value="">Select</option>
                                    </select>
                                    <div class="text-danger" id="quantity_no"></div>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Voucher Type</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select voucher-type" name="voucher_type" id="voucher_type" disabled>
                                    <option value="">Select</option>
                                    <option value="transfer">Transfer</option>
                                    <option value="voucher">Voucher</option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div> --}}
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Remarks</label>
                            </div>
                            <div class="col-md-12">
                                <textarea class="form-control" name="remarks[]" id="remarks" 
                                    placeholder=""></textarea>
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
@endif
