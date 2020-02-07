<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewBookingAvailable extends Mailable
{
    use Queueable, SerializesModels;
    public $booking;
    public $cleaner;
    public $booking_email;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($booking,$cleaner,$booking_email)
    {
        $this->booking = $booking;
        $this->cleaner = $cleaner;
        $this->booking_email = $booking_email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.new_booking_available');
    }
}
