@extends('layout')
@section('title', 'create service | co-55 - Admin Dashboard ')
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
                                    <li class="breadcrumb-item active"> Create Service</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Create Service</h4>
                        </div>
                    </div>
                </div>

                <!-- end page title -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box">
                            <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">service</h5>
                            <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group mb-3">
                                    <label for="product-name">service Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" id="product-name" value="{{ old('name') }}"
                                        class="form-control" placeholder="">
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="product-description">service Description <span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control" name="description" value="" id="product-description" rows="5"
                                        placeholder="Please enter description">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="product-name"> image <span class="text-danger">*</span></label>
                                    <input type="file" id="icon_image" name="image" class="form-control">
                                    @error('image')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div id="show_item">
                                    <div class="row">
                                        <div class="form-group mb-3">
                                            <label for="product-name">icon Name <span class="text-danger">*</span></label>
                                            <input type="text" id="icon_name" name="icon_name[]" class="form-control">
                                            @error('icon_name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <hr>
                                        <div class="form-group mb-3">
                                            <label for="product-name">icon image <span class="text-danger">*</span></label>
                                            <input type="file" id="icon_image" name="icon_image[]" class="form-control">
                                            @error('icon_image')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            @error('icon_image.*')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <hr>
                                        <div class="form-group mb-3">
                                            <label for="product-name">icon title <span class="text-danger">*</span></label>
                                            <input type="text" name="icon_title[]" class="form-control">
                                            @error('icon_title')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <button class="btn add-remove-color radius-6 file-adder " type="button">
                                            <i class="fas fa-plus " aria-hidden="true"></i>
                                        </button>
                                        <button class="btn add-remove-color radius-6 file-subtractor" type="button">
                                            <i class="fas fa-minus " aria-hidden="true"></i>
                                        </button>
                                        <hr>
                                    </div>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".file-adder").click(function() {
                var newInputField = $(
                    "  <div class ='row del'> <div class ='form-group mb-3'> <input type ='text' id ='icon_name' name ='icon_name[]' class ='form-control'>@error('icon_title')<div class='alert alert-danger'>{{ $message }}</div> @enderror </div> <hr> <div class ='form-group mb-3'> <input type ='file' id ='icon_image' name='icon_image[]' class ='form-control'> </div>  <hr> <div class ='form-group mb-3'> <input type = 'text'id='icon_title' name = 'icon_title[]' class = 'form-control'> </div> <button class = 'btn add-remove-color radius-6 file-adder' type ='button'> <i class ='fas fa-plus text-white' aria-hidden = 'true'> </i> </button> <button class ='btn add-remove-color radius-6 file-subtractor' type ='button'> <i class ='fas fa-minus text-white' aria-hidden ='true'> </i> </button> <hr> </div> "
                )
                $('#show_item').append(newInputField);
            });
            $(".file-subtractor").click(function() {
                $(".del:last").remove();


            });
        })
    </script>

@endsection
