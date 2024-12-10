@extends('inventory.layouts.master')
@section('title')
    Gate Pass List
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
                    <h3>Gate Pass Listing</h3>
                    <ul class="breadcome-menu mb-0">
                        <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                        <li><span class="bread-blod">Gate Pass Listing</span></li>
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
                            @include('inventory.gate-passes.form')
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
                                                <th>SL No.</th>
                                                <th class="sorting" data-sorting_type="desc" data-column_name="gate_pass_no"
                                                    style="cursor: pointer">Gate Pass No. <span id="gate_pass_no_icon"><i
                                                            class="fa fa-arrow-down"></i></span> </th>
                                                <th class="sorting" data-sorting_type="desc" data-column_name="gate_pass_date"
                                                    style="cursor: pointer">Gate Pass Date <span id="gate_pass_date_icon"><i
                                                            class="fa fa-arrow-down"></i></span> </th>
                                                {{-- <th>Code</th> --}}
                                                <th>Gate Pass Type </th>
                                                
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody class="tbody_height_scroll">
                                            @include('inventory.gate-passes.table')
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
                    text: "To delete this Inventory Project!",
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
                    url: "{{ route('gate-passes.fetch-data') }}",
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
            $('#gate-pass-create-form').submit(function(e) {
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
            $(document).on('submit', '#gate-pass-edit-form', function(e) {
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

<script>

    $(document).ready(function () {
        $('#consignee').change(function(){
            var consignee = $('#consignee').val();
            if(consignee == '0')
            {
                $('.consignee_other_name').show();
                $('.consignee_other_number').show();
            }else{
                $('.consignee_other_name').hide();
                $('.consignee_other_number').hide();
            }    
        });
    });

</script>

<script>
    // add new row
        $(document).ready(function() {
            $(document).on('click', '.add-more-gate-pass', function() {
                var tr = $('#gate_pass_new_html').html();
                $('#credit_form_add_new_row').append(tr);
                return false;   
            });

            $(document).on('click', '.trash', function() {
                $(this).closest('.new_html').remove();
                return false;
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

<script>
    $(document).on('keyup', '#received_quantity, #unit_cost', function() {
        let receivedQuantity = parseFloat($('#received_quantity').val()) || 0;
        let unitCost = parseFloat($('#unit_cost').val()) || 0;
        let total = receivedQuantity * unitCost;
        $('#total_amount').val(total.toFixed(2));
    });

</script>

<script>
       
    $(document).ready(function() {
        function calculateTotalCost($row) {
            var received = parseFloat($row.find('.rcv_quantity').val()) || 0;
            var unitCost = parseFloat($row.find('.unit_price').val()) || 0;
            var totalCost = received * unitCost;
            $row.find('.total_cost').val(totalCost.toFixed(2));
        }

        $(document).on('input', '.rcv_quantity, .unit_price', function() {
            var $row = $(this).closest('.count-class'); 
            calculateTotalCost($row); 
        });
    });
</script>


<script>
    $(document).ready(function() {
        $(document).on('change', '.item_id', function() {
            var item_code_id = $(this).val();
            var $this = $(this); 
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
                    $row.find('.unit_price').val(response.price);
                },
                error: function(xhr) {
                    console.log(xhr);
                }
            });
        });

    });
    </script>

    <script>
    $(document).ready(function() {
        $('#pass_type').change(function(){
            var pass_type = $('#pass_type').val(); 
            if(pass_type == 'non-returnable')
            {
                $('.eiv_div').show();
            }else{
                $('.eiv_div').hide();
            }
        });
    });
        </script>
@endpush
