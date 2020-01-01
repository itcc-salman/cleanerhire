<div class="row">
    <div class="col-xl-12">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">Service Areas <small>update your service areas</small></h3>
                </div>
            </div>
            <form class="kt-form kt-form--label-right" id="service_area">
                <div class="kt-portlet__body">
                    <div class="kt-section kt-section--first">
                        <div class="kt-section__body">
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
                                    <label for="kt_datepicker_1">Your Date of Birth?</label>
                                    <input type="text" class="form-control" id="kt_datepicker_1" value="" name="date_of_birth" readonly placeholder="Select date" />
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="kt-portlet__foot">
                    <div class="kt-form__actions">
                        <div class="row">
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
