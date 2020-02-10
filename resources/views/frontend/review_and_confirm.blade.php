@extends('frontend.layouts.master')
@section('content')
<!--Web_Inner_Banner-->
<div class="web_innerpage_section">
    <div class="container">
        <div class="inner_banner">
            <h1>Booking</h1>
        </div>

        <div class="innerpage_section_head">
            <div class="head_a"></div>
            <div class="head_b"></div>
            <div class="head_c"></div>
            <div class="head_d"></div>
        </div>

        <div class="innerpage_section">
            <div class="row">
                <div class="col-md-8 col-sm-8 col-xs-8">
                    <form id="booking" method="POST">
                        <div class="book_form_left">
                            <div class="book_form_tab">
                                <label class="bft_question">Booking Information</label>
                                <div class="book_job">
                                    <p>Booking Type : {{ ucfirst($booking->booking_type) }}</p>
                                    <p>Customer Name : {{ $booking->customer_name }}</p>
                                    <p>Customer Email : {{ $booking->customer_email }}</p>
                                    <p>Customer Contact No : {{ $booking->customer_phone }}</p>
                                    <p>Booking Address : {{ $booking->address_line_1 }} {{ $booking->address_line_2 }},
                                        {{ $booking->city }}, {{ $booking->state }} - {{ $booking->postcode }}
                                    </p>
                                    <p>Service Requested : {{ $booking->service->name }}</p>
                                    @if( $booking->booking_type == 'residential' && in_array($booking->service->id, directServiceResedential()) )
                                        <p>Service Hours : {{ $booking->duration }}</p>
                                        <p>No Of Rooms : {{ $booking->rooms }}</p>
                                        <p>No Of Bathrooms : {{ $booking->bathrooms }}</p>
                                    @endif
                                    @if( $booking->services_date_type == 'preferred' )
                                        <p>Booking Date : {{ $booking->booking_date }}</p>
                                        <p>Booking Time : {{ $booking->booking_time }}</p>
                                    @else
                                        <p>Service Needed : <span class="badge bg-danger">ASAP</span></p>
                                    @endif
                                    <p>Preferred Date and Time Note : {{ $booking->preferred_date_and_time }}</p>
                                    <p>Comment : {{ $booking->comment }}</p>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<!--Web_Innerpage_Section-->
@endsection
