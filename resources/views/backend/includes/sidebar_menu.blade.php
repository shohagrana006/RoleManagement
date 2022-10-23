<!-- sidebar menu area start -->
<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="{{route('dashboard')}}">
                <img src="{{asset('backend/assets')}}/images/icon/logo.png" alt="logo">
            </a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    <li class="{{Route::is('dashboard') ? 'active' : ''}}">
                        <a href="{{route('dashboard')}}"><i class="ti-dashboard"></i><span>dashboard</span></a>                  
                    </li>
                    <li class="{{Route::is('role.index') || Route::is('role.create')  ? 'active' : ''}}">
                        <a href="javascript:void(0)" aria-expanded="true">
                            <i class="ti-layout-sidebar-left"></i><span>
                                Role Management
                            </span>
                        </a>
                        <ul class="collapse">
                            <li class="{{Route::is('role.index') ? 'active' : ''}}">
                                <a href="{{route('role.index')}}" >Roles</a>
                            </li>
                            <li class="{{Route::is('role.create') ? 'active' : ''}}">
                                <a href="{{route('role.create')}}">Create Role</a>
                            </li>
                        </ul>
                    </li>
                   
                </ul>
            </nav>
        </div>
    </div>
</div>
<!-- sidebar menu area end -->