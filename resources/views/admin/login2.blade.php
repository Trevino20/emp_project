@extends('layouts.login-layout')
@section('content')

    <body class="bg-gradient-primary">

        <div class="container">

            <!-- Outer Row -->
            <div class="row justify-content-center">

                <div class="col-xl-10 col-lg-12 col-md-9">

                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">

                            <!-- Nested Row within Card Body -->
                            <div class="row g-0 auth-row">
                                <div class="col-lg-6 ">
                                    <div class="cover-image">
                                        <img src="{{ asset('admin/img/signin-image.svg') }}" alt="" />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                        </div>
                                        <form method="post" action="{{ route('admin.authenticate') }}">
                                            @csrf

                                            <div class="form-group">
                                                <input type="email" name="email" class="form-control form-control-user"
                                                    id="exampleInputEmail" aria-describedby="emailHelp"
                                                    placeholder="Enter Email Address...">
                                            </div>
                                            @error('password')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                            <div class="form-group">
                                                <input type="password" class="form-control form-control-user"
                                                    name="password" id="exampleInputPassword" placeholder="Password">
                                            </div>
                                            @error('password')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror



                                            <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>

                                            <hr>
                                            {{-- <a href="index.html" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a> --}}
                                        </form>
                                        {{-- <hr> --}}
                                        {{-- <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.html">Create an Account!</a>
                                    </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>


        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>
    @endsection
