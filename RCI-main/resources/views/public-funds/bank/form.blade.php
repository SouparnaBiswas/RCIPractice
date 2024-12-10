@if (isset($edit))
    <form action="{{ route('bank-details.update', $receipt_edit->id) }}" method="POST" id="public-fund-bank-edit-form">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label for="PIS">Bank Name</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" name="bank_name" id="bank_name" value="{{ $public_fund_bank->bank_name ?? '' }}" class="form-control">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label for="PIS">Account Number</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" name="account_number" id="account_number"  value="{{ $public_fund_bank->account_number ?? '' }}" class="form-control">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label for="PIS">Ifsc Code</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" name="ifsc_code" id="ifsc_code" class="form-control" value="{{ $public_fund_bank->ifsc_code ?? '' }}">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>

            <div class="form-group col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label for="PIS">Status</label>
                    </div>
                    <div class="col-md-12">
                       <select name="status" id="status" class="form-control">
                           <option value="1" {{ $public_fund_bank->status == 1 ? 'selected' : '' }}>Active</option>
                           <option value="0" {{ $public_fund_bank->status == 0 ? 'selected' : '' }}>Inactive</option>
                       </select>
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>

            <div class="col-md-2">
                <div class="row justify-content-end">
                    <div class="form-group col-md-12 mb-2">
                        <button type="submit" class="listing_add">Add</button>
                    </div>
                    <div class="form-group col-md-12 mb-2">
                        <button type="reset" class="listing_exit">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@else
    <form action="{{ route('bank-details.store') }}" method="POST" id="public-fund-bank-create-form">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label for="PIS">Bank Name</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" name="bank_name" id="bank_name"  class="form-control">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label for="PIS">Account Number</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" name="account_number" id="account_number" class="form-control">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label for="PIS">Ifsc Code</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" name="ifsc_code" id="ifsc_code" class="form-control" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label for="PIS">Status</label>
                            </div>
                            <div class="col-md-12">
                            <select name="status" id="status" class="form-control">
                                <option value="1" >Active</option>
                                <option value="0" >Inactive</option>
                            </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="row justify-content-end">
                    <div class="form-group col-md-12 mb-2">
                        <button type="submit" class="listing_add">Add</button>
                    </div>
                    <div class="form-group col-md-12 mb-2">
                        <button type="reset" class="listing_exit">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endif
