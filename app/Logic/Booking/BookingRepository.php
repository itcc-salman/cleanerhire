<?php

namespace App\Logic\Booking;

use App\Models\Booking;
use App\Models\User;
use App\Models\Cleaner;
use App\Notifications\BookingEmail;
use Carbon\Carbon;
use App\Services\CleaningServicesService;
use App\Services\CommonService;
use App\Models\CleanerServiceMapping;
use App\Models\ServiceArea;

class BookingRepository
{
    /**
     * Creates a token and send email.
     *
     * @param \App\Models\Booking $booking
     *
     * @return bool or void
     */
    public function sendBookingEmail(Booking $booking)
    {
        if( $booking->booking_type == 'commercial' ) {
            // check for services provided by cleaner
            $cleaningServices = new CleaningServicesService;
            $cleaners = $cleaningServices->getCleanersForProperties($booking->property_id);
            $booked_services = explode(',', $booking->services);
            $cleaners_ids = CleanerServiceMapping::whereIn('cleaner_id', $cleaners)
                                    ->where('service_for', 'commercial')->whereIn('cleaning_service_id', $booked_services)->distinct()->pluck('cleaner_id');
            // dd($cleaners_ids);
            foreach ($cleaners_ids as $key => $value) {
                // now check for service areas
                $service_areas = ServiceArea::where('cleaner_id', $value)->get();
                foreach ($service_areas as $area) {
                    $commonService = new CommonService;
                    $distance = $commonService->getDistanceBetweenTwoPoints(
                        $area->latitude,
                        $area->longitude,
                        $booking->latitude,
                        $booking->longitude);
                    if( $distance <= $area->area_in_km ) {
                        // send email to this cleaner and continue
                        $c = Cleaner::find($value);
                        if( $c ) {
                            $user = User::find($c->user_id);
                            self::sendNewBookingEmail($user, $booking);
                        }
                        continue;
                    }
                }
            }
            // XX_Pending_XX also check cleaner availability sun mon / timings / existing booking
        }
        // check booking email
        // check booking type
        // if commercial then check for properties with services

        // Send booking email notification
        // self::sendNewBookingEmail($user, $booking);
    }

    /**
     * Sends a new booking email.
     *
     * @param \App\Models\User $user  The user
     * @param \App\Models\Booking $booking  The booking
     */
    public function sendNewBookingEmail(User $user,Booking $booking)
    {
        $user->notify(new BookingEmail($booking));
    }
}
