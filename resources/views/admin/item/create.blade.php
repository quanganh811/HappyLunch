@extends('admin.index')

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
                    Thêm Món Ăn
                </h3>
                <a href="{{URL::to('item/' . $merchant->id . '/index')}}">
                    <button type="submit" id="addMerchant" class="btn btn-danger">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('item.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Tên Món Ăn</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" id="name" value="{{old('name')}}" />
                        @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span></p>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputDish" class="col-sm-2 col-form-label">Giá</label>
                    <div class="col-sm-10">
                        <input type="text" name="price" class="form-control" id="price" value="{{old('price')}}" />
                        @if ($errors->has('price'))
                        <span class="text-danger">{{ $errors->first('price') }}</span></p>
                        @endif
                    </div>
                </div>
                <div hidden class="form-group row">
                    <label for="inputPrice" class="col-sm-2 col-form-label">Tên Quán</label>
                    <div class="col-sm-10">
                        <input type="text" readonly name="merchant_id" class="form-control" id="merchant_id" value="{{$merchant->id}}" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputDish" class="col-sm-2 col-form-label">Hình Ảnh Món Ăn</label>
                    <div class="col-sm-10">
                        <input name="image" id="image" type="file"  class="form-control-file">
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