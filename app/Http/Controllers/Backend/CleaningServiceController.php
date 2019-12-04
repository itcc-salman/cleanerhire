<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CleaningServices;

class CleaningServiceController extends Controller
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
        return view('backend.service.index');
    }

    public function getAllServices(Request $request)
    {
        $data = array();
        if( $request->has('user_type') ) {
            $user_type = $request->get('user_type');
            if( $user_type == 'agency' ) {
                $cleaningServices = CleaningServices::where('agency', 1)->get();
            } else {
                $cleaningServices = CleaningServices::where('individual', 1)->get();
            }
        } else {
            $cleaningServices = CleaningServices::all();
        }

        $data['code'] = 200;
        $data['data'] = $cleaningServices;
        return response()->json($data);
    }

    public function create()
    {
        return view('backend.service.create');
    }
}
