<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    
<div class="container" id="container">

	<div class="form-container sign-in-container">
		<form method="POST" action="{{ route('login') }}">
            @csrf
            <span class="avatar">
                <img src="{{ asset('img/logo.png')}}" alt="AVATAR">
            </span>
			<h1 style="color:#04AA6D;">Đăng nhập</h1>

			<div class="alert-danger">
				<i> @error('email') {{ $message }} @enderror </i>
			</div>
			<input type="email" class="@error('email') invalid @enderror" placeholder="Nhập email" name="email" id="email" value="{{ old('email') }}"/>
			
			<input type="password" class="@error('password') invalid @enderror" placeholder="Nhập mật khẩu" name="password" id="password" value="{{ old('password') }}"/>
			
			<a href="{{ route('password.request') }}">Quên mật khẩu?</a>
			<div class="card-footer">
				<button type="submit" class="btn btn-primary">Đăng nhập</button>
			</div>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-right">
				<h1>Xin chào!</h1>
				<p>Nhập thông tin cá nhân của bạn và bắt đầu với chúng tôi </p>
				<a href="{{ route('register') }}">
					<button class="ghost" id="signUp">Đăng ký</button>
				</a>
				
			</div>
		</div>
	</div>
</div>

</body>
</html>