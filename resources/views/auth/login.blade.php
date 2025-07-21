@extends('layouts.login')

@section('content')
    <section class="login-block">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <form method="POST" action="{{ route('login') }}" class="md-float-material form-material">
                        @csrf
                        <div class="text-center">
                            <img src="{{ asset('assets/backend/images/WhatsApp_Image_2025-07-08_at_20.22.56_949ce290-removebg-preview.png') }}" alt="logo.png" width="80">
                        </div>
                        <div class="auth-box card">
                            <div class="card-block">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-center">Sign In</h3>
                                    </div>
                                </div>

                                <div class="form-group form-primary">
                                    <input type="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email') }}" required autofocus>
                                    <span class="form-bar"></span>
                                    <label class="float-label">Your Email Address</label>
                                    @error('email')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group form-primary">
                                    <input type="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror" required>
                                    <span class="form-bar"></span>
                                    <label class="float-label">Password</label>
                                    @error('password')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="row m-t-25 text-left">
                                    <div class="col-12">
                                        <div class="checkbox-fade fade-in-primary d-">
                                            <label>
                                                <input type="checkbox" name="remember"
                                                    {{ old('remember') ? 'checked' : '' }}>
                                                <span class="cr">
                                                    <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                </span>
                                                <span class="text-inverse">Remember me</span>
                                            </label>
                                        </div>
                                        <div class="forgot-phone text-right f-right">
                                            @if (Route::has('password.request'))
                                                <a href="{{ route('password.request') }}" class="text-right f-w-600">
                                                    Forgot Password?
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit"
                                            class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20">
                                            Sign in
                                        </button>
                                    </div>
                                </div>

                                <hr />
                                <!-- <div class="row">
                                    <div class="col-md-10">
                                        <p class="text-inverse text-left m-b-0">Thank you.</p>
                                        <p class="text-inverse text-left">
                                            <a href="/" class="f-w-600"><b>Back to website</b></a>
                                        </p>
                                    </div>
                                    <div class="col-md-2">
                                        <img src="{{ asset('assets/backend/images/auth/Logo-small-bottom.png') }}"
                                            alt="small-logo.png">
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
