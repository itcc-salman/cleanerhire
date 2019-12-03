@extends('frontend.layouts.master')

@section('template_title')
    {!! trans('auth.exceeded') !!}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        {!! trans('auth.exceeded') !!}
                    </div>
                    <div class="panel-body">
                        <p>
                            {!! trans('auth.tooManyEmails', ['email' => $email, 'hours' => $hours]) !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
