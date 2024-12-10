@extends('inventory.layouts.master')
@section('title')
Inventory Loan List
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
                <h3>Inventory Loan Listing</h3>
                <ul class="breadcome-menu mb-0">
                    <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                    <li><span class="bread-blod">Inventory Loan Listing</span></li>
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
                        @include('inventory.inventory-loans.form')
                    </div>

                    <div class="row">
                        <div class="col-md-12 mb-4 mt-4">
                            <div class="row justify-content-end">
                                <div class="col-md-5 col-lg-3 mb-2 mt-4">
                                    <div class="position-relative">
                                        <input type="text" class="form-control search_table" value="" id="search"
                                            placeholder="Search">
                                        <span class="table_search_icon"><i class="fa fa-search"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive rounded-2">
                                <table class="table customize-table mb-0 align-middle bg_tbody">
                                    <thead class="text-white fs-4 bg_blue">
                                        <tr>
                                            <th>SL No.</th>
                                            <th>Item Code </th>
                                            <th>ICC No </th>
                                            <th>Quantity Issue</th>
                                            <th>Cost</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody class="tbody_height_scroll">
                                        @include('inventory.inventory-loans.table')
                                    </tbody>
                                </table>
                                <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
                                <input type="hidden" name="hidden_column_name" id="hidden_column_name" value="id" />
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
    $(document).ready(function() {

            function fetch_data(page, sort_type, sort_by, query) {
                $.ajax({
                    url: "{{ route('inventory-loans.fetch-data') }}",
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
            $('#inventory-loans-create-form').submit(function(e) {
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
            $(document).on('submit', '#inventory-loans-edit-form', function(e) {
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
    $(document).ready(function() {
            $('.project-div').hide();
            $('.holder-div').hide();
            $('.group-div').hide();
            $(document).on('change', '#inventory_type', function() {
                // inventory_type_id value if project then show project name and holders name filed open
                var inventory_type = $(this).val();
                if (inventory_type == 'Project') {
                    $('.holder-div').show();
                    $('.project-div').show();
                    $('.group-div').hide();
                    $('#group_id').val('');
                    
                } else {
                    $('.holder-div').show();
                    $('.group-div').show();
                    $('.project-div').hide(); 
                    $('#inventory_project_id').val('');
                }
            });
        });
</script>

<script>
    $(document).on('change', '#item_code_id', function(e) {
    var item_code = $(this).val();


    $.ajax({
        url: "{{ route('inventory-loans.get-item-detail') }}",
        type: 'POST',
        data: {
            item_code: item_code,
            _token: '{{ csrf_token() }}'  // Include CSRF token for security
        },
        success: function(response) {
            if (response.success == true) {
                $('#nomenclature').val(response.item_detail.description);
                $('#unit_price').val(response.item_detail.item_price);
                $('#total_cost').val('');
                $('#quantity_issue').val('');
            } else {
                alert('Item details not found!');
            }
        },
        error: function(xhr, status, error) {
            console.error(error); // Log any errors for debugging
           
        }
    });
});
</script>

<script>
    $(document).on('change','#item_code_edit', function(e)
    {
        var item_code = $(this).val();
        $.ajax({
        url: "{{ route('inventory-loans.get-item-detail') }}",
        type: 'POST',
        data: {
            item_code: item_code,
            _token: '{{ csrf_token() }}'  // Include CSRF token for security
        },
        success: function(response) {
            if (response.success == true) {
                $('#nomenclature_edit').val(response.item_detail.description);
                $('#unit_price_edit').val(response.item_detail.item_price);
                $('#total_cost_edit').val('');
                $('#quantity_issue_edit').val('');
            } else {
                alert('Item details not found!');
            }
        },
        error: function(xhr, status, error) {
            console.error(error); // Log any errors for debugging
        
        }
    });
    });
</script>

<script>
    $(document).on('keyup', '#quantity_issue', function(e) {
        var quantityIssue = parseFloat($('#quantity_issue').val()) || 0;
        var unitCost = parseFloat($('#unit_price').val()) || 0;
        var totalCost = (quantityIssue * unitCost).toFixed(2); 
        $('#total_cost').val(totalCost);   
        
    });
</script>
@endpush