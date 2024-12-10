@if (isset($edit))
<form action="{{ route('arrears.update', $arrear->id) }}" id="arrears-form-update"
method="post">
@method('PUT')
@csrf
<input type="hidden" name="member_id" value="{{$member_id}}">
<div class="row">
    <div class="col-md-12">
        <div class="form-group mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>Date</label>
                </div>
                <div class="col-md-12">
                    <input type="date" class="form-control"
                        name="date" id="date"
                        value="{{$arrear->date}}">
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
    </div>
    {{-- members --}}
    <div class="col-md-12">
        <div class="form-group mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>Name</label>
                </div>
                <div class="col-md-12">
                   <input type="text" class="form-control"
                        name="name" id="name"
                        value="{{$arrear->name}}">
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
        {{-- amt --}}
        <div class="form-group mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>Amt</label>
                </div>
                <div class="col-md-12">
                    <input type="text" class="form-control"
                        name="amt" id="amount"
                        value="{{$arrear->amt}}">
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
        {{-- cps --}}
        <div class="form-group mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>CPS</label>
                </div>
                <div class="col-md-12">
                    <input type="text" class="form-control"
                        name="cps" id="cps"
                        value="{{$arrear->cps}}">
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
        {{-- i_tax --}}
        <div class="form-group mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>I.Tax</label>
                </div>
                <div class="col-md-12">
                    <input type="text" class="form-control"
                        name="i_tax" id="i_tax"
                        value="{{$arrear->i_tax}}">
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
        {{-- cghs --}}
        <div class="form-group mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>CGHS</label>
                </div>
                <div class="col-md-12">
                    <input type="text" class="form-control"
                        name="cghs" id="cghs"
                        value="{{$arrear->cghs}}">
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
        {{-- gmc --}}
        <div class="form-group mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>GMC</label>
                </div>
                <div class="col-md-12">
                    <input type="text" class="form-control"
                        name="gmc" id="gmc"
                        value="{{$arrear->gmc}}">
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
    </div>


    <div class="row justify-content-end mt-4">
        <div class="col-md-12">
            <div class="row justify-content-end">
                <div class="form-group col-md-4 mb-2">
                    <button type="submit"
                        class="listing_add">Update</button>
                </div>
                <div class="form-group col-md-4 mb-2">
                    <button type="button"
                        class="listing_exit">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</form>
@else
<form action="{{ route('arrears.store') }}" id="arrears-form"
method="post">
@csrf
<input type="hidden" name="member_id" value="{{$member_id}}">
<div class="row">
    <div class="col-md-12">
        <div class="form-group mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>Date</label>
                </div>
                <div class="col-md-12">
                    <input type="date" class="form-control"
                        name="date" id="date"
                        value="">
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
    </div>
    {{-- members --}}
    <div class="col-md-12">
        <div class="form-group mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>Name</label>
                </div>
                <div class="col-md-12">
                    <input type="text" class="form-control"
                        name="name" id="name"
                        value="">
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
        {{-- amt --}}
        <div class="form-group mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>Amt</label>
                </div>
                <div class="col-md-12">
                    <input type="text" class="form-control"
                        name="amt" id="amount"
                        value="">
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
        {{-- cps --}}
        <div class="form-group mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>CPS</label>
                </div>
                <div class="col-md-12">
                    <input type="text" class="form-control"
                        name="cps" id="cps"
                        value="">
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
        {{-- i_tax --}}
        <div class="form-group mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>I.Tax</label>
                </div>
                <div class="col-md-12">
                    <input type="text" class="form-control"
                        name="i_tax" id="i_tax"
                        value="">
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
        {{-- cghs --}}
        <div class="form-group mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>CGHS</label>
                </div>
                <div class="col-md-12">
                    <input type="text" class="form-control"
                        name="cghs" id="cghs"
                        value="">
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
        {{-- gmc --}}
        <div class="form-group mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>GMC</label>
                </div>
                <div class="col-md-12">
                    <input type="text" class="form-control"
                        name="gmc" id="gmc"
                        value="">
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
    </div>


    <div class="row justify-content-end mt-4">
        <div class="col-md-12">
            <div class="row justify-content-end">
                <div class="form-group col-md-4 mb-2">
                    <button type="submit"
                        class="listing_add">Save</button>
                </div>
                <div class="form-group col-md-4 mb-2">
                    <button type="button"
                        class="listing_exit">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endif
