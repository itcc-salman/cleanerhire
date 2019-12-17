<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerStoreRequest;
use App\Services\CustomerService;
use App\Models\User;

class CustomerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CustomerService $customerService)
    {
        // $this->middleware('auth');
        $this->customerService = $customerService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('frontend.index');
    }

    public function registerCustomer(CustomerStoreRequest $request)
    {
        $user = $this->customerService->registerCustomerFront($request);
        if( $user ) {
            return response()->json(['status' => true, 'redirect' => route('activate') ]);
        } else {
            return response()->json(['status' => false, 'msg' => trans('msg.clsSerError') ]);
        }
    }
}

