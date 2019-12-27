<div class="row">
    <div class="col-xl-12">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">Change Password <small>update your password</small></h3>
                </div>
            </div>
            <form class="kt-form kt-form--label-right" id="account_info">
                <div class="kt-portlet__body">
                    <div class="kt-section kt-section--first">
                        <div class="kt-section__body">

                            <div class="row">
                                <div class="form-group wd-100">
                                    <label for="old_password">Old Password</label>
                                    <input type="password" class="form-control" id="old_password" value="" name="old_password" placeholder="Old Password">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group wd-100">
                                    <label for="new_password">New Password</label>
                                    <input type="password" class="form-control" id="new_password" value="" name="new_password" placeholder="New Password">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group wd-100">
                                    <label for="confirm_new_password">Confirm Password</label>
                                    <input type="password" class="form-control" id="confirm_new_password" value="" name="confirm_new_password" placeholder="Confirm Password">
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
