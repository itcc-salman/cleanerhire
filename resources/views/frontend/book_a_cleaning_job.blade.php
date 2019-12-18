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
                            <label>What type of job is this?</label>
                            <div class="book_job">
                                <ul>
                                    <li>
                                        <label>
                                            <input type="radio" class="service_type_input" id="type_residential" name="service_type" value="residential">
                                            <i class="fa fa-home" aria-hidden="true"></i> <span>Residential</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="radio" class="service_type_input" id="type_commercial" name="service_type" value="commercial">
                                            <i style="font-size:24px;" class="fa fa-industry" aria-hidden="true"></i> <span>Commercial</span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div id="services_list">
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
@push('scripts')
    <script>
        $(document).ready(function() {

            $(document).on('change', "[name='service_type']", function(e) {
                e.preventDefault();
                let _val = $("[name='service_type']:checked").val();
                // get services as per selected service
                $.ajax({
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    url: '{{ route('front.get_services') }}',
                    type: "POST",
                    dataType: "JSON",
                    data: {
                        service_type: _val
                    },
                    success: function(res) {
                        console.log(res);
                        if( res.status == true ) {
                            $('#services_list').empty().html(res.html);
                            $("#duration_div").owlCarousel({
                                items:5,
                                itemsDesktop:[1000,5],
                                itemsDesktopSmall:[979,5],
                                itemsTablet:[768,5],
                                pagination:true,
                                autoPlay:false
                            });
                            $("#time_div").owlCarousel({
                                items:5,
                                itemsDesktop:[1000,5],
                                itemsDesktopSmall:[979,5],
                                itemsTablet:[768,5],
                                pagination:true,
                                autoPlay:false
                            });


                            $('#datepicker').multiDatesPicker({
                                format: 'dd/mm/yyyy',
                                numberOfMonths: 2,
                                inline: true,
                                showOtherMonths: true,
                                closeOnSelect:false,
                                selectMultiple:true,
                                minDate: 0,
                                autoclose : true
                            }).on('changeDate',function(e){
                                //on change of date on start datepicker, set end datepicker's date
                                // $('.date-picker-end').datepicker('setStartDate',e.date)
                            });

                        }
                    }
                }); // end ajax
            });

            $(document).on('focus', '#other_pet', function(e) {
                // uncheck the radio button
                $("[name='has_pet']"). prop("checked", false);
            });
        });
    </script>
@endpush
