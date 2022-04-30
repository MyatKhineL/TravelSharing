@extends('master')
@section('title') Change Password @endsection
@section('content')

    <div class="container">
        <div class="row justify-content-center min-vh-100">
            <div class="col-lg-6 col-xl-5">
                <div class="text-center mt-5">
                    <h4 class="fw-bold mb-4">Edit Your Profile</h4>
                    <img src="{{ asset(auth()->user()->photo) }}" class="profile-image" alt="">
                    <p class="mb-0">{{ auth()->user()->name }}</p>
                    <p class="small text-black-50">{{ auth()->user()->email }}</p>
                </div>
                <form action="{{ route('update-password') }}" method="post">
                    @csrf

                    <div class="form-floating mb-3">
                        <input type="password" name="old_password" class="form-control @error('old_password') is-invalid @enderror" id="yourName" placeholder="old_password">
                        <label for="yourName">Current Password</label>
                        @error('old_password')
                        <div class="invalid-feedback ps-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="yourName"  placeholder="password">
                        <label for="yourName">New Password</label>
                        @error('password')
                        <div class="invalid-feedback ps-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="yourName"  placeholder="password_confirmation">
                        <label for="yourName">Confirm Password</label>
                        @error('password_confirmation')
                        <div class="invalid-feedback ps-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="text-center">
                        <button class="btn btn-lg btn-primary">Change Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



@stop

