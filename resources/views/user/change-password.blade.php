@extends('user.layout')

@section('title-user')
<title>Thông tin tài khoản</title>
@endsection

@section('content-user')


<div class="row">
    <div class="col">
        <div class="card shadow mb-3">
            <div class="card-header py-3">
                <p class="text-success m-0 font-weight-bold">Đổi mật khẩu</p>
            </div>
            <div class="card-body m-3">
                <form action="" method="post">
                    <div class="form-group row">
                        <div>Mật khẩu Mới</div>
                        <input class="form-control" type="text" name="password" value="" />
                    </div>
                    <div class="form-group row">
                        <div>Nhập lại mật khẩu</div>
                        <input class="form-control" type="password" name="password" value="" />
                    </div>
                    <div class="form-group row">
                        <button class="btn btn-success" type="submit">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<form action="{{route('profile.change.password')}}" method="post" class="needs-validation" novalidate enctype="multipart/form-data">
    @csrf
    <div class="row ">
        <div class="col-md-12">
            <div class="main-card mb-3  card">
                <div class="card-body">
                    <h4 class="card-title">
                        <h4>Change Password</h4>
                    </h4>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group mt-3">
                                <label for="current_password">Old password</label>
                                <input type="password" name="current_password" class="form-control @error('current_password') is-invalid @enderror" required placeholder="Enter current password">
                                @error('current_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>

                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mt-3">
                                <label for="new_password ">new password</label>
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required placeholder="Enter the new password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>

                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mt-3">
                                <label for="confirm_password">confirm password</label>
                                <input type="password" name="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror" required placeholder="Enter same password">
                                @error('confirm_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>

                                @enderror
                            </div>
                        </div>
                        <div class="d-flex justify-content-first mt-4 ml-2">
                            <button type="submit" class="btn btn-primary" id="formSubmit">change password</button>
                        </div>
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
    <script src="{{ asset('frontend/js/info.js') }}"></script>
    @endsection
