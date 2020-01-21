@extends('frontend.layouts.master')
@section('content')
<!--Web_Inner_Banner-->
<div class="web_innerpage_section">
    <div class="container">
        <div class="inner_banner">
            <h1>You are not authorized to view this booking</h1>
        </div>

        <div class="innerpage_section_head">
            <div class="head_a"></div>
            <div class="head_b"></div>
            <div class="head_c"></div>
            <div class="head_d"></div>
        </div>

        <div class="innerpage_section">
            <div class="row">
                <div class="col-md-8 col-sm-8 col-xs-8">
                    <form id="booking" method="POST">
                        <div class="book_form_left">
                            <div class="book_form_tab">
                                <label class="bft_question">Please contact us at <a href="mailto:#">example@mail.com</a>, if you have any problem regarding your booking.</label>
                                <div class="book_job">
                                </div>
                            </div>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<!--Web_Innerpage_Section-->
@endsection
