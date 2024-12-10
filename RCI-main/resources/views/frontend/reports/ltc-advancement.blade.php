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
                                            <div class="col-md-12">
                                                <div class="form-group col-md-12 mb-2">
                                                    <div class="row align-items-center">
                                                        <div class="form-group col-md-3 mb-2">
                                                            <div class="col-md-12">
                                                                <label>Member</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <select name="member_id" class="form-select" id="member_id">
                                                                    <option value="">Select Member</option>
                                                                    @foreach($members as $member)
                                                                        <option value="{{ $member->id }}">{{ $member->name }}</option>
                                                                    @endforeach    
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-md-3 mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>Year Range</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <select name="e_status" class="form-select" id="e_status">
                                                                    <option value="">Select year</option>
                                                                    @foreach($assessment_years as $year)
                                                                        <option value="{{ $year }}">{{ $year }}</option>
                                                                    @endforeach
                                                                </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-md-3 mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>Home Town / Leave Station</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" name="" class="form-control" id="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-3 mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>Period (from start date to end date)</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <input type="date" name="" class="form-control" id="">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <input type="date" name="" class="form-control" id="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-3 mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>Leave Type</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <select name="leave_type" class="form-select" id="leave_type">
                                                                    <option value="">Select Type</option>
                                                                    @foreach($leave_types as $type)
                                                                        <option value="{{ $type->id }}">{{ $type->leave_type }}</option>
                                                                    @endforeach
                                                                </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-3 mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>Earnd Leave</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" name="total_leave" class="form-control" id="total_leave">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-3 mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>App. date</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="date" name="" class="form-control" id="">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-md-3 mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>Members</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <select name="" class="form-select" id="">
                                                                        <option value="">Single</option>
                                                                        <option value="active">Family</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-3 mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>Travelling class</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" name="" class="form-control" id="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-12 mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>Family Members</label>
                                                                </div>
                                                            </div>
                                                            <div class="row align-items-center mb-1">
                                                                <div class="col-md-1">
                                                                    <div class="form-check">
                                                                      <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                                      <label class="form-check-label" for="defaultCheck1"></label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input type="text" name="" class="form-control" id="">
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input type="date" name="" class="form-control" id="">
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input type="text" name="" class="form-control" id="">
                                                                </div>
                                                            </div>
                                                             <div class="row align-items-center mb-1">
                                                                <div class="col-md-1">
                                                                    <div class="form-check">
                                                                      <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                                      <label class="form-check-label" for="defaultCheck1"></label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input type="text" name="" class="form-control" id="">
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input type="date" name="" class="form-control" id="">
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input type="text" name="" class="form-control" id="">
                                                                </div>
                                                            </div>
                                                             <div class="row align-items-center mb-1">
                                                                <div class="col-md-1">
                                                                    <div class="form-check">
                                                                      <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                                      <label class="form-check-label" for="defaultCheck1"></label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input type="text" name="" class="form-control" id="">
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input type="date" name="" class="form-control" id="">
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input type="text" name="" class="form-control" id="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-lg-9">
                                                                    <div class="row mb-3">
                                                                        <div class="col-md-12"><h5>Onward Journey</h5></div>
                                                                        <div class="form-group col-md-3 mb-2">
                                                                            <div class="row align-items-center">
                                                                                <div class="col-md-12">
                                                                                    <label>From</label>
                                                                                </div>
                                                                                <div class="col-md-12">
                                                                                    <input type="text" name="" class="form-control" id="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group col-md-3 mb-2">
                                                                            <div class="row align-items-center">
                                                                                <div class="col-md-12">
                                                                                    <label>To</label>
                                                                                </div>
                                                                                <div class="col-md-12">
                                                                                    <input type="text" name="" class="form-control" id="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group col-md-3 mb-2">
                                                                            <div class="row align-items-center">
                                                                                <div class="col-md-12">
                                                                                    <label>Total</label>
                                                                                </div>
                                                                                <div class="col-md-12">
                                                                                    <input type="text" name="" class="form-control" id="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group col-md-3 mb-2">
                                                                            <div class="row align-items-center">
                                                                                <div class="col-md-12">
                                                                                    <label>E-ticket</label>
                                                                                </div>
                                                                                <div class="col-md-12">
                                                                                    <div class="d-flex">
                                                                                        <div class="form-check me-3">
                                                                                          <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                                                                          <label class="form-check-label" for="exampleRadios1">
                                                                                           Yes
                                                                                          </label>
                                                                                        </div>
                                                                                        <div class="form-check">
                                                                                          <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                                                                          <label class="form-check-label" for="exampleRadios2">
                                                                                            No
                                                                                          </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12"><h5>Return Journey</h5></div>
                                                                        <div class="form-group col-md-3 mb-2">
                                                                            <div class="row align-items-center">
                                                                                <div class="col-md-12">
                                                                                    <label>From</label>
                                                                                </div>
                                                                                <div class="col-md-12">
                                                                                    <input type="text" name="" class="form-control" id="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group col-md-3 mb-2">
                                                                            <div class="row align-items-center">
                                                                                <div class="col-md-12">
                                                                                    <label>To</label>
                                                                                </div>
                                                                                <div class="col-md-12">
                                                                                    <input type="text" name="" class="form-control" id="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group col-md-3 mb-2">
                                                                            <div class="row align-items-center">
                                                                                <div class="col-md-12">
                                                                                    <label>Total</label>
                                                                                </div>
                                                                                <div class="col-md-12">
                                                                                    <input type="text" name="" class="form-control" id="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group col-md-3 mb-2">
                                                                            <div class="row align-items-center">
                                                                                <div class="col-md-12">
                                                                                    <label>E-ticket</label>
                                                                                </div>
                                                                                <div class="col-md-12">
                                                                                    <div class="d-flex">
                                                                                        <div class="form-check me-3">
                                                                                          <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                                                                          <label class="form-check-label" for="exampleRadios1">
                                                                                           Yes
                                                                                          </label>
                                                                                        </div>
                                                                                        <div class="form-check">
                                                                                          <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                                                                          <label class="form-check-label" for="exampleRadios2">
                                                                                            No
                                                                                          </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-3">
                                                                   <div class="row align-items-center">
                                                                        <div class="col-md-12">
                                                                            <label>Total</label>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <input type="text" name="" class="form-control" id="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                         <div class="form-group col-md-3 mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>Claimed Amount</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" name="" class="form-control" id="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                       
                                                    </div>
                                                </div>
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
    // get member total leave respect to leave_type
    $(document).on('change', '#leave_type', function() {
        var leave_type = $(this).val();
        var member_id = $('#member_id').val();

        if (leave_type != '' && member_id != '') {
            $.ajax({
                url: "{{ route('get-member-total-leave') }}",
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    leave_type: leave_type,
                    member_id: member_id
                },
                success: function(response) {
                    alert(response.leave);
                    $('#total_leave').val(response.leave);
                    
                }
            });
        }
    });
    </script>
  


@endpush
