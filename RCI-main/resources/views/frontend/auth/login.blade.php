<!DOCTYPE html>
<html lang="en">

<head>
    <!--  Title -->
    <title>{{ env('APP_NAME') }} - Login</title>
    <!--  Required Meta Tag -->

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="handheldfriendly" content="true">
    <meta name="MobileOptimized" content="width">
    <meta name="description" content="RCI">
    <meta name="author" content="">
    <meta name="keywords" content="RCI">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--  Favicon -->
    <!-- <link rel="shortcut icon" type="image/png" href="favicon.ico"> -->
    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/owl.carousel.min.css') }}">

    <!-- Core Css -->
    <link id="themeColors" rel="stylesheet" href="{{ asset('frontend_assets/css/style.min.css') }}">
    <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body>

    
@php
use App\Helpers\Helper;
@endphp

    <!--  Body Wrapper -->
    <div class="login_bg">

        <!--  Main wrapper -->
        <div class="container">
            <!--  Row 1 -->
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card w-100">
                        <div class="card-body">
                            <div class="text-center">
                            @if (!isset(Helper::logo()->logo))
                            <a href="#" class="text-nowrap logo-img">
                                <img src="{{ asset('frontend_assets/images/logo.png') }}" class="dark-logo" alt="">
                            </a>
                            @else
                                <a href="#" class="text-nowrap logo-img">
                                    <img src="{{ Storage::url(Helper::logo()->logo) }}" class="dark-logo" alt="">
                                </a>
                            @endif
                            </div>
                            
                            <form action="{{ route('login-check') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-12 mb-3">
                                        <label>Email/Username</label>
                                        <input type="text" class="form-control" name="user_name"
                                            value="{{ old('user_name') }}" placeholder="">
                                        @if ($errors->has('user_name'))
                                            <span class="text-danger">{{ $errors->first('user_name') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-12 mb-3">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password" placeholder="">
                                        <i class="toggle-password fa fa-fw fa-eye-slash"></i>
                                        @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <button type="submit" class="print_btn w-100">Login</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>



    <!--  Import Js Files -->
    <script src="{{ asset('frontend_assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend_assets/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('frontend_assets/js/bootstrap.bundle.min.js') }}"></script>
    <!--  core files -->
    <script src="{{ asset('frontend_assets/js/app.min.js') }}"></script>
    <script src="{{ asset('frontend_assets/js/app.init.js') }}"></script>
    <script src="{{ asset('frontend_assets/js/app-style-switcher.js') }}"></script>
    <script src="{{ asset('frontend_assets/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('frontend_assets/js/custom.js') }}"></script>
    <!--  current page js files -->
    <script src="{{ asset('frontend_assets/js/owl.carousel.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
    <script>
        @if (Session::has('message'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success("{{ session('message') }}");
        @endif

        @if (Session::has('error'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.error("{{ session('error') }}");
        @endif

        @if (Session::has('info'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.info("{{ session('info') }}");
        @endif

        @if (Session::has('warning'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.warning("{{ session('warning') }}");
        @endif
    </script>

    <script>
        $(".toggle-password").click(function() {
            $(this).toggleClass("fa-eye fa-eye-slash");
            input = $(this).parent().find("input");
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    </script>
</body>

</html>
