<div class="row">
    <div class="col-xl-12">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">Service Areas <small>update your service areas</small></h3>
                </div>
            </div>
            <form class="kt-form kt-form--label-right" id="service_area">
                <div class="kt-portlet__body">
                    <div class="kt-section kt-section--first">
                        <div class="kt-section__body">
                            <div class="row">
                                <div class="form-group wd-100">
                                    <label>Add Service areas with radius in kilometer</label>
                                    <div class="form-group row">
                                        <div class="col-lg-8">
                                            <input type="text" name="suburb" id="suburb" class="form-control" placeholder="Search suburb">
                                        </div>
                                    </div>
                                    <div id="kt_repeater_service_areas">
                                        @php $counter = 1 @endphp
                                        @if( !$data->isEmpty() )
                                            @foreach( $data as $d )
                                            <div class="form-group" id="service_area_{{ $counter }}">
                                                <div class="row kt-margin-b-10">
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control form-control-danger" readonly name="suburb_name_{{ $counter }}" value="{{ $d->suburb_name }}">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control form-control-danger" name="area_in_km_{{ $counter }}" value="{{ $d->area_in_km }}" placeholder="Area Radius(kms)" required>
                                                        <input type="hidden" name="latitude_{{ $counter }}" value="{{ $d->latitude }}">
                                                        <input type="hidden" name="longitude_{{ $counter }}" value="{{ $d->longitude }}">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <a href="javascript:;" onclick="removeServiceArea('{{ $counter }}');" class="btn btn-danger btn-icon"><i class="la la-remove"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            @php $counter++ @endphp
                                            @endforeach
                                        @endif
                                    </div>
                                    <input type="hidden" name="service_area_counter" id="service_area_counter" value="{{ $counter }}">

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="kt-portlet__foot">
                    <div class="kt-form__actions">
                        <div class="row">
                            <div class="col-lg-9 col-xl-9">
                                <button type="submit" id="update_service_area" class="btn btn-success">Update</button>&nbsp;
                                {{-- <button type="reset" class="btn btn-secondary">Cancel</button> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    var placeSearch, autocomplete;
    var componentForm = {
        locality: 'long_name'
    };
    var counter = {{ $counter }};

    function initAutocomplete() {
        var options = {
            types: ['(cities)'],
            componentRestrictions: {country: ['au', 'nz']}
        };
        autocomplete = new google.maps.places.Autocomplete(
        document.getElementById('suburb'), options);
        autocomplete.setFields(['address_component','geometry']);
        autocomplete.addListener('place_changed', fillInAddress);
    }

    function fillInAddress() {
        var place = autocomplete.getPlace();
        console.log(place);
        if(place.address_components[0].types[0] == 'locality' || place.address_components[0].types[1] == 'locality'){
            var latitude = place.geometry.location.lat();
            var longitude = place.geometry.location.lng();
            var divInnerHtml = '<div class="form-group" id="service_area_'+counter+'"><div class="row kt-margin-b-10"><div class="col-md-4"><input type="text" class="form-control form-control-danger" readonly name="suburb_name_'+counter+'" value="'+place.address_components[0].long_name+'"></div><div class="col-md-4"><input type="text" class="form-control form-control-danger" name="area_in_km_'+counter+'" placeholder="Area Radius(kms)" required><input type="hidden" name="latitude_'+counter+'" value="'+latitude+'"><input type="hidden" name="longitude_'+counter+'" value="'+longitude+'"></div><div class="col-md-4"><a href="javascript:;" onclick="removeServiceArea('+counter+');" class="btn btn-danger btn-icon"><i class="la la-remove"></i></a></div></div></div>'
            $("#kt_repeater_service_areas").append(divInnerHtml);
            $("#service_area_counter").val(counter);
            counter++;
            $("#suburb").val('');
        }
    }

    function removeServiceArea(id){
        $('#service_area_' + id).remove();
    }

</script>
<script src="https://maps.googleapis.com/maps/api/js?key={{ config('settings.googlePlacesAPIKey') }}&libraries=places&callback=initAutocomplete"></script>

