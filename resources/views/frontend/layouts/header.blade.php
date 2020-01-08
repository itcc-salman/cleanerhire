<!--Web_Header-->
<div class="web_header">
    <nav class="navbar navbar-default navbar-fixed-top {{ !request()->is('/') ? 'navbar_inner' : '' }}" id="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top_menu" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ route('front.home') }}"><img src="{{ asset('front/images/logo.png') }}" alt="" /></a>
            </div>
            <div class="collapse navbar-collapse" id="top_menu">
                <ul class="nav navbar-nav">
                    {{-- <li><a href="book-a-cleaning-jobs.html">Book a Cleaning Jobs</a></li> --}}
                    <li><a href="{{ route('front.book_a_cleaning_job') }}">Book a Cleaning Jobs</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">How it works</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if(!Auth::check())
                        <li><a href="{{ route('front.register_customer') }}" class="trigger-btn" data-toggle="modal">Sign up</a></li>
                        {{-- <li><a href="#hire_login" class="trigger-btn" data-toggle="modal">Log in</a></li> --}}
                        {{-- <li><a href="{{ route('front.register_cleaner') }}" class="trigger-btn">Sign up</a></li> --}}
                        <li><a href="{{ route('login') }}" class="trigger-btn" data-toggle="modal">Log in</a></li>
                        <li><a href="{{ route('front.become_a_cleaner') }}" class="head_btn">Become a Cleaner</a></li>
                    @else
                        <li><a href="javascript:void(0)">Hi, {{ Auth::user()->first_name }}</a></li>
                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="trigger-btn">Logout</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                    @endif
                </ul>
            </div>

        </div>
    </nav>
</div>
<!--Web_Header-->
