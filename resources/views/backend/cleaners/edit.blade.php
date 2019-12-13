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
                        @if(isset($cleaner))
                            <input type="hidden" name="id" id="cleaner_id" value="{{$cleaner->id}}">
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
                            <div class="kt-form__section kt-form__section--first" id="stepFiveWizardDiv">
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
                    console.log(wizard.currentStep);
                    KTApp.progress(btn);
                    KTApp.block(formEl);
                    console.log(wizard.currentStep);
                    var url = '{{ route('backend.cleaner.update') }}';
                    formEl.ajaxSubmit({
                        url: url,
                        method: 'POST',
                        success: function(response) {
                            // console.log(response);
                            if(response.code == 200 && response.html != ''){
                                $("#stepFiveWizardDiv").html(response.html);
                            }
                            KTApp.unprogress(btn);
                            KTApp.unblock(formEl);
                        }
                    });

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
</script>
@endpush
