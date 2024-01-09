@extends('layout_page')
@section('title', 'Home')

@section('jslink')
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css_pages/style.css') }}">
    <script src="{{ asset('assets/js/node_modules/jquery/dist/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/node_modules/owl.carousel/dist/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/node_modules/jquery/dist/jquery.js') }}"></script>
    <link rel="stylesheet"
        href="{{ asset('assets/js/node_modules/owl.carousel/docs/assets/owlcarousel/assets/owl.carousel.min.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('assets/js/node_modules/owl.carousel/docs/assets/owlcarousel/assets/owl.theme.default.css') }}">
@endsection


<!-- ------------------------------- -->
@section('content')
    <main>
        <div class="content-flued">
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <div class="carousel-indicators">
                    @foreach ($homes as $home)
                        @if ($loop->first)
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1"></button>
                        @else
                            <button type="button" data-bs-target="#carouselExampleCaptions"
                                data-bs-slide-to="{{ $loop->index }}" aria-label="Slide {{ $loop->iteration }}"></button>
                        @endif
                    @endforeach



                </div>
                <div class="carousel-inner" style="position: relative;">

                    @foreach ($homes as $home)
                        @if ($loop->first)
                            <div class="carousel-item active" style="position: relative;">
                                <img src="{{ asset('assets/img/home/' . $home->image) }}" class="d-block w-100 cvh-80 "
                                    alt="...">

                                <div class="card mb-3 header-card">
                                    <div class="card-body">
                                        <h5 style="font-size: 30px;" class="card-title">{{ $home->title }}</h5>
                                        <hr style="color: #ffffff;">
                                        <a href="{{ route('contact') }}"
                                            class="btn text-capitalize text-white  blue-bg-hover w-100 ">Book
                                            A View</a>
                                    </div>
                                </div>

                            </div>
                        @else
                            <div class="carousel-item " style="position: relative;">
                                <img src="{{ asset('assets/img/home/' . $home->image) }}" class="d-block w-100 cvh-80 "
                                    alt="...">

                                <div class="card mb-3 header-card">
                                    <div class="card-body">
                                        <h5 style="font-size: 30px;" class="card-title">{{ $home->title }}</h5>
                                        <hr style="color: #ffffff;">
                                        <a href="{{ route('contact') }}"
                                            class="btn text-capitalize text-white  blue-bg-hover w-100 ">Book
                                            A View</a>
                                    </div>
                                </div>

                            </div>
                        @endif
                    @endforeach



                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

            </div>
            <div class=" row justify-content-end position-relative">
                <div class="d-flex justify-content-center">
                    <div class="position-relative mb-3 text-center" style="margin-top: 2rem;">
                        <h2 class=" mt-md-0 font-VisbyCF-Bold text-uppercase new-text-head" style="margin-top: revert;">
                            <span class="co-55" style="color: #01a3d1;">CO-55</span>
                            <span style="color: black">SERVICES</span>
                        </h2>
                        <div class="position-absolute border-small-dot-new" style="color: #141212;"></div>
                        <div class="position-absolute border-small-line w-100" style="color: #0b0909;"></div>
                    </div>
                </div>

            </div>
            @foreach ($services as $service)
                @if ($loop->iteration % 2 == 0)
                    <section class="py-5 mid-grey- " id="{{ $service->name }}"
                        style="background-image: url(https://co55eg.com/frontend/assets/images/mid-grey-bg.png);">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4  d-flex  order-md-2 order-2">

                                    <div class="row h-100 leftsection">


                                        <div class="col-12 position-relative" style="text-align: start !;">
                                            <h3 class="d-inline-flex p-2  font-VisbyCF-Bold-title">
                                                {{ $service->name }}</h3>
                                            <div class="position-absolute border-small-dot"></div>
                                            <div class="position-absolute border-small-line"></div>
                                            <p class="font-VisbyCF-Regural" style="margin-top: 3rem;">
                                                {{ $service->description }}</p>
                                        </div>


                                        <div class="col-12 d-grid gap-2 align-self-end" style="margin-bottom: 10px;">

                                            <div class="row g-0 text-align-center"
                                                style="background-color: #F5F7F9; text-align: center;padding: 7px;">

                                                <div class="col-6">
                                                    <div class="ah position-relative">
                                                        <img src="https://co55eg.com/frontend/assets/icon/daily.svg"
                                                            alt="" width="20" height="20">



                                                    </div>
                                                    <div style="text-align: center;">Dialy</div>

                                                </div>
                                                <div class="col-6">
                                                    <div class="ahm">
                                                        <img src="https://co55eg.com/frontend/assets/icon/calendar.svg"
                                                            alt="" width="20" height="20">
                                                    </div>
                                                    <div>hourly</div>

                                                </div>


                                            </div>

                                            <button class="btn learn-btn btn-lg " style="border-radius: 0px;"
                                                type="submit"></i>Learn
                                                More</i></button>
                                        </div>


                                    </div>


                                </div>
                                <div class="col-md-8 order-md-1 order-1">
                                    <div class="position-relative">
                                        <img src="{{ asset('assets/img/services/' . $service->image) }}"
                                            class="img-fluid" alt="" width="100%">
                                        <div class="position-absolute black-box"></div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </section>
                @else
                    <div class="container text-center " id="{{ $service->name }}">
                        <div class="contianer-fluid">
                            <div class="row" style="margin-bottom:3.3rem;">
                                <div class=" col-md-8 order-1 order-md-2">
                                    <div class="position-relative">
                                        <img src="{{ asset('assets/img/services/' . $service->image) }}"
                                            class="img-fluid pos" alt="" width="100%">
                                        <div class="position-absolute black-box"></div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 order-2 order-md-1  text-align-start ">
                                    <div class="row h-100 leftsection">
                                        <div class="col-12 ">
                                            <div class="div position-relative font-VisbyCF-Bold">
                                                <h3 class="d-inline-flex p-2 bd-highlight font-VisbyCF-Bold-title"
                                                    style="display: flex !important;">
                                                    {{ $service->name }}
                                                </h3>
                                                <div class="position-absolute border-small-dot"></div>
                                                <div class="position-absolute border-small-line"></div>
                                            </div>
                                            <p class="font-VisbyCF-Regural" style="margin-top: 2rem;text-align: left;">
                                                {{ $service->description }}
                                            </p>
                                        </div>
                                        <div class="col-12 d-grid gap-2 align-self-end">
                                            <div class="row g-0" style="background-color: #F5F7F9;">
                                                <div class="col-6">
                                                    <div class="ah">
                                                        <img src="https://co55eg.com/frontend/assets/icon/annual.svg"
                                                            alt="" width="20" height="20">
                                                    </div>
                                                    <div>Annual</div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="ahm">
                                                        <img src="https://co55eg.com/frontend/assets/icon/calendar.svg"
                                                            alt="" width="20" height="20">
                                                    </div>
                                                    <div>Monthly</div>
                                                </div>
                                            </div>
                                            <button class="btn learn-btn btn-lg input-block-level"
                                                style="border-radius: 0px;" type="submit"></i>Learn
                                                More</i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
            <!-- ============================================ -->

            <div class="contianer">
                <div class="container-fluid "
                    style="background: rgb(0,0,0,0.9)url(https://co55eg.com/frontend/assets/images/dark-image.png);
                    background-blend-mode: darken;">
                    <div class=" row justify-content-end">
                        <div class="d-flex justify-content-center">
                            <div class="position-relative mb-5 text-center"
                                style="max-width: 300px ;font-size: 50px;margin-top: 20px;">
                                <p class=" mt-md-0 font-VisbyCF-Bold text-uppercase new-text-head"
                                    style="margin-top: revert;">
                                    <span class="co-55" style="color: white;">WHY</span>
                                    <span style="color: #01a3d1;">CO-55</span>
                                </p>
                                <div class="position-absolute border-small-dot-new" style="color: #eee;"></div>
                                <div class="position-absolute border-small-line w-100" id="why"
                                    style="color: #eee !important;">
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="contianer-fluid">
                        <div class="row justify-content-center">
                            @foreach ($why as $section)
                                <div class="col-lg-4 col-me-5 col-sm-6 w-90">
                                    <div class="contianer mb-5">
                                        <img src="{{ asset('assets/img/why/' . $section->image) }}" class="img-fliud"
                                            style="max-width: 100%;" alt="">
                                        <p class="font-VisbyCF-Bold"
                                            style="color: #eee;margin-top: 10px;font-size: 1.7rem;">
                                            {{ $section->name }}
                                        </p>
                                        <div class="div">
                                            <img src="https://co55eg.com/frontend/assets/icon/primary-line.svg"
                                                class="img-fliud" alt="">
                                        </div>
                                        <P class="font-VisbyCF-Regural"
                                            style="font-optical-sizing: 0.6;line-height: 1.1;

                                                  font-size: x-large;color: #82807f;">
                                            {{ $section->description }}</P>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="contianer"
                        style="background-image: url(https://co55eg.com/frontend/assets/images/mid-grey-bg.png);">
                        <div class=" row justify-content-end">
                            <div class="d-flex justify-content-center">
                                <div class="position-relative mb-5 text-center"
                                    style="margin-top: 20px;font-size: 1.5rem;">
                                    <p class=" mt-md-0 font-VisbyCF-Bold text-uppercase new-text-head"
                                        style="margin-top: revert;font-weight: 500;
                                        ">
                                        <span class="co-55" style="color: #01a3d1;">CO-55</span>
                                        <span style="color: black">TESTIMONIAL</span>
                                    </p>
                                    <div class="position-absolute border-small-dot-new" style="color: #141212;">
                                    </div>
                                    <div class="position-absolute border-small-line w-100" style="color: #0b0909;">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="container-fluid" style="background-image: url(../co-55/images/mid-grey-bg.png);">
                            <div class="row align-items-center justify-content-center">
                                <!-- <div class="col-sm-12 align-items-center justify-content-center"> -->
                                <div class="owl-carousel">
                                    <!-- <div class="col-4"> -->
                                    @foreach ($testimonials as $testimonial)
                                        <div class="item" style=" width: auto;">
                                            <div class="div">
                                                <div class="card "
                                                    style="width: 88%; margin: 0 auto;border-style: none;border-radius: 16px;">


                                                    <div class="card-body card-body-tes">

                                                        <div class="div card-testmonials-header shadow"
                                                            style="background-image: url({{ asset('assets/img/testimonials/' . $testimonial->image) }});">
                                                        </div>

                                                        <div class="div">
                                                            <p class="card-title text-dark text-center font-VisbyCF-Bold"
                                                                style="font-size: 22.5px;margin-top: 4rem;
                                                                 border-radius: 16px;">
                                                                {{ $testimonial->name }}</p>
                                                            <p
                                                                style="background-color: #F7F8FB;text-align: center;border-style: none;">
                                                                {{ $testimonial->title }}
                                                            </p>
                                                            <p class="card-text font-VisbyCF-Regural"
                                                                style="color:#74828f;padding-bottom: 2rem;">
                                                                {{ $testimonial->article }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                    <!-- </div> -->

                                </div>


                                <!-- </div> -->



                            </div>


                        </div>

                        <div class="row"
                            style="font-size: larger;
                              padding-bottom: 5rem;
                                   padding-top: 5rem;">
                            <div class=" row justify-content-end">
                                <div class="d-flex justify-content-center">
                                    <div class="position-relative mb-5 text-center"
                                        style="margin-top: 20px;font-size: 1.5rem;">
                                        <p class=" mt-md-0 font-VisbyCF-Bold text-uppercase new-text-head"
                                            style="margin-top: revert;font-weight: 500;
                                            ">
                                            <span class="co-55" style="color: #01a3d1;">CO-55</span>
                                            <span style="color: black">AMENITIES</span>
                                        </p>
                                        <div class="position-absolute border-small-dot-new" style="color: #141212;">
                                        </div>
                                        <div class="position-absolute border-small-line w-100" style="color: #0b0909;">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="contianer">
                                <div class="container text-center  ">

                                    <div class="row justify-content-center">
                                        @foreach ($amenities as $amenity)
                                            <div class="col-lg-2 col-5 col-md-4 col-ameni">
                                                <img src="{{ asset('assets/img/amenities/' . $amenity->image) }}"
                                                    alt="" width="40" height="40" style="margin: auto">
                                                <div id="ame" class="border-amenitie-image my-2 mx-auto"></div>

                                                <div class="text-center icon-p">{{ $amenity->name }}</div>
                                                <div class="border-amenitie-desc my-2 mx-auto"></div>
                                            </div>
                                        @endforeach


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

    </main>
@endsection

@section('jsscript')
    <script src="{{ asset('assets/js/node_modules/jquery/dist/jquery.js') }}"></script>

    <script src="{{ asset('assets/js/node_modules/jquery/dist/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/node_modules/owl.carousel/dist/owl.carousel.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.owl-carousel').owlCarousel();
        });
    </script>
    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 0,
            nav: true,
            items: {{ $testimonialsCount }},
            autoplay: false,
            dots: true,
            autoplayTimeout: 8500,
            smartSpeed: 450,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 1
                },
                1170: {
                    items: 1
                }
            }
        })
    </script>
    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();

                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
    <script>
        function navigate() {
            // Set the URL and navigate
            window.location.replace = 'www.google.com';
        }
    </script>
@endsection
