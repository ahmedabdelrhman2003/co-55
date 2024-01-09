@extends('layout_page')
@section('jslink')
    <link rel="stylesheet" href="{{ url('assets/css_pages/abouts.css') }}">
@endsection

@section('title', 'About Us')
@section('content')
    <main>
        <div class="container-fluid "
            style="background: url(https://co55eg.com/frontend/assets/images/about-us.png);height: 350px;
          background-blend-mode: darken;margin-top:5rem">

            <div class=" row  text-align-center">
                <div class="col-2"></div>
                <div class="col-12 col-lg-8 col-md-8 col-sm-8 justify-content-center ">
                    <div class="text-center mt-2 t">
                        <div class=" d-inline-flex p-2 bd-highlight ">
                            <p class=" text-light text-center">

                            <div class="new">CHANGING HOW AND WHERE YOU WORK</div>

                            </p>
                        </div>
                    </div>
                </div>
                <!-- <hr> -->
            </div>
            <div class="col-2"></div>

        </div>
        </div>
        <!-- ----- -->

        <div class="contianer-fluid body" style="height: 100%;">
            <div class="row row-about-top">
                <div class="col-md-2"></div>

                <div class="col-md-8">
                    <div class="row">
                        <div class="col-lg-4 col-md-5 font-VisbyCF-Regural">
                            <div class="big">ABOUT</div>
                            <div class="big" style="color: #1ba5cc;">US</div>
                        </div>
                        <div class="col-lg-8 col-md-12 mt-2 article">{{ $abouts->description }}</div>
                    </div>
                    <hr>
                </div>
                <div class="col-md-2"></div>
            </div>
            <div class="row row-about-buttom">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="row">

                        <div class="col-lg-8 col-md-12 order-lg-1 order-sm-2 order-2 order-md-2 mt-3 article">Lorem
                            {{ $philosophy->description }}
                        </div>
                        <div
                            class="col-md-4 al justify-content-end col-lg-4 col-md-5 order-lg-2 order-md-1 order-sm-1 order-1 font-VisbyCF-Regural">
                            <div class=" justify-content-end big" style="color: #1ba5cc;">OUR</div>
                            <div class=" justify-content-end big">PHILOSOPHY</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>

    </main>
@endsection
