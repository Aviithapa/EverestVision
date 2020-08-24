<!DOCTYPE html>
<html >
<head>
    <title>Everest Vision</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
