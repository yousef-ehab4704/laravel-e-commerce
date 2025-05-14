<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
 public function index(){
    $Roles = Role::all();
    return view('role.index', ['roles' => $Roles]);
 }
 public function navCreateRole(){
    
    return view('role.create' );
 }
 public function addRole(Request $request){
    $role = $request->role;
    $id = $request->role_id;
    Role::create(['role' => $role, 'id' => $id ]);
    return view('home'); 
 }
 public function edit(Request $request){
    $id = $request->role_id;
    $this_role = Role::find($id);
    return view('role.edit', [ 'this_role' => $this_role]);
 }
 public function update(Request $request){
    $id = $request->role_id;
    $this_role = Role::find($id);
    $role = $request->role;
    $this_role->update(['role' => $role ]);
    $this_role->save();
    return view('home');
 }   
}
