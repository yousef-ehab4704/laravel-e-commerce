@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Edit Role',
    'activePage' => 'profile',
    'activeNav' => '',
])

@section('content')
  <div class="panel-header panel-header-sm">
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <h5 class="title">{{__(" Edit a Role")}}</h5>
          </div>
          <div class="card-body">
            <form method="POST" action="{{route('role.update', ['role_id' => $this_role->id])}}" autocomplete="off"
            enctype="multipart/form-data">
              @csrf
              @include('alerts.success')
              <div class="row">
              </div>
                <div class="row">
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label>{{__("Role")}}</label>
                                <input type="text" name="role" class="form-control" value ="{{$this_role->role}}" >
                                @include('alerts.feedback', ['field' => 'role'])
                        </div>
                    </div>
                </div>
              <div class="card-footer ">
                <button type="submit" class="btn btn-primary btn-round">{{__('Save')}}</button>
              </div>
            </form>
          </div>
      </div>
    </div>
    </div>
  </div>
@endsection