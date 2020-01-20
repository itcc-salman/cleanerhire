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
        {{-- {{$booking}} --}}
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
