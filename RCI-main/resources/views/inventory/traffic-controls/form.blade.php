@if (isset($edit))
    <form action="{{ route('traffic-controls.update', $trafficControl->id) }}" method="POST" id="traffic-controls-edit-form">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-6 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>TCR SL Number</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="tcr_number" id="tcr_number" value="{{ $trafficControl->tcr_number ?? '' }}"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    {{-- lr_rr_awb_bl_app_rpp_number --}}
                    <div class="form-group col-md-6 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>LR/RR/AWB/BL/App/RPP Number</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="lr_rr_awb_bl_app_rpp_number" id="lr_rr_awb_bl_app_rpp_number" value="{{ $trafficControl->lr_rr_awb_bl_app_rpp_number ?? '' }}"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    {{-- lr_rr_awb_bl_app_rpp_date --}}
                    <div class="form-group col-md-6 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>LR/RR/AWB/BL/App/RPP Date</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="lr_rr_awb_bl_app_rpp_date" id="lr_rr_awb_bl_app_rpp_date" value="{{ $trafficControl->lr_rr_awb_bl_app_rpp_date ?? '' }}"
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
                                        <option value="{{ $vendor->id }}" {{ $trafficControl->vendor_id == $vendor->id ? 'selected' : '' }}>{{ $vendor->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    {{-- transport_id --}}
                    <div class="form-group col-md-6 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Name of Transporter/
                                    Carrier</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="transport_id" id="transport_id">
                                    <option value="">Select Transport</option>
                                    @foreach ($transports as $transport)
                                        <option value="{{ $transport->id }}" {{ $trafficControl->transport_id == $transport->id ? 'selected' : '' }}>{{ $transport->name }}</option>
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
                                <label>Supply order No / Contract No. / Authority No.</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="supply_order_id" id="supply_order_id">
                                    <option value="">Select Supply Order</option>
                                    @foreach ($supplyOrders as $supplyOrder)
                                        <option value="{{ $supplyOrder->id }}" {{ $trafficControl->supply_order_id == $supplyOrder->id ? 'selected' : '' }}>{{ $supplyOrder->order_number }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    {{-- contract_no --}}
                    {{-- <div class="form-group col-md-6 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Contract No.</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="contract_no" id="contract_no" value="{{ $trafficControl->contract_no ?? '' }}"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div> --}}
                    {{-- authority_and_date --}}
                    {{-- <div class="form-group col-md-6 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Authority & Date</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="authority_and_date" id="authority_and_date" value="{{ $trafficControl->authority_and_date ?? '' }}"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div> --}}
                    {{-- date_of_collection_of_stores --}}
                    <div class="form-group col-md-6 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Date of Collection of Stores</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="date_of_collection_of_stores" id="date_of_collection_of_stores" value="{{ $trafficControl->date_of_collection_of_stores ?? '' }}"
                                    placeholder="">
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
                                <input type="text" class="form-control" name="no_of_package" id="no_of_package" value="{{ $trafficControl->no_of_package ?? '' }}"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    {{-- gross_weight --}}
                    <div class="form-group col-md-6 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Gross Weight</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="gross_weight" id="gross_weight" value="{{ $trafficControl->gross_weight ?? '' }}"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    {{-- condition_of_package --}}
                    <div class="form-group col-md-6 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Condition of Package</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="condition_of_package" id="condition_of_package" value="{{ $trafficControl->condition_of_package ?? '' }}"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    {{-- amount --}}
                    <div class="form-group col-md-6 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Amount</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="amount" id="amount" value="{{ $trafficControl->amount ?? '' }}"
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
                                    placeholder=""> {{ $trafficControl->remarks ?? '' }}</textarea>
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
    <form action="{{ route('traffic-controls.store') }}" method="POST" id="traffic-controls-create-form">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-6 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>TCR SL Number</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="tcr_number" id="tcr_number" value=""
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    {{-- lr_rr_awb_bl_app_rpp_number --}}
                    <div class="form-group col-md-6 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>LR/RR/AWB/BL/App/RPP Number</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="lr_rr_awb_bl_app_rpp_number" id="lr_rr_awb_bl_app_rpp_number" value=""
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    {{-- lr_rr_awb_bl_app_rpp_date --}}
                    <div class="form-group col-md-6 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>LR/RR/AWB/BL/App/RPP Date</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="lr_rr_awb_bl_app_rpp_date" id="lr_rr_awb_bl_app_rpp_date" value=""
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
                                        <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    {{-- transport_id --}}
                    <div class="form-group col-md-6 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Name of Transporter/
                                    Carrier</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="transport_id" id="transport_id">
                                    <option value="">Select Transport</option>
                                    @foreach ($transports as $transport)
                                        <option value="{{ $transport->id }}">{{ $transport->name }}</option>
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
                                <label>Supply order No / Contract No. / Authority No.</label>
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
                    {{-- contract_no --}}
                    {{-- <div class="form-group col-md-6 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Contract No.</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="contract_no" id="contract_no" value=""
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div> --}}
                    {{-- authority_and_date --}}
                    {{-- <div class="form-group col-md-6 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Authority & Date</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="authority_and_date" id="authority_and_date" value=""
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div> --}}
                    {{-- date_of_collection_of_stores --}}
                    <div class="form-group col-md-6 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Date of Collection of Stores</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="date_of_collection_of_stores" id="date_of_collection_of_stores" value=""
                                    placeholder="">
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
                                <input type="text" class="form-control" name="no_of_package" id="no_of_package" value=""
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    {{-- gross_weight --}}
                    <div class="form-group col-md-6 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Gross Weight</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="gross_weight" id="gross_weight" value=""
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    {{-- condition_of_package --}}
                    <div class="form-group col-md-6 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Condition of Package</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="condition_of_package" id="condition_of_package" value=""
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    {{-- amount --}}
                    <div class="form-group col-md-6 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Amount</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="amount" id="amount" value=""
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
