@extends('frontend.layouts.master')
@section('title')
    Member Emi Info
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
                    <h3> Member Emi Info Listing</h3>
                    <ul class="breadcome-menu mb-0">
                        <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                        <li><span class="bread-blod"> Member Emi Info Listing</span></li>
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
                            <form action="{{ route('members.loans-emi-submit')}}" method="post" id="member-loan-emi-form">
                                @csrf

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <label>Member Name</label>
                                            </div>
                                            <div class="col-md-12">
                                                <select class="form-select" name="member_id" id="member_id">
                                                    <option value="">Select Member</option>
                                                    @foreach ($members as $member)
                                                        <option value="{{ $member->id }}">
                                                            {{ $member->name }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4" id="loan-drodown" style="display:none;">
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <label>Loan Name</label>
                                            </div>
                                            <div class="col-md-12">
                                                <select class="form-select" name="loan_id" id="loan_id">

                                                </select>
                                                <span class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row justify-content-end">
                                            <div class="col-md-12">
                                                <label></label>
                                            </div>
                                            <div class="form-group col-md-4 mb-2">
                                                <button type="submit" class="listing_add">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-4 mt-4">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="position-relative">
                                            <div class="col-md-12">
                                                <h3>Emi List</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                <div class="table-responsive rounded-2">
                                    <table class="table customize-table mb-0 align-middle bg_tbody">
                                        <thead class="text-white fs-4 bg_blue">
                                            <tr>
                                                <th>ID</th>
                                                <th class="sorting" data-sorting_type="desc" data-column_name="commission"
                                                    style="cursor: pointer">Member Name </th>
                                                <th class="sorting" data-sorting_type="desc"
                                                    data-column_name="lower_slab_amount" style="cursor: pointer"> Loan Name
                                                </th>
                                                <th class="sorting" data-sorting_type="desc"
                                                    data-column_name="higher_slab_amount" style="cursor: pointer"> Interest
                                                    rate(%) </th>
                                                <th class="sorting" data-sorting_type="desc" data-column_name="tax_rate"
                                                    style="cursor: pointer">Emi Amount </th>
                                                <th class="sorting" data-sorting_type="desc"
                                                    data-column_name="edu_cess_rate" style="cursor: pointer">Interest Amount
                                                </th>
                                                <th class="sorting" data-sorting_type="desc"
                                                    data-column_name="financial_year" style="cursor: pointer">Penal Interest
                                                </th>
                                                <th>Emi Date</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody class="tbody_height_scroll" id="emi-table">
                                            @include('frontend.members.loan.emi-info-table')
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
        //get all loan name from member id using ajax

        $(document).on('change', '#member_id', function() {
            var member_id = $('#member_id').val();
            $.ajax({
                url: "{{ route('members.get-loan-from-member') }}",
                type: 'POST',
                data: {
                    member_id: member_id
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    $('#loan-drodown').show();
                    var loans = response.data;
                    var html = '<option value="">Select Loan</option>';
                    $.each(loans, function(index, value) {
                        html += '<option value="' + value.loan_id + '">' + value.loan_name + '</option>';
                    });
                    $('#loan_id').html(html);
                }
            });
        });
    </script>

<script>
$('#member-loan-emi-form').submit(function(e) {
    e.preventDefault();
    var formData = $(this).serialize();


    $.ajax({
        url: $(this).attr('action'),
        type: $(this).attr('method'),
        data: formData,
        success: function(response) {
          
            $('#emi-table').html(response.view);
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
</script>

<script>
    $(document).on('click', '.pagination a', function(e) {
    e.preventDefault();
    let page = $(this).attr('href').split('page=')[1];
    fetchLoanEmiData(page);
});

    function fetchLoanEmiData(page) {
        var member_id = $('#member_id').val();
        var loan_id = $('#loan_id').val();
        $.ajax({
            url: "{{ route('members.loan-emi-list') }}",
            type: "POST",
            data: {
                member_id: member_id,
                loan_id: loan_id,
                page: page
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
            
                $('#emi-table').html(response.view); 
                // $('.loan-emi-list-container').html(data);
            },
            error: function(response) {
                // console.log('Error:', data);
            }
        });
    }
    

</script>
@endpush
