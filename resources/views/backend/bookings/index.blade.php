@extends('backend.layouts.master')
@section('title', 'Bookings')
@section('content')
<!--Begin::Dashboard 5-->
<div class="kt-portlet kt-portlet--mobile">
    <div class="kt-portlet__head kt-portlet__head--lg">
        <div class="kt-portlet__head-label">
            <span class="kt-portlet__head-icon">
                <i class="kt-font-brand flaticon2-line-chart"></i>
            </span>
            <h3 class="kt-portlet__head-title">
                Bookings
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

        <!--begin: Search Form -->
        <div class="kt-form kt-form--label-right kt-margin-t-20 kt-margin-b-10">
            <div class="row align-items-center">
                <div class="col-xl-8 order-2 order-xl-1">
                    <div class="row justify-content-between">
                        <div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
                            <div class="kt-input-icon kt-input-icon--left">
                                <input type="text" class="form-control" placeholder="Search..." id="general">
                                <input type="hidden" class="form-control" id="from_booking">
                                <input type="hidden" class="form-control" id="to_booking">
                                <span class="kt-input-icon__icon kt-input-icon__icon--left">
                                    <span><i class="la la-search"></i></span>
                                </span>
                            </div>
                        </div>
                        <div class="align-self-end kt-margin-b-20-tablet-and-mobile">
                            <a href="javascript:;" class="btn kt-subheader__btn-daterange" id="kt_dashboard_daterangepicker">
                                <span class="kt-subheader__btn-daterange-title" id="kt_dashboard_daterangepicker_title"></span>&nbsp;
                                <span class="kt-subheader__btn-daterange-date" id="kt_dashboard_daterangepicker_date"></span>

                                <!--<i class="flaticon2-calendar-1"></i>-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--sm">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path d="M4.875,20.75 C4.63541667,20.75 4.39583333,20.6541667 4.20416667,20.4625 L2.2875,18.5458333 C1.90416667,18.1625 1.90416667,17.5875 2.2875,17.2041667 C2.67083333,16.8208333 3.29375,16.8208333 3.62916667,17.2041667 L4.875,18.45 L8.0375,15.2875 C8.42083333,14.9041667 8.99583333,14.9041667 9.37916667,15.2875 C9.7625,15.6708333 9.7625,16.2458333 9.37916667,16.6291667 L5.54583333,20.4625 C5.35416667,20.6541667 5.11458333,20.75 4.875,20.75 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                        <path d="M2,11.8650466 L2,6 C2,4.34314575 3.34314575,3 5,3 L19,3 C20.6568542,3 22,4.34314575 22,6 L22,15 C22,15.0032706 21.9999948,15.0065399 21.9999843,15.009808 L22.0249378,15 L22.0249378,19.5857864 C22.0249378,20.1380712 21.5772226,20.5857864 21.0249378,20.5857864 C20.7597213,20.5857864 20.5053674,20.4804296 20.317831,20.2928932 L18.0249378,18 L12.9835977,18 C12.7263047,14.0909841 9.47412135,11 5.5,11 C4.23590829,11 3.04485894,11.3127315 2,11.8650466 Z M6,7 C5.44771525,7 5,7.44771525 5,8 C5,8.55228475 5.44771525,9 6,9 L15,9 C15.5522847,9 16,8.55228475 16,8 C16,7.44771525 15.5522847,7 15,7 L6,7 Z" fill="#000000" />
                                    </g>
                                </svg> </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 order-1 order-xl-2 kt-align-right">
                    <a href="#" class="btn btn-default kt-hidden">
                        <i class="la la-cart-plus"></i> New Order
                    </a>
                    <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg d-xl-none"></div>
                </div>
            </div>
        </div>

        <!--end: Search Form -->
    </div>
    <div class="kt-portlet__body kt-portlet__body--fit">

        <!--begin: Datatable -->
        <div class="kt-datatable" id="ajax_data"></div>

        <!--end: Datatable -->
    </div>
</div>
<!--End::Dashboard 5-->
@endsection

@push('scripts')

<script type="text/javascript">

