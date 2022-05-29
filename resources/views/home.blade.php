@extends('layouts.master')

@section('content')


    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Hi {{ strtok(auth()->user()->name, ' ') }}, Welcome back!</h4>
            </div>
        </div>


    </div>
    <!-- row -->

    <div class="row">
        <div class="col-xl-3 col-xxl-6 col-sm-6">

            <div class="widget-stat card bg-primary">
                <div class="card-body p-4">
                    <div class="media">
                        <span class="mr-3">
                            <i class="flaticon-381-user-7"></i>
                        </span>
                        <div class="media-body text-white text-right">
                            <p class="mb-1">Total Accounts</p>
                            <h3 class="text-white">{{ $totalAccounts }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

<div class="row">
    <div class="col-md-6">
        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
    </div>
</div>


@endsection
