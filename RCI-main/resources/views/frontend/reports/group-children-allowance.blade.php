@extends('frontend.layouts.master')
@section('title')
   Group Children Allowance 
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
                    <h3>Children Education Allowance Generate</h3>
                    <ul class="breadcome-menu mb-0">
                        <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                        <li><span class="bread-blod">Education Allowance</span></li>
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
                            <form action="{{ route('reports.group-children-allowance-generate') }}" method="POST" >
                                @csrf

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group col-md-12 mb-2">
                                                    <div class="row align-items-center">
                                                        
                                                        <div class="form-group col-md-3 mb-2">
                                                            <div class="col-md-12">
                                                                <label>Category</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <select name="category" class="form-select" id="category_id">
                                                                    <option value="">Select Category</option>
                                                                    @foreach($categories as $category)
                                                                        <option value="{{ $category->id }}">{{ $category->category }}</option>
                                                                    @endforeach
                                                                </select>
                                                                <span id="e_status-error" class="text-danger"></span>
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

<script>
    // if choose education then call ajax and show children name1 and name2 box
    $(document).ready(function() {
        $('select[name="member_id"]').change(function() {
            var member_id = $(this).val();
           
            $.ajax({
                url: "{{ route('reports.get-member-children') }}",
                type: 'POST',
                data: { member_id, _token: '{{ csrf_token() }}' },
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
@endpush
