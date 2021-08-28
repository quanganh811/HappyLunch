<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    
<div class="container right-panel-active" id="container">
	<div class="form-container sign-up-container">
		<form method="POST" action="{{ route('register') }}">
			@csrf
			<h1 style="color:#04AA6D;">Tạo tài khoản</h1>
			
			<div class="alert-danger" style="padding-top:5px">
				<i> @error('name') {{ $message }} @enderror </i>
			</div>
			<input type="text" class="@error('name') invalid @enderror" placeholder="Nhập tên của bạn" name="name" id="name" value="{{ old('name') }}"/>
			
			<div class="alert-danger">
				<i> @error('email') {{ $message }} @enderror </i>
			</div>
			<input type="email" class="@error('email') invalid @enderror" placeholder="Nhập email" name="email" id="email" value="{{ old('email') }}"/>
			
			<div class="alert-danger">
				<i> @error('password') {{ $message }} @enderror </i>
			</div>
			<input type="password" class="@error('password') invalid @enderror" placeholder="Nhập mật khẩu" name="password" id="password" value="{{ old('password') }}"/>
			
			<div class="alert-danger">
				<i> @error('password.confirmed') {{ $message }} @enderror </i>
			</div>
			<input type="password" class="@error('password') invalid @enderror" placeholder="Nhập lại mật khẩu" name="password_confirmation" id="password_confirmation" value="{{ old('password_confirmation') }}"/>
			
			<div class="card-footer">
				<button type="submit" class="btn btn-primary">Đăng ký</button>
			</div>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h2>Chào mừng trở lại!</h2>
				<p>Để giữ kết nối với chúng tôi, vui lòng đăng nhập bằng thông tin cá nhân của bạn</p>
				<a href="{{ route('login') }}">
					<button class="ghost" id="signIn">Đăng ký</button>
				</a>
				
			</div>
		</div>
	</div>
</div>

</body>
</html>