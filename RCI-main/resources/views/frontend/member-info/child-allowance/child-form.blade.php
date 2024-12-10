

@if(isset($childs))

@foreach($member_childs as $member_child)
    <div class="row">
        <div class="form-group col-md-3 mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>Child Name</label>
                </div>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="child_name[]" value="{{ $member_child->child_name ?? ''}}" >
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
        <input type="hidden"  name="child_id[]" value="{{ $member_child->id }}" >
        <div class="form-group col-md-3 mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>Child Dob</label>
                </div>
                <div class="col-md-12">
                    <input type="date" class="form-control" name="child_dob[]" value="{{ $member_child->child_dob ?? ''}}" >
                    <span class="text-danger"></span>
                </div>
            </div>

        </div>
        <div class="form-group col-md-3 mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>Child School</label>
                </div>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="child_school[]" value="{{ $member_child->child_school ?? ''}}" >
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
        <div class="form-group col-md-3 mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>Child Class</label>
                </div>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="child_class[]" value="{{ $member_child->child_class ?? ''}}" >
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
        <div class="form-group col-md-3 mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label> Academic year</label>
                </div>
                <div class="col-md-12">
                    <select class="form-select" name="academic_year[]" id="year">
                        <option value="">Select Year</option>
                        @foreach(range(date('Y'), 1958) as $year)
                            <option value="{{ $year }}" {{ $member_child->academic_year == $year ? 'selected':''}}>{{ $year }}</option>
                        @endforeach
                    </select>
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
        <div class="form-group col-md-3 mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>Allowance Amount</label>
                </div>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="allowance_amount[]"  value="{{ $member_child->allowance_amount ?? ''}}" >
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
    </div>
@endforeach

@else
{{-- no data available --}}



@endif