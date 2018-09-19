<li class="treeview {{ active(['admin.workorder.*']) }}">
  <a href="#">
    <i class="fa fa-sticky-note-o"></i> <span>Work Order</span>
    <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
    <li class="{{ active('admin.workorder.index') }}"><a href="{{ route('admin.workorder.index') }}"><i class="fa fa-list"></i> All List</a></li>
    <li class="{{ active('admin/workorder/today') }}"><a href="{{ route('admin.workorder.show','today') }}"><i class="fa fa-calendar-check-o"></i> Today</a></li>
    <li class="{{ active('admin/workorder/pending') }}"><a href="{{ route('admin.workorder.show','pending') }}"><i class="fa fa-clock-o"></i> Pending</a></li>
    <li class="{{ active('admin/workorder/progress') }}"><a href="{{ route('admin.workorder.show','progress') }}"><i class="fa fa-spinner"></i> On Progress</a></li>
    <li class="{{ active('admin/workorder/done') }}"><a href="{{ route('admin.workorder.show','done') }}"><i class="fa  fa-check-square-o"></i> Done</a></li>
  </ul>
</li>