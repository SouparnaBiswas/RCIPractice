@if (isset($edit))

    <form action="{{ route('cda-receipts.update',$cdaReceipt->id) }}" method="POST" id="cda-receipt-edit-form">
        @method('PUT')
        @csrf

        <div class="row">
            <div class="col-xl-8">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group mb-2">
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <label>Rct Vr. Date</label>
                                </div>
                                <div class="col-md-12">
                                    <input type="date" class="form-control" 
                                        name="voucher_date" id="voucher_date" value="{{ $cdaReceipt->voucher_date }}" placeholder="">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group mb-2">
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <label>Cheque No</label>
                                </div>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" 
                                        name="chq_no" id="chq_no" value="{{ $cdaReceipt->cheq_no }}" placeholder="">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group mb-2">
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <label>Chq Date</label>
                                </div>
                                <div class="col-md-12">
                                    <input type="date" class="form-control" 
                                        name="cheq_date" id="cheq_date" value="{{ $cdaReceipt->cheq_date }}" placeholder="">
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Rct Vr. Amt</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" value="{{ $cdaReceipt->amount }}" name="amount" id="amount"
                                    placeholder="">
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-6">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Details</label>
                            </div>
                            <div class="col-md-12">
                                <select name="details" class="form-select">
                                    <option value="" selected>Select</option>
                                    @foreach ($cdaReceiptDetails as $key => $cdaReceiptDetail)
                                        <option value="{{ $cdaReceiptDetail->id }} " {{ isset($cdaReceipt->details) && $cdaReceiptDetail->id == $cdaReceipt->details ? 'selected' : '' }}>
                                            {{ $cdaReceiptDetail->details }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="col-md-6">
                    <div class="mb-1">
                        <button type="submit" class="listing_add">Update</button>
                    </div>
                    <div class="mb-1">
                        <a href="" class="listing_exit">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@else
    <form action="{{ route('cda-receipts.store') }}" method="POST" id="cda-receipt-create-form">
        @csrf


        <div class="row">
            <div class="col-xl-8">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group mb-2">
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <label>Rct Vr. Date</label>
                                </div>
                                <div class="col-md-12">
                                    <input type="date" class="form-control" 
                                        name="voucher_date" id="voucher_date" placeholder="">
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group mb-2">
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <label>Chq No</label>
                                </div>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" 
                                        name="chq_no" id="chq_no"  placeholder="">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group mb-2">
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <label>Chq Date</label>
                                </div>
                                <div class="col-md-12">
                                    <input type="date" class="form-control" 
                                        name="cheq_date" id="cheq_date" placeholder="">
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Rct Vr. Amt</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="vr_amount" id="vr_amount"
                                    placeholder="">
                                    <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Details</label>
                            </div>
                            <div class="col-md-12">

                                <select name="details" class="form-select">
                                    <option value="" selected>Select</option>
                                    @foreach ($cdaReceiptDetails as $key => $cdaReceiptDetail)
                                        <option value="{{ $cdaReceiptDetail->id }}">
                                            {{ $cdaReceiptDetail->details }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="col-md-6">
                    <div class="mb-1">
                        <button type="submit" class="listing_add">Add</button>
                    </div>
                    <div class="mb-1">
                        <a href="" class="listing_exit">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endif
