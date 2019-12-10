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
                                        3. Services
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
                                @include('backend.cleaners.partials.step1')
                            </div>
                        </div>

                        <!--end: Form Wizard Step 1-->

                        <!--begin: Form Wizard Step 2-->
                        <div class="kt-wizard-v1__content" data-ktwizard-type="step-content">
                            <div class="kt-heading kt-heading--md">Visa & Documents</div>
                            <div class="kt-form__section kt-form__section--first">
                                @include('backend.cleaners.partials.step2')
                            </div>
                        </div>

                        <!--end: Form Wizard Step 2-->

                        <!--begin: Form Wizard Step 3-->
                        <div class="kt-wizard-v1__content" data-ktwizard-type="step-content">
                            <div class="kt-heading kt-heading--md">Services</div>
                            <div class="kt-form__section kt-form__section--first">
                                @include('backend.cleaners.partials.step3')
                            </div>
                        </div>

                        <!--end: Form Wizard Step 3-->

                        <!--begin: Form Wizard Step 4-->
                        <div class="kt-wizard-v1__content" data-ktwizard-type="step-content">
                            <div class="kt-heading kt-heading--md">Availability</div>
                            <div class="kt-form__section kt-form__section--first">
                                @include('backend.cleaners.partials.step4')
                            </div>
                        </div>

                        <!--end: Form Wizard Step 4-->

                        <!--begin: Form Wizard Step 5-->
                        <div class="kt-wizard-v1__content" data-ktwizard-type="step-content">
                            <div class="kt-heading kt-heading--md">Verify and Submit</div>
                            <div class="kt-form__section kt-form__section--first">
                                @include('backend.cleaners.partials.step5')
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
<script type="text/javascript">

    function getStep3Services(){
        $.ajax({
            url: '{{ route('backend.ajax.services') }}',
            type: 'get',
            success: function(response){
                if(response.code == 200){
                    var htmlstring = '<div class="form-group"><div class="kt-checkbox-list">';
                    $.each(response.services, function(index, el) {
                        htmlstring = htmlstring + '<div class="kt-option kt-p10 col-12 d-block"><label class="kt-checkbox kt-checkbox--tick kt-checkbox--brand kt-margin-0"><input class="cleaner-services-checkbox" name="cleaner_services[]" value="'+ el.id +'" type="checkbox">' + el.name + '<span></span></label>';
                        htmlstring = htmlstring + '<div class="form-group kt-mb-5 kt-mt-5 d-none" id="service_'+ el.id +'"><label>Do you have relevant equipments?</label><div class="kt-radio-inline"><label class="kt-radio kt-radio--tick kt-radio--brand"><input type="radio" value="1" name="has_equipment_'+el.id+'"> Yes <span></span></label><label class="kt-radio kt-radio--tick kt-radio--brand"><input type="radio" value="0" name="has_equipment_'+el.id+'"> No <span></span></label></div></div></div>'
                    });
                    htmlstring = htmlstring +  '</div></div>';
                }else{
                    var htmlstring = 'No Services Found';
                }

                $("#stepThreeWizardDiv").html(htmlstring);
            },
        });
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

</script>

<script>

    // Step 2
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

    $('input[type=radio][name=driver_license]').change(function() {
        if (this.value == 'no') {
            $("#driver_license_state").addClass('d-none');
            $("#driver_license_number").addClass('d-none');
        }
        else if (this.value == 'yes') {
            $("#driver_license_state").removeClass('d-none');
            $("#driver_license_number").removeClass('d-none');
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

        getStep3Services();

        // Step 3
        $(document).on('change', '.cleaner-services-checkbox', function(event) {
            if(this.checked) {
                $('#service_'+this.value).removeClass("d-none");
            }else{
                $('#service_'+this.value).addClass("d-none");
            }
        });

        // Step 4
        $(document).on('change', '.switch_days', function(event) {
            if(this.checked) {
                $('#select_from_'+this.value).removeClass("d-none");
            }else{
                $('#select_from_'+this.value).addClass("d-none");
            }
        });

        $(document).on('change', '.from_hours', function(event) {
            alert();
        });
    });
</script>
@endpush
