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
	        {!! Form::label('title', 'Title:', ['class' => 'control-label']) !!}
	        <small class="required">(Required)</small>
	        {!! Form::text('title', NULL, ['id'=>'title', 'class' => 'form-control','required']) !!}
	    </div>

	    <div class="form-group">
	        {!! Form::label('value', 'Value:', ['class' => 'control-label']) !!}
	        <small class="required">(Required)</small>
	        {!! Form::text('value', NULL, ['id'=>'value', 'class' => 'form-control','required']) !!}
	    </div>

	    <div class="form-group">
	        {!! Form::label('sort_order', 'Sort Order:', ['class' => 'control-label']) !!}
	        <small class="required">(Required)</small>
	        {!! Form::text('sort_order', NULL, ['id'=>'sort_order', 'class' => 'form-control','required']) !!}
	    </div>

	    <div class="form-group">
	        {!! Form::label('status', 'Status:', ['class' => 'control-label']) !!}
	        <small class="required">(Required)</small>
	        {!! Form::Select('status',array('active'=>'Active','inactive'=>'Inactive'),Input::old('status'),['class'=>'form-control ','required']) !!}
	    </div>

	</div>

	<div class="col-md-6 col-xs-12">


		<div class="form-group">

	 		<div class="fileupload fileupload-new" data-provides="fileupload">
	            <div class="fileupload-new thumbnail" style="width: 120px; height: 120px;">
	                {{--<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />--}}


	                @if($data['image_link'] != '')
	                    <a href="{{ route('admin-photo-frame.imageview', $data['id']) }}" class="btn btn-info btn-xs" data-toggle="modal" data-target="#imageView"><img src="{{ URL::to($data['image_link']) }}" height="50px" width="50px" alt="{{$data['image_link']}}" />
	                    </a>
	                @else
	                    <img src="http://www.placehold.it/60x205/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
	                @endif
	            </div>
	            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
	            <div>
                   <span class="btn btn-white btn-file">
                   <span class="fileupload-new"><i class="icon-paper-clip"></i> Select image for show</span>
                   <span class="fileupload-exists"><i class="icon-undo"></i> Change</span>
                   <input type="file" name="image_link" id="image" class="default" />
                   </span>
	                <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="icon-trash"></i> Remove</a>
	            </div>
	        </div>

	 	</div>

	</div>

</div>	


<p> &nbsp; </p>

<a href=""  class="btn btn-default" type="button"> Close </a>

{!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
