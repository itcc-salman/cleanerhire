<?php

namespace App\Services;

use App\Models\CleaningServices;
use App\Models\CleanerServiceMapping;
use Auth;
use App\Models\Cleaner;

class CleaningServicesService
{

    protected $cleaningService_model;
    protected $cleaner_model;

    public function __construct()
    {
        $this->cleaningService_model = new CleaningServices;
        $this->cleaner_model = new Cleaner;
    }

    public function getCleaningServiceById($id)
    {
        return $this->cleaningService_model->find($id);
    }

    public function getCleaningServicesByType($type, $properties = NULL)
    {
        if( $type == 'residential' ) {
            return $this->cleaningService_model->where('residential', 1)->where('status', 1)->get();
        } else {
            if( $properties ) {
                $cleanerService = new CleanerServiceMapping;
                $cleaning_services = $cleanerService->whereIn('cleaner_id', $properties)->distinct()->pluck('cleaning_service_id');
                return $this->cleaningService_model->whereIn('id', $cleaning_services)->where('commercial', 1)->where('status', 1)->get();
            }
            return $this->cleaningService_model->where('commercial', 1)->where('status', 1)->get();
        }
    }

    public function getCleanersForProperties($id)
    {
        // get cleaner ids who has this property id in them
        return $this->cleaner_model->whereRaw('FIND_IN_SET('.$id.', cleaner_properties)')->pluck('id');
    }

    public function getServicesForBooking($services_ids)
    {
        return $this->cleaningService_model->whereIn('id', $services_ids)->get();
    }

    public function getLogedInRoleWiseCleaningServices()
    {
        $user_type = Auth::user()->role;
        if( $user_type == 'cleaner' ) {
            $services = [
                'residential' => $this->cleaningService_model->where('individual', 1)->where('residential', 1)->get(),
                'commercial' => NULL
            ];
        } else {
            $services = [
                'residential' => $this->cleaningService_model->where('company', 1)->where('residential', 1)->get(),
                'commercial' => $this->cleaningService_model->where('company', 1)->where('commercial', 1)->get()
            ];
        }
        return $services;
    }

    public function getLogedInCleanerServices()
    {
        $cleanerService = new CleanerServiceMapping;
        $cleaner = $this->cleaner_model->where('user_id', Auth::id())->first();
        return $cleanerService->where('cleaner_id', $cleaner->id)->get();
    }

    public function getLogedInCleanerServicesIds()
    {
        $cleanerService = new CleanerServiceMapping;
        $cleaner = Cleaner::where('user_id', Auth::Id())->first();
        // return $cleaner;
        return $cleanerService->where('cleaner_id', $cleaner->id )->get(['cleaning_service_id','service_for','rate_per_hour','has_equipments']);
    }

    public function registerCleaningServiceBackend($data)
    {
        $cleaningService = $this->cleaningService_model;
        $cleaningService->name          = $data->get('name');
        $cleaningService->rate_per_hour = $data->get('rate_per_hour', 0);
        $cleaningService->rate_per_hour_com = $data->get('rate_per_hour_com', 0);
        $cleaningService->residential   = $data->get('residential', 0);
        $cleaningService->commercial    = $data->get('commercial', 0);
        $cleaningService->once_off      = $data->get('once_off', 0);
        $cleaningService->regular       = $data->get('regular', 0);
        $cleaningService->individual    = $data->get('individual', 0);
        $cleaningService->company        = $data->get('company', 0);
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
        $cleaningService->rate_per_hour = $data->get('rate_per_hour', 0);
        $cleaningService->rate_per_hour_com = $data->get('rate_per_hour_com', 0);
        $cleaningService->residential   = $data->get('residential', 0);
        $cleaningService->commercial    = $data->get('commercial', 0);
        $cleaningService->once_off      = $data->get('once_off', 0);
        $cleaningService->regular       = $data->get('regular', 0);
        $cleaningService->individual    = $data->get('individual', 0);
        $cleaningService->company        = $data->get('company', 0);
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
