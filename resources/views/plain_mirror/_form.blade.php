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
	        {!! Form::label('frame_code', 'Frame Code:', ['class' => 'control-label']) !!}
	        <small class="required">(Required)</small>
	        {!! Form::text('frame_code', NULL, ['id'=>'frame_code', 'class' => 'form-control','required']) !!}
	    </div>

	    <div class="form-group">
	        {!! Form::label('frame_rate', 'Frame Rate:', ['class' => 'control-label']) !!}
	        <small class="required">(Required)</small>
	        {!! Form::text('frame_rate', NULL, ['id'=>'frame_rate', 'class' => 'form-control','required']) !!}
	    </div>

	    <div class="form-group">
	        {!! Form::label('frame_rebate', 'Frame Rebate:', ['class' => 'control-label']) !!}
	        <small class="required">(Required)</small>
	        {!! Form::text('frame_rebate', NULL, ['id'=>'frame_rebate', 'class' => 'form-control','required']) !!}
	    </div>

	    <div class="form-group">
	        {!! Form::label('frame_width', 'Frame Width:', ['class' => 'control-label']) !!}
	        <small class="required">(Required)</small>
	        {!! Form::text('frame_width', NULL, ['id'=>'frame_width', 'class' => 'form-control','required']) !!}
	    </div>

	    <div class="form-group">
	        {!! Form::label('frame_height', 'Frame Height:', ['class' => 'control-label']) !!}
	        <small class="required">(Required)</small>
	        {!! Form::text('frame_height', NULL, ['id'=>'frame_height', 'class' => 'form-control','required']) !!}
	    </div>

	    <div class="form-group">
	        {!! Form::label('frame_min_width', 'Frame Min Width:', ['class' => 'control-label']) !!}
	        <small class="required">(Required)</small>
	        {!! Form::text('frame_min_width', NULL, ['id'=>'frame_min_width', 'class' => 'form-control','required']) !!}
	    </div>

	    <div class="form-group">
	        {!! Form::label('frame_max_width', 'Frame Max Width:', ['class' => 'control-label']) !!}
	        <small class="required">(Required)</small>
	        {!! Form::text('frame_max_width', NULL, ['id'=>'frame_max_width', 'class' => 'form-control','required']) !!}
	    </div>

	    <div class="form-group">
	        {!! Form::label('frame_color', 'Frame Color:', ['class' => 'control-label']) !!}
	        <small class="required">(Required)</small>
	        {!! Form::text('frame_color', NULL, ['id'=>'frame_color', 'class' => 'form-control','required']) !!}
	    </div>

	    <div class="form-group">
	        {!! Form::label('frame_material', 'Frame Material:', ['class' => 'control-label']) !!}
	        <small class="required">(Required)</small>
	        {!! Form::text('frame_material', NULL, ['id'=>'frame_material', 'class' => 'form-control','required']) !!}
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
	                    <img src="http://www.placehold.it/200x60/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
	                @endif
	            </div>
	            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
	            <div>
                   <span class="btn btn-white btn-file">
                   <span class="fileupload-new"><i class="icon-paper-clip"></i> Select image for framing</span>
                   <span class="fileupload-exists"><i class="icon-undo"></i> Change</span>
                   <input type="file" name="image_link" id="image" class="default" />
                   </span>
	                <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="icon-trash"></i> Remove</a>
	            </div>
	        </div>

	 	</div>

	 	<div class="form-group">

	 		<div class="fileupload fileupload-new" data-provides="fileupload">
	            <div class="fileupload-new thumbnail" style="width: 120px; height: 120px;">
	                {{--<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />--}}
	                @if($data['thumb_link'] != '')
	                    <a href="{{ route('admin-photo-frame.imageview', $data['id']) }}" class="btn btn-info btn-xs" data-toggle="modal" data-target="#imageView"><img src="{{ URL::to($data['thumb_link']) }}" height="50px" width="50px" alt="{{$data['thumb_link']}}" />
	                    </a>
	                @else
	                    <img src="http://www.placehold.it/200x60/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
	                @endif
	            </div>
	            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
	            <div>
                       <span class="btn btn-white btn-file">
                       <span class="fileupload-new"><i class="icon-paper-clip"></i> Select image for thumb</span>
                       <span class="fileupload-exists"><i class="icon-undo"></i> Change</span>
                       <input type="file" name="thumb_link" id="image" class="default" />
                       </span>
	                <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="icon-trash"></i> Remove</a>
	            </div>
	        </div>

	 	</div>

	 	<div class="form-group">
	        {!! Form::label('price', 'Price:', ['class' => 'control-label']) !!}
	        <small class="required">(Required)</small>
	        {!! Form::number('price', NULL, ['id'=>'price', 'class' => 'form-control','required']) !!}
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

</div>



<p> &nbsp; </p>

<a href=""  class="btn btn-default" type="button"> Close </a>

{!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
