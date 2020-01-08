<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\CleaningServices;
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
        $bookings = Booking::with('user');

        if($request->has('query')){
            $query = $request->get('query');
            if($query && isset($query['general']) && $query['general'] != ''){

            }
        }
        if($request->has('f') && $request->get('f') != ''){
            $bookings->whereDate('booking_date', '>=', $request->f);
        }
        if($request->has('t') && $request->get('t') != ''){
            $bookings->whereDate('booking_date', '<=', $request->t);
        }

        $data['code'] = 200;
        $data['bookings'] = $bookings->get();
        return response()->json($data);
    }

    public function calendar()
    {
        $formattedBookings = [];
        $bookings = Booking::groupBy('booking_date')->selectRaw('count(*) as total, booking_date')->get();

        foreach ($bookings as $key => $value) {
                $tmp = new \stdClass;
                $tmp->title = $value->total;
                $tmp->start = $value->booking_date;
                $tmp->className = 'fc-event-light fc-event-solid-primary';
                $tmp->url = '/admin/bookings/v/'.strtotime($value->booking_date);
                $formattedBookings[] = $tmp;
        }

        return view('backend.bookings.calendar')->with('bookingsData',json_encode($formattedBookings));
    }

    public function bookingsByDate(Request $request)
    {
        return view('backend.bookings.index');
    }
}
