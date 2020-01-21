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


@endpush
