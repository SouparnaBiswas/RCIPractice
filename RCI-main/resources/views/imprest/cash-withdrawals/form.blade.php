@if (isset($edit))
    <form action="{{ route('cash-withdrawals.update', $cashwithdrawal->id) }}" method="POST" id="cash-withdrawals-edit-form">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Vr Dt</label>
                    </div>
                    <div class="col-md-12">
                        <input type="date" class="form-control" name="vr_date" id="vr_date"
                             placeholder="" value="{{ $cashwithdrawal->vr_date }}">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>

            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Chq No</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="chq_no" id="chq_no"
                            placeholder="" value="{{ $cashwithdrawal->chq_no }}" >
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>

            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Chq Dt</label>
                    </div>
                    <div class="col-md-12">
                        <input type="date" class="form-control" name="chq_date" id="chq_date"
                            placeholder="" value="{{ $cashwithdrawal->chq_date }}" >
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>

            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Amount</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="amount" id="amount"
                            placeholder=""  value="{{ $cashwithdrawal->amount }}">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>

        </div>
        
        <div class="row d-flex justify-content-end">
            <div class="col-md-2">
                <button type="submit" class="listing_add">Update</button>
            </div>
            <div class="col-md-2">
               <button type="reset" class="listing_exit">Back</button>
            </div>
        </div>
    </form>
@else
    <form action="{{ route('cash-withdrawals.store') }}" method="POST" id="cash-withdrawals-create-form">
        @csrf
        
        <div class="row">
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Vr Dt</label>
                    </div>
                    <div class="col-md-12">
                        <input type="date" class="form-control" name="vr_date" id="vr_date"
                             placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>

            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Chq No</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="chq_no" id="chq_no"
                            placeholder="" >
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>

            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Chq Dt</label>
                    </div>
                    <div class="col-md-12">
                        <input type="date" class="form-control" name="chq_date" id="chq_date"
                            placeholder="" >
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>

            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Amount</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="amount" id="amount"
                            placeholder="" >
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>

        </div>
        
            <div class="row d-flex justify-content-end">
                <div class="col-md-2">
                    <button type="submit" class="listing_add">Save</button>
                </div>
                <div class="col-md-2">
                   <button type="reset" class="listing_exit">Back</button>
                </div>
            </div>
    </form>
@endif
