@extends('cleaner.layouts.master')
@section('title', 'Booking view')
@section('content')
<!--Begin::Dashboard 5-->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand flaticon2-line-chart"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                    Booking Details
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">

            <!--begin::Widget -->
            <div class="kt-widget kt-widget--user-profile-2">
                <div class="kt-widget__body">
                    <div class="kt-widget__section text-danger">
                        The booking is assigned to you. Here are the booking details.
                    </div>
                    <div class="kt-widget__item">
                        <div class="kt-widget__contact">
                            <h5>Booking Type : {{ ucfirst($booking->booking_type) }}</h5>
                        </div>
                        <div class="kt-widget__contact">
                            <h5>Customer Name : {{ $booking->customer_name }}</h5>
                            {{-- <span class="kt-widget__label">Phone:</span> --}}
                            {{-- <a href="#" class="kt-widget__data">44(76)34254578</a> --}}
                        </div>
                        <div class="kt-widget__contact">
                            <h5>Customer Email : <a href="mailto:{{ $booking->customer_email }}">{{ $booking->customer_email }}</a></h5>
                        </div>
                        <div class="kt-widget__contact">
                            <h5>Customer Contact No : <a href="tel:{{ $booking->customer_phone }}">{{ $booking->customer_phone }}</a></h5>
                        </div>
                        <div class="kt-widget__contact">
                            <h5>Booking Address : {{ $booking->address_line_1 }} {{ $booking->address_line_2 }},
                                {{ $booking->city }}, {{ $booking->state }} - {{ $booking->postcode }}
                                {{-- <a target="_blank" href="http://maps.google.com/?ie=UTF8&hq=&ll={{$booking->latitude}},{{$booking->longitude}}&z=13" class="btn btn-info">View on Map</a> --}}
                                <a target="_blank" href="https://www.google.com/maps/search/?api=1&query={{ $booking->address_line_1 }} {{ $booking->address_line_2 }} {{ $booking->city }} {{ $booking->state }} {{ $booking->postcode }}" class="btn btn-info">View on Map</a>
                            </h5>
                        </div>
                        <div class="kt-widget__contact">
                            <h5>Service Requested : {{ $booking->service->name }}</h5>
                        </div>
                        @if( $booking->booking_type == 'residential' && in_array($booking->service->id, directServiceResedential()) )
                        <div class="kt-widget__contact">
                            <h5>Service Hours : {{ $booking->duration }}</h5>
                        </div>
                        <div class="kt-widget__contact">
                            <h5>No Of Rooms : {{ $booking->rooms }}</h5>
                        </div>
                        <div class="kt-widget__contact">
                            <h5>No Of Bathrooms : {{ $booking->bathrooms }}</h5>
                        </div>
                        @endif
                        @if( $booking->services_date_type == 'preferred' )
                        <div class="kt-widget__contact">
                            <h5>Booking Date : {{ $booking->booking_date }}</h5>
                        </div>
                        <div class="kt-widget__contact">
                            <h5>Booking Time : {{ $booking->booking_time }}</h5>
                        </div>
                        @else
                        <div class="kt-widget__contact">
                            <h5>Service Needed : <span class="badge bg-danger">ASAP</span></h5>
                        </div>
                        @endif
                        <div class="kt-widget__contact">
                            <h5>Preferred Date and Time Note : {{ $booking->preferred_date_and_time }}</h5>
                        </div>
                        <div class="kt-widget__contact">
                            <h5>Comment : {{ $booking->comment }}</h5>
                        </div>
                    </div>
                </div>
                <div class="kt-widget__footer">
                    <button type="button" class="btn btn-label-primary btn-lg btn-upper">Button</button>
                </div>
            </div>

            <!--end::Widget -->
        </div>
    </div>
</div>
<!--End::Dashboard 5-->
@endsection
