@if($errors->any())
    <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<div class="form-group">
    {!! Form::label('type', 'Type:', ['class' => 'control-label']) !!}
    {!! Form::Select('type',array('image'=>'Image','pdf'=>'Pdf','doc'=>'Doc'),Input::old('type'),['class'=>'form-control ']) !!}
</div>

<div class="form-group">
    {!! Form::label('alt_text', 'Alt Text:', ['class' => 'control-label']) !!}
    {!! Form::text('alt_text', null, ['id'=>'alt_text', 'class' => 'form-control','required']) !!}
</div>

<div class="form-group">
    {!! Form::label('url', 'Url:', ['class' => 'control-label']) !!}
    {!! Form::text('url', $data['thumbnail']?$data['thumbnail']:'', ['id'=>'url', 'class' => 'form-control','readonly']) !!}
</div>

<div class="form-group last">
    <label class="control-label col-md-3">File Name<small class="required">(Required)</small></label>
    <div class="col-md-9">
        <div class="fileupload fileupload-new" data-provides="fileupload">
            <div class="fileupload-new thumbnail" style="width: 80px; height: 80px;">
                {{--<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />--}}
                @if($data['file_name'] != '')
                    {{--<img src="{{URL::to($data['file_name'])}}" alt="" />--}}
                    <a href="{{ route('media.image.show', $data['id']) }}" class="btn btn-info btn-xs" data-toggle="modal" data-target="#imageView"><img src="{{ URL::to($data['thumbnail']) }}" width="50px" height="50px" alt="{{$data['thumbnail']}}" />
                    </a>
                @else
                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                @endif
            </div>
            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 80px; max-height: 80px; line-height: 20px;"></div>
            <div>
                                                   <span class="btn btn-white btn-file">
                                                   <span class="fileupload-new"><i class="icon-paper-clip"></i> Select image/File</span>
                                                   <span class="fileupload-exists"><i class="icon-undo"></i> Change</span>
                                                   <input type="file" name="file_name" id="file_name" class="default" />
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

<p> &nbsp; </p>

<a href=""  class="btn btn-default" type="button"> Close </a>

{!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}