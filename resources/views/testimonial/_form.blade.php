@if($errors->any())
    <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<div class="form-group">
    {!! Form::label('name', 'Name:', ['class' => 'control-label']) !!}
     <small class="required">(Required)</small>
    {!! Form::text('name', null, ['id'=>'name', 'class' => 'form-control','required']) !!}
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
    {!! Form::label('content', 'Content:', ['class' => 'control-label']) !!}
    {!! Form::textarea('content', null, ['id'=>'content', 'class' => 'wysihtml5 form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('project', 'Project:', ['class' => 'control-label']) !!}
    <small class="required">(Required)</small>
    {!! Form::text('project', null, ['id'=>'project', 'class' => 'form-control','required']) !!}
</div>
<div class="form-group">
    {!! Form::label('status', 'Status:', ['class' => 'control-label']) !!}
    <small class="required">(Required)</small>
    {!! Form::Select('status',array('active'=>'Active','inactive'=>'Inactive'),Input::old('status'),['class'=>'form-control ','required']) !!}
</div>

<p> &nbsp; </p>

<a href=""  class="btn btn-default" type="button"> Close </a>

{!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}