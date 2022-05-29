
@extends('layouts.plain-layout')

@section('content')


<section class="login-content">
    <div class="container h-100">
        <div class="row align-items-center justify-content-center h-100">
            <div class="col-md-8">

                <div class="card">
                    <div class="text-center mt-3">
                        <img src="/assets/logo-4.png" alt="">
                    </div>
                    <div class="card-header">Two Factor Authentication</div>
                    <div class="card-body">

                        <p>If you are looking to disable Two Factor Authentication. Please confirm your password and Click Disable 2FA Button.</p>


                        <form class="form-horizontal" method="POST" action="{{ route('disable2fa') }}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                                <label for="change-password" class="control-label">Current Password</label>
                                <input id="current-password" type="password" class="form-control col-md-4" name="current-password" required>
                                @if(session()->has('error'))
                                <div  class="invalid-feedback animated fadeInUp" style="display: block;">{{ session('error') }}</div>
                                @endif
                            </div>
                            <button class="btn btn-primary" type="submit">Disable 2FA</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>


@endsection



