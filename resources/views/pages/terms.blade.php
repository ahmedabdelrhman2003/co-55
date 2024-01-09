@extends('layout_page')
@section('title', 'Terms & Condition')
@section('jslink')
    <link rel="stylesheet" href="{{ url('assets/css_pages/terms.css') }}">

@endsection


<!-- -------------------- -->
@section('content')
    <main>
        <div class="container-fluid">
            <div class=" row justify-content-center">
                <div class="d-flex justify-content-center text-uppercase" style="margin-top: 4rem; margin-bottom: 2rem;">
                    <div class="position-relative  text-center" style="font-size: 1.25rem;">
                        <p class="  font-VisbyCF-Bold text-uppercase new-text-head text-uppercase "
                            style="margin-top: revert; font-weight: 500;
                        font-size: 2rem;">

                            <span style="color: black">Terms & Conditions</span>
                        </p>
                        <div class="position-absolute border-small-dot-new" style="color: #141212;">
                        </div>
                        <div class="position-absolute border-small-line w-100" style="color: #0b0909;">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-1 col-md-1 col-sm-1 col-0"></div>
                <div class="col-lg-10 col-md-10 col-sm-10 col-12">
                    <p class="" style="margin-bottom: 4rem;font-size: 1.25rem;white-space:break-spaces !important;">
                        @foreach ($terms as $term)
                        @endforeach
                        {{ $term->article }}
                    </p>
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-0"></div>
                <!-- <div class="col-6"></div> -->

            </div>


        </div>
    </main>
@endsection
