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
		    {!! Form::label('frame_category_id', 'Frame Category', ['class' => 'control-label']) !!}
		    <small class="required">(Required)</small>
		    @if(count($frame_category_id)>0)
		        {!! Form::select('frame_category_id', $frame_category_id,Input::old('frame_category_id'),['class' => 'form-control','id'=>'frame_category_id','required']) !!}
		    @else
		        {!! Form::text('frame_category_id', 'No Category ID available',['id'=>'frame_category_id','class' => 'form-control','required','disabled']) !!}
		    @endif
		</div>

		<div class="form-group">
	        {!! Form::label('frame_code', 'Frame Code:', ['class' => 'control-label']) !!}
	        <small class="required">(Required)</small>
	        {!! Form::text('frame_code', NULL, ['id'=>'frame_code', 'class' => 'form-control','required']) !!}
	    </div>

		<div class="form-group">
	        {!! Form::label('frame_width', 'Frame Width:', ['class' => 'control-label']) !!}
	        <small class="required">(Required)</small>
	        {!! Form::text('frame_width', !empty($data['frame_width'])?$data['frame_width']:'1', ['id'=>'frame_width', 'class' => 'form-control','required']) !!}
	    </div>

	    <div class="form-group">
	        {!! Form::label('frame_depth', 'Frame Depth:', ['class' => 'control-label']) !!}
	        <small class="required">(Required)</small>
	        {!! Form::text('frame_depth', !empty($data['frame_depth'])?$data['frame_depth']:'2', ['id'=>'frame_depth', 'class' => 'form-control','required']) !!}
	    </div>

	    <div class="form-group">
	        {!! Form::label('frame_rebate', 'Frame Rebate:', ['class' => 'control-label']) !!}
	        <small class="required">(Required)</small>
	        {!! Form::text('frame_rebate', !empty($data['frame_rebate'])?$data['frame_rebate']:'0.7', ['id'=>'frame_rebate', 'class' => 'form-control','required']) !!}
	    </div>

	    <div class="form-group">
	        {!! Form::label('frame_rate', 'Frame Rate:', ['class' => 'control-label']) !!}
	        <small class="required">(Required)</small>
	        {!! Form::text('frame_rate', !empty($data['frame_rate'])?$data['frame_rate']:'3', ['id'=>'frame_rate', 'class' => 'form-control','required']) !!}
	    </div>

	    <div class="form-group">
	        {!! Form::label('frame_min', 'Frame Min Width:', ['class' => 'control-label']) !!}
	        <small class="required">(Required)</small>
	        {!! Form::text('frame_min', !empty($data['frame_min'])?$data['frame_min']:'10', ['id'=>'frame_min', 'class' => 'form-control','required']) !!}
	    </div>

	    <div class="form-group">
	        {!! Form::label('frame_max', 'Frame Max Width:', ['class' => 'control-label']) !!}
	        <small class="required">(Required)</small>
	        {!! Form::text('frame_max', !empty($data['frame_max'])?$data['frame_max']:'100', ['id'=>'frame_max', 'class' => 'form-control','required']) !!}
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

	 	<div class="form-group">

	 		<div class="fileupload fileupload-new" data-provides="fileupload">
	            <div class="fileupload-new thumbnail" style="width: 120px; height: 120px;">
	                {{--<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />--}}
	                @if($data['thumb_link'] != '')
	                    <a href="{{ route('admin-photo-frame.imageview', $data['id']) }}" class="btn btn-info btn-xs" data-toggle="modal" data-target="#imageView"><img src="{{ URL::to('images/frame_images/large/'.$data['thumb_link']) }}" height="50px" width="50px" alt="{{$data['thumb_link']}}" />
	                    </a>
	                @else
	                    <img src="http://www.placehold.it/300x100/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
	                @endif
	            </div>
	            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
	            <div>
	                                                   <span class="btn btn-white btn-file">
	                                                   <span class="fileupload-new"><i class="icon-paper-clip"></i> Select image for framing</span>
	                                                   <span class="fileupload-exists"><i class="icon-undo"></i> Change</span>
	                                                   <input type="file" name="thumb_link" id="image" class="default" />
	                                                   </span>
	                <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="icon-trash"></i> Remove</a>
	            </div>
	        </div>

	 	</div>

	    <div class="form-group">
	        {!! Form::label('sort_order', 'Sort Order:', ['class' => 'control-label']) !!}
	        <small class="required">(Required)</small>
	        {!! Form::number('sort_order', null, ['id'=>'sort_order', 'class' => 'form-control','required']) !!}
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
