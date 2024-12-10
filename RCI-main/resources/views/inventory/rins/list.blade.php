@extends('inventory.layouts.master')
@section('title')
RIN List
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
                <h3>RIN Listing</h3>
                <ul class="breadcome-menu mb-0">
                    <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                    <li><span class="bread-blod">RIN Listing</span></li>
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
                        @include('inventory.rins.form')
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
                                            <th>Rin No.</th>
                                            {{-- <th class="sorting" data-sorting_type="desc" data-column_name="item_id"
                                                style="cursor: pointer"> Item Code <span id="item_id_icon"></span> </th>
                                            <th>Received Quantity</th>
                                            <th>Accepted Quantity</th>
                                            <th>Rejected Quantity</th>
                                            <th class="sorting" data-sorting_type="desc" data-column_name="nc_status"
                                                style="cursor: pointer">C/NC/NCF <span id="nc_status_icon"></span> </th>
                                            <th>A/U</th> --}}

                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody class="tbody_height_scroll">
                                        @include('inventory.rins.table')
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
    $(document).on('click', '#delete', function(e) {
            swal({
                    title: "Are you sure?",
                    text: "To delete this Inventory Type",
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
                    url: "{{ route('rins.fetch-data') }}",
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
            $('#rins-create-form').submit(function(e) {
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
            $(document).on('submit', '#rins-edit-form', function(e) {
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
            // Handle item code change event dynamically
            $(document).on('change', '.item_id', function() {
                var item_code_id = $(this).val();
                var $this = $(this); // Reference to the selected item

                // Get the row containing this item
                var $row = $this.closest('.count-class');

                $.ajax({
                    url: "{{ route('rins.get-item-description') }}",
                    type: 'POST',
                    data: {
                        id: item_code_id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        // Update the description in the same row
                        $row.find('.description').val(response.description);
                        $row.find('.units_cost').val(response.price);
                    },
                    error: function(xhr) {
                        console.log(xhr);
                    }
                });
            });

            // Handle "Add More" functionality
            $(document).on('click', '.add-more', function() {
                // Clone the first row of fields
                var $clone = $('#rins_new_html .new_html').first().clone();
                $clone.find('input, select').val(''); // Clear input fields in the cloned row
                $clone.appendTo('#rins_new_html').show(); // Append the new row to the form and display it
            });
            });

</script>


<script>
    $('#gst').change(function() {
            var gst = parseFloat($(this).val()); // Get the GST value
            var total_unit_cost = parseFloat($('#total_cost').val()); // Get the total cost

            if (!isNaN(gst) && !isNaN(total_unit_cost)) {
                // Calculate the total amount
                var gst_amount = (total_unit_cost * gst / 100);
                var total_amount = total_unit_cost + (total_unit_cost * gst / 100);

                // Display the total amount (you can choose your target element)
                $('#total_amount').val(total_amount.toFixed(2));
                $('#gst_amount').val(gst_amount.toFixed(2));
            }
        });
</script>
<script>
    $(document).ready(function(){
            // Function to update difference
            function updateDifference() {
                var received = parseInt($('#received_quantity').val());
                var accepted = parseInt($('#accepted_quantity').val());
                var difference = received - accepted;
                $('#rejected_quantity').val(difference);
            }
        
            // Bind change event to input fields
            $('#received_quantity, #accepted_quantity').keyup(updateDifference);

        });
</script>

<script>
    // add new row
        $(document).ready(function() {
            $(document).on('click', '.add-more-rin', function() {
                var tr = $('#rins_new_html').html();
                $('#credit_form_add_new_row').append(tr);

                if($('#voucher_date_1').val() != '') {
                    $('.voucher-date').each(function() {
                        $(this).val($('#voucher_date_1').val());
                    });
                }

                if($('#rin1').val() != '') {
                    $('.rin').each(function() {
                        $(this).val($('#rin1').val());
                    });
                }
                return false;   
            });

            $(document).on('click', '.trash', function() {
                $(this).closest('.new_html').remove();
                return false;
            });
        });
</script>

<script>
    $(document).ready(function() {
            $(document).on('click', '.edit_rin_add', function() {
                var tr = $('#rins_edit_html').html();
                $('#credit_form_edit_new_row').append(tr);

                if($('#voucher_date_1').val() != '') {
                    $('.voucher-date').each(function() {
                        $(this).val($('#voucher_date_1').val());
                    });
                }

                if($('#rin1').val() != '') {
                    $('.rin').each(function() {
                        $(this).val($('#rin1').val());
                    });
                }
                return false;   
            });

            $(document).on('click', '.trash', function() {
                $(this).closest('.new_html').remove();
                return false;
            });
        });
</script>
<script>
    $(document).ready(function() {
        $(document).on('click', '.del-rin', function() {
            var rowCount = $('.row-item-rin').length;
            if (rowCount > 1) {
                $(this).closest('.row-item-rin').remove();
            } else {
                alert("At least one row must remain.");
            }
        });
    });

</script>
<script>
    $(document).ready(function(){
        function getTotalCost() {
            var received = parseInt($('#received_quantity').val()) || 0;
            var unit_cost = parseInt($('#unit_cost').val()) || 0;
            var totalCost = received * unit_cost;
            $('#total_cost').val(totalCost);
        }
        $('#received_quantity').keyup(getTotalCost);

    });
</script>
<script>
       
    $(document).ready(function() {
        function calculateTotalCost($row) {
            var received = parseFloat($row.find('.rcv_quantity').val()) || 0;
            var unitCost = parseFloat($row.find('.units_cost').val()) || 0;
            var gstPercent = parseFloat($row.find('.gst_percent').val()) || 0;
            var totalCost = received * unitCost;
            $row.find('.total_cost').val(totalCost.toFixed(2));
            var gstAmount = (totalCost * gstPercent / 100).toFixed(2);
            $row.find('.gst_amount').val(gstAmount);

            // Calculate total amount
            var totalAmount = (totalCost + parseFloat(gstAmount)).toFixed(2);
            $row.find('.total_amount').val(totalAmount);
        }

        // Event listener for changes in received quantity, unit cost, or GST percentage
        $(document).on('input', '.rcv_quantity, .units_cost, .gst_percent', function() {
            var $row = $(this).closest('.count-class'); 
            calculateTotalCost($row); 
        });
    });
</script>

<script>
    $(document).ready(function(){
        $('#item_id').change(function() {
            var item_code_id = $(this).val();
            $.ajax({ 
                url: "{{ route('rins.get-item-description')}}",
                type: 'POST',
                data: {
                    id: item_code_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    $('#description').val(response.description);
                    $('#unit_cost').val(response.price);
                },
                error: function(xhr) {
                    console.log(xhr);
                }
            });
        });
    });
</script>
@endpush