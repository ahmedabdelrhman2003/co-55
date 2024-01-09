<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <link rel="stylesheet" href="{{ url('assets/css_pages/style.css') }}">

    <link rel="shortcut icon" type="image/png" href="{{ url('assets/images/icon.png') }}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/7ebb7edc54.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    @yield('jslink')
    <title>@yield('title')</title>
</head>





<body class="body" style="margin: 0px;">


    <div class="content" style="margin-bottom: 5rem;">

        <nav class=" navbar navbar-expand-lg navbar-dark sticky-top w-100"
            style="background-color: black; position: fixed;">
            <div class="container " style="font-size: 20px;margin-top: auto;">
                <a class="navbar-brand" href="{{ route('home') }}"> <img src="{{ url('assets/images/logo (1).png') }}"
                        alt="Bootstrap" width="50" height="56">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">



                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0  ">
                        <li class="nav-item me-2">
                            <a class="nav-link active about-nav respon" aria-current="page"
                                href="{{ route('abouts') }}">About
                                Us</a>
                        </li>
                        <div class="contianer respon"
                            style="background-color:rgb(0, 0, 0);position: relative;margin-top: 8px;">
                            <div class="dropdown">
                                <a href="{{ route('services') }}" style="text-decoration: none;color: white;"
                                    aria-expanded="">
                                    <div class="dropdown-toggle" style="margin-right: 1.3rem;"
                                        data-mdb-toggle="dropdown" id="dropdownMenuButton">
                                        Service</div>
                                </a>
                                <ul class="dropdown-menu " aria-labelledby="dropdownMenuButton"
                                    style=" color: white;background-color: #080806;">
                                    @foreach ($services as $service)
                                        <li><a class="dropdown-item " style="color: #ffffff;tex-transform:uppercase"
                                                href="#{{ $service->name }}">{{ $service->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="contianer respon mb-2"
                            style="background-color:rgb(0, 0, 0);position: relative;margin-top: 8px;">
                            <div class="dropdown">
                                <a href="{{ route('location') }}" style="text-decoration: none;color: white;"
                                    aria-expanded="">
                                    <div class="dropdown-toggle" style="margin-right: 1.3rem;"
                                        data-mdb-toggle="dropdown" id="dropdownMenuButton">
                                        Location</div>
                                </a>
                                <ul class="dropdown-menu " aria-labelledby="dropdownMenuButton"
                                    style="color: white;background-color: #080806;">
                                    @foreach ($locations as $location)
                                        <li><a class="dropdown-item " style="color: #ffffff;"
                                                href="{{ route('location', $location->id) }}">{{ $location->name }}</a>
                                        </li>
                                    @endforeach
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <li class="nav-item navbar-expand-lg">
                            <button class="btn btn-lg me-2 navbar-expand-lg btn-nav" type="submit"><i
                                    class="fa-solid fa-mobile-screen-button me-2 "></i>
                                <a href="{{ route('inquiry') }}">inquire Now</a> </button>
                        </li>
                        <li><button class="btn  btn-lg btn-nav" type="submit"><a href="{{ route('auth.login') }}"><i
                                        class="fa-solid fa-user"></i>&nbsp;Login</a></button>
                        </li>
                </div>


                </ul>

                </form>
            </div>
    </div>
    </nav>
    <!-- ------------------------------- -->
    @yield('content')
    <footer>
        <div class="container-fluid background-dark" style="background-color: rgb(0,0,0,0.9);margin-bottom:-5rem;">
            <div class="footer mt"></div>
            <div class="row text-align-center footer-s1">
                <div class=" mt-4 col-12 col-lg-3 col-md-3 col-sm-12 text-center">
                    <a href="{{ route('home') }}"> <img src="https://co55eg.com/frontend/assets/icon/footer-logo.svg"
                            class="footer-logo" alt="co-55" width="55" height="60">
                    </a>
                </div>
                <div class="col-md-none col-sm-6 col-lg-3 col-4 mt-4 col-6 text-white text-lg">

                    <ul class="list-unstyled footer-s1-li"
                        style="display: grid;
                    justify-content: center;">
                        <li><a class="footer-a"></a>Location</a></li>
                        @foreach ($locations as $location)
                            <li>{{ $location->name }} <a href="{{ route('location', $location->id) }}"
                                    class="footer-a"><span style="color: #0ab2d9 !important;font-size:large"> view
                                        on</span></a></li>
                        @endforeach


                    </ul>
                </div>
                <div class="col-lg-3 col-sm-6 mt-4 col-6 text-white text-bg">

                    <ul class="list-unstyled footer-s1-li">

                        <li><a href="{{ route('services') }}" class="footer-a"> Services</a></li>
                        <li><a href="{{ route('faqs') }}" class="footer-a">FAQs</a></li>
                        <li><a href="{{ route('career') }}" class="footer-a">career</a></li>

                    </ul>
                </div>
                <div class="col-lg-3 col-sm-4 mt-4 col-12 text-white">

                    <ul class="list-unstyled footer-s1-li terms">

                        <li> <a href="{{ route('terms') }}" class="footer-a">terms and condition</a></li>
                        <li><a href="{{ route('privacy') }}" class="footer-a">privacy policy</a></li>
                        <li><a href="{{ route('contact') }}" class="footer-a">contact us</a></li>

                    </ul>
                </div>
                <hr class="hr hr-blurry" style="color: #eee;" />
            </div>

            <div class="row text-white footer-s2">
                <!-- ------------------------------------------------------ -->

                <div class="col-1 order-first"></div>
                <div class="col-md-12 col-xl-4   order-xl-first order-md-last">
                    <ul class="list-unstyled">
                        <li>copyright <i class="fa-regular fa-copyright"></i>2023 all rights Reserved</li>
                        <li> adesigned & and developed by <span style="color: #0ab2d9 !important;"> <a href=""
                                    style="color: #0ab2d9 !important;" class="footer-a">intcore</a></span>
                        </li>
                    </ul>
                </div>
                <div class="col-xl-2 col-md-12 order-xl-2 order-md-3">
                    <p> <i class="fa-brands fa-lg fa-facebook footer-s2-link"></i> <i
                            class="fa-brands fa-twitter fa-lg footer-s2-link"></i> <i
                            class="fa-brands fa-linkedin fa-lg footer-s2-link"></i></p>
                </div>
                <div class="col-xl-2 col-md-12 order-xl-3 order-md-1">
                    <p><i class="fa-solid fa-mobile-screen-button mr-1 "></i> <a href="tel:+01068970206"
                            class="footer-s2-link">+0100484717</a> </p>
                </div>
                <div class="col-xl-2 col-md-12 order-xl-4 order-md-2">
                    <p><i class="fa-solid fa-envelope-open"></i><a href="mailto:info@co55eg.com"
                            class="footer-s2-link " style="margin-left: 10px;">info@co55eg.com</a></p>
                </div>
            </div>

        </div>
    </footer>
    </div>
    </div>
    @yield('jsscript')
</body>

</html>
