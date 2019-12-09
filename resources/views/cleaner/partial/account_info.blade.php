<div class="row">
    <div class="col-xl-12">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">Account Information <small>update your account informaiton</small></h3>
                </div>
            </div>
            <form class="kt-form kt-form--label-right" id="account_info">
                <div class="kt-portlet__body">
                    <div class="kt-section kt-section--first">
                        <div class="kt-section__body">
                            <div class="row">
                                <label class="col-xl-3"></label>
                                <div class="col-lg-9 col-xl-6">
                                    <h3 class="kt-section__title kt-section__title-sm">Basic Info:</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label>Are you an individual or an agency?</label>
                                    <div class="kt-radio-inline">
                                        <label class="kt-radio kt-radio--tick kt-radio--brand"><input type="radio" value="cleaner" {{ $data->user->role == 'cleaner' ? 'checked' : '' }} name="role"> Individual <span></span></label>
                                        <label class="kt-radio kt-radio--tick kt-radio--brand"><input type="radio" value="agency" {{ $data->user->role == 'agency' ? 'checked' : '' }} name="role"> Agency <span></span></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group wd-100">
                                    <label>Do you want to register as TFN or ABN?</label>
                                    <div class="kt-radio-inline">
                                        <label class="kt-radio kt-radio--tick kt-radio--brand"><input type="radio" id="radio_abn" {{ empty($data->abn) ?: 'checked' }} value="abn" name="tfn_or_abn"> ABN <span></span></label>
                                        <label class="kt-radio kt-radio--tick kt-radio--brand"><input type="radio" id="radio_tfn" {{ empty($data->tfn) ?: 'checked' }} value="tfn" name="tfn_or_abn"> TFN <span></span></label>
                                    </div>
                                    <div class="">
                                        <input type="text" class="form-control {{ !empty($data->tfn) ?: 'd-none' }}" id="tfn" name="tfn" value="{{ $data->tfn }}" placeholder="TFN">
                                        <input type="text" class="form-control {{ !empty($data->abn) ?: 'd-none' }}" id="abn" name="abn" value="{{ $data->abn }}" placeholder="ABN">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group wd-100">
                                    <label>Are you an Australian / NZ Citizen or a Permanent Resident?</label>
                                    <div class="kt-radio-inline">
                                        <label class="kt-radio kt-radio--tick kt-radio--brand"><input type="radio" {{ $data->visa_status == 'citizen' ? 'checked' : '' }} value="citizen" name="visa_status"> Australian / NZ Citizen <span></span></label>
                                        <label class="kt-radio kt-radio--tick kt-radio--brand"><input type="radio" {{ $data->visa_status == 'pr' ? 'checked' : '' }} value="pr" name="visa_status"> Permanent Resident <span></span></label>
                                        <label class="kt-radio kt-radio--tick kt-radio--brand"><input type="radio" {{ $data->visa_status == 'other' ? 'checked' : '' }} value="other" name="visa_status"> Other (Please Specify) <span></span></label>
                                    </div>
                                    <div class="">
                                        <input type="text" class="form-control {{ $data->visa_status != 'other' ? 'd-none' : '' }}" id="visa_status_other" value="{{ $data->visa_status_other }}" name="visa_status_other" placeholder="State/Country">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label>Do you have a Police Check? (Must be within last 12 months)</label>
                                    <div class="kt-radio-inline">
                                        <label class="kt-radio kt-radio--tick kt-radio--brand"><input type="radio" {{ $data->police_check == 'yes' ? 'checked' : '' }} value="yes" name="police_check"> Yes <span></span></label>
                                        <label class="kt-radio kt-radio--tick kt-radio--brand"><input type="radio" {{ $data->police_check == 'no' ? 'checked' : '' }} value="no" name="police_check"> No <span></span></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label>Do you have your own car?</label>
                                    <div class="kt-radio-inline">
                                        <label class="kt-radio kt-radio--tick kt-radio--brand"><input type="radio" {{ $data->own_car == 'yes' ? 'checked' : '' }} value="yes" name="own_car"> Yes <span></span></label>
                                        <label class="kt-radio kt-radio--tick kt-radio--brand"><input type="radio" {{ $data->own_car == 'no' ? 'checked' : '' }} value="no" name="own_car"> No <span></span></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group wd-100">
                                    <label>Do you have a Driver License?</label>
                                    <div class="kt-radio-inline">
                                        <label class="kt-radio kt-radio--tick kt-radio--brand"><input type="radio" {{ $data->driver_license == 'yes' ? 'checked' : '' }} value="yes" name="driver_license"> Yes <span></span></label>
                                        <label class="kt-radio kt-radio--tick kt-radio--brand"><input type="radio" {{ $data->driver_license == 'yes' ? 'checked' : '' }} value="no" name="driver_license"> No <span></span></label>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" class="form-control driver_license_state d-none" id="driver_license_state" value="{{ $data->driver_license_state }}" name="driver_license_state" placeholder="Which State/Country ?">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control driver_license_number d-none" id="driver_license_number" value="{{ $data->driver_license_number }}" name="driver_license_number" placeholder="Driver License Number">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group wd-100">
                                    <label for="nationality">Nationality</label>
                                    <input type="text" class="form-control" id="nationality" value="{{ $data->nationality }}" name="nationality" placeholder="Nationality">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group wd-100">
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
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label>Gender?</label>
                                    <div class="kt-radio-inline">
                                        <label class="kt-radio kt-radio--tick kt-radio--brand"><input type="radio" {{ $data->gender == 'male' ? 'checked' : '' }} value="male" name="gender"> Male <span></span></label>
                                        <label class="kt-radio kt-radio--tick kt-radio--brand"><input type="radio" {{ $data->gender == 'female' ? 'checked' : '' }} value="female" name="gender"> Female <span></span></label>
                                        <label class="kt-radio kt-radio--tick kt-radio--brand"><input type="radio" {{ $data->gender == 'unknown' ? 'checked' : '' }} value="unknown" name="gender"> Do not want to specify <span></span></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label>Your Date of Birth?</label>
                                    <input type="text" class="form-control" id="kt_datepicker_1" value="{{ $data->date_of_birth }}" name="date_of_birth" readonly placeholder="Select date" />
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="kt-portlet__foot">
                    <div class="kt-form__actions">
                        <div class="row">
                            <div class="col-lg-3 col-xl-3">
                            </div>
                            <div class="col-lg-9 col-xl-9">
                                <button type="submit" class="btn btn-success">Update</button>&nbsp;
                                {{-- <button type="reset" class="btn btn-secondary">Cancel</button> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
