<!-- main-body header start.// -->
<header class="main-header navbar">
    <ignore></ignore><!---- Ignore tab takes up space to allign the div bellow. Dont remove!-->
    <div class="col-nav">
        <ul class="nav">
            <!-- dark mode toggle.// -->
            <li class="nav-item">
                <a class="nav-link btn-icon" onclick="darkmode(this)" title="Dark mode" href="#"> <i class="fa fa-moon-o" style="color:black"></i> Screen-Mode </a>
            </li>
            <!-- header dropdown.// -->
            <li class="dropdown nav-item" style="margin-left: 10px;">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <img class="img-xs rounded-circle bg-white" src="{{ asset('admin_page_assets/images/people/user.png') }}" alt="User"></a>
                <div class="dropdown-menu dropdown-menu-end">
                <a class="dropdown-item" href="all-admin">All Admin</a>
                <a class="dropdown-item" href="my-profile">My Profile</a>
                <a class="dropdown-item text-danger" href="signout">Logout</a>
                </div>
            </li>
        </ul> 
    </div>
</header>
<!-- main-body header end.// -->