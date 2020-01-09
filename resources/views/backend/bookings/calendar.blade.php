@extends('backend.layouts.master')
@section('title', 'Booking Calendar')
@section('content')
<!--Begin::Calender 5-->
<div class="row">
    <div class="col-lg-12">

        <!--begin::Portlet-->
        <div class="kt-portlet" id="kt_portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="flaticon-map-location"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                        Booking Calendar
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">

                </div>
            </div>
            <div class="kt-portlet__body">
                <div id="kt_calendar"></div>
            </div>
        </div>

        <!--end::Portlet-->
    </div>
</div>
<!--End::Calender 5-->
@endsection

@push('scripts')

    <script src="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}" type="text/javascript"></script>
    <script>
        var KTCalendarBasic = function() {

            return {
                //main function to initiate the module
                init: function() {
                    var todayDate = moment().startOf('day');
                    var YM = todayDate.format('YYYY-MM');
                    var YESTERDAY = todayDate.clone().subtract(1, 'day').format('YYYY-MM-DD');
                    var TODAY = todayDate.format('YYYY-MM-DD');
                    var TOMORROW = todayDate.clone().add(1, 'day').format('YYYY-MM-DD');

                    var calendarEl = document.getElementById('kt_calendar');
                    var calendar = new FullCalendar.Calendar(calendarEl, {
                        plugins: [ 'dayGrid' ],

                        header: {
                            left: 'prev,next today',
                            center: 'title',
                            right: ''
                        },

                        height: 800,
                        contentHeight: 780,
                        aspectRatio: 3,  // see: https://fullcalendar.io/docs/aspectRatio

                        nowIndicator: true,
                        now: moment().format('YYYY-MM-DDTHH:mm:ss'),

                        views: {
                            dayGridMonth: { buttonText: 'month' }
                        },

                        eventTimeFormat: {
                            hour: '2-digit',
                            minute: '2-digit',
                            hour12: false
                        },

                        defaultView: 'dayGridMonth',
                        defaultDate: TODAY,

                        editable: false,
                        eventLimit: true, // allow "more" link when too many events
                        navLinks: true,
                        events: {!! ($bookingsData) !!}
                    });
                    calendar.render();
                }
            };
        }();

        jQuery(document).ready(function() {
            KTCalendarBasic.init();
        });
    </script>
@endpush
