@if($errors->any())
    <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
<div class="form-group">
    {!! Form::label('cat_slider_id', 'Category Slider:', ['class' => 'control-label']) !!}
    <small class="required">(Required)</small>
    @if(count($cat_slider_id)>0)
    {!! Form::Select('cat_slider_id',$cat_slider_id,Input::old('cat_slider_id'),['class'=>'form-control ','required']) !!}
        @else
        {!! Form::text('cat_slider_id', 'No Category ID available',['id'=>'cat_slider_id','class' => 'form-control','required','disabled']) !!}
    @endif
</div>

<div class="form-group">
    {!! Form::label('name', 'Name:', ['class' => 'control-label']) !!}
    <small class="required">(Required)</small>
    {!! Form::text('name', null, ['id'=>'name', 'class' => 'form-control','required']) !!}
</div>
<div class="form-group last">
    <label class="control-label col-md-3">Image Upload
        <small class="required">(Required)</small></label>
    <div class="col-md-9">
        <div class="fileupload fileupload-new" data-provides="fileupload">
            <div class="fileupload-new thumbnail" style="width: 120px; height: 120px;">
                {{--<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />--}}
                @if($data['image'] != '')
                    <a href="{{ route('slider_image.image.show', $data['id']) }}" class="btn btn-info btn-xs" data-toggle="modal" data-target="#imageView"><img src="{{ URL::to($data['image']) }}" height="50px" width="50px" alt="{{$data['image']}}" />
                    </a>
                @else
                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                @endif
            </div>
            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
            <div>
                                                   <span class="btn btn-white btn-file">
                                                   <span class="fileupload-new"><i class="icon-paper-clip"></i> Select image</span>
                                                   <span class="fileupload-exists"><i class="icon-undo"></i> Change</span>
                                                   <input type="file" name="image" id="image" class="default" />
                                                   </span>
                <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="icon-trash"></i> Remove</a>
            </div>
        </div>
        <span class="label label-danger">NOTE!</span>
                                             <span>
                                             Attached image thumbnail is
                                             supported in Latest Firefox, Chrome, Opera,
                                             Safari and Internet Explorer 10 only
                                             </span>
    </div>
</div>
<div class="form-group">
    {!! Form::label('url', 'Url:', ['class' => 'control-label']) !!}
    <small class="required">(Required)</small>
    {!! Form::text('url', null, ['id'=>'url', 'class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('group', 'Group:', ['class' => 'control-label']) !!}
    <small>  (Select Group For Slider Image)</small>
    {!! Form::Select('group',array(''=>'Select One','group_1'=>'Group 1'),Input::old('group'),['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('status', 'Status:', ['class' => 'control-label']) !!}
    <small class="required">(Required)</small>
    {!! Form::Select('status',array('active'=>'Active','inactive'=>'Inactive'),Input::old('status'),['class'=>'form-control ','required']) !!}
</div>

<p> &nbsp; </p>

<a href=""  class="btn btn-default" type="button"> Close </a>

{!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}