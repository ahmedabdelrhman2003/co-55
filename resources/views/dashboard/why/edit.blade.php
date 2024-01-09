@extends('layout')
@section('title', 'edit why | co-55 - Admin Dashboard ')
<!-- Start Content-->
@section('content')
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
                                    <li class="breadcrumb-item"><a href="{{ route('why.index') }}"> Why</a></li>
                                    <li class="breadcrumb-item active"> Edit Why</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Edit Why</h4>
                        </div>
                    </div>
                </div>


                <!-- end page title-->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box">
                            <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">Edit Section</h5>
                            <form action="{{ route('why.update', $why->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group mb-3">
                                    <label for="product-name">Section Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" id="product-name" class="form-control"
                                        placeholder="e.g : Apple iMac" value="{{ $why->name }}">
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="product-description">section Description <span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control" name="description" id="product-description" rows="5"
                                        placeholder="Please enter description">{{ $why->description }}</textarea>
                                    @error('description')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <h5 class="text-uppercase mt-0 mb-3 bg-light p-2">section Image</h5>
                                <div class="fallback">
                                    <input type="file" name="image" type="file" />
                                    @error('image')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <img style="height: 17rem;
                                    width: -webkit-fill-available;
                                    margin-top: 1rem;"
                                        src="{{ asset('assets/img/why/' . $why->image) }}" alt="">
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
