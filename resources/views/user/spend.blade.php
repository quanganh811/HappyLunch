@extends('user.layout')

@section('title-user')
<title>Lịch sử chi tiêu</title>
@endsection

@section('content-user')
<div>
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
            <div class="row">
                <div class="col-md-12 d-flex-start">
                    <h5 class="text-md-left dataTables_filter" id="dataTable_filter">
                        Tài khoản: 
                        @if($total_money >= 0)
                            <span class="text-success">{{ number_format($total_money, 0, ',', '.') }}đ</span>
                        @else
                            <span class="text-danger">{{ number_format($total_money, 0, ',', '.') }}đ</span>
                        @endif
                    </h5>
                </div>
            </div>
            <ul class="nav nav-tabs my-3" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active text-success" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Cần đòi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-danger" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Cần trả</a>
                </li>
                
            </ul>
                <div class="tab-content" id="myTabContent">
                    @include('user.spend-out')
                    @include('user.spend-in')
              </div>
        </div>
    </div>
</div>
@endsection
