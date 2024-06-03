<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KopiJujuk | Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    {{-- google font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
<section class="login row mx-0">
  <div class="login-left col-md-8 col-lg-6 d-flex align-items-center justify-content-center">
    <div class="container">
        <div class="header d-flex align-items-center justify-content-center">
            <h1>Sign In</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $item )
                            <li>{{$item}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <form action="" method="POST">
            @csrf
            <div class="login-form">
                <img src="{{asset('img/email.png')}}" alt="email" class="email-logo">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control mb-3 input" id="email" value="{{old('email')}}" name="email" placeholder="Masukkan Email">
                <img src="{{asset('img/lock.png')}}" alt="eye" class="lock">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control mb-3 input" id="password" name="password" placeholder="Masukkan Password">
                <a href="/lupapassword" class="d-block mb-3 forget">Forget Password</a>
                <button type="submit" class="btn btn-primary login d-flex justify-content-center align-items-center">Login</button>
                <span class="text">Belum punya akun <a href="/register" class="regis">Buat akun</a></span>
            </div>
        </form>
    </div>
</div>

    <div class="login-right col-md-6 d-none d-md-flex align-items-center">
        <div class="container">
            <img src="{{asset('img/bg-login.png')}}" alt="pppp" class="img-fluid img">
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>