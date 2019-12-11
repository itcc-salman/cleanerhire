<div class="kt-wizard-v1__form">
    <div class="form-group">
        <label>First Name</label>
        <input type="text" class="form-control" name="first_name" placeholder="First Name" value="{{ $cleaner->first_name ?? 'Vicky' }}">
    </div>
    <div class="form-group">
        <label>Last Name</label>
        <input type="text" class="form-control" name="last_name" placeholder="Last Name" value="{{ $cleaner->last_name ?? 'Vicky' }}">
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="text" class="form-control" name="email" placeholder="Email" value="{{ $cleaner->email ?? 'itcc@itcc.com' }}">
    </div>
    <div class="form-group">
        <label>Phone</label>
        <input type="text" class="form-control" name="phone" placeholder="Phone" value="{{ $cleaner->phone ?? '' }}">
    </div>
    <div class="form-group">
        <label>Mobile</label>
        <input type="text" class="form-control" name="mobile" placeholder="Mobile" value="{{ $cleaner->mobile ?? '' }}">
    </div>
    <div class="form-group">
        <label>Address Line 1</label>
        <input type="text" class="form-control" name="address_line_1" placeholder="Address Line 1" value="{{ $cleaner->address_line_1 ?? '' }}">
    </div>
    <div class="form-group">
        <label>Address Line 2</label>
        <input type="text" class="form-control" name="address_line_2" placeholder="Address Line 2" value="{{ $cleaner->address2 ?? '' }}">
    </div>
    <div class="form-group">
        <label>Postcode</label>
        <input type="text" class="form-control" name="postcode" placeholder="Postcode" value="{{ $cleaner->postcode ?? '' }}">
    </div>
    <div class="form-group">
        <label>City</label>
        <input type="text" class="form-control" name="city" placeholder="City" value="{{ $cleaner->city ?? '' }}">
    </div>
    <div class="form-group">
        <label>State</label>
        <input type="text" class="form-control" name="state" placeholder="State" value="{{ $cleaner->state ?? '' }}">
    </div>

</div>
