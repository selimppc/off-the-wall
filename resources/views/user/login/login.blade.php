@extends('layout.master')

@section('content')

        <!-- page start-->
@if(Session::has('flash_message'))
    <div class="alert alert-success">
        <p>{{ Session::get('flash_message') }}</p>
    </div>
@endif
@if(Session::has('flash_message_error'))
    <div class="alert alert-danger">
        <p>{{ Session::get('flash_message_error') }}</p>
    </div>
@endif

{!! Form::open(['route' => 'login','class'=> 'form-signin']) !!}

{{--{!! Form::hidden('_token', csrf_token()!!}--}}


<h2 class="form-signin-heading">Sign in now</h2>
<div class="login-wrap">
    <div class="form-group">
        {!! Form::label('email', 'Email Address:', ['class' => 'control-label']) !!}<span style="color:red;">*</span>
        {!! Form::email('email', null, ['class'=>'form-control', 'placeholder'=>'Email address', 'required'=>'required','autofocus']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('password', 'Password:', ['class' => 'control-label']) !!}<span style="color:red;">*</span>
        {!! Form::password('password', ['class'=>'form-control', 'placeholder'=>'Password', 'required'=>'required']) !!}
    </div>

    {!! Form::submit('Sign in', ['class' => 'btn btn-lg btn-login btn-block']) !!}

    {!! Form::close() !!}


    <div class="registration">
        <a class="" href="{{URL::to('user/forgot-password')}}">
            Forgot Password ?
        </a>
        <!-- <a href="{{URL::to('user/sign-up')}}" class=" pull-right">Sign Up</a> -->
    </div>

</div>

<!-- Modal -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
    <div class="modal-dialog" style="width: 75%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Forgot Password ?</h4>
            </div>
            <div class="modal-body">
                <p>Enter your e-mail address below to reset your password.</p>
                <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                <button class="btn btn-success" type="button">Submit</button>
            </div>
        </div>
    </div>
</div>
<!-- modal -->




@stop