@extends('admin.index')

@section('title')
<title>Chỉnh sửa quán ăn</title>
@endsection


@section('styles')

<link rel="stylesheet" href="{{asset('frontend/css/admin.css')}}">
<link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/fonts/fontawesome-all.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/fonts/font-awesome.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/fonts/fontawesome5-overrides.min.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">



@endsection

@section('content-admin')
<div class="m-4">
    <div class="card shadow">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="font-weight-bold text-success" style="margin: 0">
                    Chỉnh Sửa Quán Ăn
                </h3>
                <a href="{{route('merchant.index')}}">
                    <button type="submit" id="addMerchant" class="btn btn-danger">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('merchant.update', $merchant->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Tên quán</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" id="name" value="{{$merchant->name}}" />
                        @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span></p>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputDish" class="col-sm-2 col-form-label">Loại quán</label>
                    <div class="col-sm-10">
                        <select name="category_id" class="form-control" id="category_id">
                            <option selected hidden value="{{$merchant->category_id}}">{{$merchant->category->name}}</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id}}">{{ $category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPrice" class="col-sm-2 col-form-label">Loại App</label>

                    <div class="col-sm-10">
                        <select name="app_id" class="form-control" id="app_id">
                            <option selected hidden value="{{$merchant->app_id}}">{{$merchant->app->name}}</option>
                            @foreach($types as $type)
                            <option value="{{ $type->id}}">{{ $type->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPrice" class="col-sm-2 col-form-label">Link</label>
                    <div class="col-sm-10">
                        <input type="text" name="link" class="form-control" id="link" value="{{$merchant->link}}" />
                        @if ($errors->has('link'))
                        <span class="text-danger">{{ $errors->first('link') }}</span></p>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="addMerchant" class="btn btn-success">
                        Lưu
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/chart.min.js')}}"></script>
<script src="{{asset('assets/js/bs-init.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
<script src="assets/js/theme.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@endsection