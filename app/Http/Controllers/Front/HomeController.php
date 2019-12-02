<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
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

    public function becomeACleaner()
    {
        return view('frontend.become_a_cleaner');
    }

    public function registerCleaner(UserStoreRequest $request)
    {
        if( $request->method() == 'POST') {
            // call validation method
        }
        return view('frontend.register_cleaner');
    }
}
