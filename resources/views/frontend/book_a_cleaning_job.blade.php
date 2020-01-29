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
                    <form id="booking" method="POST">
                        <div class="book_form_left">
                            <div class="book_form_tab">
                                <label class="bft_question">What type of job is this?</label>
                                <div class="book_job">
                                    <ul>
                                        <li>
                                            <div class="md-radio md-radio-inline">
                                                <input type="radio" id="type_residential" name="service_type" value="residential">
                                                <label for="type_residential"><i class="fa fa-home" aria-hidden="true"></i> <span>Residential</span></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="md-radio md-radio-inline">
                                                <input type="radio" id="type_commercial" name="service_type" value="commercial">
                                                <label for="type_commercial"><i style="font-size:22px;" class="fa fa-industry" aria-hidden="true"></i> <span>Commercial</span></label>
                                            </div>
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
             componentRestrictions: {country: ['au']}
             // types: ['geocode']
          };
          // Create the autocomplete object, restricting the search predictions to
          // geographical location types.
          autocomplete = new google.maps.places.Autocomplete(
              document.getElementById('autocomplete'), options);

          // Avoid paying for data that you don't need by restricting the set of
          // place fields that are returned to just the address components.
          autocomplete.setFields(['address_component','geometry']);

          // When the user selects an address from the drop-down, populate the
          // address fields in the form.
          autocomplete.addListener('place_changed', fillInAddress);
        }

        function fillInAddress() {
          // Get the place details from the autocomplete object.
          var place = autocomplete.getPlace();
          var lat = place.geometry.location.lat();
          var lng = place.geometry.location.lng();

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
          $("#latitude").val(lat);
          $("#longitude").val(lng);
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
            $('#datepicker').datepicker({
                clearBtn: true,
                todayHighlight: true,
                startDate: new Date(),
                autoclose: true
            });
            $('.clockpicker').clockpicker();
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

            $(document).on('click', "[name='service']", function(e) {
                e.preventDefault();
                let _val = $("[name='service']:checked").attr('service_type');
                if( _val != 'other' ) {
                    $('#normal_service').removeClass('hide');
                } else {
                    $('#normal_service').addClass('hide');
                }
            });

            $(document).on('click', "[name='services_date_type']", function(e) {
                let _val = $("[name='services_date_type']:checked").val();
                if( _val == 'preferred' ) {
                    $('#preferred_date_time_div').removeClass('hide');
                } else {
                    $('#preferred_date_time_div').addClass('hide');
                }
            });

            $(document).on('focus', '#other_pet', function(e) {
                // uncheck the radio button
                $("[name='has_pet']").prop("checked", false);
            });

            // submit the form
            $(document).on('click' , '#booking_submit_btn', function(e) {
                e.preventDefault();
                let _data = $('#booking').serialize();
                $.ajax({
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    url: '{{ route('front.add_booking') }}',
                    type: "POST",
                    dataType: "JSON",
                    data: _data,
                    success: function(res) {
                        if( res.status == true ) {
                            location.href = res.redirect;
                        } else {
                            alert(res.msg);
                        }
                    },
                    error: function(err) {
                        if( err.status == 422 ) {
                            // display errors on each form field
                            $.each(err.responseJSON.errors, function (i, error) {
                                // showToast(error[0], 0);
                                alert(error[0]);
                                return false;
                            });
                        }
                    }
                }); // end ajax
            });
        });
    </script>
@endpush
