<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="index.html">Stisla</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">St</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="index-0.html">General Dashboard</a></li>
                <li><a class="nav-link" href="index.html">Ecommerce Dashboard</a></li>
            </ul>
        </li>
        <li class="menu-header">Code</li>
        <li class="nav-item dropdown">
            <a href="{{ route('master') }}" class="nav-link has-dropdown" data-toggle="dropdown"><i
                    class="fas fa-columns"></i>
                <span>Master Data</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('fasilitas.index') }}">Fasilitas</a></li>
                {{-- <li><a class="nav-link" href="{{route('category.create')}}">Rules</a></li> --}}
            </ul>
        </li>

</aside>
