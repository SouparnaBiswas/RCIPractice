@if (isset($edit))
    <form action="{{ route('security-gate-stores.update', $securityGate->id) }}" method="POST" id="security-gate-stores-edit-form">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    {{-- entry_time --}}
                    <div class="form-group col-md-6 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Date & Time
                                    of entry</label>
                            </div>
                            <div class="col-md-12">
                                <input type="datetime-local" class="form-control" name="entry_time" id="entry_time" value="{{$securityGate->entry_time}}"
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
                                <input type="text" class="form-control" name="dc_invoice_bill_voucher_no" id="dc_invoice_bill_voucher_no" value="{{$securityGate->dc_invoice_bill_voucher_no}}"
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
                                <input type="date" class="form-control" name="dc_invoice_bill_voucher_date" id="dc_invoice_bill_voucher_date" value="{{$securityGate->dc_invoice_bill_voucher_date}}"
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
                                        <option value="{{ $vendor->id }}" {{ $securityGate->vendor_id == $vendor->id ? 'selected' : '' }}>{{ $vendor->name }}</option>
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
                                        <option value="{{ $supplyOrder->id }}" {{ $securityGate->supply_order_id == $supplyOrder->id ? 'selected' : '' }}>{{ $supplyOrder->order_number }}</option>
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
                                <label>No. of Package</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="no_of_package" id="no_of_package" value="{{ $securityGate->no_of_package ?? '' }}"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                     {{-- vehicle_no --}}
                     <div class="form-group col-md-6 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Vehicle No. (If Applicable)</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="vehicle_no" id="vehicle_no" value="{{ $securityGate->vehicle_no ?? '' }}"
                                    placeholder="">
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
                                    placeholder=""> {{ $securityGate->remarks ?? '' }}</textarea>
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
    <form action="{{ route('security-gate-stores.store') }}" method="POST" id="security-gate-stores-create-form">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    {{-- entry_time --}}
                    <div class="form-group col-md-6 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Date & Time
                                    of entry</label>
                            </div>
                            <div class="col-md-12">
                                <input type="datetime-local" class="form-control" name="entry_time" id="entry_time" value=""
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
                                <label>No. of Package/Items</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="no_of_package" id="no_of_package" value=""
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    {{-- vehicle_no --}}
                    <div class="form-group col-md-6 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Vehicle No. (If Applicable)</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="vehicle_no" id="vehicle_no" value=""
                                    placeholder="">
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
