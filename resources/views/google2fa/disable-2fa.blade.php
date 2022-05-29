
@extends('layouts.plain-layout')

@section('content')


<section class="login-content">
    <div class="container h-100">
        <div class="row align-items-center justify-content-center h-100">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">Two Factor Authentication</div>
                    <div class="card-body">

                        <p>If you are looking to disable Two Factor Authentication. Please confirm your password and Click Disable 2FA Button.</p>
                        {{-- @if(session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show">
                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                            <strong> {{ session('error') }}</strong>
                            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                            </button>
                        </div> --}}
                        {{-- <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div> --}}
                        {{-- @endif --}}

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



