@extends('layout_page')
@section('title', 'Career')
@section('jslink')
    <link rel="stylesheet" href="{{ url('assets/css_pages/career.css') }}">
@endsection

@section('content')
    <main>
        <div class="contian-fluid body">
            <div class="d-flex justify-content-center text-uppercase" style="margin-top: 4rem;">
                <div class="position-relative  mb-1 text-center" style="font-size: 1.5rem;">
                    <p class="  font-VisbyCF-Bold text-uppercase new-text-head " style="margin-top: revert;">

                        <span style="color: black">Careers</span>
                    </p>
                    <div class="position-absolute border-small-dot-new" style="color: #141212;">
                    </div>
                    <div class="position-absolute border-small-line w-100" style="color: #0b0909;">
                    </div>
                </div>
            </div>
            <div class="contianer-fluid mt-4">
                <div class="col-2 w-100"></div>
                <div class="row">


                    <div class="container-fluid "
                        style="background: rgb(9 10 10 / 90%)url({{ url('assets/images/co111.jpg') }});height: 350px;position: relative;
               background-blend-mode: darken;width: 85%;">

                        <div class=" row  text-align-center">
                            <div class="col-2"></div>
                            <div class="col-8 justify-content-center ">
                                <div class="text-center mt-2 t">
                                    <div class=" d-inline-flex p-2 bd-highlight ">
                                        <p class=" text-light text-center">

                                        <div class="new">JOIN OUR TEAM</div>

                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- <hr> -->
                            <div class="col-2"></div>

                        </div>

                    </div>
                    <div class="col-2"></div>

                </div>
            </div>

            <div class="contianer-fluid text-right">
                @foreach ($titles as $title)
                    @if ($loop->iteration % 2 == 0)
                        <div class="row mt-4 me-0">
                            <div class="col-1"></div>
                            <div class="col-10"
                                style="margin-top: 15px;
                              background-color: #e8e9ee; padding-top: 15px;padding-right: 12px;
                                padding-bottom: 15px;background-color: #e8e9ee;margin-top: 15px;">
                                <div class="bs-example">
                                    <div class=" clearfix">
                                        <span class="title">{{ $title->title }}</span>

                                        <a href="{{ route('job') }}">
                                            <button type="" class="btn btn-career float-end ml-2  d-grid gap-2">Apply
                                                Now</button></a>

                                    </div>
                                </div>

                            </div>


                        </div>
                    @else
                        <div class="row mt-4 me-0">
                            <div class="col-1"></div>
                            <div class="col-10" style="margin-top: 20px;">
                                <div class="bs-example">
                                    <div class=" clearfix">
                                        <span class="title">{{ $title->title }}</span>
                                        <button type="button" class="btn float-end ml-2 btn-career  d-grid gap-2">Apply
                                            Now
                                        </button>
                                    </div>
                                </div>

                            </div>


                        </div>
                    @endif
                @endforeach



            </div>

        </div>
        </div>
    </main>
@endsection
