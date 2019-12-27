<?php

namespace App\Http\Controllers\Cleaner;

use App\Http\Controllers\Controller;
use App\Services\BookingService;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(BookingService $bookingServices)
    {
        $this->middleware('auth');
        $this->bookingServices = $bookingServices;
    }

    /**
     * Show the cleaners booking.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('cleaner.booking.index');
    }

    public function getAllBookings(Request $request)
    {
        $data = array();
        $data['code'] = 200;
        $data['bookings'] = $this->bookingServices->getAllBookingOfCleaner();
        return response()->json($data);
    }

    public function view($id)
    {
        $booking = $this->bookingServices->getBookingById($id);
        return view('cleaner.booking.view', compact('booking'));
    }
}
