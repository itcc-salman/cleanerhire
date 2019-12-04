@extends('cleaner.layouts.master')

@section('content')
<!--Begin::Dashboard 5-->

<!--Begin::Row-->
<div class="row">
    <div class="col-xl-4 col-lg-6 order-lg-1 order-xl-1">

        <!--begin:: Widgets/Top Products-->
        <div class="kt-portlet kt-portlet--head-noborder kt-portlet--height-fluid ">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Top Products
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <a href="#" class="btn btn-label-brand btn-bold btn-sm dropdown-toggle" data-toggle="dropdown">
                        All
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

            <!--full height portlet body-->
            <div class="kt-portlet__body kt-portlet__body--fluid kt-portlet__body--fit">
                <div class="kt-widget4 kt-widget4--sticky">
                    <div class="kt-widget4__items kt-portlet__space-x kt-margin-t-15">
                        <div class="kt-widget4__item">
                            <div class="kt-widget4__pic kt-widget4__pic--logo">
                                <img src="assets/media/client-logos/logo3.png" alt="">
                            </div>
                            <div class="kt-widget4__info">
                                <a href="#" class="kt-widget4__title">
                                    Phyton
                                </a>
                                <p class="kt-widget4__text">
                                    A Programming Language
                                </p>
                            </div>
                            <span class="kt-widget4__number kt-font-brand kt-font-bold">+$17</span>
                        </div>
                        <div class="kt-widget4__item">
                            <div class="kt-widget4__pic kt-widget4__pic--logo">
                                <img src="assets/media/client-logos/logo1.png" alt="">
                            </div>
                            <div class="kt-widget4__info">
                                <a href="#" class="kt-widget4__title">
                                    FlyThemes
                                </a>
                                <p class="kt-widget4__text">
                                    A Let's Fly Fast Again Language
                                </p>
                            </div>
                            <span class="kt-widget4__number kt-font-success kt-font-bold">+$300</span>
                        </div>
                        <div class="kt-widget4__item">
                            <div class="kt-widget4__pic kt-widget4__pic--logo">
                                <img src="assets/media/client-logos/logo4.png" alt="">
                            </div>
                            <div class="kt-widget4__info">
                                <a href="#" class="kt-widget4__title">
                                    Starbucks
                                </a>
                                <p class="kt-widget4__text">
                                    Good Coffee & Snacks
                                </p>
                            </div>
                            <span class="kt-widget4__number kt-font-danger kt-font-bold">+$300</span>
                        </div>
                    </div>
                    <div class="kt-widget4__chart kt-margin-t-15">
                        <canvas id="kt_chart_trends_stats_2" style="height: 275px;"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!--end:: Widgets/Top Products-->
    </div>
    <div class="col-xl-4 col-lg-6 order-lg-1 order-xl-1">

        <!--begin:: Widgets/Activity-->
        <div class="kt-portlet kt-portlet--fit kt-portlet--head-lg kt-portlet--head-overlay kt-portlet--skin-solid kt-portlet--height-fluid">
            <div class="kt-portlet__head kt-portlet__head--noborder kt-portlet__space-x">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Activity
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <a href="#" class="btn btn-label-light btn-sm btn-bold dropdown-toggle" data-toggle="dropdown">
                        Export
                    </a>
                    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right">
                        <ul class="kt-nav">
                            <li class="kt-nav__section kt-nav__section--first">
                                <span class="kt-nav__section-text">Finance</span>
                            </li>
                            <li class="kt-nav__item">
                                <a href="#" class="kt-nav__link">
                                    <i class="kt-nav__link-icon flaticon2-graph-1"></i>
                                    <span class="kt-nav__link-text">Statistics</span>
                                </a>
                            </li>
                            <li class="kt-nav__item">
                                <a href="#" class="kt-nav__link">
                                    <i class="kt-nav__link-icon flaticon2-calendar-4"></i>
                                    <span class="kt-nav__link-text">Events</span>
                                </a>
                            </li>
                            <li class="kt-nav__item">
                                <a href="#" class="kt-nav__link">
                                    <i class="kt-nav__link-icon flaticon2-layers-1"></i>
                                    <span class="kt-nav__link-text">Reports</span>
                                </a>
                            </li>
                            <li class="kt-nav__section">
                                <span class="kt-nav__section-text">Customers</span>
                            </li>
                            <li class="kt-nav__item">
                                <a href="#" class="kt-nav__link">
                                    <i class="kt-nav__link-icon flaticon2-calendar-4"></i>
                                    <span class="kt-nav__link-text">Notifications</span>
                                </a>
                            </li>
                            <li class="kt-nav__item">
                                <a href="#" class="kt-nav__link">
                                    <i class="kt-nav__link-icon flaticon2-file-1"></i>
                                    <span class="kt-nav__link-text">Files</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__body kt-portlet__body--fit">
                <div class="kt-widget17">
                    <div class="kt-widget17__visual kt-widget17__visual--chart kt-portlet-fit--top kt-portlet-fit--sides" style="background-color: #fd397a">
                        <div class="kt-widget17__chart" style="height:320px;">
                            <canvas id="kt_chart_activities"></canvas>
                        </div>
                    </div>
                    <div class="kt-widget17__stats">
                        <div class="kt-widget17__items">
                            <div class="kt-widget17__item">
                                <span class="kt-widget17__icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--brand">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000" />
                                            <rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519) " x="16.3255682" y="2.94551858" width="3" height="18" rx="1" />
                                        </g>
                                    </svg> </span>
                                <span class="kt-widget17__subtitle">
                                    Delivered
                                </span>
                                <span class="kt-widget17__desc">
                                    15 New Paskages
                                </span>
                            </div>
                            <div class="kt-widget17__item">
                                <span class="kt-widget17__icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--success">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24" />
                                            <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero" />
                                            <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3" />
                                        </g>
                                    </svg> </span>
                                <span class="kt-widget17__subtitle">
                                    Ordered
                                </span>
                                <span class="kt-widget17__desc">
                                    72 New Items
                                </span>
                            </div>
                        </div>
                        <div class="kt-widget17__items">
                            <div class="kt-widget17__item">
                                <span class="kt-widget17__icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--warning">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path d="M12.7037037,14 L15.6666667,10 L13.4444444,10 L13.4444444,6 L9,12 L11.2222222,12 L11.2222222,14 L6,14 C5.44771525,14 5,13.5522847 5,13 L5,3 C5,2.44771525 5.44771525,2 6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,13 C19,13.5522847 18.5522847,14 18,14 L12.7037037,14 Z" fill="#000000" opacity="0.3" />
                                            <path d="M9.80428954,10.9142091 L9,12 L11.2222222,12 L11.2222222,16 L15.6666667,10 L15.4615385,10 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 L9.80428954,10.9142091 Z" fill="#000000" />
                                        </g>
                                    </svg> </span>
                                <span class="kt-widget17__subtitle">
                                    Reported
                                </span>
                                <span class="kt-widget17__desc">
                                    72 Support Cases
                                </span>
                            </div>
                            <div class="kt-widget17__item">
                                <span class="kt-widget17__icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--danger">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3" />
                                            <path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000" />
                                        </g>
                                    </svg> </span>
                                <span class="kt-widget17__subtitle">
                                    Arrived
                                </span>
                                <span class="kt-widget17__desc">
                                    34 Upgraded Boxes
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--end:: Widgets/Activity-->
    </div>
    <div class="col-xl-4 col-lg-6 order-lg-1 order-xl-1">

        <!--begin:: Widgets/Blog-->
        <div class="kt-portlet kt-portlet--height-fluid kt-widget19">
            <div class="kt-portlet__body kt-portlet__body--fit kt-portlet__body--unfill">
                <div class="kt-widget19__pic kt-portlet-fit--top kt-portlet-fit--sides" style="min-height: 300px; background-image: url(assets/media//products/product4.jpg)">
                    <h3 class="kt-widget19__title kt-font-light">
                        Introducing New Feature
                    </h3>
                    <div class="kt-widget19__shadow"></div>
                    <div class="kt-widget19__labels">
                        <a href="#" class="btn btn-label-light-o2 btn-bold ">Recent</a>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div class="kt-widget19__wrapper">
                    <div class="kt-widget19__content">
                        <div class="kt-widget19__userpic">
                            <img src="assets/media/users/user1.jpg" alt="">
                        </div>
                        <div class="kt-widget19__info">
                            <a href="#" class="kt-widget19__username">
                                Anna Krox
                            </a>
                            <span class="kt-widget19__time">
                                UX/UI Designer, Google
                            </span>
                        </div>
                        <div class="kt-widget19__stats">
                            <span class="kt-widget19__number kt-font-brand">
                                18
                            </span>
                            <a href="#" class="kt-widget19__comment">
                                Comments
                            </a>
                        </div>
                    </div>
                    <div class="kt-widget19__text">
                        Lorem Ipsum is simply dummy text of the printing and typesetting scrambled a type specimen book text of the dummy text of the printing printing and typesetting industry scrambled dummy text of the printing.
                    </div>
                </div>
                <div class="kt-widget19__action">
                    <a href="#" class="btn btn-sm btn-label-brand btn-bold">Read More...</a>
                </div>
            </div>
        </div>

        <!--end:: Widgets/Blog-->
    </div>
    <div class="col-xl-8 col-lg-12 order-lg-2 order-xl-1">
        <div class="kt-portlet kt-portlet--height-fluid kt-portlet--mobile ">
            <div class="kt-portlet__head kt-portlet__head--lg kt-portlet__head--noborder kt-portlet__head--break-sm">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Exclusive Datatable Plugin
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="dropdown dropdown-inline">
                        <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="flaticon-more-1"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-md dropdown-menu-fit">

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
            </div>
            <div class="kt-portlet__body kt-portlet__body--fit">

                <!--begin: Datatable -->
                <div class="kt-datatable" id="kt_datatable_latest_orders"></div>

                <!--end: Datatable -->
            </div>
        </div>
    </div>
    <div class="col-xl-4  col-lg-6 order-lg-1 order-xl-1">

        <!--begin:: Widgets/Tasks -->
        <div class="kt-portlet kt-portlet--tabs kt-portlet--height-fluid">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Tasks
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <ul class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-brand" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#kt_widget2_tab1_content" role="tab">
                                Today
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#kt_widget2_tab2_content" role="tab">
                                Week
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#kt_widget2_tab3_content" role="tab">
                                Month
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div class="tab-content">
                    <div class="tab-pane active" id="kt_widget2_tab1_content">
                        <div class="kt-widget2">
                            <div class="kt-widget2__item kt-widget2__item--primary">
                                <div class="kt-widget2__checkbox">
                                    <label class="kt-checkbox kt-checkbox--solid kt-checkbox--single">
                                        <input type="checkbox">
                                        <span></span>
                                    </label>
                                </div>
                                <div class="kt-widget2__info">
                                    <a href="#" class="kt-widget2__title">
                                        Make Metronic Great Again.Lorem Ipsum Amet
                                    </a>
                                    <a href="#" class="kt-widget2__username">
                                        By Bob
                                    </a>
                                </div>
                                <div class="kt-widget2__actions">
                                    <a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown">
                                        <i class="flaticon-more-1"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right">
                                        <ul class="kt-nav">
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-line-chart"></i>
                                                    <span class="kt-nav__link-text">Reports</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-send"></i>
                                                    <span class="kt-nav__link-text">Messages</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-pie-chart-1"></i>
                                                    <span class="kt-nav__link-text">Charts</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-avatar"></i>
                                                    <span class="kt-nav__link-text">Members</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-settings"></i>
                                                    <span class="kt-nav__link-text">Settings</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-widget2__item kt-widget2__item--warning">
                                <div class="kt-widget2__checkbox">
                                    <label class="kt-checkbox kt-checkbox--solid kt-checkbox--single">
                                        <input type="checkbox">
                                        <span></span>
                                    </label>
                                </div>
                                <div class="kt-widget2__info">
                                    <a href="#" class="kt-widget2__title">
                                        Prepare Docs For Metting On Monday
                                    </a>
                                    <a href="#" class="kt-widget2__username">
                                        By Sean
                                    </a>
                                </div>
                                <div class="kt-widget2__actions">
                                    <a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown">
                                        <i class="flaticon-more-1"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right">
                                        <ul class="kt-nav">
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-line-chart"></i>
                                                    <span class="kt-nav__link-text">Reports</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-send"></i>
                                                    <span class="kt-nav__link-text">Messages</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-pie-chart-1"></i>
                                                    <span class="kt-nav__link-text">Charts</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-avatar"></i>
                                                    <span class="kt-nav__link-text">Members</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-settings"></i>
                                                    <span class="kt-nav__link-text">Settings</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-widget2__item kt-widget2__item--brand">
                                <div class="kt-widget2__checkbox">
                                    <label class="kt-checkbox kt-checkbox--solid kt-checkbox--single">
                                        <input type="checkbox">
                                        <span></span>
                                    </label>
                                </div>
                                <div class="kt-widget2__info">
                                    <a href="#" class="kt-widget2__title">
                                        Make Widgets Development. Estudiat Communy Elit
                                    </a>
                                    <a href="#" class="kt-widget2__username">
                                        By Aziko
                                    </a>
                                </div>
                                <div class="kt-widget2__actions">
                                    <a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown">
                                        <i class="flaticon-more-1"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right">
                                        <ul class="kt-nav">
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-line-chart"></i>
                                                    <span class="kt-nav__link-text">Reports</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-send"></i>
                                                    <span class="kt-nav__link-text">Messages</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-pie-chart-1"></i>
                                                    <span class="kt-nav__link-text">Charts</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-avatar"></i>
                                                    <span class="kt-nav__link-text">Members</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-settings"></i>
                                                    <span class="kt-nav__link-text">Settings</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-widget2__item kt-widget2__item--success">
                                <div class="kt-widget2__checkbox">
                                    <label class="kt-checkbox kt-checkbox--solid kt-checkbox--single">
                                        <input type="checkbox">
                                        <span></span>
                                    </label>
                                </div>
                                <div class="kt-widget2__info">
                                    <a href="#" class="kt-widget2__title">
                                        Make Metronic Development. Lorem Ipsum
                                    </a>
                                    <a class="kt-widget2__username">
                                        By James
                                    </a>
                                </div>
                                <div class="kt-widget2__actions">
                                    <a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown">
                                        <i class="flaticon-more-1"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right">
                                        <ul class="kt-nav">
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-line-chart"></i>
                                                    <span class="kt-nav__link-text">Reports</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-send"></i>
                                                    <span class="kt-nav__link-text">Messages</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-pie-chart-1"></i>
                                                    <span class="kt-nav__link-text">Charts</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-avatar"></i>
                                                    <span class="kt-nav__link-text">Members</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-settings"></i>
                                                    <span class="kt-nav__link-text">Settings</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-widget2__item kt-widget2__item--danger">
                                <div class="kt-widget2__checkbox">
                                    <label class="kt-checkbox kt-checkbox--solid kt-checkbox--single">
                                        <input type="checkbox">
                                        <span></span>
                                    </label>
                                </div>
                                <div class="kt-widget2__info">
                                    <a href="#" class="kt-widget2__title">
                                        Completa Financial Report For Emirates Airlines
                                    </a>
                                    <a href="#" class="kt-widget2__username">
                                        By Bob
                                    </a>
                                </div>
                                <div class="kt-widget2__actions">
                                    <a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown">
                                        <i class="flaticon-more-1"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right">
                                        <ul class="kt-nav">
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-line-chart"></i>
                                                    <span class="kt-nav__link-text">Reports</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-send"></i>
                                                    <span class="kt-nav__link-text">Messages</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-pie-chart-1"></i>
                                                    <span class="kt-nav__link-text">Charts</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-avatar"></i>
                                                    <span class="kt-nav__link-text">Members</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-settings"></i>
                                                    <span class="kt-nav__link-text">Settings</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-widget2__item kt-widget2__item--info">
                                <div class="kt-widget2__checkbox">
                                    <label class="kt-checkbox kt-checkbox--solid kt-checkbox--single">
                                        <input type="checkbox">
                                        <span></span>
                                    </label>
                                </div>
                                <div class="kt-widget2__info">
                                    <a href="#" class="kt-widget2__title">
                                        Completa Financial Report For Emirates Airlines
                                    </a>
                                    <a href="#" class="kt-widget2__username">
                                        By Sean
                                    </a>
                                </div>
                                <div class="kt-widget2__actions">
                                    <a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown">
                                        <i class="flaticon-more-1"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right">
                                        <ul class="kt-nav">
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-line-chart"></i>
                                                    <span class="kt-nav__link-text">Reports</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-send"></i>
                                                    <span class="kt-nav__link-text">Messages</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-pie-chart-1"></i>
                                                    <span class="kt-nav__link-text">Charts</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-avatar"></i>
                                                    <span class="kt-nav__link-text">Members</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-settings"></i>
                                                    <span class="kt-nav__link-text">Settings</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="kt_widget2_tab2_content">
                        <div class="kt-widget2">
                            <div class="kt-widget2__item kt-widget2__item--success">
                                <div class="kt-widget2__checkbox">
                                    <label class="kt-checkbox kt-checkbox--solid kt-checkbox--single">
                                        <input type="checkbox">
                                        <span></span>
                                    </label>
                                </div>
                                <div class="kt-widget2__info">
                                    <a href="#" class="kt-widget2__title">
                                        Make Metronic Development.Lorem Ipsum
                                    </a>
                                    <a class="kt-widget2__username">
                                        By James
                                    </a>
                                </div>
                                <div class="kt-widget2__actions">
                                    <a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown">
                                        <i class="flaticon-more-1"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right">
                                        <ul class="kt-nav">
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-line-chart"></i>
                                                    <span class="kt-nav__link-text">Reports</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-send"></i>
                                                    <span class="kt-nav__link-text">Messages</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-pie-chart-1"></i>
                                                    <span class="kt-nav__link-text">Charts</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-avatar"></i>
                                                    <span class="kt-nav__link-text">Members</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-settings"></i>
                                                    <span class="kt-nav__link-text">Settings</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-widget2__item kt-widget2__item--warning">
                                <div class="kt-widget2__checkbox">
                                    <label class="kt-checkbox kt-checkbox--solid kt-checkbox--single">
                                        <input type="checkbox">
                                        <span></span>
                                    </label>
                                </div>
                                <div class="kt-widget2__info">
                                    <a href="#" class="kt-widget2__title">
                                        Prepare Docs For Metting On Monday
                                    </a>
                                    <a href="#" class="kt-widget2__username">
                                        By Sean
                                    </a>
                                </div>
                                <div class="kt-widget2__actions">
                                    <a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown">
                                        <i class="flaticon-more-1"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right">
                                        <ul class="kt-nav">
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-line-chart"></i>
                                                    <span class="kt-nav__link-text">Reports</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-send"></i>
                                                    <span class="kt-nav__link-text">Messages</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-pie-chart-1"></i>
                                                    <span class="kt-nav__link-text">Charts</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-avatar"></i>
                                                    <span class="kt-nav__link-text">Members</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-settings"></i>
                                                    <span class="kt-nav__link-text">Settings</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-widget2__item kt-widget2__item--danger">
                                <div class="kt-widget2__checkbox">
                                    <label class="kt-checkbox kt-checkbox--solid kt-checkbox--single">
                                        <input type="checkbox">
                                        <span></span>
                                    </label>
                                </div>
                                <div class="kt-widget2__info">
                                    <a href="#" class="kt-widget2__title">
                                        Completa Financial Report For Emirates Airlines
                                    </a>
                                    <a href="#" class="kt-widget2__username">
                                        By Bob
                                    </a>
                                </div>
                                <div class="kt-widget2__actions">
                                    <a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown">
                                        <i class="flaticon-more-1"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right">
                                        <ul class="kt-nav">
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-line-chart"></i>
                                                    <span class="kt-nav__link-text">Reports</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-send"></i>
                                                    <span class="kt-nav__link-text">Messages</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-pie-chart-1"></i>
                                                    <span class="kt-nav__link-text">Charts</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-avatar"></i>
                                                    <span class="kt-nav__link-text">Members</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-settings"></i>
                                                    <span class="kt-nav__link-text">Settings</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-widget2__item kt-widget2__item--primary">
                                <div class="kt-widget2__checkbox">
                                    <label class="kt-checkbox kt-checkbox--solid kt-checkbox--single">
                                        <input type="checkbox">
                                        <span></span>
                                    </label>
                                </div>
                                <div class="kt-widget2__info">
                                    <a href="#" class="kt-widget2__title">
                                        Make Metronic Great Again.Lorem Ipsum Amet
                                    </a>
                                    <a href="#" class="kt-widget2__username">
                                        By Bob
                                    </a>
                                </div>
                                <div class="kt-widget2__actions">
                                    <a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown">
                                        <i class="flaticon-more-1"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right">
                                        <ul class="kt-nav">
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-line-chart"></i>
                                                    <span class="kt-nav__link-text">Reports</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-send"></i>
                                                    <span class="kt-nav__link-text">Messages</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-pie-chart-1"></i>
                                                    <span class="kt-nav__link-text">Charts</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-avatar"></i>
                                                    <span class="kt-nav__link-text">Members</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-settings"></i>
                                                    <span class="kt-nav__link-text">Settings</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-widget2__item kt-widget2__item--info">
                                <div class="kt-widget2__checkbox">
                                    <label class="kt-checkbox kt-checkbox--solid kt-checkbox--single">
                                        <input type="checkbox">
                                        <span></span>
                                    </label>
                                </div>
                                <div class="kt-widget2__info">
                                    <a href="#" class="kt-widget2__title">
                                        Completa Financial Report For Emirates Airlines
                                    </a>
                                    <a href="#" class="kt-widget2__username">
                                        By Sean
                                    </a>
                                </div>
                                <div class="kt-widget2__actions">
                                    <a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown">
                                        <i class="flaticon-more-1"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right">
                                        <ul class="kt-nav">
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-line-chart"></i>
                                                    <span class="kt-nav__link-text">Reports</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-send"></i>
                                                    <span class="kt-nav__link-text">Messages</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-pie-chart-1"></i>
                                                    <span class="kt-nav__link-text">Charts</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-avatar"></i>
                                                    <span class="kt-nav__link-text">Members</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-settings"></i>
                                                    <span class="kt-nav__link-text">Settings</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-widget2__item kt-widget2__item--brand">
                                <div class="kt-widget2__checkbox">
                                    <label class="kt-checkbox kt-checkbox--solid kt-checkbox--single">
                                        <input type="checkbox">
                                        <span></span>
                                    </label>
                                </div>
                                <div class="kt-widget2__info">
                                    <a href="#" class="kt-widget2__title">
                                        Make Widgets Development.Estudiat Communy Elit
                                    </a>
                                    <a href="#" class="kt-widget2__username">
                                        By Aziko
                                    </a>
                                </div>
                                <div class="kt-widget2__actions">
                                    <a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown">
                                        <i class="flaticon-more-1"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right">
                                        <ul class="kt-nav">
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-line-chart"></i>
                                                    <span class="kt-nav__link-text">Reports</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-send"></i>
                                                    <span class="kt-nav__link-text">Messages</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-pie-chart-1"></i>
                                                    <span class="kt-nav__link-text">Charts</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-avatar"></i>
                                                    <span class="kt-nav__link-text">Members</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-settings"></i>
                                                    <span class="kt-nav__link-text">Settings</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="kt_widget2_tab3_content">
                        <div class="kt-widget2">
                            <div class="kt-widget2__item kt-widget2__item--warning">
                                <div class="kt-widget2__checkbox">
                                    <label class="kt-checkbox kt-checkbox--solid kt-checkbox--single">
                                        <input type="checkbox">
                                        <span></span>
                                    </label>
                                </div>
                                <div class="kt-widget2__info">
                                    <a href="#" class="kt-widget2__title">
                                        Make Metronic Development. Lorem Ipsum
                                    </a>
                                    <a class="kt-widget2__username">
                                        By James
                                    </a>
                                </div>
                                <div class="kt-widget2__actions">
                                    <a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown">
                                        <i class="flaticon-more-1"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right">
                                        <ul class="kt-nav">
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-line-chart"></i>
                                                    <span class="kt-nav__link-text">Reports</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-send"></i>
                                                    <span class="kt-nav__link-text">Messages</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-pie-chart-1"></i>
                                                    <span class="kt-nav__link-text">Charts</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-avatar"></i>
                                                    <span class="kt-nav__link-text">Members</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-settings"></i>
                                                    <span class="kt-nav__link-text">Settings</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-widget2__item kt-widget2__item--danger">
                                <div class="kt-widget2__checkbox">
                                    <label class="kt-checkbox kt-checkbox--solid kt-checkbox--single">
                                        <input type="checkbox">
                                        <span></span>
                                    </label>
                                </div>
                                <div class="kt-widget2__info">
                                    <a href="#" class="kt-widget2__title">
                                        Completa Financial Report For Emirates Airlines
                                    </a>
                                    <a href="#" class="kt-widget2__username">
                                        By Bob
                                    </a>
                                </div>
                                <div class="kt-widget2__actions">
                                    <a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown">
                                        <i class="flaticon-more-1"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right">
                                        <ul class="kt-nav">
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-line-chart"></i>
                                                    <span class="kt-nav__link-text">Reports</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-send"></i>
                                                    <span class="kt-nav__link-text">Messages</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-pie-chart-1"></i>
                                                    <span class="kt-nav__link-text">Charts</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-avatar"></i>
                                                    <span class="kt-nav__link-text">Members</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-settings"></i>
                                                    <span class="kt-nav__link-text">Settings</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-widget2__item kt-widget2__item--brand">
                                <div class="kt-widget2__checkbox">
                                    <label class="kt-checkbox kt-checkbox--solid kt-checkbox--single">
                                        <input type="checkbox">
                                        <span></span>
                                    </label>
                                </div>
                                <div class="kt-widget2__info">
                                    <a href="#" class="kt-widget2__title">
                                        Make Widgets Development.Estudiat Communy Elit
                                    </a>
                                    <a href="#" class="kt-widget2__username">
                                        By Aziko
                                    </a>
                                </div>
                                <div class="kt-widget2__actions">
                                    <a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown">
                                        <i class="flaticon-more-1"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right">
                                        <ul class="kt-nav">
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-line-chart"></i>
                                                    <span class="kt-nav__link-text">Reports</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-send"></i>
                                                    <span class="kt-nav__link-text">Messages</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-pie-chart-1"></i>
                                                    <span class="kt-nav__link-text">Charts</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-avatar"></i>
                                                    <span class="kt-nav__link-text">Members</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-settings"></i>
                                                    <span class="kt-nav__link-text">Settings</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-widget2__item kt-widget2__item--info">
                                <div class="kt-widget2__checkbox">
                                    <label class="kt-checkbox kt-checkbox--solid kt-checkbox--single">
                                        <input type="checkbox">
                                        <span></span>
                                    </label>
                                </div>
                                <div class="kt-widget2__info">
                                    <a href="#" class="kt-widget2__title">
                                        Completa Financial Report For Emirates Airlines
                                    </a>
                                    <a href="#" class="kt-widget2__username">
                                        By Sean
                                    </a>
                                </div>
                                <div class="kt-widget2__actions">
                                    <a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown">
                                        <i class="flaticon-more-1"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right">
                                        <ul class="kt-nav">
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-line-chart"></i>
                                                    <span class="kt-nav__link-text">Reports</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-send"></i>
                                                    <span class="kt-nav__link-text">Messages</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-pie-chart-1"></i>
                                                    <span class="kt-nav__link-text">Charts</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-avatar"></i>
                                                    <span class="kt-nav__link-text">Members</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-settings"></i>
                                                    <span class="kt-nav__link-text">Settings</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-widget2__item kt-widget2__item--success">
                                <div class="kt-widget2__checkbox">
                                    <label class="kt-checkbox kt-checkbox--solid kt-checkbox--single">
                                        <input type="checkbox">
                                        <span></span>
                                    </label>
                                </div>
                                <div class="kt-widget2__info">
                                    <a href="#" class="kt-widget2__title">
                                        Completa Financial Report For Emirates Airlines
                                    </a>
                                    <a href="#" class="kt-widget2__username">
                                        By Bob
                                    </a>
                                </div>
                                <div class="kt-widget2__actions">
                                    <a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown">
                                        <i class="flaticon-more-1"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right">
                                        <ul class="kt-nav">
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-line-chart"></i>
                                                    <span class="kt-nav__link-text">Reports</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-send"></i>
                                                    <span class="kt-nav__link-text">Messages</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-pie-chart-1"></i>
                                                    <span class="kt-nav__link-text">Charts</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-avatar"></i>
                                                    <span class="kt-nav__link-text">Members</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-settings"></i>
                                                    <span class="kt-nav__link-text">Settings</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-widget2__item kt-widget2__item--primary">
                                <div class="kt-widget2__checkbox">
                                    <label class="kt-checkbox kt-checkbox--solid kt-checkbox--single">
                                        <input type="checkbox">
                                        <span></span>
                                    </label>
                                </div>
                                <div class="kt-widget2__info">
                                    <a href="#" class="kt-widget2__title">
                                        Make Metronic Great Again.Lorem Ipsum Amet
                                    </a>
                                    <a href="#" class="kt-widget2__username">
                                        By Bob
                                    </a>
                                </div>
                                <div class="kt-widget2__actions">
                                    <a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown">
                                        <i class="flaticon-more-1"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right">
                                        <ul class="kt-nav">
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-line-chart"></i>
                                                    <span class="kt-nav__link-text">Reports</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-send"></i>
                                                    <span class="kt-nav__link-text">Messages</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-pie-chart-1"></i>
                                                    <span class="kt-nav__link-text">Charts</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-avatar"></i>
                                                    <span class="kt-nav__link-text">Members</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-settings"></i>
                                                    <span class="kt-nav__link-text">Settings</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--end:: Widgets/Tasks -->
    </div>
