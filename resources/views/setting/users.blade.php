@extends('layouts.master')

@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header">
               <h3 class="box-title">{{ $page_title or config('app.name') }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Username</th>
                  <th>Email</th>
                  <th>User Role</th>
                  <th>#</th>
                </tr>
                </thead>
                <tbody>
                  @if(!is_null($users))
                    @foreach($users as $user)
                     <tr>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role->name }}</td>
                        <td width="20%">
                           <a class="btn btn-xs btn-info" href="{{ route('admin.role.show',$user->id) }}">
                              <span class="fa fa-info fa-fw"></span>
                           </a>
                           <a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#roleModalEdit-{{ $user->id }}" href="#">
                              <span class="fa fa-pencil fa-fw"></span>
                           </a>
                           <!-- Modal Form Edit-->
                           <div class="modal fade" id="roleModalEdit-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="roleModalEdit-{{ $user->id }}">
                              @include('setting.user.edit_modal')
                           </div>
                              <form method="POST" action="{{ route('admin.user.destroy',$user->id) }}" accept-charset="UTF-8" style="display:inline">
                              {{ method_field('DELETE') }}
                              {{ csrf_field() }}
                              <button type="submit" class="btn btn-xs btn-danger">
                                 <span class="fa fa-close fa-fw"></span>
                              </button>
                           </form>
                        </td>
                      </tr>
                    @endforeach
                  @endif
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->

            <!-- Modal Button -->
            <div class="box-footer clearfix">
              <a class="btn btn-success" data-toggle="modal" data-target="#roleModal" href="#"><span class="fa fa-plus fa-fw"></span>&nbsp;@lang('application.add new record')</a>   
            </div>

            <!-- Modal Form -->
            <div class="modal fade" id="roleModal" tabindex="-1" role="dialog" aria-labelledby="roleModal">
               @include('setting.user.create_modal')
            </div>

          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection