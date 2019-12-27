<div class="row">
    <div class="col-xl-12">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">Visa & Documents <small>update your documents</small></h3>
                </div>
            </div>
            <form class="kt-form kt-form--label-right" id="visa_documents">
                <div class="kt-portlet__body">
                    <div class="kt-section kt-section--first">
                        <div class="kt-section__body">
                            <div class="row">
                                <label class="col-xl-3"></label>
                                <div class="col-lg-9 col-xl-6">
                                    <h3 class="kt-section__title kt-section__title-sm">Documents:</h3>
                                </div>
                            </div>
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
                                    <button type="button" onclick="fileupload();" class="btn btn-primary">Upload & Update</button>
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
                                    <p class="m-0 p-0"><span>1. Driving License</span><span id="doc_driving_licence_file_name">: {{$data->doc_driving_licence}}</span></p>
                                    <p class="m-0 p-0"><span>2. Medical Card</span><span id="doc_medicare_card_file_name">: {{$data->doc_medicare_card}}</span></p>
                                    <p class="m-0 p-0"><span>3. Passport</span><span id="doc_passport_file_name">: {{$data->doc_passport}}</span></p>
                                    <p class="m-0 p-0"><span>4. Utility Bill</span><span id="doc_bank_statement_file_name">: {{$data->doc_bank_statement}}</span></p>
                                    <p class="m-0 p-0"><span>5. Bank Statement</span><span id="doc_utility_bill_file_name">: {{$data->doc_utility_bill}}</span></p>
                                    <p class="m-0 p-0"><span>6. Police Check</span><span id="doc_certifications_file_name">: {{$data->doc_certifications}}</span></p>
                                    <p class="m-0 p-0"><span>7. Certifications</span><span id="doc_police_check_file_name">: {{$data->doc_police_check}}</span></p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="kt-portlet__foot">
                    <div class="kt-form__actions">
                        <div class="row d-none">
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
