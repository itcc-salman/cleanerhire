<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CleaningServicesService;
use App\Services\PropertyService;
use App\Models\User;

class BookingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
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
            // get commercial services
            $services = $cleaningServices->getCleaningServicesByType('commercial');
            $view = view('frontend.partial.booking_services', compact('services'))->render();
            $data['where'] = 'services_list';
        }
        $data['html'] = $view;
        return response()->json($data);
    }
}
