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
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($booking,$cleaner)
    {
        $this->booking = $booking;
        $this->cleaner = $cleaner;
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
