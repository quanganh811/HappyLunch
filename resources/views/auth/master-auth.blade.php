<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('title')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
    <div style=" background: linear-gradient(to bottom,#04aa6d 0% 60%, white 60% 100%);">
        <div class="mx-auto px-5 py-3" id="container" style="background-color: #fff; border-radius: 10px; box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22); max-width: 768px; min-height: 480px; position: relative; top: 40px;">
            <h1 class="text-center pb-2">Wellcom to HappyLunch</h1>
            <div class="d-flex justify-content-center my-4">
                <img src="{{ asset('img/logo.png')}}" alt="AVATAR" width="200px">
            </div>
            @yield('content')
        </div>
    </div>


</body>
</html>