@extends('frontend.layouts.master')
@section('title')
    Payslip Report Generate
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
                <div class="arrow_left"><a href="{{ route('members.index') }}" class="text-white"><i
                            class="ti ti-arrow-left"></i></a></div>
                <div class="">
                    <h3>Report Generate</h3>
                    <ul class="breadcome-menu mb-0">
                        <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                        <li><span class="bread-blod">Payslip</span></li>
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
                            <form action="{{ route('reports.payslip-generate') }}" method="POST" >
                                @csrf

                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="form-group col-md-4 mb-2">
                                                <div class="col-md-12">
                                                    <label>Report Type</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <select name="report_type" class="form-select" id="report_type">
                                                        <option value="">Select Type</option>
                                                        <option value="individual">Individual</option>
                                                        <option value="group">Group</option>
                                                    </select>
                                                    @if ($errors->has('report_type'))
                                                        <div class="error" style="color:red;">
                                                            {{ $errors->first('report_type') }}</div>
                                                    @endif
                                                    
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4 mb-2 emp_status" style="display:none;">
                                                <div class="col-md-12">
                                                    <label>Employee Status</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <select name="e_status" class="form-select" id="e_status">
                                                        <option value="">Select Employee Status</option>
                                                        <option value="active">Active</option>
                                                        <option value="deputation">On Deputation</option>
                                                    </select>
                                                    @if ($errors->has('e_status'))
                                                        <div class="error" style="color:red;">
                                                            {{ $errors->first('e_status') }}</div>
                                                    @endif
                                                    
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4 mb-2 member_list" style="display:none;">
                                                <div class="col-md-12">
                                                    <label>Members</label>
                                                </div>
                                                <div class="col-md-12" id="your-div-id">
                                                    <select name="member_id" class="form-select search-select-box" id="member_id">
                                                        
                                                    </select>
                                                    @if ($errors->has('member_id'))
                                                        <div class="error" style="color:red;">
                                                            {{ $errors->first('member_id') }}</div>
                                                    @endif

                                                </div>
                                            </div>

                                            <div class="form-group col-md-4 mb-2 ">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <label>Year</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <select name="year" class="form-select" id="report_year">
                                                            <option value="">Select Year</option>
                                                            @for ($i = date('Y'); $i >= 1950; $i--)
                                                                <option value="{{ $i }}">
                                                                    {{ $i }}</option>
                                                            @endfor
                                                        </select>
                                                        @if ($errors->has('year'))
                                                            <div class="error" style="color:red;">
                                                                {{ $errors->first('year') }}</div>
                                                        @endif
                                                        
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4 mb-2">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <label>Month</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <select name="month" class="form-select" id="report_month">
                                                            <option value="">Select Month</option>
                                                        </select>
                                                        @if ($errors->has('month'))
                                                            <div class="error" style="color:red;">
                                                                {{ $errors->first('month') }}</div>
                                                        @endif
                                                        
                                                    </div>
                                                </div>
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                         <label></label>   
                                        <div class="form-group col-md-12 mb-2">
                                            <button type="submit" class="listing_add">Generate</button>
                                        </div>
                                        
                                        {{-- <div class="form-group col-md-12 mb-2">
                                            <button type="submit" class="listing_exit">Cancel</button>
                                        </div> --}}
                                    </div>
                                </div>
                               
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{-- <script>
        $(document).ready(function() {
            $('#payslip-generate-form').submit(function(e) {
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
    </script> --}}
    <script>
        $(document).ready(function() {
            $('#report_year').change(function() {
                var year = $(this).val();
                var currentDate = new Date();
                var monthDropdown = $('#report_month');

                if(year == currentDate.getFullYear()) {
                    var currentMonth = currentDate.getMonth() + 1;
                    var endMonth = (year == currentDate.getFullYear()) ? currentMonth : 12;

                    monthDropdown.empty();
                    for (var month = 1; month <= endMonth; month++) {
                        var option = $('<option></option>');
                        option.val(month);
                        option.text(new Date(year, month - 1).toLocaleString('default', { month: 'long' }));
                        monthDropdown.append(option);
                    }

                } else {
                    monthDropdown.empty();
                    for (var month = 1; month <= 12; month++) {
                        var option = $('<option></option>');
                        option.val(month);
                        option.text(new Date(year, month - 1).toLocaleString('default', { month: 'long' }));
                        monthDropdown.append(option);
                    }
                }
                
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#e_status').change(function() {
                var e_status = $(this).val();

                $.ajax({
                    url: "{{ route('reports.get-all-members') }}",
                    type: 'POST',
                    data: { e_status, _token: '{{ csrf_token() }}' },
                    
                    
                    success: ({ members }) => {
                        // Reference the existing select element
                        const memberDropdown = $('#member_id');
                        memberDropdown.empty();
                        memberDropdown.append('<option value="">Select Member</option>');
                        members.forEach(({ id, name, emp_id }) => {
                            memberDropdown.append(`<option value="${id}">${name} (${emp_id})</option>`);
                        });

                        var select_box_element = document.querySelector('.search-select-box');
                        dselect(select_box_element, {
                            search: true
                        });
                    },

                    error: (xhr) => console.log(xhr)
                });
            });
        });
    </script>

<script>
    // report_type change event
    $(document).ready(function() {
        $('#report_type').change(function() {
            var report_type = $(this).val();
            if(report_type == 'group'){
            //     $('.cat_drop').show();
                $('.emp_status').hide();
                $('.member_list').hide();
            //     $('#children_list').hide();

            }else{
            //     $('.cat_drop').hide();
                $('.emp_status').show();
                $('.member_list').show();

            }
        });
    });

</script>

{{-- <script>
    var select_box_element = document.querySelector('.search-select-box');
    dselect(select_box_element, {
        search: true
    });
</script> --}}


@endpush
