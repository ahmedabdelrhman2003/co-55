@extends('layout')
@section('title', 'Dashboard | co-55 - Admin Dashboard ')

<!-- Left Sidebar End -->
<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->
@section('content')
    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-flued">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">

                            <h4 class="page-title">Dashboard</h4>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-bottom: 1rem;">

                    <div class="col-12">
                        <div class="row">

                            <div class="col-12 ">
                                <form action="{{ route('dashboard.filter') }}" method="get" class="d-flex"
                                    style="align-items: flex-end">
                                    @csrf
                                    <div class="div">


                                        <label for="inputState" class="form-label">Date</label>
                                        <select id="inputState" class="form-control" name="filter">
                                            <option value="all_date">All date</option>
                                            <option value="today">Today</option>
                                            <option value="yesterday">yesterday</option>
                                            <option value="this_week">this week</option>
                                            <option value="last_week">last week</option>
                                            <option value="this_month">this month</option>
                                            <option value="last_month">last month</option>
                                        </select>
                                    </div>
                                    <button style="margin-left:1rem;" type="submit"
                                        class="btn btn-blue waves-effect waves-light">filter</button>
                                </form>

                            </div>


                        </div>

                    </div>



                </div>
                <div class="row">
                    <div class="col-md-6 col-xl-3">
                        <div class="widget-rounded-circle card-box">
                            <div class="row">

                                @can('amenities')
                                    <div class="col-6">
                                        <div class="avatar-lg rounded-circle bg-soft-blue border-blue border">
                                            <i class="fe-shopping-cart font-22 avatar-title text-blue"></i>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="text-right">
                                            <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $amenities }}</span>
                                            </h3>
                                            <p class="text-muted mb-1 text-truncate">Amenities</p>
                                        </div>
                                    </div>
                                </div>
                            @endcan
                            <!-- end row-->
                        </div> <!-- end widget-rounded-circle-->
                    </div> <!-- end col-->
                    @can('abouts')
                        <div class="col-md-6 col-xl-3">
                            <div class="widget-rounded-circle card-box">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="avatar-lg rounded-circle bg-soft-blue border-blue border">
                                            <i class="fe-shopping-cart font-22 avatar-title text-blue"></i>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-right">
                                            <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $abouts }}</span>
                                            </h3>
                                            <p class="text-muted mb-1 text-truncate">Abouts</p>
                                        </div>
                                    </div>
                                </div> <!-- end row-->
                            </div> <!-- end widget-rounded-circle-->
                        </div> <!-- end col-->
                    @endcan
                    @can('faqs')
                        <div class="col-md-6 col-xl-3">
                            <div class="widget-rounded-circle card-box">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="avatar-lg rounded-circle bg-soft-blue border-blue border">
                                            <i class="fe-shopping-cart font-22 avatar-title text-blue"></i>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-right">
                                            <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $faqs }}</span>
                                            </h3>
                                            <p class="text-muted mb-1 text-truncate">Faqs</p>
                                        </div>
                                    </div>
                                </div> <!-- end row-->
                            </div> <!-- end widget-rounded-circle-->
                        </div>
                    @endcan
                    <!-- end col-->
                    @can('home')
                        <div class="col-md-6 col-xl-3">
                            <div class="widget-rounded-circle card-box">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="avatar-lg rounded-circle bg-soft-blue border-blue border">
                                            <i class="fe-shopping-cart font-22 avatar-title text-blue"></i>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-right">
                                            <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $home }}</span>
                                            </h3>
                                            <p class="text-muted mb-1 text-truncate">Home</p>
                                        </div>
                                    </div>
                                </div> <!-- end row-->
                            </div> <!-- end widget-rounded-circle-->
                        </div>
                    @endcan <!-- end col-->
                    @can('locations')
                        <div class="col-md-6 col-xl-3">
                            <div class="widget-rounded-circle card-box">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="avatar-lg rounded-circle bg-soft-blue border-blue border">
                                            <i class="fe-shopping-cart font-22 avatar-title text-blue"></i>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-right">
                                            <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $locations }}</span>
                                            </h3>
                                            <p class="text-muted mb-1 text-truncate">Locations</p>
                                        </div>
                                    </div>
                                </div> <!-- end row-->
                            </div> <!-- end widget-rounded-circle-->
                        </div>
                    @endcan
                    @can('services')
                        <div class="col-md-6 col-xl-3">
                            <div class="widget-rounded-circle card-box">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="avatar-lg rounded-circle bg-soft-blue border-blue border">
                                            <i class="fe-shopping-cart font-22 avatar-title text-blue"></i>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-right">
                                            <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $services }}</span>
                                            </h3>
                                            <p class="text-muted mb-1 text-truncate">Services</p>
                                        </div>
                                    </div>
                                </div> <!-- end row-->
                            </div> <!-- end widget-rounded-circle-->
                        </div>
                    @endcan
                    @can('why')
                        <div class="col-md-6 col-xl-3">
                            <div class="widget-rounded-circle card-box">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="avatar-lg rounded-circle bg-soft-blue border-blue border">
                                            <i class="fe-shopping-cart font-22 avatar-title text-blue"></i>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-right">
                                            <h3 class="text-dark mt-1"><span
                                                    data-plugin="counterup">{{ $why }}</span>
                                            </h3>
                                            <p class="text-muted mb-1 text-truncate">Why</p>
                                        </div>
                                    </div>

                                </div> <!-- end row-->

                            </div> <!-- end widget-rounded-circle-->

                        </div>
                    @endcan
                    @can('jobs')
                        <div class="col-md-6 col-xl-3">
                            <div class="widget-rounded-circle card-box">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="avatar-lg rounded-circle bg-soft-blue border-blue border">
                                            <i class="fe-shopping-cart font-22 avatar-title text-blue"></i>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-right">
                                            <h3 class="text-dark mt-1"><span
                                                    data-plugin="counterup">{{ $jobs }}</span>
                                            </h3>
                                            <p class="text-muted mb-1 text-truncate">Jobs</p>
                                        </div>
                                    </div>

                                </div> <!-- end row-->

                            </div> <!-- end widget-rounded-circle-->

                        </div>
                    @endcan
                    @can('inquiry')
                        <div class="col-md-6 col-xl-3">
                            <div class="widget-rounded-circle card-box">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="avatar-lg rounded-circle bg-soft-blue border-blue border">
                                            <i class="fe-shopping-cart font-22 avatar-title text-blue"></i>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-right">
                                            <h3 class="text-dark mt-1"><span
                                                    data-plugin="counterup">{{ $inquiry }}</span>
                                            </h3>
                                            <p class="text-muted mb-1 text-truncate">Inquiries</p>
                                        </div>
                                    </div>

                                </div> <!-- end row-->

                            </div> <!-- end widget-rounded-circle-->

                        </div>
                    @endcan
                    @can('contact')
                        <div class="col-md-6 col-xl-3">
                            <div class="widget-rounded-circle card-box">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="avatar-lg rounded-circle bg-soft-blue border-blue border">
                                            <i class="fe-shopping-cart font-22 avatar-title text-blue"></i>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-right">
                                            <h3 class="text-dark mt-1"><span
                                                    data-plugin="counterup">{{ $contact }}</span>
                                            </h3>
                                            <p class="text-muted mb-1 text-truncate">Contact</p>
                                        </div>
                                    </div>

                                </div> <!-- end row-->

                            </div> <!-- end widget-rounded-circle-->

                        </div>
                    @endcan
                    @can('testimonials')
                        <div class="col-md-6 col-xl-3">
                            <div class="widget-rounded-circle card-box">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="avatar-lg rounded-circle bg-soft-blue border-blue border">
                                            <i class="fe-shopping-cart font-22 avatar-title text-blue"></i>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-right">
                                            <h3 class="text-dark mt-1"><span
                                                    data-plugin="counterup">{{ $testimonials }}</span>
                                            </h3>
                                            <p class="text-muted mb-1 text-truncate">Testimonial</p>
                                        </div>
                                    </div>

                                </div> <!-- end row-->

                            </div> <!-- end widget-rounded-circle-->

                        </div>
                    @endcan
                </div>
            </div>
            <!-- Footer Start -->

            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
@endsection
<!-- END wrapper -->

<!-- Right Sidebar -->
