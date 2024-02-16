<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

////////////////////////////// Register /////////////////////////////

    public function register()
    {
        return view('adidass.register');
    }

    public function create_account(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
        ]);

        $user = new User();
        $user-> name = $request->name;
        $user-> email = $request->email;
        $user-> password = $request->password;

        $user->save();

        return redirect('/login')->with('success', 'Your Account successful!');
    }


    /////////////////////////// login //////////////////////////////

    public function login_page()
    {
        return view('adidass.login');
    }


    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();
        
        if($user && Hash::check($request->password , $user->password)){
            return redirect('/')->with('success', 'Login successful!');
        }
        return redirect()->back()->withInput($request->only('email'))->with('error', 'Invalid email or password');;
    }

    public function logout(){

        Session::flush();
        Auth::logout();
        return redirect('/login');
        
    }
}
