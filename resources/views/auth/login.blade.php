<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <!-- begin::Head -->
    <head>
        <base href="../../../">
        <meta charset="utf-8" />
        <title>{{ config('app.name', 'Cleaner Hire') }}</title>
        <meta name="description" content="Login page">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!--begin::Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">

        <!--end::Fonts -->

        <!--begin::Page Custom Styles(used by this page) -->
        <link href="{{ asset('assets/css/pages/login/login-1.css') }}" rel="stylesheet" type="text/css" />

        <!--end::Page Custom Styles -->

        <!--begin::Global Theme Styles(used by all pages) -->
        <!-- <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" /> -->
        <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />

        <!--end::Global Theme Styles -->

        <!--end::Layout Skins -->
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />
    </head>

    <!-- end::Head -->

    <!-- begin::Body -->
    <body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

        <!-- begin:: Page -->
        <div class="kt-grid kt-grid--ver kt-grid--root">
            <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v1" id="kt_login">
                <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--desktop kt-grid--ver-desktop kt-grid--hor-tablet-and-mobile">

                    <!--begin::Aside-->
                    <div class="kt-grid__item kt-grid__item--order-tablet-and-mobile-2 kt-grid kt-grid--hor kt-login__aside" style="background-image: url(assets/media/bg/bg-4.jpg);">
                        <div class="kt-grid__item">
                            <a href="{{ route('front.home') }}" class="kt-login__logo">
                                <img src="{{ asset('front/images/logo.png') }}">
                            </a>
                        </div>
                        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver">
                            <div class="kt-grid__item kt-grid__item--middle">
                                <h3 class="kt-login__title">Welcome to Cleaner Hire!</h3>
                                <h4 class="kt-login__subtitle">The ultimate Bootstrap & Angular 6 admin theme framework for next generation web apps.</h4>
                            </div>
                        </div>
                        <div class="kt-grid__item">
                            <div class="kt-login__info">
                                <div class="kt-login__copyright">
                                    &copy 2019 Cleaner Hire
                                </div>
                                <div class="kt-login__menu">
                                    <a href="javascript:void(0)" class="kt-link">Privacy</a>
                                    <a href="javascript:void(0)" class="kt-link">Legal</a>
                                    <a href="javascript:void(0)" class="kt-link">Contact</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--begin::Aside-->

                    <!--begin::Content-->
                    <div class="kt-grid__item kt-grid__item--fluid  kt-grid__item--order-tablet-and-mobile-1  kt-login__wrapper">

                        <!--begin::Head-->
                        <div class="kt-login__head">
                            <span class="kt-login__signup-label">Don't have an account.</span>&nbsp;&nbsp;
                            <a href="{{ route('front.register_customer') }}" class="kt-link kt-login__signup-link">Sign Up!</a>
                        </div>

                        <!--end::Head-->

                        <!--begin::Body-->
                        <div class="kt-login__body">

                            <!--begin::Signin-->
                            <div class="kt-login__form">
                                <div class="kt-login__title">
                                    <h3>{{ __('Login') }}</h3>
                                </div>

                                <!--begin::Form-->
                                <form class="kt-form" id="kt_login_form" method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group validate is-invalid">
                                        <input class="form-control" type="email" id="email" placeholder="Email" name="email" autocomplete="off" value="{{ old('email') }}" autofocus>
                                        @error('email')
                                            <div id="email-error" class="error invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group validate is-invalid">
                                        <input id="password" class="form-control" type="password" placeholder="Password" name="password" autocomplete="current-password">
                                        @error('password')
                                            <div id="password-error" class="error invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="row kt-login__actions">
                                        <div class="col">
                                            <label class="kt-checkbox">
                                                <input id="remember" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>{{ __('Remember Me') }}
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>

                                    <!--begin::Action-->
                                    <div class="kt-login__actions">
                                        @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}" id="kt_login_forgot" class="kt-link kt-login__link-forgot">{{ __('Forgot Your Password?') }}</a>
                                        @endif
                                        <button id="kt_login_signin_submit" type="submit" class="btn btn-primary btn-elevate kt-login__btn-primary">{{ __('Login') }}</button>
                                    </div>

                                    <!--end::Action-->
                                </form>

                                <!--end::Form-->

                                <!--begin::Divider-->
                                {{-- <div class="kt-login__divider">
                                    <div class="kt-divider">
                                        <span></span>
                                        <span>OR</span>
                                        <span></span>
                                    </div>
                                </div> --}}

                                <!--end::Divider-->

                                <!--begin::Options-->
                                {{-- <div class="kt-login__options">
                                    <a href="#" class="btn btn-primary kt-btn">
                                        <i class="fab fa-facebook-f"></i>
                                        Facebook
                                    </a>
                                    <a href="#" class="btn btn-info kt-btn">
                                        <i class="fab fa-twitter"></i>
                                        Twitter
                                    </a>
                                    <a href="#" class="btn btn-danger kt-btn">
                                        <i class="fab fa-google"></i>
                                        Google
                                    </a>
                                </div> --}}

                                <!--end::Options-->
                            </div>

                            <!--end::Signin-->
                        </div>

                        <!--end::Body-->
                    </div>

                    <!--end::Content-->
                </div>
            </div>
        </div>

        <!-- end:: Page -->

        <!--end::Page Scripts -->
    </body>

    <!-- end::Body -->

</html>
