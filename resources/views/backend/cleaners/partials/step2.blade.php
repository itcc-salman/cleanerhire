<div class="kt-wizard-v1__form">
    <div class="form-group">
        <label>Are you an individual or an agency?</label>
        <div class="kt-radio-inline">
            <label class="kt-radio kt-radio--tick kt-radio--brand"><input type="radio" value="cleaner" name="role"> Individual <span></span></label>
            <label class="kt-radio kt-radio--tick kt-radio--brand"><input type="radio" value="agency" name="role"> Agency <span></span></label>
        </div>
    </div>
    <div class="form-group">
        <label>Do you want to register as TFN or ABN?</label>
        <div class="kt-radio-inline">
            <label class="kt-radio kt-radio--tick kt-radio--brand"><input type="radio" id="radio_abn" value="abn" name="tfn_or_abn" > ABN <span></span></label>
            <label class="kt-radio kt-radio--tick kt-radio--brand"><input type="radio" id="radio_tfn" value="tfn" name="tfn_or_abn"> TFN <span></span></label>
        </div>
        <div class="">
            <input type="text" class="form-control d-none" id="tfn" name="tfn" placeholder="TFN">
            <input type="text" class="form-control d-none" id="abn" name="abn" placeholder="ABN">
        </div>
    </div>
    <div class="form-group">
        <label>Are you an Australian / NZ Citizen or a Permanent Resident?</label>
        <div class="kt-radio-inline">
            <label class="kt-radio kt-radio--tick kt-radio--brand"><input type="radio" value="citizen" name="visa_status"> Australian / NZ Citizen <span></span></label>
            <label class="kt-radio kt-radio--tick kt-radio--brand"><input type="radio" value="pr" name="visa_status"> Permanent Resident <span></span></label>
            <label class="kt-radio kt-radio--tick kt-radio--brand"><input type="radio" value="other" name="visa_status"> Other (Please Specify) <span></span></label>
        </div>
        <div class="">
            <input type="text" class="form-control d-none" id="visa_status_other" name="visa_status_other" placeholder="State/Country">
        </div>
    </div>
    <div class="form-group">
        <label>Do you have a Police Check? (Must be within last 12 months)</label>
        <div class="kt-radio-inline">
            <label class="kt-radio kt-radio--tick kt-radio--brand"><input type="radio" value="yes" name="police_check"> Yes <span></span></label>
            <label class="kt-radio kt-radio--tick kt-radio--brand"><input type="radio" value="no" name="police_check"> No <span></span></label>
        </div>
    </div>
    <div class="form-group">
        <label>Do you have your own car?</label>
        <div class="kt-radio-inline">
            <label class="kt-radio kt-radio--tick kt-radio--brand"><input type="radio" value="yes" name="own_car"> Yes <span></span></label>
            <label class="kt-radio kt-radio--tick kt-radio--brand"><input type="radio" value="no" name="own_car"> No <span></span></label>
        </div>
    </div>
    <div class="form-group">
        <label>Do you have a Driver License?</label>
        <div class="kt-radio-inline">
            <label class="kt-radio kt-radio--tick kt-radio--brand"><input type="radio" value="yes" name="driver_license"> Yes <span></span></label>
            <label class="kt-radio kt-radio--tick kt-radio--brand"><input type="radio" value="no" name="driver_license"> No <span></span></label>
        </div>
        <div class="">
            <input type="text" class="form-control driver_license_state d-none" id="driver_license_state" name="driver_license_state" placeholder="Which State/Country ?">
        </div>
        <div class="">
            <input type="text" class="form-control driver_license_number d-none" id="driver_license_number" name="driver_license_number" placeholder="Driver License Number">
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
            <label class="kt-radio kt-radio--tick kt-radio--brand"><input type="radio" value="male" name="gender"> Male <span></span></label>
            <label class="kt-radio kt-radio--tick kt-radio--brand"><input type="radio" value="female" name="gender"> Female <span></span></label>
            <label class="kt-radio kt-radio--tick kt-radio--brand"><input type="radio" value="unknown" name="gender"> Do not want to specify <span></span></label>
        </div>
    </div>
    <div class="form-group">
        <label>Your Date of Birth?</label>
        <input type="text" class="form-control" id="kt_datepicker_1" name="date_of_birth" readonly placeholder="Select date" />
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
                <p class="m-0 p-0"><span>1. Driving License</span><span id="doc_driving_licence_file_name"></span></p>
                <p class="m-0 p-0"><span>2. Medical Card</span><span id="doc_medicare_card_file_name"></span></p>
                <p class="m-0 p-0"><span>3. Passport</span><span id="doc_passport_file_name"></span></p>
                <p class="m-0 p-0"><span>4. Utility Bill</span><span id="doc_bank_statement_file_name"></span></p>
                <p class="m-0 p-0"><span>5. Bank Statement</span><span id="doc_utility_bill_file_name"></span></p>
                <p class="m-0 p-0"><span>6. Police Check</span><span id="doc_certifications_file_name"></span></p>
                <p class="m-0 p-0"><span>7. Certifications</span><span id="doc_police_check_file_name"></span></p>
            </div>
        </div>
    </div>

</div>
