@if (isset($edit))
<form action="{{ route('rents.update', $rent->id) }}" id="rents-form-update"
method="post">
@method('PUT')
@csrf
<input type="hidden" name="member_id" value="{{$member_id}}">
<div class="row">
    <div class="col-md-12">
        <div class="form-group mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>Month</label>
                </div>
                <div class="col-md-12">
                    <select name="month" class="form-select" id="month">
                        <option value="">Select Month</option>
                        <option value="01" {{ $rent->month == "01" ? 'selected' : '' }}>January</option>
                        <option value="02" {{ $rent->month == "02" ? 'selected' : '' }}>February</option>
                        <option value="03" {{ $rent->month == "03" ? 'selected' : '' }}>March</option>
                        <option value="04" {{ $rent->month == "04" ? 'selected' : '' }}>April</option>
                        <option value="05" {{ $rent->month == "05" ? 'selected' : '' }}>May</option>
                        <option value="06" {{ $rent->month == "06" ? 'selected' : '' }}>June</option>
                        <option value="07" {{ $rent->month == "07" ? 'selected' : '' }}>July</option>
                        <option value="08" {{ $rent->month == "08" ? 'selected' : '' }}>August</option>
                        <option value="09" {{ $rent->month == "09" ? 'selected' : '' }}>September</option>
                        <option value="10" {{ $rent->month == "10" ? 'selected' : '' }}>October</option>
                        <option value="11" {{ $rent->month == "11" ? 'selected' : '' }}>November</option>
                        <option value="12" {{ $rent->month == "12" ? 'selected' : '' }}>December</option>
                    </select>
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
                    <label>Year</label>
                </div>
                <div class="col-md-12">
                  @php
                      $startYear = 1958;
                      $endYear = date('Y');
                  @endphp
                    <select name="year" class="form-select" id="year">
                        <option value="">Select Year</option>
                        @for ($i = $endYear; $i >= $startYear; $i--)
                            <option value="{{ $i }}" {{ $rent->year == $i ? 'selected' : '' }}>{{ $i }}</option>
                        @endfor
                    </select>
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
        {{-- amt --}}
        <div class="form-group mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>Rent</label>
                </div>
                <div class="col-md-12">
                    <input type="text" class="form-control"
                        name="rent" id="rent"
                        value="{{ $rent->rent }}">
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
<form action="{{ route('rents.store') }}" id="rents-form"
method="post">
@csrf
<input type="hidden" name="member_id" value="{{$member_id}}">
<div class="row">
    <div class="col-md-12">
        <div class="form-group mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>Month</label>
                </div>
                <div class="col-md-12">
                   <select name="month" class="form-select" id="month">
                        <option value="">Select Month</option>
                        <option value="01">January</option>
                        <option value="02">February</option>
                        <option value="03">March</option>
                        <option value="04">April</option>
                        <option value="05">May</option>
                        <option value="06">June</option>
                        <option value="07">July</option>
                        <option value="08">August</option>
                        <option value="09">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
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
                    <label>Year</label>
                </div>
                <div class="col-md-12">
                    @php
                        $startYear = 1958;
                        $endYear = date('Y');
                    @endphp
                    <select name="year" class="form-select" id="year">
                        <option value="">Select Year</option>
                        @for ($i = $endYear; $i >= $startYear; $i--)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
        {{-- amt --}}
        <div class="form-group mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>Rent</label>
                </div>
                <div class="col-md-12">
                    <input type="text" class="form-control"
                        name="rent" id="rent"
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
