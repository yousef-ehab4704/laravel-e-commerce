@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Edit Category',
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
            <h5 class="title">{{__(" Edit a category")}}</h5>
          </div>
          <div class="card-body">
            <form method="POST" action="{{route( 'category.update' , ['category_id' => $category->id])}}" autocomplete="off"
            enctype="multipart/form-data">
              @csrf
            
              @include('alerts.success')
              <div class="row">
              </div>
                <div class="row">
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label>{{__("Name")}}</label>
                                <input type="text" name="name" class="form-control" value ="{{$category->name}}" >
                                @include('alerts.feedback', ['field' => 'name'])
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