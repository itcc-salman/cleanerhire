<?php

namespace App\Services;

use Auth;
use App\Models\Booking;
use App\Models\User;

class BookingService
{
    protected $booking_model;

    public function __construct()
    {
        $this->booking_model = new Booking;
    }

    public function getBookingById($id)
    {
        return $this->booking_model->find($id);
    }

    public function getAllBooking()
    {
        return $this->booking_model->where('status', 1)->get();
    }

    public function registerBooking($data)
    {
        if( Auth::user()->isCustomer() ) {
            $user = User::with('customer')->find(Auth::Id());
            $customer_id = $user->customer->id;
        }
        $booking = $this->booking_model;
        $booking->user_id           = Auth::Id();
        $booking->customer_id       = $customer_id;
        $booking->booking_type      = $data->get('service_type');
        $booking->property_id       = $data->get('properties', NULL);
        $booking->services          = implode(',', $data->get('services'));
        $booking->visit_type        = $data->get('visit_type');
        $booking->duration          = $data->get('duration');
        $booking->booking_date      = $data->get('booking_date');
        $booking->booking_time      = $data->get('booking_time');
        $booking->gender_pref       = $data->get('gender_pref');
        $booking->has_pet           = $data->get('has_pet');
        $booking->has_pet_optional  = $data->get('has_pet_optional', NULL);
        $booking->status            = $data->get('status', 1);
        $booking->created_by        = Auth::Id();
        $booking->updated_by        = Auth::Id();
        $booking->save();

        return $booking;
    }

    public function updateBooking($id, $data)
    {
        $booking = $this->booking_model->find($id);
        $booking->name          = $data->get('name');
        $booking->status        = $data->get('status', 1);
        $booking->updated_by    = Auth::Id();
        $booking->save();

        return $booking;
    }

    public function deleteBookingById($id)
    {
        $booking = $this->booking_model->find($id);
        $booking->delete();
        return true;
    }
}