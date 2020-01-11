@extends('backend.layouts.master')
@section('title', 'Cleaners')
@section('content')
<!--Begin:: Cleaners-->
<div class="kt-portlet kt-portlet--mobile">
    <div class="kt-portlet__head kt-portlet__head--lg">
        <div class="kt-portlet__head-label">
            <span class="kt-portlet__head-icon">
                <i class="kt-font-brand flaticon2-line-chart"></i>
            </span>
            <h3 class="kt-portlet__head-title">
                Cleaners
            </h3>
        </div>
        <div class="kt-portlet__head-toolbar d-none">
            <div class="kt-portlet__head-wrapper">
                <a href="{{ route('backend.dashboard') }}" class="btn btn-clean btn-icon-sm">
                    <i class="la la-long-arrow-left"></i>
                    Back
                </a>
                &nbsp;
                <div class="dropdown dropdown-inline d-none">
                    <a href="{{ route('backend.cleaner.add') }}" class="btn btn-brand btn-icon-sm">
                        <i class="flaticon2-plus"></i> Add New
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="kt-portlet__body">
        @include('backend.cleaners.partials.step5', $cleaner)
    </div>
    <div class="kt-portlet__foot">
        <div class="kt-form__actions">
            <form action="{{ route('backend.cleaners_applications.approve') }}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{$cleaner->id}}">
                <button type="submit" class="btn btn-success">Approve</button>
                <a href="{{ route('backend.cleaners_applications') }}" class="btn btn-danger">Cancel</a>
            </form>
        </div>
    </div>
</div>
<!--End:: Cleaners-->
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
                        url: '{{ route('backend.ajax.cleaners.pending') }}',
                        method: 'GET',
                        // sample custom headers
                        // headers: {'x-my-custom-header': 'some value', 'x-test-header': 'the value'},
                        map: function(raw) {
                            // sample data mapping
                            var dataSet = raw;
                            if (typeof raw.cleaners !== 'undefined') {
                                dataSet = raw.cleaners;
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
                    field: 'first_name',
                    title: 'First Name',
                }, {
                    field: 'last_name',
                    title: 'Last Name',
                }, {
                    field: 'email',
                    title: 'Email',
                }, {
                    field: 'status',
                    title: 'Status',
                    // callback function support for column rendering
                    template: function(row) {
                        var status = {
                            0: {'title': 'Created', 'class': ' kt-badge--primary'},
                            1: {'title': 'Pending', 'class': 'kt-badge--brand'},
                            2: {'title': 'Inactive', 'class': 'kt-badge--danger'},
                            3: {'title': 'Active', 'class': 'kt-badge--success'},
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
                        console.log(row.id);
                        return '\
                        <a href="/admin/cleaner/edit/'+ row.id +'" class="btn btn-sm btn-clean btn-icon btn-icon-sm" title="Edit details">\
                            <i class="flaticon2-edit"></i>\
                        </a>\
                        <a href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-icon-sm" title="Delete">\
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
});
</script>

@endpush
