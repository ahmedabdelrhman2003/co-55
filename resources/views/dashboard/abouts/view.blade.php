@include('layout')
<div class="content-page">

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">

                                <li class="breadcrumb-item active"></li>
                            </ol>
                        </div>
                        <h4 class="page-title">show Section</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-box">
                        <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">General</h5>

                        <div class="form-group mb-3">
                            <label for="product-name">Title<span class="text-danger">*</span></label>
                            <div class="div">{{ $abouts->title }}</div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="product-description">description <span class="text-danger">*</span></label>
                            <div class="div">{{ $abouts->description }}</div>

                        </div>



                    </div> <!-- end card-box -->
                </div> <!-- end col -->
            </div>
            <div class="row">
                <div class="col-12">
                </div> <!-- end col -->
            </div>
            <div class="d-none" id="uploadPreviewTemplate">
                <div class="card mt-1 mb-0 shadow-none border">
                    <div class="p-2">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <img data-dz-thumbnail src="#" class="avatar-sm rounded bg-light" alt="">
                            </div>
                            <div class="col pl-0">
                                <a href="javascript:void(0);" class="text-muted font-weight-medium" data-dz-name></a>
                                <p class="mb-0" data-dz-size></p>
                            </div>
                            <div class="col-auto">
                                <!-- Button -->
                                <a href="" class="btn btn-link btn-lg text-muted" data-dz-remove>
                                    <i class="dripicons-cross"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div> <!-- container -->

    </div>
</div>
