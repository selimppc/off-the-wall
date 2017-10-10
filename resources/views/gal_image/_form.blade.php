@if($errors->any())
    <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<div class="form-group">
    {!! Form::label('product_id', 'Product:', ['class' => 'control-label']) !!}
     <small class="required">(Required)</small>
    @if(count($product_id)>0)
    {!! Form::select('product_id', $product_id,Input::old('product_id'),['class' => 'form-control','required']) !!}
    @else
    {!! Form::text('product_id', 'No Product ID available',['id'=>'product_id','class' => 'form-control','required','disabled']) !!}
    @endif
</div>

<div class="form-group">
    {!! Form::label('name', 'Name:', ['class' => 'control-label']) !!}
    <small class="required">(Required)</small>
    {!! Form::text('name', null, ['id'=>'name', 'class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('status', 'Status:', ['class' => 'control-label']) !!}
    <small class="required">(Required)</small>
    {!! Form::Select('status',array('active'=>'Active','inactive'=>'Inactive'),Input::old('status'),['class'=>'form-control ','required']) !!}
</div>

<div class="form-group last">
    <label class="control-label col-md-3">Image Upload<small class="required">(Required)</small></label>
    <div class="col-md-9">
        <div class="fileupload fileupload-new" data-provides="fileupload">
            <div class="fileupload-new thumbnail" style="width: 120px; height: 120px;">
                {{--<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />--}}
                @if($data['image'] != '')
                    {{--<img src="{{URL::to($data['image'])}}" alt="" />--}}
                    <a href="{{ route('gal_image.image.show', $data['id']) }}" class="btn btn-info btn-xs" data-toggle="modal" data-target="#imageView"><img src="{{ URL::to($data['image']) }}" height="50px" width="50px" alt="{{$data['image']}}" />
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

<p> &nbsp; </p>

<a href=""  class="btn btn-default" type="button"> Close </a>
{{--<a href="{{ URL::previous()}}"  class="btn btn-default" type="button"> Close </a>--}}

{!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}