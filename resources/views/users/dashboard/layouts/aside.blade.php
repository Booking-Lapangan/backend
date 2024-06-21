<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="{{ route('home') }}">Mahir Booking</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">St</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="{{Route::is('user.dashboard') ? 'active' : ''}}"><a class="nav-link" href="{{route('user.dashboard')}}"><i class="far fa-square"></i> <span>Dashboard</span></a></li>
        <li class="menu-header">Menu</li>
        <li class="{{Route::is('user.history') ? 'active' : ''}}"><a class="nav-link" href="{{route('user.history')}}"><i class="far fa-square"></i> <span>History Booking</span></a></li>
        <li class="{{Route::is('user.profile') ? 'active' : ''}}"><a class="nav-link" href="{{route('user.profile')}}"><i class="far fa-square"></i> <span>Profile</span></a></li>
  </aside>