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
                                    <p>Customer Name : {{ $booking->user->first_name }} {{ $booking->user->last_name }}</p>
                                    <p>Booking Address : {{ $booking->address_line_1 }} {{ $booking->address_line_2 }},
                                        {{ $booking->city }}, {{ $booking->state }} - {{ $booking->postcode }}
                                    </p>
                                    <p>Visit Type : {{ $booking->visit_type }}</p>
                                    <p>Booking Date : {{ $booking->booking_date }}</p>
                                    <p>Booking Time : {{ $booking->booking_time }}</p>
                                    <p>Gender Preference : {{ $booking->gender_pref }}</p>
                                    <p>Has Pet : {{ $booking->has_pet }}</p>
                                    @if( is_null($booking->has_pet) )
                                        <p>Pet Type  : {{ $booking->has_pet_optional }}</p>
                                    @endif
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
