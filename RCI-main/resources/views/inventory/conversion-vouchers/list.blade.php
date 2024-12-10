@extends('inventory.layouts.master')
@section('title')
Conversion Vouchers
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
                <h3>Conversion Vouchers</h3>
                <ul class="breadcome-menu mb-0">
                    <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                    <li><span class="bread-blod">Conversion Vouchers</span></li>
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
                        @include('inventory.conversion-vouchers.form')
                    </div>

                    <div class="row">
                        <div class="col-md-12 mb-4 mt-4">
                            <div class="row justify-content-end">
                                <div class="col-md-5 col-lg-2 mb-2 mt-4">
                                    <div class="position-relative">
                                        <input type="date" class="form-control search_table ps-3 date-entry" id="">
                                    </div>
                                </div>
                                <div class="col-md-5 col-lg-3 mb-2 mt-4">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <div class="position-relative">
                                                <input type="text" class="form-control search_table" value=""
                                                    id="search" placeholder="Search">
                                                <span class="table_search_icon"><i class="fa fa-search"></i></span>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="refresh-btn">
                                                <a href=""><span><i class="fa fa-refresh"
                                                            aria-hidden="true"></i></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive rounded-2">
                                <table class="table customize-table mb-0 align-middle bg_tbody">
                                    <thead class="text-white fs-4 bg_blue">
                                        <tr>
                                            <th>ID</th>

                                            <th class="sorting" data-sorting_type="voucher_number"
                                                data-column_name="voucher_number" style="cursor: pointer">Voucher
                                                Number<span id="voucher_number_icon"><i
                                                        class="fa fa-arrow-down"></i></span> </th>
                                            <th class="sorting" data-sorting_type="vdate"
                                                data-column_name="voucher_date" style="cursor: pointer">Voucher
                                                Type<span id="voucher_date_icon"><i class="fa fa-arrow-down"></i></span>
                                            </th>
                                            <th class="sorting" data-sorting_type="code" data-column_name="code"
                                                style="cursor: pointer">Voucher Date </th>
                                            
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody class="tbody_height_scroll">
                                        @include('inventory.conversion-vouchers.table')
                                    </tbody>
                                    {{-- <tbody></tbody> --}}
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
                    text: "To delete this Conversion Voucher!",
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

            function fetch_data(page, sort_type, sort_by, query, date_entry) {
                $.ajax({
                    url: "{{ route('conversion-vouchers.fetch-data') }}",
                    data: {
                        page: page,
                        sortby: sort_by,
                        sorttype: sort_type,
                        query: query,
                        date_entry: date_entry
                    },
                    success: function(data) {
                        $('tbody').html(data.data);
                    }
                });
            }

            function getFilters() {
                return {
                    query: $('#search').val(),
                    column_name: $('#hidden_column_name').val(),
                    sort_type: $('#hidden_sort_type').val(),
                    page: $('#hidden_page').val(),
                    date_entry: $('.date-entry').val()
                };
            }

            function applyFilters() {
                var filters = getFilters();
                fetch_data(filters.page, filters.sort_type, filters.column_name, filters.query,
                    filters.date_entry);
            }

            $('#search').on('keyup', function() {
                $('#hidden_page').val(1); // Reset to first page
                applyFilters();
            });

            $('.date-entry').on('change', function() {
                $('#hidden_page').val(1); // Reset to first page
                applyFilters();
            });


            // $(document).on('keyup', '#search', function() {
            //     var query = $('#search').val();
            //     var column_name = $('#hidden_column_name').val();
            //     var sort_type = $('#hidden_sort_type').val();
            //     var page = $('#hidden_page').val();
            //     var date_entry = $('.date-entry').val();
            //     fetch_data(page, sort_type, column_name, query);
            // });

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
                var date_entry = $('.date-entry').val();
                fetch_data(page, reverse_order, column_name, query, date_entry);
            });

            $(document).on('click', '.pagination a', function(event) {
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                $('#hidden_page').val(page);
                var column_name = $('#hidden_column_name').val();
                var sort_type = $('#hidden_sort_type').val();
                var date_entry = $('.date-entry').val();
                var query = $('#search').val();

                $('li').removeClass('active');
                $(this).parent().addClass('active');
                fetch_data(page, sort_type, column_name, query, date_entry);
            });

        });
