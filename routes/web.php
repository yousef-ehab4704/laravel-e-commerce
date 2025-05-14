<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/login', [LoginController::class,'handleLogin'])->name('login');
Route::get('/logout', [LoginController::class,'handleLogout']);
Route::post('/register',[RegisterController::class,'handleRegister'])->name('register');
Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('user/edit', [UserController::class, 'edit'])->name('users.edit')->middleware('ensure_is_admin_owner');
Route::post('user/edit-user', [UserController::class, 'update'])->name('users.update');
Route::post('user/action', [UserController::class, 'action'])->name('users.action');
Route::post('/order-action', [OrderController::class, 'action'])->name('order.action');
//Product routes
Route::get('product-edit', [ProductsController::class, 'edit'])->name('product.edit');
Route::post('product-update', [ProductsController::class, 'update'])->name('product.update');
Route::get('product-show_all', [ProductsController::class, 'display'])->name('product.show_all');
//Categories routes
Route::get('user/categories', [CategoryController::class, 'navCategory'])->name('category.index');
Route::get('create-category', [CategoryController::class, 'navAddCategory'])->name('category.create');
Route::post('add-category', [CategoryController::class, 'addCategory'])->name('category.add');
Route::get('edit-category', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('category-update', [CategoryController::class, 'update'])->name('category.update');
//Roles routes
Route::get('user/role', [RoleController::class,'index'])->name('role.index');
Route::get('create-role', [RoleController::class, 'navCreateRole'] )->name('role.create');
Route::post('add-role', [RoleController::class, 'addRole'])->name('role.add');
Route::get('role-edit', [RoleController::class, 'edit'])->name('role.edit');
Route::post('role-update', [RoleController::class, 'update'])->name('role.update');
//Order routes
Route::get('order-index', [OrderController::class, 'index'])->name('order.index');
Route::get('order-create', [OrderController::class, 'newOrder'])->name('order.create');
Route::post('order-add', [OrderController::class, 'placeOrder'])->name('order.add');
Route::get('order-edit', [OrderController::class, 'edit'])->name('order.edit');
Route::post('order-update', [OrderController::class, 'update'])->name('order.update');

Route::group(['middleware' => 'auth'], function () {
	Route::get('user/products',[ProductsController::class, 'navProducts'])->name('product.index');
    Route::get('products-add', [ProductsController::class, 'navAddProduct'])->name('product.add_product');
	Route::post('products-create', [ProductsController::class, 'addProduct'])->name('product.add');
	Route::post('new-user', [UserController::class, 'new'])->name('users.new');
	Route::get('create-user', [UserController::class, 'navCreateUser'])->name('users.add-user');
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']])->middleware('ensure_is_admin_owner');
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);
});

