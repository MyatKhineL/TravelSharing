@extends('master')

@section('content')

    <div class="container">
        <div class="row min-vh-100 justify-content-center align-items-center">
            <div class="col-12 col-lg-4">
                <div class="">
                    <!--                <img src="images/logos/logo.PNG" class="d-block w-50 mx-auto" alt="">-->

                    <div class="sign-in-form ">
                        <h3 class="fw-bold text-center">Sign In</h3>
                        <p class="text-center">
                            Doesn't have an account yet?
                            <a href="{{ route('register') }}">Sign up here</a>
                        </p>

                        <a href="#" class="btn btn-lg rounded btn-outline-dark w-100">
                            Sign in with Google
                        </a>

                        <hr class="my-4">

                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">
                                    <i class="fas fa-user"></i>
                                    Username
                                </label>
                                <input type="text" name="email" class="form-control form-control-lg rounded @error('email') is-invalid @enderror">
                                @error('email')
                                    <div class="invalid-feedback ps-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">
                                    <i class="fas fa-lock"></i>
                                    Password
                                </label>
                                <input type="password" class="form-control form-control-lg rounded @error('password') is-invalid @enderror" name="password">
                                @error('password')
                                <div class="invalid-feedback ps-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Remember Me
                                    </label>
                                </div>
                            </div>

                            <button class="btn btn-primary btn-lg rounded w-100">Sign In</button>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
