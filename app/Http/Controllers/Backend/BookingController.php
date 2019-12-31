<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('backend.bookings.index');
    }

    public function getAllBookings(Request $request)
    {
        $data = array();
        $bookings = Booking::with('user')->get();

        $data['code'] = 200;
        $data['bookings'] = $bookings;
        return response()->json($data);
    }
}
