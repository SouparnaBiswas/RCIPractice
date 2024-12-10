@extends('frontend.layouts.master')
@section('title')
    Form 16 Report Generate
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
                        <li><span class="bread-blod">Form 16 (Part A)</span></li>
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
                            <form action="{{ route('reports.form-16-generate') }}" method="POST" >
                                @csrf

                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="form-group col-md-4 mb-2">
                                                <div class="col-md-12">
                                                    <label>Members</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <select name="member_id" class="form-select search-select-box">
                                                        <option value="">Select Member</option>
                                                        @foreach ($members as $member)
                                                            <option value="{{ $member->id }}">
                                                                {{ $member->name }} ({{ $member->emp_id }})
                                                            </option>
                                                            
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('member_id'))
                                                        <div class="error" style="color:red;">
                                                            {{ $errors->first('member_id') }}</div>
                                                    @endif
                                                    
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4 mb-2">
                                                <div class="col-md-12">
                                                    <label>Year</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <select name="report_year" id="report_year" class="form-select">
                                                        <option value="">Select Year</option>
                                                        @foreach ($assessment_year as $financialYear)
                                                            <option value="{{ $financialYear }}">
                                                                {{ $financialYear }}
                                                            </option>
                                                            
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('report_year'))
                                                        <div class="error" style="color:red;">
                                                            {{ $errors->first('report_year') }}</div>
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
                    success: ({members}) => {
                        const memberDropdown = $('[name="member_id"]').empty().append('<option value="">Select Member</option>');
                        members.forEach(({id, name, emp_id}) => memberDropdown.append(`<option value="${id}">${name} (${emp_id})</option>`));
                    },
                    error: (xhr) => console.log(xhr)
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

@endpush
