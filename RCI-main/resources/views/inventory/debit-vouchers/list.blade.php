@extends('inventory.layouts.master')
@section('title')
   Debit Vouchers
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
                    <h3>Debit Vouchers</h3>
                    <ul class="breadcome-menu mb-0">
                        <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                        <li><span class="bread-blod">Debit Vouchers</span></li>
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
                            @include('inventory.debit-vouchers.form')
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-4 mt-4">
                                <div class="row justify-content-end">
                                    <div class="col-md-5 col-lg-2 mb-2 mt-4">
                                        <div class="position-relative">
                                            <input type="date" class="form-control search_table ps-3 date-entry"
                                                id="">
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
                                                    <a href=""><span><i class="fa fa-refresh" aria-hidden="true"></i></span></a>
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
                                                <th class="sorting" data-sorting_type="desc" data-column_name="voucher_no"
                                                style="cursor: pointer">Voucher Number<span id="voucher_no_icon"><i
                                                        class="fa fa-arrow-down"></i></span> </th>
                                                <th class="sorting" data-sorting_type="desc" data-column_name="voucher_date"
                                                    style="cursor: pointer">Voucher Date<span id="voucher_date_icon"><i
                                                        class="fa fa-arrow-down"></i></span> </th>
                                                <th class="sorting" data-sorting_type="desc" data-column_name="voucher_type"
                                                    style="cursor: pointer">Voucher Type<span id="voucher_type_icon"><i
                                                        class="fa fa-arrow-down"></i></span> </th>
                                                <th class="sorting"  data-column_name="inv_no"
                                                    style="cursor: pointer">Inv. No.<span id="inv_no_icon"></span> </th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody class="tbody_height_scroll">
                                            @include('inventory.debit-vouchers.table')
                                        </tbody>
                                        {{-- <tbody></tbody> --}}
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
                    text: "To delete this Items!",
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
                    url: "{{ route('debit-vouchers.fetch-data') }}",
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

            $(document).on('keyup', '#search', function() {
                var query = $('#search').val();
                var column_name = $('#hidden_column_name').val();
                var sort_type = $('#hidden_sort_type').val();
                var page = $('#hidden_page').val();
                var date_entry = $('.date-entry').val();
                fetch_data(page, sort_type, column_name, query, date_entry);
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
                var date_entry = $('.date-entry').val();
                fetch_data(page, reverse_order, column_name, query, date_entry);
            });

            $(document).on('click', '.pagination a', function(event) {
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                $('#hidden_page').val(page);
                var column_name = $('#hidden_column_name').val();
                var sort_type = $('#hidden_sort_type').val();

                var query = $('#search').val();
                var date_entry = $('.date-entry').val();

                $('li').removeClass('active');
                $(this).parent().addClass('active');
                fetch_data(page, sort_type, column_name, query, date_entry);
            });

        });
    </script>
    <script>
        $(document).ready(function() {
            $('#debit-vouchers-create-form').submit(function(e) {
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
            $(document).on('submit', '#debit-vouchers-edit-form', function(e) {
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
                            // $('#' + key + '-error').html(value[0]);
                            $('[name="' + key + '"]').next('.text-danger').html(value[
                                0]);
                        });
                    }
                });
            });
        });
    </script>
    {{-- <script>
        $(document).ready(function(){
            $('#item_code_id').change(function() {
                var item_code_id = $(this).val();
                $.ajax({ 
                    url: "{{ route('debit-vouchers.get-item-quantity')}}",
                    type: 'POST',
                    data: {
                        item_code_id: item_code_id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        // $('#quantity_no').val(parseInt(response.quantity));
                        var quantity = parseInt(response.quantity);
                        var text = `Quantity should be less than or equal to ${quantity}`; // Using template literals for string interpolation
                        $('#quantity_no').text(text);
                    },
                    error: function(xhr) {
                        console.log(xhr);
                    }
                 });
            });
        });
    </script> --}}

    <script>
        $(document).ready(function () {
            $('#item_code_id_1').change(function(){
                var selectedValue = $(this).find(':selected');
                var quantity = selectedValue.data('hidden-value');
                var itemType = selectedValue.data('item-type');
                var itemDescription = selectedValue.data('item_desc');
                // var quantityDiv = $('#quantity');
                
                var quantityDivSelectBox = [];

                for (var i = 1; i <= quantity; i++) {
                    quantityDivSelectBox.push('<option value="' + i + '">' + i + '</option>');
                }

                $('#quantity').empty();
                $('#quantity').append(quantityDivSelectBox.join(''));

                if (itemType) {
                    $('#item_type_1').val(itemType);
                    
                }
                if (itemDescription) {
                    $('#item_desc_1').val(itemDescription);
                }
                
            });
        });
    </script>
    <script>
        function getQuantity(getval) {
            // var itemCodeId = $(getval).val();
            var selectedValue = $(getval).find(':selected');
            var quantity = selectedValue.data('hidden-value');
            var itemType = selectedValue.data('item-type');
            var itemDescription = selectedValue.data('item_desc');
            
            
            var quantityDivSelectBox = [];

            for (var i = 1; i <= quantity; i++) {
                quantityDivSelectBox.push('<option value="' + i + '">' + i + '</option>');
            }

            var $row = $(getval).closest('.count-class');
            $row.find('#quantity').empty();
            $row.find('#quantity').append(quantityDivSelectBox.join(''));

            $row.find('#item_type').val(itemType);
            $row.find('#item_desc').val(itemDescription);

            // $('#quantity').empty();
            // $('#quantity').append(quantityDivSelectBox.join(''));
        }
    </script>
    <script>
        // add new row
        $(document).ready(function() {
            $(document).on('click', '#add-row', function() {
                var tr = $('#debit_new_html').html();
                $('#debit_form_add_new_row').append(tr);

                if($('#voucher_date_1').val() != '') {
                    $('.voucher-date').each(function() {
                        $(this).val($('#voucher_date_1').val());
                    });
                }
                if ($('#inv_no_1').val() != '') {
                    var inv_no = $('#inv_no_1').val();
                    
                    // Set the value for each .inv_no element
                    $('.inv_no').each(function() {
                        $(this).val(inv_no);
                    });
                    
                    // Enable the item code input
                   $('#item_code_id').prop('disabled', false);

                    // Make the AJAX call
                    $.ajax({
                        url: "{{ route('debit-vouchers.get-items-by-inv-no') }}",
                        type: 'POST',
                        data: {
                            inv_no: inv_no,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            var options = '<option value="">Select Item</option>';
                            $.each(response.creditVouchers, function(index, creditVoucher) {
                                var itemCode = creditVoucher.item_codes.code;
                                var itemCodeId = creditVoucher.item_code_id;
                                var totalQuantity = creditVoucher.total_quantity;
                                
                                options += `<option value="${itemCodeId}" data-hidden-value="${totalQuantity}" >${itemCode}(${totalQuantity})</option>`;
                            });
                            var $row = $(this).closest('.count-class');
                            $row.find('#item_code_id').html(options);
                            // $('.item_code_id').html(options);
                        },
                        error: function(xhr) {
                            console.log(xhr);
                        }
                    });
                }
                if($('#voucher_no_1').val() != '') {
                    $('.voucher-no').each(function() {
                        $(this).val($('#voucher_no_1').val());
                    });
                }
                if($('#voucher_type_1').val() != '') {
                    $('.voucher-type').each(function() {
                        $(this).val($('#voucher_type_1').val());
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
        $(document).on('change', '#inv_no_1', function() {
            var inv_no = $(this).val();
           $('#item_code_id_1').prop('disabled', false);
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
                    var itemType = '';  // Initialize itemType outside the loop

                    $.each(response.creditVouchers, function(index, creditVoucher) {
                        console.log(creditVoucher);
                        var itemCode = creditVoucher.item_codes.code;
                        var itemName = creditVoucher.item_codes.item_name;
                        var itemCodeId = creditVoucher.item_code;
                        var totalQuantity = creditVoucher.total_quantity;
                        var itemType = creditVoucher.item_codes.item_type;
                        var itemDescription = creditVoucher.item_codes.description;
                        
                        
                        options += `<option value="${itemCodeId}" data-hidden-value="${totalQuantity}" data-item-type="${itemType}" data-item_desc="${itemDescription}">${itemName}(${totalQuantity})</option>`;
                    });
                    console.log(itemType);
                    $('#item_code_id_1').html(options);
                    $('.item_code_id').html(options);
                    // if (itemType) {
                    //     $('#item_type_1').val(itemType);
                    //     $('.item-type').each(function() {
                    //         $(this).val(itemType);
                    //     });
                    // }
                },
                error: function(xhr) {
                    console.log(xhr);
                }
            });
        });

        $(document).on('keyup', '#voucher_no_1', function() {
            var voucher_no = $(this).val();
            $('.voucher-no').each(function() {
                $(this).val(voucher_no);
            });
        });

        $(document).on('change', '#voucher_date_1', function() {
            var voucher_date = $(this).val();
            $('.voucher-date').each(function() {
                $(this).val(voucher_date);
            });
        });

        // $(document).on('change', '#voucher_type_1', function() {
        //     var voucher_type = $(this).val();
        //     $('.voucher-type').each(function() {
        //         $(this).val(voucher_type);
        //     });
        // });
        function getVoucherType(getval) {
            var selectedValue = $(getval).find(':selected');
            var voucherType = selectedValue.val();
            $('.voucher-type').each(function() {
                $(this).val(voucherType);
            });
        }
    </script>
    <script>
        $(document).ready(function() {
            $('.print-route').on('click', function() {
                var id = $(this).data('id');

                $.ajax({
                    url: "{{ route('reports.debit-voucher')}}",
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
                        // Get current date
                        var currentDate = new Date();
                        var day = String(currentDate.getDate()).padStart(2, '0');
                        var month = String(currentDate.getMonth() + 1).padStart(2, '0'); // Months are zero-based
                        var year = currentDate.getFullYear();

                        // Format the date as 'YYYY-MM-DD'
                        var formattedDate = day + '-' + month + '-' + year ;
                        var url = window.URL.createObjectURL(blob);
                        var a = document.createElement('a');
                        a.href = url;
                        a.download = 'debit-voucher-' + id + '-' + formattedDate + '.pdf';
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
@endpush
