<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />

    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="co-55" name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ url('assets/images/icon.png') }}">

    <!-- Plugins css -->
    <link href="{{ url('assets/libs/flatpickr/flatpickr.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/libs/selectize/css/selectize.bootstrap3.css') }}" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="{{ url('assets/css/bootstrap-modern.min.css') }}" rel="stylesheet" type="text/css"
        id="bs-default-stylesheet" />
    <link href="{{ url('assets/css/app-modern.min.css') }}" rel="stylesheet" type="text/css"
        id="app-default-stylesheet" />

    <link href="{{ url('assets/css/bootstrap-modern-dark.min.css') }}" rel="stylesheet" type="text/css"
        id="bs-dark-stylesheet" disabled />
    <link href="{{ url('assets/css/app-modern-dark.min.css') }}" rel="stylesheet" type="text/css"
        id="app-dark-stylesheet" disabled />

    <!-- icons -->

    <link href="{{ url('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    @yield('jslinks')

</head>

<body data-layout-mode="detached"
    data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": true}, "topbar": {"color": "dark"}, "showRightSidebarOnPageLoad": true}'>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        <div class="navbar-custom">
            <div class="container-fluid ">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                </ul>
                <li class="dropdown d-none d-lg-inline-block">

                </li>
                <ul class=" list-unstyled topnav-menu float-right mb-0">

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page"
                            href="{{ route('account') }}">{{ Auth::user()->name }} <i class="fe-user"></i></a>
                    </li>
                    @can('admins')
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('auth.admins') }}">Admins <i
                                    class="fe-settings"></i></a>
                        </li>
                    @endcan
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('auth.logout') }}">Logout <i
                                class="fe-log-out"></i></a>
                    </li>






                </ul>

                <!-- LOGO -->
                <div class="logo-box">


                    <a href="{{ route('dashboard') }}" class="logo logo-light text-center">
                        <span class="logo-sm">

                        </span>
                        <span class="logo-lg">
                            <img style="height: 3rem" src="{{ url('assets/images/logo (1).png') }}" alt=""
                                height="20">
                        </span>
                    </a>
                </div>


                <div class="clearfix"></div>
            </div>
        </div>
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        <div class="left-side-menu">

            <div class="h-100" data-simplebar>

                <!-- User box -->
                <div class="user-box text-center">


                    <a href="{{ route('account') }}"
                        class="text-dark font-weight-normal  h5 mt-2 mb-1 d-block">{{ Auth::user()->name }}</a>

                    <p class="text-muted">Admin Head</p>
                </div>

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <ul id="side-menu">



                        <li>
                            <a href="{{ route('dashboard') }}">
                                <i data-feather="calendar"></i>
                                <span> Dashboard </span>
                            </a>
                        </li>

                        <li class="menu-title mt-2">Apps</li>
                        @can('services')
                            <li>
                                <a href="{{ route('services.index') }}">
                                    <i data-feather="calendar"></i>
                                    <span> Services </span>
                                </a>
                            </li>
                        @endcan
                        @can('locations')
                            <li>
                                <a href="{{ route('locations.index') }}">
                                    <i data-feather="calendar"></i>
                                    <span> Location </span>
                                </a>
                            </li>
                        @endcan
                        @can('faqs')
                            <li>
                                <a href="{{ route('faqs.index') }}">
                                    <i data-feather="calendar"></i>
                                    <span> Faqs </span>
                                </a>
                            </li>
                        @endcan

                        @can('testimonials')
                            <li>
                                <a href="{{ route('testimonials.index') }}">
                                    <i data-feather="calendar"></i>
                                    <span>Testimonials </span>
                                </a>
                            </li>
                        @endcan
                        @can('abouts')
                            <li>
                                <a href="{{ route('abouts.index') }}">
                                    <i data-feather="calendar"></i>
                                    <span> About Us </span>
                                </a>
                            </li>
                        @endcan
                        @can('privacy')
                            <li>
                                <a href="{{ route('privacy.index') }}">
                                    <i data-feather="calendar"></i>
                                    <span> Privacy </span>
                                </a>
                            </li>
                        @endcan
                        @can('home')
                            <li>
                                <a href="{{ route('home.index') }}">
                                    <i data-feather="calendar"></i>
                                    <span> Home </span>
                                </a>
                            </li>
                        @endcan
                        @can('why')
                            <li>
                                <a href="{{ route('why.index') }}">
                                    <i data-feather="calendar"></i>
                                    <span> Why </span>
                                </a>
                            </li>
                        @endcan
                        @can('terms')
                            <li>
                                <a href="{{ route('terms.index') }}">
                                    <i data-feather="calendar"></i>
                                    <span> terms </span>
                                </a>
                            </li>
                        @endcan
                        @can('jobs')
                            <li>
                                <a href="{{ route('jobs.index') }}">
                                    <i data-feather="calendar"></i>
                                    <span> Job </span>
                                </a>
                            </li>
                        @endcan
                        @can('inquiry')
                            <li>
                                <a href="{{ route('inquiry.index') }}">
                                    <i data-feather="calendar"></i>
                                    <span> Inquiry </span>
                                </a>
                            </li>
                        @endcan
                        @can('contact')
                            <li>
                                <a href="{{ route('contact.index') }}">
                                    <i data-feather="calendar"></i>
                                    <span> contact </span>
                                </a>
                            </li>
                        @endcan
                        @can('amenities')
                            <li>
                                <a href="{{ route('amenities.index') }}">
                                    <i data-feather="calendar"></i>
                                    <span> amenities </span>
                                </a>
                            </li>
                        @endcan


                </div>
                <!-- End Sidebar -->



            </div>
            <!-- Sidebar -left -->

        </div>

        <div class="right-bar">
            <div data-simplebar class="h-100">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs nav-bordered nav-justified" role="tablist">


                    <li class="nav-item">
                        <a class="nav-link py-2 active" data-toggle="tab" href="#settings-tab" role="tab">
                            <i class="mdi mdi-24px mdi-cog-outline d-block font-22 my-1"></i>
                        </a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content pt-0">

                    <div class="tab-pane active" id="settings-tab" role="tabpanel">
                        <h6 class="font-weight-medium px-3 m-0 py-2 font-13 text-uppercase bg-light">
                            <span class="d-block py-1">Theme Settings</span>
                        </h6>

                        <div class="p-3">
                            <div class="alert alert-warning" role="alert">
                                <strong>Customize </strong> the overall color scheme, sidebar menu, etc.
                            </div>

                            <h6 class="font-weight-medium font-14 mt-4 mb-2 pb-1">Color Scheme</h6>
                            <div class="custom-control custom-switch mb-1">
                                <input type="radio" class="custom-control-input" name="color-scheme-mode"
                                    value="light" id="light-mode-check" checked />
                                <label class="custom-control-label" for="light-mode-check">Light Mode</label>
                            </div>

                            <div class="custom-control custom-switch mb-1">
                                <input type="radio" class="custom-control-input" name="color-scheme-mode"
                                    value="dark" id="dark-mode-check" />
                                <label class="custom-control-label" for="dark-mode-check">Dark Mode</label>
                            </div>

                            <!-- Width -->
                            <h6 class="font-weight-medium font-14 mt-4 mb-2 pb-1">Width</h6>
                            <div class="custom-control custom-switch mb-1">
                                <input type="radio" class="custom-control-input" name="width" value="fluid"
                                    id="fluid-check" checked />
                                <label class="custom-control-label" for="fluid-check">Fluid</label>
                            </div>
                            <div class="custom-control custom-switch mb-1">
                                <input type="radio" class="custom-control-input" name="width" value="boxed"
                                    id="boxed-check" />
                                <label class="custom-control-label" for="boxed-check">Boxed</label>
                            </div>

                            <!-- Menu positions -->
                            <h6 class="font-weight-medium font-14 mt-4 mb-2 pb-1">Layout Position</h6>

                            <div class="custom-control custom-switch mb-1">
                                <input type="radio" class="custom-control-input" name="menus-position"
                                    value="fixed" id="fixed-check" checked />
                                <label class="custom-control-label" for="fixed-check">Fixed</label>
                            </div>

                            <div class="custom-control custom-switch mb-1">
                                <input type="radio" class="custom-control-input" name="menus-position"
                                    value="scrollable" id="scrollable-check" />
                                <label class="custom-control-label" for="scrollable-check">Scrollable</label>
                            </div>

                            <!-- Left Sidebar-->
                            <h6 class="font-weight-medium font-14 mt-4 mb-2 pb-1">Left Sidebar Color</h6>

                            <div class="custom-control custom-switch mb-1">
                                <input type="radio" class="custom-control-input" name="leftsidebar-color"
                                    value="light" id="light-check" checked />
                                <label class="custom-control-label" for="light-check">Light</label>
                            </div>

                            <div class="custom-control custom-switch mb-1">
                                <input type="radio" class="custom-control-input" name="leftsidebar-color"
                                    value="dark" id="dark-check" />
                                <label class="custom-control-label" for="dark-check">Dark</label>
                            </div>

                            <div class="custom-control custom-switch mb-1">
                                <input type="radio" class="custom-control-input" name="leftsidebar-color"
                                    value="brand" id="brand-check" />
                                <label class="custom-control-label" for="brand-check">Brand</label>
                            </div>

                            <div class="custom-control custom-switch mb-3">
                                <input type="radio" class="custom-control-input" name="leftsidebar-color"
                                    value="gradient" id="gradient-check" />
                                <label class="custom-control-label" for="gradient-check">Gradient</label>
                            </div>

                            <!-- size -->
                            <h6 class="font-weight-medium font-14 mt-4 mb-2 pb-1">Left Sidebar Size</h6>

                            <div class="custom-control custom-switch mb-1">
                                <input type="radio" class="custom-control-input" name="leftsidebar-size"
                                    value="default" id="default-size-check" checked />
                                <label class="custom-control-label" for="default-size-check">Default</label>
                            </div>

                            <div class="custom-control custom-switch mb-1">
                                <input type="radio" class="custom-control-input" name="leftsidebar-size"
                                    value="condensed" id="condensed-check" />
                                <label class="custom-control-label" for="condensed-check">Condensed <small>(Extra
                                        Small
                                        size)</small></label>
                            </div>

                            <div class="custom-control custom-switch mb-1">
                                <input type="radio" class="custom-control-input" name="leftsidebar-size"
                                    value="compact" id="compact-check" />
                                <label class="custom-control-label" for="compact-check">Compact <small>(Small
                                        size)</small></label>
                            </div>

                            <!-- User info -->
                            <h6 class="font-weight-medium font-14 mt-4 mb-2 pb-1">Sidebar User Info</h6>

                            <div class="custom-control custom-switch mb-1">
                                <input type="checkbox" class="custom-control-input" name="leftsidebar-user"
                                    value="fixed" id="sidebaruser-check" />
                                <label class="custom-control-label" for="sidebaruser-check">Enable</label>
                            </div>


                            <!-- Topbar -->
                            <h6 class="font-weight-medium font-14 mt-4 mb-2 pb-1">Topbar</h6>

                            <div class="custom-control custom-switch mb-1">
                                <input type="radio" class="custom-control-input" name="topbar-color"
                                    value="dark" id="darktopbar-check" checked />
                                <label class="custom-control-label" for="darktopbar-check">Dark</label>
                            </div>

                            <div class="custom-control custom-switch mb-1">
                                <input type="radio" class="custom-control-input" name="topbar-color"
                                    value="light" id="lighttopbar-check" />
                                <label class="custom-control-label" for="lighttopbar-check">Light</label>
                            </div>


                            <button class="btn btn-primary btn-block mt-4" id="resetBtn">Reset to Default</button>



                        </div>

                    </div>
                </div>

            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->
        @yield('content')
        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>
        <!-- Vendor js -->
        <script src="{{ url('assets/js/vendor.min.js') }}"></script>
        <script>
            let ChangeIcon = function(icon) {
                icon.classList.toggle('mdi-close-thick')
            }
        </script>

        <script>
            function deleteConfirmation(id) {
                var message = "Are you sure you want to delete this item?";
                var confirmButtonText = "Yes, delete";
                var cancelButtonText = "Cancel";

                swal({
                    title: "Delete Confirmation",
                    text: message,
                    icon: "warning",
                    buttons: [{
                            text: confirmButtonText,
                            value: true,
                        },
                        {
                            text: cancelButtonText,
                            value: false,
                        },
                    ],
                }).then((result) => {
                    if (result.value) {
                        // Delete the item
                    }
                });
            }
        </script>

        <script>
            $(".delete").on("submit", function() {
                return confirm("Do you want to delete this item?");
            });
        </script>
        <!-- Plugins js-->
        <script src="{{ url('assets/libs/flatpickr/flatpickr.min.js') }}"></script>


        <script src="{{ url('assets/libs/selectize/js/standalone/selectize.min.js') }}"></script>

        <!-- Dashboar 1 init js-->
        <script src="{{ url('assets/js/pages/dashboard-1.init.js') }}"></script>

        <!-- App js-->
        <script src="{{ url('assets/js/app.min.js') }}"></script>
        <script src="{{ url('assets/js/vendor.min.js') }}"></script>

        <!-- Summernote js -->
        <script src="{{ url('assets/libs/summernote/summernote-bs4.min.js') }}"></script>
        <!-- Select2 js-->
        <script src="{{ url('assets/libs/select2/js/select2.min.js') }}"></script>
        <!-- Dropzone file uploads-->
        <script src="{{ url('assets/libs/dropzone/min/dropzone.min.js') }}"></script>

        <!-- Init js-->
        <script src="{{ url('assets/js/pages/form-fileuploads.init.js') }}"></script>

        <!-- Init js -->
        <script src="{{ url('assets/js/pages/add-product.init.js') }}"></script>

        <!-- App js -->
        <script src="{{ url('assets/js/app.min.js') }}"></script>


        <script>
            jQuery(document).ready(function() {
                $('.summernote').summernote({
                    height: 230, // set editor height
                    minHeight: null, // set minimum height of editor
                    maxHeight: null, // set maximum height of editor
                    focus: false // set focus to editable area after initializing summernote
                });
            });
        </script>
        @yield('jsscript')
</body>

</html>
