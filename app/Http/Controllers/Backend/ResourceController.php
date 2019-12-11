<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Services\ResourceService;
use Illuminate\Http\Request;
use App\Http\Requests\ResourceStoreRequest;
use App\Http\Requests\ResourceUpdateStoreRequest;
use Illuminate\Support\Facades\Storage;

class ResourceController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ResourceService $resourceServices)
    {
        $this->middleware('auth');
        $this->resourceServices = $resourceServices;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('backend.resource.index');
    }

    public function getAllResources(Request $request)
    {
        $data = array();
        $data['code'] = 200;
        $data['resources'] = $this->resourceServices->getAll();
        return response()->json($data);
    }

    public function view($id)
    {
        $resource = $this->resourceServices->getResourceById($id);
        $file_path = Storage::disk('public_uploads')->url($resource->document_name);
        return view('backend.resource.view', compact('resource', 'file_path'));
    }

    public function create(ResourceStoreRequest $request)
    {
        if( $request->method() == 'POST') {
            $resource = $this->resourceServices->registerResourceBackend($request);
            if( $resource ) {
                setflashmsg(trans('msg.resourceCreated'),'1');
                return redirect()->route('backend.resources');
            }
        }
        return view('backend.resource.create');
    }

    public function update($id, ResourceUpdateStoreRequest $request)
    {
        if( $request->method() == 'POST') {
            $resource = $this->resourceServices->updateResourceBackend($id, $request);
            if( $resource ) {
                setflashmsg(trans('msg.resourceUpdated'),'1');
                return redirect()->route('backend.resources');
            }
        }
        $resource = $this->resourceServices->getResourceById($id);
        return view('backend.resource.update', compact('resource'));
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
        $this->resourceServices->deleteResourceById($delete_id);
        $data['message'] = trans('msg.resourceDeleted');
        return response()->json($data);

    }
}
