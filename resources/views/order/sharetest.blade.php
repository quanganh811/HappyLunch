@extends('layout.master')

@section('title')
    <title>Đơn hàng</title>
@endsection

@section('styles')


    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome5-overrides.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('frontend/css/test.css') }}"> --}}




@endsection

@section('content')
<div class="container-fluid container mt-5">
    <div class="card shadow">
    <section class="demo">
        <dl class="list maki">
            <dt>Maki</dt>
            <dd><a href="#">Ana-kyu</a></dd>
            <dd><a href="#">Chutoro</a></dd>
            <dd><a href="#">Kaiware</a></dd>
            <dd><a href="#">Kampyo</a></dd>
            <dd><a href="#">Kappa</a></dd>
            <dd><a href="#">Natto</a></dd>
            <dd><a href="#">Negitoro</a></dd>
            <dd><a href="#">Oshinko</a></dd>
            <dd><a href="#">Otoro</a></dd>
            <dd><a href="#">Tekka</a></dd>
        </dl>
        <a href="#" class="toggle">Toggle</a>

    </section>
    </div>
</div>

   
@endsection

@section('scripts')
    <script src="{{ asset('frontend/js/test.js')}}"></script>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/chart.min.js') }}"></script>
    <script src="{{ asset('assets/js/bs-init.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

@endsection
