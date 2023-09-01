@include('layout')
<div class="content-page">
    <div class="content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">

                                <li class="breadcrumb-item active">location Detail</li>
                            </ol>
                        </div>
                        <h4 class="page-title">location Detail</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <div class="row">
                            <div class="col-lg-5">

                                <div class="tab-content pt-0">
                                    <div class="tab-pane active show" id="product-1-item">
                                        <img src="{{ asset('assets/img/location/' . $location->image) }}" alt=""
                                            class="img-fluid mx-auto d-block rounded">
                                    </div>

                                </div>


                                </ul>
                            </div> <!-- end col -->
                            <div class="col-lg-10">
                                <div class="pl-xl-3 mt-3 mt-xl-0">

                                    <h4 class="mb-3">{{ $location->name }}</h4>
                                    <p class="text-muted mb-4">{{ $location->description }}.</p>
                                    <div class="row mb-3">
                                        @foreach ($icons as $icon)
                                            <div class="col-md-6">
                                                <div class="div">
                                                    {{ $icon->name }}
                                                </div>
                                                <div class="div">
                                                    {{ $icon->title }}
                                                </div>
                                                <div class="tab-pane active show">
                                                    <img class="img-fluid mx-auto d-block rounded"
                                                        src=" {{ asset('assets/img/locations/icons/' . $icon->image) }}"
                                                        alt="">
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                    <div class="row mb-3">
                                        @foreach ($images as $image)
                                            <div class="col-md-6">

                                                <div class="tab-pane active show">
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
