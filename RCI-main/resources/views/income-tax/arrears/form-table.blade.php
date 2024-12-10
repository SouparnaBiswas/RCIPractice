@if (isset($member_id))
    <div class="col-md-8">
        <div class="recov-table">
            <table class="table customize-table mb-0 align-middle bg_tbody" id="loan-table">
                <thead class="text-white fs-4 bg_blue">
                    <tr>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Amt</th>
                        <th>CPS</th>
                        <th>I.Tax</th>
                        <th>CGHS</th>
                        <th>
                            GMC
                        </th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="tbody_height_scroll">
                    @include('income-tax.arrears.table')
                </tbody>
            </table>
        </div>
    </div>

    <div class="col-md-4" id="areers-form">
        @include('income-tax.arrears.form')
    </div>

    <script>
        $(document).ready(function() {

            function fetch_data(page) {
                $.ajax({
                    url: "{{ route('arrears.fetch-data') }}",
                    data: {
                        page: page,
                        member_id: "{{ $member_id }}"
                    },
                    success: function(data) {
                        $('tbody').html(data.view);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            }

            $(document).on('click', '.pagination a', function(event) {
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                $('#hidden_page').val(page);
                $('li').removeClass('active');
                $(this).parent().addClass('active');
                fetch_data(page);
            });

        });
    </script>
@endif

{{-- paginate with ajax --}}
