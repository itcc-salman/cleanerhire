@extends('cleaner.layouts.master')
@push('css')

@endpush
@section('content')
<!--Begin::App-->
<div class="kt-grid kt-grid--desktop kt-grid--ver kt-grid--ver-desktop kt-app">

    <!--Begin:: App Aside Mobile Toggle-->
    <button class="kt-app__aside-close" id="kt_user_profile_aside_close">
        <i class="la la-close"></i>
    </button>

    <!--End:: App Aside Mobile Toggle-->

    <!--Begin:: App Aside-->
    <div class="kt-grid__item kt-app__toggle kt-app__aside" id="kt_user_profile_aside">

        <!--begin:: Widgets/Applications/User/Profile1-->
        <div class="kt-portlet kt-portlet--height-fluid-">
            <div class="kt-portlet__head  kt-portlet__head--noborder">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown">
                        <i class="flaticon-more-1"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-fit dropdown-menu-md">

                        <!--begin::Nav-->
                        <ul class="kt-nav">
                            <li class="kt-nav__head">
                                Export Options
                                <span data-toggle="kt-tooltip" data-placement="right" title="Click to learn more...">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--brand kt-svg-icon--md1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
                                            <rect fill="#000000" x="11" y="10" width="2" height="7" rx="1" />
                                            <rect fill="#000000" x="11" y="7" width="2" height="2" rx="1" />
                                        </g>
                                    </svg> </span>
                            </li>
                            <li class="kt-nav__separator"></li>
                            <li class="kt-nav__item">
                                <a href="#" class="kt-nav__link">
                                    <i class="kt-nav__link-icon flaticon2-drop"></i>
                                    <span class="kt-nav__link-text">Activity</span>
                                </a>
                            </li>
                            <li class="kt-nav__item">
                                <a href="#" class="kt-nav__link">
                                    <i class="kt-nav__link-icon flaticon2-calendar-8"></i>
                                    <span class="kt-nav__link-text">FAQ</span>
                                </a>
                            </li>
                            <li class="kt-nav__item">
                                <a href="#" class="kt-nav__link">
                                    <i class="kt-nav__link-icon flaticon2-telegram-logo"></i>
                                    <span class="kt-nav__link-text">Settings</span>
                                </a>
                            </li>
                            <li class="kt-nav__item">
                                <a href="#" class="kt-nav__link">
                                    <i class="kt-nav__link-icon flaticon2-new-email"></i>
                                    <span class="kt-nav__link-text">Support</span>
                                    <span class="kt-nav__link-badge">
                                        <span class="kt-badge kt-badge--success kt-badge--rounded">5</span>
                                    </span>
                                </a>
                            </li>
                            <li class="kt-nav__separator"></li>
                            <li class="kt-nav__foot">
                                <a class="btn btn-label-danger btn-bold btn-sm" href="#">Upgrade plan</a>
                                <a class="btn btn-clean btn-bold btn-sm" href="#" data-toggle="kt-tooltip" data-placement="right" title="Click to learn more...">Learn more</a>
                            </li>
                        </ul>

                        <!--end::Nav-->
                    </div>
                </div>
            </div>
            <div class="kt-portlet__body kt-portlet__body--fit-y">

                <!--begin::Widget -->
                <div class="kt-widget kt-widget--user-profile-1">
                    <div class="kt-widget__head">
                        <div class="kt-widget__media">
                            <img src="{{ asset('assets/media/users/'.$cleaner->profile_avatar.'') }}" alt="image">
                        </div>
                        <div class="kt-widget__content">
                            <div class="kt-widget__section">
                                <a href="#" class="kt-widget__username">
                                    @if( $cleaner->user->role == 'company' )
                                    {{ ucfirst($cleaner->company_name) }}
                                    @else
                                    {{ ucfirst($cleaner->first_name) }} {{ ucfirst($cleaner->last_name) }}
                                    @endif
                                    <i class="flaticon2-correct kt-font-success"></i>
                                </a>
                                <span class="kt-widget__subtitle">
                                    {{ ucfirst($cleaner->user->role) }}
                                </span>
                            </div>
                            {{-- <div class="kt-widget__action">
                                <button type="button" class="btn btn-info btn-sm">chat</button>&nbsp;
                                <button type="button" class="btn btn-success btn-sm">follow</button>
                            </div> --}}
                        </div>
                    </div>
                    <div class="kt-widget__body">
                        <div class="kt-widget__content">
                            <div class="kt-widget__info">
                                <span class="kt-widget__label">Email:</span>
                                <a href="mailto:{{ $cleaner->email }}" class="kt-widget__data">{{ $cleaner->email }}</a>
                            </div>
                            <div class="kt-widget__info">
                                <span class="kt-widget__label">Phone:</span>
                                <a href="#" class="kt-widget__data">{{ $cleaner->phone }}</a>
                            </div>
                            <div class="kt-widget__info">
                                <span class="kt-widget__label">Location:</span>
                                <span class="kt-widget__data">{{ $cleaner->city }}</span>
                            </div>
                        </div>
                        <div class="kt-widget__items">
                            <a href="javascript:void(0)" class="kt-widget__item kt-widget__item--active change_tab" partial_view="overview">
                                <span class="kt-widget__section">
                                    <span class="kt-widget__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero" />
                                                <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3" />
                                            </g>
                                        </svg> </span>
                                    <span class="kt-widget__desc">
                                        Profile Overview
                                    </span>
                                </span>
                            </a>
                            <a href="javascript:void(0)" class="kt-widget__item change_tab" partial_view="personal_info">
                                <span class="kt-widget__section">
                                    <span class="kt-widget__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                                            </g>
                                        </svg> </span>
                                    <span class="kt-widget__desc">
                                        Personal Information
                                    </span>
                                </span>
                                @if($tasks['personal_info'])
                                <span class="kt-badge kt-badge--unified-success kt-badge--sm kt-badge--rounded kt-badge--bolder"><i class="fa fa-check"></i></span>
                                @else
                                <span class="kt-badge kt-badge--unified-danger kt-badge--sm kt-badge--rounded kt-badge--bolder"><i class="fa fa-times"></i></span>
                                @endif
                            </a>
                            <a href="javascript:void(0)" class="kt-widget__item change_tab" partial_view="account_info">
                                <span class="kt-widget__section">
                                    <span class="kt-widget__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z" fill="#000000" opacity="0.3" />
                                                <path d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z" fill="#000000" />
                                            </g>
                                        </svg> </span>
                                    <span class="kt-widget__desc">
                                        Account Information
                                    </span>
                                </span>
                                @if($tasks['account_info'])
                                <span class="kt-badge kt-badge--unified-success kt-badge--sm kt-badge--rounded kt-badge--bolder"><i class="fa fa-check"></i></span>
                                @else
                                <span class="kt-badge kt-badge--unified-danger kt-badge--sm kt-badge--rounded kt-badge--bolder"><i class="fa fa-times"></i></span>
                                @endif
                            </a>
                            <a href="javascript:void(0)" class="kt-widget__item change_tab" partial_view="visa_documents">
                                <span class="kt-widget__section">
                                    <span class="kt-widget__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <rect fill="#000000" x="4" y="5" width="16" height="3" rx="1.5" />
                                                <path d="M5.5,15 L18.5,15 C19.3284271,15 20,15.6715729 20,16.5 C20,17.3284271 19.3284271,18 18.5,18 L5.5,18 C4.67157288,18 4,17.3284271 4,16.5 C4,15.6715729 4.67157288,15 5.5,15 Z M5.5,10 L12.5,10 C13.3284271,10 14,10.6715729 14,11.5 C14,12.3284271 13.3284271,13 12.5,13 L5.5,13 C4.67157288,13 4,12.3284271 4,11.5 C4,10.6715729 4.67157288,10 5.5,10 Z" fill="#000000" opacity="0.3" />
                                            </g>
                                        </svg> </span>
                                    <span class="kt-widget__desc">
                                        Visa & Documents
                                    </span>
                                </span>
                                @if($tasks['visa_documents'])
                                <span class="kt-badge kt-badge--unified-success kt-badge--sm kt-badge--rounded kt-badge--bolder"><i class="fa fa-check"></i></span>
                                @else
                                <span class="kt-badge kt-badge--unified-danger kt-badge--sm kt-badge--rounded kt-badge--bolder"><i class="fa fa-times"></i></span>
                                @endif
                            </a>
                            <a href="javascript:void(0)" class="kt-widget__item change_tab" partial_view="services">
                                <span class="kt-widget__section">
                                    <span class="kt-widget__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" fill="#000000" opacity="0.3"/>
                                                <path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" fill="#000000"/>
                                                <rect fill="#000000" opacity="0.3" x="10" y="9" width="7" height="2" rx="1"/>
                                                <rect fill="#000000" opacity="0.3" x="7" y="9" width="2" height="2" rx="1"/>
                                                <rect fill="#000000" opacity="0.3" x="7" y="13" width="2" height="2" rx="1"/>
                                                <rect fill="#000000" opacity="0.3" x="10" y="13" width="7" height="2" rx="1"/>
                                                <rect fill="#000000" opacity="0.3" x="7" y="17" width="2" height="2" rx="1"/>
                                                <rect fill="#000000" opacity="0.3" x="10" y="17" width="7" height="2" rx="1"/>
                                            </g>
                                        </svg> </span>
                                    <span class="kt-widget__desc">
                                        Services
                                    </span>
                                </span>
                                @if($tasks['services'])
                                <span class="kt-badge kt-badge--unified-success kt-badge--sm kt-badge--rounded kt-badge--bolder"><i class="fa fa-check"></i></span>
                                @else
                                <span class="kt-badge kt-badge--unified-danger kt-badge--sm kt-badge--rounded kt-badge--bolder"><i class="fa fa-times"></i></span>
                                @endif
                            </a>
                            <a href="javascript:void(0)" class="kt-widget__item change_tab" partial_view="service_area">
                                <span class="kt-widget__section">
                                    <span class="kt-widget__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" fill="#000000" opacity="0.3"/>
                                                <path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" fill="#000000"/>
                                                <rect fill="#000000" opacity="0.3" x="10" y="9" width="7" height="2" rx="1"/>
                                                <rect fill="#000000" opacity="0.3" x="7" y="9" width="2" height="2" rx="1"/>
                                                <rect fill="#000000" opacity="0.3" x="7" y="13" width="2" height="2" rx="1"/>
                                                <rect fill="#000000" opacity="0.3" x="10" y="13" width="7" height="2" rx="1"/>
                                                <rect fill="#000000" opacity="0.3" x="7" y="17" width="2" height="2" rx="1"/>
                                                <rect fill="#000000" opacity="0.3" x="10" y="17" width="7" height="2" rx="1"/>
                                            </g>
                                        </svg> </span>
                                    <span class="kt-widget__desc">
                                        Service Areas
                                    </span>
                                </span>
                                @if($tasks['service_area'])
                                <span class="kt-badge kt-badge--unified-success kt-badge--sm kt-badge--rounded kt-badge--bolder"><i class="fa fa-check"></i></span>
                                @else
                                <span class="kt-badge kt-badge--unified-danger kt-badge--sm kt-badge--rounded kt-badge--bolder"><i class="fa fa-times"></i></span>
                                @endif
                            </a>
                            <a href="javascript:void(0)" class="kt-widget__item change_tab" partial_view="availability">
                                <span class="kt-widget__section">
                                    <span class="kt-widget__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" fill="#000000" opacity="0.3"/>
                                                <path d="M11.1750002,14.75 C10.9354169,14.75 10.6958335,14.6541667 10.5041669,14.4625 L8.58750019,12.5458333 C8.20416686,12.1625 8.20416686,11.5875 8.58750019,11.2041667 C8.97083352,10.8208333 9.59375019,10.8208333 9.92916686,11.2041667 L11.1750002,12.45 L14.3375002,9.2875 C14.7208335,8.90416667 15.2958335,8.90416667 15.6791669,9.2875 C16.0625002,9.67083333 16.0625002,10.2458333 15.6791669,10.6291667 L11.8458335,14.4625 C11.6541669,14.6541667 11.4145835,14.75 11.1750002,14.75 Z" fill="#000000"/>
                                            </g>
                                        </svg> </span>
                                    <span class="kt-widget__desc">
                                        Availability
                                    </span>
                                </span>
                                @if($tasks['availability'])
                                <span class="kt-badge kt-badge--unified-success kt-badge--sm kt-badge--rounded kt-badge--bolder"><i class="fa fa-check"></i></span>
                                @else
                                <span class="kt-badge kt-badge--unified-danger kt-badge--sm kt-badge--rounded kt-badge--bolder"><i class="fa fa-times"></i></span>
                                @endif
                            </a>
                            <a href="javascript:void(0)" class="kt-widget__item change_tab" partial_view="change_password">
                                <span class="kt-widget__section">
                                    <span class="kt-widget__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" fill="#000000" opacity="0.3" />
                                                <path d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z" fill="#000000" opacity="0.3" />
                                                <path d="M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 C14.5228466,17 11.463736,17 7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z" fill="#000000" opacity="0.3" />
                                            </g>
                                        </svg> </span>
                                    <span class="kt-widget__desc">
                                        Change Password
                                    </span>
                                </span>
                            </a>
                            {{-- <a href="custom/apps/user/profile-1/email-settings.html" class="kt-widget__item ">
                                <span class="kt-widget__section">
                                    <span class="kt-widget__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path d="M6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,12 C19,12.5522847 18.5522847,13 18,13 L6,13 C5.44771525,13 5,12.5522847 5,12 L5,3 C5,2.44771525 5.44771525,2 6,2 Z M7.5,5 C7.22385763,5 7,5.22385763 7,5.5 C7,5.77614237 7.22385763,6 7.5,6 L13.5,6 C13.7761424,6 14,5.77614237 14,5.5 C14,5.22385763 13.7761424,5 13.5,5 L7.5,5 Z M7.5,7 C7.22385763,7 7,7.22385763 7,7.5 C7,7.77614237 7.22385763,8 7.5,8 L10.5,8 C10.7761424,8 11,7.77614237 11,7.5 C11,7.22385763 10.7761424,7 10.5,7 L7.5,7 Z" fill="#000000" opacity="0.3" />
                                                <path d="M3.79274528,6.57253826 L12,12.5 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 Z" fill="#000000" />
                                            </g>
                                        </svg> </span>
                                    <span class="kt-widget__desc">
                                        Email settings
                                    </span>
                                </span>
                            </a> --}}
                            {{-- <a href="#" class="kt-widget__item" data-toggle="kt-tooltip" title="Coming soon..." data-placement="right">
                                <span class="kt-widget__section">
                                    <span class="kt-widget__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <rect fill="#000000" x="2" y="5" width="19" height="4" rx="1" />
                                                <rect fill="#000000" opacity="0.3" x="2" y="11" width="19" height="10" rx="1" />
                                            </g>
                                        </svg> </span>
                                    <span class="kt-widget__desc">
                                        Saved Credit Cards
                                    </span>
                                </span>
                            </a>
                            <a href="#" class="kt-widget__item" data-toggle="kt-tooltip" title="Coming soon..." data-placement="right">
                                <span class="kt-widget__section">
                                    <span class="kt-widget__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                <rect fill="#000000" x="6" y="11" width="9" height="2" rx="1" />
                                                <rect fill="#000000" x="6" y="15" width="5" height="2" rx="1" />
                                            </g>
                                        </svg> </span>
                                    <span href="#" class="kt-widget__desc">Tax information</span>
                                </span>
                                <span class="kt-badge kt-badge--unified-brand kt-badge--inline kt-badge--bolder">new</span>
                            </a> --}}
                        </div>
                    </div>
                </div>

                <!--end::Widget -->
            </div>
        </div>

        <!--end:: Widgets/Applications/User/Profile1-->
    </div>

    <!--End:: App Aside-->

    <!--Begin:: App Content-->
    <div class="kt-grid__item kt-grid__item--fluid kt-app__content" id="partial_view">
        @include('cleaner.partial.overview')
    </div>

    <!--End:: App Content-->
