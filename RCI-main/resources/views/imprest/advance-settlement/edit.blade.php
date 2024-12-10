@extends('imprest.layouts.master')
@section('title')
    Advance Settlement Edit
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
                    <h3>Advance Settlement Edit</h3>
                    <ul class="breadcome-menu mb-0">
                        <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                        <li><span class="bread-blod">Edit</span></li>
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

                            <form action="{{ route('advance-settlement.update', $advance_settlement->id) }}" method="POST"
                                id="advance-settlement-edit-form">
                                @method('PUT')
                                @csrf

                                <div class="row">

                                    <div class="form-group col-md-3 mb-2">
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <label>Adv No</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control" name="adv_no" id="adv_no"
                                                    value="{{ $advance_settlement->adv_no ?? '' }}" placeholder="">
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
                                                <input type="date" class="form-control" name="adv_date" id="adv_date"
                                                    value="{{ $advance_settlement->adv_date ?? '' }}" placeholder="">
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
                                                <input type="text" class="form-control" name="adv_amount" id="adv_amount"
                                                    value="{{ $advance_settlement->adv_amount ?? '' }}" placeholder="">
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
                                                        <option value="{{ $project->id }}"
                                                            {{ isset($advance_settlement->project_id) && $project->id == $advance_settlement->project_id ? 'selected' : '' }}>
                                                            {{ $project->name }}</option>
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
                                                <input type="text" class="form-control" name="var_no" id="var_no"
                                                    value="{{ $advance_settlement->var_no ?? '' }}" placeholder="">
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
                                                <input type="date" class="form-control" name="var_date" id="var_date"
                                                    value="{{ $advance_settlement->var_date ?? '' }}" placeholder="">
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
                                                <input type="text" class="form-control" name="var_amount" id="var_amount"
                                                    value="{{ $advance_settlement->var_amount ?? '' }}" placeholder="">
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
                                                        <option value="{{ $variable_type->id }}"
                                                            {{ isset($advance_settlement->var_type_id) && $variable_type->id == $advance_settlement->var_type_id ? 'selected' : '' }}>
                                                            {{ $variable_type->name }}</option>
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
                                                <input type="text" class="form-control" name="chq_no" id="chq_no"
                                                    value="{{ $advance_settlement->chq_no ?? '' }}" placeholder="">
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
                                                    id="chq_date" value="{{ $advance_settlement->chq_date ?? '' }}"
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
                                                        <button type="submit" class="listing_add">Update</button>
                                                    </div>
                                                    <div class="form-group col-md-6 mb-2">
                                                        <button type="submit" class="listing_exit">Cancel</button>
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

        <hr>
        <div class="row">
            <div class="col-lg-6">
                <div class="recov-table">
                    <table class="table customize-table mb-0 align-middle bg_tbody" id="advance-bill-table">
                        <thead class="text-white fs-4 bg_blue">
                            <tr>
                                <th>Firm</th>
                                <th>Bill Amount</th>
                                <th>Balance</th>
                            </tr>
                        </thead>
                        <tbody class="tbody_height_scroll">
                            @include('imprest.advance-settlement.bill-table')

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-md-6" id="advance-bill-form">
                @include('imprest.advance-settlement.bill-form')
            </div>
        </div>
    </div>
    
@endsection

@push('scripts')

    <script>
        $(document).ready(function() {
        $('#advance-settlement-bills-create-form').submit(function(e) {
            e.preventDefault();
            var formData = $(this).serialize();
        

            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    
                    var data = response.data;
                    var id= data.id;
                    var route = "{{ route('advance-settlement-bills.edit', ['id' => ':id']) }}";
                    
                    route = route.replace(':id', id);
                    
                    var newRow = '<tr class="edit-route-advance-bill"  data-id="'+ id +'" data-route="' + route +
                        '">';
                    newRow += '<td>' +  (data.firm ? data.firm : 'N/A')+ '</td>';
                    newRow += '<td>' + (data.bill_amount ? data.bill_amount : 'N/A') + '</td>';
                    newRow += '<td>' + (data.balance ? data.balance : 'N/A') + '</td>';
                    newRow += '</tr>';

                    $('#advance-bill-table tbody').append(newRow);
                    $('#no-advance-bill').hide();
                    $('#pagination-advance-bill').hide();
                    // Append new row to table
                   
                },
                error: function(xhr) {
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
        $(document).ready(function() {
            $(document).on('click', '.edit-route-advance-bill', function() {
                var route = $(this).data('route');
                $('#loading').addClass('loading');
                $('#loading-content').addClass('loading-content');
                $.ajax({
                    url: route,
                    type: 'GET',
                    success: function(response) {
                        $('#advance-bill-form').html(response.view);
                        $('#loading').removeClass('loading');
                        $('#loading-content').removeClass('loading-content');
                        $('#offcanvasEdit').offcanvas('show');
                    },
                    error: function(xhr) {
                        // Handle errors
                        $('#loading').removeClass('loading');
                        $('#loading-content').removeClass('loading-content');
                        console.log(xhr);
                    }
                });
            });

            // Handle the form submission
            $(document).on('submit', '#advance-settlement-bills-edit-form', function(e) {
                e.preventDefault();

                var formData = $(this).serialize();

                $.ajax({
                    url: $(this).attr('action'),
                    type: $(this).attr('method'),
                    data: formData,
                    success: function(response) {
                        toastr.success(response.message);
                    },
                    error: function(xhr) {
                        // Handle errors (e.g., display validation errors)
                        var errors = xhr.responseJSON.errors;
                        $.each(errors, function(key, value) {
                            // Assuming you have a span with class "text-danger" next to each input
                            $('#' + key + '-error').html(value[0]);
                        });
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $(document).on('click', '#delete-advance-settlement', function() {
                var route = $(this).data('route');
                var id = $(this).data('id');
                $.ajax({
                    url: route,
                    success: function(response) {
                       
                        $('#firm').val('');
                        $('#bill_amount').val('');
                        $('#balance').val('');
                        // edit-route-policy tr remove
                        $('.edit-route-advance-bill[data-id="' + id + '"]').remove();
                        $('#loading').removeClass('loading');
                        $('#loading-content').removeClass('loading-content');
                    },
                    error: function(xhr) {
                        // Handle errors
                        console.log(xhr);
                    }
                });
            });
        });
        </script>

        <script>
          
            $(document).ready(function() {
                $('#advance-settlement-edit-form').submit(function(e) {
                    e.preventDefault();
                    var formData = $(this).serialize();
                    $.ajax({
                        url: $(this).attr('action'),
                        type: $(this).attr('method'),
                        data: formData,
                        success: function(response) {
                            window.location.reload();
                        },
                        error: function(xhr) {
                            // Handle errors (e.g., display validation errors)
                            var errors = xhr.responseJSON.errors;
                            $.each(errors, function(key, value) {
                                // Assuming you have a span with class "text-danger" next to each input
                                $('#' + key + '-error').html(value[0]);
                            });
                        }
                    });
                });
            });
        </script>
@endpush
