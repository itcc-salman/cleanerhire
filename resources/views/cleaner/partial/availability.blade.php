<div class="row">
    <div class="col-xl-12">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">Availability <small>update your time</small></h3>
                </div>
            </div>
            <form class="kt-form kt-form--label-right" id="availability">
                <div class="kt-portlet__body">
                    <div class="kt-section kt-section--first">
                        <div class="kt-section__body">
                            <div class="row">
                                <label class="col-xl-3"></label>
                                <div class="col-lg-9 col-xl-6">
                                    <h3 class="kt-section__title kt-section__title-sm">Hours:</h3>
                                </div>
                            </div>

                            @foreach( getDays() as $day )
                            @php $days_count = 0 @endphp
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group">
                                        <label class="col-form-label">{{ ucfirst($day) }} </label>
                                        <span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--primary">
                                            <label>
                                                <input type="checkbox" {{ $data->contains(function($value, $key) use ($day) {
                                                    if( $value['day'] == $day ) { return true; }
                                                    return false;
                                                }) ? 'checked' : '' }} name="avail[]" id="avail_{{ $day }}" opened_day="{{ $day }}" value="{{ $day }}" class="switch_days">
                                                <span></span>
                                            </label>
                                        </span>
                                    </div>
                                </div>
                                @foreach($data as $d)
                                @if( $d->day == $day )
                                @php $days_count++ @endphp
                                <div class="col-9 {{ $d->day == $day ? '' : 'd-none' }}" id="main_{{ $day }}">
                                    <div class="form-group row">
                                        <div class="col-5">
                                            <select class="form-control from_hours" day="{{ $day }}" count="0" id="select_from_{{ $day }}_0" name="select_from_{{ $day }}[]">
                                                @foreach( getHours() as $hourKey => $hour )
                                                    <option value="{{ $hourKey }}" {{ $data->contains(function($value, $key) use ($day,$hourKey) {
                                                    if( $value['day'] == $day && $value['start_hours'] == $hourKey ) { return true; }
                                                    return false;
                                                }) ? 'selected' : '' }}>{{ $hour }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-5 {{ $data->contains(function($value, $key) use ($day,$hourKey) {
                                                    if( $value['day'] == $day && $value['start_hours'] != 24 ) { return true; }
                                                    return false;
                                                }) ? '' : 'd-none' }}" id="to_hours_div_{{ $day }}_0">
                                            <select class="form-control to_hours" id="select_to_{{ $day }}_0" name="select_to_{{ $day }}[]">
                                                @foreach( getHours() as $hourKey => $hour )
                                                    <option value="{{ $hourKey }}" {{ $data->contains(function($value, $key) use ($day,$hourKey) {
                                                    if( $value['day'] == $day && $value['end_hours'] == $hourKey ) { return true; }
                                                    return false;
                                                }) ? 'selected' : '' }}>{{ $hour }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-1 {{ $data->contains(function($value, $key) use ($day,$hourKey) {
                                                    if( $value['day'] == $day && $value['start_hours'] != 24 ) { return true; }
                                                    return false;
                                                }) ? '' : 'd-none' }}" id="add_btn_div_{{ $day }}_0">
                                            <span class="btn btn-brand add_hours" main="{{ $day }}" count="1">+</span>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                <div class="kt-portlet__foot">
                    <div class="kt-form__actions">
                        <div class="row">
                            <div class="col-lg-3 col-xl-3">
                            </div>
                            <div class="col-lg-9 col-xl-9">
                                <button type="submit" id="update_availability" class="btn btn-success">Update</button>&nbsp;
                                {{-- <button type="reset" class="btn btn-secondary">Cancel</button> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
