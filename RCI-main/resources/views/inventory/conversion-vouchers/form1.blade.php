@if (isset($edit))
    <form action="{{ route('conversion-vouchers.update', $conversionVoucher->id) }}" method="POST" id="conversion-vouchers-edit-form">
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
                                <input type="text" class="form-control" name="voucher_no" id="voucher_no" value="{{ $conversionVoucher->voucher_no ?? '' }}"
                                    placeholder="" readonly>
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
                                        <option value="{{ $item->id }}" {{ $item->id == $conversionVoucher->item_id ? 'selected' : '' }}>{{ $item->code }}</option>
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
                                <input type="date" class="form-control" name="voucher_date" id="voucher_date" value="{{ $conversionVoucher->voucher_date ?? '' }}"
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
                                <label>Inventory Number</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="inv_no" id="inv_no" disabled>
                                    <option value="">Select</option>
                                    @foreach($inventoryNumbers as $inventoryNumber)
                                        <option value="{{ $inventoryNumber->id }}" {{ $inventoryNumber->id == $conversionVoucher->inv_no ? 'selected' : '' }}>{{ $inventoryNumber->number }}</option>
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
                                <input type="text" class="form-control" name="quantity" id="quantity" value="{{ $conversionVoucher->quantity ?? '' }}"
                                    placeholder="" readonly>
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
                    <div class="form-group col-xl-3 col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Voucher Number</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="voucher_no" id="voucher_no" value=""
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xl-3 col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Type of voucher</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="item_code_id" id="item_code_id">
                                    <option value="">Select</option>
                                    @foreach($itemCodes as $item)
                                        <option value="{{ $item->item_code_id }}" data-hidden-value="{{ $item->total_quantity }}">{{ $item->itemCodes->code }}({{ $item->total_quantity }})</option>
                                    @endforeach
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
                                <label>Inventory Voucher Number</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="inv_no" id="inv_no">
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
                
                <div class="row mb-4">
                    <div class="col-md-12">
                        <h5>Strihc Off</h5>
                    </div>
                    <div class="form-group col-xl-3 col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Item Code</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="" id="" value="" placeholder="">
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
                                <input type="text" class="form-control" name="" id="" value=""
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
                                <input type="text" class="form-control" name="" id="" value=""
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
                                <input type="text" class="form-control" name="" id="" value=""
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
                                <select class="form-control" name="quantity" id="quantity">

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
                                <input type="text" class="form-control" name="" id="" value=""
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
                                <input type="text" class="form-control" name="" id="" value="" placeholder="">
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
                                <input type="text" class="form-control" name="" id="" value=""
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
                                <input type="text" class="form-control" name="" id="" value=""
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
                                <input type="text" class="form-control" name="" id="" value=""
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
                                <select class="form-control" name="quantity" id="quantity">

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
                                <input type="text" class="form-control" name="" id="" value=""
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
                    <div class="form-group col-md-12 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Remarks</label>
                            </div>
                            <div class="col-md-12">
                                <textarea class="form-control" name="remark" id="remark" value=""
                                    placeholder=""></textarea>
                                <span class="text-danger"></span>
                                <div class="text-danger" id="quantity_no"></div>
                            </div>
                        </div>
                    </div>
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
@endif
