<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BookingStoreRequest;
use App\Services\CleaningServicesService;
use App\Services\PropertyService;
use App\Services\BookingService;
use App\Models\User;
use App\Models\BookingCleanerEmails;

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
                $view = view('frontend.partial.booking_services', compact('services'))->render();
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
            // get commercial services
            $services = $cleaningServices->getCleaningServicesByType('commercial', $cleaners);
            $view = view('frontend.partial.booking_services', compact('services'))->render();
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
            return response()->json(['status' => true, 'redirect' => route('front.booking_completed') ]);
        }
        setflashmsg(trans('msg.bookingFailed'),'0');
        return response()->json(['status' => false,
            'msg' => trans('msg.clsSerError'),
            'redirect' => route('front.booking_failed') ]);
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
        dd($booking_emails);
        dd($token);
    }
}
