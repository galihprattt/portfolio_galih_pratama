<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>TokoKita - Toko Online</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Poppins Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

  <!-- Animate.css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

  <!-- FontAwesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }

    .pagination {
      display: flex;
      padding-left: 0;
      list-style: none;
      justify-content: center;
    }

    .pagination li {
      margin: 0 3px;
    }

    .pagination li a, .pagination li span {
      border: 1px solid #0d6efd;
      padding: 8px 12px;
      text-decoration: none;
      color: #0d6efd;
      border-radius: 8px;
      transition: 0.3s;
    }

    .pagination li.active span {
      background-color: #0d6efd;
      color: #fff;
      border-color: #0d6efd;
    }

    .pagination li a:hover {
      background-color: #0d6efd;
      color: #fff;
    }
  </style>
</head>

<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm py-3">
  <div class="container">
    <a class="navbar-brand fw-bold" href="{{ route('home.index') }}">Galih Pratama</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('home.index') ? 'active fw-semibold' : '' }}" href="{{ route('home.index') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Shop</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pages</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
      </ul>

      <!-- Search Bar -->
      <form action="{{ route('home.search') }}" method="GET" class="d-flex me-3">
        <input class="form-control rounded-pill" type="search" name="query" placeholder="Cari produk..." aria-label="Search" style="max-width: 200px;">
      </form>

      <!-- Wishlist, Cart, Login/Logout -->
      <ul class="navbar-nav mb-2 mb-lg-0 align-items-center">
        @auth
        <li class="nav-item me-2">
          <a class="nav-link position-relative" href="{{ route('wishlist.index') }}">
            ❤️ Wishlist
          </a>
        </li>
        @endauth
        <li class="nav-item me-3">
          <a class="nav-link position-relative" href="{{ route('cart.index') }}">
            🛒 Cart
            @php
              $cart = session('cart', []);
              $cartCount = is_array($cart) ? count($cart) : 0;
            @endphp
            @if($cartCount > 0)
              <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success">
                {{ $cartCount }}
              </span>
            @endif
          </a>
        </li>

        @auth
          <li class="nav-item">
            <form action="{{ route('customer.logout') }}" method="POST" class="d-inline">
              @csrf
              <button type="submit" class="btn btn-outline-danger btn-sm">Logout</button>
            </form>
          </li>
        @else
          <li class="nav-item me-2">
            <a class="nav-link" href="{{ route('customer.login') }}">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('customer.register') }}">Daftar</a>
          </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>
<!-- End Navbar -->

<!-- Content -->
@yield('content')
<!-- End Content -->

<!-- Footer -->
<footer class="bg-dark text-white pt-5 pb-4 mt-5">
  <div class="container text-center text-md-start">
    <div class="row text-center text-md-start">
      <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
        <h5 class="fw-bold mb-4">TokoKita</h5>
        <p>Toko online terpercaya menyediakan produk terbaru dan terbaik untuk kamu ✨</p>
      </div>

      <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
        <h5 class="fw-bold mb-4">Menu</h5>
        <p><a href="{{ route('home.index') }}" class="text-white text-decoration-none">Home</a></p>
        <p><a href="#" class="text-white text-decoration-none">Shop</a></p>
        <p><a href="#" class="text-white text-decoration-none">Blog</a></p>
        <p><a href="#" class="text-white text-decoration-none">Pages</a></p>
      </div>

      <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
        <h5 class="fw-bold mb-4">Kontak</h5>
        <p><i class="fas fa-home me-2"></i> Indonesia</p>
        <p><i class="fas fa-envelope me-2"></i> support@tokokita.com</p>
        <p><i class="fas fa-phone me-2"></i> +62 812-3456-7890</p>
      </div>

      <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
        <h5 class="fw-bold mb-4">Follow Kami</h5>
        <a href="#" class="btn btn-outline-light btn-floating m-1"><i class="fab fa-facebook-f"></i></a>
        <a href="#" class="btn btn-outline-light btn-floating m-1"><i class="fab fa-instagram"></i></a>
        <a href="#" class="btn btn-outline-light btn-floating m-1"><i class="fab fa-twitter"></i></a>
      </div>
    </div>

    <hr class="my-4">

    <div class="row">
      <div class="col-md-12 text-center">
        <p class="mb-0">© {{ date('Y') }} TokoKita. All rights reserved.</p>
      </div>
    </div>
  </div>
</footer>
<!-- End Footer -->

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
