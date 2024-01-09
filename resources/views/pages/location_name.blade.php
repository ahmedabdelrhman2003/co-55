@extends('layout_page')
@section('title', $location->name)
@section('jslink')
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css_pages/nacer_city.css') }}">
   
@endsection
@section('content')
    <main>
        <div class="content body">
            <div class="d-flex justify-content-center text-uppercase" style="margin-top: 4rem;">
                <div class="position-relative  text-center">
                    <p class="font-VisbyCF-Bold text-uppercase new-text-head" style="margin-top: revert;">
                        <span style="color: black">{{ $location->name }}</span>
                    </p>
                    <div class="position-absolute border-small-dot-new" style="color: #141212;">
                    </div>
                    <div class="position-absolute border-small-line w-100" style="color: #0b0909;">
                    </div>
                </div>
            </div>
            <div class="container-fluid mt-4">
                <div class="row">
                    <div class="col-md-2 col-sm-0"></div>
                    <div class="col-md-8 col-sm-12">

                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">

                                @foreach ($images as $image)
                                    @if ($loop->iteration == 1)
                                        <button type="button" data-bs-target="#carouselExampleControls"
                                            data-bs-slide-to="0" class="active" aria-current="true"
                                            aria-label="Slide 1"></button>
                                    @else
                                        <button type="button" data-bs-target="#carouselExampleControls"
                                            data-bs-slide-to="{{ $loop->index }}"
                                            aria-label="Slide {{ $loop->iteration }}"></button>
                                    @endif
                                @endforeach
                            </div>
                            <div class="carousel-inner">
                                @foreach ($images as $image)
                                    @if ($loop->iteration == 1)
                                        <div class="carousel-item  active">
                                            <img src="{{ asset('assets/img/locations/img/' . $image->image) }}"
                                                class="d-block w-100 h-450" alt="...">
                                        </div>
                                    @else
                                        {{-- @dd($image) --}}

                                        <div class="carousel-item ">
                                            <img src="{{ asset('assets/img/locations/img/' . $image->image) }}"
                                                class="d-block w-100 h-450" alt="...">
                                        </div>
                                    @endif
                                @endforeach

                            </div>

                            <button class="carousel-control-prev " type="button" data-bs-target="#carouselExampleControls"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon cairo-prev" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next " type="button" data-bs-target="#carouselExampleControls"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon cairo-next" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        <p style="margin-top: 10px;font-size: large;
                        font-weight: 500;">
                            {{ $location->article }}
                        </p>

                        <div class="row mt-4 text-center">
                            @foreach ($icons as $icon)
                                <div class="col-md-4">
                                    <img src="{{ asset('assets/img/locations/icons/' . $icon->image) }}" alt=""
                                        width="46" height="106" style=" margin: auto;object-fit:contain;">
                                    <p class="fa-p">{{ $icon->title }}</p>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="col-md-2 col-sm-0"></div>
                </div>
            </div>
            <div class="contianer mb-4">
                <div class="row me-0 ">
                    <div class="col-md-1 col-sm-1 col-1"></div>
                    <div class="col-md-10 col-10 col-sm-10">
                        <div class="row" style="background-color: #2e3748;">
                            <div class="col-lg-8 col-sm-8 col-sm-8 col-12 p-2 ">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3455.852267213177!2d31.230661700000002!3d29.9836754!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x145840c7e540c74d%3A0x11ce7ab8130331e9!2sIntcore%20-%20Web%20%26%20Mobile%20App%20Development%20Company!5e0!3m2!1sar!2seg!4v1676301955683!5m2!1sar!2seg"
                                    width="550" height="350" style="border:0;" class="w-100" allowfullscreen=""
                                    loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                                </iframe>
                            </div>
                            <div class="col-lg-4 col-sm-4 col-md-4 col-12 p-2 d-grid" style="color: white;">
                                <div class="row">
                                    <div style="font-weight: 700; font-size: 1.25rem;">contact info

                                    </div>
                                    <div>
                                        <p>
                                            <i class="fa-solid fa-mobile-screen-button mr-1 mt-2 fa-new"></i>
                                            <a style="color: white;text-decoration: none;" class="contact-p"
                                                href="tell:01068970206">
                                                01068970206</a>
                                        </p>
                                    </div>
                                    <hr
                                        style="
                            border: 0;
                            height: 1px;
                            background-image: linear-gradient(to right, rgba(255, 255, 255, 0), rgba(255, 248, 248, 0.75), rgba(255, 251, 251, 0)); ">
                                </div>
                                <div class="row ">
                                    <div>
                                        <p><i class="fa-solid fa-envelope-open mr-1 fa-new"></i><a
                                                style="color: white;text-decoration: none;" class="contact-p"
                                                href="info@co55eg.com">info@co55eg.com</a></p>
                                    </div>
                                    <div class="div d-flex">
                                        <i class="fa-solid fa-envelope-open fa-new mt-1 "></i>
                                        <p class="contact-p">{{ $location->description }}</p>
                                    </div>
                                    <div class="div " style="margin-top: 2rem">
                                        <a href="" class="btn btn-lg cairo-btn w-100 text-capitalize ">contact
                                            us</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1 col-sm-1 "></div>

                </div>
            </div>
        </div>
    </main>
@endsection
@section('jsscript')

@endsection
