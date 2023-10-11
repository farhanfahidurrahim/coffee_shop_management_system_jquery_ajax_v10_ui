<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booktable;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booktable::orderBy('id','desc')->get();
        return view('backend.booking.index', compact('bookings'));
    }

    public function changeBookingStatus(Request $request)
    {
        $statusChange = Booktable::find($request->booking_id);
        $statusChange->status = $request->status;
        $statusChange->save();

        return response()->json([
            'success' => "Status change successfully!"
        ]);
    }

    public function deleteBooking($id)
    {
        $book = Booktable::findOrFail($id);

        $book->delete();
        return response()->json([
            'status'=>'success'
        ]);
    }
}
