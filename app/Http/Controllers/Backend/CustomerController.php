<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('backend.customers.index');
    }

    public function getAllCustomers(Request $request)
    {
        $data = array();
        $customers = Customer::with('user')->get();

        $data['code'] = 200;
        $data['customers'] = $customers;
        return response()->json($data);
    }
}
