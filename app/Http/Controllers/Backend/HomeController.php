<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Cleaner;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class HomeController extends Controller
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
        $tmpdate  = Carbon::parse('1 july this year');
        if($tmpdate->isPast()){
            $current_F_Y_start = Carbon::parse('1 july this year');
            $current_F_Y_end = Carbon::parse('30 june next year');
            $previous_F_Y_start = Carbon::parse('1 july this year')->subYear(1);
            $previous_F_Y_end = Carbon::parse('30 june next year')->subYear(1);
        }else{
            $current_F_Y_start = Carbon::parse('1 july previous year');
            $current_F_Y_end = Carbon::parse('30 june this year');
            $previous_F_Y_start = Carbon::parse('1 july previous year')->subYear(1);
            $previous_F_Y_end = Carbon::parse('30 june this year')->subYear(1);
        }

        $data = array();
        $data['revenue'] = 1;
        $data['prev_revenue'] = 0;
        $data['jobs_done'] = Booking::whereMonth('booking_date', Carbon::now()->month)->count();
        $data['prev_jobs_done'] = Booking::whereMonth('booking_date', Carbon::now()->subMonth(1)->month)->count();
        $data['total_jobs'] = Booking::whereBetween('booking_date', [$current_F_Y_start, $current_F_Y_end])->count();
        $data['prev_total_jobs'] = Booking::whereBetween('booking_date', [$previous_F_Y_start, $previous_F_Y_end])->count();
        $data['cleaner_registered'] = Cleaner::whereMonth('created_at', Carbon::now()->month)->count();
        $data['prev_cleaner_registered'] = Cleaner::whereMonth('created_at', Carbon::now()->subMonth(1)->month)->count();
        $data['svg_up'] = '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--success"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><polygon points="0 0 24 0 24 24 0 24"/><rect fill="#000000" opacity="0.3" transform="translate(11.646447, 12.853553) rotate(-315.000000) translate(-11.646447, -12.853553) " x="10.6464466" y="5.85355339" width="2" height="14" rx="1"/><path d="M8.1109127,8.90380592 C7.55862795,8.90380592 7.1109127,8.45609067 7.1109127,7.90380592 C7.1109127,7.35152117 7.55862795,6.90380592 8.1109127,6.90380592 L16.5961941,6.90380592 C17.1315855,6.90380592 17.5719943,7.32548256 17.5952502,7.8603687 L17.9488036,15.9920967 C17.9727933,16.5438602 17.5449482,17.0106003 16.9931847,17.0345901 C16.4414212,17.0585798 15.974681,16.6307346 15.9506913,16.0789711 L15.6387276,8.90380592 L8.1109127,8.90380592 Z" fill="#000000" fill-rule="nonzero"/></g></svg>';
        $data['svg_down'] = '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--danger"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><polygon points="0 0 24 0 24 24 0 24"/><rect fill="#000000" opacity="0.3" transform="translate(12.353553, 12.146447) rotate(-135.000000) translate(-12.353553, -12.146447) " x="11.3535534" y="5.14644661" width="2" height="14" rx="1"/><path d="M15.8890873,16.0961941 C16.441372,16.0961941 16.8890873,16.5439093 16.8890873,17.0961941 C16.8890873,17.6484788 16.441372,18.0961941 15.8890873,18.0961941 L7.40380592,18.0961941 C6.86841446,18.0961941 6.42800568,17.6745174 6.40474976,17.1396313 L6.05119637,9.00790332 C6.02720666,8.45613984 6.45505183,7.98939965 7.00681531,7.96540994 C7.55857879,7.94142022 8.02531897,8.36926539 8.04930869,8.92102887 L8.36127239,16.0961941 L15.8890873,16.0961941 Z" fill="#000000" fill-rule="nonzero"/></g></svg>';

        $stats = Booking::whereBetween('booking_date',[$current_F_Y_start, $current_F_Y_end])
            ->groupBy('date')
            ->get([
                \DB::raw('DATE_FORMAT(booking_date, \'%Y-%m\') as date'),
                \DB::raw('COUNT(*) as value')
            ])->toArray();


        $jobData = array();
        for($i = 1; $i <= 12 ; $i++){
            if($i == 1){
                $year = $current_F_Y_start->format('Y-m');
            }else{
                $year = $current_F_Y_start->addMonth(1)->format('Y-m');
            }

            $jobData[] = Arr::first($stats, function ($value, $key) use($year) {
                return $value['date'] == $year;
            },['date' => $year, 'value' => 0]);

        }

        $data['jobData'] = json_encode($jobData);
        $data['upcoming_bookings'] = Booking::where('booking_date', '>' , Carbon::now())->limit(10)->get();
        return view('backend.home')->with('data', $data);
    }
}
