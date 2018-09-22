<li class="treeview {{ active(['admin.report.*']) }}">
  <a href="#">
    <i class="fa fa-folder-open-o"></i> <span>Report</span>
    <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
    <li class="{{ active('admin/report/job') }}"><a href="{{ route('admin.report.type','job') }}"><i class="fa fa-thumbs-o-up"></i> History By Job</a></li>
    <li class="{{ active('admin/report/location') }}"><a href="{{ route('admin.report.type','location') }}"><i class="fa fa-map-marker"></i> History By Location</a></li>
    <li class="{{ active('admin/report/engineer') }}"><a href="{{ route('admin.report.type','engineer') }}"><i class="fa fa-user"></i> History By Enginner</a></li>
    <li class="{{ active('admin/report/status') }}"><a href="{{ route('admin.report.type','status') }}"><i class="fa fa-info-circle"></i> History By Status</a></li>
  </ul>
</li>