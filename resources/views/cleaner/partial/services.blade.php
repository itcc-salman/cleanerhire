<div class="row">
    <div class="col-xl-12">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">Services <small>select your services</small></h3>
                </div>
            </div>
            <form class="kt-form kt-form--label-right" id="services">
                <div class="kt-portlet__body">
                    <div class="kt-section kt-section--first">
                        <div class="kt-section__body">
                            <div class="row">
                                <label class="col-xl-3"></label>
                                <div class="col-lg-9 col-xl-6">
                                    <h3 class="kt-section__title kt-section__title-sm">@lang('labels.residential'):</h3>
                                </div>
                            </div>

                            <div class="row">
                                @foreach( $data['services']['residential'] as $service )
                                <div class="col-6">
                                    <div class="form-group">
                                        <div class="kt-checkbox-list">
                                            <div class="kt-option kt-p10 col-12 d-block">
                                                <label class="kt-checkbox kt-checkbox--tick kt-checkbox--brand kt-margin-0">
                                                    <input class="cleaner-services-checkbox" name="cleaner_services_residential[]" {{ $data['cleaner_services']->contains(function($value, $key) use ($service) {
                                                        if( $value['cleaning_service_id'] == $service->id && $value['service_for'] == 'residential' ) { return true; }
                                                        return false;
                                                    }) ? 'checked' : '' }} value="{{ $service->id }}" type="checkbox">{{ $service->name }}<span></span>
                                                </label>
                                                <div class="form-group kt-mb-5 kt-mt-5 {{ $data['cleaner_services']->contains(function($value, $key) use ($service) {
                                                        if( $value['cleaning_service_id'] == $service->id && $value['service_for'] == 'residential' ) { return true; }
                                                        return false;
                                                    }) ? '' : 'd-none' }}" id="service_{{ $service->id }}">
                                                    @if( \Auth::user()->role == 'company' )
                                                    <div class="form-group">
                                                        <label>Rate per hour</label>
                                                        <?php $rate = $service->rate_per_hour;
                                                        foreach( $data['cleaner_services'] as $cleaner_service ) {
                                                            if( $cleaner_service['cleaning_service_id'] == $service->id && $cleaner_service['service_for'] == 'residential' && $cleaner_service['rate_per_hour'] > 0 ) {
                                                                $rate = $cleaner_service['rate_per_hour'];
                                                            }
                                                        }
                                                        ?>
                                                        <input type="text" name="rate_per_hour_{{ $service->id }}" class="form-control" value="{{ $rate }}">
                                                    </div>
                                                    @endif
                                                    <label>Do you have relevant equipments?</label>
                                                    <div class="kt-radio-inline">
                                                        <label class="kt-radio kt-radio--tick kt-radio--brand">
                                                            <input type="radio" value="1" {{ $data['cleaner_services']->contains(function($value, $key) use ($service) {
                                                        if( $value['cleaning_service_id'] == $service->id && $value['service_for'] == 'residential' &&  $value['has_equipments'] ) { return true; }
                                                        return false;
                                                    }) ? 'checked' : '' }} name="has_equipment_residential_{{ $service->id }}"> Yes <span></span>
                                                        </label>
                                                        <label class="kt-radio kt-radio--tick kt-radio--brand">
                                                            <input type="radio" value="0" {{ $data['cleaner_services']->contains(function($value, $key) use ($service) {
                                                        if( $value['cleaning_service_id'] == $service->id && $value['service_for'] == 'residential' && !$value['has_equipments'] ) { return true; }
                                                        return false;
                                                    }) ? 'checked' : '' }} name="has_equipment_residential_{{ $service->id }}"> No <span></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>


                            @if( !is_null($data['cleaner_properties']) && \Auth::user()->role == 'company' )
                            <div class="row">
                                <label class="col-xl-3"></label>
                                <div class="col-lg-9 col-xl-6">
                                    <h3 class="kt-section__title kt-section__title-sm">@lang('labels.properties'):</h3>
                                </div>
                            </div>

                            @php
                            $cleaner_properties = [];
                            if($data['cleaner']->cleaner_properties != ''){
                                $cleaner_properties = explode(',', $data['cleaner']->cleaner_properties);
                            }
                            @endphp

                            <div class="row">
                                @foreach( $data['cleaner_properties'] as $property )
                                <div class="col-6">
                                    <div class="form-group">
                                        <div class="kt-checkbox-list">
                                            <div class="kt-option kt-p10 col-12 d-block">
                                                <label class="kt-checkbox kt-checkbox--tick kt-checkbox--brand kt-margin-0">
                                                    <input class="" name="cleaner_properties[]" value="{{ $property->id }}" @if(in_array($property->id, $cleaner_properties) ) checked @endif type="checkbox">{{ $property->name }}<span></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @endif

                            @if( !is_null($data['services']['commercial']) )
                            <div class="row">
                                <label class="col-xl-3"></label>
                                <div class="col-lg-9 col-xl-6">
                                    <h3 class="kt-section__title kt-section__title-sm">@lang('labels.commercial'):</h3>
                                </div>
                            </div>

                            <div class="row">
                                @foreach( $data['services']['commercial'] as $service )
                                <div class="col-6">
                                    <div class="form-group">
                                        <div class="kt-checkbox-list">
                                            <div class="kt-option kt-p10 col-12 d-block">
                                                <label class="kt-checkbox kt-checkbox--tick kt-checkbox--brand kt-margin-0">
                                                    <input class="cleaner-services-checkbox-commercial" name="cleaner_services_commercial[]" {{ $data['cleaner_services']->contains(function($value, $key) use ($service) {
                                                        if( $value['cleaning_service_id'] == $service->id && $value['service_for'] == 'commercial' ) { return true; }
                                                        return false;
                                                    }) ? 'checked' : '' }} value="{{ $service->id }}" type="checkbox">{{ $service->name }}<span></span>
                                                </label>
                                                <div class="form-group kt-mb-5 kt-mt-5 {{ $data['cleaner_services']->contains(function($value, $key) use ($service) {
                                                        if( $value['cleaning_service_id'] == $service->id && $value['service_for'] == 'commercial' ) { return true; }
                                                        return false;
                                                    }) ? '' : 'd-none' }}" id="service_commercial_{{ $service->id }}">
                                                    <div class="form-group">
                                                        <label>Rate per hour</label>
                                                        <?php $rate = $service->rate_per_hour;
                                                        foreach( $data['cleaner_services'] as $cleaner_service ) {
                                                            if( $cleaner_service['cleaning_service_id'] == $service->id && $cleaner_service['service_for'] == 'commercial' && $cleaner_service['rate_per_hour'] > 0 ) {
                                                                $rate = $cleaner_service['rate_per_hour'];
                                                            }
                                                        }
                                                        ?>
                                                        <input type="text" name="rate_per_hour_commercial_{{ $service->id }}" class="form-control" value="{{ $rate }}">
                                                    </div>
                                                    <label>Do you have relevant equipments?</label>
                                                    <div class="kt-radio-inline">
                                                        <label class="kt-radio kt-radio--tick kt-radio--brand">
                                                            <input type="radio" value="1" {{ $data['cleaner_services']->contains(function($value, $key) use ($service) {
                                                        if( $value['cleaning_service_id'] == $service->id && $value['service_for'] == 'commercial' && $value['has_equipments'] ) { return true; }
                                                        return false;
                                                    }) ? 'checked' : '' }} name="has_equipment_commercial_{{ $service->id }}"> Yes <span></span>
                                                        </label>
                                                        <label class="kt-radio kt-radio--tick kt-radio--brand">
                                                            <input type="radio" value="0" {{ $data['cleaner_services']->contains(function($value, $key) use ($service) {
                                                        if( $value['cleaning_service_id'] == $service->id && $value['service_for'] == 'commercial' && !$value['has_equipments'] ) { return true; }
                                                        return false;
                                                    }) ? 'checked' : '' }} name="has_equipment_commercial_{{ $service->id }}"> No <span></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            @endif

                        </div>
                    </div>
                </div>
                <div class="kt-portlet__foot">
                    <div class="kt-form__actions">
                        <div class="row">
                            <div class="col-lg-9 col-xl-9">
                                <button type="submit" id="update_services" class="btn btn-success">Update</button>&nbsp;
                                {{-- <button type="reset" class="btn btn-secondary">Cancel</button> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
