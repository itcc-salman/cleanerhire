<!-- begin:: Subheader -->
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
        <div class="kt-subheader__main"></div>
        <div class="kt-subheader__toolbar">
            <div class="kt-subheader__main">
                <div class="kt-subheader__breadcrumbs">
                    <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="{{ route('backend.dashboard') }}" class="kt-subheader__breadcrumbs-link"> Dashboard </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="javascript:;" class="kt-subheader__breadcrumbs-link">@yield('title')</a>

                    <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">{{$title ?? ''}}</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end:: Subheader -->
