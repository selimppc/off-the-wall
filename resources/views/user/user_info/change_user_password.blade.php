@extends('layout.master')
@section('sidebar')
@parent
@include('layout.sidebar')
@stop

@section('content')

        <!-- page start-->
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <div class="box-header" style="background-color: #0490a6">
                <h3 class="text-center text-green"><b style="color: #f5f5f5">Change password</b></h3>
            </div>
            <span class="text-muted ">Please fillup the following fields.</span>
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

<div class="panel-body">
            {!! Form::open(['route' => 'user-signup.update_password','files'=>'true']) !!}
            <div class="form-group">
                {!! Form::label('old_password', 'Old Password') !!}
                {!! Form::password('old_password',['class' => 'form-control','placeholder'=>'Enter Old Password','required','id'=>'old']) !!}
                <div style="color:firebrick" id ="errors"></div>
            </div>
            <div class="form-group">
                {!! Form::label('password', 'New Password') !!}
                {!! Form::password('password',['class' => 'form-control','placeholder'=>'Enter New Password','required','id'=>'password','name'=>'password']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('confirm_password', 'Confirm Password') !!}
                {!! Form::password('confirm_password', ['class' => 'form-control','placeholder'=>'Re-Enter New Password','required','id'=>'confirm_password','name'=>'confirm_password','onkeyup'=>"validation()"]) !!}
                <span id='message'></span>
            </div>


            <p> &nbsp; </p>

            {!! Form::submit('Save changes', ['class' => 'btn btn-success']) !!}
            {!! Form::close() !!}
</div>
        </section>
    </div>
</div>

            {{--{!! Form::submit('Save changes', ['class' => 'btn btn-success','onClick'=>'return validate()']) !!}--}}

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
@stop