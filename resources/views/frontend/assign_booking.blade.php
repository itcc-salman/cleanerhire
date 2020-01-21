@extends('frontend.layouts.master')
@section('content')
<!--Web_Inner_Banner-->
<div class="web_innerpage_section">
    <div class="container">
        <div class="inner_banner">
            <h1>Your Booking is Placed. Please select cleaner or just send notification to all.</h1>
        </div>

        <div class="innerpage_section_head">
            <div class="head_a"></div>
            <div class="head_b"></div>
            <div class="head_c"></div>
            <div class="head_d"></div>
        </div>
        @php $services = explode(',', $booking->services) @endphp

        <div class="innerpage_section">
            <div class="row">
                <div class="col-md-8 col-sm-8 col-xs-8">
                    <div class="book_form_left">
                        @foreach( $cleaners as $cleaner )
                        @php $total = 0 @endphp
                        <div class="book_form_tab">
                            <div class="book_job">
                                <p>Cleaner Name: {{ $cleaner->first_name }} {{ $cleaner->last_name }}</p>
                                <p>
                                    Service Charges :
                                    <ul>
                                        @foreach( $cleaner->cleanerServices as $service )
                                        @if( in_array($service->cleaning_service_id, $services) && $service->service_for == $booking->booking_type )
                                            @php $total += $service->rate_per_hour @endphp
                                            <li>{{ $booking_services->find($service->cleaning_service_id)->name }} ${{ $service->rate_per_hour }}</li>
                                        @endif
                                        @endforeach
                                    </ul>
                                </p>
                                <p>Total: ${{ $total }}</p>
                                <button class="btn">Book Now</button>

                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <form action="{{ route('front.send_notification_all', $booking->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn">Send to all</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<!--Web_Innerpage_Section-->
@endsection
