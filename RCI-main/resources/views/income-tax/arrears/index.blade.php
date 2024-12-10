@extends('income-tax.layouts.master')
@section('title')
    Arrears
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
                <div class="arrow_left"><a href="" class="text-white"><i class="ti ti-arrow-left"></i></a></div>
                <div class="">
                    <h3>Arrears</h3>
                    <ul class="breadcome-menu mb-0">
                        <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                        <li><span class="bread-blod">Arrears Edit</span></li>
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

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        {{-- members --}}
                                        <div class="form-group col-md-3 mb-2">
                                            <div class="row align-items-center">
                                                <div class="col-md-12">
                                                    <label>Member ID</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <select class="form-select" name="member_id" id="member_id">
                                                        <option value="">Select Member</option>
                                                        @foreach ($members as $member)
                                                            <option value="{{ $member->id }}">{{ $member->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
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
                                                        value="">
                                                    <span class="text-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3 mb-2">
                                            <div class="row align-items-center">
                                                <div class="col-md-12">
                                                    <label>Id No</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <input type="text" class="form-control" name="emp_id" id="emp_id"
                                                        value="" placeholder="">
                                                    <span class="text-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3 mb-2">
                                            <div class="row align-items-center">
                                                <div class="col-md-12">
                                                    <label>Name</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <input type="text" class="form-control" name="name" id="name"
                                                        value="" placeholder="">
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
                                                    <input type="text" class="form-control" name="desig" id="desig"
                                                        value="" placeholder="">
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
                                                    <input type="text" class="form-control" name="basic" id="basic"
                                                        value="" placeholder="">
                                                    <span class="text-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3 mb-2">
                                            <div class="row align-items-center">
                                                <div class="col-md-12">
                                                    <label>Group</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <input type="text" class="form-control" name="group" id="group"
                                                        value="" placeholder="">
                                                    <span class="text-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3 mb-2">
                                            <div class="row align-items-center">
                                                <div class="col-md-12">
                                                    <label>Section</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <input type="text" class="form-control" name="section"
                                                        id="section" value="" placeholder="">
                                                    <span class="text-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- finacial year --}}
                                <div class="col-md-12 mt-4">
                                    <div class="row">
                                        <div class="form-group col-md-6 mb-2">
                                            <div class="row align-items-center">
                                                <div class="col-md-3">
                                                    <label>Financial Year:</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <select class="form-select" name="financial_year"
                                                        id="financial_year">
                                                        <option value="">Select Financial Year</option>
                                                        @foreach ($financialYears as $financialYear)
                                                            <option value="{{ $financialYear }}">
                                                                {{ $financialYear }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <span class="text-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr />
                                <div class="edit-mem-tab">
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade active show" id="loan-tab-pane" role="tabpanel"
                                            aria-labelledby="loan-tab" tabindex="0">
                                            <div class="credit-frm">

                                                <div class="row mb-3" id="form-table">
                                                    @include('income-tax.arrears.form-table')

                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @push('scripts')
        <script>
            $(document).on('click', '#delete', function(e) {
                swal({
                        title: "Are you sure?",
                        text: "To delete this Project!",
                        type: "warning",
                        confirmButtonText: "Yes",
                        showCancelButton: true
                    })
                    .then((result) => {
                        if (result.value) {
                            window.location = $(this).data('route');
                        } else if (result.dismiss === 'cancel') {
                            swal(
                                'Cancelled',
                                'Your stay here :)',
                                'error'
                            )
                        }
                    })
            });
        </script>
        <script>
            $(document).ready(function() {
                $('#member_id').change(function() {
                    var member_id = $(this).val();
                    $('#loading').addClass('loading');
                    $('#loading-content').addClass('loading-content');
                    $.ajax({
                        url: "{{ route('arrears.member-details') }}",
                        type: 'POST',
                        data: {
                            _token: "{{ csrf_token() }}",
                            member_id: member_id
                        },
                        success: function(data) {
                            $('#pers_no').val(data.member.pers_no || '');
                            $('#emp_id').val(data.member.emp_id || '');
                            $('#name').val(data.member.name || '');
                            $('#desig').val(data.member.designation ? (data.member.designation.designation_type ||
                                data.member.designation) : '');
                            $('#basic').val(data.member.basic || '');
                            $('#group').val(data.member.groups ? data.member.groups.value || '' : '');
                            $('#section').val(data.member.divisions ? data.member.divisions.value || '' : '');
                            $('#form-table').html(data.view);
                            $('#loading').removeClass('loading');
                            $('#loading-content').removeClass('loading-content');
                        },
                        error: function(xhr, status, error) {
                            console.error('Error:', error);
                            $('#loading').removeClass('loading');
                            $('#loading-content').removeClass('loading-content');
                        }
                    });
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                $(document).on('submit','#arrears-form',function(e) {
                    e.preventDefault();
                    var form = $(this);
                    var url = form.attr('action');
                    var type = form.attr('method');
                    var data = form.serialize();
                    $('#loading').addClass('loading');
                    $('#loading-content').addClass('loading-content');
                    $.ajax({
                        url: url,
                        type: type,
                        data: data,
                        success: function(response) {
                            $('#loading').removeClass('loading');
                            $('#loading-content').removeClass('loading-content');
                            if (response.status) {
                                $('.text-danger').html('');
                                toastr.success(response.message);
                                form.trigger('reset');
                                $('tbody').html(response.view);
                            } else {
                                toastr.error(response.message);
                            }
                        },
                        error: function(xhr, status, error) {

                            $('#loading').removeClass('loading');
                            $('#loading-content').removeClass('loading-content');
                            $('.text-danger').html('');
                            // Handle errors (e.g., display validation errors)
                            var errors = xhr.responseJSON.errors;
                            if (errors) {
                                $.each(errors, function(key, value) {
                                    $('[name="' + key + '"]').next('.text-danger').html(
                                        value[
                                            0]);
                                });
                            }
                        }
                    });
                });
            });
        </script>
        <script>
            // listing_exit remove value from input fields
            $(document).on('click', '.listing_exit', function() {
                // $('#arrears-form').trigger('reset');
                // $('.text-danger').html('');
                location.reload();
            });
        </script>
        {{-- edit-route --}}
        <script>
            $(document).on('click', '.edit-route', function() {
                var route = $(this).data('route');
                $('#loading').addClass('loading');
                $('#loading-content').addClass('loading-content');
                $.ajax({
                    url: route,
                    type: 'GET',
                    success: function(response) {
                        $('#areers-form').html(response.view);
                        $('#loading').removeClass('loading');
                        $('#loading-content').removeClass('loading-content');
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                        $('#loading').removeClass('loading');
                        $('#loading-content').removeClass('loading-content');
                    }
                });
            });
        </script>
        {{-- arrears-form-update --}}
        <script>
            $(document).ready(function() {
                $(document).on('submit', '#arrears-form-update', function(e) {
                    e.preventDefault();
                    var form = $(this);
                    var url = form.attr('action');
                    var type = form.attr('method');
                    var data = form.serialize();
                    $('#loading').addClass('loading');
                    $('#loading-content').addClass('loading-content');
                    $.ajax({
                        url: url,
                        type: type,
                        data: data,
                        success: function(response) {
                            $('#loading').removeClass('loading');
                            $('#loading-content').removeClass('loading-content');
                            if (response.status) {
                                toastr.success(response.message);
                                form.trigger('reset');
                                $('#update-' + response.id).html(response.view);
                                $('#areers-form').html(response.view2);
                            } else {
                                toastr.error(response.message);
                            }
                        },
                        error: function(xhr, status, error) {
                            $('#loading').removeClass('loading');
                            $('#loading-content').removeClass('loading-content');
                            $('.text-danger').html('');
                            // Handle errors (e.g., display validation errors)
                            var errors = xhr.responseJSON.errors;
                            if (errors) {
                                $.each(errors, function(key, value) {
                                    $('[name="' + key + '"]').next('.text-danger').html(
                                        value[
                                            0]);
                                });
                            }
                        }
                    });
                });
            });
        </script>
        
    @endpush
