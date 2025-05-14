@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Create a user',
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
            <h5 class="title">{{__(" Create a user")}}</h5>
          </div>
          <div class="card-body">
            <form method="POST" action="{{route('users.new')}}" autocomplete="off"
            enctype="multipart/form-data">
              @csrf
              
              @include('alerts.success')
              <div class="row">
              </div>
                <div class="row">
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label>{{__(" Name")}}</label>
                                <input type="text" name="name" class="form-control" placeholder="Name">
                                @include('alerts.feedback', ['field' => 'name'])
                        </div>
                     
                    </div>
                </div>
                <div class="row">
                  <div class="col-md-7 pr-1">
                    <div class="form-group">
                      <label for="exampleInputEmail1">{{__(" Email address")}}</label>
                      <input type="email" name="email" class="form-control" placeholder="Email">
                      @include('alerts.feedback', ['field' => 'email'])
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-7 pr-1">
                    <div class="form-group">
                      <label for="exampleInputPassword">{{__(" Password")}}</label>
                      <input type="password" name="password" class="form-control" placeholder="Password">
                      @include('alerts.feedback', ['field' => 'password'])
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