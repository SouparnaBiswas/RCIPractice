@extends('frontend.layouts.master')
@section('title')
Ltc Advance Allowance
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
                <h3>Ltc Advance Allowance Generate</h3>
                <ul class="breadcome-menu mb-0">
                    <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                    <li><span class="bread-blod">Ltc Advance Allowance</span></li>
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
                        <form action="{{ route('ltc-advance-report-generate') }}" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-md-9">
                                    <div class="row">
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

                                        <div class="form-group col-md-4 mb-2 member">
                                            <div class="col-md-12">
                                                <label>Employee</label>
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
            $('.total_allo').show();

            $.ajax({
                url: "{{ route('reports.member-newspaper-allocation') }}",
                type: 'POST',
                data: {
                    member_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {

                    $('#amount').val(response.newspaper_allo_amount.amount);
                    $('#remarks').val(response.newspaper_allo_amount.remarks);

                },
            });

        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#member_id').change(function() {
            
                $('.cat_drop').hide();
                $('.month_drop').show();
                $('.emp_status').show();
                $('.member').show();
                $('.total_allo').show();
            
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

            } else {
                $('.cat_drop').hide();
                $('.emp_status').show();
                $('.member').show();
                $('.total_allo').show();
                
            }
        });
    });
</script>


@endpush