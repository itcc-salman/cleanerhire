<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CleaningServicesService;
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
        if( $request->has('service_type') ){
            // check for service type
            $cleaningServices = new CleaningServicesService;
            if( $request->get('service_type') == 'residential' ) {
                // get resendial services
                $services = $cleaningServices->getCleaningServicesByType('residential');
            } else if( $request->get('service_type') == 'commercial' ) {
                // get commercial services
                $services = $cleaningServices->getCleaningServicesByType('commercial');
            }
        }
        $view = view('frontend.partial.booking_services', compact('services'))->render();
        $data = [ 'code' => 200, 'status' => true, 'html' => $view ];
        return response()->json($data);
    }
}
