@extends('layouts.plain-layout')

@section('content')

<section class="login-content">
    <div class="container h-100">
        <div class="row align-items-center justify-content-center h-100">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        {{-- <div class="auth-logo">
                            <img src="/assets/images/logo.png" class="img-fluid rounded-normal" alt="logo">
                        </div> --}}
                        <h2 class="mb-2 text-center">Set up Google Authenticator</h2>
                        <p class="text-center">Set up your two factor authentication by scanning the barcode below. Alternatively, you can use the code {{ $secret }}.</p>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <figure class="app_img text-center">
                                          {!! $QR_Image !!}
                                        </figure>

                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('complete-registration') }}" class="btn btn-primary btn-block">Complete Registration</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
