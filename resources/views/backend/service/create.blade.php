@extends('backend.layouts.master')
@section('title', 'Add Service')
@section('content')
<div class="row">
    <div class="col-md-12">
        <!--begin::Portlet-->
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Add Service
                    </h3>
                </div>
            </div>

            <!--begin::Form-->
            <form class="kt-form" method="POST" action="{{ route('backend.sevice.create') }}">
                @csrf
                <div class="kt-portlet__body">

                    <div class="form-group">
                        <div class="kt-checkbox-list">
                            <div class="kt-option kt-p10 col-12 d-block">
                                <label>@lang('labels.cleSerResidentialOrCommercial')</label>
                                <div class="kt-checkbox-inline">
                                    <label class="kt-checkbox kt-checkbox--tick kt-checkbox--brand kt-margin-0">
                                        <input name="residential" value="1" type="checkbox">@lang('labels.cleSerResidential')<span></span>
                                    </label>
                                    &nbsp;
                                    <label class="kt-checkbox kt-checkbox--tick kt-checkbox--brand kt-margin-0">
                                        <input name="commercial" value="1" type="checkbox">@lang('labels.cleSerCommercial')<span></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="kt-checkbox-list">
                            <div class="kt-option kt-p10 col-12 d-block">
                                <label>@lang('labels.cleSerOnceoffOrRegular')</label>
                                <div class="kt-checkbox-inline">
                                    <label class="kt-checkbox kt-checkbox--tick kt-checkbox--brand kt-margin-0">
                                        <input name="once_off" value="1" type="checkbox">@lang('labels.cleSerOnceoff')<span></span>
                                    </label>
                                    &nbsp;
                                    <label class="kt-checkbox kt-checkbox--tick kt-checkbox--brand kt-margin-0">
                                        <input name="regular" value="1" type="checkbox">@lang('labels.cleSerRegular')<span></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="kt-checkbox-list">
                            <div class="kt-option kt-p10 col-12 d-block">
                                <label>@lang('labels.cleSerIndividualOrCompany')</label>
                                <div class="kt-checkbox-inline">
                                    <label class="kt-checkbox kt-checkbox--tick kt-checkbox--brand kt-margin-0">
                                        <input name="individual" value="1" type="checkbox">@lang('labels.cleSerIndividual')<span></span>
                                    </label>
                                    &nbsp;
                                    <label class="kt-checkbox kt-checkbox--tick kt-checkbox--brand kt-margin-0">
                                        <input name="company" value="1" type="checkbox">@lang('labels.cleSerCompany')<span></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group validated">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control @error('name') {{ 'is-invalid' }} @enderror" placeholder="Name">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group validated">
                        <label>Rate Per Hour</label>
                        <input type="text" name="rate_per_hour" class="form-control @error('rate_per_hour') {{ 'is-invalid' }} @enderror" placeholder="$">
                        @error('rate_per_hour')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group validated">
                        <label>Markup(Percent)</label>
                        <input type="text" name="markup_percent" class="form-control @error('markup_percent') {{ 'is-invalid' }} @enderror" placeholder="$">
                        @error('markup_percent')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group validated">
                        <label>Status</label>
                        <div class="kt-radio-inline">
                            <label class="kt-radio kt-radio--tick kt-radio--brand"><input type="radio" value="1" name="status"> Active <span></span></label>
                            <label class="kt-radio kt-radio--tick kt-radio--brand"><input type="radio" value="0" name="status"> Deactive <span></span></label>
                        </div>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
                <div class="kt-portlet__foot">
                    <div class="kt-form__actions">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <button type="reset" class="btn btn-secondary">Cancel</button>
                    </div>
                </div>
            </form>

            <!--end::Form-->
        </div>

        <!--end::Portlet-->
    </div>
</div>
@endsection
