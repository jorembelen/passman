
@extends('layouts.plain-layout')

@section('content')


<section class="login-content">
    <div class="container h-100">
        <div class="row align-items-center justify-content-center h-100">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        {{-- <div class="auth-logo">
                            <img src="../assets/images/logo.png" class="img-fluid rounded-normal" alt="logo">
                        </div> --}}
                        @if($errors->any())
                        <div class="alert text-white bg-danger" role="alert">
                            <div class="mm-alert-icon">
                                <i class="ri-information-line"></i>
                            </div>
                            <div class="mm-alert-text">{{$errors->first()}}</div>
                        </div>
                        @endif
                        <div class="text-center">
                            <h2 class="mb-2 text-center">One Time Password</h2>
                            <p>Please enter the  <strong>OTP</strong> generated on your <br> Authenticator App.  Ensure you submit <br> the current one because it refreshes every 30 seconds.</p>
                        </div>
                        <form class="form-horizontal" method="POST" action="{{ route('2fa') }}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input  type="number" class="form-control" name="one_time_password" required autofocus>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection



