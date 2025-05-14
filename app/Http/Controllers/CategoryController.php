<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function navCategory(){
        $table_data = Category::all();
        return view('category.index', ['all_categories' => $table_data]);
    }
    public function navAddCategory(){
        return view('category.create');
    }
    public function addCategory(Request $request){
        $name = $request->name;
        Category::create(['name' => $name]);
        return view('home');
    }
    public function edit(Request $request){
        $id = $request->category_id;
        $category = Category::find($id);
        return view('category.edit',['category' => $category]);
    }
    public function update(Request $request){
        $id = $request->category_id;
        $category = Category::find($id);
        $category->update(['name' => $request->name]);
        $category->save();
        return view('home');
    }
}
