

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

    <div class="col-lg-3 net-amount-field" >
        <div class="form-group mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>Form</label>
                </div>
                <div class="col-md-12">
                    <input type="text" class="form-control"  name="" id="form-detail"    value="{{ $receipt->form ?? '' }}"   
                        placeholder="" readonly>
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 detail-field" >
        <div class="form-group mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>Details</label>
                </div>
                <div class="col-md-12">
                    <input type="text" class="form-control"  name="" id="details" value="{{ $receipt->details ?? '' }}"   
                        placeholder="" readonly>
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 vendor-field" >
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
                    <label>Category</label>
                </div>
                <div class="col-md-12">
                    <input type="text" class="form-control"  name="" id="category"  value="{{ $receipt->category->name ?? '' }}"  
                        placeholder="" readonly>
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
    </div> 
</div>


@foreach($cashPayments as $cashPayment)
<div class="row add-more-section">
    <div class="col-lg-3">
        <div class="form-group mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>Amount</label>
                </div>
                <div class="col-md-12">
                    <input type="text" class="form-control"  value="{{ $cashPayment->amount ?? '' }}" id="amount"  
                        disabled>
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
                    <input type="date" class="form-control" value="{{ $cashPayment->date ?? '' }}"  id="date"  disabled>
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
    </div> 
</div>

@endforeach


