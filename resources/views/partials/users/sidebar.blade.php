<!-- Sidebar -->
            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							<li class="menu-title"> 
								<span>John Doe</span> <!--REPLACE WITH THE USERS USERNAME-->
							</li>
							<li class="active"> 
								<a href="/user/dasboard"><i class="fe fe-home"></i> <span>Dashboard</span></a>
							</li>
							{{-- <li> 
								<a href="profile.html"><i class="fe fe-user-plus"></i> <span>Profile</span></a>
							</li> --}}
							<li class="">
								<a href="/user/take-survey"><i class="fe fe-document"></i> <span> Take survey </span></a>
							</li>
                            <li> 
								<a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><i class="fe fe-arrow-left"></i> <span>Logout</span></a>
								<form id="logout-form" action="{{ route('logout') }}" method="POST">
									@csrf
								</form>
							</li>
						</ul>
					</div>
                </div>
            </div>
			<!-- /Sidebar -->