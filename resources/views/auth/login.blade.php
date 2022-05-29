
@extends('layouts.plain-layout')

@section('content')


<div class="col-md-6">
    <div class="authincation-content">
        <div class="row no-gutters">
            <div class="col-xl-12">
                <div class="auth-form">
                    <div class="text-center mb-3">
                        <img src="/assets/logo-4.png" alt="">
                    </div>
                    <h4 class="text-center mb-4">Sign in your account</h4>
                    <form method="POST" action="{{ route('login') }}" >
                        @csrf
                        <div class="form-group">
                            <label class="mb-1"><strong>Username</strong></label>
                            <input type="text" name="username" class="form-control" value="{{ old('username') }}">
                            @error('username')
                            <div  class="invalid-feedback animated fadeInUp" style="display: block;">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="mb-1"><strong>Password</strong></label>
                            <input type="password" class="form-control" name="password" placeholder="Password">
                            @error('password')
                            <div  class="invalid-feedback animated fadeInUp" style="display: block;">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-row d-flex justify-content-between mt-4 mb-2">
                            <div class="form-group">
                                <div class="custom-control custom-checkbox ml-1">
                                    <input type="checkbox" class="custom-control-input" id="basic_checkbox_1" name="remember" value="1">
                                    <label class="custom-control-label" for="basic_checkbox_1">Remember my preference</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <a href="{{ route('password.request') }}">Forgot Password?</a>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-block">Sign Me In</button>
                        </div>
                    </form>
                    <div class="new-account mt-3">
                        <p>Don't have an account? <a class="text-primary" href="{{ route('register') }}">Sign up</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection



