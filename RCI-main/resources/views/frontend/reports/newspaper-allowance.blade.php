@extends('frontend.layouts.master')
@section('title')
Newspaper Allowance
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
            <div class="arrow_left"><a href="{{ route('members.index') }}" class="text-white"><i class="ti ti-arrow-left"></i></a></div>
            <div class="">
                <h3>Newspaper Allowance Generate</h3>
                <ul class="breadcome-menu mb-0">
                    <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                    <li><span class="bread-blod">Newspaper Allowance</span></li>
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
                        <form action="{{ route('reports.newspaper-allowance-generate') }}" method="POST">
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
                                                    <option value="">Select Category</option>
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

                                                @if ($errors->has('e_status'))
                                                    <div class="error" style="color:red;">
                                                        {{ $errors->first('e_status') }}</div>
                                                @endif

                                            </div>
                                        </div>

                                        <div class="form-group col-md-4 mb-2">
                                            <div class="col-md-12">
                                                <label>Year</label>
                                            </div>
                                            <div class="col-md-12">
                                                <select name="report_year" class="form-select" id="report_year">
                                                    @for ($i = date('Y'); $i >= 1958; $i--)
                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                    @endfor
                                                </select>
                                                @if ($errors->has('report_year'))
                                                    <div class="error" style="color:red;">
                                                        {{ $errors->first('report_year') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group col-md-4 mb-2 member">
                                            <div class="col-md-12">
                                                <label>Member</label>
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

                                        <div class="form-group col-md-4 mb-2 total_allo" style="display:none;">
                                            <div class="col-md-12">
                                                <label>Total Amount</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" name="amount" class="form-control" id="amount">
                                            </div>
                                            @if ($errors->has('amount'))
                                                    <div class="error" style="color:red;">
                                                        {{ $errors->first('amount') }}</div>
                                            @endif
                                        </div>

                                        <div class="form-group col-md-4 mb-2 duration" style="display:none;">
                                            <div class="col-md-12">
                                                <label>Duration</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" name="duration" class="form-control" id="duration" disabled>
                                            </div>
                                            @if ($errors->has('duration'))
                                                    <div class="error" style="color:red;">
                                                        {{ $errors->first('duration') }}</div>
                                            @endif
                                        </div>

                                        <div class="form-group col-md-4 mb-2" >
                                            <div class="col-md-12">
                                                <label>Remarks</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" name="remarks" class="form-control" id="remarks">
                                            </div>
                                            @if ($errors->has('remarks'))
                                                    <div class="error" style="color:red;">
                                                        {{ $errors->first('remarks') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                </div>

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
            var year = $('#report_year').val();
            $('.total_allo').show();

            $.ajax({
                url: "{{ route('reports.member-newspaper-allocation') }}",
                type: 'POST',
                data: {
                    member_id,
                    year,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {

                    $('#amount').val(response.get_news_allow.max_allocation_amount);
                    $('#remarks').val(response.get_news_allow.remarks);
                    $('#duration').val(response.get_news_allow.duration);

                },
            });

        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#report_type').change(function() {
            var report_type = $(this).val();
            if (report_type == 'group') {
                $('.cat_drop').show();
                $('.emp_status').hide();
                $('.member').hide();
                $('.total_allo').hide();
                $('.duration').hide();


            } else {
                $('.cat_drop').hide();
                $('.emp_status').show();
                $('.member').show();
                $('.total_allo').show();
                $('.duration').show();
            }
        });
    });
</script>
@endpush