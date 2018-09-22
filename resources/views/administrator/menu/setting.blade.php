<li class="treeview {{ active(['admin.setting.*']) }}">
  <a href="#">
    <i class="fa fa-gear"></i> <span>Setting</span>
    <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
    <li class="{{ active('admin/setting/manager') }}"><a href="{{ route('admin.setting.type','manager') }}"><i class="fa fa-users"></i> Manager</a></li>
    <li class="{{ active('admin/setting/engineer') }}"><a href="{{ route('admin.setting.type','engineer') }}""><i class="fa fa-user"></i> Enginer</a></li>
    <li class="{{ active('admin/setting/location') }}"><a href="{{ route('admin.setting.type','location') }}"><i class="fa fa-map-marker"></i> Location</a></li>
    <li class="{{ active('admin/setting/department') }}"><a href="{{ route('admin.setting.type','department') }}"><i class="fa fa-clipboard"></i> Departement</a></li>
  </ul>
</li>