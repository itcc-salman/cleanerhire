<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CleaningServiceStoreRequest;
use App\Models\Cleaner;
use App\Models\CleaningServices;
use App\Models\User;
use App\Services\CleaningServicesService;
use Illuminate\Http\Request;

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

    public function getRoleBasedServices(Request $request)
    {
        $data = array();
        $services = array();
        $cs = CleaningServices::latest();
        $user_type = $request->get('user_type',NULL);

        if( $request->has('cleaner_id') ) {
            $cleaner = Cleaner::find($request->get('cleaner_id'));
            $user_type = $cleaner->user->role;
        }else if( $request->has('user_id') ) {
            $user = User::find($request->get('user_id'));
            $user_type = $user->role;
        }

        if( $user_type == 'cleaner' ) {
            // cleaner
            $services = [
                'residential' => $cs->where('individual', 1)->where('residential', 1)->get(),
                'commercial' => NULL
            ];
        } else if ( $user_type == 'agency' ) {
            // agency
            $services = [
                'residential' => $cs->where('agency', 1)->where('residential', 1)->get(),
                'commercial' => $cs->where('agency', 1)->where('commercial', 1)->get()
            ];
        } else {
            $services = [
                'residential' => $cs->where('residential', 1)->get(),
                'commercial' => $cs->where('commercial', 1)->get()
            ];
        }

        $data['code'] = 200;
        $data['services'] = $services;
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
