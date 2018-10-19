<div class="row">
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3>{{ $workorders->count() }}</h3>

        <p>All Work Orders</p>
      </div>
      <div class="icon">
        <i class="fa fa-list"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
      <div class="inner">
        <h3>{{ $workorders->whereIn('status',3)->count() }}</h3>

        <p>Done</p>
      </div>
      <div class="icon">
        <i class="fa  fa-check-square-o"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3>{{ $workorders->whereIn('status',2)->count() }}</h3>

        <p>On Progress</p>
      </div>
      <div class="icon">
        <i class="fa fa-spinner"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-red">
      <div class="inner">
        <h3>{{ $workorders->whereIn('status',1)->count() }}</h3>

        <p>Pending</p>
      </div>
      <div class="icon">
          <i class="fa fa-clock-o"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
</div>