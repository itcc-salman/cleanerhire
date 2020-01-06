<div class="book_form_tab">
    @if( !$services->isEmpty() )
    <label class="bft_question">Which type of cleaning service do you need?</label>
    <div class="book_service">
        <ul>
            @foreach( $services as $service )
                <li>
                    <input type="checkbox" name="services[]" id="service_{{ $service->id }}" value="{{ $service->id }}">
                    <label for="service_{{ $service->id }}"><i class="fa fa-check-circle"></i> <span>{{ $service->name }}</span></label>
                </li>
            @endforeach
        </ul>
    </div>
    @else
    <h2>No Services Found.</h2>
    @endif
</div>
@if( !$services->isEmpty() )
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
                <input id="street_number" name="address_line_1" placeholder="Street No" type="text" value="">
            </div>
        </div>
        <div class="col-md-6">
            <div class="book_form_tab">
                <label for="route">Street Name<span class="text-danger">&nbsp;*</span></label>
                <input id="route" name="address_line_2" placeholder="Street Name" type="text" value="">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="book_form_tab">
                <label for="locality">Suburb<span class="text-danger">&nbsp;*</span></label>
                <input id="locality" name="city" placeholder="Suburb" type="text" value="">
            </div>
        </div>
        <div class="col-md-6">
            <div class="book_form_tab">
                <label for="administrative_area_level_1">State<span class="text-danger">&nbsp;*</span></label>
                <input id="administrative_area_level_1" name="state" placeholder="State" type="text" value="">
                <input id="country" name="country" placeholder="Country" type="hidden" value="Australia">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="book_form_tab">
                <label for="postal_code">Postal Code<span class="text-danger">&nbsp;*</span></label>
                <input id="postal_code" name="postal_code" placeholder="Postal Code" type="text" value="">
            </div>
        </div>
    </div>
    {{-- <input type="text" id="autocomplete" class="form-control" onFocus="geolocate()" name="address"> --}}
</div>
<div class="book_form_tab">
    <label class="bft_question">How regularly should we visit?</label>
    <div class="bac_offer_tabs">
        <div class="bac_offer_tab offer_one">
            <h3>POPULAR!</h3>
            <div class="bac_price">
                <label>Regular</label>
                <span>$35 <small>$/ph</small></span>
            </div>
            {{-- <ul>
                <li><i class="fa fa-check" aria-hidden="true"></i><span>Same, fully vetted housekeeper each visit</span></li>
                <li><i class="fa fa-check" aria-hidden="true"></i><span>Free cancellation up to 48h before each appointment</span></li>
                <li><i class="fa fa-check" aria-hidden="true"></i><span>No minimum contract period – service only if you’re 100% happy!</span></li>
            </ul> --}}
            <div class="bac_offer_button">
                <div class="bac_button_tab">
                    <input id="weekly" type="radio" name="visit_type" value="weekly">
                    <label for="weekly">Weekly</label>
                </div>
                <div class="bac_button_tab">
                    <input id="fortnightly" type="radio" name="visit_type" value="forthnight">
                    <label for="fortnightly">Fortnightly</label>
                </div>
            </div>
        </div>
        <div class="bac_offer_tab offer_two">
            <h3></h3>
            <div class="bac_price">
                <label>Once-Off</label>
                <span>$45 <small>$/ph</small></span>
            </div>
            {{-- <ul>
                <li><i class="fa fa-check" aria-hidden="true"></i><span>One-off cleaning</span></li>
                <li><i class="fa fa-check" aria-hidden="true"></i><span>All housekeepers on our platform are rated at least 4.2 stars</span></li>
            </ul> --}}
            <div class="bac_offer_button">
                <div class="bac_button_tab">
                    <input id="justonce" type="radio" name="visit_type" value="once">
                    <label for="justonce">Just once</label>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="book_form_tab">
    <label class="bft_question">How long should we visit (at $35 per hour)?</label>
    <div id="duration_div" class="book_duration_time">
        @foreach(getDuration() as $k => $duration)
            <div class="book_dt_tab">
                <input id="booking_{{ $k }}" type="radio" name="duration" value="{{ $k }}">
                <label for="booking_{{ $k }}">
                    <span>{{ $duration }}</span>
                    <strong>hours</strong>
                </label>
            </div>
        @endforeach
    </div>
</div>

<div class="book_form_tab">
    <label>What date should we visit?</label>
    <div id="datepicker" class="ll-skin-melon"></div>
    <input type="hidden" name="booking_date" id="booking_date">
</div>

<div class="book_form_tab">
    <label>And what time?</label>
    <div id="time_div" class="book_duration_time">
        @foreach(getTime() as $time)
            <div class="book_dt_tab">
                <input id="booking_time{{ $time['val'] }}" type="radio" name="booking_time" value="{{ $time['val'] }}">
                <label for="booking_time{{ $time['val'] }}">
                    <span>{{ $time['show'] }}</span>
                    <strong>{{ $time['am_pm'] }}</strong>
                </label>
            </div>
        @endforeach
    </div>
</div>

<div class="bac_footer_step">
    <div class="bac_comman_tab">
        <label>Do you prefer a male or female butler?</label>
        <div class="check_main">
            <label class="m_check">
                <span>Male</span>
                <input type="radio" name="gender_pref" value="male">
                <span class="checkmark"></span>
            </label>
            <label class="m_check">
                <span>Female</span>
                <input type="radio" name="gender_pref" value="female">
                <span class="checkmark"></span>
            </label>
            <label class="m_check">
                <span>No Preference</span>
                <input type="radio" name="gender_pref" value="none">
                <span class="checkmark"></span>
            </label>
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

<div class="bac_footer_step">
    <a href="javascript:void(0);" id="booking_submit_btn">Next</a>
</div>
<script src="https://maps.googleapis.com/maps/api/js?key={{ config('settings.googlePlacesAPIKey') }}&libraries=places&callback=initAutocomplete"></script>
@endif
