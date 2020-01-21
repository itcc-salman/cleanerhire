@extends('backend.layouts.master')

@section('title', 'Edit Booking')

@push('css')
<link href="{{ asset('assets/css/pages/booking/booking.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
<!--Begin::Dashboard 5-->
<div class="kt-portlet kt-portlet--mobile">
    <div class="kt-portlet__head kt-portlet__head--lg">
        <div class="kt-portlet__head-label">
            <span class="kt-portlet__head-icon">
                <i class="kt-font-brand flaticon2-line-chart"></i>
            </span>
            <h3 class="kt-portlet__head-title">
                View Booking
            </h3>
        </div>
        <div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
                <a href="{{ route('backend.dashboard') }}" class="btn btn-clean btn-icon-sm">
                    <i class="la la-long-arrow-left"></i>
                    Back
                </a>
            </div>
        </div>
    </div>
    <div class="kt-portlet__body">
        <div class="kt-invoice-1">
            <div class="kt-invoice__head">
                <div class="kt-invoice__container">
                    <div class="kt-invoice__brand">
                        <h3 class="kt-invoice__title">{{$booking->user->first_name}} {{$booking->user->last_name}}</h3>
                        <div href="#" class="kt-invoice__logo">
                            <span class="kt-badge kt-badge--brand kt-badge--inline kt-margin-t-5">{{$booking->formattedStatus}}</span>
                        </div>
                    </div>
                    <span class="kt-invoice__desc">
                        <span>{{$booking->address_line_1 }}, {{$booking->address_line_2}}, {{$booking->city}},</span>
                        <span>{{$booking->state}} {{$booking->postcode}}</span>
                    </span>
                    <div class="kt-invoice__items">
                        <div class="kt-invoice__item">
                            <span class="kt-invoice__subtitle">Visit Type</span>
                            <span class="kt-invoice__text text-capitalize">{{$booking->visit_type}}</span>
                        </div>
                        <div class="kt-invoice__item">
                            <span class="kt-invoice__subtitle">Booking Type</span>
                            <span class="kt-invoice__text text-capitalize">{{$booking->booking_type}}</span>
                        </div>
                        <div class="kt-invoice__item">
                            <span class="kt-invoice__subtitle">Booking Date</span>
                            <span class="kt-invoice__text">{{ $booking->booking_date }}</span>
                        </div>
                        <div class="kt-invoice__item">
                            <span class="kt-invoice__subtitle">Booking Time</span>
                            <span class="kt-invoice__text">{{$booking->booking_time}}</span>
                        </div>
                        <div class="kt-invoice__item">
                            <span class="kt-invoice__subtitle">Duration</span>
                            <span class="kt-invoice__text">{{$booking->duration}} Hrs.</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-invoice__body">
                <div class="kt-invoice__container">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Services</th>
                                    <th>HOURS</th>
                                    <th>RATE</th>
                                    <th>AMOUNT</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $total = 0 @endphp
                                @foreach($booking->services() as $service)
                                <tr>
                                    <td>{{$service->name}}</td>
                                    <td>{{$booking->duration}}</td>
                                    <td>${{$service->rate_per_hour}}</td>
                                    <td>{{$total = $booking->duration * $service->rate_per_hour}}</td>
                                    @php $total = $total + $booking->duration * $service->rate_per_hour @endphp
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="kt-invoice__footer">
                <div class="kt-invoice__container">
                    <div class="kt-invoice__bank">
                    </div>
                    <div class="kt-invoice__total">
                        <span class="kt-invoice__title">TOTAL AMOUNT</span>
                        <span class="kt-invoice__price">${{$total}}</span>
                        <span class="kt-invoice__notice">Taxes Included</span>
                    </div>
                </div>
            </div>
            <div class="kt-invoice__head">
                <div class="kt-invoice__container">
                    <button type="button" class="btn btn-brand btn-bold">ABC</button>
                    <a href="{{ route('backend.bookings') }}" class="btn btn-danger">Cancel</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End::Dashboard 5-->
@endsection

@push('scripts')

<script type="text/javascript">

jQuery(document).ready(function() {

});
</script>

@endpush
