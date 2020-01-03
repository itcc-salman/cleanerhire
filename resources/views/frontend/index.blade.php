@extends('frontend.layouts.master')
@section('content')
<!--Web_Banner-->
<div class="web_banner">
    <div class="container-fluid">
        <div class="banner_main">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="banner_text">
                        <h2>Get Anything Done</h2>
                        <p>Thousands of trusted Cleaner happy to help.</p>

                        <div class="banner_form">
                            <h3>Book Your Local, Trusted Cleaner</h3>
                            <form method="post">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="bf_tab">
                                            <input type="text" name="postcode" value="" required placeholder="Enter your post code">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <div class="bf_tab">
                                            <button type="submit">Find cleaner</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div id="sg-carousel" class="carousel slide carousel-fade" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#sg-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#sg-carousel" data-slide-to="1" class=""></li>
                            <li data-target="#sg-carousel" data-slide-to="2" class=""></li>
                            <li data-target="#sg-carousel" data-slide-to="3" class=""></li>
                        </ol>

                        <div class="carousel-inner">
                            <div class="item active">
                                <img src="{{ asset('front/images/slider_1.jpg') }}" alt="">
                            </div>
                            <div class="item">
                                <img src="{{ asset('front/images/slider_2.jpg') }}" alt="">
                            </div>
                            <div class="item">
                                <img src="{{ asset('front/images/slider_3.jpg') }}" alt="">
                            </div>
                            <a class="carousel-control left" href="#sg-carousel" data-slide="prev">‹</a>
                            <a class="carousel-control right" href="#sg-carousel" data-slide="next">›</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="banner_icon">
                        <ul>
                            <li><img src="{{ asset('front/images/icon_1.png') }}" alt=""></li>
                            <li><img src="{{ asset('front/images/icon_2.png') }}" alt=""></li>
                            <li><img src="{{ asset('front/images/icon_3.png') }}" alt=""></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Web_Banner-->

<!--Web_Video_Section-->
<div class="web_video_section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="video_section">
                    <a href="#"><img src="{{ asset('front/images/video_img.png') }}" alt=""></a>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="video_title">
                    <h2>How does cleaner hire work?</h2>
                    <p>In quis libero pharetra, pellentesque erat vel, placerat tortor. Donec placerat rhoncus porttitor. Maecenas eget purus quis nisl aliquet accumsan.<br/><br/>

                    In quis libero pharetra, pellentesque erat vel, placerat tortor. Donec placerat rhoncus porttitor.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Web_Video_Section-->

<!--Web_Our_Services-->
<div class="web_our_services">
    <div class="container">
        <div class="comman_title">
            <h2>Cleaner Hire make your life easier</h2>
            <p>In quis libero pharetra, pellentesque erat vel, placerat tortor. <br/>Donec placerat rhoncus porttitor. Maecenas eget purus quis nisl aliquet accumsan.</p>
        </div>
        <div class="os_tabs">
            <div class="os_tab">
                <img src="{{ asset('front/images/service_icon1.png') }}" alt="">
                <span>Full House Cleaning</span>
            </div>
            <div class="os_tab os_tab_spe">
                <img src="{{ asset('front/images/service_icon2.png') }}" alt="">
                <span>End of Lease Cleaning</span>
            </div>
            <div class="os_tab">
                <img src="{{ asset('front/images/service_icon3.png') }}" alt="">
                <span>Steam/Carpet Cleaning</span>
            </div>
            <div class="os_tab os_tab_spe">
                <img src="{{ asset('front/images/service_icon4.png') }}" alt="">
                <span>Grout Cleaning </span>
            </div>
            <div class="os_tab">
                <img src="{{ asset('front/images/service_icon5.png') }}" alt="">
                <span>Window Cleaning </span>
            </div>
            <div class="os_tab os_tab_spe">
                <img src="{{ asset('front/images/service_icon6.png') }}" alt="">
                <span>Oven Cleaning</span>
            </div>
            <div class="os_tab">
                <img src="{{ asset('front/images/service_icon7.png') }}" alt="">
                <span>Refrigerator Cleaning</span>
            </div>
            <div class="os_tab os_tab_spe">
                <img src="{{ asset('front/images/service_icon8.png') }}" alt="">
                <span>Stripping and Sealing</span>
            </div>
            <div class="os_tab">
                <img src="{{ asset('front/images/service_icon9.png') }}" alt="">
                <span>Duct Cleaning</span>
            </div>
            <div class="os_tab os_tab_spe">
                <img src="{{ asset('front/images/service_icon10.png') }}" alt="">
                <span>Office Cleaning</span>
            </div>
        </div>
        <div class="clear"><br/></div>
        <div class="text-center">
            <a href="#" class="btn_default_button">View All Services</a>
        </div>
    </div>
</div>
<!--Web_Our_Services-->

