@extends('auth.master-auth')

@section('title')

    <title>Xác nhận email</title>
    
@endsection

@section('content')

<div class="">
    <p class="text-center py-5">Cảm ơn bạn đã đăng ký! Trước khi bắt đầu, bạn có thể xác minh địa chỉ email của mình bằng 
        cách nhấp vào liên kết mà chúng tôi vừa gửi qua email cho bạn không? Nếu bạn không nhận được 
        email, chúng tôi sẽ sẵn lòng gửi cho bạn một email khác.</p>
</div>

<div class="d-flex justify-content-around ">
    <form method="POST" action="{{ route('verification.send') }}">
        @csrf

        <div>
            <button type="submit" class="btn btn-primary btn-lg">Gửi lại email xác minh</button>
        </div>
    </form>

    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <button type="submit" class="btn btn-secondary btn-lg">
            LogOut
        </button>
    </form>

</div>

@endsection