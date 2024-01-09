@extends('layout_page')
@section('title', 'Services')
@section('jslink')
    <link rel="stylesheet" href="{{ url('assets/css_pages/services.css') }}">
@endsection

@section('content')
    <main>
        <div class="d-flex justify-content-center text-uppercase"
            style="margin-top: 4rem;background: rgba(243,244,247,.3);padding-bottom: 2rem;">
            <div class="position-relative  text-center" style="font-size: 1.25rem;">
                <p class="  font-VisbyCF-Bold text-uppercase new-text-head "
                    style="margin-top: revert;font-weight: 500;
                    font-size: 2.5rem;">

                    <span style="color: black">Services</span>
                </p>
                <div class="position-absolute border-small-dot-new" style="color: #141212;">
                </div>
                <div class="position-absolute border-small-line w-100" style="color: #0b0909;">
                </div>
            </div>
        </div>
        @foreach ($services as $service)
            @if ($loop->iteration % 2 == 0)
                <div class="contianer-fliud text-center  bg-co" id="{{ $service->name }}">
                    <div class="div" style="padding-bottom: 3rem;padding-top: 3rem;">
                        <div class="row">
                            <div class="col-lg-3 col-md-2 col-2"></div>
                            <div class="col-lg-6 col-md-8 col-8">

                                <div class="div position-relative text-uppercase" style="margin-bottom: 2rem;">
                                    <h3 class="d-inline-flex p-2 bd-highlight"
                                        style="display: flex !important;font-weight: bold;">
                                        {{ $service->name }}
                                    </h3>
                                    <div class="position-absolute border-small-dot"></div>
                                    <div class="position-absolute border-small-line-new"></div>

                                </div>
                                <img src="{{ asset('assets/img/services/' . $service->image) }}" alt=""
                                    width="100%">
                                <p style="margin-top: 20px;text-align: left;">{{ $service->description }}
                                </p>

                            </div>
                            <div class="col-lg-3 col-md-2 col-2"></div>
                        </div>

                        <div class="contianer text-center mt-2">

                            <div class="row pt-3">
                                <div class="col-lg-3 col-md-2 col-sm-1 col-1"></div>
                                <div class="col-lg-6 col-md-8 col-sm-10 col-10">
                                    <div class="row text-align-center">
                                        @foreach ($service->services_icons as $icon)
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                                                <img src="{{ asset('assets/img/services/icons/' . $icon->image) }}"
                                                    alt="" width="46" height="106"
                                                    style=" margin: auto;object-fit:contain;">
                                                <div class="text-center fa-p">{{ $icon->title }}
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-1 col-1"></div>



                            <div class=" row justify-content-center">
                                <div class="text-center mt-4">
                                    <div class="d-inline-flex p-2 bd-highlight " style="font-size: 40px;font-weight: 700;">
                                        <button type="button" class="btn service-btn text-capitalize btn-nav">
                                            <a href="{{ route('inquiry') }}">inquiry now</a></button>
                                    </div>
                                    <!-- <hr> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="contianer-fliud text-center  bg-co" id="{{ $service->name }}">
                    <div class="div" style="background: rgba(255,255,255,.7);padding-bottom: 3rem;">
                        <div class="row">
                            <div class="col-lg-3 col-md-2 col-2"></div>
                            <div class="col-lg-6 col-md-8 col-8">

                                <div class="div position-relative " style="margin-bottom: 2rem;">
                                    <h3 class="d-inline-flex p-2 bd-highlight"
                                        style="display: flex !important;font-weight: bold;">
                                        {{ $service->name }}
                                    </h3>
                                    <div class="position-absolute border-small-dot"></div>
                                    <div class="position-absolute border-small-line-new"></div>

                                </div>
                                <div class="div position-relative">
                                    <img src="{{ asset('assets/img/services/' . $service->image) }}" alt=""
                                        width="100%">
                                    <div class="position-absolute black-box"></div>
                                </div>
                                <p style="margin-top: 20px;text-align: left;">
                                    {{ $service->description }}
                                </p>

                            </div>
                            <div class="col-lg-3 col-md-2 col-2"></div>
                        </div>

                        <div class="contianer text-center mt-2">

                            <div class="row pt-3">
                                <div class="col-lg-3 col-md-2 col-sm-1 col-1"></div>
                                <div class="col-lg-6 col-md-8 col-sm-10 col-10">
                                    <div class="row text-align-center">
                                        @foreach ($service->services_icons as $icon)
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                                                <img src="{{ asset('assets/img/services/icons/' . $icon->image) }}"
                                                    alt="" width="46" height="106"
                                                    style="margin: auto;object-fit:contain;">
                                                <div class="text-center fa-p">{{ $icon->title }}
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-1 col-1"></div>
                            <div class=" row justify-content-center">
                                <div class="text-center mt-4">
                                    <div class="d-inline-flex p-2 bd-highlight " style="font-size: 40px;font-weight: 700;">
                                        <button type="button" class="btn service-btn text-capitalize btn-nav"><a
                                                href="./book.html">inquiry now</a></button>
                                    </div>
                                    <!-- <hr> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </main>
@endsection
