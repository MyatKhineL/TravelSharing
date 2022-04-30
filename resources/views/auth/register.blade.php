@extends('master')

@section('content')


    <div class="container">
        <div class="row min-vh-100 justify-content-center align-items-center">
            <div class="col-12 col-lg-4">
                <div class="">
                    <div class="sign-in-form ">
                        <h3 class="fw-bold text-center">Sign Up</h3>
                        <p class="text-center">
                            Already have an account?
                            <a href="{{ route('login') }}">Sign in here</a>
                        </p>

                        <a href="#" class="btn btn-lg rounded btn-outline-dark w-100">
                            Sign in with Google
                        </a>

                        <hr class="my-4">

                        <form action="{{ route('register') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">
                                    <i class="fas fa-user"></i>
                                    Full Name
                                </label>
                                <input type="text" class="form-control form-control-lg rounded @error('name') is-invalid @enderror" name="name">
                                @error('name')
                                <div class="invalid-feedback ps-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">
                                    <i class="fas fa-envelope"></i>
                                    Email
                                </label>
                                <input type="email" class="form-control form-control-lg rounded @error('email') is-invalid @enderror" name="email">
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
                                <label class="form-label">
                                    <i class="fas fa-lock"></i>
                                    Confirm Password
                                </label>
                                <input type="password" class="form-control form-control-lg rounded @error('password_confirmation') is-invalid @enderror" name="password_confirmation">
                                @error('password_confirmation')
                                <div class="invalid-feedback ps-2">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        I accept the Term and Condition
                                    </label>
                                </div>
                            </div>

                            <button class="btn btn-primary btn-lg rounded w-100">Sign Up</button>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
