<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/agent/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('/agent/mg/favicon.png') }}">
    <title>
        Bangladesh Agent Panel
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- Nucleo Icons -->
    <link href="{{ asset('/agent/css/nucleo-icons.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="{{ asset('/agent/css/black-dashboard.css?v=1.0.0') }}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ asset('/agent/demo/demo.css') }}" rel="stylesheet" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css"
        rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css" />
    <style>

    </style>
    @yield('css')
</head>

<body class="">
    <div class="wrapper">
        <div class="sidebar">
            <!--
          Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
      -->
            <div class="sidebar-wrapper" style="background-color: #6e6767">
                <div class="logo">
                    <a href="javascript:void(0)" class="simple-text logo-mini">
                        QR
                    </a>
                    <a href="javascript:void(0)" class="simple-text logo-normal">
                        APP
                    </a>
                </div>
                <ul class="nav">
                    <li class="active ">
                        <a href="{{ route('user.booking') }}">
                            <i class="tim-icons icon-chart-pie-36"></i>
                            <p>Add New (Booking)</p>
                        </a>
                    </li>
                    <li class="active ">
                        <a href="{{ route('user.home') }}">
                            <i class="tim-icons icon-chart-pie-36"></i>
                            <p>Add New (Agoda)</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('booking_user_submission_list') }}">
                            <i class="tim-icons icon-atom"></i>
                            <p>Booking Confirmation List</p>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('agoda_user_submission_list') }}">
                            <i class="tim-icons icon-atom"></i>
                            <p>Agoda Confirmation List</p>
                        </a>
                    </li>


                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle d-inline">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>
                        <a class="navbar-brand" href="javascript:void(0)">@yield('title')</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navigation">
                        <ul class="navbar-nav ml-auto">
                            <li class="dropdown nav-item">
                                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                    <div class="photo">
                                        <img src="{{ asset('/agent/img/anime3.png') }}" alt="Profile Photo">
                                    </div>
                                    <b class="caret d-none d-lg-block d-xl-block"></b>
                                    <p class="d-lg-none">
                                        Log out
                                    </p>
                                </a>
                                @if (Auth::check())
                                    @php
                                        $user = Auth::user();
                                        $points = $user->point; // Assuming the points column is in the users table
                                    @endphp
                                @endif
                                <ul class="dropdown-menu dropdown-navbar">
                                    <li class="nav-link"><a href="{{ route('logout') }}"
                                            class="nav-item dropdown-item">Log out</a></li>
                                    <li class="nav-link"><a href="" class="nav-item dropdown-item">User Point :
                                            {{ $points }}</a></li>
                                </ul>
                            </li>
                            <li class="separator d-lg-none"></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">
                @yield('content')
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <div class="copyright">
                        ©copyright {{ date('Y') }}
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!--   Core JS Files   -->
    <script src="{{ asset('/agent/js/core/jquery.min.js') }}"></script>
    <script src="{{ asset('/agent/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('/agent/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/agent/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
    <!--  Google Maps Plugin    -->
    <!-- Place this tag in your head or just before your close body tag. -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chart JS -->
    <script src="{{ asset('/agent/js/plugins/chartjs.min.js') }}"></script>
    <!--  Notifications Plugin    -->
    <script src="{{ asset('/agent/js/plugins/bootstrap-notify.js') }}"></script>
    <!-- Control Center for Black Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('/agent/js/black-dashboard.min.js?v=1.0.0') }}"></script><!-- Black Dashboard DEMO methods, don't include it in your project! -->
    <script src="{{ asset('/agent/demo/demo.js') }}"></script>
    <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
    <script>
        window.TrackJS &&
            TrackJS.install({
                token: "ee6fab19c5a04ac1a32a645abde4613a",
                application: "black-dashboard-free"
            });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js" type="text/javascript"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- <script>
        $(document).ready(function() {
            $('.button-plus').click(function() {
                var input = $(this).closest('.input-group').find('input');
                var value = parseInt(input.val(), 10) || 0;
                input.val(value + 1);
            });
            $('.button-minus').click(function() {
                var input = $(this).closest('.input-group').find('input');
                var value = parseInt(input.val(), 10) || 0;
                if (value > 1) { // prevent negative values
                    input.val(value - 1);
                }
            });
        });
    </script> --}}




    <script>
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                var alertSuccess = document.querySelector('.alert-success');
                var alertDanger = document.querySelector('.alert-danger');
                if (alertSuccess) {
                    alertSuccess.classList.remove('show');
                    setTimeout(function() {
                        alertSuccess.remove();
                    }, 150);
                }
                if (alertDanger) {
                    alertDanger.classList.remove('show');
                    setTimeout(function() {
                        alertDanger.remove();
                    }, 150);
                }
            }, 3000);
        });
    </script>

    @yield('js')

</body>

</html>
