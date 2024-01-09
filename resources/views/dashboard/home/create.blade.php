@extends('layout')
@section('title', ' create home | co-55 - Admin Dashboard ')
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
                                    <li class="breadcrumb-item"><a href="{{ route('home.index') }}"> Home</a></li>
                                    <li class="breadcrumb-item active"> Create Home</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Create Home</h4>
                        </div>
                    </div>
                </div>
                <!-- start page title -->

                <!-- end page title -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box">
                            <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">Home</h5>
                            <form action="{{ route('home.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group mb-3">
                                    <label for="product-name">Home Image title<span class="text-danger">*</span></label>
                                    <input type="text" name="title" value="{{ old('title') }}" id="product-name"
                                        class="form-control" placeholder="">
                                    @error('title')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="fallback">
                                    <label for="product-name">Home Image<span class="text-danger">*</span></label><br>
                                    <input type="file" name="image" value="{{ old('image') }}" type="file" />
                                    @error('image')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                        </div> <!-- end card-box -->
                    </div> <!-- end col -->

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
