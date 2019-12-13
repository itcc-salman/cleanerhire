<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use App\Models\Cleaner;
use App\Services\CleanerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class CheckIsProfileCompleted
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        $currentRoute = Route::currentRouteName();
        $routesAllowed = [
            'cleaner.profile',
            'cleaner.ajax.profile.partial',
            'cleaner.ajax.profile.personal_info',
            'cleaner.ajax.profile.account_info',
            'cleaner.ajax.profile.update_services',
            'cleaner.ajax.profile.update_availability',
            'logout',
        ];

        if (!in_array($currentRoute, $routesAllowed)) {
            if ($user && ( $user->role == 'cleaner' || $user->role == 'agency' ) ) {
                $cleaner = Cleaner::where('user_id', $user->id)->first();
                if( $cleaner ) {
                    // check for profile
                    $cleaningService = new CleanerService;
                    $tasks = $cleaningService->checkCleanerProfileStatus($cleaner->id);
                    if( in_array(false, $tasks) ) {
                        setflashmsg(trans('msg.completeProfile'),'0');
                        return redirect()->route('cleaner.profile');
                    }
                }
            }
        }

        return $next($request);
    }
}
