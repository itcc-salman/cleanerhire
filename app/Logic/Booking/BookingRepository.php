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
use App\Models\BookingCleanerEmails;
use Mail;
use App\Mail\NewBookingAvailable;

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
        $cleaners_ids = $this->getAvailableCleanerForBooking($booking);
        // check booking email
        // check booking type
        // if commercial then check for properties with services

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
                        $booking_email = new BookingCleanerEmails;
                        $booking_email->assigned_user_id = $c->user_id;
                        $booking_email->assigned_cleaner_id = $c->id;
                        $booking_email->booking_id = $booking->id;
                        $booking_email->token = $booking->id."_".$c->user_id."_".str_random(64);
                        $booking_email->save();
                        // self::sendNewBookingEmail($user, $booking, $booking_email);
                        Mail::to($c->email)->send(new NewBookingAvailable($booking,$c, $booking_email));
                    }
                    continue;
                }
            }
        }
        // XX_Pending_XX also check cleaner availability sun mon / timings / existing booking
        // Send booking email notification
        // self::sendNewBookingEmail($user, $booking);
    }

    public function getBookingServices(Booking $booking)
    {
        $cleaningServices = new CleaningServicesService;
        return $cleaningServices->getServicesForBooking( explode(',', $booking->services) );
    }

    public function getAvailableCleanerForBooking(Booking $booking)
    {
        if( $booking->booking_type == 'commercial' ) {
            // check for services provided by cleaner
            $cleaningServices = new CleaningServicesService;
            $cleaners = $cleaningServices->getCleanersForProperties($booking->property_id);
            $booked_services = $booking->services;
            $cleaners_ids = CleanerServiceMapping::whereIn('cleaner_id', $cleaners)
                                    ->where('cleaning_service_id', $booked_services)->pluck('cleaner_id');
            // dd($cleaners_ids);
        } else {
            $booked_services = $booking->services;
            $cleaners_ids = CleanerServiceMapping::where('cleaning_service_id', $booked_services)->pluck('cleaner_id');
        }
        return $cleaners_ids;
    }

    /**
     * Sends a new booking email.
     *
     * @param \App\Models\User $user  The user
     * @param \App\Models\Booking $booking  The booking
     */
    public function sendNewBookingEmail(User $user,Booking $booking,BookingCleanerEmails $booking_email)
    {
        $user->notify(new BookingEmail($booking, $booking_email));
    }
}
