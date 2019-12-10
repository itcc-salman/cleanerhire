<div class="kt-wizard-v1__form">
    <div class="form-group">
        <label>Are you an individual or an agency?</label>
        <div class="kt-radio-inline">
            <label class="kt-radio kt-radio--tick kt-radio--brand"><input type="radio" value="cleaner" {{ isset($cleaner) && $cleaner->user->role == 'cleaner' ? 'checked' : '' }} name="role"> Individual <span></span></label>
            <label class="kt-radio kt-radio--tick kt-radio--brand"><input type="radio" value="agency" {{ isset($cleaner) && $cleaner->user->role == 'agency' ? 'checked' : '' }} name="role"> Agency <span></span></label>
        </div>
    </div>
    <div class="form-group">
        <label>Do you want to register as TFN or ABN?</label>
        <div class="kt-radio-inline">
            <label class="kt-radio kt-radio--tick kt-radio--brand"><input type="radio" id="radio_abn" value="abn" {{ isset($cleaner->abn) ? 'checked' : '' }} name="tfn_or_abn" > ABN <span></span></label>
            <label class="kt-radio kt-radio--tick kt-radio--brand"><input type="radio" id="radio_tfn" value="tfn" {{ isset($cleaner->tfn) ? 'checked' : '' }} name="tfn_or_abn"> TFN <span></span></label>
        </div>
        <div class="">
            <input type="text" class="form-control {{ !empty($cleaner->tfn) ?: 'd-none' }}" id="tfn" name="tfn" placeholder="TFN" value="{{ $cleaner->tfn ?? ''}}">
            <input type="text" class="form-control {{ !empty($cleaner->abn) ?: 'd-none' }}" id="abn" name="abn" placeholder="ABN" value="{{ $cleaner->abn ?? ''}}">
        </div>
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
        <input type="text" class="form-control" name="nationality" placeholder="Nationality" value="{{$cleaner->nationality ?? ''}}">
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
        <input type="text" class="form-control" id="kt_datepicker_1" name="date_of_birth" readonly placeholder="Select date" value="{{ $cleaner->date_of_birth ?? '' }}"/>
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
        // $repeater.setList();
    });

    $(document).on('change', 'input[type=radio][name=role]', function() {
        if (this.value == 'cleaner') {
            $("#radio_tfn").prop("disabled", false);
            $("#radio_tfn").parent().removeClass('kt-radio--disabled');
        }
        else if (this.value == 'agency') {
            $("#radio_tfn").prop("disabled", true);
            $("#radio_tfn").parent().addClass('kt-radio--disabled');
            $("#radio_abn").prop("checked", true);
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
@endpush
