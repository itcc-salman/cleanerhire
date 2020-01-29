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
                            @if( \Auth::user()->role == 'cleaner' )
                                <div class="row">
                                    <label class="col-xl-3"></label>
                                    <div class="col-lg-9 col-xl-6">
                                        <h3 class="kt-section__title kt-section__title-sm">@lang('labels.residential'):</h3>
                                    </div>
                                </div>
                                <div class="row">
                                    @foreach( $data['services'] as $service )
                                    @if( $service->service_type == 'regular' || $service->service_type == 'once_off' || $service->service_type == 'end_of_lease' )
                                    <div class="col-6">
                                        <div class="form-group">
                                            <div class="kt-checkbox-list">
                                                <div class="kt-option kt-p10 col-12 d-block">
                                                    <label class="kt-checkbox kt-checkbox--tick kt-checkbox--brand kt-margin-0">
                                                        <input class="cleaner-services-checkbox" name="cleaner_services[]" {{ $data['cleaner_services']->contains(function($value, $key) use ($service) {
                                                            if( $value['cleaning_service_id'] == $service->id ) { return true; }
                                                            return false;
                                                        }) ? 'checked' : '' }} value="{{ $service->id }}" type="checkbox">{{ $service->name }}<span></span>
                                                    </label>
                                                    <div class="form-group kt-mb-5 kt-mt-5 {{ $data['cleaner_services']->contains(function($value, $key) use ($service) {
                                                            if( $value['cleaning_service_id'] == $service->id ) { return true; }
                                                            return false;
                                                        }) ? '' : 'd-none' }}" id="service_{{ $service->id }}">
                                                        <label>You should have relevant equipments for this service</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                                <div class="row">
                                    <label class="col-xl-3"></label>
                                    <div class="col-lg-9 col-xl-6">
                                        <h3 class="kt-section__title kt-section__title-sm">Other:</h3>
                                    </div>
                                </div>
                                <div class="row">
                                    @foreach( $data['services'] as $service )
                                    @if( is_null($service->service_type) || $service->service_type == 'other' )
                                    <div class="col-6">
                                        <div class="form-group">
                                            <div class="kt-checkbox-list">
                                                <div class="kt-option kt-p10 col-12 d-block">
                                                    <label class="kt-checkbox kt-checkbox--tick kt-checkbox--brand kt-margin-0">
                                                        <input class="cleaner-services-checkbox" name="cleaner_services[]" {{ $data['cleaner_services']->contains(function($value, $key) use ($service) {
                                                            if( $value['cleaning_service_id'] == $service->id ) { return true; }
                                                            return false;
                                                        }) ? 'checked' : '' }} value="{{ $service->id }}" type="checkbox">{{ $service->name }}<span></span>
                                                    </label>
                                                    <div class="form-group kt-mb-5 kt-mt-5 {{ $data['cleaner_services']->contains(function($value, $key) use ($service) {
                                                            if( $value['cleaning_service_id'] == $service->id ) { return true; }
                                                            return false;
                                                        }) ? '' : 'd-none' }}" id="service_{{ $service->id }}">
                                                        <label>You should have relevant equipments for this service</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                            @endif

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

                            @if( \Auth::user()->role == 'company' )
                            <div class="row">
                                <label class="col-xl-3"></label>
                                <div class="col-lg-9 col-xl-6">
                                    <h3 class="kt-section__title kt-section__title-sm">@lang('labels.commercial'):</h3>
                                </div>
                            </div>

                            <div class="row">
                                @foreach( $data['services'] as $service )
                                <div class="col-6">
                                    <div class="form-group">
                                        <div class="kt-checkbox-list">
                                            <div class="kt-option kt-p10 col-12 d-block">
                                                <label class="kt-checkbox kt-checkbox--tick kt-checkbox--brand kt-margin-0">
                                                    <input class="cleaner-services-checkbox" name="cleaner_services[]" {{ $data['cleaner_services']->contains(function($value, $key) use ($service) {
                                                        if( $value['cleaning_service_id'] == $service->id ) { return true; }
                                                        return false;
                                                    }) ? 'checked' : '' }} value="{{ $service->id }}" type="checkbox">{{ $service->name }}<span></span>
                                                </label>
                                                <div class="form-group kt-mb-5 kt-mt-5 {{ $data['cleaner_services']->contains(function($value, $key) use ($service) {
                                                        if( $value['cleaning_service_id'] == $service->id ) { return true; }
                                                        return false;
                                                    }) ? '' : 'd-none' }}" id="service_{{ $service->id }}">
                                                    <label>You should have relevant equipments for this service</label>
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
