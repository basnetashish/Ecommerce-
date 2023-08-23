<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use Spatie\Permission\Models\Permission;


class RolesController extends Controller
{
    public function index(){
        $roles = Role::get();
        return view('backend.roles.index',compact('roles'));
    }
    public function create()
    {

        return view('backend.roles.create');
    }
    public function store(Request $request)
    {
        $role = Role::create([
            'name' => $request->role,
            'guard_name' => $request->guard_name,
        ]);
   
        return redirect()->route('roles.index')->with('success',"Successfully role added");
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        return redirect()->route('roles.index')->with('success',"Role deleted successfully");

    }
     public function edit($id)
     {
        $role = Role::findOrFail($id);
      
        return view('backend.roles.edit',compact(['role']));

     }
     public function update(Request $request , $id)
     {
        $role = Role::findOrFail($id);

        $role->update([
            'name' => $request->role,
            'guard_name' => $request->guard_name,
        ]);
       
        return redirect()->route('roles.index')->with('succes',"Roles Updated successfully");
     }
}
