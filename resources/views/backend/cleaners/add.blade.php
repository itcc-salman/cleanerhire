@extends('backend.layouts.master')
@push('css')
<link href="{{ asset('assets/css/pages/wizard/wizard-1.css') }}" rel="stylesheet" type="text/css" />
<style>
.kt-form{
    width: 70% !important;
}
.border-left-divider{
    border-left: 2px solid #e2e5ec;
}
</style>
@endpush

@section('content')
<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="kt-portlet">
        <div class="kt-portlet__body kt-portlet__body--fit">
            <div class="kt-grid kt-wizard-v1 kt-wizard-v1--white" id="kt_wizard_v1" data-ktwizard-state="step-first">
                <div class="kt-grid__item">

                    <!--begin: Form Wizard Nav -->
                    <div class="kt-wizard-v1__nav">

                        <!--doc: Remove "kt-wizard-v1__nav-items--clickable" class and also set 'clickableSteps: false' in the JS init to disable manually clicking step titles -->
                        <div class="kt-wizard-v1__nav-items kt-wizard-v1__nav-items--clickable">
                            <div class="kt-wizard-v1__nav-item" data-ktwizard-type="step" data-ktwizard-state="current">
                                <div class="kt-wizard-v1__nav-body">
                                    <div class="kt-wizard-v1__nav-icon">
                                        <i class="flaticon-bus-stop"></i>
                                    </div>
                                    <div class="kt-wizard-v1__nav-label">
                                        1. Personal Details
                                    </div>
                                </div>
                            </div>
                            <div class="kt-wizard-v1__nav-item" data-ktwizard-type="step">
                                <div class="kt-wizard-v1__nav-body">
                                    <div class="kt-wizard-v1__nav-icon">
                                        <i class="flaticon-list"></i>
                                    </div>
                                    <div class="kt-wizard-v1__nav-label">
                                        2. Visa & Documents
                                    </div>
                                </div>
                            </div>
                            <div class="kt-wizard-v1__nav-item" data-ktwizard-type="step">
                                <div class="kt-wizard-v1__nav-body">
                                    <div class="kt-wizard-v1__nav-icon">
                                        <i class="flaticon-responsive"></i>
                                    </div>
                                    <div class="kt-wizard-v1__nav-label">
                                        3. Cleaning & Equipment Details
                                    </div>
                                </div>
                            </div>
                            <div class="kt-wizard-v1__nav-item" data-ktwizard-type="step">
                                <div class="kt-wizard-v1__nav-body">
                                    <div class="kt-wizard-v1__nav-icon">
                                        <i class="flaticon-truck"></i>
                                    </div>
                                    <div class="kt-wizard-v1__nav-label">
                                        4. Availability
                                    </div>
                                </div>
                            </div>
                            <div class="kt-wizard-v1__nav-item" data-ktwizard-type="step">
                                <div class="kt-wizard-v1__nav-body">
                                    <div class="kt-wizard-v1__nav-icon">
                                        <i class="flaticon-globe"></i>
                                    </div>
                                    <div class="kt-wizard-v1__nav-label">
                                        5. Verify and Submit
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--end: Form Wizard Nav -->
                </div>
                <div class="kt-grid__item kt-grid__item--fluid kt-wizard-v1__wrapper">

                    <!--begin: Form Wizard Form-->
                    <form class="kt-form kt-padding-t-0" id="kt_form">
                        @csrf
                        <input type="hidden" name="last_step" id="last_step" value="1">
                        @if(Session::has('backend.cleaner_id'))
                            <input type="hidden" name="id" id="cleaner_id" value="{{ Session::get('backend.cleaner_id')}}">
                        @else
                            <input type="hidden" name="id" id="cleaner_id" value="">
                        @endif

                        <!--begin: Form Wizard Step 1-->
                        <div class="kt-wizard-v1__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
                            <div class="kt-heading kt-heading--md">Personal Details</div>
                            <div class="kt-form__section kt-form__section--first">
                                <div class="kt-wizard-v1__form">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" class="form-control" name="first_name" placeholder="First Name" value="Test Value">
                                    </div>
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" class="form-control" name="last_name" placeholder="Last Name" value="Test Value">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" class="form-control" name="email" placeholder="Email" value={{'vicky@itccdigital.com'}}>
                                    </div>
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" class="form-control" name="phone" placeholder="Phone">
                                    </div>
                                    <div class="form-group">
                                        <label>Mobile</label>
                                        <input type="text" class="form-control" name="mobile" placeholder="Mobile">
                                    </div>
                                    <div class="form-group">
                                        <label>Address Line 1</label>
                                        <input type="text" class="form-control" name="address1" placeholder="Address Line 1">
                                    </div>
                                    <div class="form-group">
                                        <label>Address Line 2</label>
                                        <input type="text" class="form-control" name="address2" placeholder="Address Line 2">
                                    </div>
                                    <div class="form-group">
                                        <label>Postcode</label>
                                        <input type="text" class="form-control" name="postcode" placeholder="Postcode">
                                    </div>
                                    <div class="form-group">
                                        <label>City</label>
                                        <input type="text" class="form-control" name="city" placeholder="City">
                                    </div>
                                    <div class="form-group">
                                        <label>State</label>
                                        <input type="text" class="form-control" name="state" placeholder="State">
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!--end: Form Wizard Step 1-->

                        <!--begin: Form Wizard Step 2-->
                        <div class="kt-wizard-v1__content" data-ktwizard-type="step-content">
                            <div class="kt-heading kt-heading--md">Visa & Documents</div>
                            <div class="kt-form__section kt-form__section--first">
                                <div class="kt-wizard-v1__form">
                                    <div class="form-group">
                                        <label>Are you an individual or an agency?</label>
                                        <div class="kt-radio-inline">
                                            <label class="kt-radio"><input type="radio" value="cleaner" name="role"> Individual <span></span></label>
                                            <label class="kt-radio"><input type="radio" value="agency" name="role"> Agency <span></span></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Do you want to register as TFN or ABN?</label>
                                        <div class="kt-radio-inline">
                                            <label class="kt-radio"><input type="radio" id="radio_abn" value="abn" name="tfn_or_abn" > ABN <span></span></label>
                                            <label class="kt-radio"><input type="radio" id="radio_tfn" value="tfn" name="tfn_or_abn"> TFN <span></span></label>
                                        </div>
                                        <div class="">
                                            <input type="text" class="form-control d-none" id="tfn" name="tfn" placeholder="TFN">
                                            <input type="text" class="form-control d-none" id="abn" name="abn" placeholder="ABN">
                                        </div>
                                    </div>
                                    <div class="form-group d-none" id="super_account">
                                        <label>Do you have a Super Account ?</label>
                                        <div class="kt-radio-inline">
                                            <label class="kt-radio"><input type="radio" value="yes" name="super_account" > Yes <span></span></label>
                                            <label class="kt-radio"><input type="radio" value="no" name="super_account"> No <span></span></label>
                                        </div>
                                    </div>
                                    <div class="form-group row d-none"  id="super_account_details">
                                        <div class="col-4">
                                            <label>Super Fund Name</label>
                                            <input type="text" class="form-control" name="super_fund_name" placeholder="Super Fund Name">
                                        </div>
                                        <div class="col-4">
                                            <label>Member Number</label>
                                            <input type="text" class="form-control" name="super_member_number" placeholder="Member Number">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Are you an Australian / NZ Citizen or a Permanent Resident?</label>
                                        <div class="kt-radio-inline">
                                            <label class="kt-radio"><input type="radio" value="citizen" name="visa_status"> Australian / NZ Citizen <span></span></label>
                                            <label class="kt-radio"><input type="radio" value="pr" name="visa_status"> Permanent Resident <span></span></label>
                                            <label class="kt-radio"><input type="radio" value="other" name="visa_status"> Other (Please Specify) <span></span></label>
                                        </div>
                                        <div class="">
                                            <input type="text" class="form-control d-none" id="visa_status_other" name="visa_status_other" placeholder="State/Country">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Do you have a Police Check? (Must be within last 12 months)</label>
                                        <div class="kt-radio-inline">
                                            <label class="kt-radio"><input type="radio" value="yes" name="police_check"> Yes <span></span></label>
                                            <label class="kt-radio"><input type="radio" value="no" name="police_check"> No <span></span></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Do you have your own car?</label>
                                        <div class="kt-radio-inline">
                                            <label class="kt-radio"><input type="radio" value="yes" name="own_car"> Yes <span></span></label>
                                            <label class="kt-radio"><input type="radio" value="no" name="own_car"> No <span></span></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Do you have a Driver License?</label>
                                        <div class="kt-radio-inline">
                                            <label class="kt-radio"><input type="radio" value="yes" name="driver_license"> Yes <span></span></label>
                                            <label class="kt-radio"><input type="radio" value="no" name="driver_license"> No <span></span></label>
                                        </div>
                                        <div class="">
                                            <input type="text" class="form-control driver_license_state d-none" id="driver_license_state" name="driver_license_state" placeholder="Which State/Country ?">
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label>Nationality</label>
                                        <input type="text" class="form-control" name="nationality" placeholder="Nationality">
                                    </div>
                                    <div class="form-group">
                                        <label>Which Languages you speak?</label>
                                        <div id="kt_repeater_3">
                                            <div class="form-group">
                                                <div data-repeater-list="" class="">
                                                    <div data-repeater-item class="row kt-margin-b-10">
                                                        <div class="col-lg-4">
                                                            <input type="text" class="form-control form-control-danger" placeholder="English">
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <input type="text" class="form-control form-control-danger" placeholder="Fluent">
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
                                            <label class="kt-radio"><input type="radio" value="male" name="gender"> Male <span></span></label>
                                            <label class="kt-radio"><input type="radio" value="female" name="gender"> Female <span></span></label>
                                            <label class="kt-radio"><input type="radio" value="unknown" name="gender"> Do not want to specify <span></span></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Your Date of Birth?</label>
                                        <input type="text" class="form-control" id="kt_datepicker_1" readonly placeholder="Select date" />
                                    </div>

                                    <div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Upload Documents</label>
                                                    <select class="form-control">
                                                        <option>Driving License</option>
                                                        <option>Medical Card</option>
                                                        <option>Passport</option>
                                                        <option>Utility Bill</option>
                                                        <option>Bank Statement</option>
                                                        <option>Police Check</option>
                                                        <option>Certifications</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <div></div>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input">
                                                        <label class="custom-file-label">Choose file</label>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-primary">Upload</button>
                                            </div>
                                            <div class="col-6 border-left-divider">
                                                <label>List of Documents</label>
                                                <p class="m-0 p-0"><span>1. Driving License</label></p>
                                                <p class="m-0 p-0"><span>2. Medical Card</span></p>
                                                <p class="m-0 p-0"><span>3. Passport</span></p>
                                                <p class="m-0 p-0"><span>4. Utility Bill</span></p>
                                                <p class="m-0 p-0"><span>5. Bank Statement</span></p>
                                                <p class="m-0 p-0"><span>6. Police Check</span></p>
                                                <p class="m-0 p-0"><span>7. Certifications</span></p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!--end: Form Wizard Step 2-->

                        <!--begin: Form Wizard Step 3-->
                        <div class="kt-wizard-v1__content" data-ktwizard-type="step-content">
                            <div class="kt-heading kt-heading--md">Cleaning & Equipment Details</div>
                            <div class="kt-form__section kt-form__section--first">
                                <div class="kt-wizard-v1__form">
                                </div>
                            </div>
                        </div>

                        <!--end: Form Wizard Step 3-->

                        <!--begin: Form Wizard Step 4-->
                        <div class="kt-wizard-v1__content" data-ktwizard-type="step-content">
                            <div class="kt-heading kt-heading--md">Availability</div>
                            <div class="kt-form__section kt-form__section--first">
                                <div class="kt-wizard-v1__form">

                                </div>
                            </div>
                        </div>

                        <!--end: Form Wizard Step 4-->

                        <!--begin: Form Wizard Step 5-->
                        <div class="kt-wizard-v1__content" data-ktwizard-type="step-content">
                            <div class="kt-heading kt-heading--md">Verify and Submit</div>
                            <div class="kt-form__section kt-form__section--first">
                                <div class="kt-wizard-v1__review">
                                </div>
                            </div>
                        </div>

                        <!--end: Form Wizard Step 5-->

                        <!--begin: Form Actions -->
                        <div class="kt-form__actions">
                            <button class="btn btn-secondary btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-prev">
                                Previous
                            </button>
                            <button class="btn btn-brand btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-next">
                                Next Step
                            </button>
                            <button class="btn btn-success btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-submit">
                                Submit
                            </button>
                        </div>

                        <!--end: Form Actions -->
                    </form>

                    <!--end: Form Wizard Form-->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- end:: Content -->
