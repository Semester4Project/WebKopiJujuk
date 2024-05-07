<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if (auth()->user()->role == "customer")
        <p>Selamat datang, pelanggan!</p>
        <a href="#" class="d-block">{{auth()->user()->username}}</a>
        <form action="{{ route('logout') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit">Logout</button>
        </form>
    @else
        <p>Halo user</p>
    @endif
</body>
</html>