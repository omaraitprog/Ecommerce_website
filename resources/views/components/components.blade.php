<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tijareti Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <style>
      body {
        background: linear-gradient(135deg, #f8fafc 0%, #e0e7ff 100%);
        min-height: 100vh;
      }
      .navbar {
        box-shadow: 0 2px 8px rgba(0,0,0,0.07);
      }
      .navbar-brand img {
        height: 40px;
        margin-right: 10px;
      }
      .main-content {
        margin-top: 60px;
      }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
      <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="#">
          <img src="https://img.icons8.com/color/48/000000/shop.png" alt="Logo">
          <span class="fw-bold fs-4 ms-2">Tijareti Store</span>
        </a>
        <div>
          <a class="btn btn-primary" href="{{ route('create') }}">Create New Account</a>
        </div>
      </div>
    </nav>
    <div class="container main-content">
      @yield('necessairy')
   
  