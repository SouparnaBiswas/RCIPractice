@if (isset($edit))
    <form action="{{ route('store-inward.update', $storeInward->id) }}" method="POST" id="store-inward-edit-form">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    {{-- entry_time --}}
                    <div class="form-group col-md-6 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>TCR SL Number (If Applicable)</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="tcr_number" id="tcr_number" value="{{ $storeInward->tcr_number ?? '' }}"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                     {{-- dc_invoice_bill_voucher_no --}}
                    <div class="form-group col-md-6 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>DC/Invoice/Bill
                                    /Vouche No.</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="dc_invoice_bill_voucher_no" id="dc_invoice_bill_voucher_no" value="{{$storeInward->dc_invoice_bill_voucher_no}}"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    {{-- dc_invoice_bill_voucher_date --}}
                    <div class="form-group col-md-6 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>DC/Invoice/Bill
                                    /Vouche Date</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="dc_invoice_bill_voucher_date" id="dc_invoice_bill_voucher_date" value="{{$storeInward->dc_invoice_bill_voucher_date}}"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    {{-- vendor_id --}}
                    <div class="form-group col-md-6 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Name of
                                    Consignor</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="vendor_id" id="vendor_id">
                                    <option value="">Select Consignor</option>
                                    @foreach ($vendors as $vendor)
                                        <option value="{{ $vendor->id }}" {{ $storeInward->vendor_id == $vendor->id ? 'selected' : '' }}>{{ $vendor->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-6 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Date of receipt</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="date_of_receipt" id="date_of_receipt" value="{{$storeInward->date_of_receipt}}"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    {{-- supply_order_id --}}
                    <div class="form-group col-md-6 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Supply Order/Contract/Authority / Cash
                                    Purchase Authorization No.</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="supply_order_id" id="supply_order_id">
                                    <option value="">Select Supply Order</option>
                                    @foreach ($supplyOrders as $supplyOrder)
                                        <option value="{{ $supplyOrder->id }}" {{ $storeInward->supply_order_id == $supplyOrder->id ? 'selected' : '' }}>{{ $supplyOrder->order_number }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    {{-- no_of_package --}}
                    <div class="form-group col-md-6 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Qty received</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="qty_received" id="qty_received" value="{{ $storeInward->qty_received ?? '' }}"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                     {{-- vehicle_no --}}
                     <div class="form-group col-md-6 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Rin No. </label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="rin_no" id="rin_no" value="{{ $storeInward->rin_no ?? '' }}"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-6 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Rin Date</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="rin_date" id="rin_date" value="{{$storeInward->rin_date}}"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-12 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Nomenclature</label>
                            </div>
                            <div class="col-md-12">
                                <textarea class="form-control" name="nomenclature" id="nomenclature" value=""
                                    placeholder=""> {{ $storeInward->nomenclature ?? '' }}</textarea>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-12 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Remarks</label>
                            </div>
                            <div class="col-md-12">
                                <textarea class="form-control" name="remarks" id="remarks" value=""
                                    placeholder=""> {{ $storeInward->remarks ?? '' }}</textarea>
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
    <form action="{{ route('store-inward.store') }}" method="POST" id="store-inward-create-form">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    {{-- entry_time --}}
                    <div class="form-group col-md-6 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>TCR SL Number (If Applicable)</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="tcr_number" id="tcr_number" value=""
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                     {{-- dc_invoice_bill_voucher_no --}}
                    <div class="form-group col-md-6 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>DC/Invoice/Bill
                                    /Vouche No.</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="dc_invoice_bill_voucher_no" id="dc_invoice_bill_voucher_no" value=""
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    {{-- dc_invoice_bill_voucher_date --}}
                    <div class="form-group col-md-6 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>DC/Invoice/Bill
                                    /Vouche Date</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="dc_invoice_bill_voucher_date" id="dc_invoice_bill_voucher_date" value=""
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-6 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Date of receipt</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="date_of_receipt" id="date_of_receipt" value=""
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    {{-- vendor_id --}}
                    <div class="form-group col-md-6 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Name and address
                                    of Consignor</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="vendor_id" id="vendor_id">
                                    <option value="">Select Consignor</option>
                                    @foreach ($vendors as $vendor)
                                        <option value="{{ $vendor->id }}">{{ $vendor->name }} ({{ $vendor->address ?? '-' }})</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    {{-- supply_order_id --}}
                    <div class="form-group col-md-6 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Supply Order/Contract/Authority / Cash
                                    Purchase Authorization No.</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="supply_order_id" id="supply_order_id">
                                    <option value="">Select Supply Order</option>
                                    @foreach ($supplyOrders as $supplyOrder)
                                        <option value="{{ $supplyOrder->id }}">{{ $supplyOrder->order_number }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    {{-- no_of_package --}}
                    <div class="form-group col-md-6 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Qty received</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="qty_received" id="qty_received" value=""
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    {{-- vehicle_no --}}
                    <div class="form-group col-md-6 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Rin No. </label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="rin_no" id="rin_no" value=""
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-6 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Rin Date</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="rin_date" id="rin_date" value=""
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-12 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Nomenclature</label>
                            </div>
                            <div class="col-md-12">
                                <textarea class="form-control" name="nomenclature" id="nomenclature" value=""
                                    placeholder=""></textarea>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    {{-- remarks --}}
                    <div class="form-group col-md-12 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Remarks</label>
                            </div>
                            <div class="col-md-12">
                                <textarea class="form-control" name="remarks" id="remarks" value=""
                                    placeholder=""></textarea>
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
