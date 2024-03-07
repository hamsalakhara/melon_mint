<style>
    .sidebar .nav.sub-menu {
        background-color:#ffffff;
        
    }
    .sidebar .nav.sub-menu .nav-item .nav-link.active {
    color: #0a0909;}

    .sidebar .nav.sub-menu .nav-item .nav-link{
        color: #060606;

    }
    
</style>

<nav class="sidebar sidebar-offcanvas" id="sidebar" >
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="index.html">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Assets Management</span>
                <i class="menu-arrow"></i>
            </a>
        </li>
        <div class="collapse" id="ui-basic">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                    <a class="nav-link" href="">List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Add</a>
                </li>
            </ul>
        </div>
    </ul>
</nav>