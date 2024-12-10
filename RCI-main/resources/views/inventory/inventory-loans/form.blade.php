@if (isset($edit))
<form action="{{ route('inventory-loans.update', $inventoryLoan->id) }}" method="POST"
    id="inventory-loans-edit-form">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-md-10">
            <div class="row">
                <div class="form-group col-md-3 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Inventory/ICC No.</label>
                        </div>
                        <div class="col-md-12">
                            <select class="form-select" name="inventory_id" id="inventory_id">
                                <option value="">Select</option>
                                @foreach($inventories as $inventory)
                                <option value="{{ $inventory->id }}" {{ $inventory->id == $inventoryLoan->icc_no ? 'selected':'' }}>{{ $inventory->number }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>


                <div class="form-group col-md-3 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Item Code</label>
                        </div>
                        <div class="col-md-12">
                            <select class="form-select" name="item_code_id" id="item_code_edit">
                                <option value="">Select</option>
                                @foreach($itemCodes as $itemCode)
                                <option value="{{ $itemCode->id }}" {{ $itemCode->id == $inventoryLoan->item_code ? 'selected':'' }}>{{ $itemCode->code }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-4 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Nomenclature</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" name="nomenclature" class="form-control" id="nomenclature_edit" value="{{ $inventoryLoan->nomenclature ?? ''}}">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-3 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Unit Price</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" name="unit_price" class="form-control" id="unit_price_edit" value="{{ $inventoryLoan->unit_price ?? ''}}">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-3 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Quantity Issue</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" name="quantity_issue" class="form-control" id="quantity_issue_edit" value="{{ $inventoryLoan->quantity_issue ?? ''}}">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-4 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Total Cost</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" name="total_cost" class="form-control" id="total_cost_edit" value="{{ $inventoryLoan->cost ?? ''}}">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-4 mb-2 ">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Name Of the borrower</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" name="borrower_name" class="form-control" value="{{ $inventoryLoan->name_of_borrower ?? ''}}">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-3 mb-2 ">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Date of issue</label>
                        </div>
                        <div class="col-md-12">
                            <input type="date" name="date_of_issue" class="form-control" value="{{ $inventoryLoan->date_of_issue ?? ''}}">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-3 mb-2 ">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Date of return</label>
                        </div>
                        <div class="col-md-12">
                            <input type="date" name="date_of_return" class="form-control" value="{{ $inventoryLoan->date_of_return ?? ''}}">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>


                <div class="form-group col-md-7 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Remarks</label>
                        </div>
                        <div class="col-md-12">
                            <textarea name="remarks" class="form-control">{{ $inventoryLoan->remarks }}</textarea>
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
<form action="{{ route('inventory-loans.store') }}" method="POST" id="inventory-loans-create-form">
    @csrf
    <div class="row">
        <div class="col-md-10">
            <div class="row">
                <div class="form-group col-md-3 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Inventory/ICC No.</label>
                        </div>
                        <div class="col-md-12">
                            <select class="form-select" name="inventory_id" id="inventory_id">
                                <option value="">Select</option>
                                @foreach($inventories as $inventory)
                                <option value="{{ $inventory->id }}">{{ $inventory->number }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>


                <div class="form-group col-md-3 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Item Code</label>
                        </div>
                        <div class="col-md-12">
                            <select class="form-select" name="item_code_id" id="item_code_id">
                                <option value="">Select</option>
                                @foreach($itemCodes as $itemCode)
                                <option value="{{ $itemCode->id }}">{{ $itemCode->code }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-4 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Nomenclature</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" name="nomenclature" class="form-control" id="nomenclature">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-3 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Unit Price</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" name="unit_price" class="form-control" id="unit_price">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-3 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Quantity Issue</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" name="quantity_issue" class="form-control" id="quantity_issue">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-4 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Total Cost</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" name="total_cost" class="form-control" id="total_cost">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-4 mb-2 ">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Name Of the borrower</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" name="borrower_name" class="form-control">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-3 mb-2 ">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Date of issue</label>
                        </div>
                        <div class="col-md-12">
                            <input type="date" name="date_of_issue" class="form-control">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-3 mb-2 ">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Date of return</label>
                        </div>
                        <div class="col-md-12">
                            <input type="date" name="date_of_return" class="form-control">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>


                <div class="form-group col-md-7 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Remarks</label>
                        </div>
                        <div class="col-md-12">
                            <textarea name="remarks" class="form-control"></textarea>
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