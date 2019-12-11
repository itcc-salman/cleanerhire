<?php

namespace App\Services;

use App\Models\Resource;
use Illuminate\Support\Facades\Storage;

class ResourceService
{
    protected $resource_model;

    public function __construct()
    {
        $this->resource_model = new Resource;
    }

    public function getAll()
    {
        return $this->resource_model->all();
    }

    public function getResourceById($id)
    {
        return $this->resource_model->findOrFail($id);
    }

    public function registerResourceBackend($request)
    {
        $resource = $this->resource_model;
        $resource->name = $request->get('name');
        if( $request->file('document_name') ) {
            $uploadedFile = $request->file('document_name');
            $filename = time().$uploadedFile->getClientOriginalName();

            Storage::disk('public_uploads')->putFileAs(
                config('resources'),
                $uploadedFile,
                $filename
            );
            $resource->document_name = $filename;
        }
        $resource->status = $request->get('status');
        $resource->created_by = \Auth::id();
        $resource->modified_by = \Auth::id();
        $resource->save();
        return true;
    }

    public function updateResourceBackend($id, $request)
    {
        $resource = $this->resource_model->find($id);
        $resource->name = $request->get('name');
        if( $request->file('document_name') ) {
            $uploadedFile = $request->file('document_name');
            $filename = time().$uploadedFile->getClientOriginalName();

            Storage::disk('public_uploads')->putFileAs(
                config('resources'),
                $uploadedFile,
                $filename
            );
            $resource->document_name = $filename;
        }
        $resource->status = $request->get('status');
        $resource->modified_by = \Auth::id();
        $resource->save();
        return true;
    }

    public function deleteResourceById($id)
    {
        $resource = $this->resource_model->find($id);
        $resource->delete();
        return true;
    }
}