// Class definition
var KTDatatableRemoteAjax = function() {

    var datatable = $('.kt-datatable').KTDatatable({
        // datasource definition
        data: {
            saveState:{
                cookie: false,
                webstorage: false
            },
            type: 'remote',
            source: {
                read: {
                    url: '{{ route('backend.ajax.bookings') }}',
                    method: 'GET',
                    params: {
                        f: $('#from_booking').val(),
                        t : $('#to_booking').val(),
                    },

                    // sample custom headers
                    // headers: {'x-my-custom-header': 'some value', 'x-test-header': 'the value'},
                    map: function(raw) {
                        // sample data mapping
                        var dataSet = raw;
                        if (typeof raw.bookings !== 'undefined') {
                            dataSet = raw.bookings;
                        }
                        return dataSet;
                    },
                },
            },
            pageSize: 10,
            serverPaging: true,
            serverFiltering: true,
            serverSorting: true,
        },

        // layout definition
        layout: {
            scroll: false,
            footer: false,
        },

        // column sorting
        sortable: true,

        pagination: true,

        search: {
            input: $('#general'),
        },

        // columns definition
        columns: [
            {
                field: 'id',
                title: '#',
                sortable: 'asc',
                width: 30,
                type: 'number',
                selector: false,
                textAlign: 'center',
            }, {
                field: 'user.first_name',
                title: 'First Name',
            }, {
                field: 'user.last_name',
                title: 'Last Name',
            }, {
                field: 'user.email',
                title: 'Email',
            }, {
                field: 'booking_date',
                title: 'Date',
            }, {
                field: 'status',
                title: 'Status',
                // callback function support for column rendering
                template: function(row) {
                    var status = {
                        0: {'title': 'Created', 'class': ' kt-badge--info'},
                        1: {'title': 'Pending', 'class': ' kt-badge--info'},
                        2: {'title': 'Appointed', 'class': ' kt-badge--brand'},
                        3: {'title': 'Inprogress', 'class': ' kt-badge--brand'},
                        4: {'title': 'Completed', 'class': ' kt-badge--success'},
                        5: {'title': 'Cancelled', 'class': 'kt-badge--danger'}
                    };
                    return '<span class="kt-badge ' + status[row.status].class + ' kt-badge--inline kt-badge--pill">' + status[row.status].title + '</span>';
                },
            }, {
                field: 'Actions',
                title: 'Actions',
                sortable: false,
                width: 110,
                overflow: 'visible',
                autoHide: false,
                template: function(row) {
                    return '\
                    <a href="/admin/booking/view/'+ row.id +'" class="btn btn-sm btn-clean btn-icon btn-icon-sm" title="View details">\
                        <i class="flaticon-eye"></i>\
                    </a>\
                    <a href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-icon-sm" title="Delete">\
                        <i class="flaticon2-trash"></i>\
                    </a>\
                ';
                },
            }],
    });
    $('#from_booking,#to_booking').on('change', function() {
        datatable.setDataSourceParam('f', $('#from_booking').val());
        datatable.setDataSourceParam('t', $('#to_booking').val());
        datatable.load();
    });
    console.log(datatable);

};

// Daterangepicker Init
var daterangepickerInit = function() {
    if ($('#kt_dashboard_daterangepicker').length == 0) {
        return;
    }

    var picker = $('#kt_dashboard_daterangepicker');
    var start = moment().startOf('month');
    var end = moment().endOf('month');

    function cb(start, end, label) {
        var title = '';
        var range = '';

        if (label == 'Today') {
            title = 'Today:';
            range = start.format('MMM DD');
        } else if (label == 'Tomorrow') {
            title = 'Tomorrow:';
            range = start.format('MMM DD');
        } else if (label == 'Yesterday') {
            title = 'Yesterday:';
            range = start.format('MMM DD');
        } else {
            range = start.format('MMM DD') + ' - ' + end.format('MMM DD');
        }

        $("#from_booking").val(start.format('YYYY-MM-DD'));
        $("#to_booking").val(end.format('YYYY-MM-DD')).trigger('change');
        $('#kt_dashboard_daterangepicker_date').html(range);
        $('#kt_dashboard_daterangepicker_title').html(title);
    }

    picker.daterangepicker({
        direction: false,
        startDate: start,
        endDate: end,
        opens: 'left',
        ranges: {
            'Today': [moment(), moment()],
            'Tomorrow': [moment().add(1, 'days'), moment().add(1, 'days')],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);

    cb(start, end, '');
}

jQuery(document).ready(function() {
    daterangepickerInit();
    var url = $(location).attr('href'),
    parts = url.split("/v/");
    if(parts.length == 2){
        var dateString = moment.unix(parts[1]).format("YYYY-MM-DD");
        $("#from_booking").val(dateString);
        $("#to_booking").val(dateString).trigger('change');
        $('#kt_dashboard_daterangepicker_date').html(moment.unix(parts[1]).format("MMM DD"));
    }
    KTDatatableRemoteAjax();
});
</script>

@endpush
