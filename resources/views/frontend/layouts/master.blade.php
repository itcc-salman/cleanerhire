<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Cleaner Hire') }}</title>

    <link rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/owl.carousel.min.css') }}">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&display=swap" rel="stylesheet">

</head>
<body>
    <div class="web_size">
    @include('frontend.layouts.header')
    @yield('content')
    @include('frontend.layouts.footer')
    <!--Login_and_Register_Popup-->
    <div id="hire_login" class="modal fade">
        <div class="modal-dialog modal-login">
            <div class="modal-content">
                <form method="POST" action="{{ route('login') }}" id="login_form">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Log In</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="hire_login_tab">
                            <label>Email</label>
                            <input type="email" required name="email" autocomplete="off">
                        </div>
                        <div class="hire_login_tab">
                            <label>Password</label>
                            <input type="password" required name="password" autocomplete="current-password">
                            <a href="javascript:void(0)" class="forgot_pass">Forgot Password?</a>
                        </div>
                        <div class="hire_login_tab">
                            <input type="submit" class="btn_login" value="Login">
                        </div>
                        <div class="hire_login_title">
                            <h5><span class="line"></span> or login with <span class="line"></span></h5>
                        </div>
                        <div class="hire_login_socials">
                            <a href="#" class="facebook"><img src="{{ asset('front/images/fb_icon.png') }}" alt=""><span>Facebook</span></a>
                            <a href="#" class="google"><img src="{{ asset('front/images/google_icon.png') }}" alt=""><span>Google</span></a>
                        </div>
                        <div class="hire_login_footer">
                            <label>Don't have an account ?</label>
                            <a href="#" class="btn_sign_up">Sign up</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="hire_register" class="modal fade">
        <div class="modal-dialog modal-login">
            <div class="modal-content">
                <form action="#" method="post">
                    <div class="modal-header">
                        <h4 class="modal-title">Join us</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="hire_login_tab">
                            <label>Email</label>
                            <input type="email" required autocomplete="username">
                        </div>
                        <div class="hire_login_tab">
                            <label>Password</label>
                            <input type="password" required autocomplete="new-password">
                            <a href="#" class="forgot_pass">Forgot Password?</a>
                        </div>
                        <div class="hire_login_tab">
                            <input type="submit" class="btn_login" value="Join us">
                        </div>
                        <div class="hire_login_title">
                            <h5><span class="line"></span> or sign up with <span class="line"></span></h5>
                        </div>
                        <div class="hire_login_socials">
                            <a href="#" class="facebook"><img src="{{ asset('front/images/fb_icon.png') }}" alt=""><span>Facebook</span></a>
                            <a href="#" class="google"><img src="{{ asset('front/images/google_icon.png') }}" alt=""><span>Google</span></a>
                        </div>
                        <div class="hire_login_checkbox">
                            <input type="checkbox" >
                            <span>Please don't send me tips or marketing via email or sms.</span>
                        </div>
                        <div class="hire_login_condition">
                            <p>By signing up, I agree to CleanerHire <a href="#">Terms &amp; Conditions</a>, and <a href="#">Community Guidelines</a>. <a href="#">Privacy Policy</a>. </p>
                        </div>
                        <div class="hire_login_footer">
                            <label>Already have an account ?</label>
                            <a href="#" class="btn_sign_up">Log in</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--Login_and_Register_Popup-->
</div>

    <script src="{{ asset('front/js/jquery.min.js') }}"></script>
    <script src="{{ asset('front/js/bootstrap.min.js') }}"></script>
    <script>
        $(window).on("scroll", function() {
            if($(window).scrollTop() > 42) {
                $(".navbar-default").addClass("active");
                $(".navbar-toggle").addClass("active");
                $(".logo").addClass("active");
            } else {
                //remove the background property so it comes transparent again (defined in your css)
                $(".navbar-default").removeClass("active");
                $(".navbar-toggle").removeClass("active");
                $(".logo").removeClass("active");
            }
        });
    </script>
    <script src="{{ asset('front/js/aos.js') }}"></script>
    <script>
        AOS.init({
            easing: 'ease-in-out-sine'
        });
    </script>
    <script src="{{ asset('front/js/owl.carousel.min.js') }}"></script>
    <script>
    $('.carousel').carousel({
      interval: 10000
    });
    $(document).ready(function(){
        $("#testimonial-slider").owlCarousel({
            items:2,
            itemsDesktop:[1000,2],
            itemsDesktopSmall:[979,2],
            itemsTablet:[768,1],
            pagination:true,
            autoPlay:false
        });

        $(document).on('submit', '#login_form', function(e) {
            e.preventDefault();
            // check for validation
            $.ajax({
                type: "POST",
                url: '{{ route('login') }}',
                dataType: "JSON",
                data: $(this).serialize(),
                success: function(data) {
                    console.log(data);
                    if( data.message ) {
                        alert(data.message);
                        return;
                    }
                }
            })
        });
    });
    </script>
</body>
</html>
