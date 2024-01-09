@extends('layout')
@section('title', ' view amenity | co-55 - Admin Dashboard ')
@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('amenities.index') }}">Amenities</a></li>
                                    <li class="breadcrumb-item active"> View Amenity</li>
                                </ol>
                            </div>
                            <h4 class="page-title">View Amenities</h4>
                        </div>
                    </div>
                </div>
                <!-- start page title -->

                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card-box">
                            <div class="row">
                                <div class="col-lg-12">

                                    <div class="tab-content pt-0">
                                        <div class="tab-pane active show" id="product-1-item">
                                            <img src="{{ asset('assets/img/amenities/' . $amenities->image) }}"
                                                alt="" class="img-fluid mx-auto d-block rounded">
                                        </div>

                                    </div>


                                    </ul>
                                </div> <!-- end col -->
                                <div class="col-lg-12">
                                    <div class="pl-xl-3 mt-3 mt-xl-0" style="justify-content: center;display:flex">
                                        <h4 class="mb-3">{{ $amenities->name }}</h4>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                    </div> <!-- end card-->
                </div> <!-- end col-->
            </div>
            <!-- end row-->
        </div>
    </div> <!-- container -->
    </div>
@endsection
