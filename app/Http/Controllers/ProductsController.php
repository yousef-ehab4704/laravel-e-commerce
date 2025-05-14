<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductsController extends Controller
{
    public function display(){
        $products = Product::all();
        return view('product.show_all', ['products' => $products]);
    }

    public function navProducts(Product $model){
        $table_data = Product::all();
        return view('product.index', ['products' => $table_data]);
    }
    public function navAddProduct(){
        $table_data = Category::all();
        return view('product.add_product',['categories' => $table_data] );
    }
    public function addProduct(Request $request){
       $name = $request->name;
       $price = $request->price;
       $stock = $request->stock;
       $category = $request->category_id;
       Product::create(['name' => $name, 'price' => $price, 'stock' => $stock, 'category_id' => $category]);
       return view('home');
    }
    public function edit(Request $request){
        $id = $request->product_id;
        $product_find = Product::find($id);
        $all_categories = Category::all();
        return view('product.edit', ['product' => $product_find, 'all_categories' => $all_categories]);

    }
    public function update(Request $request ){
 
       $id = $request->product_id;
       $product = Product::find($id);
       $product->update(['name' => $request->name, 'price' => $request->price, 'stock' => $request->stock]);
       $product->category_id = $request->category_id;
       $product->save();
       return view('home');
    }
}
