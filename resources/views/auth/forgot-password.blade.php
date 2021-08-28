@extends('auth.master-auth')

@section('title')

    <title>Quên mật khẩu</title>
    
@endsection

@section('content')

<div class="">
    <p class="text-center py-2">
        Quên mật khẩu? Không vấn đề. Chỉ cần cho chúng tôi biết địa chỉ email của bạn và chúng tôi
         sẽ gửi cho bạn một liên kết đặt lại mật khẩu qua email cho phép bạn chọn một mật khẩu mới.
    </p>
</div>
<div class="ml-5">
    @if (session('status'))
    <div style="color: green">
        {{ session('status') }}
    </div>
@endif

@if ($errors->any())
    <div class="" style="color: red">
        <i> @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach </i>
    </div>
@endif
</div>


<div class="d-flex justify-content-center ">

    <form method="POST" action="{{ route('password.email') }}" style="width: 60%">
        @csrf
        <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" :value="old('email')" autofocus>
            
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary btn-lg">Liên kết đặt lại mật khẩu</button>
        </div>
    </form>

</div>

@endsection

