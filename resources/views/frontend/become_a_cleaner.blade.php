@extends('frontend.layouts.master')
@section('content')
<!--Web_Become_A_Cleaner-->
<div class="web_become_a_cleaner become_cleaner_bg">
    <div class="container">
        <div class="become_a_cleaner">
            <h2>Become a Cleaner</h2>
            <p>In quis libero pharetra, pellentesque erat vel, placerat tortor. Donec placerat rhoncus porttitor. Maecenas eget purus quis nisl aliquet accumsan.</p>
            <a href="{{ route('front.register_cleaner') }}" class="btn_default_button">Get Started</a>
        </div>
    </div>
</div>
<!--Web_Become_A_Cleaner-->

<!--Web_Cleaner_Hire-->
<div class="web_cleaner_hire">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="cleaner_hire_img">
                    <img src="{{ asset('front/images/cleaner_hire_img1.jpg') }}" alt="">
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="cleaner_hire_text">
                    <h2>Why become a CleanerHire?</h2>
                    <p>Here are just a few great reasons</p>

                    <h3><i class="fa fa-address-card-o" aria-hidden="true"></i> <span>Be your own Boss</span></h3>
                    <p>You choose what you do, when you do it and for how much - the power is in your hands.</p>

                    <h3><i class="fa fa-credit-card" aria-hidden="true"></i> <span>Secured payments</span></h3>
                    <p>We secure payment before you start work so you can be sure it’s there when you’re done.</p>

                    <h3><i class="fa fa-check" aria-hidden="true"></i> <span>Every day is different</span></h3>
                    <p>We get thousands of new and varied tasks that need doing every day, so no 2 days will be the same!</p>

                    <br/>
                    <a href="{{ route('front.register_cleaner') }}" class="btn_default_button">Get Started</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Web_Cleaner_Hire-->

<!--Web_Why_Section-->
<div class="web_why_section web_ch_bg">
    <div class="container">
        <div class="comman_title">
            <h2>Why choose Cleaner Hire ?</h2>
            <p>In quis libero pharetra, pellentesque erat vel, placerat tortor. <br/>Donec placerat rhoncus porttitor. Maecenas eget purus quis nisl aliquet accumsan.</p>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="ws_tab">
                    <img src="{{ asset('front/images/why_icon1.png') }}" alt="">
                    <h4>100% Statisfaction Guarantee</h4>
                    <p>In quis libero pharetra, pellentesque erat vel, placerat tortor. Donec placerat rhoncus porttitor. Maecenas eget purus quis nisl aliquet accumsan.</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="ws_tab">
                    <img src="{{ asset('front/images/why_icon2.png') }}" alt="">
                    <h4>Bonded and Insured Cleaners</h4>
                    <p>In quis libero pharetra, pellentesque erat vel, placerat tortor. Donec placerat rhoncus porttitor. Maecenas eget purus quis nisl aliquet accumsan.</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="ws_tab">
                    <img src="{{ asset('front/images/why_icon3.png') }}" alt="">
                    <h4>5 Star Rated Service</h4>
                    <p>In quis libero pharetra, pellentesque erat vel, placerat tortor. Donec placerat rhoncus porttitor. Maecenas eget purus quis nisl aliquet accumsan.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Web_Why_Section-->

<!--Web_Cleaner_Hire-->
<div class="web_cleaner_hire">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 pull-right">
                <div class="cleaner_hire_img">
                    <img src="{{ asset('front/images/cleaner_hire_img2.jpg') }}" alt="">
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="cleaner_hire_text">
                    <h2>Protection</h2>
                    <p>It’s nice to have a safety net – that’s why we’ve got insurance available to help you do tasks with peace of mind.</p>

                    <h3><i class="fa fa-address-card-o" aria-hidden="true"></i> <span>Public Liability*</span></h3>
                    <p>In quis libero pharetra, pellentesque erat vel, placerat tortor. Donec placerat rhoncus porttitor. Maecenas eget purus quis nisl aliquet accumsan.</p>

                    <h3><i class="fa fa-credit-card" aria-hidden="true"></i> <span>Injury*</span></h3>
                    <p>In quis libero pharetra, pellentesque erat vel, placerat tortor. Donec placerat rhoncus porttitor. Maecenas eget purus quis nisl aliquet accumsan.</p>

                    <h3><i class="fa fa-check" aria-hidden="true"></i> <span>Income Protection*</span></h3>
                    <p>In quis libero pharetra, pellentesque erat vel, placerat tortor. Donec placerat rhoncus porttitor. Maecenas eget purus quis nisl aliquet accumsan.</p>

                    <br/>
                    <a href="{{ route('front.register_cleaner') }}" class="btn_default_button">Get Started</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Web_Cleaner_Hire-->

