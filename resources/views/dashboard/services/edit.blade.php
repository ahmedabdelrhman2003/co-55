@extends('layout')
@section('title', 'edit service | co-55 - Admin Dashboard ')
@section('content')
    <!-- Start Content-->
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('services.index') }}"> Service</a></li>
                                    <li class="breadcrumb-item active"> Edit Service</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Edit Service</h4>
                        </div>
                    </div>
                </div>

                <!-- end page title-->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box">
                            <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">Service</h5>
                            <form action="{{ route('services.update', $service->id) }}" method="POST" id="service"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="form-group mb-3">
                                    <label for="product-name">service Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" id="product-name" class="form-control"
                                        placeholder="" value="{{ $service->name }}">
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="product-descriptionn">service Description <span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control" name="description" value="" id="product-descriptionn" rows="5"
                                        placeholder="Please enter description">{{ $service->description }}</textarea>
                                    @error('description')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="product-description">service Image <span
                                            class="text-danger">*</span></label>
                                    <div class="fallback">
                                        <input type="file" name="image" type="file" />
                                        @error('image')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <img style="height: 17rem;
                                        width: -webkit-fill-available;
                                        margin-top: 1rem;"
                                            src="{{ asset('assets/img/services/' . $service->image) }}" alt="">
                                    </div>
                                </div>

                                <!-- end col -->
                                <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">Service Icons</h5>

                                <div id="show_item">
                                    @foreach ($icons as $icon)
                                        <div class="row ">

                                            <div class="col-6">
                                                <div class="form-group mb-3" id="add_item">
                                                    <label for="product-name">icon image <span
                                                            class="text-danger">*</span></label>
                                                    <input type="file" id="icon_image" name="icon_image[]"
                                                        class="form-control">
                                                    @error('icon_image')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                    <img style="  margin-top: 1rem;"
                                                        src="{{ asset('assets/img/services/icons/' . $icon->image) }}"
                                                        alt="">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group mb-3">
                                                    <label for="product-name">icon title <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" id="icon_image" name="icon_title[]"
                                                        value="{{ $icon->title }}" class="form-control">
                                                    @error('title')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                    <button class="btn add-remove-color radius-6 file-adder mb-3" type="button">
                                        <i class="fas fa-plus " aria-hidden="true"></i>
                                    </button>
                                    <button class="btn add-remove-color radius-6 file-subtractor mb-3" type="button">
                                        <i class="fas fa-minus " aria-hidden="true"></i>
                                    </button>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="text-center mb-3">
                                            <button type="submit" id="add_btn"
                                                class="btn w-sm btn-success waves-effect waves-light">Save</button>
                                        </div>
                                    </div> <!-- end col -->
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div> <!-- end col-->
    </div> <!-- end col-->
    </div>
    <!-- end row -->

    </form>
    <!-- end row -->
    </div> <!-- container -->
    </div>
    </div>
@endsection
@section('jsscript')
    <script>
        $(document).ready(function() {
            $(".file-adder").click(function() {
                var newInputField = $(
                    "<div class='row del'><div class='col-6'><div class='form-group mb-3'><label for='product-name'>icon image <span class='text-danger'>*</span></label><input type='file' id='icon_image' name='icon_image2[]'class='form-control'></div></div><div class='col-6'><div class='form-group mb-3'><label for='product-name'>icon title <span class='text-danger'>*</span></label><input type='text' id='icon_image' name='icon_title2[]'class='form-control'></div></div></div>"
                )
                $('#show_item:first').append(newInputField);
            });
            $(".file-subtractor").click(function() {
                $(".del:last").remove();


            });
        })
    </script>

    <script>
        $(document).ready(function() {
            $(".img-adder").click(function() {
                var newInputField = $(
                    "<input class='form-control mb-3 w-70 d-inline' type='file' name='location_image[]' id='location_imagee'>"
                )
                $('.location-image').appendChild(newInputField);
            });
            $(".image-remover").click(function() {
                $("#location_imagee:last").remove();
            });
        })
    </script>
@endsection
