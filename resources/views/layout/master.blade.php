<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    @yield('title')
    <link rel="icon" href="{{asset('frontend/img/logo-title.png')}}" type="image/x-icon">
    @yield('styles')
</head>

<body id="page-top">
    <!------------- header ---------->
    @include('layout.header')
    <!------------- End  header ---------->

    @yield('content')
    {{-- <!------------ footer ----------->
    @include('layout.footer')
    <!------------ End footer -----------> --}}

    @yield('scripts')
</body>

</html>