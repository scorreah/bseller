<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />

    <title>@yield('title', 'BSeller')</title>
</head>
<body>
    <div class="vr bg-white mx-2 d-none d-lg-block"></div>
    @guest
        <a class="nav-link active" href="{{ route('login') }}">Login</a>
        <a class="nav-link active" href="{{ route('register') }}">Register</a>
    @else
        <form id="logout" action="{{ route('logout') }}" method="POST">
            <a role="button" class="nav-link active"onclick="document.getElementById('logout').submit();">Logout</a>
            @csrf
        </form>
    @endguest
    </div>
    <nav>
        <div class="navItem">
            <img src="/img/index/bsellerLogo.png" width="150" height="60" alt="">
        </div>
		<div class = "references">
            <ul>
			    <li><a href="{{ route('home.index') }}">Home</a></li>
			    <li><a href="{{ route('shoe.index') }}">Shoes</a></li>
			    <li><a href="{{ route('order.index') }}">Orders</a></li>
			    <li><a href="{{ route('bid.index') }}">Bids</a></li>
		    </ul>
        </div>
	</nav>
    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
</body>
</html>