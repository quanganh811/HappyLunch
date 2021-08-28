@extends('user.layout')

@section('title-user')
<title>Lịch sử chi tiêu</title>
@endsection

@section('content-user')

    <div class="card shadow">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between align-items-center">
                <a href="{{route('merchant.index')}}" style="text-decoration:none;">
                    <h3 class="font-weight-bold text-success" style="margin: 0">
                        Lịch sử chi tiêu
                    </h3>
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="card">
                <div class="title">Purchase Reciept</div>
                <div class="info">
                    <div class="row">
                        <div class="col-7"> <span id="heading">Date</span><br> <span id="details">10 October 2018</span> </div>
                        <div class="col-5 pull-right"> <span id="heading">Order No.</span><br> <span id="details">012j1gvs356c</span> </div>
                    </div>
                </div>
                <div class="pricing">
                    <div class="row">
                        <div class="col-9"> <span id="name">BEATS Solo 3 Wireless Headphones</span> </div>
                        <div class="col-3"> <span id="price">£299.99</span> </div>
                    </div>
                    <div class="row">
                        <div class="col-9"> <span id="name">Shipping</span> </div>
                        <div class="col-3"> <span id="price">£33.00</span> </div>
                    </div>
                </div>
                <div class="total">
                    <div class="row">
                        <div class="col-9"></div>
                        <div class="col-3"><big>£262.99</big></div>
                    </div>
                </div>
                <div class="tracking">
                    <div class="title">Tracking Order</div>
                </div>
                <div class="progress-track">
                    <ul id="progressbar">
                        <li class="step0 active " id="step1">Ordered</li>
                        <li class="step0 active text-center" id="step2">Shipped</li>
                        <li class="step0 active text-right" id="step3">On the way</li>
                        <li class="step0 text-right" id="step4">Delivered</li>
                    </ul>
                </div>
                <div class="footer">
                    <div class="row">
                        <div class="col-2"><img class="img-fluid" src="https://i.imgur.com/YBWc55P.png"></div>
                        <div class="col-10">Want any help? Please &nbsp;<a> contact us</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
