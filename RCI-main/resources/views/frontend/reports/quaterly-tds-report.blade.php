@extends('frontend.layouts.master')
@section('title')
    Quaterly TDS Report
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
                        <li><span class="bread-blod">Quaterly TDS Report</span></li>
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
                            <form action="{{ route('reports.quaterly-tds-generate') }}" method="POST" >
                                @csrf
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="form-group col-md-4 mb-2">
                                                <div class="col-md-12">
                                                    <label>Employee Status</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <select name="e_status" class="form-select" id="e_status">
                                                        <option value="">Select Employee Status</option>
                                                        <option value="active">Active</option>
                                                        <option value="deputation">On Deputation</option>
                                                    </select>
                                                    @if ($errors->has('e_status'))
                                                        <div class="error" style="color:red;">
                                                            {{ $errors->first('e_status') }}</div>
                                                    @endif

                                                </div>
                                            </div>
                                            {{-- categories --}}
                                            
                                            <div class="form-group col-md-4 mb-2">
                                                <div class="col-md-12">
                                                    <label>Quarter</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <select name="report_quarter" id="report_quarter" class="form-select">
                                                        <option value="">Select Quarter</option>
                                                        <option value="Q1">Q1</option>
                                                        <option value="Q2">Q2</option>
                                                        <option value="Q3">Q3</option>
                                                        <option value="Q4">Q4</option>
                                                    </select>
                                                    @if ($errors->has('report_quarter'))
                                                        <div class="error" style="color:red;">
                                                            {{ $errors->first('report_quarter') }}</div>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4 mb-2">
                                                <div class="col-md-12">
                                                    <label>Year</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <select name="report_year" id="report_year" class="form-select">
                                                        <option value="">Select Year</option>
                                                        @foreach ($financialYears as $financialYear)
                                                            <option value="{{ $financialYear }}">
                                                                {{ $financialYear }}
                                                            </option>

                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('report_year'))
                                                        <div class="error" style="color:red;">
                                                            {{ $errors->first('report_year') }}</div>
                                                    @endif
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

@endpush
