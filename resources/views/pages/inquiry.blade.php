@extends('layout_page')
@section('title', 'Booking Service')
@section('jslink')
    <link rel="stylesheet" href="{{ url('assets/css_pages/book.css') }}">

@endsection


@section('content')
    <main>
        <div class="contianer-fliud mt-4 body">
            <div class="d-flex justify-content-center">
                <div class="position-relative mb-5 text-center" style="margin-top: 5rem;font-size: 1.5rem;">
                    <p class=" mt-md-0 font-VisbyCF-Bold text-uppercase new-text-head"
                        style="margin-top: 3rem;font-weight: 500;
                    font-size: 2.5rem;">

                        <span style="color: black">MAKE AN INQUIRY</span>
                    </p>
                    <div class="position-absolute border-small-dot-new" style="color: #141212;">
                    </div>
                    <div class="position-absolute border-small-line w-100" style="color: #0b0909;">
                    </div>
                </div>
            </div>

            <div class="row " style="padding-bottom: 4rem;">
                <div class="col-md-1 col-1 col-sm-1"></div>
                <div class="col-md-10 col-10 col-sm-10" style="background-color: #232a34;">
                    <div class="row">


                        <div class="row background-form-dark">
                            <div class="col-1 col-md-2 col-lg-3"></div>
                            <div class="col-10 col-md-8 col-lg-6">

                                <div class=" justify-content-center">
                                    <div class=" mb-1 text-center" style="margin-top: 1rem;font-size: 1.3rem;">
                                        <p class=" mt-md-0 font-VisbyCF-Bold text-uppercase new-text-head form-title"
                                            style="margin-top: 3rem;font-weight: 500;
                                        font-size: 2.5rem;">

                                            <span style="color: white">INQUIRY INFORMATION</span>
                                        </p>

                                    </div>
                                </div>

                                <form action="{{ route('inquiry.store') }}" method="POST">
                                    @csrf
                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    <div class="form-outline mb-4 mt-2 ">
                                        <label for="job" class="form-label">Location*</label>
                                        <select class="form-select"
                                            style="color: white; opacity: 0.8; background-color: #232a34;"
                                            aria-label="Default select example" name="location" id="job">
                                            <option selected>location</option>
                                            @foreach ($locations as $location)
                                                <option value="{{ $location->name }}">{{ $location->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('location')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-outline mb-4 mt-2 ">
                                        <label for="job" class="form-label">Service*</label>
                                        <select class="form-select" name="service"
                                            style="color: white; opacity: 0.8; background-color: #232a34;"
                                            aria-label="Default select example" id="job">
                                            <option selected>service</option>
                                            @foreach ($services as $service)
                                                <option value="{{ $service->name }}">{{ $service->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('service')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <!-- Name input -->
                                    <div class="form-outline mb-4 mt-2 ">
                                        <label class="form-label" for="form4Example1">Name*</label>
                                        <input type=" text" id="form4Example1" name="name" class="form-control"
                                            placeholder="Name" />
                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-outline mb-4 mt-2 ">
                                        <label class="form-label" for="form4Example1">Company*</label>
                                        <input type=" text" id="form4Example1" name="company" class="form-control"
                                            placeholder="company" />
                                        @error('company')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <!-- Email input -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form4Example2">Email address*</label>

                                        <input type="email" id="form4Example2" name="email" class="form-control"
                                            placeholder="example@gmail.com" />
                                        @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Message input -->

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form4Example2">Phone Number*</label>
                                        <input type="number" name="number" style="background-color: #232a34;"
                                            id="form4Example2" class="form-control" placeholder="000 0000 0000" />
                                        @error('number')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <!-- Checkbox -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form4Example2">Message</label>
                                        <textarea class="form-control" style="background-color: #232a34;color: #ffffff;" name="message" id=""
                                            cols="30" rows="5" placeholder="write your message here"></textarea>
                                        @error('message')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Submit button -->

                                    <div class="d-grid gap-2 col-6 mx-auto w-100">
                                        <button class="btn  mb-4 location-btn btn-lg " type="submit">Submit</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-1 col-md-2 col-lg-3"></div>

                        </div>
                    </div>
                </div>
                <div class="col-md-1 col-1 col-sm-1"></div>


            </div>
    </main>
@endsection
