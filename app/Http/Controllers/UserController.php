<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        return view('users.users-list',[
            'users'=>User::all()->sortBy('name')
        ]);
    }

    public function edit( User $user)
    {
        return view('users.edit-user',[
            'user'=>$user,
            'roles'=>Role::all()->sortBy('name'),
            'permissions'=>Permission::all()->sortBy('name')
        ]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
           'name'=>'required'
        ]);
         $user->syncPermissions($request->input('permissions'));
        $user->syncRoles($request->input('roles'));
      return redirect()->route('users.index');
    }
}
