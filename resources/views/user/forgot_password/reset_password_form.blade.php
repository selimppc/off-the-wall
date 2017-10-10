@extends('layout.master')
@section('sidebar')
    @parent
@stop

@section('content')


    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <div class="col-lg-6"  style="margin-left: 15%">
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
        <section class="panel">
            <header class="panel-heading">
                <strong>Reset Your Password</strong>
            </header>
            <div class="panel-body">
              {!! Form::open(array('url'=>'user/save-new-password')) !!}

                {!! Form::hidden('id', $id, array('class'=>'form-control')) !!}
                {!! Form::label('password','Password') !!}
                {!! Form::password('password',  array('class'=>'form-control','required','id'=>'password','name'=>'password')) !!}

                {!! Form::label('confirm_password', 'Confirm Password')!!}
                {!! Form::password('confirm_password', array('class'=>'form-control','required','id'=>'confirm_password','name'=>'confirm_password')) !!}
                <p>&nbsp;</p>
                {!! Form::submit('Submit', array('class'=>'pull-right btn btn-sm btn-primary','id'=>'sub-btn'))!!}
                {!! Form::close() !!}

            </div>
        </section>
    </div>

 @stop
