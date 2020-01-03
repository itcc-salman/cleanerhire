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
        $bookings = Booking::with('user')->get();

        $data['code'] = 200;
        $data['bookings'] = $bookings;
        return response()->json($data);
    }

    public function calendar()
    {
        $bookings = Booking::with('user')->get();
        $_time = 60 * 60;
        $formattedBookings = [];
        foreach ($bookings as $key => $booking) {
            try{
                $tmp = new \stdClass;
                $tmp->title = $booking->user->first_name .' '. $booking->user->last_name;
                $tmp->start = $booking->booking_date.'T'.$booking->booking_time;
                $_end = strtotime($booking->booking_time) + ( $booking->duration > 1 ? $_time * $booking->duration : $_time );
                $tmp->end = $booking->booking_date.'T'.date('H:i:s', $_end);
                // $tmp->end = $booking->booking_date.'T'.($booking->booking_time + $booking->duration);
                $services = CleaningServices::whereIn('id',explode(',', $booking->services))->pluck('name')->toArray();
                $tmp->description = implode(' ', $services);
                $tmp->className = 'fc-event-light fc-event-solid-primary';
                $formattedBookings[] = $tmp;
            }
            catch(Exception $e){
                continue;
            }
        }

            // dd($formattedBookings);
            // {
            //     title: 'All Day Event',
            //     start: YM + '-01',
            //     description: 'Toto lorem ipsum dolor sit incid idunt ut',
            //     className: "fc-event-danger fc-event-solid-warning"
            // }

        return view('backend.bookings.calendar')->with('bookingsData',json_encode($formattedBookings));
    }
}
