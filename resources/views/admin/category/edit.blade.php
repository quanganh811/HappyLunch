@extends('admin.index')

@section('title')
<title>Chỉnh sửa loại quán</title>
@endsection

@section('styles')
<link rel="stylesheet" href="{{asset('frontend/css/admin.css')}}">
<link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome-all.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/fonts/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome5-overrides.min.css') }}">
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
                    Sửa Loại quán
                </h3>
                <!-- <button id="reset_notice_error" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
                <a href="{{ route('category.index') }}">
                    <button type="submit" id="addCategory" class="btn btn-danger">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </a>
            </div>
        </div>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="card-body">
            <form action="{{ route('category.update', $category->id) }}" method="POST">
                @csrf

                @method('PUT')
                <div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <input type="text" name="name" value="{{ $category->name }}" class="form-control" placeholder="">
                        </div>
                    </div>



                    <div class="col-xs-12 col-sm-12 col-md-12 text-center ">
                        <button type="submit" class="btn btn-success">
                            Sửa
                        </button>
                    </div>
                </div>
            </form>
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