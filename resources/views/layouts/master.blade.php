<!DOCTYPE html>

<html lang="en">

<!-- begin::Head -->
<head>
    <base href="">
    <meta charset="utf-8" />
    <title>Metronic | Dashboard</title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!--begin::Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">

    <!--end::Fonts -->

    <!--begin::Page Vendors Styles(used by this page) -->
    <link href="{{asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet" type="text/css" />

    <!--end::Page Vendors Styles -->

    <!--begin::Global Theme Styles(used by all pages) -->
    <link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />

    <link rel="shortcut icon" href="{{asset('assets/media/logos/favicon.ico')}}" />
    <style>
        .text-muted{
            color:#fd3995;
        }

        .friday,
        .saturday,
        .sunday,
        .monday,
        .tuesday,
        .thursday,
        .wednesday
        {
            display: none;
        }
        .appointments-body tr:nth-child(n+7){
            display:none;
        }
    </style>
    @stack('styles')
</head>

<!-- end::Head -->

<!-- begin::Body -->
<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-aside--minimize kt-page--loading">

<!-- begin:: Page -->

<!-- begin:: Header Mobile -->
<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed">
    <div class="kt-header-mobile__logo">
        <a href="/">
            <img alt="Logo" src="{{asset('assets/media/logos/logo-6-sm.png')}}" />
        </a>
    </div>
</div>
<!-- end:: Header Mobile -->
<div class="kt-grid kt-grid--hor kt-grid--root">
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">


        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

            <!-- begin:: Header -->
            <div id="kt_header" class="kt-header kt-grid kt-grid--ver ">

                <!-- begin:: Aside -->
                <div class="kt-header__brand kt-grid__item  " id="kt_header_brand">
                    <div class="kt-header__brand-logo">
                        <a href="/">
                            <img alt="Logo" src="{{asset('assets/media/logos/logo-6.png')}}" />
                        </a>
                    </div>
                </div>

                <!-- end:: Aside -->



                <!-- begin: Header Menu -->
                <div class="kt-header-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_header_menu_wrapper">
                    <div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout-default ">
                        <ul class="kt-menu__nav ">
                            <li class="kt-menu__item kt-menu__item--open kt-menu__item--here kt-menu__item--submenu kt-menu__item--rel" data-ktmenu-submenu-toggle="click" aria-haspopup="true"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-text">{{__('Hi! ') . auth()->user()->name}}</span><i class="kt-menu__hor-arrow la la-angle-down"></i><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                                <div class="kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--left">
                                    <ul class="kt-menu__subnav">
                                        @can('update-doctor-information')
                                        <li class="kt-menu__item  kt-menu__item--submenu" data-ktmenu-submenu-toggle="hover" aria-haspopup="true"><a href="{{route('doctors.edit', auth()->user()->id)}}" class="kt-menu__link "><i class="kt-menu__link-icon fas fa-user"></i><span class="kt-menu__link-text">{{__('My profile')}}</span></a></li>
                                        @endcan
                                        <li class="kt-menu__item  kt-menu__item--submenu" data-ktmenu-submenu-toggle="hover" aria-haspopup="true"><a onclick="document.getElementById('logout-header').submit();" href="javascript:" class="kt-menu__link "><i class="kt-menu__link-icon fas fa-sign-out-alt"></i><span class="kt-menu__link-text">{{__('Log Out')}}</span></a></li>
                                        <form id="logout-header" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </ul>
                                </div>
                            </li>
                            <li class="kt-menu__item  kt-menu__item--active " aria-haspopup="true"><a href="{{route('reservations.index')}}" class="kt-menu__link "><span class="kt-menu__link-text">My Reservations</span></a></li>
                        </ul>
                    </div>
                </div>

                <!-- end: Header Menu -->


            </div>

            <!-- end:: Header -->
            <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor " id="kt_content">


                <!-- begin:: Content -->
                <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid mt-5">

                    <!--Begin::Dashboard 6-->

                    <!--begin:: Widgets/Stats-->
                    @yield('content')

                    <!--end:: Widgets/Stats-->

                    <!--End::Dashboard 6-->
                </div>

                <!-- end:: Content -->
            </div>

            <!-- begin:: Footer -->
            <div class="kt-footer  kt-grid__item kt-grid kt-grid--desktop kt-grid--ver-desktop" id="kt_footer">
                <div class="kt-container  kt-container--fluid ">
                    <div class="kt-footer__copyright">
                        2019&nbsp;&copy;&nbsp;<a href="http://keenthemes.com/metronic" target="_blank" class="kt-link">Keenthemes</a>
                    </div>
                    <div class="kt-footer__menu">
                        <a href="http://keenthemes.com/metronic" target="_blank" class="kt-footer__menu-link kt-link">About</a>
                        <a href="http://keenthemes.com/metronic" target="_blank" class="kt-footer__menu-link kt-link">Team</a>
                        <a href="http://keenthemes.com/metronic" target="_blank" class="kt-footer__menu-link kt-link">Contact</a>
                    </div>
                </div>
            </div>

            <!-- end:: Footer -->
        </div>
    </div>
</div>

<!-- end:: Page -->

<!-- begin::Scrolltop -->
<div id="kt_scrolltop" class="kt-scrolltop">
    <i class="fa fa-arrow-up"></i>
</div>

<!-- end::Scrolltop -->

<!-- begin::Global Config(global config for global JS sciprts) -->
<script>
    var KTAppOptions = {
        "colors": {
            "state": {
                "brand": "#22b9ff",
                "light": "#ffffff",
                "dark": "#282a3c",
                "primary": "#5867dd",
                "success": "#34bfa3",
                "info": "#36a3f7",
                "warning": "#ffb822",
                "danger": "#fd3995"
            },
            "base": {
                "label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
                "shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
            }
        }
    };
</script>

<!-- end::Global Config -->

<!--begin::Global Theme Bundle(used by all pages) -->
<script src="{{asset('assets/plugins/global/plugins.bundle.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/scripts.bundle.js')}}" type="text/javascript"></script>

<!--end::Global Theme Bundle -->

<!--begin::Page Vendors(used by this page) -->
<script src="{{asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js')}}" type="text/javascript"></script>

<!--end::Page Vendors -->

<!--begin::Page Scripts(used by this page) -->
{{--<script src="{{asset('assets/js/pages/dashboard.js')}}" type="text/javascript"></script>--}}

@stack('scripts')
<!--end::Page Scripts -->
</body>

<!-- end::Body -->
</html>
