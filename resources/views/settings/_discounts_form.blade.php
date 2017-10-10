<div class="row">

	<div class="col-xs-12">

		<div class="form-group">
	        {!! Form::label('value', 'Discounts Value:', ['class' => 'control-label']) !!}
	        <small class="required">(Required)</small>
	        {!! Form::text('value', NULL, ['id'=>'value', 'class' => 'form-control','required']) !!}
	    </div>

	</div>

	<div class="col-xs-12">

		<div class="form-group">
	        {!! Form::label('canvas_default_width', 'Canvas Default Width:', ['class' => 'control-label']) !!}
	        <small class="required">(Required)</small>
	        {!! Form::text('canvas_default_width', NULL, ['id'=>'canvas_default_width', 'class' => 'form-control','required']) !!}
	    </div>

	</div>

	<div class="col-xs-12">

		<div class="form-group">
	        {!! Form::label('canvas_default_height', 'Canvas Default Height:', ['class' => 'control-label']) !!}
	        <small class="required">(Required)</small>
	        {!! Form::text('canvas_default_height', NULL, ['id'=>'canvas_default_height', 'class' => 'form-control','required']) !!}
	    </div>

	</div>

	<div class="col-xs-12">

		<div class="form-group">
	        {!! Form::label('canvas_base_price', 'Canvas Base Price:', ['class' => 'control-label']) !!}
	        <small class="required">(Required)</small>
	        {!! Form::text('canvas_base_price', NULL, ['id'=>'canvas_base_price', 'class' => 'form-control','required']) !!}
	    </div>

	</div>

	<div class="col-xs-12">

		<div class="form-group">
	        {!! Form::label('canvas_step_price', 'Canvas Step Price:', ['class' => 'control-label']) !!}
	        <small class="required">(Required)</small>
	        {!! Form::text('canvas_step_price', NULL, ['id'=>'canvas_step_price', 'class' => 'form-control','required']) !!}
	    </div>

	</div>

</div>

<a href=""  class="btn btn-default" type="button"> Close </a>

{!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}