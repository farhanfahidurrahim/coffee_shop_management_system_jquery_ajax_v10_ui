<?php

namespace App\Http\Controllers;

use App\Models\Booktable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BooktableController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function booktable(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'date' => 'required',
            'time' => 'required',
            'phone' => 'required',
            'message' => 'required',
        ]);

        $data = $request->all();
        $data['user_id']=Auth::user()->id;
        Booktable::create($data);

        return redirect()->back()->with(['success' => "Booking Table Successfully"]);
    }
}
