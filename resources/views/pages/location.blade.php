@extends('layout_page')
@section('title', 'Locations')
@section('jslink')
    <link rel="stylesheet" href="{{ url('assets/css_pages/location.css') }}">

@endsection
@section('content')
    <main>
        <!-- -------------------- -->
        <div class="container-fluid body">

            <div class=" row justify-content-end pt-5" style="margin-top: 3rem;">
                <div class="d-flex justify-content-center">
                    <div class="position-relative mb-5 text-center" style="margin-top: 20px;font-size: 1.5rem;">
                        <p class=" mt-md-0 font-VisbyCF-Bold text-uppercase new-text-head"
                            style="margin-top: revert;font-weight: 500;
                            font-size: 1.5em;">

                            <span style="color: black">LOCATIONS</span>
                        </p>
                        <div class="position-absolute border-small-dot-new" style="color: #141212;">
                        </div>
                        <div class="position-absolute border-small-line w-100" style="color: #0b0909;">
                        </div>
                    </div>
                </div>

            </div>
            <!-- ----------------------- -->
            <div class="row" style="padding-bottom: 2rem;justify-content:center">

                @foreach ($locations as $location)
                    <div class="col-lg-4 col-md-4 col-sm-10" style="margin-bottom: 2rem;">
                        <img src="{{ asset('assets/img/location/' . $location->image) }}"class="location-img" alt=""
                            width="100%">
                        <div class="position-relative mb-3" style="margin-top: 10px;">
                            <p class="mt-2 mt-md-0  text-uppercase"
                                style="font-size: 1.5rem;
                        font-weight: 600;">
                                {{ $location->name }}</p>
                            <div class="position-absolute border-small-dot-new"></div>
                            <div class="position-absolute border-small-line"></div>
                        </div>
                        <div class="div" style="margin-top: 2rem;">
                            <p style="opacity: 0.6;font-size: 1.25rem;">{{ $location->description }}</p>
                        </div>
                        <button class="btn input-block-level location-btn"
                            style="border-radius: 0px;width: 100%;"type="submit">
                            <a class="link" href="{{ route('location', $location->id) }}"> Explore Branch</a></button>
                    </div>
                @endforeach

                <!-- <div class="col-lg-0 col-md-0 col-0 col-sm-1"></div> -->

            </div>
            <div class="col-lg-2 col-md-2 col-sm-1"></div>
        </div>
    </main>
@endsection
