<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\role;
use App\Models\Route;

class RoleController extends Controller
{
    public function afficher_role()
    {
        $roles = role::paginate(5);

        return view('adidass.admin.Role', compact('roles','routes'));
    }



    public function ajouter()
    {
        $routes = Route::all();
        return view('adidass.admin.inputRole',compact('routes'));
    }

    
    public function ajouter_role(Request $request)
    {
        
        $request->validate([
            'role' => 'required',
            'route_id:*' => 'required',
        ]);
        
        $role = new role();
        $role->role = $request->role;

        $role->save();

        return redirect('/Role')->with('status','success');
    }

    public function delete_role($id)
    {
        $roles = role::find($id);
        $roles->delete();
        // dd($roles);
        return redirect('/Role');
    }

    public function fetch_Role($id)
    {
        $Role = role::find($id);
        
        return view('adidass.admin.updateRole', compact('Role'));
    }

    public function update_Role(Request $request)
    {
        $request->validate([
            'role' => 'required'
        ]);

        $role = role::find($request->id);
        $role->role = $request->role;
        $role->update();

        return redirect('/Role')->with('status','success');
    }
}
