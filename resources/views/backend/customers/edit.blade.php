@extends('backend.layouts.master')
@section('title', 'Edit Customer')
@section('content')
<div class="row">
    <div class="col-md-12">
        <!--begin::Portlet-->
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Edit Customer
                    </h3>
                </div>
            </div>

            <!--begin::Form-->
            <form class="kt-form" method="POST" action="{{ route('backend.customer.update') }}">
                @csrf
                <div class="kt-portlet__body">
                    <input type="hidden" name="id" value="{{$customer->id}}">

                    <div class="form-group validated">
                        <label>First Name</label>
                        <input type="text" name="first_name" value="{{ $customer->user->first_name }}" class="form-control @error('first_name') {{ 'is-invalid' }} @enderror" placeholder="First Name">
                        @error('first_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group validated">
                        <label>Last Name</label>
                        <input type="text" name="last_name" value="{{ $customer->user->last_name }}" class="form-control @error('last_name') {{ 'is-invalid' }} @enderror" placeholder="Last Name">
                        @error('last_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group validated">
                        <label>Email</label>
                        <input type="text" name="email" value="{{ $customer->user->email }}" class="form-control @error('email') {{ 'is-invalid' }} @enderror" placeholder="Email" disabled>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group validated">
                        <label>Address Line 1</label>
                        <input type="text" class="form-control @error('address_line_1') {{ 'is-invalid' }} @enderror" name="address_line_1" placeholder="Address Line 1" value="{{ $customer->address_line_1 ?? '' }}">
                        @error('address_line_1')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group validated">
                        <label>Address Line 2</label>
                        <input type="text" class="form-control @error('address_line_2') {{ 'is-invalid' }} @enderror" name="address_line_2" placeholder="Address Line 2" value="{{ $customer->address2 ?? '' }}">
                        @error('address_line_2')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group validated">
                        <label>Postcode</label>
                        <input type="text" class="form-control @error('postcode') {{ 'is-invalid' }} @enderror" name="postcode" placeholder="Postcode" value="{{ $customer->postcode ?? '' }}">
                        @error('postcode')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group validated">
                        <label>City</label>
                        <input type="text" class="form-control @error('city') {{ 'is-invalid' }} @enderror" name="city" placeholder="City" value="{{ $customer->city ?? '' }}">
                        @error('city')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group validated">
                        <label>State</label>
                        <input type="text" class="form-control @error('state') {{ 'is-invalid' }} @enderror" name="state" placeholder="State" value="{{ $customer->state ?? '' }}">
                        @error('state')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group validated">
                        <label>Country</label>
                        <input type="text" class="form-control @error('country') {{ 'is-invalid' }} @enderror" name="country" placeholder="Country" value="{{ $customer->country ?? '' }}">
                        @error('country')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group validated">
                        <label>Status</label>
                        <div class="kt-radio-inline">
                            <label class="kt-radio kt-radio--tick kt-radio--brand"><input type="radio" value="1" {{ $customer->status ? 'checked' : '' }} name="status"> Active <span></span></label>
                            <label class="kt-radio kt-radio--tick kt-radio--brand"><input type="radio" value="0" {{ !$customer->status ? 'checked' : '' }} name="status"> Deactive <span></span></label>
                        </div>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
                <div class="kt-portlet__foot">
                    <div class="kt-form__actions">
                        <button type="submit" class="btn btn-success">Update</button>
                        <a href="{{ route('backend.customers') }}" class="btn btn-secondary">Cancel</a>
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

@endpush
