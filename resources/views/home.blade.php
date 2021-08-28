@extends('layout.master')

@section('title')
<title>Trang chủ</title>
@endsection

@section('styles')


<link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome-all.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/fonts/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome5-overrides.min.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
<link rel="stylesheet" href="{{ asset('assets/css/home.css') }}" />


@endsection

@section('content')

<div class="content">
    <div class="row">
        <div class="d-flex justify-content-center height-100 align-items-center">
            <div class="content-left">
                <div class="card shadow gradient-border shadow-lg bg-white">
                    <div class="card-header py-3">
                        <h3 class="text-success m-0 font-weight-bold text-center">
                            Tham Gia
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="card-img">
                            <img src="{{ asset('./assets/img/join.jpg') }}" alt="" />
                        </div>
                        <div class="card-content">
                            <form action="{{ route('item-merchant.index') }}" class="form-flex">
                                @csrf
                                <div>
                                    <input placeholder="Nhập link để đặt cùng mọi người" class="form-control input-order" type="text" name="link" />
                                </div>
                                <div class="margin-top-auto">
                                    <button class="form-control btn btn-success">
                                        Xác nhận
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center height-100 align-items-center">
            <div class="content-right">
                <div class="card shadow gradient-border shadow-lg bg-white">
                    <div class="card-header py-3">
                        <h3 class="text-success m-0 font-weight-bold text-center">
                            Tạo Đơn
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="card-img">
                            <img src="{{ asset('./assets/img/create.jpg') }}" alt="" />
                        </div>
                        <div class="card-content">
                            <form action="{{ route('order.create') }}" method="get" class="form-flex">
                                <div>Gọi mọi người cùng tham gia nào</div>
                                <div class="margin-top-auto">
                                    <button class="form-control btn btn-success">
                                        Tạo Đơn
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection



@section('scripts')

<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/chart.min.js') }}"></script>
<script src="{{ asset('assets/js/bs-init.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
<script src="assets/js/theme.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endsection