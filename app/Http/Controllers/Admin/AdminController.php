<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function adminLogin()
    {
        return view('admin.login');
    }

    public function adminLoginCheck(Request $request)
    {
        //return $request->all();
        if (auth()->guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->back()->with(['error' => 'error logging in!']);
    }

    public function index()
    {
        return view('admin.index');
    }

    public function allAdmin()
    {
        return view('backend.admin.all_admin');
    }

    public function getAllAdmin()
    {
        $data = Admin::all();
        return response(["data" => $data], 200, ['Content-type' => "Application/JSON"]);
    }

    public function createAdmin()
    {
        return view('backend.admin.create_admin');
    }

    public function storeAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'email|unique:admins',
            'password' => 'required',
        ]);

        $data = $request->all();
        $data['password'] = Hash::make($data['password']); // Hash the password before storing it
        $store=Admin::create($data);
        if ($store) {
            return redirect()->route('all.admin')->with('success',"Data Added");
        }else{
            return redirect()->route('all.admin')->with('error',"Something went wrong!");
        }

    }

    public function create_admin_ajax(Request $request)
    {
        // return $request->all();
        $request->validate([
            'name' => 'required',
            'email' => 'email|unique:admins',
            'password' => 'required',
        ]);

        $data = $request->all();
        $data['password'] = Hash::make($data['password']); // Hash the password before storing it

        try {
            Admin::create($data);
            return response()->json(['success' => 'Admin created successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error creating admin: ' . $e->getMessage()], 500);
        }

    }

    public function update_admin_ajax(Request $request, $id)
    {
        $find=Admin::findOrfail($id);
        $request->validate([
            'name' => 'required',
            'email' => 'email|unique:admins,email,' . $id,
        ]);

        $data = $request->all();
        $find->update($data);

        return response()->json(['message' => 'Admin updated successfully']);
    }

    public function delete_admin_ajax($id)
    {
        $find=Admin::findOrfail($id);
        $find->delete();
    }
}
