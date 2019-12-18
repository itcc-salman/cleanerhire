<div class="book_form_tab">
    @if( !is_null($services) )
    <label>Which type of cleaning service do you need?</label>
    <div class="book_service">
        <ul>
            @foreach( $services as $service )
                <li>
                    <label>
                        <input type="checkbox" name="services[]" id="service_{{ $service->id }}" value="{{ $service->id }}">
                        <i class="fa fa-check-circle"></i> <span>{{ $service->name }}</span>
                    </label>
                </li>
            @endforeach
        </ul>
    </div>
    @else
    <h2>No Services Found.</h2>
    @endif
</div>
<div class="book_form_tab">
    <label>Where should we visit?</label>
    <input type="text" class="form-control" name="address">
</div>
<div class="book_form_tab">
    <label>How regularly should we visit?</label>
    <div class="bac_offer_tabs">
        <div class="bac_offer_tab offer_one">
            <h3>POPULAR!</h3>
            <div class="bac_price">
                <label>Regular</label>
                <span>$35 <small>$/ph</small></span>
            </div>
            <ul>
                <li><i class="fa fa-check" aria-hidden="true"></i><span>Same, fully vetted housekeeper each visit</span></li>
                <li><i class="fa fa-check" aria-hidden="true"></i><span>Free cancellation up to 48h before each appointment</span></li>
                <li><i class="fa fa-check" aria-hidden="true"></i><span>No minimum contract period – service only if you’re 100% happy!</span></li>
            </ul>
            <div class="bac_offer_button">
                <a href="javascript:void(0);" class="active">Weekly</a>
                <a href="javascript:void(0);">Fortnightly</a>
            </div>
        </div>
        <div class="bac_offer_tab offer_two">
            <h3></h3>
            <div class="bac_price">
                <label>Once-Off</label>
                <span>$45 <small>$/ph</small></span>
            </div>
            <ul>
                <li><i class="fa fa-check" aria-hidden="true"></i><span>One-off cleaning</span></li>
                <li><i class="fa fa-check" aria-hidden="true"></i><span>All housekeepers on our platform are rated at least 4.2 stars</span></li>
            </ul>
            <div class="bac_offer_button">
                <a href="javascript:void(0);">Just once</a>
            </div>
        </div>
    </div>
</div>

<div class="book_form_tab">
    <label>How long should we visit (at $35 per hour)?</label>
    <div id="duration_div">
        @foreach(getDuration() as $k => $duration)
            <div>
                <label>
                    <input type="radio" name="duration" value="{{ $k }}">
                    <span>{{ $duration }}</span>
                    <strong>hours</strong>
                </label>
            </div>
        @endforeach
    </div>
</div>

<div class="book_form_tab">
    <label>How long should we visit (at $35 per hour)?</label>
    <div id="datepicker" class="ll-skin-melon"></div>
</div>
