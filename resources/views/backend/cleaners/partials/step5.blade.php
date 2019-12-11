<div class="kt-wizard-v1__review">
    <div class="kt-wizard-v1__review-item">
        <div class="kt-wizard-v1__review-title">
            Personal Details
        </div>
        <div class="kt-wizard-v1__review-content">
           <div class="">
                <p class="mb-1 bold">
                    <span>First Name: </span>
                    <span>{{$cleaner->first_name}}</span>
                </p>
                <p class="mb-1 bold">
                    <span>Last Name: </span>
                    <span>{{$cleaner->last_name}}</span>
                </p>
                <p class="mb-1 bold">
                    <span>Email: </span>
                    <span>{{$cleaner->email}}</span>
                </p>
                <p class="mb-1 bold">
                    <span>Phone: </span>
                    <span>{{$cleaner->phone}}</span>
                </p>
                <p class="mb-1 bold">
                    <span>Mobile: </span>
                    <span>{{$cleaner->mobile}}</span>
                </p>
                <p class="mb-1 bold">
                    <span>Address Line 1: </span>
                    <span>{{$cleaner->address1}}</span>
                </p>
                <p class="mb-1 bold">
                    <span>Address Line 2: </span>
                    <span>{{$cleaner->address2}}</span>
                </p>
                <p class="mb-1 bold">
                    <span>Postcode: </span>
                    <span>{{$cleaner->postcode}}</span>
                </p>
                <p class="mb-1 bold">
                    <span>City: </span>
                    <span>{{$cleaner->city}}</span>
                </p>
                <p class="mb-1 bold">
                    <span>State: </span>
                    <span>{{$cleaner->state}}</span>
                </p>
            </div>
        </div>
    </div>
    <div class="kt-wizard-v1__review-item">
        <div class="kt-wizard-v1__review-title">
            Visa & Documents
        </div>
        <div class="kt-wizard-v1__review-content">
           <div class="">
                <p class="mb-1 bold">
                    <span>Are you an individual or an agency?</span>
                    @if($user->role == 'cleaner')
                        <span>Individual</span>
                    @else
                        <span>Agency</span>
                    @endif
                </p>
                <p class="mb-1 bold">
                    <span>Do you want to register as TFN or ABN?</span>
                    @if($cleaner->tfn != '')
                        <span>TFN: {{$cleaner->tfn}}</span>
                    @endif
                    @if($cleaner->abn != '')
                        <span>ABN: {{$cleaner->abn}}</span>
                    @endif

                </p>
                <p class="mb-1 bold">
                    <span>Are you an Australian / NZ Citizen or a Permanent Resident?</span>
                    @if($cleaner->visa_status == 'citizen')
                        <span>Australian / NZ Citizen</span>
                    @elseif($cleaner->visa_status == 'pr')
                        <span>Permanent Resident</span>
                    @elseif($cleaner->visa_status == 'other')
                        <span>Other: {{$cleaner->visa_status_other}}</span>
                    @endif
                </p>
                <p class="mb-1 bold">
                    <span>Do you have a Police Check? (Must be within last 12 months)</span>
                    <span>{{$cleaner->police_check}}</span>
                </p>
                <p class="mb-1 bold">
                    <span>Do you have your own car?</span>
                    <span>{{$cleaner->own_car}}</span>
                </p>
                <p class="mb-1 bold">
                    <span>Do you have a Driver License?</span>
                    <span>{{$cleaner->driver_license}}</span>
                    @if($cleaner->driver_license == 'yes')
                    <span>Which State/Country?</span>
                    <span>{{$cleaner->driver_license_state}}</span>
                    <span>Driver License Number</span>
                    <span>{{$cleaner->driver_license_number}}</span>
                    @endif
                </p>
                <p class="mb-1 bold">
                    <span>Nationality</span>
                    <span>{{$cleaner->nationality}}</span>
                </p>
                <p class="mb-1 bold">
                    <span>Which Languages you speak?</span>
                    @foreach($cleaner->language as $language)
                    <span>{{$language->lname}}</span>
                    @endforeach
                </p>
                <p class="mb-1 bold">
                    <span>Gender?</span>
                    <span>{{$cleaner->gender}}</span>
                </p>
                <p class="mb-1 bold">
                    <span>Your Date of Birth?</span>
                    <span>{{$cleaner->date_of_birth}}</span>
                </p>
            </div>
        </div>
    </div>
    <div class="kt-wizard-v1__review-item">
        <div class="kt-wizard-v1__review-title">
            Services
        </div>
        <div class="kt-wizard-v1__review-content">
            Overnight Delivery with Regular Packaging<br />
            Preferred Morning (8:00AM - 11:00AM) Delivery
        </div>
    </div>
    <div class="kt-wizard-v1__review-item">
        <div class="kt-wizard-v1__review-title">
            Availability
        </div>
        <div class="kt-wizard-v1__review-content">
            Address Line 1<br />
            Address Line 2<br />
            Preston 3072, VIC, Australia
        </div>
    </div>
</div>
