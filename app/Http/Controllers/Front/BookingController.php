<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BookingStoreRequest;
use App\Services\CleaningServicesService;
use App\Services\CleanerService;
use App\Services\CustomerService;
use App\Services\PropertyService;
use App\Services\BookingService;
use App\Models\User;
use App\Models\BookingCleanerEmails;
use App\Logic\Booking\BookingRepository;

class BookingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(BookingService $bookingServices)
    {
        // $this->middleware('auth');
        $this->bookingServices = $bookingServices;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('frontend.index');
    }

    public function getServices(Request $request)
    {
        $services = NULL;
        $data = [ 'code' => 200, 'status' => true ];
        if( $request->has('service_type') ){
            // check for service type
            $cleaningServices = new CleaningServicesService;
            if( $request->get('service_type') == 'residential' ) {
                // get resendial services
                $services = $cleaningServices->getCleaningServicesByType('residential');
                $customerService = new CustomerService;
                $customer = $customerService->getLoggedInCustomer();
                $view = view('frontend.partial.booking_services', compact('services', 'customer'))->render();
                $data['where'] = 'services_list';
            } else if( $request->get('service_type') == 'commercial' ) {
                // first ask for propert type
                $propertyServices = new PropertyService;
                $properties = $propertyServices->getAllProperty();
                $data['where'] = 'property_list';
                $view = view('frontend.partial.booking_properties', compact('properties'))->render();
            }
        }
        if( $request->has('property_type') ){
            $cleaningServices = new CleaningServicesService;
            // check for properties in cleaner
            $prop = $request->get('property_type');
            $cleaners = $cleaningServices->getCleanersForProperties($prop);
            $customerService = new CustomerService;
            $customer = $customerService->getLoggedInCustomer();
            // get commercial services
            $services = $cleaningServices->getCleaningServicesByType('commercial', $cleaners);
            $view = view('frontend.partial.booking_services', compact('services', 'customer'))->render();
            $data['where'] = 'services_list';
        }
        $data['html'] = $view;
        return response()->json($data);
    }

    public function addBooking(BookingStoreRequest $request)
    {
        $bookingServices = $this->bookingServices->registerBooking($request);
        if( $bookingServices ) {
            setflashmsg(trans('msg.bookingCreated'),'1');
            // return response()->json(['status' => true, 'redirect' => route('front.booking_completed') ]);
            return response()->json(['status' => true, 'redirect' => route('front.assign_cleaners',$bookingServices->id) ]);
        }
        setflashmsg(trans('msg.bookingFailed'),'0');
        return response()->json(['status' => false,
            'msg' => trans('msg.clsSerError'),
            'redirect' => route('front.booking_failed') ]);
    }

    public function assignCleaners($booking_id)
    {
        $this->middleware('auth');
        $booking = $this->bookingServices->getBookingById($booking_id);
        // check if booking is for login customer only
        if( $booking->user_id != \Auth::Id() ) {
            return redirect()->route('front.not_authorized_booking');
        }
        // check if this booking is pending then only proceed
        if( $booking->status > 1 ) {
            // check the booking status and redirect as per that
            return redirect()->route('front.not_authorized_booking');
        }
        // get cleaners list
        // dd($booking);
        $bookingRepostory = new BookingRepository();
        $cleaner_ids = $bookingRepostory->getAvailableCleanerForBooking($booking);
        $cleanerService = new CleanerService;
        $cleaners = $cleanerService->getCleanersByIds($cleaner_ids);
        $booking_services = $bookingRepostory->getBookingServices($booking);
        // dd($cleaners);
        return view('frontend.assign_booking', compact('cleaners', 'booking', 'booking_services'));
    }

    public function sendNotificationToAllCleaner($booking_id)
    {
        $booking = $this->bookingServices->getBookingById($booking_id);
        // send notification to cleaner or company
        $bookingRepostory = new BookingRepository();
        $bookingRepostory->sendBookingEmail($booking);
        return redirect()->route('front.booking_completed');
    }

    public function notAuthorizedBooking()
    {
        return view('frontend.not_authorized_booking');
    }

    public function bookingCompleted()
    {
        return view('frontend.booking_completed');
    }

    public function bookingConfirmed()
    {
        dd('confirmed');
    }

    public function bookingFailed()
    {
        return view('frontend.booking_failed');
    }

    public function reviewAndConfirm($token)
    {
        $booking_emails = BookingCleanerEmails::where('token', $token)->first();
        if( $booking_emails ) {
            $booking = $this->bookingServices->getBookingByIdWithUser($booking_emails->booking_id);
            // dd($booking);
            return view('frontend.review_and_confirm', compact('booking'));
        } else {
            return view('frontend.booking_taken');
        }
    }
}
