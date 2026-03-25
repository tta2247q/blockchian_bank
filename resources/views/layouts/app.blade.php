<!doctype html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blockchain Bank</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #f2f6ff 0%, #e3f4ff 40%, #ffffff 100%);
            min-height: 100vh;
            color: #1b2330;
        }
        .navbar {
            background: linear-gradient(90deg, #1c427a 0%, #2f6ebd 45%, #0c356a 100%) !important;
            box-shadow: 0 4px 20px rgba(0,0,0,.25);
        }
        .nav-brand {
            font-weight: 700;
            letter-spacing: .05em;
            color: #f8f9fa !important;
            text-shadow: 1px 1px 2px rgba(0,0,0,.3);
        }
        .nav-link {
            color: #d7e6ff !important;
            transition: color .2s ease, transform .2s ease;
        }
        .nav-link:hover {
            color: #ffffff !important;
            transform: translateY(-1px);
        }
        .card {
            border: 0;
            border-radius: 16px;
            background: rgba(255,255,255,.95);
            box-shadow: 0 10px 25px rgba(19,34,70,.15);
            transition: transform .2s ease, box-shadow .2s ease;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 14px 30px rgba(19,34,70,.22);
        }
        .card-header {
            background: linear-gradient(135deg, #0b5ed7, #3f8bfc);
            color: #fff;
            border-top-left-radius: 16px;
            border-top-right-radius: 16px;
        }
        .btn-primary {
            background: linear-gradient(135deg, #4d84f8, #1f52db);
            border-color: #194ec4;
            box-shadow: 0 4px 12px rgba(24, 102, 218, .35);
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #4481e6, #153db3);
        }
        .form-control:focus {
            border-color: #1d6fe0;
            box-shadow: 0 0 0 .2rem rgba(13, 110, 253, .25);
        }
        .headline {
            color: #0d5ec4;
            text-shadow: 0 1px 3px rgba(0,0,0,.2);
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
  <div class="container">
    <a class="navbar-brand nav-brand" href="{{ route('home') }}">BlockchainBank</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Trang chủ</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('search') }}">Tìm kiếm</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Đăng nhập</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Đăng ký</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('explorer') }}">Explorer</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="container">@yield('content')</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
