<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\User;
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

    public function edit(Request $request)
    {
        $customer = Customer::find($request->id);
        if(!$customer){
            return back();
        }
       return view('backend.customers.edit')->with('customer',$customer);
    }

    public function postUpdate(Request $request)
    {
        $id = $request->get('id', null);
        if($id){
            $customer = Customer::find($id);
            if($customer){
                $user = User::find($customer->user_id);
                $user->first_name = $request->get('first_name', $user->first_name);
                $user->last_name = $request->get('last_name', $user->last_name);
                $user->save();

                $customer->status = $request->get('status', $customer->status);
                $customer->address_line_1 = $request->get('address_line_1', $customer->address_line_1);
                $customer->address_line_2 = $request->get('address_line_2', $customer->address_line_2);
                $customer->postcode = $request->get('postcode', $customer->postcode);
                $customer->city = $request->get('city', $customer->city);
                $customer->state = $request->get('state', $customer->state);
                $customer->country = $request->get('country', $customer->country);
                $customer->save();
                setflashmsg('Customer Updated Successfully..!','1');
                return redirect()->route('backend.customers');
            }
        }
    }
}
