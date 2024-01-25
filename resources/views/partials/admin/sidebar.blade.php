<!-- aside-start.// -->
<aside class="navbar-aside" id="offcanvas_aside">
    <div class="aside-top">
        <a href="index.html" class="brand-wrap">
            <!-- page-logo.// -->
            <img src="{{ asset('admin_page_assets/images/logo.png') }}" height="60" class="logo" alt="Enrolment Questionnaire Dashboard">
        </a>
        <div>
            <!-- aside-botton.// -->
            <button class="btn btn-icon btn-aside-minimize"> <i class="text-muted material-icons md-menu_open"></i> </button>
        </div>
    </div>

    <!-- nav-list start.// -->
    <nav>
        <ul class="menu-aside">
            <li class="menu-item active"> 
            <a class="menu-link" href="dashboard"> <i class="icon material-icons md-home"></i> 
                <span class="text">Dashboard</span> 
            </a> 
            </li>
            <li class="menu-item has-submenu"> 
            <a class="menu-link" href="#"> <i class="icon material-icons md-person"></i>  
                <span class="text">Users</span> 
            </a> 
            <div class="submenu">
                <a href="create-user">Create User</a>
                <a href="users">User</a>
                {{-- <a href="delete-user">Delete User</a> --}}
            </div>
            </li>
            <li class="menu-item has-submenu"> 
            <a class="menu-link" href="#"> <i class="icon material-icons md-pie_chart"></i> 
                <span class="text">Surveys</span> 
            </a>
            <div class="submenu">
                <a href="all-survey">All Survey</a>
                <a href="view-survey">View Survey</a>
            </div> 
            </li>
        <hr>
        <ul class="menu-aside">
            {{-- <li class="menu-item has-submenu"> 
            <a class="menu-link" href="#"> <i class="icon material-icons md-settings"></i> 
                <span class="text">Settings</span> 
            </a>
            <div class="submenu">
                <a href="all-admin">All Admin</a>
                <a href="my-profile">My Profile</a>
            </div>
            </li> --}}
            <li class="menu-item"> 
                <a class="menu-link" href="{{ route('admin.signout') }}"> <i class="icon material-icons md-cancel"></i> 
                <span class="text">Logout</span> 
                </a> 
            </li>
        </ul>
        <br>
        <br>
    </nav>
    <!-- nav-list end.// -->
</aside>
<!-- aside-ends.// -->