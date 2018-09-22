<ul class="sidebar-menu">
<li class="header">MAIN NAVIGATION</li>
<!-- if user is admin show menu -->
@if(Auth::user()->role_id === 1)
  @include('administrator.menu.workorder')
  @include('administrator.menu.maintenance')
  @include('administrator.menu.report')
  @include('administrator.menu.setting')
@endif
</ul>
