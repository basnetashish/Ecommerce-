<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserRoleController extends Controller
{
    Public function index()
     {
        $users = User:: paginate(10);
        return view('backend.users.index' ,compact('users'));
    }
    

    public function create()
    {
        $permissions = Permission::get();
        return view('backend.users.create',compact('permissions'));
    }

    public  function store(Request $request)
    {
         $request->validate( [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        $user->syncPermissions($request->permission, []);

        return redirect()->route('users.index')->with('success',"user created successfully");

    }
    public function edit($id)
    {
        $admins = User::findOrFail($id);
        $permissions = Permission::all();
   
        return view('backend.users.edit',compact(['admins','permissions']));
    }
    public function show($id)
    {
        dd($id);
       $user = User::find($id);
       
    }
    public function destroy($id)
    {
        
         $user = User::find($id);
        $user->delete();
        // $user ->revokePermission($user);
        return redirect()->route('users.index')->with('success',"User deleted successfully");
    }
    public function update( Request $request, $id)
    {
        $user = User::findOrFail($id);
        $request->validate( [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        
        $user->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        $user->syncPermissions($request->permission, []);

        return redirect()->route('users.index')->with('success',"user updated successfully");
    }
}

