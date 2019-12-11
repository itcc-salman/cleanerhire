<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Services\CleanerService;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CleanerService $cleanerService)
    {
        // $this->middleware('auth');
        $this->cleanerService = $cleanerService;
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

    public function bookACleaningJob()
    {
        return view('frontend.book_a_cleaning_job');
    }

    public function registerCleaner(UserStoreRequest $request)
    {
        if( $request->method() == 'POST') {
            $user = $this->cleanerService->registerCleanerFront($request);
            if( $user ) {
                return redirect()->route('activate');
            }
        }
        return view('frontend.register_cleaner');
    }
}
