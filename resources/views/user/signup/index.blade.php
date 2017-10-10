@extends('layout.master')
@section('sidebar')
@parent
{{--@include('layout.sidebar')--}}
@stop

@section('content')

        <!-- page start-->
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <div class="box-header" style="background-color: #0490a6">
                <h3 class="text-center text-green"><b style="color: #f5f5f5">Sign Up Here.......</b></h3>
            </div>
            <span class="text-muted ">Please fillup the following fields and be an registered user.</span>
            <span class="text-muted "><em style="color:midnightblue"><span style="color:red;">(*)</span> Marked are required fields </em></span>

            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

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


            {!! Form::open(['route' => 'user-signup.store','files'=>'true',$user_id]) !!}
            {!! Form::hidden('type','user') !!}
            {!! Form::hidden('status','inactive') !!}
            <div class="panel-body">
                <div class="adv-table">
                    <div class="form-group">
                        {!! Form::label('first_name', 'First Name:', ['class' => 'control-label']) !!}<span style="color:red;">*</span>
                        {!! Form::text('first_name', null, ['id'=>'first_name', 'class' => 'form-control', 'minlength'=>'2', 'required'=>'required']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('last_name', 'Last Name:', ['class' => 'control-label']) !!}
                        {!! Form::text('last_name', null, ['id'=>'last_name', 'class' => 'form-control', 'minlength'=>'2']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('email', 'Email:', ['class' => 'control-label']) !!}<span style="color:red;">*</span>
                        {!! Form::email('email', $email, ['id'=>'email', 'readonly', 'class' => 'form-control', 'required'=>'required']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('password', 'Password:', ['class' => 'control-label']) !!}<span style="color:red;">*</span>
                        {!! Form::password('password', array('class'=>'form-control','required','id'=>'password','name'=>'password')) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('confirm_password', 'Confirm Password:', ['class' => 'control-label']) !!}<span style="color:red;">*</span>
                        {!! Form::password('confirm_password', array('class'=>'form-control','required','id'=>'confirm_password','name'=>'confirm_password','onkeyup'=>"validation()")) !!}
                        <span id='message'></span>
                    </div>
                    <div class="form-group">
                        {!! Form::label('address', 'Address:', ['class' => 'control-label']) !!}
                        {!! Form::text('address', null, ['id'=>'address', 'class' => 'form-control', 'minlength'=>'2']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('phone_number', 'Phone Number:', ['class' => 'control-label']) !!}
                        {!! Form::text('phone_number', null, ['id'=>'phone_number', 'class' => 'form-control', 'minlength'=>'2']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('state', 'State:', ['class' => 'control-label']) !!}
                        {!! Form::text('state', null, ['id'=>'state', 'class' => 'form-control', 'minlength'=>'2']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('country_id', 'Country:', ['class' => 'control-label']) !!}
                        {!! Form::Select('country_id',$countryList,Input::old('country_id'),['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('image', 'Profile Picture')!!}
                        {!! Form::file('image', Input::old('image'),array('class' => 'form-control','placeholder'=>'','required'=>'required')) !!}
                    </div>

                    <p> &nbsp; </p>

                    {{--<a href="{{ URL::route('user-signup.index') }}"  class="btn btn-default" type="button"> Close </a>--}}
                    {!! Form::hidden('id', $user_id) !!}
                    {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </section>
    </div>
</div>
<!-- page end-->


<script>

    function validation() {
        $('#confirm_password').on('keyup', function () {
            if ($(this).val() == $('#password').val()) {
                $('#message').html('');
                $('input[type="submit"]').prop('disabled', false);
            } else {
                $('#message').html('confirm password do not match with password,please check.').css('color', 'red');
                $('input[type="submit"]').prop('disabled', true);
            }
        });
    }

</script>

<!--script for this page only-->
@if($errors->any())
    <script type="text/javascript">
        $(function(){
            $("#addData").modal('show');
        });
    </script>
@endif

@stop