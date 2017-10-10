@if($errors->any())
    <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<div class="form-group">
    {!! Form::label('title', 'Title:', ['class' => 'control-label']) !!}
    <small class="required">(Required)</small>
    {!! Form::text('title', null, ['id'=>'title', 'class' => 'form-control','required']) !!}
</div>

<div class="form-group">
    {!! Form::label('type', 'Type:', ['class' => 'control-label']) !!}
    <small class="required">(Required)</small>
    {!! Form::Select('type',array('main'=>'Main','top'=>'Top','user'=>'User','side'=>'Side','footer'=>'Footer'),Input::old('type'),['class'=>'form-control ','required']) !!}
</div>

<div class="form-group">
    {!! Form::label('desc', 'Desc:', ['class' => 'control-label']) !!}
    {!! Form::textarea('desc', null, ['id'=>'desc', 'class' => 'form-control']) !!}
</div>

<p> &nbsp; </p>

<a href=""  class="btn btn-default" type="button"> Close </a>

{!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}