@extends('inventory.layouts.master')
@section('title')
    Traffic Control List
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
                    <h3>Traffic Control Listing</h3>
                    <ul class="breadcome-menu mb-0">
                        <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                        <li><span class="bread-blod">Traffic Control Listing</span></li>
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
                            @include('inventory.traffic-controls.form')
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-4 mt-4">
                                <div class="row">
                                    <div class="col-md-4 col-lg-4 mb-2 mt-4">
                                        <div class="position-relative">
                                        <input type="text" class="form-control" name="date-pdf" id="date-pdf"
                                            value="" placeholder="Select Date">
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-lg-2 mb-2 mt-4">
                                        <div class="position-relative">
                                        <button class="listing_add" type="submit" id="generatepdf">Generate PDF</button>
                                        </div>
                                    </div>
                                    <div class="col-md-6 d-flex justify-content-end  mb-2 mt-4">
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
                                                <th>SL No.</th>
                                                <th class="sorting" data-sorting_type="desc"
                                                data-column_name="tcr_number" style="cursor: pointer">
                                                TCR SL Number <span id="tcr_number_icon"><i
                                                        class="fa fa-arrow-down"></i></span> </th>
                                                <th class="sorting" data-sorting_type="desc"
                                                    data-column_name="lr_rr_awb_bl_app_rpp_number" style="cursor: pointer">
                                                    LR/RR/AWB/BL/APP/RPP No <span id="lr_rr_awb_bl_app_rpp_number_icon"><i
                                                            class="fa fa-arrow-down"></i></span> </th>
                                                {{-- lr_rr_awb_bl_app_rpp_date --}}
                                                <th class="sorting" data-sorting_type="desc"
                                                    data-column_name="lr_rr_awb_bl_app_rpp_date" style="cursor: pointer">
                                                    LR/RR/AWB/BL/APP/RPP Date <span id="lr_rr_awb_bl_app_rpp_date_icon"><i
                                                            class="fa fa-arrow-down"></i></span> </th>
                                                <th>Name of
                                                    Consignor</th>
                                                <th>Name of Transporter/
                                                    Carrier
                                                </th>
                                                <th>Supply order No / Contract No. / Authority
                                                    & Date
                                                </th>
                                                <th>Date of Collection of
                                                    Stores</th>
                                                {{-- No. of Packages & Gross Weight --}}
                                                <th> No. of Packages & Gross Weight</th>
                                                {{-- condition_of_package --}}
                                                <th class="sorting" data-sorting_type="desc"
                                                    data-column_name="condition_of_package" style="cursor: pointer">
                                                    Condition of Package <span id="condition_of_package_icon"><i
                                                            class="fa fa-arrow-down"></i></span> </th>
                                                {{-- amount --}}
                                                <th class="sorting" data-sorting_type="desc" data-column_name="amount"
                                                    style="cursor: pointer">Amount <span id="amount_icon"><i
                                                            class="fa fa-arrow-down"></i></span> </th>
                                                {{-- remarks --}}
                                                <th class="sorting" data-sorting_type="desc" data-column_name="remarks"
                                                    style="cursor: pointer">Remarks <span id="remarks_icon"><i
                                                            class="fa fa-arrow-down"></i></span> </th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody class="tbody_height_scroll">
                                            @include('inventory.traffic-controls.table')
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
                    text: "To delete this Traffic Control!",
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
                    url: "{{ route('traffic-controls.fetch-data') }}",
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
            $('#traffic-controls-create-form').submit(function(e) {
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
            $(document).on('submit', '#traffic-controls-edit-form', function(e) {
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
        $('#date-pdf').daterangepicker();
    </script>

<script>
    $(document).on('click', '#generatepdf', function() {
        var date = $('#date-pdf').val();
        var url = "{{ route('reports.traffic-control') }}";

        // Redirect to the URL with the date range as a query parameter
        window.location.href = url + '?date=' + encodeURIComponent(date);
    });
</script>
@endpush
