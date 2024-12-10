@if (isset($edit))
    <form action="{{ route('credit-vouchers.update', $creditVoucher->id) }}" method="POST" id="credit-vouchers-edit-form">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Item Code</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-control" name="item_code_id" id="item_code_id" disabled>
                                    <option value="">Select</option>
                                    @foreach ($itemCodes as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $item->id == $creditVoucher->item_code_id ? 'selected' : '' }}>
                                            {{ $item->code }}</option>
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
                                    value="{{ $creditVoucher->voucher_date ?? '' }}" placeholder="">
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
                                <select class="form-control" name="inv_no" id="inv_no" disabled>
                                    <option value="">Select</option>
                                    @foreach ($inventoryNumbers as $inventoryNumber)
                                        <option value="{{ $inventoryNumber->id }}"
                                            {{ $inventoryNumber->id == $creditVoucher->inv_no ? 'selected' : '' }}>
                                            {{ $inventoryNumber->number }}</option>
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
                                <textarea class="form-control" name="description" id="description" placeholder="" readonly>{{ $creditVoucher->description }}</textarea>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>UOM</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="uom" id="uom"
                                    value="{{ $creditVoucher->uom ?? '' }}" placeholder="">
                                <input type="hidden" name="uom_id[]" id="uom_id">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Item Type</label>
                            </div>
                            <div class="col-md-12">
                                {{-- <select class="form-control" name="item_type" id="item_type">
                                    <option value="">Select</option>
                                    <option value="consumable" {{ $creditVoucher->item_type == 'consumable' ? 'selected' : '' }}>Consumable</option>
                                    <option value="non-consumable" {{ $creditVoucher->item_type == 'non-consumable' ? 'selected' : '' }}>Non Consumable</option>
                                </select> --}}
                                <input type="text" class="form-control" name="item_type" id="item_type"
                                    value="{{ $creditVoucher->item_type ?? '' }}" placeholder="" readonly>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Tax </label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="tax" id="edit_tax"
                                    value="{{ $creditVoucher->tax ?? '' }}" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Tax Amount </label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control tax" name="tax_amt[]" id="tax_amt"
                                    value="{{ $creditVoucher->tax_amt ?? '' }}" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Price </label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="price" id="edit_price"
                                    value="{{ $creditVoucher->price ?? '' }}" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Total Price </label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="total_price" id="edit_total_price"
                                    value="{{ $creditVoucher->total_price ?? '' }}" placeholder="">
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
                                    value="{{ $creditVoucher->quantity ?? '' }}" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Supply Order Number</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-control" name="supply_order_no" id="supply_order_no">
                                    <option value="">Select</option>
                                    @foreach ($supplyOrders as $supplyOrder)
                                        <option value="{{ $supplyOrder->id }}"
                                            {{ $supplyOrder->id == $creditVoucher->supply_order_no ? 'selected' : '' }}>
                                            {{ $supplyOrder->order_number }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Receipt & Inspection Note (RIN)</label>
                            </div>
                            <div class="col-md-12">
                                {{-- <input type="text" class="form-control" name="rin" id="rin" value=""
                                    placeholder=""> --}}
                                    {{-- <select class="form-control" name="rin[]" id="rin">
                                        <option value="">Select</option>
                                        @foreach ($rins as $rin)
                                            <option value="{{ $rin->id }}" {{ $rin->id == $creditVoucher->rin ? 'selected' : '' }}>{{ $rin->rin_no }}
                                            </option>
                                        @endforeach
                                    </select> --}}
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Order Type</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-control" name="order_type" id="order_type">
                                    <option value="">Select</option>
                                    <option value="rs" {{ $creditVoucher->order_type == 'rs' ? 'selected' : '' }}>
                                        RS</option>
                                    <option value="rv" {{ $creditVoucher->order_type == 'rv' ? 'selected' : '' }}>
                                        RV</option>
                                    <option value="crv"
                                        {{ $creditVoucher->order_type == 'crv' ? 'selected' : '' }}>CRV</option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 mb-2" id="edit_member_div">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Inventory Holder Name</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-control" name="member_id" id="edit_member_id" disabled>
                                    <option value="">Select Name</option>
                                    @foreach ($members as $member)
                                        <option value="{{ $member->id }}"
                                            {{ $creditVoucher->member_id == $member->id ? 'selected' : '' }}>
                                            {{ $member->user_name }}</option>
                                    @endforeach
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
    <form action="{{ route('credit-vouchers.store') }}" method="POST" id="credit-vouchers-create-form">
        @csrf
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Receipt & Inspection Note (RIN)</label>
                            </div>
                            <div class="col-md-12">
                                    <select class="form-control rin" name="rin" id="rin1">
                                        <option value="">Select</option>
                                        @foreach ($rins as $key => $rin)
                                            <option value="{{ $key }}">{{ $key }}
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
                                <label>Voucher Date</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="voucher_date" id="voucher_date_1"
                                    max="{{ date('Y-m-d') }}">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Inventory Number</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-control" name="inv_no" id="inv_no">
                                    <option value="">Select</option>
                                    @foreach ($inventoryNumbers as $inventoryNumber)
                                    <option value="{{ $inventoryNumber->id }}"
                                        data-hidden-value="{{ $inventoryNumber->inventory_type }}">
                                        {{ $inventoryNumber->number }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2 member_div" hidden id="member_div">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-md-12">
                                <label>Inventory Holder Name</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-control" name="member_id" id="member_id">
                                    <option value="">Select Name</option>
                                    @foreach ($members as $member)
                                    <option value="{{ $member->id }}">{{ $member->user_name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 mb-2 project_div" hidden id="project_div">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-md-12">
                                <label>Inventory Project Name</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-control" name="project_id" id="project_id">
                                    <option value="">Select Name</option>
                                    @foreach ($projects as $project)
                                    <option value="{{ $project->id }}">{{ $project->project_name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Order Type</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-control" name="order_type" id="order_type">
                                    <option value="">Select</option>
                                    <option value="rs">RS</option>
                                    <option value="rv">RV</option>
                                    <option value="crv">CRV</option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Cost Debatable to Budget Head</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="cost_debatable" id="cost_debatable" value=""
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Supply Order Number</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-control" name="supply_order_no" id="supply_order_no">
                                    <option value="">Select</option>
                                    @foreach ($supplyOrders as $supplyOrder)
                                    <option value="{{ $supplyOrder->id }}">{{ $supplyOrder->order_number }}
                                    </option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12" id="receipt-and-inspection">
                        @include('inventory.credit-vouchers.rin')
                    
                    </div>
                </div>
            </div>

                    
            <div class="col-md-3">
                <div class="mb-1">
                    <button type="submit" class="listing_add">Save</button>
                </div>
                <div class="mb-1">
                    <a href="" class="listing_exit">Back</a>
                </div>
            </div>
        </div>
    </form>

    <div id="credit_new_html" hidden>
        <div class="row new_html">
            <hr />
            <div class="col-md-12 count-class">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Item Code</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-control item-code" name="item_code_id[]" id=""
                                    onchange="getItemDetails(this)">
                                    <option value="">Select</option>
                                    @foreach ($itemCodes as $item)
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
                                <label>Voucher Date</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control voucher-date" name="voucher_date"
                                    id="voucher_date" value="" placeholder="" readonly>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Inventory Number</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-control" name="inv_no[]" id="inv_no"
                                    onchange="getInvDetail(this)">
                                    <option value="">Select</option>
                                    @foreach ($inventoryNumbers as $inventoryNumber)
                                        <option value="{{ $inventoryNumber->id }}"
                                            data-hidden-value="{{ $inventoryNumber->inventory_type }}">
                                            {{ $inventoryNumber->number }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Description</label>
                            </div>
                            <div class="col-md-12">
                                <textarea class="form-control" name="description[]" id="description" placeholder="" readonly></textarea>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>UOM</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="uom[]" id="uom"
                                    value="" placeholder="">
                                    <input type="hidden" name="uom_id[]" id="uom_id">
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

                                <input type="text" class="form-control" name="item_type[]" id="item_type"
                                    value="" placeholder="" readonly>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Tax(%) </label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control tax" name="tax[]" id="tax"
                                    value="" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Price </label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control price" name="price[]" id="price"
                                    value="" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Tax Amount </label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control tax_amt" name="tax_amt[]" id="tax_amt"
                                    value="" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Discount(%)</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control disc_percent" name="disc_percent[]"
                                    id="disc_percent" value="" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Discount Amt</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control disc_amt" name="disc_amt[]"
                                    id="disc_amt" value="" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>GST(%)</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-control gst_percent" name="gst_percent[]" id="gst_percent">
                                    <option value="">Select</option>
                                    @foreach ($gstPercentages as $gstPercentage)
                                        <option value="{{ $gstPercentage->id }}">{{ $gstPercentage->gst_percent }}
                                            {{-- <input type="hidden" name="gst_percent_id[]" id="gst_percent_id" value="{{  }}"> --}}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>GST Amount</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control gst_amt" name="gst_amt[]"
                                    id="gst_amt" value="" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Total Price</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control total_price" name="total_price[]"
                                    id="total_price" value="" placeholder="">
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
                                <input type="text" class="form-control" name="quantity[]" id="quantity"
                                    value="" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Supply Order Number</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-control" name="supply_order_no[]" id="supply_order_no">
                                    <option value="">Select</option>
                                    @foreach ($supplyOrders as $supplyOrder)
                                        <option value="{{ $supplyOrder->id }}">{{ $supplyOrder->order_number }}
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
                                <label>Receipt & Inspection Note (RIN)</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-control rin" name="rin[]" id="rin" disabled>
                                    <option value="">Select</option>
                                    {{-- @foreach ($rins as $rin)
                                        <option value="{{ $rin->id }}">{{ $rin->rin_no }}
                                        </option>
                                    @endforeach --}}
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Cost Debatable to Budget Head</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="cost_debatable[]" id="cost_debatable"
                                    value="" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Order Type</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-control" name="order_type[]" id="order_type">
                                    <option value="">Select</option>
                                    <option value="rs">RS</option>
                                    <option value="rv">RV</option>
                                    <option value="crv">CRV</option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Consigner's Name & Address</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-control" name="consigner[]" id="consigner">
                                    <option value="">Select Name</option>
                                    @foreach ($vendors as $consigner)
                                        <option value="{{ $consigner->id }}">{{ $consigner->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-3 mb-2" hidden id="member_div">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Inventory Holder Name</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-control" name="member_id[]" id="member_id">
                                    <option value="">Select Name</option>
                                    @foreach ($members as $member)
                                        <option value="{{ $member->id }}">{{ $member->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-3 mb-2" hidden id="project_div">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-md-12">
                                <label>Inventory Project Name</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-control" name="project_id[]" id="project_id">
                                    <option value="">Select Name</option>
                                    @foreach ($projects as $project)
                                        <option value="{{ $project->id }}">{{ $project->project_name }}</option>
                                    @endforeach
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
@endif
