<nav class="border border-dark border-start-0 border-end-0 mb-3">
  <ul class="nav justify-content-center">
      <li class="nav-item">
          <a href="{{ route('lapangan') }}" class="btn btn-light nav-link {{ request()->routeIs('lapangan') ? 'text-primary fw-bold' : 'text-dark' }}">
              <p class="fw-bolder">Lapangan</p>
          </a>
      </li>
      <li class="nav-item">
          <a href="{{ route('gallery') }}" class="btn btn-light nav-link {{ request()->routeIs('gallery') ? 'text-primary fw-bold' : 'text-dark' }}">
              <p class="fw-bolder">Gallery</p>
          </a>
      </li>
      <li class="nav-item">
          <a href="{{ route('rules') }}" class="btn btn-light nav-link {{ request()->routeIs('rules') ? 'text-primary fw-bold' : 'text-dark' }}">
              <p class="fw-bolder">Rulles</p>
          </a>
      </li>
      <li class="nav-item">
          <a href="{{ route('about') }}" class="btn btn-light nav-link {{ request()->routeIs('about') ? 'text-primary fw-bold' : 'text-dark' }}">
              <p class="fw-bolder">About</p>
          </a>
      </li>
  </ul>
</nav>
