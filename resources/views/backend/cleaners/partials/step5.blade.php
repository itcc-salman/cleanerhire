<style type="text/css" media="screen">
.cleaner_output { width: 100%; border-top: 1px solid #DDD; border-left: 1px solid #DDD; border-right: 1px solid #DDD; padding:0; }
.cleaner_output_tab { border-bottom: 1px solid #DDD; padding: 5px 15px; }
.cleaner_output_tab label { font-size: 15px; color: #1e1e2d; display: inline-block; margin: 0; }
.cleaner_output_tab label.one { width: 140px; }
.cleaner_output_tab label.two { width: 75%; }
.cleaner_output_tab span { font-size: 15px; color: #646c9a; text-transform: capitalize; }

.c_output_service { width: 100%; border-top: 1px solid #DDD; border-left: 1px solid #DDD; border-right: 1px solid #DDD; padding:0; }
.c_output_service_tab { border-bottom: 1px solid #DDD; padding: 5px 15px; }
.c_output_service_tab h4 { font-size: 16px; font-weight: 400; color: #1e1e2d; }
.c_output_service_tab label { padding-right: 15px; font-size: 15px; color: #1e1e2d; }
.c_output_service_tab span { font-size: 15px; color: #646c9a; }

.c_output_availability { width: 100%; border-top: 1px solid #DDD; border-left: 1px solid #DDD; border-right: 1px solid #DDD; padding:0; }

.c_output_availability_tab { border-bottom: 1px solid #DDD; padding: 5px 15px; }
.c_output_availability_tab label { padding-right: 15px; font-size: 15px; color: #1e1e2d; text-transform: capitalize; }
.c_output_availability_tab span { font-size: 14px; margin: 6px 8px; background: #f2f2f2; padding: 2px 10px; color: #646c9a; width: 160px; display: block; text-align: center; }
</style>

<div class="kt-wizard-v1__review">
    <div class="kt-wizard-v1__review-item">
        <div class="kt-wizard-v1__review-title">
            Personal Details
        </div>
        <div class="kt-wizard-v1__review-content">
           <div class="cleaner_output">
                <div class="cleaner_output_tab">
                    <label class="one">First Name: </label>
                    <span>{{$cleaner->first_name}}</span>
                </div>
                <div class="cleaner_output_tab">
                    <label class="one">Last Name: </label>
                    <span>{{$cleaner->last_name}}</span>
                </div>
                <div class="cleaner_output_tab">
                    <label class="one">Email: </label>
                    <span>{{$cleaner->email}}</span>
                </div>
                <div class="cleaner_output_tab">
                    <label class="one">Phone: </label>
                    <span>{{$cleaner->phone}}</span>
                </div>
                <div class="cleaner_output_tab">
                    <label class="one">Mobile: </label>
                    <span>{{$cleaner->mobile}}</span>
                </div>
                <div class="cleaner_output_tab">
                    <label class="one">Address Line 1: </label>
                    <span>{{$cleaner->address_line_1}}</span>
                </div>
                <div class="cleaner_output_tab">
                    <label class="one">Address Line 2: </label>
                    <span>{{$cleaner->address_line_2}}</span>
                </div>
                <div class="cleaner_output_tab">
                    <label class="one">Postcode: </label>
                    <span>{{$cleaner->postcode}}</span>
                </div>
                <div class="cleaner_output_tab">
                    <label class="one">City: </label>
                    <span>{{$cleaner->city}}</span>
                </div>
                <div class="cleaner_output_tab">
                    <label class="one">State: </label>
                    <span>{{$cleaner->state}}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="kt-wizard-v1__review-item">
        <div class="kt-wizard-v1__review-title">
            Visa & Documents
        </div>
        <div class="kt-wizard-v1__review-content">
           <div class="cleaner_output">
                <div class="cleaner_output_tab">
                    <label class="two">Are you an individual or an agency?</label>
                    @if($user->role == 'cleaner')
                        <span>Individual</span>
                    @else
                        <span>Agency</span>
                    @endif
                </div>
                <div class="cleaner_output_tab">
                    <label class="two">Do you want to register as TFN or ABN?</label>
                    @if($cleaner->tfn != '')
                        <span>TFN: {{$cleaner->tfn}}</span>
                    @endif
                    @if($cleaner->abn != '')
                        <span>ABN: {{$cleaner->abn}}</span>
                    @endif

                </div>
                <div class="cleaner_output_tab">
                    <label class="two">Are you an Australian / NZ Citizen or a Permanent Resident?</label>
                    @if($cleaner->visa_status == 'citizen')
                        <span>Australian / NZ Citizen</span>
                    @elseif($cleaner->visa_status == 'pr')
                        <span>Permanent Resident</span>
                    @elseif($cleaner->visa_status == 'other')
                        <span>Other: {{$cleaner->visa_status_other}}</span>
                    @endif
                </div>
                <div class="cleaner_output_tab">
                    <label class="two">Do you have a Police Check? (Must be within last 12 months)</label>
                    <span>{{$cleaner->police_check}}</span>
                </div>
                <div class="cleaner_output_tab">
                    <label class="two">Do you have your own car?</label>
                    <span>{{$cleaner->own_car}}</span>
                </div>
                <div class="cleaner_output_tab">
                    <label class="two">Do you have a Driver License?</label>
                    <span>{{$cleaner->driver_license}}</span>
                    @if($cleaner->driver_license == 'yes')
                    <label class="two">Which State/Country?</label>
                    <span>{{$cleaner->driver_license_state}}</span>
                    <label class="two">Driver License Number</label>
                    <span>{{$cleaner->driver_license_number}}</span>
                    @endif
                </div>
                <div class="cleaner_output_tab">
                    <label class="two">Nationality</label>
                    <span>{{$cleaner->nationality}}</span>
                </div>
                <div class="cleaner_output_tab">
                    <label class="two">Which Languages you speak?</label>
                    @foreach($cleaner->language as $language)
                    <span>{{$language->lname}}</span>
                    @endforeach
                </div>
                <div class="cleaner_output_tab">
                    <label class="two">Gender?</label>
                    <span>{{$cleaner->gender}}</span>
                </div>
                <div class="cleaner_output_tab">
                    <label class="two">Your Date of Birth?</label>
                    <span>{{$cleaner->date_of_birth}}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="kt-wizard-v1__review-item">
        <div class="kt-wizard-v1__review-title">
            Services
        </div>
        <div class="kt-wizard-v1__review-content">
            <div class="c_output_service">
                @foreach($cleaner->services as $service)
                    <div class="c_output_service_tab">
                    <h4>{{$service->name}}</h4>
                    <label>Do you have relevant equipments?</label>
                    <span>{{$service->has_equipments==1 ? 'Yes' : 'No' }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="kt-wizard-v1__review-item">
        <div class="kt-wizard-v1__review-title">
            Availability
        </div>
        <div class="kt-wizard-v1__review-content">
            <div class="c_output_availability">
                @foreach( getDays() as $day )
                    <div class="c_output_availability_tab">
                    @php $isClosed = true @endphp
                        <div class="row">
                            <div class="col-3">
                            <label>{{$day}}</label>
                            </div>
                            <div class="col-9">
                            @foreach($cleaner->cleanerTimings as $key => $timings)
                                @if($timings->day == $day)
                                    {{$isClosed = false}}
                                    @if($timings->start_hours == '24' || $timings->end_hours == '24')
                                        <span>24 hours</span>
                                    @else
                                        <span>{{$timings->start_hours}} - {{$timings->end_hours}}</span>
                                    @endif
                                @endif
                            @endforeach
                            @if($isClosed)
                            <span>Closed</span>
                            @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
