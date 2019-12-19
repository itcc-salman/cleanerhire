<?php

namespace App\Services;

use Auth;
use App\Models\Property;

class PropertyService
{
    protected $property_model;

    public function __construct()
    {
        $this->property_model = new Property;
    }

    public function getPropertyById($id)
    {
        return $this->property_model->find($id);
    }

    public function getAllProperty()
    {
        return $this->property_model->where('status', 1)->get();
    }

    public function registerProperty($data)
    {
        $property = $this->property_model;
        $property->name          = $data->get('name');
        $property->status        = $data->get('status', 1);
        $property->created_by    = Auth::Id();
        $property->updated_by    = Auth::Id();
        $property->save();

        return $property;
    }

    public function updateProperty($id, $data)
    {
        $property = $this->property_model->find($id);
        $property->name          = $data->get('name');
        $property->status        = $data->get('status', 1);
        $property->updated_by    = Auth::Id();
        $property->save();

        return $property;
    }

    public function deletePropertyById($id)
    {
        $property = $this->property_model->find($id);
        $property->delete();
        return true;
    }
}
