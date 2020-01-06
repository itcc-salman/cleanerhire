<div class="kt-wizard-v1__form">
    <div class="form-group">
        <label>First Name</label>
        <input type="text" class="form-control" name="first_name"  value="{{ $cleaner->first_name ?? '' }}">
    </div>
    <div class="form-group">
        <label>Last Name</label>
        <input type="text" class="form-control" name="last_name"  value="{{ $cleaner->last_name ?? '' }}">
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="text" class="form-control" name="email"  value="{{ $cleaner->email ?? '' }}">
        {{-- cleaner@itccdigital.com --}}
    </div>
    <div class="form-group">
        <label>Phone</label>
        <input type="text" class="form-control" name="phone"  value="{{ $cleaner->phone ?? '' }}">
    </div>
    <div class="form-group">
        <label>Mobile</label>
        <input type="text" class="form-control" name="mobile"  value="{{ $cleaner->mobile ?? '' }}">
    </div>
    <div class="form-group">
        <label>Address Line 1</label>
        <input type="text" class="form-control" name="address_line_1"  value="{{ $cleaner->address_line_1 ?? '' }}">
    </div>
    <div class="form-group">
        <label>Address Line 2</label>
        <input type="text" class="form-control" name="address_line_2"  value="{{ $cleaner->address2 ?? '' }}">
    </div>
    <div class="form-group">
        <label>Postcode</label>
        <input type="text" class="form-control" name="postcode"  value="{{ $cleaner->postcode ?? '' }}">
    </div>
    <div class="form-group">
        <label>City</label>
        <input type="text" class="form-control" name="city"  value="{{ $cleaner->city ?? '' }}">
    </div>
    <div class="form-group">
        <label>State</label>
        <input type="text" class="form-control" name="state"  value="{{ $cleaner->state ?? '' }}">
    </div>

</div>
