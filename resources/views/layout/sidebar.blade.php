<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admindashboard')}}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('showCreater')}}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Craeters - List</span>
            </a>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link" href="{{ route('showUsers')}}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Users - List</span>
            </a>
        </li> --}}
        <li class="nav-item">
            <a class="nav-link" href="{{ route('showAssets')}}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Assets - List</span>
            </a>
        </li>
    </ul>
</nav>