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

    public function getAllActive()
    {
        return $this->resource_model->where('status', 1)->get();
    }

    public function getAllActiveForCleaner()
    {
        return $this->resource_model->where('status', 1)->where('visible_to_cleaner', 1)->get();
    }

    public function getAllActiveForCompany()
    {
        return $this->resource_model->where('status', 1)->where('visible_to_company', 1)->get();
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
                config('uploadpath.resources'),
                $uploadedFile,
                $filename
            );
            $resource->document_name = $filename;
        }
        $resource->visible_to_cleaner = $request->get('visible_to_cleaner', 0);
        $resource->visible_to_company = $request->get('visible_to_company', 0);
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
        $resource->visible_to_cleaner = $request->get('visible_to_cleaner', 0);
        $resource->visible_to_company = $request->get('visible_to_company', 0);
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