</script>
<script>
    $(document).ready(function() {
            $('#conversion-vouchers-create-form').submit(function(e) {
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
                        $('.text-danger').html('');

                        // Check if the response contains errors
                        if (xhr.responseJSON && xhr.responseJSON.error) {
                            // If there is an error message in the response, display it
                            $('.text-danger').html(xhr.responseJSON.error);
                        } else {
                            // If there are field-specific errors, display them next to the respective fields
                            var errors = xhr.responseJSON.errors;
                            $.each(errors, function(key, value) {
                                $('[name="' + key + '"]').next('.text-danger').html(value[0]);
                            });
                        }
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
            $(document).on('submit', '#conversion-vouchers-edit-form', function(e) {
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
    $(document).ready(function () {
            $('#item_code_id').change(function(){
                var selectedValue = $(this).find(':selected');
                var quantity = selectedValue.data('hidden-value');
                // var quantityDiv = $('#quantity');
                
                var quantityDivSelectBox = [];

                for (var i = 1; i <= quantity; i++) {
                    quantityDivSelectBox.push('<option value="' + i + '">' + i + '</option>');
                }

                $('#quantity').empty();
                $('#quantity').append(quantityDivSelectBox.join(''));
                
            });
        });
</script>

<script>
    $(document).ready(function() {
            $('.print-route').on('click', function() {
                var id = $(this).data('id');

                $.ajax({
                    url: "{{ route('reports.conversion-voucher')}}",
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: id
                    },
                    xhrFields: {
                        responseType: 'blob' // Important for handling binary data
                    },
                    success: function(blob) {
                        // alert('Success');
                        var url = window.URL.createObjectURL(blob);
                        var a = document.createElement('a');
                        a.href = url;
                        a.download = 'conversion-voucher' + id + '.pdf';
                        document.body.appendChild(a);
                        a.click();
                        window.URL.revokeObjectURL(url);
                    },
                    error: function(xhr, status, error) {
                        console.error('There was an error with your request:', error);
                    }
                });
            });
        });
</script>

<script>
    $(document).on('change', '#inv_no_1', function() {
            var inv_no = $(this).val();
            $('#item_code_id').prop('disabled', false);
            $('.inv_no').each(function() {
                $(this).val(inv_no);
            });

            $.ajax({
                url: "{{ route('debit-vouchers.get-items-by-inv-no')}}",
                type: 'POST',
                data: {
                    inv_no: inv_no,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    // console.log(response.creditVouchers[0]);
                    // add options to select box
                    var options = '<option value="">Select Item</option>';
                    $.each(response.creditVouchers, function(index, creditVoucher) {
                        console.log(creditVoucher);
                        var itemCode = creditVoucher.item_codes.code;
                        var itemCodeId = creditVoucher.item_code_id;
                        var totalQuantity = creditVoucher.total_quantity;
                        
                        options += `<option value="${itemCodeId}" data-hidden-value="${totalQuantity}">${itemCode}(${totalQuantity})</option>`;
                    });
                    $('#item_code_id').html(options);
                    $('.item_code_id').html(options);
                },
                error: function(xhr) {
                    console.log(xhr);
                }
            });
        });
</script>


<script>
    // add new row
        $(document).ready(function() {
            $(document).on('click', '.add-more-conv', function() {
                var tr = $('#conv_new_html').html();
                $('#conv_form_add_new_row').append(tr);

                return false;   
            });

            $(document).on('click', '.trash', function() {
                $(this).closest('.new_html').remove();
                return false;
            });
        });
</script>

<script>
    $(document).on('change', '#strike_item_code', function() {
        var item_id = $('#strike_item_code').val();
        var selectedValue = $(this).find(':selected');
        
        $.ajax({
            url: "{{ route('conversions.item.details') }}",
            type: 'GET',
            data: {
                item_id: item_id
            },
            success: function(response) {
                $('#strike_c_nc').val(response.item_details.item_type);
                $('#strike_description').val(response.item_details.description);
                $('#strike_rate').val(response.item_details.item_price);
                $('#strike_ledger').val(response.inventory_number.inventory_number.number);

                var quantityDivSelectBox = [];
                quantityDivSelectBox.push('<option value="">Select Quantity</option>');
                for (var i = 1; i <= response.quantity; i++) {
                    quantityDivSelectBox.push('<option value="' + i + '">' + i + '</option>');
                }

                $('#strike_quantity').empty();
                $('#strike_quantity').append(quantityDivSelectBox.join(''));
            },
            error: function(xhr) {
                console.log(xhr);
            }
        });
    });
</script>

<script>
    $(document).on('change', '#brought_item_code', function() {
        var item_id = $('#brought_item_code').val();
        var selectedValue = $(this).find(':selected');
        
        $.ajax({
            url: "{{ route('conversions.item.details') }}",
            type: 'GET',
            data: {
                item_id: item_id
            },
            success: function(response) {
                $('#brought_c_nc').val(response.item_details.item_type);
                $('#brought_description').val(response.item_details.description);
                $('#brought_rate').val(response.item_details.item_price);
                $('#brought_ledger').val(response.inventory_number.inventory_number.number);

                var quantityDivSelectBox = [];
                quantityDivSelectBox.push('<option value="">Select Quantity</option>');
                for (var i = 1; i <= response.quantity; i++) {
                    quantityDivSelectBox.push('<option value="' + i + '">' + i + '</option>');
                }

                $('#brought_quantity').empty();
                $('#brought_quantity').append(quantityDivSelectBox.join(''));
            },
            error: function(xhr) {
                console.log(xhr);
            }
        });
    });
</script>

<script>
    $(document).ready(function(){
        $('#strike_quantity').change(function(){
            var quantity = $(this).val();
            var item_unit_price = $('#strike_rate').val() ?? 0;
            var total_price = quantity * item_unit_price;
            $('#strike_total_rate').val(total_price);
        });
    });

</script>

<script>
    $(document).ready(function(){
        $('#brought_quantity').change(function(){
            var quantity = $(this).val();
            var item_unit_price = $('#brought_rate').val() ?? 0;
            var total_price = quantity * item_unit_price;
            $('#brought_total_rate').val(total_price);
        });
    });

</script>

<script>
    $(document).ready(function() {
    // On change of strike_item_code
    $(document).on('change', '.strike_item_code', function() {
        var item_id = $(this).val();
        var $this = $(this); 
        var selectedOption = $this.find('option:selected');
        var $row = $this.closest('.count-class'); // Get the closest row

        // AJAX call to get item details
        $.ajax({
            url: "{{ route('conversions.item.details') }}",
            type: 'GET',
            data: {
                item_id: item_id,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                // Set values in the respective fields within the current row
                $row.find('.strike_c_nc').val(response.item_details.item_type);
                $row.find('.strike_description').val(response.item_details.description);
                $row.find('.strike_more_rate').val(response.item_details.item_price);
                $row.find('.strike_ledger').val(response.inventory_number.inventory_number.number);

                // Populate quantity select box
                var quantityDivSelectBox = [];
                quantityDivSelectBox.push('<option value="">Select Quantity</option>');
                for (var i = 1; i <= response.quantity; i++) {
                    quantityDivSelectBox.push('<option value="' + i + '">' + i + '</option>');
                }

                $row.find('.strike_more_quantity').empty();
                $row.find('.strike_more_quantity').append(quantityDivSelectBox.join(''));
            },
            error: function(xhr) {
                console.log(xhr);
            }
        });
    });

    // On change of strike_more_quantity
    $(document).on('change', '.strike_more_quantity', function() {
        var quantity = $(this).val();
        var $row = $(this).closest('.count-class'); // Get the closest row again
        var item_unit_price = $row.find('.strike_more_rate').val() ?? 0;
        var total_price = quantity * item_unit_price;
        $row.find('.strike_total_rate').val(total_price);
    });
});

</script>

<script>
    $(document).ready(function() {
    // On change of strike_item_code
    $(document).on('change', '.brought_item_code', function() {
        var item_id = $(this).val();
        var $this = $(this); 
        var selectedOption = $this.find('option:selected');
        var $row = $this.closest('.count-class'); // Get the closest row

        // AJAX call to get item details
        $.ajax({
            url: "{{ route('conversions.item.details') }}",
            type: 'GET',
            data: {
                item_id: item_id,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                // Set values in the respective fields within the current row
                $row.find('.brought_c_nc').val(response.item_details.item_type);
                $row.find('.brought_description').val(response.item_details.description);
                $row.find('.brought_rate').val(response.item_details.item_price);
                $row.find('.brought_ledger').val(response.inventory_number.inventory_number.number);

                // Populate quantity select box
                var quantityDivSelectBox = [];
                quantityDivSelectBox.push('<option value="">Select Quantity</option>');
                for (var i = 1; i <= response.quantity; i++) {
                    quantityDivSelectBox.push('<option value="' + i + '">' + i + '</option>');
                }

                $row.find('.brought_more_quantity').empty();
                $row.find('.brought_more_quantity').append(quantityDivSelectBox.join(''));
            },
            error: function(xhr) {
                console.log(xhr);
            }
        });
    });

    // On change of strike_more_quantity
    $(document).on('change', '.brought_more_quantity', function() {
        var quantity = $(this).val();
        var $row = $(this).closest('.count-class'); // Get the closest row again
        var item_unit_price = $row.find('.brought_rate').val() ?? 0;
        var total_price = quantity * item_unit_price;
        $row.find('.brought_total_rate').val(total_price);
    });
});

</script>


@endpush