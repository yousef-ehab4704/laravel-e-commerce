<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use Auth;
use App\Models\User;

class OrderController extends Controller
{
    public function index(){
        $orders= Order::all();
        return view('order.index', ['orders' => $orders]);
    }
    public function newOrder(){
        $products = Product::all();
        $all_users = User::all();
        return view('order.create', ['products' => $products, 'users' => $all_users]);
    }
    public function placeOrder(Request $request){
     $product_id = $request->products;
     $user = $request->user_email;
     $quantities = $request->quantities;
     $total = 0;

     foreach($product_id as $id){
     $product_find = Product::find($id);
     if($product_find->stock>0){
     $product_find->update(['stock' => $product_find->stock -= 1]);
     $product_find->save();
     }
     }

     foreach($product_id as $id){
    $product = Product::find($id);
    $total += $product->price;
    $all_users = User::all();
     }

     $newOrder = Order::create(['total' => $total, 'user_id' => $user]);
     $order_id = $newOrder->id;
     $order = Order::find($order_id);
     foreach($quantities as $product_id => $quantity){
        $order->product()->attach($product_id, ['quantity' => $quantity]);
    
     }
     
     return view('home');
    }

    public function edit(Request $request){
    $count = 0;
    $all_users = User::all();    
    $orderId = $request->order_id; 
    $order_to_edit = Order::find($orderId); 
    $current_user = $order_to_edit->user_id;
    $all_products = Product::all();
    return view('order.edit', ['order' => $order_to_edit, 'products' => $all_products, 'users' => $all_users, 'current_user' => $current_user]);    
    }

    public function update(Request $request){
    $orderId = $request->order_id;
    $order = Order::find($orderId);
    $quantities = $request->quantities;
    $user_id = $request->user;
    $order->update(['user_id' => $user_id]);
    foreach($order->product as $product){
        if($quantities[$product->id] !=null)
        $order->product()->detach($product->id, ['quantity']);
    }
    foreach($quantities as $product => $quantity){
    $order->product()->attach($product, ['quantity' => $quantity]);
}   

    
    return view('home');        
    }
    public function action(Request $request){
  $action = $request->action;
  $order_id = $request->order_id;
  $order = Order::find($order_id);
  $current_user = $order->user_id;
  $all_users = User::all();
  $all_products = Product::all();
  if($action == 1){
  $order->delete();
  return view('home');
  }
  if($action == 2){
   return view('order.edit', ['order' => $order, 'products' => $all_products, 'users' => $all_users,'current_user' => $current_user ]);
  }
    }
}
