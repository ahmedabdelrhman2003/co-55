@extends('layout')
@section('title', 'view location | co-55 - Admin Dashboard ')
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
                                    <li class="breadcrumb-item"><a href="{{ route('locations.index') }}"> Location</a></li>
                                    <li class="breadcrumb-item active"> View Home</li>
                                </ol>
                            </div>
                            <h4 class="page-title">View Location</h4>
                        </div>
                    </div>
                </div>
                <!-- start page title -->

                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card-box">
                            <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">location</h5>
                            <div class="row">

                                <div class="col-lg-12">

                                    <div class="tab-content pt-0">
                                        <div class="tab-pane active show" id="product-1-item">
                                            <img src="{{ asset('assets/img/location/' . $location->image) }}" alt=""
                                                class="img-fluid mx-auto d-block rounded">
                                        </div>
                                        <h4 class="mb-3">{{ $location->name }}</h4>
                                        <h5 class="text-muted mb-4">{{ $location->description }}.</h5>
                                        <h6 class="text-muted mb-4">{{ $location->article }}.</h6>

                                    </div>


                                    </ul>
                                </div> <!-- end col -->

                                <div class="col-lg-12">
                                    <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">location icons</h5>

                                    <div class="pl-xl-3 mt-3 mt-xl-0">


                                        <div class="row mb-3">
                                            @foreach ($icons as $icon)
                                                <div class="col-md-4">
                                                    <div class="div">
                                                        {{ $icon->name }}
                                                    </div>
                                                    <div class="div">
                                                        {{ $icon->title }}
                                                    </div>
                                                    <div class="tab-pane active show mt-3">
                                                        <img class="img-fluid mx-auto d-block rounded"
                                                            src=" {{ asset('assets/img/locations/icons/' . $icon->image) }}"
                                                            alt="">
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                        <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">location Images</h5>

                                        <div class="row mb-3">
                                            @foreach ($images as $image)
                                                <div class="col-md-6">

                                                    <div class="tab-pane active show mt-3">
                                                        <img class="img-fluid mx-auto d-block rounded"
                                                            src=" {{ asset('assets/img/locations/img/' . $image->image) }}"
                                                            alt="">
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                        {{-- <div class="col-md-6">
                                        @foreach ($images as $image)
                                            <div class="div">
                                                <img src="{{ asset('assets/img/locations/img/' . $image->image) }}"
                                                    alt="">
                                            </div>
                                        @endforeach
                                    </div> --}}
                                    </div>
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
