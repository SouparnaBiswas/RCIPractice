@extends('frontend.layouts.master')
@section('title')
    Attendance Create
@endsection

@push('styles')
<link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css' rel='stylesheet' />
<link href='https://cdn.jsdelivr.net/npm/fullcalendar/core@5.3.0/main.min.css' rel='stylesheet' />
<link href='https://cdn.jsdelivr.net/npm/fullcalendar/daygrid@5.3.0/main.min.css' rel='stylesheet' />
@endpush

@section('content')
    <section id="loading">
        <div id="loading-content"></div>
    </section>
    <div class="container-fluid">
        <div class="breadcome-list">
            <div class="d-flex">
                <div class="arrow_left"><a href="{{ route('attendances.index') }}" class="text-white"><i
                            class="ti ti-arrow-left"></i></a></div>
                <div class="">
                    <h3>Attendance Create</h3>
                    <ul class="breadcome-menu mb-0">
                        <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                        <li><span class="bread-blod">Attendance Create</span></li>
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

                            <form action="{{ route('attendances.member-attendances') }}" method="POST" id="attendance-create-form">
                                @csrf

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="form-group col-md-4 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>Member Name</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <select class="form-select" name="member_id" id="member_id">
                                                                    <option value="">Select</option>
                                                                    @foreach ($members as $member)
                                                                        <option value="{{ $member->id }}">
                                                                            {{ $member->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-md-4 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>Year</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <select class="form-select" name="year" id="year">
                                                                    <option value="">Select</option>
                                                                    @foreach ($years as $year)
                                                                        <option value="{{ $year }}">
                                                                            {{ $year}}</option>
                                                                    @endforeach
                                                                </select>
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-md-4 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>Month</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <select class="form-select" name="month" id="month">
                                                                    <option value="">Select</option>
                                                                </select>
                                                                <span class="text-danger"></span>
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
                                                <div class="row">
                                                    <div class="form-group col-md-6 mb-2">
                                                        <button type="submit" class="listing_add">Save</button>
                                                    </div>
                                                    <div class="form-group col-md-6 mb-2">
                                                        <button type="reset" class="listing_exit">Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            
                        </div>
                        <div id='calendar'></div>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@6.1.14/index.global.min.js"></script>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar/core@5.3.0/main.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar/daygrid@5.3.0/main.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar/interaction@5.3.0/main.min.js'></script>

{{-- <script>

    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth'
      });
      calendar.render();
    });

  </script> --}}
    {{-- <script>
        $(document).ready(function() {
            var lastId = localStorage.getItem('lastId');
            if (lastId === null) {
                lastId = 1;
            } else {
                lastId = parseInt(lastId) + 1;
            }

            var randomId = 'RCI_CHESS' + String(lastId).padStart(4, '0');
            localStorage.setItem('lastId', lastId);
            document.getElementById('emp_id').value = randomId;
        });
    </script> --}}

    <script>
        $(document).ready(function() {
            // var calendar;

            // function initializeCalendar(events) {
            //     var calendarEl = document.getElementById('calendar');

            //     // Destroy any existing calendar instance to avoid duplication
            //     if (calendar) {
            //         calendar.destroy();
            //     }

            //     calendar = new FullCalendar.Calendar(calendarEl, {
            //         initialView: 'dayGridMonth',
            //         events: events
            //     });

            //     // Render the calendar
            //     calendar.render();
            // }

            $('#attendance-create-form').submit(function(e) {
                e.preventDefault();
                var formData = $(this).serialize();


                $.ajax({
                    url: $(this).attr('action'),
                    type: $(this).attr('method'),
                    data: formData,
                    success: function(response) {
                        console.log(response);
                        //windows load with toastr message
                        // window.location.reload();
                        // initializeCalendar(response.events);

                        // var events = Array.isArray(response.attendances) ? response.attendances : [];
                        if(Array.isArray(response.attendances) && response.attendances.length > 0) {
                                var events = response.attendances;

                                const calendarEl = document.getElementById('calendar');
                                const calendar = new FullCalendar.Calendar(calendarEl, {
                                plugins: ['dayGrid', 'interaction'],
                                editable: true,
                                events: events,
                                headerToolbar: {
                                    left: 'prev,next today',
                                    center: 'title',
                                    right: 'dayGridMonth,dayGridWeek,dayGridDay'
                                },
                            });

                            calendar.render();
                        } else {
                            const calendarEl = document.getElementById('calendar');
                            const calendar = new FullCalendar.Calendar(calendarEl, {
                                plugins: ['dayGrid', 'interaction'],
                                headerToolbar: {
                                    left: 'prev,next today',
                                    center: 'title',
                                    right: 'dayGridMonth,dayGridWeek,dayGridDay'
                                },
                            });

                            calendar.render();
                        }
                        

                        
                        
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
    </script> 

    
    <script>
        //grade pay found
        $(document).ready(function() {
            $('#pm_level').change(function() {
                var pm_level = $(this).val();
                
                $.ajax({
                    url: "{{ route('members.grade-pay') }}",
                    type: 'POST',
                    data: {
                        pm_level: pm_level
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        $('#g_pay').val(response.grade_pay.id);
                        $('#g_pay_val').val(response.grade_pay.amount);
                        
                        $('#quater').val(response.quarter.id);
                        $('#quater_type').val(response.quarter.qrt_type);
                        
                    }
                });
            });
        });
    </script>

    <script>
        //cgegis found
        $(document).ready(function() {
            $('#group').change(function() {
                var group = $(this).val();
                
                $.ajax({
                    url: "{{ route('members.get-cgegis-value') }}",
                    type: 'POST',
                    data: {
                        group: group
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        $('#cgegis_value').val(response.cgegis_value.value);
                        $('#cgegis').val(response.cgegis_value.id);
                        
                    }
                });
            });

            $('#desig').change(function() {
                var desig = $(this).val();
                
                $.ajax({
                    url: "{{ route('members.get-category-value') }}",
                    type: 'POST',
                    data: {
                        desig: desig
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        $('#category_value').val(response.category_value.category);
                        $('#category').val(response.category_value.id);
                        

                        $('#pay_band_value').val(response.payband_type.payband_type);
                        $('#pay_band').val(response.payband_type.id)

                    }
                });
            });
        
        });

    </script>

    <script>
        $(document).ready(function() {
            $('#year').change(function() {
                var year = $(this).val();
                var currentDate = new Date();
                var monthDropdown = $('#month');

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
@endpush
