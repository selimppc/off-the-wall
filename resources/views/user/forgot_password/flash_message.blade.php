
@extends('layout.master')
@section('sidebar')
    @parent
    {{--@include('layout.sidebar')--}}
@stop

@section('content')

    <div class="col-lg-6"  style="margin-left: 15%">
        <section class="panel">
            <header class="panel-heading">
                <strong>Password Reset Confirmation Sent!</strong>
            </header>
            {{--<div class="panel-body">
                Please Check your email for the registration .
            </div>--}}
            <p>&nbsp;</p>
            <p class="text-center"><b>We emailed you a link and instructions for updating your password.</b></p>
            <p class="text-center"><b>After 30 minutes, the link to update your password will expire.</b></p>
            {{--<p><a class="pull-right btn btn-sm btn-default" href="{{URL::route('user/login')}}"><b>Continue to Login</b></a></p>--}}
            <p>&nbsp;</p>
        </section>
    </div>
@stop