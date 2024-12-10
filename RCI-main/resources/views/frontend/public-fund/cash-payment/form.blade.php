
@if(isset($edit))

<form action="{{ route('cash-payments.update',$receipt->id) }}" method="POST" id="cash-payment-edit-form">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-lg-3">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Receipt No</label>
                    </div>
                    <div class="col-md-12">
                        <select name="rcpt_no" id="rcpt_no" class="form-select" disabled>
                            <option value="">Select No</option>
                            @foreach ($receipt_nos as $receipt_no)
                                <option value="{{ $receipt_no->id }}" {{ $receipt->id == $receipt_no->id ? 'selected' : '' }} >{{ $receipt_no->receipt_no }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="cash-payment-details">
        @include('frontend.public-fund.cash-payment.edit-details')
    </div>
   
    {{-- <div class="row">
        <div class="col-md-2 ml-auto">
            <div class="mb-1">
                <button type="submit" class="listing_add">Add</button>
            </div>
            <div class="mb-1">
                <a href="" class="listing_exit">Back</a>
            </div>
        </div>
    </div> --}}
</form>
@else
<form action="{{ route('cash-payments.store') }}" method="POST" id="cash-payment-create-form">
    @csrf

    
    <div class="row">
        <div class="col-lg-3">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Receipt No</label>
                    </div>
                    <div class="col-md-12">
                        <select name="rcpt_no" id="rcpt_no" class="form-select" >
                            <option value="">Select No</option>
                            @foreach ($receipt_nos as $receipt_no)
                                <option value="{{ $receipt_no->id }}" >{{ $receipt_no->receipt_no }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="cash-payment-details">
        @include('frontend.public-fund.cash-payment.details')
    </div>
   
    <div class="row">
        <div class="col-md-2 ml-auto">
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

