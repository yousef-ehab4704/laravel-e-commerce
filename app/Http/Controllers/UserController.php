<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Requests\ValidateNewUser;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        $table_data = User::all();
        return view('users.index', ['users' => $table_data]);
    }
    public function edit(Request $request){
        $id=$request->user_id;
        $user=User::find($id);
        $roles = Role::all();
        return view('users.edit', ['user'=> $user, 'roles' => $roles]);
    }
    public function update(Request $request){
        $user= User::find($request->user_id);
            $user->update([ 'name'=>$request->name ,'email'=>$request->email ]);
            $user->role_id = $request->role_id;
            $user->save(); 
        $users= User::all();
        return view('users.index', ['users'=>$users]);
    }
    public function navCreateUser(){
        return view('users.add-user');
    }
    public function new(ValidateNewUser $request){
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
     User::create(['name' => $name, 'email' => $email, 'password' => $password]);
     return view('home');
    }
    public function action(Request $request)
    {
        $action = $request->action;
        $user_id = $request->user_id;
        $user = User::find($user_id);
        $roles = Role::all();  
        if($action ==1 ){
        $user->delete();
        return redirect()->route('home');
        }
        if($action ==2){
         return view('users.edit', ['user'=> $user, 'roles' => $roles]);
        }

    }
}
