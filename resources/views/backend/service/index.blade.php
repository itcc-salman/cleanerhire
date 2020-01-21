@extends('backend.layouts.master')
@section('title', 'Services')
@section('content')
<!--Begin::Dashboard 5-->
<div class="kt-portlet kt-portlet--mobile">
    <div class="kt-portlet__head kt-portlet__head--lg">
        <div class="kt-portlet__head-label">
            <span class="kt-portlet__head-icon">
                <i class="kt-font-brand flaticon2-line-chart"></i>
            </span>
            <h3 class="kt-portlet__head-title">
                Services List
            </h3>
        </div>
        <div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
                {{-- <a href="#" class="btn btn-clean btn-icon-sm">
                    <i class="la la-long-arrow-left"></i>
                    Back
                </a> --}}
                &nbsp;
                <div class="dropdown dropdown-inline">
                    <a href="{{ route('backend.sevice.create') }}" class="btn btn-brand btn-icon-sm">
                        <i class="flaticon2-plus"></i> Add New
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="kt-portlet__body">

        <!--begin: Search Form -->
        <div class="kt-form kt-form--label-right kt-margin-t-20 kt-margin-b-10">
            <div class="row align-items-center">
                <div class="col-xl-8 order-2 order-xl-1">
                    <div class="row align-items-center">
                        <div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
                            <div class="kt-input-icon kt-input-icon--left">
                                <input type="text" class="form-control" placeholder="Search..." id="generalSearch">
                                <span class="kt-input-icon__icon kt-input-icon__icon--left">
                                    <span><i class="la la-search"></i></span>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
                            <div class="kt-form__group kt-form__group--inline">
                                <div class="kt-form__label">
                                    <label>Status:</label>
                                </div>
                                <div class="kt-form__control">
                                    <select class="form-control bootstrap-select" id="kt_form_status">
                                        <option value="">All</option>
                                        <option value="1">Pending</option>
                                        <option value="2">Delivered</option>
                                        <option value="3">Canceled</option>
                                        <option value="4">Success</option>
                                        <option value="5">Info</option>
                                        <option value="6">Danger</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
                            <div class="kt-form__group kt-form__group--inline">
                                <div class="kt-form__label">
                                    <label>Type:</label>
                                </div>
                                <div class="kt-form__control">
                                    <select class="form-control bootstrap-select" id="kt_form_type">
                                        <option value="">All</option>
                                        <option value="1">Online</option>
                                        <option value="2">Retail</option>
                                        <option value="3">Direct</option>
                                    </select>
                                </div>
                            </div>
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

var KTDatatableRemoteAjaxDemo = function() {
    // Private functions

    // basic demo
    var demo = function() {

        var datatable = $('.kt-datatable').KTDatatable({
            // datasource definition
            data: {
                type: 'remote',
                source: {
                    read: {
                        url: '{{ route('backend.ajax.services') }}',
                        method: 'GET',
                        // sample custom headers
                        // headers: {'x-my-custom-header': 'some value', 'x-test-header': 'the value'},
                        map: function(raw) {
                            // sample data mapping
                            var dataSet = raw;
                            if (typeof raw.services !== 'undefined') {
                                dataSet = raw.services;
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
                input: $('#generalSearch'),
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
                    field: 'name',
                    title: 'Name',
                }, {
                    field: 'rate_per_hour',
                    title: 'Rate Per Hour Residential',
                    template: function(row) {
                        return '$ ' + row.rate_per_hour;
                    },
                }, {
                    field: 'rate_per_hour_com',
                    title: 'Rate Per Hour Commercial',
                    template: function(row) {
                        return '$ ' + row.rate_per_hour_com;
                    },
                }, {
                    field: 'individual',
                    title: 'Cleaner',
                    template: function(row) {
                        var status = {
                            1: {'title': 'Yes', 'class': 'kt-badge--success'},
                            0: {'title': 'No', 'class': ' kt-badge--danger'},
                        };
                        return '<span class="kt-badge ' + status[row.individual].class + ' kt-badge--inline kt-badge--pill">' + status[row.individual].title + '</span>';
                    },
                }, {
                    field: 'company',
                    title: 'Company',
                    template: function(row) {
                        var status = {
                            1: {'title': 'Yes', 'class': 'kt-badge--success'},
                            0: {'title': 'No', 'class': ' kt-badge--danger'},
                        };
                        return '<span class="kt-badge ' + status[row.company].class + ' kt-badge--inline kt-badge--pill">' + status[row.company].title + '</span>';
                    },
                }, {
                    field: 'status',
                    title: 'Status',
                    // callback function support for column rendering
                    template: function(row) {
                        var status = {
                            0: {'title': 'Inactive', 'class': ' kt-badge--danger'},
                            1: {'title': 'Active', 'class': 'kt-badge--brand'}
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
                        <a href="{{ route('backend.sevice.update') }}/'+row.id+'" class="btn btn-sm btn-clean btn-icon btn-icon-sm" title="Edit details">\
                            <i class="flaticon2-edit"></i>\
                        </a>\
                        <a href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-icon-sm deleteme" data-delete_id="'+row.id+'" title="Delete">\
                            <i class="flaticon2-trash"></i>\
                        </a>\
                    ';
                    },
                }],

        });

    $('#kt_form_status').on('change', function() {
      datatable.search($(this).val().toLowerCase(), 'Status');
    });

    $('#kt_form_type').on('change', function() {
      datatable.search($(this).val().toLowerCase(), 'Type');
    });

    $('#kt_form_status,#kt_form_type').selectpicker();

    };

    return {
        // public functions
        init: function() {
            demo();
        },
    };
}();

jQuery(document).ready(function() {
    KTDatatableRemoteAjaxDemo.init();

    $(document).on('click', '.deleteme', function (e) {
        e.preventDefault();
        let _delete_id = $(this).data('delete_id');
        swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!'
        }).then(function(result) {
            if (result.value) {
                // call ajax function to delete it
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: '{{ route('backend.ajax.service.delete') }}',
                    cache: false,
                    dataType: "JSON",
                    data: {
                        delete_id: _delete_id
                    },
                    success: function(data) {
                        if( data.status == false ) {
                            showToast(data.msg, 0);
                        } else {
                            swal.fire({
                                title: 'Deleted!',
                                text: 'Record has been deleted.',
                                type: 'success'
                            }).then(function(result) {
                                location.reload();
                            });
                        }
                    }
                });
            }
        });
    });
});
</script>

@endpush
