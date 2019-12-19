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
                    <form id="booking">
                        <div class="book_form_left">
                            <div class="book_form_tab">
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

                            <div id="property_list">
                            </div>

                            <div id="services_list">
                            </div>

                        </div>
                    </form>
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
        var placeSearch, autocomplete;

        var componentForm = {
          street_number: 'short_name',
          route: 'long_name',
          locality: 'long_name',
          administrative_area_level_1: 'short_name',
          country: 'long_name',
          postal_code: 'short_name'
        };

        function initAutocomplete() {
            var options = {
             componentRestrictions: {country: ['au', 'nz']}
             // types: ['geocode']
          };
          // Create the autocomplete object, restricting the search predictions to
          // geographical location types.
          autocomplete = new google.maps.places.Autocomplete(
              document.getElementById('autocomplete'), options);

          // Avoid paying for data that you don't need by restricting the set of
          // place fields that are returned to just the address components.
          autocomplete.setFields(['address_component']);

          // When the user selects an address from the drop-down, populate the
          // address fields in the form.
          autocomplete.addListener('place_changed', fillInAddress);
        }

        function fillInAddress() {
          // Get the place details from the autocomplete object.
          var place = autocomplete.getPlace();

          for (var component in componentForm) {
            document.getElementById(component).value = '';
            document.getElementById(component).disabled = false;
          }

          // Get each component of the address from the place details,
          // and then fill-in the corresponding field on the form.
          for (var i = 0; i < place.address_components.length; i++) {
            var addressType = place.address_components[i].types[0];
            if (componentForm[addressType]) {
              var val = place.address_components[i][componentForm[addressType]];
              document.getElementById(addressType).value = val;
            }
          }
        }

        // Bias the autocomplete object to the user's geographical location,
        // as supplied by the browser's 'navigator.geolocation' object.
        function geolocate() {
            if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
              var geolocation = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
              };
              var circle = new google.maps.Circle(
                  {center: geolocation, radius: position.coords.accuracy});
              autocomplete.setBounds(circle.getBounds());
            });
          }
        }

        function initBookingPage() {
            $("#duration_div").owlCarousel({
                items:5,
                itemsDesktop:[1000,5],
                itemsDesktopSmall:[979,5],
                itemsTablet:[768,5],
                // nav:true,
                pagination:true,
                autoPlay:false,
                // navText : ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>']
            });
            $("#time_div").owlCarousel({
                items:5,
                itemsDesktop:[1000,5],
                itemsDesktopSmall:[979,5],
                itemsTablet:[768,5],
                pagination:true,
                autoPlay:false
            });

            $('#datepicker').datepicker({
                format: 'dd/mm/yyyy',
                inline: true,
                showOtherMonths: true,
                closeOnSelect:false,
                minDate: 0,
                autoclose : false
            }).on('changeDate',function(e){
                // console.log(e.date);
                //on change of date on start datepicker, set end datepicker's date
                // $('.date-picker-end').datepicker('setStartDate',e.date)
            });
        }
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
                        // console.log(res);
                        if( res.status == true ) {
                            // make all empty
                            $('#services_list').empty();
                            $('#property_list').empty();
                            $('#'+res.where).html(res.html);
                            if( res.where == 'services_list' ) {
                                initBookingPage();
                            }
                        }
                    }
                }); // end ajax
            });

            $(document).on('change', "[name='properties']", function(e) {
                e.preventDefault();
                let _val = $("[name='properties']:checked").val();
                // get services as per selected service
                $.ajax({
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    url: '{{ route('front.get_services') }}',
                    type: "POST",
                    dataType: "JSON",
                    data: {
                        property_type: _val
                    },
                    success: function(res) {
                        // console.log(res);
                        if( res.status == true ) {
                            $('#'+res.where).empty().html(res.html);
                            initBookingPage();
                        }
                    }
                }); // end ajax
            });

            $(document).on('focus', '#other_pet', function(e) {
                // uncheck the radio button
                $("[name='has_pet']").prop("checked", false);
            });
        });
    </script>
@endpush
