<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Bassirou Niang">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="storage/images/logo.jpg">
    <title>{{config('app.name')}}</title>
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/toastr.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

    @livewireStyles

</head>

<body>
    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative"
            style="background:url(assets/images/big/auth-bg.jpg) no-repeat center center;">

            <div class="error-container bg-white col-md-4">
                <div class="no-border">
                    <div class="text-center mt-2">
                        <img src="storage/images/logo.jpg" class="rounded-circle"  width="100" >
                    </div>
                                    <div class="text-center text-bold-700 grey darken-2" style="font-size: 11rem; margin-bottom: 4rem;">404</div>
                                <div class=" text-center">
                                    <h5 class="display-4">{{__('messages.not_found')}}</h5>
                                </div>
                                <div class="text-center pb-3">
                                            <a href="{{route('home')}}" class="btn btn-danger btn-rounded px-4 py-2 text-uppercase white font-small-4 box-shadow-2 border-0"><i class="ft-home"></i> {{__('messages.homepage')}}</a>
                                </div>
                            </div>

        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="assets/libs/jquery/dist/jquery.min.js "></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js "></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js "></script>

    <script src="{{ asset('assets/toastr.min.js') }}"></script>
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/sweetalert2@10') }}"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
        $(".preloader ").fadeOut();
    </script>

    @yield('js')
    @livewireScripts

</body>

</html>
