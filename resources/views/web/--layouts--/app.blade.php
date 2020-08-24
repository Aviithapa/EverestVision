<!DOCTYPE html>
<html >
<head>
    <title>Cosmic Annunaki pvt ltd</title>
    <!--/tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Elite Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />



    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('web.layouts.style')
    @stack('styles')
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="">
@include('web.layouts.header')
<!-- BEGIN CONTAINER -->

            @yield('content')
<!-- END CONTAINER -->
@include('web.layouts.footer')
@include('web.layouts.script')
{{--@include('admin.layouts.notification')--}}
@stack('scripts')
</body>
</html>