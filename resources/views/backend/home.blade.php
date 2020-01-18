@extends('backend.layouts.master')
@section('title', '')
@section('content')
<style>
    .kt-widget17 .kt-widget17__stats {
            margin: 0;
            width: 100%;
    }
    .kt-portlet--bg-transparent{
        /*background: transparent;*/
    }
    .kt-widget17__value{
        font-size: 1.2rem;
        font-weight: 500;
        color: #595d6e;
        display: inline-block;
    }
    .kt-widget17__icon{
        display: inline-block !important;
    }
</style>
<!--Begin::Dashboard 5-->

<!--Begin::Row-->
<div class="row">
    <div class="col-xl-12 col-lg-12 order-lg-1 order-xl-1">

        <!--begin:: Widgets/Activity-->
        <div class="kt-portlet kt-portlet--fit kt-portlet--head-lg kt-portlet--head-overlay kt-portlet--bg-transparent kt-portlet--height-fluid">
            <div class="">
                <div class="kt-widget17">
                    <div class="kt-widget17__stats">
                        <div class="kt-widget17__items">
                            <div class="kt-widget17__item">
                                <span class="kt-widget17__value">${{$data['revenue']}}</span>
                                <span class="kt-widget17__icon">
                                    @if($data['revenue'] <= $data['prev_revenue'])
                                        {!! $data['svg_down'] !!}
                                    @else
                                        {!! $data['svg_up'] !!}
                                    @endif
                                </span>
                                <span class="kt-widget17__subtitle">
                                    Total Revenue
                                </span>
                                <span class="kt-widget17__desc">
                                    Previous Month: ${{$data['prev_revenue']}}
                                </span>
                            </div>
                            <div class="kt-widget17__item">
                                <span class="kt-widget17__value">{{$data['jobs_done']}}</span>
                                <span class="kt-widget17__icon">
                                    @if($data['jobs_done'] <= $data['prev_jobs_done'])
                                        {!! $data['svg_down'] !!}
                                    @else
                                        {!! $data['svg_up'] !!}
                                    @endif
                                </span>
                                <span class="kt-widget17__subtitle">
                                    Jobs Done
                                </span>
                                <span class="kt-widget17__desc">
                                    Previous Month: {{$data['prev_jobs_done']}}
                                </span>
                            </div>
                            <div class="kt-widget17__item">
                                <span class="kt-widget17__value">{{$data['total_jobs']}}</span>
                                <span class="kt-widget17__icon">
                                    @if($data['total_jobs'] <= $data['prev_total_jobs'])
                                        {!! $data['svg_down'] !!}
                                    @else
                                        {!! $data['svg_up'] !!}
                                    @endif
                                </span>
                                <span class="kt-widget17__subtitle">
                                    Total Jobs <span class="kt-widget17__desc" style="display: inline-block;">(Financial Year)</span>
                                </span>
                                <span class="kt-widget17__desc">
                                    Previous Year: {{$data['prev_total_jobs']}}
                                </span>
                            </div>
                            <div class="kt-widget17__item">
                                <span class="kt-widget17__value">{{$data['cleaner_registered']}}</span>
                                <span class="kt-widget17__icon">
                                    @if($data['cleaner_registered'] <= $data['prev_cleaner_registered'])
                                        {!! $data['svg_down'] !!}
                                    @else
                                        {!! $data['svg_up'] !!}
                                    @endif
                                </span>
                                <span class="kt-widget17__subtitle">
                                    Cleaners Registered
                                </span>
                                <span class="kt-widget17__desc">
                                    Previous Month: {{$data['prev_cleaner_registered']}}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--end:: Widgets/Activity-->
    </div>
</div>

<!--End::Row-->

<!--Begin::Row-->
<div class="row">
    <div class="col-xl-12 col-lg-12 order-lg-1 order-xl-1">
        <!--begin::Portlet-->
        <div class="kt-portlet kt-portlet--tab">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon kt-hidden">
                        <i class="la la-gear"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                        Jobs graph ( Financial Year )
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div id="kt_morris_1" style="height:500px;"></div>
            </div>
        </div>
        <!--end::Portlet-->
    </div>
</div>
<!--End::Row-->
<!--Begin::Row-->
<div class="row">
    <div class="col-xl-12 col-lg-12 order-lg-1 order-xl-1">
        <!--begin::Portlet-->
        <div class="kt-portlet kt-portlet--tab">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon kt-hidden">
                        <i class="la la-gear"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                        Revenue graph ( Financial Year )
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div id="kt_morris_2" style="height:500px;"></div>
            </div>
        </div>

        <!--end::Portlet-->
    </div>
</div>
<!--End::Row-->
<!--Begin::Row-->
<div class="row">
    <div class="col-xl-12 col-lg-12 order-lg-1 order-xl-1">
        <!--begin:: Widgets/Sale Reports-->
        <div class="kt-portlet kt-portlet--tabs kt-portlet--height-fluid">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Upcoming Bookings
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">
                <!--begin::Widget 11-->
                <div class="kt-widget11">
                    @if(count($data['upcoming_bookings']))
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <td>First Name</td>
                                    <td>Last Name</td>
                                    <td>Email</td>
                                    <td>Date</td>
                                    <td>Status</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data['upcoming_bookings'] as $booking)
                                <tr>
                                    <td><span class="kt-widget11__sub">{{ $booking->id }}</span></td>
                                    <td><span class="kt-widget11__sub">{{ $booking->user->first_name }}</span></td>
                                    <td><span class="kt-widget11__sub">{{ $booking->user->last_name }}</span></td>
                                    <td><span class="kt-widget11__sub">{{ $booking->user->email }}</span></td>
                                    <td><span class="kt-widget11__sub">{{ $booking->booking_date }}</span></td>
                                    <td><span class="kt-widget11__sub">{{ $booking->status }}</span></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                        <div class="alert alert-outline-info fade show" role="alert">
                            <div class="alert-icon"><i class="flaticon2-exclamation"></i></div>
                            <div class="alert-text">No Upcoming Bookings!</div>
                            <div class="alert-close">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><i class="la la-close"></i></span>
                                </button>
                            </div>
                        </div>
                    @endif
                </div>
                <!--end::Widget 11-->
            </div>
        </div>
        <!--end:: Widgets/Sale Reports-->
    </div>
</div>
<!--End::Row-->
<!--End::Dashboard 5-->
@push('scripts')
<script>
    console.log();
    new Morris.Line({
        element: 'kt_morris_1',
        data: {!! $data['jobData'] !!},
        xkey: 'date',
        xLabelFormat: function (y) {
            return moment(y).format('MMM YYYY');
        },
        ykeys: ['value'],
        labels: ['Jobs'],
        lineColors: ['#5d78ff'],
    });

    new Morris.Line({
        element: 'kt_morris_2',
        data: [
            { year: '2018-07', value: 0 },
            { year: '2018-08', value: 0 },
            { year: '2018-09', value: 0 },
            { year: '2018-10', value: 0 },
            { year: '2018-11', value: 0 },
            { year: '2018-12', value: 0 },
            { year: '2019-01', value: 0 },
            { year: '2019-02', value: 0 },
            { year: '2019-03', value: 0 },
            { year: '2019-04', value: 0 },
            { year: '2019-05', value: 0 },
            { year: '2019-06', value: 0 }
        ],
        xkey: 'year',
        ykeys: ['value'],
        xLabelFormat: function (y) {
            return moment(y).format('MMM YYYY');
        },
        preUnits: '$',
        labels: ['Revenue'],
        lineColors: ['#5d78ff'],
    });
</script>
@endpush
@endsection
