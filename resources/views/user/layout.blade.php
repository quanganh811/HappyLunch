@extends('layout.master')

@section('title')
@yield('title-user')
@endsection

@section('styles')
<link rel="stylesheet" href="{{asset('frontend/css/info.css')}}">
<link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/fonts/fontawesome-all.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/fonts/font-awesome.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/fonts/fontawesome5-overrides.min.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">

@endsection

@section('content')

<div class="container mt-4 d-flex flex-column" id="content-wrapper">
    <div id="content">
        <div class="container-fluid">
            <div class="row mb-3">
                <div class="col-lg-3">
                    <div class="card mb-3">
                        <form action="{{route('info.update',Auth::user()->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body text-center shadow">
                                @if(Auth::user()->image != '')
                                <img class="rounded-circle mb-3 mt-4" src="{{ asset('uploads/user/'.Auth::user()->image) }}" width="160" height="160" onclick="myFunction()" />
                                @else
                                <img class="rounded-circle mb-3 mt-4" src="{{ asset('frontend/img/user-icon.png') }}" width="160" height="160" onclick="myFunction()" />
                                @endif
                                <div class="mb-3">
                                    <input style="display: none;" name="image" id="image" type="file" class="form-control-file">
                                </div>
                                <button id="sunmitImage" class="btn btn-success" type="submit">
                                    Đổi ảnh đại diện
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="text-success font-weight-bold m-0">Danh Mục</h6>
                        </div>
                        <nav class="navbar text-success">
                            <ul class="list-group list-group-flush w-100" id="accordionSidebar">
                                <li class=" list-group-item d-flex justify-content-start align-items-center flex-wrap" role="presentation">
                                    <a href="/user-info">
                                        <i class="fas fa-user color-green"></i>
                                        <span class="ml-2 text-success">Thông tin cá nhân</span>
                                    </a>
                                </li>
                                <li class=" list-group-item d-flex justify-content-start align-items-center flex-wrap" role="presentation">
                                    <a href="/user/history">
                                        <i class="fas fa-table color-green"></i>
                                        <span class="ml-2 text-success">Lịch sử đơn hàng</span>
                                    </a>
                                </li>
                                <li class=" list-group-item d-flex justify-content-start align-items-center flex-wrap" role="presentation">
                                    <a href="/user/spend">
                                        <i class="fas fa-info color-green"></i>
                                        <span class="ml-2 text-success">Chi tiết chi tiêu</span>
                                    </a>
                                </li>
                                <li class=" list-group-item d-flex justify-content-start align-items-center flex-wrap" role="presentation">
                                    <a href="/user/change-password">
                                        <i class="fas fa-key color-green"></i>
                                        <span class="ml-2 text-success">Đổi mật khẩu</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-9">
                    @yield('content-user')
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@section('scripts')
<script>
    function myFunction() {
        $("input[id='image']").click();
    }
</script>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js" integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ" crossorigin="anonymous">
</script>

@endsection