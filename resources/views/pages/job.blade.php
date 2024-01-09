@extends('layout_page')
@section('title', 'Apply For Job')
@section('jslink')
    <link rel="stylesheet" href="{{ url('assets/css_pages/apply.css') }}">

@endsection


@section('content')
    <main>
        <div class="contianer-fliud mt-4 body">
            <div class="d-flex justify-content-center">
                <div class="position-relative mb-5 text-center" style="margin-top: 5rem;font-size: 1.5rem;">
                    <p class=" mt-md-0 font-VisbyCF-Bold text-uppercase new-text-head"
                        style="margin-top: 3rem;font-weight: 500;
                    font-size: 2.5rem;">

                        <span style="color: black">APPLY FOR JOB</span>
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

                                            <span style="color: white">APPLY NOW</span>
                                        </p>

                                    </div>
                                </div>

                                <form action="{{ route('job.store') }}" method="POST" enctype="multipart/form-data">
                                    <!-- Name input -->
                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    @csrf
                                    <div class="form-outline mb-4 mt-2 ">
                                        <label class="form-label" for="form4Example1">Name*</label>
                                        <input type=" text" name="name" id="form4Example1" class="form-control"
                                            placeholder="Name" />
                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-outline mb-4 mt-2 ">
                                        <label for="job" class="form-label">Job Title*</label>
                                        <select class="form-select"
                                            style="color: white; opacity: 0.8; background-color: #232a34;"
                                            aria-label="Default select example" name="id" id="job">
                                            <option selected>select job title</option>
                                            @foreach ($titles as $title)
                                                <option value="{{ $title->id }}">{{ $title->title }}</option>
                                            @endforeach
                                        </select>
                                        @error('id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <!-- Email input -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form4Example2">Email address*</label>
                                        <input type="email" name="email" id="form4Example2" class="form-control"
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
                                    <div class="mb-3 file-div">
                                        <label for="formFile" class="form-label d-block">Files*</label>
                                        <input class="form-control w-70 d-inline mb-3" name="filee[]" type="file"
                                            id="formFile">
                                        <button class="btn add-remove-color radius-6 file-adder " type="button">
                                            <i class="fas fa-plus text-white" aria-hidden="true"></i>
                                        </button>
                                        <button class="btn add-remove-color radius-6 file-subtractor" type="button">
                                            <i class="fas fa-minus text-white" aria-hidden="true"></i>
                                        </button>

                                    </div>
                                    @error('filee')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
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

@section('jsscript')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".file-adder").click(function() {
                var newInputField = $(
                    "<input class='form-control mb-3 w-70 d-inline' type='file' name='filee[]' id='formFilee'>"
                )
                $('.file-div').append(newInputField);
            });
            $(".file-subtractor").click(function() {
                $("#formFilee:last").remove();
            });
        })
    </script>
@endsection


</body>

</html>
