@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Create an order',
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
            <h5 class="title">{{__(" Create an order")}}</h5>
          </div>
          <div class="card-body">
            <form method="POST" action="{{route('order.add')}}" autocomplete="off"
            enctype="multipart/form-data">
              @csrf
              
              @include('alerts.success')
                <div class="row">
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                        <select class="form-control" name = "user_email">
                                    @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->email}}</option>
                                    @endforeach
                        </select>
                                @include('alerts.feedback', ['field' => 'user_id'])

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label>{{__("Item")}}</label><br>
                               @foreach($products as $product)
                               <input type="checkbox" id = "ccc1" name="products[]" value="{{$product->id}}">
                               <label for="ccc1">{{$product->name}}</label><br>
                               <input type="number" name="quantities[{{$product->id}}]" class="form-control" >
                                @endforeach
                                @include('alerts.feedback', ['field' => 'quantity'])
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