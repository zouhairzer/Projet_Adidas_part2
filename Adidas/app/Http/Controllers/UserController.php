<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\role;


class UserController extends Controller
{
    public function afficher_user()
    {
        $users = DB::table('users')->join('roles','users.role','=','roles.id')
                                   ->select('roles.role as role_name','users.*')
                                   ->paginate(4);
        // $roles = role::all();
        
        return view('adidass.admin.user', compact('users'));
    }

    public function ajouter()
    {
        $roles = role::all();
        return view('adidass.admin.inputUser',compact('roles'));
    }


    public function ajouter_User(Request $request)
    {
        
        // dd($request);

        $request->validate([
            'name' => 'required',                                                
            'role_name' => 'required',
            'email' => 'required',                  
            'password' => 'required',
        ]);
       

        $user = new User();
        // dd($user);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role_name;
        $user->password = $request->password;


        
        $user->save();

        // dd($user);
        
        return redirect('/user');
    }


    public function deleteUser($id)
    {
        $user = user::find($id);
        $user->delete();

        return redirect('/user');
    }


    public function fetch_User($id)
    {
        $user = user::find($id);
        $roles = role::all();
        return view('adidass.admin.updateUser', compact('user','roles'));
    }


    public function update_user(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role_name' => 'required',
        ]);

        // dd($request);

        $user = User::find($request->id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role_name;


        // dd($user);

        $user->update();

        return redirect('/user');
    }
}
