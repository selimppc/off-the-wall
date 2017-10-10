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

<p> &nbsp; </p>

<a href=""  class="btn btn-default" type="button"> Close </a>

{!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}