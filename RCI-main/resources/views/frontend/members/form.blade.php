@extends('frontend.layouts.master')
@section('title')
    Members List
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
                    <h3>Member Create</h3>
                    <ul class="breadcome-menu mb-0">
                        <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                        <li><span class="bread-blod">Member Create</span></li>
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

                            <form action="{{ route('members.store') }}" method="POST" id="member-create-form">
                                @csrf

                                <div class="row">

                                    <div class="form-group col-md-3 mb-2">
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <label for="PIS">Employment Status</label>
                                            </div>
                                            <div class="col-md-12">
                                                <select class="form-select" name="e_status" id="e_status">
                                                    <option value="">Select</option>
                                                    <option value="active">Active</option>
                                                    <option value="deputation">On Deputation</option>
                                                    <option value="contractual">Contractual</option>
                                                    <option value="retired">Retired</option>
                                                    <option value="suspended">Suspended</option>
                                                    <option value="transferred">Transferred</option>
                                                </select>
                                                <span class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 mb-2">
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <label>Pers No</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control" name="pers_no" id="pers_no"
                                                    value="{{ old('pers_no') ?? '' }}" placeholder="">
                                                <span class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6 mb-2">
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control" name="name" id="name"
                                                    value="{{ old('name') ?? '' }}" placeholder="">
                                                <span class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <label>Gender</label>
                                            </div>
                                            <div class="col-md-12">
                                                <select class="form-select" name="gender" id="gender">
                                                    <option value="">Select</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                    <option value="Others">Others</option>
                                                </select>
                                                <span class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <label>PM Level</label>
                                            </div>
                                            <div class="col-md-12">
                                                <select class="form-select" name="pm_level" id="pm_level">
                                                    <option value="">Select</option>
                                                    @foreach ($pmLevels as $pm_level)
                                                        <option value="{{ $pm_level->id }}">
                                                            {{ $pm_level->value }}
                                                        </option>
                                                    @endforeach

                                                </select>
                                                <span class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 mb-2">
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <label>PM Index</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control" name="pm_index" id="pm_index">
                                                <span class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 mb-2">
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <label>Basic</label>
                                            </div>
                                            <div class="col-md-12">
                                                <select class="form-select" name="basic" id="basic">
                                                </select>
                                                <span class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="form-group col-md-3 mb-2">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <label>Group</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <select class="form-select" name="group" id="group">
                                                            <option value="">Select</option>
                                                            @foreach ($groups as $group)
                                                                <option value="{{ $group->id }}">
                                                                    {{ $group->value }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <span class="text-danger"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-3 mb-2">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <label>Desig</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <select class="form-select" name="desig" id="desig">

                                                        </select>
                                                        <span class="text-danger"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-3 mb-2">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <label>Division</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <select class="form-select" name="division" id="division">
                                                            <option value="">Select</option>
                                                            @foreach ($divisions as $division)
                                                                <option value="{{ $division->id }}">
                                                                    {{ $division->value }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <span class="text-danger"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-3 mb-2">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <label>Cadre</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <select class="form-select" name="cadre" id="cadre">
                                                            <option value="">Select</option>
                                                            @foreach ($cadres as $cadre)
                                                                <option value="{{ $cadre->id }}">
                                                                    {{ $cadre->value }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <span class="text-danger"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- <div class="col-md-4">
                                <div class="row">
                                    <div class="form-group col-md-12 mb-2">
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <label>Category</label>
                                            </div>
                                            <div class="col-md-12">
                                                {{-- <select class="form-select" name="category"
                                                                    id="category">
                                                                    <option value="">Select</option>
                                                                    @foreach ($categories as $category)
                                                                        <option value="{{ $category->id }}">
                                            {{ $category->category }}</option>
                                            @endforeach

                                            </select> --}}
                                                <input type="text" class="form-control"
                                                    id="category_value" readonly>
                                                <input type="hidden" class="form-control" name="category" id="category">
                                                <span class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->


                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="row">
                                                    <div class="form-group col-md-4 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>Status</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <select class="form-select" name="status"
                                                                    id="status">
                                                                    <option value="">Select</option>
                                                                    <option value="Yes">YES</option>
                                                                    <option value="No">NO</option>
                                                                </select>
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>OLD BP</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <input type="text" class="form-control" name="old_bp"
                                                                    id="old_bp" value="{{ old('old_bp') ?? '' }}"
                                                                    placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>G.Pay</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <input type="text" class="form-control" id="g_pay_val"
                                                                    name="g_pay_val" value="{{ old('g_pay_val') ?? '' }}"
                                                                    placeholder="" readonly>
                                                                <input type="hidden" class="form-control"
                                                                    name="g_pay_id" id="g_pay_id" placeholder="">

                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="form-group col-md-6 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>PayBand</label>
                                                            </div>
                                                            <div class="col-md-12">

                                                                <input type="text" class="form-control"
                                                                    name="pay_band" id="pay_band">
                                                                <input type="hidden" class="form-control"
                                                                    name="pay_band_id" id="pay_band_id">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="form-group col-md-6 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>Fund Type</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <input type="text" class="form-control"
                                                                    name="fund_type" id="fund_type">
                                                                
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div> --}}
                                                    <div class="form-group col-md-6 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>Aadhar No.</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <input type="text" class="form-control"
                                                                    name="adhar_number" id="adhar_number" placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="row">
                                                    <div class="form-group col-md-4 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>DOB</label>
                                                            </div>
                                                            @php
                                                                $maxDate = date('Y-m-d', strtotime('-18 years'));
                                                            @endphp
                                                            <div class="col-md-12">
                                                                <input type="date" class="form-control" name="dob"
                                                                    id="dob" value="{{ old('dob') ?? '' }}"
                                                                    placeholder="" max="{{ $maxDate }}">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>DOJ Lab</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <input type="date" class="form-control" name="doj_lab"
                                                                    id="doj_lab" value="" placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>DOJ Service1</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <input type="date" class="form-control"
                                                                    name="doj_service1" id="doj_service1"
                                                                    value="{{ old('doj_service1') ?? '' }}"
                                                                    placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="form-group col-md-6 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>DOP</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <input type="date" class="form-control" name="dop"
                                                                    id="dop" value="{{ old('dop') ?? '' }}"
                                                                    placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>Next Incr</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <input type="date" class="form-control"
                                                                    name="next_inr" id="next_inr"
                                                                    value="{{ old('next_inr') ?? '' }}" placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="row">
                                                    <div class="form-group col-md-4 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>Quater</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <input class="form-control" name="quater_type"
                                                                    id="quater_type" readonly>

                                                                <span class="text-danger"></span>
                                                                <input type="hidden" name="quater" id="quater">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>Quarter No</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <input type="text" class="form-control"
                                                                    name="quater_no" id="quater_no" placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>DOJ Service2</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <input type="date" class="form-control"
                                                                    name="doj_service2" id="doj_service2"
                                                                    value="{{ old('doj_service2') ?? '' }}"
                                                                    placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>Category</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <select class="form-select" name="category_id"
                                                                    id="category">
                                                                    <option value="">Select</option>
                                                                    @foreach ($categories as $category)
                                                                        <option value="{{ $category->id }}">
                                                                    {{ $category->category }}</option>
                                                                    @endforeach
                                                                </select>
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    {{-- <div class="form-group col-md-4 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>NPS Available</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-inline">
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="nps_available" id="inlineRadio1"
                                                                            value="Yes">
                                                                        <label class="form-check-label"
                                                                            for="inlineRadio1">Yes</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline ml-2">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="nps_available" id="inlineRadio2"
                                                                            value="No">
                                                                        <label class="form-check-label"
                                                                            for="inlineRadio2">No</label>
                                                                    </div>
                                                                    
                                                                </div>
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div> --}}

                                                    <div class="form-group col-md-4 mb-2" id="gpf_div" hidden>
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>Gpf Number</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <input type="text" class="form-control"
                                                                    name="gpf_number" id="gpf_number">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-md-4 mb-2" id="nps_div" hidden>
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>PRAN Number</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <input type="text" class="form-control"
                                                                    name="pran_number" id="pran_number">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-md-4 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>Appointment date</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <input type="date" class="form-control" id="app_date"
                                                                    name="app_date">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="form-group col-md-6 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>CGEIS</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <input type="text" class="form-control" name="cgeis"
                                                                    id="cgeis" value="{{ old('cgeis') ?? '' }}"
                                                                    placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-md-6 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>Fund Type</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <input type="text" class="form-control"
                                                                    name="fund_type" id="fund_type">
                                                                
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    
                                                    {{-- <div class="form-group col-md-6 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>Aadhar No.</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <input type="text" class="form-control"
                                                                    name="adhar_number" id="adhar_number" placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div> --}}
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="row">
                                                    <div class="form-group col-md-4 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>Ex-Service</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <select class="form-select" name="ex_service"
                                                                    id="ex_service">
                                                                    <option value="">Select</option>
                                                                    @foreach ($exServices as $exService)
                                                                        <option value="{{ $exService->id }}">
                                                                            {{ $exService->value }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>PG</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <select class="form-select" name="pg"
                                                                    id="pg">
                                                                    <option value="">Select</option>
                                                                    @foreach ($pgs as $pg)
                                                                        <option value="{{ $pg->id }}">
                                                                            {{ $pg->value }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>CGEGIS</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <input type="text" class="form-control"
                                                                    id="cgegis_value" readonly>
                                                                <input type="hidden" class="form-control" name="cgegis"
                                                                    id="cgegis">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>



                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="form-group">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>Paystop</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-inline">
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="pay_stop" id="inlineRadio1"
                                                                            value="Yes">
                                                                        <label class="form-check-label"
                                                                            for="inlineRadio1">Yes</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline ml-2">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="pay_stop" id="inlineRadio2"
                                                                            value="No">
                                                                        <label class="form-check-label"
                                                                            for="inlineRadio2">No</label>
                                                                    </div>
                                                                    {{-- <div class="form-check form-check-inline ml-2">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="pay_stop" id="inlineRadio3"
                                                                            value="table-rec">
                                                                        <label class="form-check-label"
                                                                            for="inlineRadio3">Table Rec</label>
                                                                    </div> --}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>



                                <div class="row mt-3">
                                    <div class="form-group col-md-3 mb-2">
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <label for="PIS">City</label>
                                            </div>
                                            <div class="col-md-12">
                                                <select name="member_city" class="form-select" id="member_city">
                                                    <option value="">Select</option>
                                                    @foreach ($cities as $city)
                                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3 mb-2">
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <label for="PIS">Rent Payable</label>
                                            </div>
                                            <div class="col-md-12">
                                                <select name="rent_or_not" class="form-select" id="rent_or_not">
                                                    <option value="">Select</option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                                <span class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>



                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="form-group col-md-3 mb-2">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <label for="PIS">PIS</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input type="text" class="form-control" name="pis"
                                                            id="pis" value="{{ old('pis') ?? '' }}"
                                                            placeholder="">
                                                        <span class="text-danger"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-9 mb-2">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <label for="PM_Index">Address</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input type="text" class="form-control" name="pis_address"
                                                            id="pis_address" value="{{ old('pis_address') ?? '' }}"
                                                            placeholder="">
                                                        <span class="text-danger"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="form-group col-md-3 mb-2">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <label for="PIS">SOS</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input type="text" class="form-control" name="sos"
                                                            id="sos" value="{{ old('sos') ?? '' }}"
                                                            placeholder="">
                                                        <span class="text-danger"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-9 mb-2">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <label for="PM_Index">Address</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input type="text" class="form-control" name="sos_address"
                                                            id="sos_address" value="{{ old('sos_address') ?? '' }}"
                                                            placeholder="">
                                                        <span class="text-danger"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                {{-- save cancel button design in right corner --}}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row justify-content-end">
                                            <div class="col-md-3">
                                                <div class="row">
                                                    <div class="form-group col-md-6 mb-2">
                                                        <button type="submit" class="listing_add">Save</button>
                                                    </div>
                                                    <div class="form-group col-md-6 mb-2">
                                                        <button type="reset" class="listing_exit">Cancel</button>
                                                    </div>
                                                </div>
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
        $(document).ready(function() {
            var lastId = localStorage.getItem('lastId');
            if (lastId === null) {
                lastId = 1;
            } else {
                lastId = parseInt(lastId) + 1;
            }

            var randomId = 'RCI_CHESS' + String(lastId).padStart(4, '0');
            localStorage.setItem('lastId', lastId);
            document.getElementById('emp_id').value = randomId;
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#member-create-form').submit(function(e) {
                e.preventDefault();
                var formData = $(this).serialize();


                $.ajax({
                    url: $(this).attr('action'),
                    type: $(this).attr('method'),
                    data: formData,
                    success: function(response) {

                        //windows load with toastr message
                        window.location.reload();
                    },
                    error: function(xhr) {

                        // Handle errors (e.g., display validation errors)
                        //clear any old errors
                        $('.text-danger').html('');
                        var errors = xhr.responseJSON.errors;
                        $.each(errors, function(key, value) {
                            // Assuming you have a div with class "text-danger" next to each input
                            $('[name="' + key + '"]').next('.text-danger').html(value[
                                0]);
                        });
                    }
                });
            });
        });
    </script>


    <script>
        //grade pay found
        $(document).ready(function() {
            $('#pm_level').change(function() {
                var pm_level = $(this).val();

                $.ajax({
                    url: "{{ route('members.grade-pay') }}",
                    type: 'POST',
                    data: {
                        pm_level: pm_level
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {

                        $('#pm_index').val(response.pm_index.value);

                        var $basicSelect = $('#basic');
                        $basicSelect.empty(); // Clear existing options
                        $basicSelect.append('<option value="">Select</option>');
                        $.each(response.basic_pays, function(index, basic_pay) {
                            $basicSelect.append('<option value="' + basic_pay.basic_pay +
                                '">' + basic_pay.basic_pay + '</option>');
                        });

                        $('#g_pay_val').val(response.grade_pay.amount);
                        $('#quater').val(response.quarter.id);
                        $('#quater_type').val(response.quarter.qrt_charge);
                        $('#g_pay_id').val(response.payBand.id);
                        $('#quater_no').val(response.quarter.qrt_type);

                        $('#pay_band').val(response.payBand.pay_band.high_band + '-' + response
                            .payBand.pay_band.low_band);
                        $('#pay_band_id').val(response.payBand.pay_band.id);
                    }


                });
            });
        });
    </script>

    <script>
        //cgegis found
        $(document).ready(function() {
            $('#group').change(function() {
                var group = $(this).val();

                $.ajax({
                    url: "{{ route('members.get-cgegis-value') }}",
                    type: 'POST',
                    data: {
                        group: group
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {

                        $('#cgegis_value').val(response.cgegis_value.value);
                        $('#cgegis').val(response.cgegis_value.id);

                        var $desigSelect = $('#desig');
                        $desigSelect.empty(); // Clear existing options
                        $desigSelect.append('<option value="">Select</option>');
                        $.each(response.desigs, function(index, desig) {
                            $desigSelect.append('<option value="' + desig.id + '">' +
                                desig.designation + '</option>');
                        });


                    }
                });
            });

            $('#desig').change(function() {
                var desig = $(this).val();

                $.ajax({
                    url: "{{ route('members.get-category-value') }}",
                    type: 'POST',
                    data: {
                        desig: desig
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        $('#category_value').val(response.category_value.category);
                        $('#section').val(response.section.section.name);

                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#doj_lab').on('input', function() {
                var doj_lab = $(this).val();
                var doj_lab_year = new Date(doj_lab).getFullYear();
                if (doj_lab_year > 2004) {
                    $('#fund_type').val('NPS');
                    $('#nps_div').prop('hidden', false);
                    $('#gpf_div').prop('hidden', true);
                } else {
                    $('#fund_type').val('GPF');
                    $('#gpf_div').prop('hidden', false);
                    $('#nps_div').prop('hidden', true);
                }

            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('input[name="nps_available"]').change(function() {
                if ($(this).val() === 'Yes') {
                    $('#nps_div').prop('hidden', false);
                    $('#gpf_div').prop('hidden', true);
                } else {
                    $('#nps_div').prop('hidden', true);
                    $('#gpf_div').prop('hidden', false);
                }
            });
        });
    </script>
@endpush
