@extends('imprest.layouts.master')
@section('title')
    Advance Settlement List
@endsection

@push('styles')
@endpush

@php
use App\Helpers\Helper;
@endphp

@section('content')
    <section id="loading">
        <div id="loading-content"></div>
    </section>
    <div class="container-fluid">
        <div class="breadcome-list">
            <div class="d-flex">
                <div class="arrow_left"><a href="{{ route('advance-settlement.index') }}" class="text-white"><i
                            class="ti ti-arrow-left"></i></a></div>
                <div class="">
                    <h3>Advance Settlement Create</h3>
                    <ul class="breadcome-menu mb-0">
                        <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                        <li><span class="bread-blod">Advance Settlement Create</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <!--  Row 1 -->

        <div class="row">
            <div class="col-md-6 text-start mb-3">
                <h5>Cash In Bank - {{ Helper::bankPayments() }}</h5>
            </div>
            <div class="col-md-6 text-end mb-3">
               <h5> Cash In hand - {{ Helper::cashPayments() }}</h5>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-12">
                <div class="card w-100">
                    <div class="card-body">
                        <div id="form">

                            <form action="{{ route('advance-settlement.store') }}" method="POST" id="advance-settlement-create-form">
                                @csrf

                                <div class="row">
                                    <div class="form-group col-md-3 mb-2">
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <label>Adv No</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control" name="adv_no"
                                                    id="adv_no" value="{{ old('adv_no') ?? '' }}"
                                                    placeholder="">
                                                <span class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>
                                         
                                    <div class="form-group col-md-3 mb-2">
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <label>Adv dt</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="date" class="form-control" name="adv_date"
                                                    id="adv_date" value="{{ old('adv_date') ?? '' }}"
                                                    placeholder="">
                                                <span class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>  
                                    
                                    <div class="form-group col-md-3 mb-2">
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <label>Adv amt</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control" name="adv_amount"
                                                    id="adv_amount" value="{{ old('adv_amount') ?? '' }}"
                                                    placeholder="">
                                                <span class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>  

                                    <div class="form-group col-md-3 mb-2">
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <label>Project</label>
                                            </div>
                                            <div class="col-md-12">
                                                <select name="project_id" id="project_id" class="form-control">
                                                    <option value="">Select</option>
                                                    @foreach ($projects as $project)
                                                        <option value="{{ $project->id }}" >{{ $project->name }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                                <div class="row">
                                   
                                    <div class="form-group col-md-3 mb-2">
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <label>Vr No</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control" name="var_no"
                                                    id="var_no" value="{{ old('var_no') ?? '' }}"
                                                    placeholder="">
                                                <span class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>
                                         
                                    <div class="form-group col-md-3 mb-2">
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <label>Vr dt</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="date" class="form-control" name="var_date"
                                                    id="var_date" value="{{ old('var_date') ?? '' }}"
                                                    placeholder="">
                                                <span class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>  
                                    
                                    <div class="form-group col-md-3 mb-2">
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <label>Vr amt</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control" name="var_amount"
                                                    id="var_amount" value="{{ old('var_amount') ?? '' }}"
                                                    placeholder="">
                                                <span class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>  

                                    <div class="form-group col-md-3 mb-2">
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <label>var Type</label>
                                            </div>
                                            <div class="col-md-12">
                                                <select name="var_type_id" id="var_type_id" class="form-control">
                                                    <option value="">Select</option>
                                                    @foreach ($variable_types as $variable_type)
                                                        <option value="{{ $variable_type->id }}" >{{ $variable_type->name }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div> 
                                </div>

                                <div class="row">
                                   
                                    <div class="form-group col-md-3 mb-2">
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <label>Chq No</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control" name="chq_no"
                                                    id="chq_no" value="{{ old('chq_no') ?? '' }}"
                                                    placeholder="">
                                                <span class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>
                                         
                                    <div class="form-group col-md-3 mb-2">
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <label>Chq dt</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="date" class="form-control" name="chq_date"
                                                    id="chq_date" value="{{ old('chq_date') ?? '' }}"
                                                    placeholder="">
                                                <span class="text-danger"></span>
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
            $('#advance-settlement-create-form').submit(function(e) {
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
@endpush
