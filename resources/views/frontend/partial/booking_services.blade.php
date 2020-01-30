<div class="book_form_tab">
    @if( !$services->isEmpty() )
    <label class="bft_question">Which type of cleaning service do you need?</label>
    <div class="book_service">
        <div class="row">
            @foreach( $services as $service )
            @if( $service->service_type == 'regular' || $service->service_type == 'once_off' || $service->service_type == 'end_of_lease' )
                <div class="col-md-3">
                    <div class="book_service_tab">
                        <input type="radio" name="service" id="service_{{ $service->id }}" value="{{ $service->id }}" amount="{{ $service->rate_per_hour }}" min_hours="{{ $service->minimum_service_hours }}" service_type="{{ $service->service_type }}">
                        <label for="service_{{ $service->id }}"><i class="fa fa-check-circle"></i> <span>{{ $service->name }}</span></label>
                    </div>
                </div>
            @endif
            @endforeach
            <div class="col-md-3">
                <div class="book_service_tab">
                    <input type="radio" name="service" id="service_other" value="other" service_type="other">
                    <label for="service_other"><i class="fa fa-check-circle"></i> <span>Other Services</span></label>
                    <ul>
                        @foreach( $services as $service )
                        @if( $service->service_type == 'other' || is_null($service->service_type) )
                            <li>
                                <input type="checkbox" name="sub_services[]" id="sub_service_{{ $service->id }}" value="{{ $service->id }}" amount="{{ $service->rate_per_hour }}" service_other="{{ $service->price_calculation }}">
                                <label for="sub_service_{{ $service->id }}"><i class="fa fa-check-circle"></i> <span>{{ $service->name }}</span></label>
                            </li>
                        @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @else
    <h2>No Services Found.</h2>
    @endif