<!--Web_FAQ-->
<div class="web_faq_section web_ch_bg">
    <div class="container">
        <div class="comman_title">
            <h2>FAQ</h2>
        </div>
        <div class="col-md-10 col-md-offset-1">
            <div class="row">
                <div class="col-md-6 col-xs-6 col-sm-12">
                    <div class="faq_section_tab">
                        <h3>What type of tasks are available?</h3>
                        <p>In quis libero pharetra, pellentesque erat vel, placerat tortor. Donec placerat rhoncus porttitor. Maecenas eget purus quis nisl aliquet accumsan.In quis libero pharetra, pellentesque erat vel, placerat tortor. Donec placerat rhoncus porttitor. Maecenas eget purus quis nisl aliquet accumsan.In quis libero pharetra, pellentesque erat vel, placerat tortor. Donec placerat rhoncus porttitor. Maecenas eget purus quis nisl aliquet accumsan.</p>
                    </div>
                    <div class="faq_section_tab">
                        <h3>What type of tasks are available?</h3>
                        <p>In quis libero pharetra, pellentesque erat vel, placerat tortor. Donec placerat rhoncus porttitor. Maecenas eget purus quis nisl aliquet accumsan.In quis libero pharetra, pellentesque erat vel, placerat tortor. Donec placerat rhoncus porttitor.</p>
                    </div>
                    <div class="faq_section_tab">
                        <h3>What type of tasks are available?</h3>
                        <p>In quis libero pharetra, pellentesque erat vel, placerat tortor. Donec placerat rhoncus porttitor. Maecenas eget purus quis nisl aliquet accumsan.In quis libero pharetra, pellentesque erat vel, placerat tortor. Donec placerat rhoncus porttitor.</p>
                    </div>
                    <div class="faq_section_tab">
                        <h3>What type of tasks are available?</h3>
                        <p>In quis libero pharetra, pellentesque erat vel, placerat tortor. Donec placerat rhoncus porttitor. Maecenas eget purus quis nisl aliquet accumsan.In quis libero pharetra, pellentesque erat vel, placerat tortor. Donec placerat rhoncus porttitor.</p>
                    </div>
                </div>
                <div class="col-md-6 col-xs-6 col-sm-12">
                    <div class="faq_section_tab">
                        <h3>Who will I be working with?</h3>
                        <p>In quis libero pharetra, pellentesque erat vel, placerat tortor. Donec placerat rhoncus porttitor. Maecenas eget purus quis nisl aliquet accumsan.In quis libero pharetra, pellentesque erat vel, placerat tortor. Donec placerat rhoncus porttitor.</p>
                    </div>
                    <div class="faq_section_tab">
                        <h3>Is there insurance?</h3>
                        <p>In quis libero pharetra, pellentesque erat vel, placerat tortor. Donec placerat rhoncus porttitor. Maecenas eget purus quis nisl aliquet accumsan.In quis libero pharetra, pellentesque erat vel, placerat tortor. Donec placerat rhoncus porttitor.</p>
                    </div>
                    <div class="faq_section_tab">
                        <h3>Can I get task alerts?</h3>
                        <p>In quis libero pharetra, pellentesque erat vel, placerat tortor. Donec placerat rhoncus porttitor. Maecenas eget purus quis nisl aliquet accumsan.In quis libero pharetra, pellentesque erat vel, placerat tortor. Donec placerat rhoncus porttitor.</p>
                    </div>
                    <div class="faq_section_tab">
                        <h3>How do I get assigned to a task?</h3>
                        <p>In quis libero pharetra, pellentesque erat vel, placerat tortor. Donec placerat rhoncus porttitor. Maecenas eget purus quis nisl aliquet accumsan.In quis libero pharetra, pellentesque erat vel, placerat tortor. Donec placerat rhoncus porttitor.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Web_FAQ-->
@endsection
