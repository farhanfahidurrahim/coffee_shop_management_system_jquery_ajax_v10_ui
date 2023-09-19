<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminLogin()
    {
        return view('admin.login');
    }

    public function adminLoginCheck(Request $request)
    {
        //return $request->all();
        if(auth()->guard('admin')->attempt(['email'=>$request->input('email'), 'password'=>$request->input('password')])){
            return redirect()->route('admin.dashboard');
        }
        return redirect()->back()->with(['error' => 'error logging in!']);
    }

    public function index()
    {
        return view('admin.index');
    }
}
