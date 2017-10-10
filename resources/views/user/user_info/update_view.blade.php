@if($errors->any())
    <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

{{--{!! Form::hidden('status','inactive') !!}--}}

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
    {!! Form::email('email', null, ['id'=>'email', 'class' => 'form-control', 'required'=>'required']) !!}
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
{{--<div class="form-group">
    {!! Form::label('status', 'Status:', ['class' => 'control-label']) !!}<span style="color:red;">*</span>
    {!! Form::Select('status',array(''=>'Select Status','active'=>'Active','inactive'=>'Inactive'),Input::old('status'),['class'=>'form-control ','required']) !!}
</div>--}}
<div class="form-group">
    {!! Form::label('type', 'Type:', ['class' => 'control-label']) !!}<span style="color:red;">*</span>
    {!! Form::Select('type',array(''=>'Select Type','admin'=>'Admin','user'=>'User'),Input::old('type'),['class'=>'form-control ','required']) !!}
</div>

<p> &nbsp; </p>

<a href="{{ URL::route('user.user-list') }}"  class="btn btn-default" type="button"> Close </a>

{!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}