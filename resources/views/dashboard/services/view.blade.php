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

                                <li class="breadcrumb-item active">service Detail</li>
                            </ol>
                        </div>
                        <h4 class="page-title">service Detail</h4>
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
                                        <img src="{{ asset('assets/img/services/' . $service->image) }}" alt=""
                                            class="img-fluid mx-auto d-block rounded">
                                    </div>

                                </div>


                                </ul>
                            </div> <!-- end col -->
                            <div class="col-lg-7">
                                <div class="pl-xl-3 mt-3 mt-xl-0">

                                    <h4 class="mb-3">{{ $service->name }}</h4>
                                    <p class="text-muted mb-4">{{ $service->description }}.</p>
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
                                                        src=" {{ asset('assets/img/services/icons/' . $icon->image) }}"
                                                        alt="">
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                    <div class="col-md-6">

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
