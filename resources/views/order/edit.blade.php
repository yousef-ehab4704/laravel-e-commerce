@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Edit Order',
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
            <h5 class="title">{{__(" Edit Order")}}</h5>
          </div>
          <div class="card-body">
            <form method="POST" action="{{route('order.update', [ 'order_id' => $order->id])}}" autocomplete="off"
            enctype="multipart/form-data">
              @csrf
              
              @include('alerts.success')
              <div class="row">
              </div>
                <div class="row">
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label>{{__("User")}}</label><br>
                            <select class="form-control" name ="user">
                                  @foreach($users as $user)
                                  @if($user->id == $current_user)
                                    <option value="{{$user->id}}" selected>{{$user->email}}</option>
                                  @else
                                  <option value="{{$user->id}}">{{$user->email}}</option>   
                                  @endif
                                  @endforeach                          
                                </select>
                               @foreach($order->product as $product)
                               @if($product->pivot->quantity != null)
                               <label for="cc1">{{$product->name}}</label><br>
                               <input type="number" name="quantities[{{$product->id}}]" class="form-control" value = "{{$product->pivot->quantity}}" >
                               @endif
                                @endforeach
                                @include('alerts.feedback', ['field' => 'name'])
                        </div>

                                @include('alerts.feedback', ['field' => 'product_id'])
                        </div>
                    </div>
                </div>
              <div class="card-footer ">
                <button type="submit" class="btn btn-primary btn-round" >{{__('Save')}}</button>
              </div>
            </form>
          </div>
      </div>
    </div>

    </div>
  </div>
@endsection