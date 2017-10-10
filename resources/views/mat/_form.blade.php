@if($errors->any())
    <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<div class="row">

	<div class="col-md-6 col-xs-12">

		<div class="form-group">
	        {!! Form::label('color', 'Color:', ['class' => 'control-label']) !!}
	        <small class="required">(Required)</small>
	        {!! Form::text('color', NULL, ['id'=>'color', 'class' => 'form-control','required']) !!}
	    </div>

	    <div class="form-group">
	        {!! Form::label('code', 'Code:', ['class' => 'control-label']) !!}
	        <small class="required">(Required)</small>
	        {!! Form::text('code', NULL, ['id'=>'code', 'class' => 'form-control','required']) !!}
	    </div>

	</div>

	<div class="col-md-6 col-xs-12">

		<div class="form-group">
	        {!! Form::label('name', 'Name:', ['class' => 'control-label']) !!}
	        <small class="required">(Required)</small>
	        {!! Form::text('name', NULL, ['id'=>'name', 'class' => 'form-control','required']) !!}
	    </div>

	    <div class="form-group">
	        {!! Form::label('status', 'Status:', ['class' => 'control-label']) !!}
	        <small class="required">(Required)</small>
	        {!! Form::Select('status',array('active'=>'Active','inactive'=>'Inactive'),Input::old('status'),['class'=>'form-control ','required']) !!}
	    </div>

	</div>

</div>


<p> &nbsp; </p>

<a href=""  class="btn btn-default" type="button"> Close </a>

{!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
