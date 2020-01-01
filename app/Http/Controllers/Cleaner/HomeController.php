<?php

namespace App\Http\Controllers\Cleaner;

use App\Http\Controllers\Controller;
use App\Http\Requests\CleanerPersonalInfoStoreRequest;
use App\Services\CleanerService;
use App\Services\CommonService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CleanerService $cleanerService)
    {
        $this->middleware('auth');
        $this->cleanerService = $cleanerService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cleaner = $this->cleanerService->getLogedInCleaner();
        return view('cleaner.home', compact('cleaner'));
    }

    public function profile(Request $request)
    {
        if( $request->ajax() ) {
            $partial_view_name = $request->get('partial_view_name');
            $data = $this->cleanerService->getPartialViewData($partial_view_name);
            $view = view('cleaner.partial.'.$partial_view_name, compact('data'))->render();
            $extra_data = [];
            if( $partial_view_name == 'account_info' ) { $extra_data = json_decode($data->getOriginal('language')); }
            $data = [ 'code' => 200, 'status' => true, 'html' => $view, 'extra_data' => $extra_data ];
            return response()->json($data);
        }
        $cleaner = $this->cleanerService->getLogedInCleaner();
        $tasks = $this->cleanerService->checkCleanerProfileStatus($cleaner->id);
        return view('cleaner.profile', compact('cleaner','tasks'));
    }

    public function personal_info(CleanerPersonalInfoStoreRequest $request)
    {
        $cleaner = $this->cleanerService->updateCleanerPersonalInfo($request);
        $data['code'] = 200;
        if( $cleaner ) {
            $data = [ 'status' => true, 'msg' => trans('msg.clsPerInfoUpdated') ];
        } else {
            $data = [ 'status' => false, 'msg' => trans('msg.clsNotFound') ];
        }
        return response()->json($data);
    }

    public function account_info(Request $request)
    {
        $cleaner = $this->cleanerService->updateCleanerAccountInfo($request);
        $data['code'] = 200;
        if( $cleaner ) {
            $data = [ 'status' => true, 'msg' => trans('msg.clsAccInfoUpdated') ];
        } else {
            $data = [ 'status' => false, 'msg' => trans('msg.clsNotFound') ];
        }
        return response()->json($data);
    }

    public function visa_documents(Request $request)
    {
        $commonService = new CommonService;
        $data = $commonService->saveUploadedFile($request);
        if( $data['code'] == 200) {
            $data['doc_type'] =  $request->doc_type;
            $data = $this->cleanerService->updateCleanerDocuments($data);
        }

        return response()->json($data);
    }

    public function update_services(Request $request)
    {
        $cleaner = $this->cleanerService->updateCleanerServices($request);
        $data['code'] = 200;
        if( $cleaner ) {
            $data = [ 'status' => true, 'msg' => trans('msg.clsAccServicesUpdated') ];
        } else {
            $data = [ 'status' => false, 'msg' => trans('msg.clsNotFound') ];
        }
        return response()->json($data);
    }

    public function update_availability(Request $request)
    {
        $cleaner = $this->cleanerService->updateCleanerAvailability($request);
        $data['code'] = 200;
        if( $cleaner ) {
            $data = [ 'status' => true, 'msg' => trans('msg.clsAccAvailUpdated') ];
        } else {
            $data = [ 'status' => false, 'msg' => trans('msg.clsNotFound') ];
        }
        return response()->json($data);
    }

    public function update_service_area(Request $request)
    {
        $cleaner = $this->cleanerService->updateCleanerServiceAreas($request);
        $data['code'] = 200;
        if( $cleaner ) {
            $data = [ 'status' => true, 'msg' => trans('msg.clsAccSerAreaUpdated') ];
        } else {
            $data = [ 'status' => false, 'msg' => trans('msg.clsNotFound') ];
        }
        return response()->json($data);
    }

    public function calendar()
    {
        return view('cleaner.calendar');
    }
}