</div>

<!--End::App-->
@endsection
@push('scripts')
    <script>

        function fileupload() {
            var fd = new FormData();
            var files = $('#file')[0].files[0];
            var doc_type = $('#fileUploadSelect').val();
            fd.append('file', files);
            fd.append('doc_type', doc_type);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '{{ route('cleaner.ajax.profile.visa_documents') }}',
                type: 'post',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response){
                    if(response.code == 200){
                        var selectedValue = '#'+$('#fileUploadSelect').val();
                        $(selectedValue).val(response.data);
                        $(selectedValue+'_file_name').html(": "+response.data);
                        $('#file').val('');
                        $('.custom-file-label').removeClass("selected").html("Choose file");
                    }
                },
            });
        }

        $(document).ready(function() {

            // Availability
            $('body').on('change', '.switch_days', function(e) {
                let _opened_day = $(this).attr('opened_day');
                if(this.checked) {
                    // show dropdown for hours
                    $('#main_'+_opened_day).removeClass('d-none');
                } else {
                    // hide dropdown for hours
                    $('#main_'+_opened_day).addClass('d-none');
                }
            });

            $('body').on('change', '.from_hours', function(e) {
                let _val = $(this).val();
                let _day = $(this).attr('day');
                let _count = $(this).attr('count');
                if( _val != '24' ) {
                    $('#to_hours_div_'+_day+'_'+_count).removeClass('d-none');
                    $('#add_btn_div_'+_day+'_'+_count).removeClass('d-none');
                } else {
                    $('#to_hours_div_'+_day+'_'+_count).addClass('d-none');
                    $('#add_btn_div_'+_day+'_'+_count).addClass('d-none');
                }
            });

            $('body').on('click', '.add_hours', function(e) {
                e.preventDefault();
                let _main = $(this).attr('main');
                let _count = $(this).attr('count');
                $('#main_'+_main).append(`<div id="added_div_`+_main+`_`+_count+`">
                    <div class="form-group row">
                        <div class="col-5">
                            <select class="form-control from_hours" day="`+_main+`" count="`+_count+`" id="select_from_`+_main+`_`+_count+`" name="select_from_`+_main+`[]">
                                @foreach( getHours() as $hourKey => $hour )
                                    <option value="{{ $hourKey }}">{{ $hour }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-5 d-none" id="to_hours_div_`+_main+`_`+_count+`">
                            <select class="form-control to_hours" id="select_to_`+_main+`_`+_count+`" name="select_to_`+_main+`[]">
                                @foreach( getHours() as $hourKey => $hour )
                                    <option value="{{ $hourKey }}">{{ $hour }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-1 d-none" id="add_btn_div_`+_main+`_`+_count+`">
                            <span class="btn btn-danger remove_hours" main="`+_main+`" count="`+_count+`">-</span>
                        </div>
                    </div>
                </div>`);
                _count++;
                $(this).attr('count', _count);
            });

            $('body').on('click', '.remove_hours', function(e) {
                e.preventDefault();
                let _main = $(this).attr('main');
                let _count = $(this).attr('count');
                $('#added_div_'+_main+'_'+_count).remove();
            });

            // Account Information Start
            $('body').on('change', 'input[type=radio][name=role]', function() {
                let _val = $("input[type=radio][name=role]:checked").val();
                if (_val == 'cleaner') {
                    $("#radio_tfn").prop("disabled", false);
                    $("#radio_tfn").parent().removeClass('kt-radio--disabled');
                    $("#companyDetailsDiv").addClass('d-none');
                }
                else if (_val == 'company') {
                    $("#radio_tfn").prop("disabled", true);
                    $("#radio_tfn").parent().addClass('kt-radio--disabled');
                    if( $("#radio_tfn").is(':checked') ) {
                        $("#radio_abn").prop("checked", true).trigger('change');
                    }
                    $("#companyDetailsDiv").removeClass('d-none');
                }
            });

            $('body').on('change', 'input[type=radio][name=tfn_or_abn]', function() {
                let _val = $("input[type=radio][name=tfn_or_abn]:checked").val();
                if (_val == 'abn') {
                    $("#abn").removeClass('d-none');
                    $("#tfn").val('');
                    $("#tfn").addClass('d-none');
                }
                else if (_val == 'tfn') {
                    $("#tfn").removeClass('d-none');
                    $("#abn").val('');
                    $("#abn").addClass('d-none');
                }
            });

            $('body').on('change', 'input[type=radio][name=driver_license]', function() {
                if (this.value == 'no') {
                    $("#driver_license_state").addClass('d-none');
                    $("#driver_license_number").addClass('d-none');
                }
                else if (this.value == 'yes') {
                    $("#driver_license_state").removeClass('d-none');
                    $("#driver_license_number").removeClass('d-none');
                }
            });

            $('body').on('change', 'input[type=radio][name=visa_status]', function() {
                if (this.value != 'citizen' && this.value != 'pr') {
                    $("#visa_status_other").removeClass('d-none');
                }else{
                    $("#visa_status_other").addClass('d-none');
                }
            });
            // Account Information End

            // Services
            $(document).on('change', '.cleaner-services-checkbox', function(event) {
                if(this.checked) {
                    $('#service_'+this.value).removeClass("d-none");
                } else {
                    $('#service_'+this.value).addClass("d-none");
                }
            });

            $(document).on('change', '.cleaner-services-checkbox-commercial', function(event) {
                if(this.checked) {
                    $('#service_commercial_'+this.value).removeClass("d-none");
                } else {
                    $('#service_commercial_'+this.value).addClass("d-none");
                }
            });

            $(document).on('click', '#add_area', function(e) {
                e.preventDefault();
                const service_areas = $(this).attr('service_areas');
                $('#service_area_div').append(`<div class="form-group row" id="row_`+service_areas+`">
                                            <div class="col-lg-4">
                                                <input type="text" class="form-control" name="service_area_`+service_areas+`" id="service_area_`+service_areas+`" placeholder="Suburb">
                                            </div>
                                            <div class="col-lg-4">
                                                <input type="text" class="form-control" name="radius_in_km_`+service_areas+`" id="radius_in_km_`+service_areas+`" placeholder="Radius in KM">
                                                <input type="hidden" name="latitude_`+service_areas+`" id="latitude_`+service_areas+`" value="">
                                                <input type="hidden" name="longitude_`+service_areas+`" id="longitude_`+service_areas+`" value="">
                                            </div>
                                            <div class="col-lg-4">
                                                <a href="javascript:;" class="btn btn-danger btn-icon remove_area" row_count="`+service_areas+`"><i class="la la-remove"></i></a>
                                            </div>
                                        </div>`);
                const _count = parseInt(service_areas) + 1;
                $('#add_area').attr('service_areas', _count );
            });

            $(document).on('click', '.remove_area', function(e) {
                e.preventDefault();
                const _row_count = $(this).attr('row_count');
                $('#row_'+_row_count).remove();
            });

            $(document).on('click', '.change_tab', function(e) {
                e.preventDefault();
                let _this = $(this);
                let _partial_view_name = _this.attr('partial_view');
                $.ajax({
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    url: '{{ route('cleaner.ajax.profile.partial') }}',
                    type: "POST",
                    dataType: "JSON",
                    data: {
                        partial_view_name: _partial_view_name
                    },
                    success: function(res) {
                        $('#partial_view').empty().html(res.html);
                        $('.change_tab').removeClass('kt-widget__item--active');
                        _this.addClass('kt-widget__item--active');
                        if( _partial_view_name == 'account_info' ) {
                            var $repeater = $('#kt_repeater_3').repeater({
                                initEmpty: false,
                                defaultValues: [],
                                show: function() {
                                    $(this).slideDown();
                                },
                                hide: function(deleteElement) {
                                    if(confirm('Are you sure you want to delete this element?')) {
                                        $(this).slideUp(deleteElement);
                                    }
                                },
                                isFirstItemUndeletable: true
                            });
                            $repeater.setList(res.extra_data);
                            // $repeater.setList();

                            $('#kt_datepicker_1').datepicker({
                                clearBtn: true,
                                todayBtn: true,
                                todayHighlight: true,
                                orientation: "bottom left",
                                endDate: new Date,
                                templates: {
                                    leftArrow: '<i class="la la-angle-left"></i>',
                                    rightArrow: '<i class="la la-angle-right"></i>'
                                }
                            });

                            if($('input[type=radio][name=role]').val() != ''){
                                $('input[type=radio][name=role]').trigger('change');
                            }
                        }
                    }
                }); // end ajax
            });

            $(document).on('submit', '#personal_info', function(e) {
                e.preventDefault();
                var btn = $('#update_personal_info');
                KTApp.progress(btn);
                $.ajax({
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    url: '{{ route('cleaner.ajax.profile.personal_info') }}',
                    type: "POST",
                    // data: $(this).serialize(),
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData:false,
                    success: function(res) {
                        KTApp.unprogress(btn);
                        showToast(res.msg, res.status);
                    },
                    error: function(err) {
                        KTApp.unprogress(btn);
                        if( err.status == 422 ) {
                            // display errors on each form field
                            $.each(err.responseJSON.errors, function (i, error) {
                                showToast(error[0], 0);
                                return;
                            });
                        }
                    }
                }); // end ajax
            });

            $(document).on('submit', '#account_info', function(e) {
                e.preventDefault();
                var btn = $('#update_account_info');
                KTApp.progress(btn);
                $.ajax({
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    url: '{{ route('cleaner.ajax.profile.account_info') }}',
                    type: "POST",
                    data: $(this).serialize(),
                    success: function(res) {
                        KTApp.unprogress(btn);
                        showToast(res.msg, res.status);
                    },
                    error: function(err) {
                        KTApp.unprogress(btn);
                        if( err.status == 422 ) {
                            // display errors on each form field
                            $.each(err.responseJSON.errors, function (i, error) {
                                showToast(error[0], 0);
                                return;
                            });
                        }
                    }
                }); // end ajax
            });

            $(document).on('submit', '#services', function(e) {
                e.preventDefault();
                var btn = $('#update_services');
                KTApp.progress(btn);
                $.ajax({
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    url: '{{ route('cleaner.ajax.profile.update_services') }}',
                    type: "POST",
                    data: $(this).serialize(),
                    success: function(res) {
                        KTApp.unprogress(btn);
                        showToast(res.msg, res.status);
                    },
                    error: function(err) {
                        KTApp.unprogress(btn);
                        if( err.status == 422 ) {
                            // display errors on each form field
                            $.each(err.responseJSON.errors, function (i, error) {
                                showToast(error[0], 0);
                                return;
                            });
                        }
                    }
                }); // end ajax
            });

            $(document).on('submit', '#availability', function(e) {
                e.preventDefault();
                var btn = $('#update_availability');
                KTApp.progress(btn);
                $.ajax({
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    url: '{{ route('cleaner.ajax.profile.update_availability') }}',
                    type: "POST",
                    data: $(this).serialize(),
                    success: function(res) {
                        KTApp.unprogress(btn);
                        showToast(res.msg, res.status);
                    },
                    error: function(err) {
                        KTApp.unprogress(btn);
                        if( err.status == 422 ) {
                            // display errors on each form field
                            $.each(err.responseJSON.errors, function (i, error) {
                                showToast(error[0], 0);
                                return;
                            });
                        }
                    }
                }); // end ajax
            });

            $(document).on('submit', '#service_area', function(e) {
                e.preventDefault();
                var btn = $('#update_service_area');
                KTApp.progress(btn);
                $.ajax({
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    url: '{{ route('cleaner.ajax.profile.update_service_area') }}',
                    type: "POST",
                    data: $(this).serialize(),
                    success: function(res) {
                        KTApp.unprogress(btn);
                        showToast(res.msg, res.status);
                    },
                    error: function(err) {
                        KTApp.unprogress(btn);
                        if( err.status == 422 ) {
                            // display errors on each form field
                            $.each(err.responseJSON.errors, function (i, error) {
                                showToast(error[0], 0);
                                return;
                            });
                        }
                    }
                }); // end ajax
            });


        });
    </script>
@endpush
