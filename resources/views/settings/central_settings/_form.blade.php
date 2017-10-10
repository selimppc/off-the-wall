@if($errors->any())
    <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
@if(Session::has('flash_message_error'))
    <div class="alert alert-danger">
        <p>{{ Session::get('flash_message_error') }}</p>
    </div>
@endif
<i>(for login-notification $ pause-system,status put yes/no. And for max-google-email ,status put numeric value)</i>
<div class="form-group">
    {!! Form::label('user_type', 'User Type', ['class' => 'control-label']) !!}
    {!! Form::Select('user_type',array('admin'=>'Admin','user'=>'User'),Input::old('user_type'),['class'=>'form-control ','required'=>'required']) !!}
</div>

<div class="form-group">
    {!! Form::label('status', 'Status:', ['class' => 'control-label']) !!}
    {!! Form::text('status', Input::old('status'), ['class' => 'form-control','required']) !!}
</div>
<p> &nbsp; </p>

<a href="{{ URL::route('central-settings') }}"  class="btn btn-default" type="button"> Close </a>

{!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
