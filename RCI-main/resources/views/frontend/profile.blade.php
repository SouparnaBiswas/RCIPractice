@extends('frontend.layouts.master')
@section('title')
    Profile
@endsection

@push('styles')
@endpush

@section('content')
    <div class="container-fluid">
        <div class="breadcome-list">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <h3>Profile</h3>
                    <ul class="breadcome-menu mb-0">
                        <li><a href="javascript:void(0);">Home</a> <span class="bread-slash">/</span></li>
                        <li><span class="bread-blod">Profile</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <!--  Row 1 -->

        <div class="row">
            <div class="col-lg-12">
                <div class="profile-container">
                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        <div class="row mb-4">
                            <div class="col-lg-12 col-md-12">
                                <div class="d-block d-md-flex align-items-center">
                                    <div class="left_img me-3 profile_img">
                                        <span>
                                            @if (Auth::user()->profile_picture)
                                                <img src="{{ Storage::url(Auth::user()->profile_picture) }}"
                                                    alt="" id="blah">
                                            @else
                                                <img src="{{ asset('frontend_assets/images/profile.png') }}" alt=""
                                                    id="blah" />
                                            @endif
                                        </span>
                                        <div class="profile_eidd">
                                            <input type="file" id="edit_profile" onchange="readURL(this);" name="profile_picture"/>
                                            <label for="edit_profile"><i class="ti ti-edit"></i></label>
                                        </div>
                                    </div>
                                    <div class="right_text profile-info">
                                        <p>Hello!</p>
                                        <h2> {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h2>
                                        <p>{{ Auth::user()->user_name }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row  mb-0">
                            <div class="col-lg-12">

                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-6 mb-3">
                                        <label>First Name</label>
                                        <input type="text" class="form-control" value="{{ Auth::user()->first_name }}"
                                            name="first_name" placeholder="">
                                        @if ($errors->has('first_name'))
                                            <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label>Last Name</label>
                                        <input type="text" class="form-control" value="{{ Auth::user()->last_name }}"
                                            name="last_name" placeholder="">
                                        @if ($errors->has('last_name'))
                                            <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="w-100 text-end">
                                    <button class="print_btn" type="submit">Update</button>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endpush
