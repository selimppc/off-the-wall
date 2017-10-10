@if($errors->any())
    <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<div class="form-group">
    {!! Form::label('first_name', 'First Name:', ['class' => 'control-label']) !!}
     <small class="required">(Required)</small>
    {!! Form::text('first_name', null, ['id'=>'first_name', 'class' => 'form-control','required']) !!}
</div>

<div class="form-group">
    {!! Form::label('last_name', 'Last Name:', ['class' => 'control-label']) !!}
    {!! Form::text('last_name', null, ['id'=>'last_name', 'class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('email', 'Email:', ['class' => 'control-label']) !!}
    <small class="required">(Required)</small>
    {!! Form::email('email', null, ['id'=>'email', 'class' => 'form-control','required']) !!}
</div>

<div class="form-group">
    {!! Form::label('phone', 'Phone:', ['class' => 'control-label']) !!}
    <small class="required">(Required)</small>
    {!! Form::text('phone', null, ['id'=>'phone', 'class' => 'form-control','required']) !!}
</div>

<div class="form-group">
    {!! Form::label('twitter', 'Twitter:', ['class' => 'control-label']) !!}
    {!! Form::text('twitter', null, ['id'=>'twitter', 'class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('facebook', 'Facebook:', ['class' => 'control-label']) !!}
    {!! Form::text('facebook', null, ['id'=>'facebook', 'class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('google_plus', 'Google Plus:', ['class' => 'control-label']) !!}
    {!! Form::text('google_plus', null, ['id'=>'google_plus', 'class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('linkedin', 'LinkedIn:', ['class' => 'control-label']) !!}
    {!! Form::text('linkedin', null, ['id'=>'linkedin', 'class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('designation', 'Designation:', ['class' => 'control-label']) !!}
    <small class="required">(Required)</small>
    {!! Form::text('designation', null, ['id'=>'designation', 'class' => 'form-control','required']) !!}
</div>

<div class="form-group">
    {!! Form::label('responsibility', 'Responsibility:', ['class' => 'control-label']) !!}
    {!! Form::textarea('responsibility', null, ['id'=>'responsibility', 'class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('status', 'Status:', ['class' => 'control-label']) !!}
    <small class="required">(Required)</small>
    {!! Form::Select('status',array('active'=>'Active','inactive'=>'Inactive'),Input::old('status'),['class'=>'form-control ','required']) !!}
</div>

<div class="form-group">
    <div>
        {!! Form::file('image', array('title'=>'Upload Image','required')) !!}
    </div>
</div>

<p> &nbsp; </p>

{!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
<a href=""  class="btn btn-default" type="button"> Close </a>

