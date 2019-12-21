<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyStoreRequest;
use App\Models\Property;
use App\Services\PropertyService;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PropertyService $propertyServices)
    {
        $this->middleware('auth');
        $this->propertyServices = $propertyServices;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('backend.property.index');
    }

    public function getAllProperty(Request $request)
    {
        $data = array();
        $propertyServices = Property::all();
        $data['code'] = 200;
        $data['properties'] = $propertyServices;
        return response()->json($data);
    }
    public function getAllActiveProperty(Request $request)
    {
        $data = array();
        $propertyServices = Property::active()->get();
        $data['code'] = 200;
        $data['properties'] = $propertyServices;
        return response()->json($data);
    }

    public function create(PropertyStoreRequest $request)
    {
        if( $request->method() == 'POST') {
            $cleaningService = $this->propertyServices->registerProperty($request);
            if( $cleaningService ) {
                setflashmsg(trans('msg.propertyCreated'),'1');
                return redirect()->route('backend.properties');
            }
        }
        return view('backend.property.create');
    }

    public function update($id, PropertyStoreRequest $request)
    {
        if( $request->method() == 'POST') {
            $property = $this->propertyServices->updateProperty($id, $request);
            if( $property ) {
                setflashmsg(trans('msg.propertyUpdated'),'1');
                return redirect()->route('backend.properties');
            }
        }
        $property = $this->propertyServices->getPropertyById($id);
        return view('backend.property.update', compact('property'));
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
        $this->propertyServices->deletePropertyById($delete_id);
        $data['message'] = trans('msg.propertyDeleted');
        return response()->json($data);
    }
}
