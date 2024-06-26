<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Mahir Futsal</title>
  <meta name="description" content="Welcome to Mahir Futsal" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <link rel="stylesheet" href="assets/css/style.css">
  <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body>
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg sticky-top bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand text-dark fs-4 fw-bold" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px">
            <ul class="nav">
              <li class="nav-item">
                <a href="{{ route('home') }}" class="btn btn-light nav-link {{ request()->routeIs('home') ? 'text-primary fw-bold' : 'text-dark' }}">
                  <p class="fw-bolder">Home</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('lapangan') }}" class="btn btn-light nav-link {{ request()->routeIs('lapangan') ? 'text-primary fw-bold' : 'text-dark' }}">
                  <p class="fw-bolder">Venue</p>
                </a>
              </li>
            </ul>

            @auth
            <li class="nav-item">
              <a class="nav-link" href="{{ route('user.cart') }}">
                  <button type="button" class="btn btn-light position-relative">
                      <i class="fa-solid fa-cart-shopping"></i>
                      <span id="cart-badge" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                          {{-- {{ $bookingCount }} --}}0
                          <span class="visually-hidden">unread messages</span>
                      </span>
                  </button>
              </a>
          </li>
          
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <button type="button" class="btn btn-outline-dark position-relative">
                  <i class="fa-solid fa-user"></i>
                </button>
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                @auth
                <li><a class="dropdown-item" href="{{ Auth::user()->role == 'admin' ? route('dashboard') : route('user.dashboard') }}">Dashboard</a></li>
              @endauth
                <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
              </ul>
            </li>
            @else
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">
                <button type="button" class="btn btn-outline-primary">Login</button>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">
                <button type="button" class="btn btn-primary">Register</button>
              </a>
            </li>
            @endauth
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->

    {{-- <script>
      // Ambil element badge
      const cartBadge = document.getElementById('cart-badge');
  
      // Fungsi untuk update nilai badge
      function updateCartBadge(count) {
          cartBadge.textContent = count;
      }
  
      // Panggil fungsi updateCartBadge untuk menginisialisasi nilai awal
      updateCartBadge({{ $bookingCount }}); // Menggunakan nilai dari Blade
  
      // Contoh sederhana untuk update nilai badge secara dinamis setelah aksi tertentu (misalnya setelah menambah booking)
      // Fungsi ini bisa dipanggil setelah ada perubahan pada jumlah booking
      function updateBadgeFromBackend() {
          // Misalnya, menggunakan Axios atau Fetch untuk mengambil data dari server
          // Ganti URL sesuai dengan endpoint yang sesuai di aplikasi Laravel Anda
          fetch('{{ route('user.cart.count') }}')
              .then(response => response.json())
              .then(data => {
                  updateCartBadge(data.bookingCount); // Update nilai badge dengan data terbaru
              })
              .catch(error => console.error('Error:', error));
      }
  
      // Panggil fungsi updateBadgeFromBackend untuk update badge secara dinamis (misalnya saat halaman dimuat)
      updateBadgeFromBackend();
  </script> --}}
  