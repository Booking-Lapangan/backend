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
        
          <li class="nav-item">
            <a class="nav-link" href="#">
              <button type="button" class="btn btn-light position-relative">
                <i class="fa-solid fa-cart-shopping"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                  99+
                  <span class="visually-hidden">unread messages</span>
                </span>
              </button>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <button type="button" class="btn btn-outline-dark position-relative">
                <i class="fa-solid fa-user"></i>
              </button>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->