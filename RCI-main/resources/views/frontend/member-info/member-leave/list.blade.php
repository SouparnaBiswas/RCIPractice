@extends('frontend.layouts.master')
@section('title')
   Member Alloted Leaves List
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
                    <h3>Member Alloted Leaves Listing</h3>
                    <ul class="breadcome-menu mb-0">
                        <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                        <li><span class="bread-blod">Member Alloted Leaves Listing</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <!--  Row 1 -->
        
        <div class="row">
            <div class="col-md-12 text-end mb-3">
                <a class="print_btn" href="{{ route('member-leaves.leave-list') }}">Add/Edit member leave</a>
            </div>
            <div class="col-lg-12">
                <div class="card w-100">
                    <div class="card-body">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-md-6">
                              <h4>Emplyoee Leave Chart</h4>
                            </div>
                            @php $currentYear = date('Y') @endphp
                            <div class="col-md-3 col-lg-2">
                              <select class="form-control" aria-label="Year" id="year_search">
                                @foreach ($years as $year)
                                    <option value="{{ $year }}" @if ($year == $currentYear)
                                        selected
                                        
                                    @endif>{{ $year }}</option>
                                @endforeach
                              </select>
                            </div>
                          </div> 
                        <div class="row">
                            <div class="col-md-12 mb-4 mt-4">
                                {{-- <div class="row justify-content-end">
                                    <div class="col-md-5 col-lg-3 mb-2 mt-4">
                                        <div class="position-relative">
                                            <input type="text" class="form-control search_table" value=""
                                                id="search" placeholder="Search">
                                            <span class="table_search_icon"><i class="fa fa-search"></i></span>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="table-responsive rounded-2">
                                    <table class="table customize-table mb-0 align-middle bg_tbody margin_hr" id="member_leave_table">
                                        <thead class="text-white fs-4 bg_blue">
                                            <tr>
                                                <th>ID</th>
                                                <th class="sorting" data-sorting_type="desc" data-column_name="member_id"
                                                    style="cursor: pointer">Member Name </th>
                                                <th></th>
                                                @foreach ($leaveTypes as $leaveType)
                                                    <th class="sorting" data-sorting_type="desc" data-column_name="leave_type"
                                                        style="cursor: pointer">{{ Str::upper($leaveType->leave_type_abbr) }}</th>
                                                    
                                                @endforeach
                                                <th>Total Approved Leave</th>
                                                {{-- <th></th> --}}
                                            </tr>
                                        </thead>
                                        <tbody class="tbody_height_scroll" >
                                            @include('frontend.member-info.member-leave.table')
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
    $(document).on('change', '#year_search', function() {
        var year = $('#year_search').val();
        $.ajax({
            url: "{{ route('member-leaves.year-search') }}",
            type: 'POST',
            data: {
                _token: "{{ csrf_token() }}",
                year: year
            },
            header:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')    
            },
            success: function(response) {
                
                $('tbody').html(response.data);
            },
            error: function(xhr) {
                console.log(xhr);
            }
        });
    });
</script>




@endpush
