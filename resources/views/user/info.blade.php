@extends('user.layout')

@section('title-user')
<title>Thông tin tài khoản</title>
@endsection

@section('content-user')

<div class="row">
    <div class="col">
        <div class="card shadow mb-3">
            <div class="card-header py-3">
                <p class="text-success m-0 font-weight-bold">Thông tin cá nhân</p>
            </div>
            <div class="card-body m-3">
                <form action="{{route('info.update',Auth::user()->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <div>Tên tài khoản</div>
                        <input class="form-control" type="text" name="name" value="{{ Auth::user()->name }}" />
                    </div>
                    <div class="form-group row">
                        <div>Địa chỉ email</div>
                        <input class="form-control" readonly type="email" name="email" value=" {{ Auth::user()->email }}" />
                    </div>
                    <div class="form-group row">
                        <div>Mật khẩu</div>
                        <input class="form-control" readonly id="myInput" type="password" placeholder="John" name="password" value="{{ Auth::user()->password }}" />
                    </div>
                    <div class="form-group row">
                        <button class="btn btn-success" type="submit">Lưu</button>
                    </div>
                </form>
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
<script src="{{ asset('frontend/js/info.js') }}"></script>
@endsection