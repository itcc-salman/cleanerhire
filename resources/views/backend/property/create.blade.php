@extends('backend.layouts.master')
@section('title', 'Add Property')
@section('content')
<div class="row">
    <div class="col-md-12">
        <!--begin::Portlet-->
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Add Property
                    </h3>
                </div>
            </div>

            <!--begin::Form-->
            <form class="kt-form" method="POST" action="{{ route('backend.properties.create') }}">
                @csrf
                <div class="kt-portlet__body">

                    <div class="form-group validated">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control @error('name') {{ 'is-invalid' }} @enderror" placeholder="Name">
                        @error('name')
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
