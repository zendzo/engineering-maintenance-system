<li class="treeview {{ active(['admin.setting.*']) }}">
  <a href="#">
    <i class="fa fa-gear"></i> <span>Setting</span>
    <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
    <li class="{{ active(['admin/setting/manager','admin/setting/engineer','admin/setting/admin']) }}">
        <a href="#"><i class="fa fa-users text-aqua"></i> Users
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
            <li class="{{ active('admin/setting/manager') }}"><a href="{{ route('admin.setting.type','manager') }}"><i class="fa fa-user-md"></i> Manager</a></li>
            <li class="{{ active('admin/setting/engineer') }}"><a href="{{ route('admin.setting.type','engineer') }}""><i class="fa fa-user-plus"></i> Enginer</a></li>
            <li class="{{ active('admin/setting/admin') }}"><a href="{{ route('admin.setting.type','admin') }}""><i class="fa fa-user"></i> Admin Dept</a></li>
        </ul>
    </li>
    <li class="{{ active('admin/setting/location') }}"><a href="{{ route('admin.setting.type','location') }}"><i class="fa fa-map-marker"></i> Location</a></li>
    <li class="{{ active('admin/setting/category') }}"><a href="{{ route('admin.setting.type','category') }}"><i class="fa fa-bars"></i> WO Category</a></li>
    <li class="{{ active('admin/setting/supplier') }}"><a href="{{ route('admin.setting.type','supplier') }}"><i class="fa fa-truck"></i> Asset Supplier</a></li>
    <li class="{{ active('admin/setting/department') }}"><a href="{{ route('admin.setting.type','department') }}"><i class="fa fa-clipboard"></i> Departement</a></li>
  </ul>
</li>