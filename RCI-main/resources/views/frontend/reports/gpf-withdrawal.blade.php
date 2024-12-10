@extends('frontend.layouts.master')
@section('title')
    GPF Withdrawal Report Generate
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
                        <li><span class="bread-blod">GPF Withdrawal</span></li>
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
                            <form action="{{ route('reports.gpf-withdrawal-generate') }}" method="POST" >
                                @csrf

                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="form-group col-md-4 mb-2">
                                                <div class="col-md-12">
                                                    <label>Employee Status</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <select name="e_status" class="form-select" id="gpf_e_status">
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
                                            <div class="form-group col-md-4 mb-2">
                                                <div class="col-md-12">
                                                    <label>Members</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <select name="member_id" class="form-select search-select-box" id="member_id">
                                                    </select>
                                                    @if ($errors->has('member_id'))
                                                        <div class="error" style="color:red;">
                                                            {{ $errors->first('member_id') }}</div>
                                                    @endif
                                                    
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4 mb-2">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <label>Withdrawal Apply Date</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input type="date" name="apply_date" class="form-control" id="apply_date" value="{{ old('apply_date') }}">
                                                        @if ($errors->has('apply_date'))
                                                            <div class="error" style="color:red;">
                                                                {{ $errors->first('apply_date') }}</div>
                                                        @endif
                                                        
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4 mb-2">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <label>Date by which Withdrawal Required</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input type="date" name="required_date" class="form-control" id="required_date" value="{{ old('required_date') }}">
                                                        @if ($errors->has('required_date'))
                                                            <div class="error" style="color:red;">
                                                                {{ $errors->first('required_date') }}</div>
                                                        @endif
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                                        
                                            <div class="form-group col-md-4 mb-2">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <label>Amount Required</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input type="text" name="amount" class="form-control" id="amount" value="{{ old('amount') }}">
                                                        @if ($errors->has('amount'))
                                                            <div class="error" style="color:red;">
                                                                {{ $errors->first('amount') }}</div>
                                                        @endif
                                                        
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4 mb-2">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <label>Amount Received</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input type="text" name="received_amount" class="form-control" id="received_amount" value="{{ old('received_amount') }}">
                                                        @if ($errors->has('received_amount'))
                                                            <div class="error" style="color:red;">
                                                                {{ $errors->first('received_amount') }}</div>
                                                        @endif
                                                        
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4 mb-2">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <label>Reason for Withdrawal</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <textarea name="reason" class="form-control" id="reason" value="{{ old('reason') }}"></textarea>
                                                        @if ($errors->has('reason'))
                                                            <div class="error" style="color:red;">
                                                                {{ $errors->first('reason') }}</div>
                                                        @endif
                                                        
                                                    </div>
                                                </div>
                                            </div> 
                                                   
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="row justify-content-end">
                                            <div class="form-group col-md-12 mb-2">
                                                <button type="submit" class="listing_add">Generate</button>
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
            $('#gpf_e_status').change(function() {
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


@endpush
