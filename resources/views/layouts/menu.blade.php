<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }} {{ Request::segment(2)=='home' ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('user-data') }}" class="nav-link {{ Request::is('user-data') ? 'active' : '' }} {{ Request::segment(2)=='user-data' ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>User</p>
    </a>
</li>
