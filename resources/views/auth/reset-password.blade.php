@extends('auth.master-auth')

@section('title')

    <title>Đổi mật khẩu</title>
    
@endsection

@section('content')

<div class="d-flex justify-content-center ">

    <form method="POST" action="{{ route('password.update') }}" style="width: 60%">
        @csrf
        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div class="mb-3">
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $request->email }}" autofocus placeholder="Nhập email">
        </div>
        
        <div style="color: red">
            <i> @error('email') {{ $message }} @enderror </i>
        </div>

        <div class="mb-3">
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Nhập mật khẩu mới">
        </div>
        <div style="color: red">
            <i> @error('password') {{ $message }} @enderror </i>
        </div>

        <div class="mb-3">
            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" placeholder="Nhập lại mật khẩu">
        </div>
        <div style="color: red">
            <i> @error('password_confirmation') {{ $message }} @enderror </i>
        </div>

        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary btn-lg">Đặt lại mật khẩu</button>
        </div>
    </form>

</div>


@endsection
