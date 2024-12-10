@extends('inventory.layouts.master')
@section('title')
Credit Vouchers
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
                <h3>Credit Vouchers</h3>
                <ul class="breadcome-menu mb-0">
                    <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                    <li><span class="bread-blod">Credit Vouchers</span></li>
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
                        @include('inventory.credit-vouchers.form')
                    </div>
                    <hr />
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
                                            {{-- <th class="sorting" data-sorting_type="desc" data-column_name="code"
                                                style="cursor: pointer">Item Code <span id="code_icon"></span> </th> --}}
                                            <th class="sorting" data-sorting_type="desc" data-column_name="voucher_no"
                                                style="cursor: pointer">Voucher Number<span id="voucher_no_icon"><i
                                                        class="fa fa-arrow-down"></i></span> </th>
                                            <th class="sorting" data-sorting_type="desc" data-column_name="voucher_date"
                                                style="cursor: pointer">Voucher Date<span id="voucher_date_icon"><i
                                                        class="fa fa-arrow-down"></i></span> </th>
                                            {{-- <th class="sorting" data-sorting_type="desc" data-column_name="inv_no"
                                                style="cursor: pointer">Rin No.<span id="inv_no_icon"></span> </th> --}}

                                            {{-- <th class="sorting" data-sorting_type="desc" data-column_name="price"
                                                style="cursor: pointer">Price <span id="price_icon"><i
                                                        class="fa fa-arrow-down"></i></span> </th>
                                            <th class="sorting" data-sorting_type="desc" data-column_name="quantity"
                                                style="cursor: pointer">Quantity<span id="quantity_icon"><i
                                                        class="fa fa-arrow-down"></i></span> </th> --}}
                                            {{-- <th class="sorting" data-sorting_type="sono" data-column_name="sono"
                                                style="cursor: pointer">Supply Order No. <span id="sono_icon"><i
                                                        class="fa fa-arrow-down"></i></span> </th>
                                            <th class="sorting" data-sorting_type="rin" data-column_name="rin"
                                                style="cursor: pointer">Receipt & Inspection Note<span id="rin_icon"><i
                                                        class="fa fa-arrow-down"></i></span> </th> --}}
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody class="tbody_height_scroll">
                                        @include('inventory.credit-vouchers.table')
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
                    url: "{{ route('credit-vouchers.fetch-data') }}",
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
            $('#credit-vouchers-create-form').submit(function(e) {
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
            $(document).on('submit', '#credit-vouchers-edit-form', function(e) {
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
    function getItemDetails(getval) {
            var item_code_id = $(getval).val();
            // alert(item_code_id);

            $.ajax({ 
                url: "{{ route('credit-vouchers.get-item-type')}}",
                type: 'POST',
                data: {
                    item_code_id: item_code_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    console.log(response);
                    // $('#item_type').val(response.item_type);
                    // $('#description').val(response.description);
                    // $('#uom').val(response.uom);


                    var $row = $(getval).closest('.count-class');
                    $row.find('#item_type').val(response.item_type);
                    $row.find('#description').val(response.description);
                    $row.find('#uom').val(response.uom);
                    $row.find('#uom_id').val(response.uom_id);
                },
                error: function(xhr) {
                    console.log(xhr);
                }
            });
        }
        // $(document).ready(function(){
        //     $('.item-code').change(function() {
        //         var item_code_id = $(this).val();
        //         alert(item_code_id);
        //         $.ajax({ 
        //             url: "{{ route('credit-vouchers.get-item-type')}}",
        //             type: 'POST',
        //             data: {
        //                 item_code_id: item_code_id,
        //                 _token: '{{ csrf_token() }}'
        //             },
        //             success: function(response) {
        //                 $('#item_type').val(response.item_type);
        //                 $('#description').val(response.description);
        //                 $('#uom').val(response.uom);
        //             },
        //             error: function(xhr) {
        //                 console.log(xhr);
        //             }
        //         });
        //     });
            
        // });
</script>

<script>
    // function getInvDetail(getval) {

    //     // alert(getval);
    //     var selectedValue = $(getval).find(':selected');
    //     var inv_type = selectedValue.data('hidden-value');
    //     // Find the closest parent .row that wraps the form elements to limit the scope of searching
    //     var $row = $(getval).closest('.row');
        
    //     // Select the divs with classes
    //     var memberDiv = $row.find('.member_div');
    //     var projectDiv = $row.find('.project_div');
    
    //     // Show or hide based on the selected inventory type
    //     if (inv_type === 'Individual') {
    //         memberDiv.prop('hidden', false); // Show member div
    //         projectDiv.prop('hidden', true);  // Hide project div
    //     } else if (inv_type === 'Project') {
    //         memberDiv.prop('hidden', true);  // Hide member div
    //         projectDiv.prop('hidden', false); // Show project div
    //     } else {
    //         memberDiv.prop('hidden', true);  // Hide both if neither condition is met
    //         projectDiv.prop('hidden', true);
    //     }
    // }

        $(document).ready(function () {
            $('#inv_no').change(function(){
                var selectedValue = $(this).find(':selected');
                var inv_type = selectedValue.data('hidden-value');
                var memberDiv = $('#member_div');
                var projectDiv = $('#project_div');
                
                if (inv_type === 'Individual') {
                    memberDiv.prop('hidden', false); // Show member div
                    projectDiv.prop('hidden', true);  // Hide project div
                } else if (inv_type === 'Project') {
                    memberDiv.prop('hidden', true);  // Hide member div
                    projectDiv.prop('hidden', false); // Show project div
                } else {
                    memberDiv.prop('hidden', true);  // Hide both if neither condition is met
                    projectDiv.prop('hidden', true);
                }
            });
        });
</script>

<script>
    $(document).ready(function(){
            // Function to update difference
            function updateTotalPrice(inputElement) {
                var $row = $(inputElement).closest('.count-class');
                // var price = parseInt($('#price').val());
                // var tax = parseInt($('#tax').val());
                // var total_price = price + (price * tax / 100);
                // $('#total_price').val(total_price);
                var price = parseInt($row.find('.price').val()) || 0;
                // var tax = parseInt($row.find('.tax').val()) || 0;
                // var tax_amt = price * tax / 100;
                var disc_percent = parseInt($row.find('.disc_percent').val()) || 0; 
                var disc_amt = price * disc_percent / 100;
                // var gst_percent = parseInt($row.find('.gst_percent').val()) || 0;
                // var gst_amount = price * gst_percent / 100;
                // var actual_price = price + tax_amt;
                var discounted_price = price - disc_amt;
                // var actual_price_gst = actual_price + gst_amount;
                // var discounted_price_gst = discounted_price + gst_amount;
                // $row.find('.tax_amt').val(tax_amt);
                // $row.find('.gst_amt').val(gst_amount);
                if(disc_amt == 0) {
                    $row.find('.disc_amt').val(0);
                    $row.find('.total_price').val(price);
                } else {
                    $row.find('.disc_amt').val(disc_amt);
                    $row.find('.total_price').val(discounted_price);
                }
            }
        
            // Bind change event to input fields
            $(document).on('keyup', '.price, .disc_percent', function() {
                updateTotalPrice(this);
            });

        });
</script>

<script>
    $(document).ready(function(){
            $(document).on('keyup','#edit_tax, #edit_price', function(){
                console.log('Keyup event fired');
                // Your updateEditDifference() function logic here
                var price = parseInt($('#edit_price').val());
                var tax = parseInt($('#edit_tax').val());
                var total_price = price + (price * tax / 100);
                $('#edit_total_price').val(total_price);
            });
        });
</script>
<script>
    // add new row
        $(document).ready(function() {
            $(document).on('click', '#add-row', function() {
                var tr = $('#credit_new_html').html();
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
    $(document).on('change', '#voucher_date_1', function() {
            var voucher_date = $(this).val();
            // alert(voucher_date);
            $('.voucher-date').each(function() {
                $(this).val(voucher_date);
            });
        })    
</script>
<script>
    $(document).on('change', '#rin1', function() {
            var rin = $(this).val();
            // alert(voucher_date);
            $('.rin').each(function() {
                $(this).val(rin);
            });
        })    
</script>
<script>
    $(document).ready(function() {
            $('.print-route').on('click', function() {
                var id = $(this).data('id');

                $.ajax({
                    url: "{{ route('reports.credit-voucher')}}",
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
                        a.download = 'credit-voucher-' + id + '.pdf'; 
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
    // rin[] onchange event
        $(document).on('change', '.rin', function() {
            var rin = $(this).val();
            var $row = $(this).closest('.count-class');
            $.ajax({
                url: "{{ route('credit-vouchers.get-rin-details')}}",
                type: 'POST',
                data: {
                    rin: rin,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                  $('#receipt-and-inspection').html(response.view);

                },
                error: function(xhr) {
                    console.log(xhr);
                }
            });
        });
</script>
@endpush
