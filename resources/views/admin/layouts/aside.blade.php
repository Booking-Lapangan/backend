<aside id="sidebar-wrapper">
  <div class="sidebar-brand">
    <a href="{{ route('dashboard') }}">Mahir Booking</a>
  </div>
  <div class="sidebar-brand sidebar-brand-sm">
    <a href="index.html">St</a>
  </div>
  <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
      <li id="menu-dashboard" class="sidebar-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
          <i class="far fa-square"></i> 
          <span>Dashboard</span></a>
      </li>
      <li class="menu-header">Admin</li>
      <li id="menu-booking" class="sidebar-item">
        <a class="nav-link" href="#">
          <i class="far fa-square"></i> 
          <span>Booking</span></a>
      </li>
      <li id="menu-lapangan" class="sidebar-item">
        <a class="nav-link" href="#">
          <i class="far fa-square"></i> 
          <span>Lapangan</span></a>
      </li>
      <li id="menu-fasilitas" class="sidebar-item">
        <a class="nav-link" href="#">
          <i class="far fa-square"></i> 
          <span>Fasilitas</span></a>
      </li>
      <li id="menu-rules" class="sidebar-item">
        <a class="nav-link" href="{{ route('rules') }}">
          <i class="far fa-square"></i> 
          <span>Rules</span></a>
      </li>
  </ul>
</aside>
{{-- <script>

  document.addEventListener('DOMContentLoaded', (event) => {
      const menuItems = document.querySelectorAll('.nav-item');
  
      menuItems.forEach(item => {
          item.addEventListener('click', function() {
              // Remove active class from all items
              menuItems.forEach(i => i.classList.remove('active'));
              // Add active class to the clicked item
              this.classList.add('active');
          });
      });
  });
</script> --}}

