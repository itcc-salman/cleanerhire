<?php

namespace App\Logic\Booking;

use App\Models\Booking;
use App\Models\User;
use App\Notifications\BookingEmail;
use Carbon\Carbon;

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
        // check booking email

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
