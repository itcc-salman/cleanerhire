<div class="row">
    <div class="col-xl-12">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">Personal Information <small>update your personal informaiton</small></h3>
                </div>
            </div>
            <form class="kt-form kt-form--label-right" id="personal_info">
                <div class="kt-portlet__body">
                    <div class="kt-section kt-section--first">
                        <div class="kt-section__body">
                            <div class="row">
                                <label class="col-xl-3"></label>
                                <div class="col-lg-9 col-xl-6">
                                    <h3 class="kt-section__title kt-section__title-sm">Cleaner Info:</h3>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Avatar</label>
                                <div class="col-lg-9 col-xl-6">
                                    <div class="kt-avatar kt-avatar--outline" id="kt_user_avatar">
                                        <div class="kt-avatar__holder" style="background-image: url({{ asset('assets/media/users/default.jpg') }})"></div>
                                        <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
                                            <i class="fa fa-pen"></i>
                                            <input type="file" name="profile_avatar" accept=".png, .jpg, .jpeg">
                                        </label>
                                        <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
                                            <i class="fa fa-times"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">First Name</label>
                                <div class="col-lg-9 col-xl-6">
                                    <input class="form-control" name="first_name" type="text" value="{{ $data->first_name }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Last Name</label>
                                <div class="col-lg-9 col-xl-6">
                                    <input class="form-control" name="last_name" type="text" value="{{ $data->last_name }}">
                                </div>
                            </div>
                            {{-- <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Company Name</label>
                                <div class="col-lg-9 col-xl-6">
                                    <input class="form-control" name="company_name" type="text" value="{{ $data->company_name }}">
                                </div>
                            </div> --}}
                            <div class="row">
                                <label class="col-xl-3"></label>
                                <div class="col-lg-9 col-xl-6">
                                    <h3 class="kt-section__title kt-section__title-sm">Contact Info:</h3>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Contact Phone</label>
                                <div class="col-lg-9 col-xl-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i class="la la-phone"></i></span></div>
                                        <input type="text" name="phone" class="form-control" value="{{ $data->getOriginal('phone') }}" placeholder="Phone" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Contact Mobile</label>
                                <div class="col-lg-9 col-xl-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i class="la la-mobile"></i></span></div>
                                        <input type="text" name="mobile" class="form-control" value="{{ $data->getOriginal('mobile') }}" placeholder="Mobile" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Email Address</label>
                                <div class="col-lg-9 col-xl-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i class="la la-at"></i></span></div>
                                        <input type="text" class="form-control" readonly value="{{ $data->email }}" placeholder="Email" aria-describedby="basic-addon1">
                                    </div>
                                    <span class="form-text text-muted">We'll never share your email with anyone else.</span>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-xl-3"></label>
                                <div class="col-lg-9 col-xl-6">
                                    <h3 class="kt-section__title kt-section__title-sm">Address Info:</h3>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Address Line 1</label>
                                <div class="col-lg-9 col-xl-6">
                                    <input class="form-control" name="address_line_1" type="text" value="{{ $data->address_line_1 }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Address Line 2</label>
                                <div class="col-lg-9 col-xl-6">
                                    <input class="form-control" name="address_line_2" type="text" value="{{ $data->address_line_2 }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Postcode</label>
                                <div class="col-lg-9 col-xl-6">
                                    <input class="form-control" name="postcode" type="text" value="{{ $data->postcode }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">City</label>
                                <div class="col-lg-9 col-xl-6">
                                    <input class="form-control" name="city" type="text" value="{{ $data->getOriginal('city') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">State</label>
                                <div class="col-lg-9 col-xl-6">
                                    <input class="form-control" name="state" type="text" value="{{ $data->state }}">
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
                                <button type="submit" id="update_personal_info" class="btn btn-success">Update</button>&nbsp;
                                {{-- <button type="reset" class="btn btn-secondary">Cancel</button> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
