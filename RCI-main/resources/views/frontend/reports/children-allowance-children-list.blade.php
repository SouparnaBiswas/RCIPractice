

{{-- form create --}}

@if(isset($edit))
@foreach($children_allowances as $key => $children_allowance)
    <div class="row">
        <div class="form-group col-md-3">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label> Child {{$key+1}}:</label>
                </div>
            </div>
        </div>

        <div class="form-group col-md-3 mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>Name</label>
                </div>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="child_name[]" value="{{ $children_allowance->child_name ?? ''}}" placeholder="" >
                    <span id="child_name-error" class="text-danger"></span>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="children_id">Dob</label>
                <input type="date" class="form-control" name="child_dob[]" value="{{ $children_allowance->child_dob ?? ''}}">
                <span id="child_dob-error" class="text-danger"></span>
            </div>
        </div>

        <div class="form-group col-md-3 mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>School/college</label>
                </div>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="child_scll_name[]" value="{{ $children_allowance->child_school ?? ''}}" placeholder="" >
                    <span id="child_scll_name-error" class="text-danger"></span>
                </div>
            </div>
        </div>

        <div class="col-md-3">
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="children_id">Class/Dept.</label>
                <input type="text" class="form-control" name="child_class[]" value="{{ $children_allowance->child_class ?? ''}}">
                <span id="child_class-error" class="text-danger"></span>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="children_id">Academic Year</label>
                <input type="text" class="form-control" name="child_academic[]" value="{{ $children_allowance->academic_year ?? ''}}">
                <span id="child_academic-error" class="text-danger"></span>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="children_id">Amount</label>
                <input type="text" class="form-control" name="child_amount[]" value="{{ $children_allowance->allowance_amount ?? ''}}">
                <span id="child_amount-error" class="text-danger"></span>
            </div>
        </div>
    </div>

  
    @endforeach
@endif
