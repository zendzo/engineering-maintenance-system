<!-- User Account: style can be found in dropdown.less -->
<li class="dropdown user user-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <img src="{{ Auth::user()->profile ? asset(Auth::user()->avatar) : Auth::user()->avatar }}" class="user-image" alt="User Image">
        <span class="hidden-xs">{{ Auth::user()->fullName }}</span>
    </a>
    <ul class="dropdown-menu">
        <!-- User image -->
        <li class="user-header">
        <img src="{{ Auth::user()->profile ? asset(Auth::user()->avatar) : Auth::user()->avatar }}" class="img-circle" alt="User Image">

        <p>
            {{ title_case(Auth::user()->fullName ) }}
            <small>{{ Auth::user()->role->name }}</small>
            <small>Member since {{ Auth::user()->created_at->diffForHumans() }}</small>
        </p>
        </li>
        <!-- Menu Body -->
        <li class="user-body">
        <div class="row">
            <div class="col-xs-4 text-center">
            <a href="#">Followers</a>
            </div>
            <div class="col-xs-4 text-center">
            <a href="#">Sales</a>
            </div>
            <div class="col-xs-4 text-center">
            <a href="#">Friends</a>
            </div>
        </div>
        <!-- /.row -->
        </li>
        <!-- Menu Footer-->
        <li class="user-footer">
        <div class="pull-left">
            <a href="#" class="btn btn-default btn-flat">Profile</a>
        </div>
        <div class="pull-right">
            <a href="{{ route('logout') }}"
                class="btn btn-default btn-flat"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>
        </li>
    </ul>
</li>