@extends('layout.master')

@section('title')
    <title>Chỉnh sửa đơn hàng</title>
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



@endsection

@section('content')
    <div class="container-fluid container mt-5">
        <div class="card shadow">
            <div class="card-header py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="font-weight-bold text-success" style="margin: 0">
                        Chỉnh Sửa Quán Ăn
                    </h3>
                    <a href="{{ route('transaction.index') }}">
                        <button type="submit" id="addtransaction" class="btn btn-danger">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('transaction.update', $transaction->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Tên quán</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" id="name"
                                value="{{ $transaction->name }}" />
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span></p>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputFood" class="col-sm-2 col-form-label">Tên món</label>
                        <div class="col-sm-10">
                            <input type="text" name="food" class="form-control" id="food"
                                value="{{ $transaction->food }}" />
                            @if ($errors->has('food'))
                                <span class="text-danger">{{ $errors->first('food') }}</span></p>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPrice" class="col-sm-2 col-form-label">Đơn giá</label>
                        <div class="col-sm-10">
                            <input type="text" name="price" class="form-control" id="price"
                                value="{{ $transaction->price }}" />
                            @if ($errors->has('price'))
                                <span class="text-danger">{{ $errors->first('price') }}</span></p>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPrice" class="col-sm-2 col-form-label">Số lượng</label>
                        <div class="col-sm-10">
                            <input type="text" name="amount" class="form-control" id="amount"
                                value="{{ $transaction->amount }}" />
                            @if ($errors->has('amount'))
                                <span class="text-danger">{{ $errors->first('amount') }}</span></p>
                            @endif
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" id="addtransaction" class="btn btn-success">
                            Lưu
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
