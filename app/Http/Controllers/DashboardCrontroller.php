<?php

namespace App\Http\Controllers;

use App\Models\Catelog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DashboardCrontroller extends Controller
{
    public function index(Request $request)
    {
        if (Auth::user()->role == "admin") {
            return redirect()->route('admin-dashboard');
        }else{
            return redirect()->route('user-dashboard');
        }
    }
    public function user_dashboard(Request $request)
    {
        return view('dashboard_user');
    }

    public function admin_dashboard(Request $request)
    {
        if (Auth::user()->role == "user") {
            return redirect()->route('user-dashboard');
        }else{
            $catalog = Catelog::get();
            $catalogs = $catalog->toArray();
            return view('dashboard_admin', compact('catalogs'));
        }
    }
}
