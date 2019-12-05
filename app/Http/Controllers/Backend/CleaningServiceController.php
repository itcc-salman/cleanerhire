<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests\CleaningServiceStoreRequest;
use App\Http\Controllers\Controller;
use App\Services\CleaningServicesService;
use App\Models\CleaningServices;

class CleaningServiceController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CleaningServicesService $cleaningServices)
    {
        $this->middleware('auth');
        $this->cleaningServices = $cleaningServices;
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
        $data['services'] = $cleaningServices;
        return response()->json($data);
    }

    public function create(CleaningServiceStoreRequest $request)
    {
        if( $request->method() == 'POST') {
            $cleaningService = $this->cleaningServices->registerCleaningServiceBackend($request);
            if( $cleaningService ) {
                setflashmsg(trans('msg.clsSerCreated'),'1');
                return redirect()->route('backend.services');
            }
        }
        return view('backend.service.create');
    }

    public function update($id, CleaningServiceStoreRequest $request)
    {
        if( $request->method() == 'POST') {
            $cleaningService = $this->cleaningServices->updateCleaningServiceBackend($id, $request);
            if( $cleaningService ) {
                setflashmsg(trans('msg.clsSerUpdated'),'1');
                return redirect()->route('backend.services');
            }
        }
        $cleaningService = $this->cleaningServices->getCleaningServiceById($id);
        return view('backend.service.update', compact('cleaningService'));
    }

    public function delete(Request $request)
    {
        $delete_id = $request->get('delete_id', 0);
        $data['code'] = 200;
        $data['status'] = true;
        if( !$delete_id ) {
            $data['status'] = false;
            $data['message'] = trans('msg.clsSerError');
            return response()->json($data);
        }
        $this->cleaningServices->deleteCleaningServiceById($delete_id);
        $data['message'] = trans('msg.clsSerDeleted');
        return response()->json($data);

    }
}
