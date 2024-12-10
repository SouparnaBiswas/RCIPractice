@extends('frontend.layouts.master')
@section('title')
    NPS Report Generate
@endsection

@push('styles')
@endpush

@section('content')
    <section id="loading">
        <div id="loading-content"></div>
    </section>
    <div class="container-fluid">
        <div class="breadcome-list">
            <div class="d-flex">
                <div class="arrow_left"><a href="{{ route('members.index') }}" class="text-white"><i
                            class="ti ti-arrow-left"></i></a></div>
                <div class="">
                    <h3>Report Generate</h3>
                    <ul class="breadcome-menu mb-0">
                        <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                        <li><span class="bread-blod">NPS </span></li>
                    </ul>
                </div>
            </div>
        </div>
        <!--  Row 1 -->


        <div class="row">
            <div class="col-lg-12">
                <div class="card w-100">
                    <div class="card-body">
                        <div id="form">
                            <form action="{{ route('reports.nps-report-generate') }}" method="POST" >
                                @csrf

                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="row">                                      
                                            <div class="form-group col-md-4 mb-2">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <label>Financial Year</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <select name="financial_year" class="form-select" id="financial_year">
                                                            <option value="">Select Financial Year</option>
                                                            @foreach ($financialYears as $financialYear)
                                                                <option value="{{ $financialYear }}">
                                                                    {{ $financialYear }}</option>
                                                            @endforeach
                                                        </select>
                                                        @if ($errors->has('financial_year'))
                                                            <div class="error" style="color:red;">
                                                                {{ $errors->first('financial_year') }}</div>
                                                        @endif
                                                        
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4 mb-2">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <label>Year</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <select name="year" class="form-select" id="year">
                                                            <option value="">Select Year</option>
                                                            @for ($year = date('Y'); $year >= 1558; $year--)
                                                                <option value="{{ $year }}">{{ $year }}</option>
                                                            @endfor
                                                        </select>
                                                        @if ($errors->has('year'))
                                                            <div class="error" style="color:red;">
                                                                {{ $errors->first('year') }}</div>
                                                        @endif
                                                        
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4 mb-2">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <label>Month</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <select name="month" class="form-select" id="month">
                                                            <option value="">Select Month</option>
                                                            <option value="1">January</option>
                                                            <option value="2">February</option>
                                                            <option value="3">March</option>
                                                            <option value="4">April</option>
                                                            <option value="5">May</option>
                                                            <option value="6">June</option>
                                                            <option value="7">July</option>
                                                            <option value="8">August</option>
                                                            <option value="9">September</option>
                                                            <option value="10">October</option>
                                                            <option value="11">November</option>
                                                            <option value="12">December</option>
                                                        </select>
                                                        @if ($errors->has('month'))
                                                            <div class="error" style="color:red;">
                                                                {{ $errors->first('month') }}</div>
                                                        @endif
                                                        
                                                    </div>
                                                </div>
                                            </div> 

                                            <div class="form-group col-md-4 mb-2">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <label>DA</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input type="text" name="da" id="da-percent" class="form-control" placeholder="DA">
                                                        @if ($errors->has('da'))
                                                            <div class="error" style="color:red;">
                                                                {{ $errors->first('da') }}</div>
                                                        @endif
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="row justify-content-end">
                                            <div class="form-group col-md-12 mb-2">
                                                <button type="submit" class="listing_add">Generate</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
  <script>
    // if chnage any of them financial_year,year, month then call this function
    $('#financial_year, #year, #month').change(function () {
        var financial_year = $('#financial_year').val();
        var year = $('#year').val();
        var month = $('#month').val();
        if(financial_year !='' && year !='' && month !=''){
            var data = {
                financial_year: financial_year,
                year: year,
                month: month
            };
            $.ajax({
                url: "{{ route('reports.get-da-percent-nps') }}",
                type: 'GET',
                data: data,
                success: function (data) {
                  
                    $('#da-percent').val(data.da_percentage);
                }
            });
        }
        
    });
    </script>


@endpush
