<?php

namespace App\Http\Controllers\Cleaner;

use App\Http\Controllers\Controller;
use App\Services\BookingService;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\BookingCleanerEmails;
use App\Services\CleanerService;
use Mail;
use App\Mail\CleanerAssigned;
use App\Mail\BookingConfirmation;

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
        if( !$booking->assigned_user_id || $booking->assigned_user_id != \Auth::id() ) {
            dd('not authorized');
            return view('frontend.booking_taken');
        }
        return view('cleaner.booking.view', compact('booking'));
    }

    public function reviewAndConfirm($token)
    {
        $booking_emails = BookingCleanerEmails::where('token', $token)->first();
        if( $booking_emails ) {
            $booking = $this->bookingServices->getBookingByIdWithUser($booking_emails->booking_id);
            if( $booking->assigned_user_id && $booking->assigned_user_id != \Auth::id() ) {
                return view('frontend.booking_taken');
            }
            if( $booking->booking_type == 'residential' ) {
                // assign this booking to logged in cleaner if not taken already
                $cleanerService = new CleanerService;
                $cleaner = $cleanerService->getLogedInCleaner();
                $booking->assigned_user_id = $cleaner->user_id;
                $booking->assigned_cleaner_id = $cleaner->id;
                $booking->status = Booking::STATUS_ASSIGNED;
                $booking->save();
                // send confirmation email to customer with cleaner details
                Mail::to($booking->customer_email)->send(new CleanerAssigned($booking));
                Mail::to($cleaner->email)->send(new BookingConfirmation($booking));
            } else {
                // minus the lead from commercial login
            }
            // dd($booking);
            return view('cleaner.booking.view', compact('booking'));
        } else {
            return view('frontend.booking_taken');
        }
    }
}
