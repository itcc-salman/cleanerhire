<?php

namespace App\Services;

use App\Models\CleaningServices;
use Auth;

class CleaningServicesService
{

    protected $cleaningService_model;

    public function __construct()
    {
        $this->cleaningService_model = new CleaningServices;
    }

    public function getCleaningServiceById($id)
    {
        return $this->cleaningService_model->find($id);
    }

    public function registerCleaningServiceBackend($data)
    {
        $cleaningService = $this->cleaningService_model;
        $cleaningService->name          = $data->get('name');
        $cleaningService->residential   = $data->get('residential', 0);
        $cleaningService->commercial    = $data->get('commercial', 0);
        $cleaningService->once_off      = $data->get('once_off', 0);
        $cleaningService->regular       = $data->get('regular', 0);
        $cleaningService->individual    = $data->get('individual', 0);
        $cleaningService->agency        = $data->get('agency', 0);
        $cleaningService->status        = $data->get('status', 1);
        $cleaningService->created_by    = Auth::Id();
        $cleaningService->updated_by    = Auth::Id();
        $cleaningService->save();

        return $cleaningService;
    }

    public function updateCleaningServiceBackend($id, $data)
    {
        $cleaningService = $this->cleaningService_model->find($id);
        $cleaningService->name          = $data->get('name');
        $cleaningService->residential   = $data->get('residential', 0);
        $cleaningService->commercial    = $data->get('commercial', 0);
        $cleaningService->once_off      = $data->get('once_off', 0);
        $cleaningService->regular       = $data->get('regular', 0);
        $cleaningService->individual    = $data->get('individual', 0);
        $cleaningService->agency        = $data->get('agency', 0);
        $cleaningService->status        = $data->get('status', 1);
        $cleaningService->updated_by    = Auth::Id();
        $cleaningService->save();

        return $cleaningService;
    }

    public function deleteCleaningServiceById($id)
    {
        $cleaningService = $this->cleaningService_model->find($id);
        $cleaningService->delete();
        return true;
    }
}