<!--Web_Most_Trusted-->
<div class="web_most_trusted">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="most_trusted">
                    <img src="{{ asset('front/images/trusted_img1.jpg') }}" alt="">
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="most_trusted">
                    <h2>We’re Australia’s Most Trusted House Cleaning service!</h2>
                    <p>In quis libero pharetra, pellentesque erat vel, placerat tortor. Donec placerat rhoncus porttitor. Maecenas eget purus quis nisl aliquet accumsan.Duis eget quam ut diam condimentum luctus. Sed euismod porttitor augue, et pulvinar diam luctus et.<br/><br/>

                    Nam ac justo est. Sed commodo sapien et pretium pellentesque. Duis ac tortor nec lectus tempus bibendum. Duis eget quam ut diam condimentum luctus. Sed euismod porttitor augue, et pulvinar diam luctus et.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Web_Most_Trusted-->

<!--Web_Testimonials-->
<div class="web_testimonials">
    <div class="container">
        <h2>Our Customer Review</h2>
        <div id="testimonial-slider" class="owl-carousel">
            <div class="testimonial">
                <div class="testimonial-content">
                    <p class="description">Cleaner Hire did a fantastic job. They want above and beyond and am completely satisfied with the whole process from booking to finish. Will be recommending simply maid to friends and family. Thank you!!!</p>
                    <div class="star">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <div class="name">
                        <h3 class="title">Peter Rodwell</h3>
                    </div>
                </div>
            </div>
            <div class="testimonial">
                <div class="testimonial-content">
                    <p class="description">We would like to thank BBA especially Rob for his professional assistances to guide us through every stage of buying a business. He's always there with us from searching businesses to the settlement stage. Other than that he helped us to negotiate the purchase price and saved us 30% from the asking price. Highly recommend BBA for someone looking for a business.</p>
                    <div class="star">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <div class="name">
                        <h3 class="title">Nina Lu</h3>
                    </div>
                </div>
            </div>
            <div class="testimonial">
                <div class="testimonial-content">
                    <p class="description">Cleaner Hire did a fantastic job. They want above and beyond and am completely satisfied with the whole process from booking to finish. Will be recommending simply maid to friends and family. Thank you!!!</p>
                    <div class="star">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <div class="name">
                        <h3 class="title">Peter Rodwell</h3>
                    </div>
                </div>
            </div>
            <div class="testimonial">
                <div class="testimonial-content">
                    <p class="description">We would like to thank BBA especially Rob for his professional assistances to guide us through every stage of buying a business. He's always there with us from searching businesses to the settlement stage. Other than that he helped us to negotiate the purchase price and saved us 30% from the asking price. Highly recommend BBA for someone looking for a business.</p>
                    <div class="star">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <div class="name">
                        <h3 class="title">Nina Lu</h3>
                    </div>
                </div>
            </div>
            <div class="testimonial">
                <div class="testimonial-content">
                    <p class="description">Cleaner Hire did a fantastic job. They want above and beyond and am completely satisfied with the whole process from booking to finish. Will be recommending simply maid to friends and family. Thank you!!!</p>
                    <div class="star">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <div class="name">
                        <h3 class="title">Peter Rodwell</h3>
                    </div>
                </div>
            </div>
            <div class="testimonial">
                <div class="testimonial-content">
                    <p class="description">We would like to thank BBA especially Rob for his professional assistances to guide us through every stage of buying a business. He's always there with us from searching businesses to the settlement stage. Other than that he helped us to negotiate the purchase price and saved us 30% from the asking price. Highly recommend BBA for someone looking for a business.</p>
                    <div class="star">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <div class="name">
                        <h3 class="title">Nina Lu</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Web_Testimonials-->

<!--Web_Why_Section-->
<div class="web_why_section">
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

<!--Web_Get_It_Done_Today-->
<div class="web_get_it_done_today">
    <div class="container">
        <div class="get_it_done_today">
            <h2>Have something to-do? Get it done today</h2>
            <a href="#" class="btn_default_button">Get Started Now</a>
        </div>
    </div>
</div>
<!--Web_Get_It_Done_Today-->

<!--Web_Most_Trusted-->
<div class="web_most_trusted">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="most_trusted">
                    <img src="{{ asset('front/images/trusted_img1.jpg') }}" alt="">
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="most_trusted">
                    <h2>We’re Australia’s Most Trusted House Cleaning service!</h2>
                    <p>In quis libero pharetra, pellentesque erat vel, placerat tortor. Donec placerat rhoncus porttitor. Maecenas eget purus quis nisl aliquet accumsan.Duis eget quam ut diam condimentum luctus. Sed euismod porttitor augue, et pulvinar diam luctus et.<br/><br/>

                    Nam ac justo est. Sed commodo sapien et pretium pellentesque. Duis ac tortor nec lectus tempus bibendum. Duis eget quam ut diam condimentum luctus. Sed euismod porttitor augue, et pulvinar diam luctus et.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Web_Most_Trusted-->
@endsection
