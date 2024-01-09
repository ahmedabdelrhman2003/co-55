<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Log In | CO-55</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ url('assets/images/favicon.ico') }}">

    <!-- App css -->
    <link href="{{ url('assets/css/bootstrap-modern.min.css') }}" rel="stylesheet" type="text/css"
        id="bs-default-stylesheet" />
    <link href="{{ url('assets/css/app-modern.min.css') }}" rel="stylesheet" type="text/css"
        id="app-default-stylesheet" />

    <link href="{{ url('assets/css/bootstrap-modern-dark.min.css') }}" rel="stylesheet" type="text/css"
        id="bs-dark-stylesheet" disabled />
    <link href="{{ url('assets/css/app-modern-dark.min.css') }}" rel="stylesheet" type="text/css"
        id="app-dark-stylesheet" disabled />

    <!-- icons -->
    <link href="{{ url('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

</head>

<body class="authentication-bg authentication-bg-pattern">

    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-pattern">

                        <div class="card-body p-4">

                            <div class="text-center w-75 m-auto">
                                <div class="auth-logo">
                                    <a href="{{ route('dashboard') }}" class="logo logo-dark text-center">
                                        <span class="logo-lg">
                                            <img src="{{ url('assets/images/icon.png') }}" alt=""
                                                height="42">
                                        </span>
                                    </a>

                                    <a href="{{ route('dashboard') }}" class="logo logo-light text-center">
                                        <span class="logo-lg">
                                            <img src="{{ url('assets/images/logo-light.png') }}" alt=""
                                                height="22">
                                        </span>
                                    </a>
                                </div>
                                <p class="text-muted mb-4 mt-3">Enter your email address and password to access admin
                                    panel.</p>
                            </div>

                            <form action="{{ route('auth.login-user') }}" method="POST">
                                @csrf
                                @if (Session::has('faild'))
                                    <div class="alert alert-danger">{{ Session::get('faild') }}</div>
                                @endif
                                @if (Session::has('success'))
                                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                                @endif
                                @if (Session::has('error'))
                                    <div class="alert alert-danger">{{ Session::get('error') }}</div>
                                @endif
                                <div class="form-group mb-3">

                                    <label for="emailaddress">Email address</label>
                                    <input class="form-control" type="email" id="emailaddress" name="email"
                                        value="{{ old('email') }}" required="" placeholder="Enter your email">
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="password">Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" name="password"
                                            value="{{ old('password') }}" class="form-control"
                                            placeholder="Enter your password">
                                        <div class="input-group-append" data-password="false">
                                            <div class="input-group-text">
                                                <button id="btn" type="button"
                                                    style="border: none;
                                                background-color: inherit;">
                                                    <span class="password-eye font-12"></span>
                                                </button>
                                            </div>
                                            @error('password')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>



                                <div class="form-group mb-0 text-center">
                                    <button class="btn btn-primary btn-block" type="submit"> Log In </button>
                                </div>

                            </form>



                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p> <a href="{{ route('auth.forgot') }}" class="text-white-50 ml-1">Forgot your
                                    password?</a></p>

                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->




    <!-- Vendor js -->
    <script src="{{ url('assets/js/vendor.minjs') }}"></script>

    <!-- App js -->
    <script src="{{ url('assets/js/app.minjs') }}"></script>
    <script>
        const btn = document.getElementById('btn');
        const pass = document.getElementById('password');
        btn.addEventListener('click', function() {
            if (pass.type === 'password') {
                pass.type = 'text';
            } else {
                pass.type = 'password';
            }

        })
    </script>

</body>

</html>
