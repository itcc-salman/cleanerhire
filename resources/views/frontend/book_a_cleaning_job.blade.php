@extends('frontend.layouts.master')
@section('content')
<!--Web_Inner_Banner-->
<div class="web_innerpage_section">
    <div class="container">
        <div class="inner_banner">
            <h2>Book a Cleaner</h2>
        </div>

        <div class="innerpage_section_head">
            <div class="head_a"></div>
            <div class="head_b"></div>
            <div class="head_c"></div>
            <div class="head_d"></div>
        </div>

        <div class="innerpage_section">
            <div class="row">
                <div class="col-md-8 col-sm-8 col-xs-8">
                    <div class="book_form_left">
                        <div class="book_form_tab " id="tab1">
                            <label>Which type of cleaning service do you need?</label>
                            <div class="book_service">
                                <ul>
                                    <li><a href="javascript:void(0);"><i class="fa fa-check-circle"></i> <span>Full House Cleaning</span></a></li>
                                    <li><a href="javascript:void(0);"><i class="fa fa-check-circle"></i> <span>End of Lease Cleaning</span></a></li>
                                    <li><a href="javascript:void(0);"><i class="fa fa-check-circle"></i> <span>Steam/Carpet Cleaning</span></a></li>
                                    <li><a href="javascript:void(0);"><i class="fa fa-check-circle"></i> <span>Grout Cleaning</span></a></li>
                                    <li><a href="javascript:void(0);"><i class="fa fa-check-circle"></i> <span>Window Cleaning</span></a></li>
                                    <li><a href="javascript:void(0);"><i class="fa fa-check-circle"></i> <span>Oven Cleaning</span></a></li>
                                    <li><a href="javascript:void(0);"><i class="fa fa-check-circle"></i> <span>Refrigerator Cleaning</span></a></li>
                                    <li><a href="javascript:void(0);"><i class="fa fa-check-circle"></i> <span>Stripping and Sealing</span></a></li>
                                    <li><a href="javascript:void(0);"><i class="fa fa-check-circle"></i> <span>Duct Cleaning</span></a></li>
                                    <li><a href="javascript:void(0);"><i class="fa fa-check-circle"></i> <span>Office Cleaning</span></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="book_form_tab hidden" id="tab2">
                            <label>What type of job is this?</label>
                            <div class="book_job">
                                <ul>
                                    <li><a href="javascript:void(0);"><i class="fa fa-home" aria-hidden="true"></i> <span>Residential</span></a></li>
                                    <li><a href="javascript:void(0);"><i style="font-size:24px;" class="fa fa-industry" aria-hidden="true"></i> <span>Commercial</span></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="book_form_tab hidden" id="tab3">
                            <label>How many storeys off the ground are these gutters?</label>
                            <div class="quntity_number">
                                <span class="minus"><i class="fa fa-minus-circle" aria-hidden="true"></i></span>
                                <input type="text" value="1"/>
                                <span class="plus"><i class="fa fa-plus-circle" aria-hidden="true"></i></span>
                            </div>
                        </div>
                        <div class="book_form_tab hidden" id="tab4">
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
                        <div class="book_form_tab hidden" id="tab5">
                            <label>How many of these rooms do you need cleaned?</label>
                            <div class="quntity_number">
                                <p>Number of bathrooms</p>
                                <span class="minus"><i class="fa fa-minus-circle" aria-hidden="true"></i></span>
                                    <input type="text" value="1"/>
                                <span class="plus"><i class="fa fa-plus-circle" aria-hidden="true"></i></span>
                            </div>
                            <div class="quntity_number">
                                <p>Number of bedrooms</p>
                                <span class="minus"><i class="fa fa-minus-circle" aria-hidden="true"></i></span>
                                    <input type="text" value="1"/>
                                <span class="plus"><i class="fa fa-plus-circle" aria-hidden="true"></i></span>
                            </div>
                        </div>
                        <div class="bac_footer_step hidden" id="tab6">
                            <div class="bac_comman_tab">
                                <label>Do you have any pets?</label>
                                <div class="check_main">
                                    <label class="m_check">
                                        <span>One</span>
                                        <input type="checkbox" checked="checked">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="m_check">
                                        <span>Two</span>
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="m_check">
                                        <span>Three</span>
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="m_check">
                                        <span>Four</span>
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <input placeholder="Other (Please specify)" type="text" id="" >
                            </div>
                        </div>
                        <div class="bac_footer_step hidden" id="tab7">
                            <a href="javascript:void(0);">Next</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="bac_booking_summary" id="sticky">
                        <h3>Your Booking Summary</h3>
                        <div class="bac_bs_tabs">
                            <div class="bac_bs_tab">
                                <label>First Visit : </label>
                                <span>N/A</span>
                            </div>
                            <div class="bac_bs_tab">
                                <label>Visit length : </label>
                                <span>N/A</span>
                            </div>
                            <div class="bac_bs_tab">
                                <label>Address :</label>
                                <span>N/A</span>
                            </div>
                            <div class="bac_bs_tab">
                                <label> Ongoing Frequency :</label>
                                <span>Weekly</span>
                            </div>
                        </div>
                        <div class="bac_bs_total">
                            <label>TOTAL</label>
                            <span>$0 <small>per visit</small></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Web_Innerpage_Section-->
@endsection
