<?php

namespace App\Http\Controllers\Cleaner;

use App\Http\Controllers\Controller;
use App\Services\ResourceService;
use Illuminate\Http\Request;
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
        return view('cleaner.resources.index');
    }

    public function getAllResources(Request $request)
    {
        $data = array();
        $data['code'] = 200;
        $data['resources'] = $this->resourceServices->getAllActive();
        return response()->json($data);
    }

    public function view($id)
    {
        $resource = $this->resourceServices->getResourceById($id);
        $file_path = Storage::disk('public_uploads')->url($resource->document_name);
        return view('cleaner.resources.view', compact('resource', 'file_path'));
    }
}
