  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="{{ route('home') }}">Mahir Booking</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">St</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="{{Route::is('dashboard') ? 'active' : ''}}" id="menu-dashboard" class="sidebar-item">
          <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="far fa-square"></i> 
            <span>Dashboard</span></a>
        </li>
        <li class="menu-header">Master Data</li>
        <li  class="{{Route::is('fasilitas.*') ? 'active' : ''}}" id="menu-fasilitas" class="sidebar-item">
          <a class="nav-link" href="{{route('fasilitas.index')}}">
            <i class="far fa-square"></i> 
            <span>Fasilitas</span></a>
          </li>
        <li  class="{{Route::is('rules.*') ? 'active' : ''}}" id="menu-rules" class="sidebar-item">
          <a class="nav-link" href="{{route('rules.index')}}">
            <i class="far fa-square"></i> 
            <span>Rules</span></a>
            <li class="menu-header">Big Data</li>
        <li  class="{{Route::is('booking') ? 'active' : ''}}" id="menu-booking" class="sidebar-item">
          <a class="nav-link" href="{{route('booking.index')}}">
            <i class="far fa-square"></i> 
            <span>Booking</span></a>
        </li>
        <li  class="{{Route::is('lapangan.*') ? 'active' : ''}}" id="menu-lapangan" class="sidebar-item">
          <a class="nav-link" href="{{route('lapangan.index')}}">
          <i class="far fa-square"></i> 
          <span>Lapangan</span></a>
        </li>
      </li>
    </ul>
  </aside>
