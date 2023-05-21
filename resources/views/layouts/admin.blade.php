<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Admin Dashboard')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="{{ route('admin.dashboard') }}">{{ __('admin.admin_dashboard') }}</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">{{ __('admin.dashboard') }}</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">{{ __('admin.products') }}</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">{{ __('admin.users') }}</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">{{ __('admin.shoes') }}</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">{{ __('admin.orders') }}</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">{{ __('admin.bids') }}</a>
      </li>
    </ul>
  </div>
</nav>

@yield('content')

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.1/dist/umd/popper.min.js"
        integrity="sha384-rZg7V9djxCt/BQ7vLx0bGoJysyT1rxs0HyTJ0sScsAd1JZrmXpFJVR0m6gFJq3+x"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
