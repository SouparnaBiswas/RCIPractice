@if (isset($set_rins))
@if (count($rins) > 0)
@foreach ($rins as $rin)
<div class="row count-class">
    {{-- @dd($rin->itemCode) --}}
    <div class="form-group col-md-4 mb-2">
        <div class="row align-items-center">
            <div class="col-md-12">
                <label>Item Code</label>
            </div>
            <div class="col-md-12">
                <input type="text" class="form-control" name="item_code[]" id="item_code" value="{{ $rin->itemCode->code }}"
                    placeholder="">
                <input type="hidden" class="form-control" name="item_code_id[]" id="" value="{{ $rin->itemCode->id }}"
                    placeholder="">
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
                <textarea class="form-control" name="description[]" id="description" placeholder="" readonly>{{ $rin->itemCode->description }}</textarea>
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
                <input type="text" class="form-control" name="uom[]" id="uom" value="{{ $rin->itemCode->uomajorment ? $rin->itemCode->uomajorment->name : '' }}"
                    placeholder="" readonly>
                <input type="hidden" name="uom_id[]" id="uom_id" value="{{ $rin->itemCode->uomajorment ? $rin->itemCode->uomajorment->id : '' }}">
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
                {{-- <select class="form-control" name="item_type" id="item_type">
                    <option value="">Select</option>
                    <option value="consumable">Consumable</option>
                    <option value="non-consumable">Non Consumable</option>
                </select> --}}

                <input type="text" class="form-control" name="item_type[]" id="item_type" value=" {{ $rin->itemCode->item_type }}" placeholder="" readonly>
                <span class="text-danger"></span>
            </div>
        </div>
    </div>

    <div class="form-group col-md-4 mb-2">
        <div class="row align-items-center">
            <div class="col-md-12">
                <label>Unit Price </label>
            </div>
            <div class="col-md-12">
                <input type="text" class="form-control price" name="price[]" id="price" value="{{ $rin->unit_cost }}"
                    placeholder="">
                <span class="text-danger"></span>
            </div>
        </div>
    </div>

   

    <div class="form-group col-md-4 mb-2">
        <div class="row align-items-center">
            <div class="col-md-12">
                <label>Discount(%)</label>
            </div>
            <div class="col-md-12">
                <input type="text" class="form-control disc_percent" name="disc_percent[]" id="disc_percent" 
                    placeholder="">
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
                <input type="text" class="form-control disc_amt" name="disc_amt[]" id="disc_amt"
                    placeholder="" >
                <span class="text-danger"></span>
            </div>
        </div>
    </div>
    
    <div class="form-group col-md-4 mb-2">
        <div class="row align-items-center">
            <div class="col-md-12">
                <label>Total Unit Price</label>
            </div>
            <div class="col-md-12">
                <input type="text" class="form-control total_price" name="total_price[]" id="total_price" value=""
                    placeholder="">
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
                <input type="text" class="form-control" name="quantity[]" id="quantity"  placeholder="" value="{{ $rin->received_quantity }}">
                <span class="text-danger"></span>
            </div>
        </div>
    </div>
    

    

    
    
   
    
        
   
    
    
</div>
<hr>
@endforeach
@endif

@endif