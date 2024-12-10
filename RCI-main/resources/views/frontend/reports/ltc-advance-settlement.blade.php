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
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group col-md-12 mb-2">
                                                    <div class="row align-items-center">
                                                        <div class="form-group col-md-3 mb-2">
                                                            <div class="col-md-12">
                                                                <label>Member</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <select name="e_status" class="form-select" id="e_status">
                                                                    <option value="">member</option>
                                                                    <option value="active">Active</option>
                                                                    <option value="deputation">On Deputation</option>
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
                                                                    <option value="">member</option>
                                                                    <option value="active">Active</option>
                                                                    <option value="deputation">On Deputation</option>
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
                                                                    <label>Period</label>
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
                                                                    <select name="e_status" class="form-select" id="e_status">
                                                                    <option value=""></option>
                                                                    <option value="active">Active</option>
                                                                    <option value="deputation">On Deputation</option>
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
                                                                    <input type="text" name="" class="form-control" id="">
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
                                                    <div class="form-group col-md-6 mb-2">
                                                        <button type="submit" class="listing_add">Generate</button>
                                                    </div>
                                                    
                                                    {{-- <div class="form-group col-md-6 mb-2">
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
                    success: ({members}) => {
                        const memberDropdown = $('[name="member_id"]').empty().append('<option value="">Select Member</option>');
                        members.forEach(({id, name, emp_id}) => memberDropdown.append(`<option value="${id}">${name} (${emp_id})</option>`));
                    },
                    error: (xhr) => console.log(xhr)
                });
            });
        });
    </script>


@endpush
