<!DOCTYPE html>
<html lang="en" class="h-100">

    @livewireStyles
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/favicon.png">
    <link href="/assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="/assets/css/style.css" rel="stylesheet">

</head>

<div class="authincation h-100">
    <div class="container h-100">
        <div class="row justify-content-center h-100 align-items-center">

            @yield('content')

        </div>
    </div>
</div>
<!--**********************************
    Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="/assets/vendor/global/global.min.js"></script>
    <script src="/assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="/assets/js/custom.min.js"></script>
    <script src="/assets/js/deznav-init.js"></script>

    @include('scripts.sweet-alert')

    @livewireScripts
</body>

</html>
