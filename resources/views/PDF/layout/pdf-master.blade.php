<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>{{ env('APP_NAME') }}</title>
        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="{{ asset('app-assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

</head>
<body class="bg-white">

    <div id="page-wrapper">

        <div class="row">
            <div class="col-lg-12">
                <center>
                    <a href="{{ url('/') }}">
                        <img class="header-quotation" src="{{ asset('new-asset/images/header-qs.png') }}">
                    </a>
                </center>
            </div>
        </div>

        <div class="row" style="margin:0;">
            <div class="col-lg-12" style="padding:0;">
                @yield('content')
            </div>
        </div>

    </div>

    @yield('script')

</body>
</html>
