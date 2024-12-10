@extends('frontend.layouts.master')
@section('title')
    Children Allowance Generate
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
                    <h3>Children Allowance Generate</h3>
                    <ul class="breadcome-menu mb-0">
                        <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                        <li><span class="bread-blod">Children Allowance</span></li>
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
                            <form action="{{ route('reports.children-allowance-generate') }}" method="POST" >
                                @csrf

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <div class="form-group col-md-12 mb-2">
                                                    <div class="row align-items-center">

                                                        <div class="form-group col-md-4 mb-2">
                                                            <div class="col-md-12">
                                                                <label>Year</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <select name="year" class="form-select" id="year">
                                                                    <option value="">Select Year</option>
                                                                    @foreach(range(date('Y'), 1958) as $year)
                                                                        <option value="{{ $year }}" >{{ $year }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @if ($errors->has('year'))
                                                                    <div class="error" style="color:red;">
                                                                        {{ $errors->first('year') }}</div>
                                                                @endif
                                                                
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-md-4 mb-2">
                                                            <div class="col-md-12">
                                                                <label>Report Type</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <select name="report_type" class="form-select" id="report_type">
                                                                    <option value="">Select Type</option>
                                                                    <option value="individual">Individual</option>
                                                                    <option value="group">Group(Category)</option>
                                                                </select>
                                                                @if ($errors->has('report_type'))
                                                                    <div class="error" style="color:red;">
                                                                        {{ $errors->first('report_type') }}</div>
                                                                @endif
                                                                
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-md-4 mb-2 cat_drop" style="display:none;">
                                                            <div class="col-md-12">
                                                                <label>Category</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <select name="category" class="form-select" id="category">
                                                                    @foreach($categories as $category)
                                                                        <option value="{{ $category->id }}">{{ $category->category }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @if ($errors->has('category'))
                                                                    <div class="error" style="color:red;">
                                                                        {{ $errors->first('category') }}</div>
                                                                @endif
                                                                
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group col-md-4 mb-2 emp_status">
                                                            <div class="col-md-12">
                                                                <label>Employee Status</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <select name="e_status" class="form-select" id="e_status">
                                                                    <option value="">Select Employee Status</option>
                                                                    <option value="active">Active</option>
                                                                    <option value="deputation">On Deputation</option>
                                                                </select>
                                                                <span id="e_status-error" class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-4 mb-2 member">
                                                            <div class="col-md-12">
                                                                <label>Members</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <select name="member_id" class="form-select search-select-box" id="member_id">
                                                                </select>
                                                                <span id="member_id-error" class="text-danger"></span>
                                                                
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-md-4 mb-2 type-select" >
                                                            <div class="col-md-12">
                                                                <label>A/c Officer Sign</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <select name="accountant" class="form-select" id="accountant">
                                                                    <option value="">Select </option>
                                                                    @foreach($accountants as $accountant)
                                                                        <option value="{{ $accountant->user_name }}">{{ $accountant->user_name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        {{-- <div class="form-group col-md-3 mb-2 type-select" >
                                                            <div class="col-md-12">
                                                                <label>Type</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <select name="type" class="form-select" id="type">
                                                                    <option value="">Select Type</option>
                                                                    <option value="education">Education</option>
                                                                    <option value="hostel">Hostel</option>
                                                                </select>
                                                                @if ($errors->has('type'))
                                                                    <div class="error" style="color:red;">
                                                                        {{ $errors->first('type') }}</div>
                                                                @endif
                                                                
                                                            </div>
                                                        </div> --}}
                                                    </div>
                                                    <div class="row align-items-center">
                                                        <div id="children_list">
                                                            @include('frontend.reports.children-allowance-children-list')
                                                        </div>
                                                    </div>
                                                   
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- save cancel button design in right corner --}}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row justify-content-end">
                                            <div class="col-md-3">
                                                <div class="row justify-content-end">
                                                    <div class="form-group col-md-12 mb-2">
                                                        <button type="submit" class="listing_add">Generate</button>
                                                    </div>
                                                    
                                                    {{-- <div class="form-group col-md-12 mb-2">
                                                        <button type="submit" class="listing_exit">Cancel</button>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
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
    // if choose education then call ajax and show children name1 and name2 box
    $(document).ready(function() {
        $('select[name="member_id"]').change(function() {
            var member_id = $(this).val();
            var year = $('#year').val();
            $.ajax({
                url: "{{ route('reports.get-member-children') }}",
                type: 'POST',
                data: { member_id, year, _token: '{{ csrf_token() }}' },
                success: function(response) {

                    if(response.status == 'success'){
                        $('#children_list').html(response.view);
                        
                    }else{
                        $('#children_allowance').html('');
                    }
                },
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
                    $('.cat_drop').show();
                    $('.emp_status').hide();
                    $('.member').hide();
                    $('#children_list').hide();

                }else{
                    $('.cat_drop').hide();
                    $('.emp_status').show();
                    $('.member').show();
                    $('#children_list').show();

                }
            });
        });

    </script>
@endpush
