<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\User;
use App\Models\Booking;
use App\Models\BookingCleanerEmails;

class BookingEmail extends Notification
{
    use Queueable;

    protected $booking;
    protected $booking_email;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Booking $booking, BookingCleanerEmails $booking_email)
    {
        $this->booking = $booking;
        $this->booking_email = $booking_email;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('New Booking for you')
                    ->line('Please click on review and confirm button to review and confirm the booking')
                    ->action('Review and confirm', route('front.confirm_booking_cleaner', $this->booking_email->token))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
