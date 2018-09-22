<li class="treeview {{ active(['admin.calendar.*','admin.asset.*']) }}">
  <a href="#">
    <i class="fa fa-wrench"></i> <span>Maintenance</span>
    <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
    <li class="{{ active('admin.calendar.index') }}"><a href="{{ route('admin.calendar.index') }}"><i class="fa fa-calendar"></i> Calendar</a></li>
    <li class="{{ active('admin.asset.index') }}"><a href="{{ route('admin.asset.index') }}"><i class="fa fa-tags"></i> Asset</a></li>
  </ul>
</li>