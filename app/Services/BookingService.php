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

    public function getBookingByIdWithUser($id)
    {
        return $this->booking_model->with('user')->with('service')->find($id);
    }

    public function getAllBooking()
    {
        return $this->booking_model->where('status', 1)->get();
    }

    public function getAllBookingOfCleaner($cleanerId = NULL)
    {
        if( is_null($cleanerId) ) {
            return $this->booking_model->with('service')->where('assigned_user_id', Auth::Id())->get();
        }
        return $this->booking_model->with('service')->where('assigned_user_id', $cleanerId)->get();
    }

    public function registerBooking($request)
    {
        // dd($request);
        if( Auth::user()->isCustomer() ) {
            $user = User::with('customer')->find(Auth::Id());
            if($request->has('payment_method')){
                $paymentMethod = $request->get('payment_method');
                $user->addPaymentMethod($paymentMethod);
                $user->save();
            }
            $customer_id = $user->customer->id;
        }
        $booking = $this->booking_model;
        $booking->user_id           = Auth::Id();
        $booking->customer_id       = $customer_id;
        $booking->booking_type      = $request->get('service_type');
        $booking->property_id       = $request->get('properties', NULL);
        if( $request->get('service') == 'other' ) {
            $booking->services          = implode(',', $request->get('sub_services'));
        } else {
            $booking->services          = $request->get('service');
        }
        // $booking->visit_type        = $request->get('visit_type');
        $booking->duration          = $request->get('cleaning_hours');

        $booking->services_date_type = $request->get('services_date_type');
        $booking->rooms = $request->get('cleaning_rooms');
        $booking->bathrooms = $request->get('cleaning_bathrooms');

        if( $request->get('services_date_type') == 'preferred' ) {
            $booking->booking_date = convertDateToServer($request->get('booking_date'));
            $booking->booking_time = $request->get('booking_time');
        }
        $booking->preferred_date_and_time = $request->get('preferred_date_and_time');

        $booking->address_line_1    = $request->get('address_line_1');
        $booking->address_line_2    = $request->get('address_line_2');
        $booking->city              = $request->get('city');
        $booking->state             = $request->get('state');
        $booking->postcode          = $request->get('postal_code');
        // $booking->country           = $request->get('country');
        $booking->latitude          = $request->get('latitude');
        $booking->longitude         = $request->get('longitude');

        $booking->customer_name = $request->get('customer_name');
        $booking->customer_email = $request->get('customer_email');
        $booking->customer_phone = $request->get('customer_phone');
        $booking->comment = $request->get('comment');

        $booking->status            = $request->get('status', 1);
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