</div>

<!--End::Row-->

<!--Begin::Row-->
<div class="row">
    <div class="col-xl-6 col-lg-12 order-lg-2 order-xl-1">

        <!--begin:: Widgets/Best Sellers-->
        <div class="kt-portlet kt-portlet--height-fluid">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Best Sellers
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <ul class="nav nav-pills nav-pills-sm nav-pills-label nav-pills-bold" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#kt_widget5_tab1_content" role="tab">
                                Latest
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#kt_widget5_tab2_content" role="tab">
                                Month
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#kt_widget5_tab3_content" role="tab">
                                All time
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div class="tab-content">
                    <div class="tab-pane active" id="kt_widget5_tab1_content" aria-expanded="true">
                        <div class="kt-widget5">
                            <div class="kt-widget5__item">
                                <div class="kt-widget5__content">
                                    <div class="kt-widget5__pic">
                                        <img class="kt-widget7__img" src="assets/media/products/product27.jpg" alt="">
                                    </div>
                                    <div class="kt-widget5__section">
                                        <a href="#" class="kt-widget5__title">
                                            Great Logo Designn
                                        </a>
                                        <p class="kt-widget5__desc">
                                            Metronic admin themes.
                                        </p>
                                        <div class="kt-widget5__info">
                                            <span>Author:</span>
                                            <span class="kt-font-info">Keenthemes</span>
                                            <span>Released:</span>
                                            <span class="kt-font-info">23.08.17</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="kt-widget5__content">
                                    <div class="kt-widget5__stats">
                                        <span class="kt-widget5__number">19,200</span>
                                        <span class="kt-widget5__sales">sales</span>
                                    </div>
                                    <div class="kt-widget5__stats">
                                        <span class="kt-widget5__number">1046</span>
                                        <span class="kt-widget5__votes">votes</span>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-widget5__item">
                                <div class="kt-widget5__content">
                                    <div class="kt-widget5__pic">
                                        <img class="kt-widget7__img" src="assets/media/products/product22.jpg" alt="">
                                    </div>
                                    <div class="kt-widget5__section">
                                        <a href="#" class="kt-widget5__title">
                                            Branding Mockup
                                        </a>
                                        <p class="kt-widget5__desc">
                                            Metronic bootstrap themes.
                                        </p>
                                        <div class="kt-widget5__info">
                                            <span>Author:</span>
                                            <span class="kt-font-info">Fly themes</span>
                                            <span>Released:</span>
                                            <span class="kt-font-info">23.08.17</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="kt-widget5__content">
                                    <div class="kt-widget5__stats">
                                        <span class="kt-widget5__number">24,583</span>
                                        <span class="kt-widget5__sales">sales</span>
                                    </div>
                                    <div class="kt-widget5__stats">
                                        <span class="kt-widget5__number">3809</span>
                                        <span class="kt-widget5__votes">votes</span>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-widget5__item">
                                <div class="kt-widget5__content">
                                    <div class="kt-widget5__pic">
                                        <img class="kt-widget7__img" src="assets/media/products/product15.jpg" alt="">
                                    </div>
                                    <div class="kt-widget5__section">
                                        <a href="#" class="kt-widget5__title">
                                            Awesome Mobile App
                                        </a>
                                        <p class="kt-widget5__desc">
                                            Metronic admin themes.Lorem Ipsum Amet
                                        </p>
                                        <div class="kt-widget5__info">
                                            <span>Author:</span>
                                            <span class="kt-font-info">Fly themes</span>
                                            <span>Released:</span>
                                            <span class="kt-font-info">23.08.17</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="kt-widget5__content">
                                    <div class="kt-widget5__stats">
                                        <span class="kt-widget5__number">210,054</span>
                                        <span class="kt-widget5__sales">sales</span>
                                    </div>
                                    <div class="kt-widget5__stats">
                                        <span class="kt-widget5__number">1103</span>
                                        <span class="kt-widget5__votes">votes</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="kt_widget5_tab2_content">
                        <div class="kt-widget5">
                            <div class="kt-widget5__item">
                                <div class="kt-widget5__content">
                                    <div class="kt-widget5__pic">
                                        <img class="kt-widget7__img" src="assets/media/products/product10.jpg" alt="">
                                    </div>
                                    <div class="kt-widget5__section">
                                        <a href="#" class="kt-widget5__title">
                                            Branding Mockup
                                        </a>
                                        <p class="kt-widget5__desc">
                                            Metronic bootstrap themes.
                                        </p>
                                        <div class="kt-widget5__info">
                                            <span>Author:</span>
                                            <span class="kt-font-info">Fly themes</span>
                                            <span>Released:</span>
                                            <span class="kt-font-info">23.08.17</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="kt-widget5__content">
                                    <div class="kt-widget5__stats">
                                        <span class="kt-widget5__number">24,583</span>
                                        <span class="kt-widget5__sales">sales</span>
                                    </div>
                                    <div class="kt-widget5__stats">
                                        <span class="kt-widget5__number">3809</span>
                                        <span class="kt-widget5__votes">votes</span>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-widget5__item">
                                <div class="kt-widget5__content">
                                    <div class="kt-widget5__pic">
                                        <img class="kt-widget7__img" src="assets/media/products/product11.jpg" alt="">
                                    </div>
                                    <div class="kt-widget5__section">
                                        <a href="#" class="kt-widget5__title">
                                            Awesome Mobile App
                                        </a>
                                        <p class="kt-widget5__desc">
                                            Metronic admin themes.Lorem Ipsum Amet
                                        </p>
                                        <div class="kt-widget5__info">
                                            <span>Author:</span>
                                            <span class="kt-font-info">Fly themes</span>
                                            <span>Released:</span>
                                            <span class="kt-font-info">23.08.17</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="kt-widget5__content">
                                    <div class="kt-widget5__stats">
                                        <span class="kt-widget5__number">210,054</span>
                                        <span class="kt-widget5__sales">sales</span>
                                    </div>
                                    <div class="kt-widget5__stats">
                                        <span class="kt-widget5__number">1103</span>
                                        <span class="kt-widget5__votes">votes</span>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-widget5__item">
                                <div class="kt-widget5__content">
                                    <div class="kt-widget5__pic">
                                        <img class="kt-widget7__img" src="assets/media/products/product6.jpg" alt="">
                                    </div>
                                    <div class="kt-widget5__section">
                                        <a href="#" class="kt-widget5__title">
                                            Great Logo Designn
                                        </a>
                                        <p class="kt-widget5__desc">
                                            Metronic admin themes.
                                        </p>
                                        <div class="kt-widget5__info">
                                            <span>Author:</span>
                                            <span class="kt-font-info">Keenthemes</span>
                                            <span>Released:</span>
                                            <span class="kt-font-info">23.08.17</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="kt-widget5__content">
                                    <div class="kt-widget5__stats">
                                        <span class="kt-widget5__number">19,200</span>
                                        <span class="kt-widget5__sales">sales</span>
                                    </div>
                                    <div class="kt-widget5__stats">
                                        <span class="kt-widget5__number">1046</span>
                                        <span class="kt-widget5__votes">votes</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="kt_widget5_tab3_content">
                        <div class="kt-widget5">
                            <div class="kt-widget5__item">
                                <div class="kt-widget5__content">
                                    <div class="kt-widget5__pic">
                                        <img class="kt-widget7__img" src="assets/media/products/product11.jpg" alt="">
                                    </div>
                                    <div class="kt-widget5__section">
                                        <a href="#" class="kt-widget5__title">
                                            Awesome Mobile App
                                        </a>
                                        <p class="kt-widget5__desc">
                                            Metronic admin themes.Lorem Ipsum Amet
                                        </p>
                                        <div class="kt-widget5__info">
                                            <span>Author:</span>
                                            <span class="kt-font-info">Fly themes</span>
                                            <span>Released:</span>
                                            <span class="kt-font-info">23.08.17</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="kt-widget5__content">
                                    <div class="kt-widget5__stats">
                                        <span class="kt-widget5__number">210,054</span>
                                        <span class="kt-widget5__sales">sales</span>
                                    </div>
                                    <div class="kt-widget5__stats">
                                        <span class="kt-widget5__number">1103</span>
                                        <span class="kt-widget5__votes">votes</span>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-widget5__item">
                                <div class="kt-widget5__content">
                                    <div class="kt-widget5__pic">
                                        <img class="kt-widget7__img" src="assets/media/products/product6.jpg" alt="">
                                    </div>
                                    <div class="kt-widget5__section">
                                        <a href="#" class="kt-widget5__title">
                                            Great Logo Designn
                                        </a>
                                        <p class="kt-widget5__desc">
                                            Metronic admin themes.
                                        </p>
                                        <div class="kt-widget5__info">
                                            <span>Author:</span>
                                            <span class="kt-font-info">Keenthemes</span>
                                            <span>Released:</span>
                                            <span class="kt-font-info">23.08.17</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="kt-widget5__content">
                                    <div class="kt-widget5__stats">
                                        <span class="kt-widget5__number">19,200</span>
                                        <span class="kt-widget5__sales">sales</span>
                                    </div>
                                    <div class="kt-widget5__stats">
                                        <span class="kt-widget5__number">1046</span>
                                        <span class="kt-widget5__votes">votes</span>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-widget5__item">
                                <div class="kt-widget5__content">
                                    <div class="kt-widget5__pic">
                                        <img class="kt-widget7__img" src="assets/media/products/product10.jpg" alt="">
                                    </div>
                                    <div class="kt-widget5__section">
                                        <a href="#" class="kt-widget5__title">
                                            Branding Mockup
                                        </a>
                                        <p class="kt-widget5__desc">
                                            Metronic bootstrap themes.
                                        </p>
                                        <div class="kt-widget5__info">
                                            <span>Author:</span>
                                            <span class="kt-font-info">Fly themes</span>
                                            <span>Released:</span>
                                            <span class="kt-font-info">23.08.17</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="kt-widget5__content">
                                    <div class="kt-widget5__stats">
                                        <span class="kt-widget5__number">24,583</span>
                                        <span class="kt-widget5__sales">sales</span>
                                    </div>
                                    <div class="kt-widget5__stats">
                                        <span class="kt-widget5__number">3809</span>
                                        <span class="kt-widget5__votes">votes</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--end:: Widgets/Best Sellers-->
    </div>

    <div class="col-xl-6 col-lg-6 order-lg-2 order-xl-1">

        <!--begin:: Widgets/Finance Summary-->
        <div class="kt-portlet kt-portlet--fit kt-portlet--height-fluid">
            <div class="kt-portlet__head kt-portlet__space-x">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Finance Summary
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="dropdown dropdown-inline">
                        <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-lg" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="flaticon-more-1"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <ul class="kt-nav">
                                <li class="kt-nav__section kt-nav__section--first">
                                    <span class="kt-nav__section-text">Finance</span>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link">
                                        <i class="kt-nav__link-icon flaticon2-graph-1"></i>
                                        <span class="kt-nav__link-text">Statistics</span>
                                    </a>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link">
                                        <i class="kt-nav__link-icon flaticon2-calendar-4"></i>
                                        <span class="kt-nav__link-text">Events</span>
                                    </a>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link">
                                        <i class="kt-nav__link-icon flaticon2-layers-1"></i>
                                        <span class="kt-nav__link-text">Reports</span>
                                    </a>
                                </li>
                                <li class="kt-nav__section">
                                    <span class="kt-nav__section-text">Customers</span>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link">
                                        <i class="kt-nav__link-icon flaticon2-calendar-4"></i>
                                        <span class="kt-nav__link-text">Notifications</span>
                                    </a>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link">
                                        <i class="kt-nav__link-icon flaticon2-file-1"></i>
                                        <span class="kt-nav__link-text">Files</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__body kt-portlet__body--fluid">
                <div class="kt-widget12">
                    <div class="kt-widget12__content kt-portlet__space-x kt-portlet__space-y">
                        <div class="kt-widget12__item">
                            <div class="kt-widget12__info">
                                <span class="kt-widget12__desc">Annual Companies Taxes EMS</span>
                                <span class="kt-widget12__value">$500,000</span>
                            </div>
                            <div class="kt-widget12__info">
                                <span class="kt-widget12__desc">Next Tax Review Date</span>
                                <span class="kt-widget12__value">July 24,2017</span>
                            </div>
                        </div>
                        <div class="kt-widget12__item">
                            <div class="kt-widget12__info">
                                <span class="kt-widget12__desc">Avarage Product Price</span>
                                <span class="kt-widget12__value">$60,70</span>
                            </div>
                            <div class="kt-widget12__info">
                                <span class="kt-widget12__desc">Satisfication Rate</span>
                                <div class="kt-widget12__progress">
                                    <div class="progress kt-progress--sm">
                                        <div class="progress-bar bg-brand" role="progressbar" style="width: 60%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <span class="kt-widget12__stat">
                                        63%
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kt-widget12__chart" style="height:290px;">
                        <canvas id="kt_chart_finance_summary"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!--end:: Widgets/Finance Summary-->
    </div>
    <div class="col-xl-6 col-lg-12 order-lg-3 order-xl-1">

        <!--begin:: Widgets/Support Cases-->
        <div class="kt-portlet kt-portlet--height-fluid">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Support Cases <small>premium clients</small>
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <a href="#" class="btn btn-label-brand btn-bold btn-sm dropdown-toggle" data-toggle="dropdown">
                        Show All
                    </a>
                    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right">

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
            <div class="kt-portlet__body">
                <div class="kt-widget16">
                    <div class="kt-widget16__items">
                        <div class="kt-widget16__item">
                            <span class="kt-widget16__sceduled">
                                Type
                            </span>
                            <span class="kt-widget16__amount">
                                Amount
                            </span>
                        </div>
                        <div class="kt-widget16__item">
                            <span class="kt-widget16__date">
                                EPS
                            </span>
                            <span class="kt-widget16__price  kt-font-brand">
                                +78,05%
                            </span>
                        </div>
                        <div class="kt-widget16__item">
                            <span class="kt-widget16__date">
                                PDO
                            </span>
                            <span class="kt-widget16__price  kt-font-success">
                                21,700
                            </span>
                        </div>
                        <div class="kt-widget16__item">
                            <span class="kt-widget16__date">
                                OPL Status
                            </span>
                            <span class="kt-widget16__price  kt-font-danger">
                                Negative
                            </span>
                        </div>
                        <div class="kt-widget16__item">
                            <span class="kt-widget16__date">
                                Priority
                            </span>
                            <span class="kt-widget16__price  kt-font-brand">
                                +500,200
                            </span>
                        </div>
                        <div class="kt-widget16__item">
                            <span class="kt-widget16__date">
                                Net Prifit
                            </span>
                            <span class="kt-widget16__price  kt-font-warning">
                                $18,540,60
                            </span>
                        </div>
                    </div>
                    <div class="kt-widget16__stats">
                        <div class="kt-widget16__visual">
                            <div id="kt_chart_support_tickets" style="height: 160px; width: 160px;">
                            </div>
                        </div>
                        <div class="kt-widget16__legends">
                            <div class="kt-widget16__legend">
                                <span class="kt-widget16__bullet kt-bg-info"></span>
                                <span class="kt-widget16__stat">20% Margins</span>
                            </div>
                            <div class="kt-widget16__legend">
                                <span class="kt-widget16__bullet kt-bg-success"></span>
                                <span class="kt-widget16__stat">80% Profit</span>
                            </div>
                            <div class="kt-widget16__legend">
                                <span class="kt-widget16__bullet kt-bg-danger"></span>
                                <span class="kt-widget16__stat">10% Lost</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--end:: Widgets/Support Stats-->
    </div>
    <div class="col-xl-6 col-lg-12 order-lg-3 order-xl-1">

        <!--begin:: Widgets/Support Requests-->
        <div class="kt-portlet kt-portlet--height-fluid">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Support Requests <small>for agents</small>
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <a href="#" class="btn btn-label-success btn-bold btn-sm dropdown-toggle" data-toggle="dropdown">
                        Export
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
            <div class="kt-portlet__body">
                <div class="kt-widget16">
                    <div class="kt-widget16__items">
                        <div class="kt-widget16__item">
                            <span class="kt-widget16__sceduled">
                                Type
                            </span>
                            <span class="kt-widget16__amount">
                                Amount
                            </span>
                        </div>
                        <div class="kt-widget16__item">
                            <span class="kt-widget16__date">
                                EPS
                            </span>
                            <span class="kt-widget16__price  kt-font-brand">
                                +78,05%
                            </span>
                        </div>
                        <div class="kt-widget16__item">
                            <span class="kt-widget16__date">
                                PDO
                            </span>
                            <span class="kt-widget16__price  kt-font-success">
                                21,700
                            </span>
                        </div>
                        <div class="kt-widget16__item">
                            <span class="kt-widget16__date">
                                OPL Status
                            </span>
                            <span class="kt-widget16__price  kt-font-danger">
                                Negative
                            </span>
                        </div>
                        <div class="kt-widget16__item">
                            <span class="kt-widget16__date">
                                Priority
                            </span>
                            <span class="kt-widget16__price  kt-font-brand">
                                +500,200
                            </span>
                        </div>
                        <div class="kt-widget16__item">
                            <span class="kt-widget16__date">
                                Net Prifit
                            </span>
                            <span class="kt-widget16__price  kt-font-brand">
                                $18,540,60
                            </span>
                        </div>
                    </div>
                    <div class="kt-widget16__stats">
                        <div class="kt-widget16__visual">
                            <div class="kt-widget16__chart">
                                <div class="kt-widget16__stat">32</div>
                                <canvas id="kt_chart_support_requests" style="height: 140px; width: 140px;"></canvas>
                            </div>
                        </div>
                        <div class="kt-widget16__legends">
                            <div class="kt-widget16__legend">
                                <span class="kt-widget16__bullet kt-bg-success"></span>
                                <span class="kt-widget16__stat">20% Margins</span>
                            </div>
                            <div class="kt-widget16__legend">
                                <span class="kt-widget16__bullet kt-bg-brand"></span>
                                <span class="kt-widget16__stat">80% Profit</span>
                            </div>
                            <div class="kt-widget16__legend">
                                <span class="kt-widget16__bullet kt-bg-danger"></span>
                                <span class="kt-widget16__stat">10% Lost</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--end:: Widgets/Support Requests-->
    </div>
    <div class="col-xl-6 col-lg-12 order-lg-3 order-xl-1">

        <!--begin:: Widgets/Sale Reports-->
        <div class="kt-portlet kt-portlet--tabs kt-portlet--height-fluid">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Sales Reports
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <ul class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-brand" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#kt_widget11_tab1_content" role="tab">
                                Last Month
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#kt_widget11_tab2_content" role="tab">
                                All Time
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="kt-portlet__body">

                <!--Begin::Tab Content-->
                <div class="tab-content">

                    <!--begin::tab 1 content-->
                    <div class="tab-pane active" id="kt_widget11_tab1_content">

                        <!--begin::Widget 11-->
                        <div class="kt-widget11">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td style="width:1%">#</td>
                                            <td style="width:40%">Application</td>
                                            <td style="width:14%">Sales</td>
                                            <td style="width:15%">Change</td>
                                            <td style="width:15%">Status</td>
                                            <td style="width:15%" class="kt-align-right">Total</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <label class="kt-checkbox kt-checkbox--single">
                                                    <input type="checkbox"><span></span>
                                                </label>
                                            </td>
                                            <td>
                                                <a href="#" class="kt-widget11__title">Loop</a>
                                                <span class="kt-widget11__sub">CRM System</span>
                                            </td>
                                            <td>19,200</td>
                                            <td>$63</td>
                                            <td><span class="kt-badge kt-badge--inline kt-badge--brand">new</span></td>
                                            <td class="kt-align-right kt-font-brand kt-font-bold">$34,740</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="kt-checkbox kt-checkbox--single"><input type="checkbox"><span></span></label>
                                            </td>
                                            <td>
                                                <a href="#" class="kt-widget11__title">Selto</a>
                                                <span class="kt-widget11__sub">Powerful Website Builder</span>
                                            </td>
                                            <td>24,310</td>
                                            <td>$39</td>
                                            <td><span class="kt-badge kt-badge--inline kt-badge--success">approved</span></td>
                                            <td class="kt-align-right kt-font-brand kt-font-bold">$46,010</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="kt-checkbox kt-checkbox--single"><input type="checkbox"><span></span></label>
                                            </td>
                                            <td>
                                                <a href="#" class="kt-widget11__title">Jippo</a>
                                                <span class="kt-widget11__sub">The Best Selling App</span>
                                            </td>
                                            <td>9,076</td>
                                            <td>$105</td>
                                            <td><span class="kt-badge kt-badge--inline kt-badge--warning">pending</span></td>
                                            <td class="kt-align-right kt-font-brand kt-font-bold">$67,800</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="kt-checkbox kt-checkbox--single"><input type="checkbox"><span></span></label>
                                            </td>
                                            <td>
                                                <a href="#" class="kt-widget11__title">Verto</a>
                                                <span class="kt-widget11__sub">Web Development Tool</span>
                                            </td>
                                            <td>11,094</td>
                                            <td>$16</td>
                                            <td><span class="kt-badge kt-badge--inline kt-badge--danger">on hold</span></td>
                                            <td class="kt-align-right kt-font-brand kt-font-bold">$18,520</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="kt-widget11__action kt-align-right">
                                <button type="button" class="btn btn-label-brand btn-bold btn-sm">Import Report</button>
                            </div>
                        </div>

                        <!--end::Widget 11-->
                    </div>

                    <!--end::tab 1 content-->

                    <!--begin::tab 2 content-->
                    <div class="tab-pane" id="kt_widget11_tab2_content">

                        <!--begin::Widget 11-->
                        <div class="kt-widget11">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td style="width:1%">#</td>
                                            <td style="width:40%">Application</td>
                                            <td style="width:14%">Sales</td>
                                            <td style="width:15%">Change</td>
                                            <td style="width:15%">Status</td>
                                            <td style="width:15%" class="kt-align-right">Total</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <label class="kt-checkbox kt-checkbox--single">
                                                    <input type="checkbox"><span></span>
                                                </label>
                                            </td>
                                            <td>
                                                <span class="kt-widget11__title">Loop</span>
                                                <span class="kt-widget11__sub">CRM System</span>
                                            </td>
                                            <td>19,200</td>
                                            <td>$63</td>
                                            <td><span class="kt-badge kt-badge--inline kt-badge--danger">pending</span></td>
                                            <td class="kt-align-right kt-font-brand  kt-font-bold">$23,740</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="kt-checkbox kt-checkbox--single"><input type="checkbox"><span></span></label>
                                            </td>
                                            <td>
                                                <span class="kt-widget11__title">Selto</span>
                                                <span class="kt-widget11__sub">Powerful Website Builder</span>
                                            </td>
                                            <td>24,310</td>
                                            <td>$39</td>
                                            <td><span class="kt-badge kt-badge--inline kt-badge--success">new</span></td>
                                            <td class="kt-align-right kt-font-success  kt-font-bold">$46,010</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="kt-checkbox kt-checkbox--single"><input type="checkbox"><span></span></label>
                                            </td>
                                            <td>
                                                <span class="kt-widget11__title">Jippo</span>
                                                <span class="kt-widget11__sub">The Best Selling App</span>
                                            </td>
                                            <td>9,076</td>
                                            <td>$105</td>
                                            <td><span class="kt-badge kt-badge--inline kt-badge--brand">approved</span></td>
                                            <td class="kt-align-right kt-font-danger kt-font-bold">$15,800</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="kt-checkbox kt-checkbox--single"><input type="checkbox"><span></span></label>
                                            </td>
                                            <td>
                                                <span class="kt-widget11__title">Verto</span>
                                                <span class="kt-widget11__sub">Web Development Tool</span>
                                            </td>
                                            <td>11,094</td>
                                            <td>$16</td>
                                            <td><span class="kt-badge kt-badge--inline kt-badge--info">done</span></td>
                                            <td class="kt-align-right kt-font-warning kt-font-bold">$8,520</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="kt-widget11__action kt-align-right">
                                <button type="button" class="btn btn-label-success btn-bold btn-sm">Generate Report</button>
                            </div>
                        </div>

                        <!--end::Widget 11-->
                    </div>

                    <!--end::tab 2 content-->

                    <!--begin::tab 3 content-->
                    <div class="tab-pane" id="kt_widget11_tab3_content">
                    </div>

                    <!--end::tab 3 content-->
                </div>

                <!--End::Tab Content-->
            </div>
        </div>

        <!--end:: Widgets/Sale Reports-->
    </div>
    <div class="col-xl-6 col-lg-6 order-lg-2 order-xl-1">

        <!--Begin::Portlet-->
        <div class="kt-portlet kt-portlet--height-fluid">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Recent Notifications
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <ul class="nav nav-pills nav-pills-sm nav-pills-label nav-pills-bold" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#kt_widget3_tab1_content" role="tab">
                                Today
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#kt_widget3_tab2_content" role="tab">
                                Month
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div class="tab-content">
                    <div class="tab-pane active" id="kt_widget3_tab1_content">

                        <!--Begin::Timeline 3 -->
                        <div class="kt-timeline-v3">
                            <div class="kt-timeline-v3__items">
                                <div class="kt-timeline-v3__item kt-timeline-v3__item--info">
                                    <span class="kt-timeline-v3__item-time">09:00</span>
                                    <div class="kt-timeline-v3__item-desc">
                                        <span class="kt-timeline-v3__item-text">
                                            Lorem ipsum dolor sit amit,consectetur eiusmdd tempor
                                        </span><br>
                                        <span class="kt-timeline-v3__item-user-name">
                                            <a href="#" class="kt-link kt-link--dark kt-timeline-v3__itek-link">
                                                By Bob
                                            </a>
                                        </span>
                                    </div>
                                </div>
                                <div class="kt-timeline-v3__item kt-timeline-v3__item--warning">
                                    <span class="kt-timeline-v3__item-time">10:00</span>
                                    <div class="kt-timeline-v3__item-desc">
                                        <span class="kt-timeline-v3__item-text">
                                            Lorem ipsum dolor sit amit
                                        </span><br>
                                        <span class="kt-timeline-v3__item-user-name">
                                            <a href="#" class="kt-link kt-link--dark kt-timeline-v3__itek-link">
                                                By Sean
                                            </a>
                                        </span>
                                    </div>
                                </div>
                                <div class="kt-timeline-v3__item kt-timeline-v3__item--brand">
                                    <span class="kt-timeline-v3__item-time">11:00</span>
                                    <div class="kt-timeline-v3__item-desc">
                                        <span class="kt-timeline-v3__item-text">
                                            Lorem ipsum dolor sit amit eiusmdd tempor
                                        </span><br>
                                        <span class="kt-timeline-v3__item-user-name">
                                            <a href="#" class="kt-link kt-link--dark kt-timeline-v3__itek-link">
                                                By James
                                            </a>
                                        </span>
                                    </div>
                                </div>
                                <div class="kt-timeline-v3__item kt-timeline-v3__item--success">
                                    <span class="kt-timeline-v3__item-time">12:00</span>
                                    <div class="kt-timeline-v3__item-desc">
                                        <span class="kt-timeline-v3__item-text">
                                            Lorem ipsum dolor
                                        </span><br>
                                        <span class="kt-timeline-v3__item-user-name">
                                            <a href="#" class="kt-link kt-link--dark kt-timeline-v3__itek-link">
                                                By James
                                            </a>
                                        </span>
                                    </div>
                                </div>
                                <div class="kt-timeline-v3__item kt-timeline-v3__item--danger">
                                    <span class="kt-timeline-v3__item-time">14:00</span>
                                    <div class="kt-timeline-v3__item-desc">
                                        <span class="kt-timeline-v3__item-text">
                                            Lorem ipsum dolor sit amit,consectetur eiusmdd
                                        </span><br>
                                        <span class="kt-timeline-v3__item-user-name">
                                            <a href="#" class="kt-link kt-link--dark kt-timeline-v3__itek-link">
                                                By Derrick
                                            </a>
                                        </span>
                                    </div>
                                </div>
                                <div class="kt-timeline-v3__item kt-timeline-v3__item--info">
                                    <span class="kt-timeline-v3__item-time">15:00</span>
                                    <div class="kt-timeline-v3__item-desc">
                                        <span class="kt-timeline-v3__item-text">
                                            Lorem ipsum dolor sit amit,consectetur
                                        </span><br>
                                        <span class="kt-timeline-v3__item-user-name">
                                            <a href="#" class="kt-link kt-link--dark kt-timeline-v3__itek-link">
                                                By Iman
                                            </a>
                                        </span>
                                    </div>
                                </div>
                                <div class="kt-timeline-v3__item kt-timeline-v3__item--brand">
                                    <span class="kt-timeline-v3__item-time">17:00</span>
                                    <div class="kt-timeline-v3__item-desc">
                                        <span class="kt-timeline-v3__item-text">
                                            Lorem ipsum dolor sit consectetur eiusmdd tempor
                                        </span><br>
                                        <span class="kt-timeline-v3__item-user-name">
                                            <a href="#" class="kt-link kt-link--dark kt-timeline-v3__itek-link">
                                                By Aziko
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--End::Timeline 3 -->
                    </div>
                    <div class="tab-pane" id="kt_widget3_tab2_content">

                        <!--Begin::Timeline 3 -->
                        <div class="kt-timeline-v3">
                            <div class="kt-timeline-v3__items">
                                <div class="kt-timeline-v3__item kt-timeline-v3__item--info">
                                    <span class="kt-timeline-v3__item-time kt-font-success">09:00</span>
                                    <div class="kt-timeline-v3__item-desc">
                                        <span class="kt-timeline-v3__item-text">
                                            Contrary to popular belief, Lorem Ipsum is not simply random text.
                                        </span><br>
                                        <span class="kt-timeline-v3__item-user-name">
                                            <a href="#" class="kt-link kt-link--dark kt-timeline-v3__itek-link">
                                                By Bob
                                            </a>
                                        </span>
                                    </div>
                                </div>
                                <div class="kt-timeline-v3__item kt-timeline-v3__item--warning">
                                    <span class="kt-timeline-v3__item-time kt-font-warning">10:00</span>
                                    <div class="kt-timeline-v3__item-desc">
                                        <span class="kt-timeline-v3__item-text">
                                            There are many variations of passages of Lorem Ipsum available.
                                        </span><br>
                                        <span class="kt-timeline-v3__item-user-name">
                                            <a href="#" class="kt-link kt-link--dark kt-timeline-v3__itek-link">
                                                By Sean
                                            </a>
                                        </span>
                                    </div>
                                </div>
                                <div class="kt-timeline-v3__item kt-timeline-v3__item--brand">
                                    <span class="kt-timeline-v3__item-time kt-font-primary">11:00</span>
                                    <div class="kt-timeline-v3__item-desc">
                                        <span class="kt-timeline-v3__item-text">
                                            Contrary to popular belief, Lorem Ipsum is not simply random text.
                                        </span><br>
                                        <span class="kt-timeline-v3__item-user-name">
                                            <a href="#" class="kt-link kt-link--dark kt-timeline-v3__itek-link">
                                                By James
                                            </a>
                                        </span>
                                    </div>
                                </div>
                                <div class="kt-timeline-v3__item kt-timeline-v3__item--success">
                                    <span class="kt-timeline-v3__item-time kt-font-success">12:00</span>
                                    <div class="kt-timeline-v3__item-desc">
                                        <span class="kt-timeline-v3__item-text">
                                            The standard chunk of Lorem Ipsum used since the 1500s is reproduced.
                                        </span><br>
                                        <span class="kt-timeline-v3__item-user-name">
                                            <a href="#" class="kt-link kt-link--dark kt-timeline-v3__itek-link">
                                                By James
                                            </a>
                                        </span>
                                    </div>
                                </div>
                                <div class="kt-timeline-v3__item kt-timeline-v3__item--danger">
                                    <span class="kt-timeline-v3__item-time kt-font-warning">14:00</span>
                                    <div class="kt-timeline-v3__item-desc">
                                        <span class="kt-timeline-v3__item-text">
                                            Latin words, combined with a handful of model sentence structures.
                                        </span><br>
                                        <span class="kt-timeline-v3__item-user-name">
                                            <a href="#" class="kt-link kt-link--dark kt-timeline-v3__itek-link">
                                                By Derrick
                                            </a>
                                        </span>
                                    </div>
                                </div>
                                <div class="kt-timeline-v3__item kt-timeline-v3__item--info">
                                    <span class="kt-timeline-v3__item-time kt-font-info">15:00</span>
                                    <div class="kt-timeline-v3__item-desc">
                                        <span class="kt-timeline-v3__item-text">
                                            Contrary to popular belief, Lorem Ipsum is not simply random text.
                                        </span><br>
                                        <span class="kt-timeline-v3__item-user-name">
                                            <a href="#" class="kt-link kt-link--dark kt-timeline-v3__itek-link">
                                                By Iman
                                            </a>
                                        </span>
                                    </div>
                                </div>
                                <div class="kt-timeline-v3__item kt-timeline-v3__item--brand">
                                    <span class="kt-timeline-v3__item-time kt-font-danger">17:00</span>
                                    <div class="kt-timeline-v3__item-desc">
                                        <span class="kt-timeline-v3__item-text">
                                            Lorem Ipsum is therefore always free from repetition, injected humour.
                                        </span><br>
                                        <span class="kt-timeline-v3__item-user-name">
                                            <a href="#" class="kt-link kt-link--dark kt-timeline-v3__itek-link">
                                                By Aziko
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--End::Timeline 3 -->
                    </div>
                </div>
            </div>
        </div>

        <!--End::Portlet-->
    </div>
</div>

<!--End::Row-->

<!--End::Dashboard 5-->
@endsection
