<!--Start sidebar-wrapper-->
<div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
    <div class="brand-logo">
        <a href="index-2.html">
            <img src="{{env('APP_URL')}}assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
            <h5 class="logo-text">Blog</h5>
        </a>
    </div>
    <div class="user-details">
        <div class="media align-items-center user-pointer collapsed" data-toggle="collapse" data-target="#user-dropdown">
            <div class="avatar"><img class="mr-3 side-user-img" src="{{env('APP_URL')}}assets/images/avatars/avatar-13.png" alt="user avatar"></div>
            <div class="media-body">
                <h6 class="side-user-name">
                    @if(Auth::user())
                        {{Auth::user()->first_name." ".Auth::user()->last_name}}
                    @else
                        {{env('APP_NAME')}}
                    @endif
                </h6>
            </div>
        </div>
        <div id="user-dropdown" class="collapse">
            <ul class="user-setting-menu">
                <li><a href="javaScript:void();"><i class="icon-user"></i>  My Profile</a></li>
                <li><a href="javaScript:void();"><i class="icon-settings"></i> Setting</a></li>
                <li><a href="javaScript:void();"><i class="icon-power"></i> Logout</a></li>
            </ul>
        </div>
    </div>
    <ul class="sidebar-menu">
        <li class="sidebar-header">MAIN NAVIGATION</li>

        <li>
            <a href="{{ route('home') }}" class="waves-effect">
                <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
            </a>
        </li>

        @if(\Illuminate\Support\Facades\Auth::user()->is_admin)
            <li>
                <a href="{{ url('user') }}" class="waves-effect">
                    <i class="zmdi zmdi-account-circle"></i> <span>Users</span>
                </a>
            </li>
        @endif

        <li>
            <a href="{{ url('userPost') }}" class="waves-effect">
                <i class="zmdi zmdi-account-circle"></i> <span>Users Post</span>
            </a>
        </li>

    </ul>

</div>
<!--End sidebar-wrapper-->
