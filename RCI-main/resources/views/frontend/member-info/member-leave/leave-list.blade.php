@extends('frontend.layouts.master')
@section('title')
   Member Leaves List
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
                <div class="arrow_left"><a href="{{ route('member-leaves.index') }}" class="text-white"><i class="ti ti-arrow-left"></i></a></div>
                <div class="">
                    <h3>Member Leaves Listing</h3>
                    <ul class="breadcome-menu mb-0">
                        <li><a href="{{ route('member-leaves.index') }}">Home</a> <span class="bread-slash">/</span></li>
                        <li><span class="bread-blod">Member Leaves Listing</span></li>
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
                            @include('frontend.member-info.member-leave.form')
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-4 mt-4">
                                <div class="row justify-content-end">
                                    <div class="col-md-5 col-lg-3 mb-2 mt-4">
                                        <div class="position-relative">
                                            <input type="text" class="form-control search_table" value=""
                                                id="search" placeholder="Search">
                                            <span class="table_search_icon"><i class="fa fa-search"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive rounded-2">
                                    <table class="table customize-table mb-0 align-middle bg_tbody">
                                        <thead class="text-white fs-4 bg_blue">
                                            <tr>
                                                <th>ID</th>
                                                <th class="sorting" data-sorting_type="desc" data-column_name="name"
                                                    style="cursor: pointer">Member Name </th>
                                                <th class="sorting" data-sorting_type="desc" data-column_name="leave_type_abbr"
                                                    style="cursor: pointer"> Leave Type  </th>
                                                    <th class="sorting" data-sorting_type="desc" data-column_name="start_date"
                                                    style="cursor: pointer"> Start Date </th>
                                                <th class="sorting" data-sorting_type="desc" data-column_name="end_date"
                                                    style="cursor: pointer">End Date  </th>
                                                <th class="sorting" data-sorting_type="desc" data-column_name="no_of_days"
                                                    style="cursor: pointer">No. of days  </th>
                                                <th class="sorting" data-sorting_type="desc" data-column_name="status"
                                                    style="cursor: pointer">Status  </th>
                                                <th class="sorting" data-sorting_type="desc" data-column_name="year"
                                                    style="cursor: pointer">Year </th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody class="tbody_height_scroll">
                                            @include('frontend.member-info.member-leave.leave-table')
                                        </tbody>
                                    </table>
                                    <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
                                    <input type="hidden" name="hidden_column_name" id="hidden_column_name"
                                        value="id" />
                                    <input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="desc" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).on('click', '#delete', function(e) {
            swal({
                    title: "Are you sure?",
                    text: "To delete this Leave Application!",
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

            function fetch_data(page, sort_type, sort_by, query) {
                $.ajax({
                    url: "{{ route('member-leaves.leave-fetch-data') }}",
                    data: {
                        page: page,
                        sortby: sort_by,
                        sorttype: sort_type,
                        query: query
                    },
                    success: function(data) {
                        $('tbody').html(data.data);
                    }
                });
            }

            $(document).on('keyup', '#search', function() {
                var query = $('#search').val();
                var column_name = $('#hidden_column_name').val();
                var sort_type = $('#hidden_sort_type').val();
                var page = $('#hidden_page').val();
                fetch_data(page, sort_type, column_name, query);
            });

            $(document).on('click', '.sorting', function() {
                var column_name = $(this).data('column_name');
                var order_type = $(this).data('sorting_type');
                var reverse_order = '';
                if (order_type == 'asc') {
                    $(this).data('sorting_type', 'desc');
                    reverse_order = 'desc';
                    // clear_icon();
                    $('#' + column_name + '_icon').html(
                        '<i class="fa fa-arrow-down"></i>');
                }
                if (order_type == 'desc') {
                    // alert(order_type);
                    $(this).data('sorting_type', 'asc');
                    reverse_order = 'asc';
                    // clear_icon();
                    $('#' + column_name + '_icon').html(
                        '<i class="fa fa-arrow-up"></i>');
                }
                $('#hidden_column_name').val(column_name);
                $('#hidden_sort_type').val(reverse_order);
                var page = $('#hidden_page').val();
                var query = $('#search').val();
                fetch_data(page, reverse_order, column_name, query);
            });

            $(document).on('click', '.pagination a', function(event) {
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                $('#hidden_page').val(page);
                var column_name = $('#hidden_column_name').val();
                var sort_type = $('#hidden_sort_type').val();

                var query = $('#search').val();

                $('li').removeClass('active');
                $(this).parent().addClass('active');
                fetch_data(page, sort_type, column_name, query);
            });

        });
    </script>
    <script>
        $(document).ready(function() {
            $('#member-leave-create-form').submit(function(e) {
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
        $(document).ready(function() {
            $(document).on('click', '.edit-route', function() {
                var route = $(this).data('route');
                $('#loading').addClass('loading');
                $('#loading-content').addClass('loading-content');
                $.ajax({
                    url: route,
                    type: 'GET',
                    success: function(response) {
                        $('#form').html(response.view);
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
            $(document).on('submit', '#member-leave-edit-form', function(e) {
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

    {{-- <script>
        $(document).ready(function() {
            $(document).on('change', '#tpt_allowance', function() {
                var allowance = $(this).val();
                $.ajax({
                    url: "{{ route('tptas.da-percentage') }}",
                    type: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        allowance: allowance
                    },
                    success: function(response) {
                        $('#tpt_da').val(response.tpt_da);
                    },
                    error: function(xhr) {
                        console.log(xhr);
                    }
                });
            });
        });
    </script> --}}
    <script>
        $(document).ready(function() {
            $('#no_of_days').val('');
    
            function calculateDifference() {
                var startDate = $('#start_date').val();
                var endDate = $('#end_date').val();
                var allotedLeave = $('#alloted_leave').val();
                
                if(allotedLeave == 0) {
                    alert('Leave balance is 0. You can not apply for leave.');
                    $('#start_date').val('');
                    $('#end_date').val('');
                    return false;
                } else {
                    if(new Date(startDate) > new Date(endDate)) {
                        alert('End date should be greater than start date.');
                        $('#end_date').val('');
                        return false;
                    } else if((new Date(startDate)).getTime() === (new Date(endDate)).getTime()) {
                        $('#no_of_days').val(1);
                        return false;
                    } else if(new Date(startDate) < new Date(endDate)) {
                        var difference = Math.abs(new Date(endDate) - new Date(startDate));
                        var days = (Math.ceil(difference / (1000 * 3600 * 24))) + 1;
                        $('#no_of_days').val(days);
                    } else {
                        $('#no_of_days').val('');
                    }
                }
                
                
                
    
                // var difference = Math.abs(new Date(endDate) - new Date(startDate));
                // var days = difference / (1000 * 3600 * 24);
    
                // $('#no_of_days').val(days);
            }
    
            $('#start_date, #end_date').on('change', calculateDifference);
        });
    </script>
    <script>
        $(document).ready( function () {
            var memberId = $('#member_id').val();
            
            if(!memberId) {
                $('#leave_type_id').prop('disabled', true);
                $('#start_date').prop('disabled', true);
                $('#end_date').prop('disabled', true);
                $('#reason').prop('disabled', true);
                $('#year').prop('disabled', true);
                $('#status').prop('disabled', true);    
            } 
            $('#member_id').on('change', function() {
                $('#leave_type_id').prop('disabled', false);
                $('#start_date').prop('disabled', false);
                $('#end_date').prop('disabled', false);
                $('#reason').prop('disabled', false);
                $('#year').prop('disabled', false);
                $('#status').prop('disabled', false);
            });
    
            $('#leave_type_id').on('change', function() {
                var leaveTypeId = $(this).val();
                var memberId = $('#member_id').val();
                var year = $('#year').val();
                
                
                $.ajax({
                    url: "{{ route('member-leaves.get-alloted-leaves') }}",
                    type: 'GET',
                    data: {
                        leaveTypeId: leaveTypeId,
                        memberId: memberId,
                        year: year
                    },
                    success: function(response) {
                        if(response) {
                            $('#remaining_leaves').val((response.data));
                        } else {
                            $('#remaining_leaves').val('');
                        }
                    }
                });
            });
        })
    </script>

<script>
    var select_box_element = document.querySelector('.search-select-box');
    dselect(select_box_element, {
        search: true
    });
    </script>
@endpush
