<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginCrontroller extends Controller
{
    public function index(Request $request)
    {
        if(Auth::check()){
            return redirect()->route('home');
        }else{
            return view('login');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->flush();
        return redirect()->route('login');
    }
    
    public function verify_login(Request $request)
    {

        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);


        if(Auth::attempt($request->only(['email','password']))){
            if(Auth::user()->role == "admin"){
                return redirect()->route('admin-dashboard'); 
            }else{
                return redirect()->route('user-dashboard');
            }
        }else{
            return redirect()->route('login')->with('error','Invalid Credentials');
        }

        return redirect()->back()->with('error','Invalid Credentials');

    }
}
