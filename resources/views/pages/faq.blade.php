@extends('layout_page')
@section('title', 'Faqs')
@section('jslink')
    <link rel="stylesheet" href="{{ url('assets/css_pages/faqs.css') }}">
@endsection


<!-- Nav tabs--------------------------------------- -->
@section('content')
    <main>
        <div class="contian-fluid body">
            <div class="row">
                <div class="d-flex justify-content-center text-uppercase" style="margin-top: 4rem;">
                    <div class="position-relative mb-5 text-center" style="font-size: 1.5rem;">
                        <p class="  font-VisbyCF-Bold text-uppercase new-text-head "
                            style="margin-top: revert;font-weight: 500;
                            font-size: 3rem;">

                            <span style="color: black">FAQs</span>
                        </p>
                        <div class="position-absolute border-small-dot-new" style="color: #141212;">
                        </div>
                        <div class="position-absolute border-small-line w-100" style="color: #0b0909;">
                        </div>
                    </div>
                </div>
                <div class="col-md-1 col-sm-2"></div>
                <div class="col-md-10 col-sm-8">

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active head text-uppercase" id="home-tab" data-bs-toggle="tab"
                                data-bs-target="#home" type="button" role="tab" aria-controls="home"
                                aria-selected="true">General</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link head text-uppercase" id="profile-tab" data-bs-toggle="tab"
                                data-bs-target="#profile" type="button" role="tab" aria-controls="profile"
                                aria-selected="false">Memberships</button>
                        </li>

                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content mt-4">
                        <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab"
                            tabindex="0">
                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                @foreach ($faqs_member as $member)
                                    <div class="accordion-item" style="margin: 20px;">
                                        <h2 class="accordion-header" id="flush-headingOne">
                                            <div class="div">
                                                <button class="accordion-button  body" onclick="changeIcon()" id="shit1"
                                                    type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#flush-collapseOne" aria-expanded="false"
                                                    aria-controls="flush-collapseOne">
                                                    <p> {{ $member->question }}
                                                    </p>

                                                    <img id="imgIcon"
                                                        src="https://co55eg.com/frontend/assets/icon/plus.svg"
                                                        alt="">

                                                </button>
                                            </div>
                                        </h2>
                                        <div id="flush-collapseOne" class="accordion-collapse collapse"
                                            aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body body">{{ $member->answer }}</div>
                                        </div>
                                    </div>
                                @endforeach


                            </div>

                        </div>
                        <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                @foreach ($faqs_general as $general)
                                    <div class="accordion-item" style="margin: 20px;">
                                        <h2 class="accordion-header" id="flush-headingOne">
                                            <div class="div">
                                                <button class="accordion-button  body" onclick="changeIcon()" id="shit1"
                                                    type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#flush-collapseOne" aria-expanded="false"
                                                    aria-controls="flush-collapseOne">
                                                    <p> {{ $general->question }}
                                                    </p>

                                                    <img id="imgIcon"
                                                        src="https://co55eg.com/frontend/assets/icon/plus.svg"
                                                        alt="">

                                                </button>
                                            </div>
                                        </h2>
                                        <div id="flush-collapseOne" class="accordion-collapse collapse"
                                            style="background-color: #f3f4f8;" aria-labelledby="flush-headingOne"
                                            data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body body">{{ $general->answer }}</div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>

                    </div>






                </div>
                <div class="col-md-1 col-sm-2"> </div>

            </div>
            <div class="row" style="margin-top: 20px;">
                <div class="col-md-1  col-1 col-sm-2"></div>
                <div class="col-md-10 col-sm-8 col-10 help">
                    <div class="div-p text-uppercase text-white">
                        <p class="d-inline">still need help?</p>
                    </div>
                    <div class="div-btn-help"><a href="{{ route('contact') }}" class="btn  btn-help btn-lg ">
                            contact us</a></div>


                </div>
                <div class="col-md-1 col-sm-2 col-1 me-0"></div>


            </div>
        </div>
    </main>

@endsection

@section('jsscript')
    <script>
        function changeIcon() {
            var image = document.getElementById("imgIcon");
            if (image.src === 'https://co55eg.com/frontend/assets/icon/minus.svg') {
                image.src = "https://co55eg.com/frontend/assets/icon/plus.svg";
            } else {
                image.src = "https://co55eg.com/frontend/assets/icon/minus.svg";

            }

        }
    </script>
@endsection
