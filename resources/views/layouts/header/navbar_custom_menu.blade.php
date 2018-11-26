<!-- User Account Menu -->
<div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
        <!-- Messages: style can be found in dropdown.less-->
        {{-- @include('layouts.header.partials.messages') --}}
        <!-- Notifications: style can be found in dropdown.less -->
        {{-- @include('layouts.header.partials.notifications') --}}
        <!-- Tasks: style can be found in dropdown.less -->
        {{-- @include('layouts.header.partials.tasks') --}}
        <!-- User Account: style can be found in dropdown.less -->
        @include('layouts.header.partials.user_account')
        <!-- Control Sidebar Toggle Button -->
        <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
        </li>
    </ul>
</div>