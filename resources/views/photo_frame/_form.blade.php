@if($errors->any())
    <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<div class="col-md-6 col-xs-12">

    <div class="form-group">
        {!! Form::label('title', 'Title:', ['class' => 'control-label']) !!}
        <small class="required">(Required)</small>
        {!! Form::text('title', null, ['id'=>'title', 'class' => 'form-control','required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('width_inch', 'Width (inch):', ['class' => 'control-label']) !!}
        <small class="required">(Required)</small>
        {!! Form::text('width_inch', null, ['id'=>'width_inch', 'class' => 'form-control','required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('width_cm', 'Width (cm):', ['class' => 'control-label']) !!}
        <small class="required">(Required)</small>
        {!! Form::text('width_cm', null, ['id'=>'width_cm', 'class' => 'form-control','required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('status', 'Status:', ['class' => 'control-label']) !!}
        <small class="required">(Required)</small>
        {!! Form::Select('status',array('active'=>'Active','inactive'=>'Inactive'),Input::old('status'),['class'=>'form-control ','required']) !!}
    </div>

</div>

<div class="col-md-6 col-xs-12">

    <div class="form-group">
        {!! Form::label('value', 'Value:', ['class' => 'control-label']) !!}
        <small class="required">(Required)</small>
        {!! Form::text('value', null, ['id'=>'value', 'class' => 'form-control','required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('height_inch', 'Height (inch):', ['class' => 'control-label']) !!}
        <small class="required">(Required)</small>
        {!! Form::text('height_inch', null, ['id'=>'height_inch', 'class' => 'form-control','required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('height_cm', 'Height (cm):', ['class' => 'control-label']) !!}
        <small class="required">(Required)</small>
        {!! Form::text('height_cm', null, ['id'=>'height_cm', 'class' => 'form-control','required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('sort_order', 'Sort Order:', ['class' => 'control-label']) !!}
        <small class="required">(Required)</small>
        {!! Form::text('sort_order', null, ['id'=>'sort_order', 'class' => 'form-control','required']) !!}
    </div>
    
</div>

















<p> &nbsp; </p>

<a href=""  class="btn btn-default" type="button"> Close </a>

{!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}