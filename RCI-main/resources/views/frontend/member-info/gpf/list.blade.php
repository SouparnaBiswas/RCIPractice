@extends('frontend.layouts.master')
@section('title')
    Gpf List
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
                    <h3>Gpf Listing</h3>
                    <ul class="breadcome-menu mb-0">
                        <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                        <li><span class="bread-blod">Gpf Listing</span></li>
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
                            @include('frontend.member-info.gpf.form')
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-4 mt-4">
                                <div class="row justify-content-end">
                                    <div class="col-md-5 col-lg-3 mb-2">
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
                                                <th class="sorting" data-sorting_type="desc" data-column_name="value"
                                                    style="cursor: pointer">Member<span id="value_icon"><i
                                                            class="fa fa-arrow-down"></i></span> </th>
                                                <th>Date</th>
                                                <th>Monthly Subscription</th>
                                                <th>Openning Balance</th>
                                                <th>Closing Balance</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody class="tbody_height_scroll">
                                            @include('frontend.member-info.gpf.table')
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
        //if member_id select then monthly_subscription will remove readonly
        $(document).on('change', '#member_id', function() {
            $('#monthly_subscription').removeAttr('readonly');
        });
    </script>
    <script>
        // check monthly_subscription min 6% of basic pay, max amount > basic pay
        $(document).on('keyup', '#monthly_subscription', function() {
            var monthly_subscription = $('#monthly_subscription').val();
            var member = $('#member_id').val();

            $.ajax({
                url: "{{ route('member-info.gpf.check-amount') }}",
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    member: member,
                    monthly_subscription: monthly_subscription
                },
                success: function(response) {
                    if (response.status == 'success') {
                        $('#subscription_error_message').removeClass('is-invalid').addClass('is-valid')
                            .text('');
                        $('.gpf_sub_btn').attr('disabled', false);
                    } else {
                        $('#subscription_error_message').removeClass('is-valid').addClass('is-invalid');
                        var errorMessage = response.errors.join(' ');
                        $('.gpf_sub_btn').attr('disabled', true);
                        $('#subscription_error_message').text(errorMessage);
                    }
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#member-gpf-create-form').submit(function(e) {
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

                        $('.text-danger').html('');
                        var errors = xhr.responseJSON.errors;
                        $.each(errors, function(key, value) {
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
            $('#multiple-checkboxes').multiselect({
                includeSelectAllOption: true,
                enableFiltering: true, // Optional: Adds a search box within the dropdown
                nonSelectedText: 'Select member', // Text when no options are selected
                buttonWidth: '100%', // Adjust the button width
                numberDisplayed: 1 // Number of selected options displayed before '+ n more' is shown
            });
        });
    </script>

<script>
    $(document).ready(function() {
        // Handle click event on the header checkbox
        $('#select-all').on('click', function() {
            // Check or uncheck all row checkboxes based on header checkbox state
            $('.row-checkbox').prop('checked', this.checked);
        });

        $('.row-checkbox').on('click', function() {
            if ($('.row-checkbox:checked').length == $('.row-checkbox').length) {
                $('#select-all').prop('checked', true);
            } else {
                $('#select-all').prop('checked', false);
            }
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
        $(document).on('submit', '#gpfs-edit-form', function(e) {
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

<script>
    var select_box_element = document.querySelector('.search-select-box');
    dselect(select_box_element, {
        search: true
    });
</script>
@endpush
