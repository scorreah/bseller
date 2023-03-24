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
    <nav>
        <div class="navTop">
            <div class="navItem">
                <img src="/img/index/bsellerLogo.png" width="150" height="60" alt="">
            </div>
            <div class = "references">
                <ul>
                    <li><a href="{{ route('home.index') }}">{{ __('home.home') }}</a></li>
                    <li><a href="{{ route('shoe.index') }}">{{ __('home.shoes') }}</a></li>
                    <li><a href="{{ route('order.index') }}">{{ __('home.orders') }}</a></li>
                    <li><a href="{{ route('bid.index') }}">{{ __('home.bids') }}</a></li>
                    <li><a href="{{ route('cart.index') }}">{{ __('home.cart') }}</a></li>
                </ul>
            </div>
                <div class = "login">
                    @guest
                        <div class = "logiin">
                            <a class="nav-link active" href="{{ route('login') }}">{{ __('home.login') }}</a>
                        </div>
                        <div class = "Register">
                            <a class="nav-link active" href="{{ route('register') }}">{{ __('home.register') }}</a>
                        </div>
                    @else
                        <form id="logout" action="{{ route('logout') }}" method="POST">
                            <a role="button" class="nav-link active"onclick="document.getElementById('logout').submit();">{{ __('home.logout') }}</a>
                            @csrf
                        </form>
                    @endguest
                </div>
            </div>
            <div>
                <form method="POST" action="{{ route('lang.locale') }}">
                    @csrf
                    <select name="locale" onchange="this.form.submit()">
                        @foreach (config('app.available_locales') as $localeName => $localeCode)
                            <option value="{{ $localeCode }}" {{ app()->getLocale() == $localeCode ? 'selected' : '' }}>
                                {{ $localeName }}
                            </option>
                        @endforeach
                    </select>
                </form>
            </div>
        </div>
	</nav>
    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
</body>
</html>