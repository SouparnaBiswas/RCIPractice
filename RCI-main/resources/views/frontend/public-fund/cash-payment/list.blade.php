@extends('frontend.public-fund.layouts.master')
@section('title')
Cash Payments List
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
            <div class="arrow_left"><a href="" class="text-white"><i class="ti ti-arrow-left"></i></a></div>
            <div class="">
                <h3>Listing</h3>
                <ul class="breadcome-menu mb-0">
                    <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                    <li><span class="bread-blod">Public Fund</span></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 text-start mb-3">
            <h5>Cash In Bank - {{ Helper::bankPayments() }}</h5>
        </div>
        <div class="col-md-6 text-end mb-3">
           <h5> Cash In hand - {{ Helper::cashPayments() }}</h5>
        </div>
    </div>
    <!--  Row 1 -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card w-100">
                <div class="card-body">
                    <div id="form">
                        @include('frontend.public-fund.cash-payment.form')
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
                                            <th>RCT No</th>
                                            <th>Amount</th>
                                            <th>Form</th>
                                            <th>Vendor</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody class="tbody_height_scroll">
                                        @include('frontend.public-fund.cash-payment.table')
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
    
</div>
@endsection

@push('scripts')
   
    <script>
        $(document).ready(function() {

            function fetch_data(page, sort_type, sort_by, query) {
                $.ajax({
                    url: "{{ route('cash-payments.fetch-data') }}",
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
            $(document).on('submit', '#cash-payment-edit-form', function(e) {
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

<script>
    $(document).ready(function() {
        $('#cash-payment-create-form').submit(function(e) {
            
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

    //rcpt_no  on chnage
    $(document).on('change', '#rcpt_no', function() {
        var rcpt_no = $(this).val();
    
        $.ajax({
            url: "{{ route('cash-payments.get-details') }}",
            type: 'GET',
            data: {
                rcpt_no: rcpt_no
            },
            success: function(response) {
                
                $('.cash-payment-details').html(response.view);
            },
            error: function(xhr) {
                console.log(xhr);
            }
        });
    });
    
</script>

<script>
        $(document).on('click', '#add_more', function() {

        function getOrdinal(n) {
            var s = ["th", "st", "nd", "rd"],
                v = n % 100;
            return n + (s[(v - 20) % 10] || s[v] || s[0]);
        }

        var html = '';
        // count rows
        var rowCount = $('#cash_payment_amount .child1').length + 2;
        html += '<div class="row child1 mb-2"><div class="col-lg-3"><div class="form-group"><label>Amount</label><input type="text" class="form-control" name="amount[]" id="amount" placeholder="" /><span class="text-danger"></span></div></div><div class="col-lg-3"><div class="form-group"><label>Date</label><input type="date" class="form-control" name="date[]" id="date" placeholder="" /><span class="text-danger"></span></div></div><div class="col-lg-1 d-flex align-items-end"><button type="button" class="btn btn-danger btn-sm remove-child">✖</button></div></div>';

        $('#cash_payment_amount').append(html);
        });

        // Handle removing rows
        $(document).on('click', '.remove-child', function() {
        $(this).closest('.child1').remove();
        });
</script>
@endpush