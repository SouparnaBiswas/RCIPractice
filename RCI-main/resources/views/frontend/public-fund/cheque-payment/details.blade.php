@if(isset($detail))

<div class="row">
    <div class="col-lg-3 vr-no-field" >
        <div class="form-group mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>Vr. No</label>
                </div>
                <div class="col-md-12">
                    <input type="text" class="form-control"  name="" id="vr_no"  value="{{ $receipt->vr_no ?? '' }}" 
                        placeholder="" readonly>
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 vr-date-field" >
        <div class="form-group mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>Vr. Date</label>
                </div>
                <div class="col-md-12">
                    <input type="date" class="form-control"  name="" id="vr_date"  value="{{ $receipt->vr_date ?? '' }}" 
                        placeholder="" readonly>
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3  net-amount-field" >
        <div class="form-group mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>Net Amount</label>
                </div>
                <div class="col-md-12">
                    <input type="text" class="form-control"  name="" id="net_amount"  value="{{ $receipt->amount ?? '' }}"   
                        placeholder="" readonly>
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 net-amount-field">
        <div class="form-group mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>Sr no</label>
                </div>
                <div class="col-md-12">
                    <input type="text" class="form-control"  name="" id="form-detail"  value="{{ $receipt->sr_no ?? '' }}"   
                        placeholder="" readonly>
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 vendor-field">
        <div class="form-group mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>Vendor</label>
                </div>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" id="vendor" value="{{ $receipt->fundVendor->f_name ?? '' }} {{ $receipt->fundVendor->l_name ?? '' }}" placeholder="" readonly>
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 category-field" >
        <div class="form-group mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>Desig</label>
                </div>
                <div class="col-md-12">
                    <input type="text" class="form-control"  value="{{ $receipt->fundVendor->desig ?? '' }}"  id="category"  readonly>
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
    </div> 

    <div class="col-lg-3">
        <div class="form-group mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>Bill ref.</label>
                </div>
                <div class="col-md-12">
                    <input type="text" class="form-control"  value="{{ $receipt->bill_ref ?? '' }}"  readonly>
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="form-group mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>Bank Acc</label>
                </div>
                <div class="col-md-12">
                    <input type="text" class="form-control" value="{{ $receipt->bank_acc_no ?? '' }}"  readonly>
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
    </div> 

    <div class="col-lg-3">
        <div class="form-group mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>Chq No</label>
                </div>
                <div class="col-md-12">
                    <input type="text" class="form-control" value="{{ $receipt->cheque_no ?? '' }}"  readonly>
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
    </div> 

    <div class="col-lg-3">
        <div class="form-group mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>Chq date</label>
                </div>
                <div class="col-md-12">
                    <input type="date" class="form-control" value="{{ $receipt->cheque_date ?? '' }}" readonly>
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
    </div>
       
    <div class="col-lg-3">
        <div class="form-group mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>Narration</label>
                </div>
                <div class="col-md-12">
                    <input type="text" class="form-control" value="{{ $receipt->narration ?? '' }}"   readonly>
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 category-field" >
        <div class="form-group mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>Category</label>
                </div>
                <div class="col-md-12">
                    <input type="text" class="form-control"  value="{{ $receipt->category->name ?? '' }}"  
                        placeholder="" readonly>
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
    </div> 
</div>

<div class="row add-more-section">
    <div class="col-lg-3">
        <div class="form-group mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>Amount</label>
                </div>
                <div class="col-md-12">
                    <input type="text" class="form-control"  name="amount[]" id="amount"  
                        placeholder="">
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="form-group mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>Date</label>
                </div>
                <div class="col-md-12">
                    <input type="date" class="form-control"  name="date[]" id="date"  
                        placeholder="">
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
    </div> 

    <div class="col-lg-2">
        <div class="form-group mb-2">
            <div class="row align-items-center">
                <div class="col-md-10">
                    <label></label>
                </div>
                <div class="col-md-10">
                    <button type="button"  id="add_more" class="listing_add">Add</button>
                </div>
            </div>
        </div>
    </div> 

    <div class="row" >
        <div id="cheque_payment_amount">
        </div>
    </div>
</div>

@endif