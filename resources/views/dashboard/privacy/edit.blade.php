@include('layout')
<div class="content-page">

    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">

                                <li class="breadcrumb-item active"></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Add privacy and policy</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-box">
                        <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">General</h5>

                        <form action="{{ route('privacy.update', 1) }}" method="post">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="product-description">edit <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="article" id="product-description" rows="5" placeholder="">{{ $privacy->article }}</textarea>
                                @error('article')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="text-center mb-3">
                                <button type="submit" class="btn w-lg btn-success waves-effect waves-light">Save
                                </button>

                            </div>

                        </form>

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
