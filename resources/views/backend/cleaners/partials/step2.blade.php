<div class="kt-wizard-v1__form">
    <div class="form-group">
        <label>Are you a @lang('labels.cleaner') or a @lang('labels.company')?</label>
        <div class="kt-radio-inline">
            <label class="kt-radio kt-radio--tick kt-radio--brand"><input type="radio" value="cleaner" {{ isset($cleaner) && $cleaner->user->role == 'cleaner' ? 'checked' : '' }} name="role"> @lang('labels.cleaner') <span></span></label>
            <label class="kt-radio kt-radio--tick kt-radio--brand"><input type="radio" value="company" {{ isset($cleaner) && $cleaner->user->role == 'company' ? 'checked' : '' }} name="role"> @lang('labels.company') <span></span></label>
        </div>
    </div>
    <div class="form-group">
        <label>Do you want to register as @lang('labels.tfn') or @lang('labels.abn_acn')?</label>
        <div class="kt-radio-inline">
            <label class="kt-radio kt-radio--tick kt-radio--brand"><input type="radio" id="radio_abn" value="abn" {{ isset($cleaner->abn) ? 'checked' : '' }} name="tfn_or_abn" > @lang('labels.abn_acn') <span></span></label>
            <label class="kt-radio kt-radio--tick kt-radio--brand"><input type="radio" id="radio_tfn" value="tfn" {{ isset($cleaner->tfn) ? 'checked' : '' }} name="tfn_or_abn"> @lang('labels.tfn') <span></span></label>
        </div>
        <div class="">
            <input type="text" class="form-control {{ !empty($cleaner->tfn) ?: 'd-none' }}" id="tfn" name="tfn" placeholder="@lang('labels.tfn')" value="{{ $cleaner->tfn ?? ''}}">
            <input type="text" class="form-control {{ !empty($cleaner->abn) ?: 'd-none' }}" id="abn" name="abn" placeholder="@lang('labels.abn_acn')" value="{{ $cleaner->abn ?? ''}}">
        </div>
    </div>

    <div id="companyDetailsDiv" class="d-none">
        <div class="form-group">
            <label>Company Name</label>
            <input type="text" class="form-control" name="company_name"  value="{{$cleaner->company_name ?? ''}}">
        </div>
        <div class="form-group">
            <label>Director Name</label>
            <input type="text" class="form-control" name="director_name" value="{{$cleaner->director_name ?? ''}}">
        </div>
        <div class="form-group">
            <label>Company Address</label>
            <input type="text" class="form-control" name="company_address"  value="{{$cleaner->company_address ?? ''}}">
        </div>
        <div class="form-group">
            <label>Company Email</label>
            <input type="text" class="form-control" name="company_email"  value="{{$cleaner->company_email ?? ''}}">
        </div>
        <div class="form-group">
            <label>Company Phone</label>
            <input type="text" class="form-control" name="company_phone"  value="{{$cleaner->company_phone ?? ''}}">
        </div>
        <div class="form-group">
            <label>Company Mobile</label>
            <input type="text" class="form-control" name="company_mobile"  value="{{$cleaner->company_mobile ?? ''}}">
        </div>
        <div class="form-group">
            <label>Insurance Details</label>
            <input type="text" class="form-control" name="insurance_details"  value="{{$cleaner->insurance_details ?? ''}}">
        </div>
        <div class="form-group">
            <label>Workcover Details</label>
            <input type="text" class="form-control" name="workcover_details"  value="{{$cleaner->workcover_details ?? ''}}">
        </div>
        <div class="form-group">
            <label>Registration Details</label>
            <input type="text" class="form-control" name="registration_details"  value="{{$cleaner->registration_details ?? ''}}">
        </div>
        <div class="form-group">
            <label>Years in Business ?</label>
            <input type="text" class="form-control" name="business_years"  value="{{$cleaner->business_years ?? ''}}">
        </div>
        <div class="form-group">
            <label>How many Employees ?</label>
            <input type="text" class="form-control" name="number_of_employees"  value="{{$cleaner->number_of_employees ?? ''}}">
        </div>
    </div>
    <div class="form-group">
        <label>Service Area with kms?</label>
        <input id="autocomplete" class="form-control form-group col-md-12" placeholder="Search Suburb" type="text"/>
        @if(!isset($cleaner) || isset($cleaner) && $cleaner->serviceAreas->count() == 0)
            <div id="kt_repeater_service_areas"></div>
            <input type="hidden" name="service_area_counter" id="service_area_counter" value="0">
        @else
            <div id="kt_repeater_service_areas">
                @foreach($cleaner->serviceAreas as $key => $csm)
                    <div class="form-group" id="service_area_{{$key+1}}">
                        <div class="row kt-margin-b-10">
                            <div class="col-md-4">
                                <input type="text" class="form-control form-control-danger" name="suburb_name_{{$key+1}}" value="{{$csm->suburb_name}}">
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control form-control-danger" name="area_in_km_{{$key+1}}" placeholder="Area Radius(kms)" value="{{$csm->area_in_km}}" required>
                                <input type="hidden" name="latitude_{{$key+1}}" value="{{$csm->latitude}}">
                                <input type="hidden" name="longitude_{{$key+1}}" value="{{$csm->longitude}}">
                            </div>
                            <div class="col-md-4">
                                <a href="javascript:;" onclick="removeServiceArea({{$key+1}});" class="btn btn-danger btn-icon"><i class="la la-remove"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <input type="hidden" name="service_area_counter" id="service_area_counter" value="{{$cleaner->serviceAreas->count()}}">
        @endif
    </div>
    <div class="form-group">
        <label>Are you an Australian / NZ Citizen or a Permanent Resident?</label>
        <div class="kt-radio-inline">
            <label class="kt-radio kt-radio--tick kt-radio--brand"><input type="radio"  {{ isset($cleaner) && $cleaner->visa_status == 'citizen' ? 'checked' : '' }} value="citizen" name="visa_status"> Australian / NZ Citizen <span></span></label>
            <label class="kt-radio kt-radio--tick kt-radio--brand"><input type="radio"  {{ isset($cleaner) && $cleaner->visa_status == 'pr' ? 'checked' : '' }} value="pr" name="visa_status"> Permanent Resident <span></span></label>
            <label class="kt-radio kt-radio--tick kt-radio--brand"><input type="radio"  {{ isset($cleaner) && $cleaner->visa_status == 'other' ? 'checked' : '' }} value="other" name="visa_status"> Other (Please Specify) <span></span></label>
        </div>
        <div class="">
            <input type="text" class="form-control {{ !empty($cleaner->visa_status_other) ?: 'd-none' }}" id="visa_status_other" name="visa_status_other" placeholder="State/Country" value="{{$cleaner->visa_status_other ?? ''}}">
        </div>
    </div>
    <div class="form-group">
        <label>Do you have a Police Check? (Must be within last 12 months)</label>
        <div class="kt-radio-inline">
            <label class="kt-radio kt-radio--tick kt-radio--brand"><input type="radio" value="yes" {{ isset($cleaner) && $cleaner->police_check == 'yes' ? 'checked' : '' }}  name="police_check"> Yes <span></span></label>
            <label class="kt-radio kt-radio--tick kt-radio--brand"><input type="radio" value="no"  {{ isset($cleaner) && $cleaner->police_check == 'no' ? 'checked' : '' }} name="police_check"> No <span></span></label>
        </div>
    </div>
    <div class="form-group">
        <label>Do you have your own car?</label>
        <div class="kt-radio-inline">
            <label class="kt-radio kt-radio--tick kt-radio--brand"><input type="radio" value="yes" {{ isset($cleaner) && $cleaner->own_car == 'yes' ? 'checked' : '' }} name="own_car"> Yes <span></span></label>
            <label class="kt-radio kt-radio--tick kt-radio--brand"><input type="radio" value="no" {{ isset($cleaner) && $cleaner->own_car == 'no' ? 'checked' : '' }} name="own_car"> No <span></span></label>
        </div>
    </div>
    <div class="form-group">
        <label>Do you have a Driver License?</label>
        <div class="kt-radio-inline">
            <label class="kt-radio kt-radio--tick kt-radio--brand"><input type="radio" value="yes" {{ isset($cleaner) && $cleaner->driver_license == 'yes' ? 'checked' : '' }} name="driver_license"> Yes <span></span></label>
            <label class="kt-radio kt-radio--tick kt-radio--brand"><input type="radio" value="no" {{ isset($cleaner) && $cleaner->driver_license == 'no' ? 'checked' : '' }} name="driver_license"> No <span></span></label>
        </div>
        <div class="">
            <input type="text" class="form-control driver_license_state {{ !empty($cleaner->driver_license_state) ?: 'd-none'}}" id="driver_license_state" name="driver_license_state" placeholder="Which State/Country ?" value="{{$cleaner->driver_license_state ?? ''}}">
        </div>
        <div class="">
            <input type="text" class="form-control driver_license_number {{ !empty($cleaner->driver_license_number) ?: 'd-none'}}" id="driver_license_number" name="driver_license_number" placeholder="Driver License Number" value="{{$cleaner->driver_license_number ?? ''}}">
        </div>
    </div>
    <div class="form-group">
        <label>Nationality</label>
        <input type="text" class="form-control" name="nationality" value="{{$cleaner->nationality ?? ''}}">
    </div>
    <div class="form-group">
        <label>Which Languages you speak?</label>
        <div id="kt_repeater_3">
            <div class="form-group">
                <div data-repeater-list="language" class="">
                    <div data-repeater-item class="row kt-margin-b-10">
                        <div class="col-lg-4">
                            <input type="text" class="form-control form-control-danger" name="lname" placeholder="English">
                        </div>
                        <div class="col-lg-4">
                            <input type="text" class="form-control form-control-danger" name="lfluency" placeholder="Fluency">
                        </div>
                        <div class="col-lg-4">
                            <a href="javascript:;" data-repeater-delete="" class="btn btn-danger btn-icon"><i class="la la-remove"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div data-repeater-create="" class="btn btn btn-primary">
                        <span>
                            <i class="la la-plus"></i>
                            <span>Add</span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label>Gender?</label>
        <div class="kt-radio-inline">
            <label class="kt-radio kt-radio--tick kt-radio--brand"><input type="radio" value="male" {{ isset($cleaner) && $cleaner->gender == 'male' ? 'checked' : '' }} name="gender"> Male <span></span></label>
            <label class="kt-radio kt-radio--tick kt-radio--brand"><input type="radio" value="female" {{ isset($cleaner) && $cleaner->gender == 'female' ? 'checked' : '' }} name="gender"> Female <span></span></label>
            <label class="kt-radio kt-radio--tick kt-radio--brand"><input type="radio" value="unknown" {{ isset($cleaner) && $cleaner->gender == 'unknown' ? 'checked' : '' }} name="gender"> Do not want to specify <span></span></label>
        </div>
    </div>
    <div class="form-group">
        <label>Your Date of Birth?</label>
        <input type="text" class="form-control" id="kt_datepicker_1" name="date_of_birth" value="{{ $cleaner->date_of_birth ?? '' }}"/>
    </div>

    <div>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label>Upload Documents</label>
                    <select id="fileUploadSelect" class="form-control">
                        <option value="doc_driving_licence">Driving License</option>
                        <option value="doc_medicare_card">Medical Card</option>
                        <option value="doc_passport">Passport</option>
                        <option value="doc_bank_statement">Utility Bill</option>
                        <option value="doc_utility_bill">Bank Statement</option>
                        <option value="doc_certifications">Police Check</option>
                        <option value="doc_police_check">Certifications</option>
                    </select>
                </div>
                <div class="form-group">
                    <div></div>
                    <div class="custom-file">
                        <input type="file" id="file" name="file" class="custom-file-input">
                        <label class="custom-file-label">Choose file</label>
                    </div>
                </div>
                <button type="button" onclick="fileupload();" class="btn btn-primary">Upload</button>
            </div>
            <div class="col-6 border-left-divider">
                <label>List of Documents</label>
                <input type="hidden" name="doc_driving_licence" id="doc_driving_licence">
                <input type="hidden" name="doc_medicare_card" id="doc_medicare_card">
                <input type="hidden" name="doc_passport" id="doc_passport">
                <input type="hidden" name="doc_bank_statement" id="doc_bank_statement">
                <input type="hidden" name="doc_utility_bill" id="doc_utility_bill">
                <input type="hidden" name="doc_certifications" id="doc_certifications">
                <input type="hidden" name="doc_police_check" id="doc_police_check">
                <p class="m-0 p-0"><span>1. Driving License</span><span id="doc_driving_licence_file_name">{{$cleaner->doc_driving_licence ?? ''}}</span></p>
                <p class="m-0 p-0"><span>2. Medical Card</span><span id="doc_medicare_card_file_name">{{$cleaner->doc_medicare_card ?? ''}}</span></p>
                <p class="m-0 p-0"><span>3. Passport</span><span id="doc_passport_file_name">{{$cleaner->doc_passport ?? ''}}</span></p>
                <p class="m-0 p-0"><span>4. Utility Bill</span><span id="doc_bank_statement_file_name">{{$cleaner->doc_bank_statement ?? ''}}</span></p>
                <p class="m-0 p-0"><span>5. Bank Statement</span><span id="doc_utility_bill_file_name">{{$cleaner->doc_utility_bill ?? ''}}</span></p>
                <p class="m-0 p-0"><span>6. Police Check</span><span id="doc_certifications_file_name">{{$cleaner->doc_certifications ?? ''}}</span></p>
                <p class="m-0 p-0"><span>7. Certifications</span><span id="doc_police_check_file_name">{{$cleaner->doc_police_check ?? ''}}</span></p>
            </div>
        </div>
    </div>

