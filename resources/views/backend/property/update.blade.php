@extends('backend.layouts.master')

@section('content')
<div class="row">
    <div class="col-md-12">
        <!--begin::Portlet-->
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Update Property
                    </h3>
                </div>
            </div>

            <!--begin::Form-->
            <form class="kt-form" method="POST" action="{{ route('backend.properties.update', $property->id) }}">
                @csrf
                <div class="kt-portlet__body">

                    <div class="form-group validated">
                        <label>Name</label>
                        <input type="text" name="name" value="{{ $property->name }}" class="form-control @error('name') {{ 'is-invalid' }} @enderror" placeholder="Name">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group validated">
                        <label>Status</label>
                        <div class="kt-radio-inline">
                            <label class="kt-radio kt-radio--tick kt-radio--brand"><input type="radio" value="1" {{ $property->status ? 'checked' : '' }} name="status"> Active <span></span></label>
                            <label class="kt-radio kt-radio--tick kt-radio--brand"><input type="radio" value="0" {{ !$property->status ? 'checked' : '' }} name="status"> Deactive <span></span></label>
                        </div>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
                <div class="kt-portlet__foot">
                    <div class="kt-form__actions">
                        <button type="submit" class="btn btn-success">Update</button>
                        <a href="{{ route('backend.properties') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </div>
            </form>

            <!--end::Form-->
        </div>

        <!--end::Portlet-->
    </div>
</div>
@endsection
@push('scripts')
<script>
</script>
@endpush
