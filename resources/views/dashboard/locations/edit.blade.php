@extends('layout')
@section('title', 'edit location | co-55 - Admin Dashboard ')
@section('content')
    <!-- Start Content-->
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('locations.index') }}"> Location</a></li>
                                    <li class="breadcrumb-item active"> Edit Location</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Edit Location</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box">
                            <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">Location</h5>
                            <form action="{{ route('locations.update', $location->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="form-group mb-3">
                                    <label for="product-name">location Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" id="product-name" class="form-control"
                                        placeholder="" value="{{ $location->name }}">
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="product-description">location Description <span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control" name="description" id="product-descriptionn" rows="5"
                                        placeholder="Please enter description">{{ $location->description }}</textarea>
                                    @error('description')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="product-description">location article <span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control" name="article" id="product-descriptionn" rows="5"
                                        placeholder="Please enter article">{{ $location->article }}</textarea>
                                    @error('article')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="product-name">image <span class="text-danger">*</span></label>
                                    <input type="file" id="icon_image" name="image" class="form-control">
                                    @error('image')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <img style="height: 17rem;
                                    width: -webkit-fill-available;
                                    margin-top: 1rem;"
                                        src="{{ asset('assets/img/location/' . $location->image) }}" alt="">
                                </div>
                                <!-- end card-box -->
                                <!-- end col -->
                                <div class="col-lg-12">
                                    <h5 class="text-uppercase mt-0 mb-3 bg-light p-2">location Icons</h5>
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
                                                            src="{{ asset('assets/img/locations/icons/' . $icon->image) }}"
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


                                    </div>
                                </div>


                                <h5 class="text-uppercase mt-0 mb-3 bg-light p-2">location Images</h5>
                                @foreach ($images as $image)
                                    <div class="form-group mb-3">
                                        <label for="product-name"> image <span class="text-danger">*</span></label>
                                        <input type="file" id="icon_image" name="location_image[]" class="form-control">
                                        @error('location_image')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <img style="height: 17rem;
                                width: -webkit-fill-available;
                                margin-top: 1rem;"
                                            src="{{ asset('assets/img/locations/img/' . $image->image) }}" alt="">
                                    </div>
                                @endforeach

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
    <div class="row">
        <div class="col-12">
            <div class="text-center mb-3">
                <button type="submit" id="add_btn" class="btn w-sm btn-success waves-effect waves-light">Save</button>
            </div>
        </div> <!-- end col -->
    </div>
    </form>
    <!-- end row -->
    </div> <!-- container -->
    </div>
    </div>
@endsection
