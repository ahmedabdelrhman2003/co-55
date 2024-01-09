@extends('layout')
@section('title', 'edit testimonial | co-55 - Admin Dashboard ')
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
                                    <li class="breadcrumb-item"><a href="{{ route('testimonials.index') }}">Testimonials</a>
                                    </li>
                                    <li class="breadcrumb-item active"> Edit testimonial</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Edit Testimonails</h4>
                        </div>
                    </div>
                </div>

                <!-- end page title-->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box">
                            <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">General</h5>
                            <form action="{{ route('testimonials.update', $testimonials->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="form-group mb-3">
                                    <label for="product-name">Testimonails Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" id="product-name" class="form-control"
                                        placeholder="e.g : Apple iMac" value="{{ $testimonials->name }}">
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="product-name">Testimonails Title <span class="text-danger">*</span></label>
                                    <input type="text" name="title" id="product-name" class="form-control"
                                        placeholder="" value="{{ $testimonials->title }}">
                                    @error('title')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-3 d-gtid">
                                    <label for="product-namee">Testimonail Article <span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control" name="article" id="product-descriptionn" rows="5" placeholder="">{{ $testimonials->article }}</textarea>

                                    @error('article')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="product-name">Testimonails Image <span class="text-danger">*</span></label>
                                    <div class="fallback">
                                        <input type="file" name="image" type="file" />
                                        @error('image')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <img style="height: 20rem;
                                        width: -webkit-fill-available;
                                        margin-top: 1rem;"
                                            src="{{ asset('assets/img/testimonials/' . $testimonials->image) }}"
                                            alt="img">
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
                        </div> <!-- end card-box -->
                    </div> <!-- end col -->

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
