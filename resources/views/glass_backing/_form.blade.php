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
	        {!! Form::label('type', 'Type:', ['class' => 'control-label']) !!}
	        <small class="required">(Required)</small>
	        {!! Form::Select('type',array('glass'=>'Glass','backing'=>'Backing'),Input::old('type'),['class'=>'form-control ','required']) !!}
	    </div>

		<div class="form-group">
	        {!! Form::label('title', 'Title:', ['class' => 'control-label']) !!}
	        <small class="required">(Required)</small>
	        {!! Form::text('title', NULL, ['id'=>'title', 'class' => 'form-control','required']) !!}
	    </div>

	   
	</div>

	<div class="col-md-6 col-xs-12">

		<div class="form-group">
	        {!! Form::label('status', 'Status:', ['class' => 'control-label']) !!}
	        <small class="required">(Required)</small>
	        {!! Form::Select('status',array('active'=>'Active','inactive'=>'Inactive'),Input::old('status'),['class'=>'form-control ','required']) !!}
	    </div>

	</div>

	<div class="col-md-12">

		<div class="form-group" style="width: 100%;float: left;">
	        {!! Form::label('Description', 'Description', ['class' => 'control-label']) !!}
	        {!! Form::textarea('description', null, ['id'=>'description', 'class' => 'form-control', 'cols'=>'30' , 'rows'=>'5']) !!}
	    </div>

    </div>

</div>


<p> &nbsp; </p>

<a href=""  class="btn btn-default" type="button"> Close </a>

{!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}


<script type="text/javascript" src="<?php echo URL::to('')."/ckeditor/ckeditor.js"; ?>"></script>

<script>
    
    CKEDITOR.replace( "description", {});

</script>