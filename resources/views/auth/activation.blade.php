@extends('frontend.layouts.master')

@section('template_title')
	{{ trans('auth.activation') }}
@endsection

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
	<div class="container">
		<div class="row">
			<div class="col-md-10 offset-md-1">
				<div class="card card-default">
					<div class="card-header">{{ trans('auth.activation') }}</div>
					<div class="card-body">
						<p>{{ trans('auth.regThanks') }}</p>
						<p>{{ trans('auth.anEmailWasSent',['email' => $email, 'date' => $date ] ) }}</p>
						<p>{{ trans('auth.clickInEmail') }}</p>
						<p><a href='/activation' class="btn btn-primary">{{ trans('auth.clickHereResend') }}</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