@endsection

@push('scripts')

<script>
$('input[type=radio][name=role]').change(function() {
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
$('input[type=radio][name=tfn_or_abn]').change(function() {
    if (this.value == 'abn') {
        $("#super_account").addClass('d-none');
        $("#abn").removeClass('d-none');
        $("#tfn").val('');
        $("#tfn").addClass('d-none');
    }
    else if (this.value == 'tfn') {
        $("#super_account").removeClass('d-none');
        $("#tfn").removeClass('d-none');
        $("#abn").val('');
        $("#abn").addClass('d-none');
    }
});
$('input[type=radio][name=super_account]').change(function() {
    if (this.value == 'no') {
        $("#super_account_details").addClass('d-none');
    }
    else if (this.value == 'yes') {
        $("#super_account_details").removeClass('d-none');
    }
});
$('input[type=radio][name=driver_license]').change(function() {
    if (this.value == 'no') {
        $("#driver_license_state").addClass('d-none');
    }
    else if (this.value == 'yes') {
        $("#driver_license_state").removeClass('d-none');
    }
});
$('input[type=radio][name=visa_status]').change(function() {
    if (this.value != 'citizen' && this.value != 'pr') {
        $("#visa_status_other").removeClass('d-none');
    }else{
        $("#visa_status_other").addClass('d-none');
    }
});

</script>

<script>
    // Class definition
    var KTWizard1 = function () {
        // Base elements
        var wizardEl;
        var formEl;
        var validator;
        var wizard;

        // Private functions
        var initWizard = function () {
            // Initialize form wizard
            wizard = new KTWizard('kt_wizard_v1', {
                startStep: 1, // initial active step number
                clickableSteps: true  // allow step clicking
            });

            // Validation before going to next page
            wizard.on('beforeNext', function(wizardObj) {
                $("#last_step").val(wizardObj.currentStep);
                if (validator.form() !== true) {
                    wizardObj.stop();  // don't go to the next step
                }
            });

            wizard.on('beforePrev', function(wizardObj) {
                if (validator.form() !== true) {
                    wizardObj.stop();  // don't go to the next step
                }
            });

            // Change event
            wizard.on('change', function(wizard) {
                setTimeout(function() {
                    // KTUtil.scrollTop();
                }, 500);
            });
            // wizard.goNext();
        }

        var initValidation = function() {
            validator = formEl.validate({
                // Validate only visible fields
                ignore: ":hidden",

                // Validation rules
                rules: {
                    //= Step 1
                    first_name: {
                        required: true
                    },
                    last_name: {
                        required: true
                    },
                    email: {
                        required: true,
                        email: true,
                    },
                },

                // Display error
                invalidHandler: function(event, validator) {
                    KTUtil.scrollTop();

                    swal.fire({
                        "title": "",
                        "text": "There are some errors in your submission. Please correct them.",
                        "type": "error",
                        "confirmButtonClass": "btn btn-secondary"
                    });
                },

                // Submit valid form
                submitHandler: function (form) {

                }
            });
        }

        var initSubmit = function() {
            var btn = formEl.find('[data-ktwizard-type="action-next"]');
            // KTUtil.scrollTop();
            btn.on('click', function(e) {
                e.preventDefault();
                if (validator.form()) {
                    // See: src\js\framework\base\app.js
                    KTApp.progress(btn);
                    //KTApp.block(formEl);
                    console.log(wizard.currentStep);
                    if((wizard.currentStep - 1) == 1){

                        if($("#cleaner_id").val() == ''){
                            var url = '{{ route('backend.cleaner.create') }}';
                        }else{
                            var url = '{{ route('backend.cleaner.update') }}';
                        }
                        formEl.ajaxSubmit({
                            url: url,
                            method: 'POST',
                            success: function(response) {
                                if(response.code == 200){
                                    $("#cleaner_id").val(response.cleaner.id)
                                }
                                KTApp.unprogress(btn);
                                //KTApp.unblock(formEl);

                            }
                        });
                    }else if((wizard.currentStep - 1) > 1 && (wizard.currentStep - 1) < 5){
                        var url = '{{ route('backend.cleaner.update') }}';
                        formEl.ajaxSubmit({
                            url: url,
                            method: 'POST',
                            success: function(response) {
                                console.log(response);
                                KTApp.unprogress(btn);
                                //KTApp.unblock(formEl);
                            }
                        });
                    }
                }
            });

            var btn1 = formEl.find('[data-ktwizard-type="action-submit"]');
            btn1.on('click', function(e) {
                e.preventDefault();
                if (validator.form()) {
                    // See: src\js\framework\base\app.js
                    KTApp.progress(btn1);
                    //KTApp.block(formEl);

                    var url = '{{ route('backend.cleaner.update') }}';
                    formEl.ajaxSubmit({
                        url: url,
                        method: 'POST',
                        success: function(response) {
                            KTApp.unprogress(btn1);
                            //KTApp.unblock(formEl);
                            location.href = '{{ route('backend.cleaners') }}';
                        }
                    });

                }
            });
        }

        return {
            // public functions
            init: function() {
                wizardEl = KTUtil.get('kt_wizard_v1');
                formEl = $('#kt_form');

                initWizard();
                initValidation();
                initSubmit();
            }
        };
    }();

    $(document).ready(function() {
        KTWizard1.init();
    });

    $('#kt_repeater_3').repeater({
        initEmpty: false,

        defaultValues: {
            'text-input': 'foo'
        },

        show: function() {
            $(this).slideDown();
        },

        hide: function(deleteElement) {
            if(confirm('Are you sure you want to delete this element?')) {
                $(this).slideUp(deleteElement);
            }
        }
    });

    $('#kt_datepicker_1, #kt_datepicker_1_validate').datepicker({
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

</script>
@endpush
