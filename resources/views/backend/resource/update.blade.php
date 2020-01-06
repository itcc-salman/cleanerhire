@extends('backend.layouts.master')

@section('content')
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="row">
        <div class="col-md-12">
            <!--begin::Portlet-->
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Update Resource
                        </h3>
                    </div>
                </div>

                <!--begin::Form-->
                <form class="kt-form" method="POST" action="{{ route('backend.resource.update', $resource->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="kt-portlet__body">

                        <div class="form-group validated">
                            <label>Name</label>
                            <input type="text" name="name" value="{{ $resource->name }}" class="form-control @error('name') {{ 'is-invalid' }} @enderror" placeholder="Name">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>@lang('labels.docName')</label>
                            <div class="custom-file">
                                <input type="file" id="document_name" name="document_name" accept="application/pdf" class="custom-file-input">
                                <label class="custom-file-label">Choose file</label>
                            </div>
                            <span class="form-text text-muted">Only PDF allowed</span>
                            @error('document_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="kt-checkbox-list">
                                <div class="d-block">
                                    <label>Visible To</label>
                                    <div class="kt-checkbox-inline">
                                        <label class="kt-checkbox kt-checkbox--tick kt-checkbox--brand kt-margin-0">
                                            <input name="visible_to_cleaner" value="1" {{ $resource->visible_to_cleaner ? 'checked' : '' }} type="checkbox">@lang('labels.cleSerIndividual')<span></span>
                                        </label>
                                        &nbsp;
                                        <label class="kt-checkbox kt-checkbox--tick kt-checkbox--brand kt-margin-0">
                                            <input name="visible_to_company" value="1" {{ $resource->visible_to_company ? 'checked' : '' }} type="checkbox">@lang('labels.cleSerCompany')<span></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group validated">
                            <label>Status</label>
                            <div class="kt-radio-inline">
                                <label class="kt-radio kt-radio--tick kt-radio--brand"><input type="radio" {{ $resource->status ? 'checked' : '' }} value="1" name="status"> Active <span></span></label>
                                <label class="kt-radio kt-radio--tick kt-radio--brand"><input type="radio" {{ !$resource->status ? 'checked' : '' }} value="0" name="status"> Deactive <span></span></label>
                            </div>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <div class="kt-portlet__foot">
                        <div class="kt-form__actions">
                            <button type="submit" class="btn btn-success">Update</button>
                            <a href="{{ route('backend.resources') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </div>
                </form>

                <!--end::Form-->
            </div>

            <!--end::Portlet-->
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
</script>
@endpush
