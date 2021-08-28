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
    <link rel="stylesheet" href="{{ asset('frontend/css/avatar.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/test.css') }}">




@endsection

@section('content')
    <div class="container-fluid container mt-5">
        <div class="card shadow">
            <div class="wrap cf">
                <h1 class="projTitle">Chia Tiền </h1>
                <div class="heading cf">
                    <h1>Chủ đơn : {{ $order->user->name }}</h1>
                    <a href="/" class="continue">Tiếp Tục Đặt</a>
                </div>
                <div class="cart">
                    <ul class="cartWrap">
                        <?php $toTal = 0; ?>
                        @foreach ($transaction_shares as $transaction)
                            <li class="items odd">
                                <div class="infoWrap">
                                    <div class="cartSection">
                                        <h3><img class="avatar1" src="{{ asset('uploads/user/' . $transaction->image) }}" alt="Skytsunami" />
                                            {{ $transaction->name }}

                                    </div>
                                    <div class="prodTotal cartSection">
                                        <p>{{ number_format($subTotal = $transaction->share, 0, ',', '.') }} </p>
                                    </div>
                                    <?php $toTal += $subTotal; ?>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="subtotal cf">
                    <ul>
                        {{-- <div class="totalRow"><span class="label">Shipping</span><span
                                class="value">{{ number_format($order->shipping_fee, 0, ',', '.') }}</span></div> --}}
                        <div class="totalRow "><span class="label">Tổng tiền</span><span
                                class="value">{{ number_format($toTal, 0, ',', '.') }}</span>
                        </div>
                        <div class="totalRow"><a href="/" class="btn continue">Checkout</a></div>


                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
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