</div>

@push('scripts')

<script>
    var placeSearch, autocomplete;
    var componentForm = {
        locality: 'long_name'
    };
    var counter = parseInt($("#service_area_counter").val()) + 1;

    function initAutocomplete() {
        var options = {
            types: ['(cities)'],
            componentRestrictions: {country: ['au', 'nz']}
        };
        autocomplete = new google.maps.places.Autocomplete(
        document.getElementById('autocomplete'), options);
        autocomplete.setFields(['address_component','geometry']);
        autocomplete.addListener('place_changed', fillInAddress);
    }

    function fillInAddress() {
        var place = autocomplete.getPlace();
        console.log(place);
        if(place.address_components[0].types[0] == 'locality' || place.address_components[0].types[1] == 'locality'){
            var latitude = place.geometry.location.lat();
            var longitude = place.geometry.location.lng();
            var divInnerHtml = '<div class="form-group" id="service_area_'+counter+'"><div class="row kt-margin-b-10"><div class="col-md-4"><input type="text" class="form-control form-control-danger" name="suburb_name_'+counter+'" value="'+place.address_components[0].long_name+'"></div><div class="col-md-4"><input type="text" class="form-control form-control-danger" name="area_in_km_'+counter+'" placeholder="Area Radius(kms)" required><input type="hidden" name="latitude_'+counter+'" value="'+latitude+'"><input type="hidden" name="longitude_'+counter+'" value="'+longitude+'"></div><div class="col-md-4"><a href="javascript:;" onclick="removeServiceArea('+counter+');" class="btn btn-danger btn-icon"><i class="la la-remove"></i></a></div></div></div>'
            $("#kt_repeater_service_areas").append(divInnerHtml);
            $("#autocomplete").val('');
            $("#service_area_counter").val(counter);
            counter++;

        }
    }

    function removeServiceArea(id){
        $('#service_area_' + id).remove();
    }

    function fileupload(){
        var fd = new FormData();
        var files = $('#file')[0].files[0];
        fd.append('file', files);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/admin/uploadfile',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function(response){
                if(response.code == 200){
                    var selectedValue = '#'+$('#fileUploadSelect').val();
                    $(selectedValue).val(response.data);
                    $(selectedValue+'_file_name').html(": "+response.data);
                    $('#file').val('');
                    $('.custom-file-label').removeClass("selected").html("Choose file");
                }
            },
        });
    }

    $(document).ready(function() {

        $('#kt_datepicker_1').datepicker({
            clearBtn: true,
            todayBtn: true,
            todayHighlight: true,
            orientation: "bottom left",
            endDate: new Date,
            templates: {
                leftArrow: '<i class="la la-angle-left"></i>',
                rightArrow: '<i class="la la-angle-right"></i>'
            }
        });

        var $repeater = $('#kt_repeater_3').repeater({
            initEmpty: false,

            defaultValues: [],

            show: function() {
                $(this).slideDown();
            },

            hide: function(deleteElement) {
                if(confirm('Are you sure you want to delete this element?')) {
                    $(this).slideUp(deleteElement);
                }
            }
        });
        @if(isset($cleaner) && $cleaner->language != '')
            $repeater.setList({!! json_encode($cleaner->language) !!});
        @endif

        if($('input[type=radio][name=role]').val() != ''){
            $('input[type=radio][name=role]').trigger('change');
        }
    });

    $(document).on('change', 'input[type=radio][name=role]', function() {
        let _val = $("input[type=radio][name=role]:checked").val();
        if (_val == 'cleaner') {
            $("#radio_tfn").prop("disabled", false);
            $("#radio_tfn").parent().removeClass('kt-radio--disabled');
            $("#companyDetailsDiv").addClass('d-none');
        }
        else if (_val == 'company') {
            $("#radio_tfn").prop("disabled", true);
            $("#radio_tfn").parent().addClass('kt-radio--disabled');
            $("#radio_abn").prop("checked", true).trigger('change');
            $("#companyDetailsDiv").removeClass('d-none');
        }
    });

    $(document).on('change', 'input[type=radio][name=tfn_or_abn]', function() {
        if (this.value == 'abn') {
            $("#abn").removeClass('d-none');
            $("#tfn").val('');
            $("#tfn").addClass('d-none');
        }
        else if (this.value == 'tfn') {
            $("#tfn").removeClass('d-none');
            $("#abn").val('');
            $("#abn").addClass('d-none');
        }
    });

    $(document).on('change', 'input[type=radio][name=driver_license]', function() {
        if (this.value == 'no') {
            $("#driver_license_state").addClass('d-none');
            $("#driver_license_number").addClass('d-none');
        }
        else if (this.value == 'yes') {
            $("#driver_license_state").removeClass('d-none');
            $("#driver_license_number").removeClass('d-none');
        }
    });

    $(document).on('change', 'input[type=radio][name=visa_status]', function() {
        if (this.value != 'citizen' && this.value != 'pr') {
            $("#visa_status_other").removeClass('d-none');
        }else{
            $("#visa_status_other").addClass('d-none');
        }
    });

</script>
<script src="https://maps.googleapis.com/maps/api/js?key={{ config('settings.googlePlacesAPIKey') }}&libraries=places&callback=initAutocomplete"></script>
@endpush
