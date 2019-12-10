<div class="kt-wizard-v1__form">
    @foreach( getDays() as $day )
    <div class="row form-group">

        <label class="col-2 col-form-label">{{ ucfirst($day) }} </label>
        <span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--primary">
            <label>
                <input type="checkbox" name="avail[]" id="avail_{{ $day }}" opened_day="{{ $day }}" value="{{ $day }}" class="switch_days">
                <span></span>
            </label>
        </span>

        <div class="col-9 d-none" id="main_{{ $day }}">
            <div class="row">
                <div class="col-5">
                    <select class="form-control from_hours" day="{{ $day }}" count="0" id="select_from_{{ $day }}_0" name="select_from_{{ $day }}[]">
                        @foreach( getHours() as $hourKey => $hour )
                            <option value="{{ $hourKey }}">{{ $hour }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-5 d-none" id="to_hours_div_{{ $day }}_0">
                    <select class="form-control to_hours" id="select_to_{{ $day }}_0" name="select_to_{{ $day }}[]">
                        @foreach( getHours() as $hourKey => $hour )
                            <option value="{{ $hourKey }}">{{ $hour }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-1 d-none" id="add_btn_div_{{ $day }}_0">
                    <span class="btn btn-brand add_hours" main="{{ $day }}" count="1">+</span>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@push('scripts')
<script>
    $(document).ready(function() {
        // Availability
        $('body').on('change', '.switch_days', function(e) {
            let _opened_day = $(this).attr('opened_day');
            if(this.checked) {
                // show dropdown for hours
                $('#main_'+_opened_day).removeClass('d-none');
            } else {
                // hide dropdown for hours
                $('#main_'+_opened_day).addClass('d-none');
            }
        });

        $('body').on('change', '.from_hours', function(e) {
            let _val = $(this).val();
            let _day = $(this).attr('day');
            let _count = $(this).attr('count');
            if( _val != '24' ) {
                $('#to_hours_div_'+_day+'_'+_count).removeClass('d-none');
                $('#add_btn_div_'+_day+'_'+_count).removeClass('d-none');
            } else {
                $('#to_hours_div_'+_day+'_'+_count).addClass('d-none');
                $('#add_btn_div_'+_day+'_'+_count).addClass('d-none');
            }
        });

        $('body').on('click', '.add_hours', function(e) {
            e.preventDefault();
            let _main = $(this).attr('main');
            let _count = $(this).attr('count');
            $('#main_'+_main).append(`<div id="added_div_`+_main+`_`+_count+`">
                <div class="form-group row">
                    <div class="col-5">
                        <select class="form-control from_hours" day="`+_main+`" count="`+_count+`" id="select_from_`+_main+`_`+_count+`" name="select_from_`+_main+`[]">
                            @foreach( getHours() as $hourKey => $hour )
                                <option value="{{ $hourKey }}">{{ $hour }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-5 d-none" id="to_hours_div_`+_main+`_`+_count+`">
                        <select class="form-control to_hours" id="select_to_`+_main+`_`+_count+`" name="select_to_`+_main+`[]">
                            @foreach( getHours() as $hourKey => $hour )
                                <option value="{{ $hourKey }}">{{ $hour }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-1 d-none" id="add_btn_div_`+_main+`_`+_count+`">
                        <span class="btn btn-danger remove_hours" main="`+_main+`" count="`+_count+`">-</span>
                    </div>
                </div>
            </div>`);
            _count++;
            $(this).attr('count', _count);
        });

        $('body').on('click', '.remove_hours', function(e) {
            e.preventDefault();
            let _main = $(this).attr('main');
            let _count = $(this).attr('count');
            $('#added_div_'+_main+'_'+_count).remove();
        });
    });

</script>
@endpush
