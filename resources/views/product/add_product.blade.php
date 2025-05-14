@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Create a product',
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
            <h5 class="title">{{__(" Create a product")}}</h5>
          </div>
          <div class="card-body">
            <form method="POST" action="{{route('product.add')}}" autocomplete="off"
            enctype="multipart/form-data">
              @csrf
              
              @include('alerts.success')
              <div class="row">
              </div>
                <div class="row">
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label>{{__("Name")}}</label>
                                <input type="text" name="name" class="form-control" placeholder="Name">
                                @include('alerts.feedback', ['field' => 'name'])
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label>{{__("Category")}}</label>
                                <select class="form-control" name = "category_id">
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @include('alerts.feedback', ['field' => 'name'])
                        </div>
                    </div>
                </div>
                <div class="row">
                  <div class="col-md-7 pr-1">
                    <div class="form-group">
                      <label for="exampleInputPrice1">{{__("Price")}}</label>
                      <input type="number" name="price" class="form-control" placeholder="Price">
                      @include('alerts.feedback', ['field' => 'price'])
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-7 pr-1">
                    <div class="form-group">
                      <label for="exampleInputPassword">{{__("Stock")}}</label>
                      <input type="number" name="stock" class="form-control" placeholder="Stock">
                      @include('alerts.feedback', ['field' => 'stock'])
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