</div>
@if( !$services->isEmpty() )
    <div class="hide" id="normal_service">
        <div class="row">
            <div class="col-md-12">
                <div class="book_form_tab">
                    <label>How many hours will your cleaner be required?*</label>
                    <input type="text" onkeypress="return isNumberKey(event)" name="cleaning_hours" id="cleaning_hours">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="book_form_tab">
                    <label>Rooms to be cleaned?</label>
                    <input type="text" onkeypress="return isNumberKey(event)" name="cleaning_rooms" id="cleaning_rooms">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="book_form_tab">
                    <label>Bathrooms to be cleaned?</label>
                    <input type="text" onkeypress="return isNumberKey(event)" name="cleaning_bathrooms" id="cleaning_bathrooms">
                </div>
            </div>
        </div>
    </div>

    <div class="hide" id="carpet_cleaning">
        <div class="row">
            <div class="col-md-12">
                <div class="book_form_tab">
                    <label for="carpet_cleaning_rooms">Rooms to be cleaned?</label>
                    <input type="text" onkeypress="return isNumberKey(event)" name="carpet_cleaning_rooms" id="carpet_cleaning_rooms" value="1">
                </div>
            </div>
        </div>
    </div>

    <div class="hide" id="window_cleaning">
        <div class="row">
            <div class="col-md-12">
                <div class="book_form_tab">
                    <label for="window_panels">No of Panels to be cleaned?</label>
                    <input type="text" onkeypress="return isNumberKey(event)" name="window_panels" id="window_panels" value="1">
                </div>
            </div>
        </div>
    </div>

    <div class="hide" id="tile_group_cleaning">
        <div class="row">
            <div class="col-md-12">
                <div class="book_form_tab">
                    <label for="tile_sq_meter">How much Sq. Meter to be cleaned?</label>
                    <input type="text" onkeypress="return isNumberKey(event)" name="tile_sq_meter" id="tile_sq_meter" value="1">
                </div>
            </div>
        </div>
    </div>


    <div class="bac_footer_step">
        <div class="bac_comman_tab">
            <label>What date and time would you like your service?*</label>
            <div class="check_main">
                <label class="m_check">
                    <span>ASAP</span>
                    <input type="radio" name="services_date_type" id="services_date_type_asap" value="asap">
                    <span class="checkmark"></span>
                </label>
                <label class="m_check">
                    <span>Choose preferred date and time</span>
                    <input type="radio" name="services_date_type" id="services_date_type_preferred" value="preferred">
                    <span class="checkmark"></span>
                </label>
            </div>
        </div>
    </div>

    <div class="row hide" id="preferred_date_time_div">
        <div class="col-md-6">
            <label for="datepicker">Date</label>
            <input type="text" class="form-control" id="datepicker" name="booking_date">
        </div>
        <div class="col-md-6">
            <label for="booking_time">Time</label>
            <input type="text" id="booking_time" class="form-control clockpicker" data-align="top" data-autoclose="true" name="booking_time">
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="book_form_tab">
                <label>Please provide us more information about your preferred date and time</label>
                <textarea class="form-control" name="preferred_date_and_time"></textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="customer_name">Name*</label>
                <input type="text" class="form-control" name="customer_name" id="customer_name" value="{{ Auth::user()->first_name }}">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="customer_email">Email*</label>
                <input type="email" class="form-control" name="customer_email" id="customer_email" value="{{ Auth::user()->email }}">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="customer_phone">Phone*</label>
                <input type="text" class="form-control" onkeypress="return isNumberKey(event)" name="customer_phone" id="customer_phone" value="{{ $customer->phone }}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="book_form_tab">
                <label>Where should we visit?</label>
                <input id="autocomplete" placeholder="Search Address" onFocus="geolocate()" type="text"/>
                <input type="hidden" name="latitude" id="latitude" value="">
                <input type="hidden" name="longitude" id="longitude" value="">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="book_form_tab">
                <label for="street_number">Street No<span class="text-danger">&nbsp;*</span></label>
                <input id="street_number" name="address_line_1" readonly placeholder="Street No" type="text" value="">
            </div>
        </div>
        <div class="col-md-6">
            <div class="book_form_tab">
                <label for="route">Street Name<span class="text-danger">&nbsp;*</span></label>
                <input id="route" name="address_line_2" readonly placeholder="Street Name" type="text" value="">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="book_form_tab">
                <label for="locality">Suburb<span class="text-danger">&nbsp;*</span></label>
                <input id="locality" name="city" readonly placeholder="Suburb" type="text" value="">
            </div>
        </div>
        <div class="col-md-6">
            <div class="book_form_tab">
                <label for="administrative_area_level_1">State<span class="text-danger">&nbsp;*</span></label>
                <input id="administrative_area_level_1" readonly name="state" placeholder="State" type="text" value="">
                <input id="country" name="country" placeholder="Country" type="hidden" value="Australia">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="book_form_tab">
                <label for="postal_code">Postal Code<span class="text-danger">&nbsp;*</span></label>
                <input id="postal_code" name="postal_code" readonly placeholder="Postal Code" type="text" value="">
            </div>
        </div>
    </div>
    {{-- <input type="text" id="autocomplete" class="form-control" onFocus="geolocate()" name="address"> --}}
</div>
<div class="row">
    <div class="col-md-12">
        <div class="book_form_tab">
            <label>Any comments or questions?</label>
            <textarea class="form-control" name="comment"></textarea>
        </div>
    </div>
</div>

<div class="bac_footer_step">
    <div class="bac_comman_tab">
        <label>Do you have any pets?</label>
        <div class="check_main">
            <label class="m_check">
                <span>Cat</span>
                <input type="radio" name="has_pet" value="cat">
                <span class="checkmark"></span>
            </label>
            <label class="m_check">
                <span>Dog</span>
                <input type="radio" name="has_pet" value="dog">
                <span class="checkmark"></span>
            </label>
            <label class="m_check">
                <span>None</span>
                <input type="radio" name="has_pet" value="none">
                <span class="checkmark"></span>
            </label>
        </div>
        <input type="text" placeholder="Other (Please specify)" id="other_pet" name="has_pet_optional">
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <label for="card-element">Card</label>
        <div id="card-element"></div>

        <script>
          card.mount('#card-element');
        </script>
    </div>
</div>

<div class="bac_footer_step">
    <a href="javascript:void(0);" id="booking_submit_btn">Next</a>
</div>
<script src="https://maps.googleapis.com/maps/api/js?key={{ config('settings.googlePlacesAPIKey') }}&libraries=places&callback=initAutocomplete"></script>
@endif
