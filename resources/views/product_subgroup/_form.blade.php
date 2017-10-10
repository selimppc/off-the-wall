@if($errors->any())
    <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<div class="form-group">
    {!! Form::label('product_group_id', 'Product Group:', ['class' => 'control-label']) !!}
    <small class="required">(Required)</small>
    @if(count($product_group_id)>0)
    
        {!! Form::select('product_group_id', $product_group_id,Input::old('product_group_id'),['class' => 'form-control','required']) !!}
    @else
        {!! Form::text('product_group_id', 'No Group ID available',['id'=>'product_group_id','class' => 'form-control','required','disabled']) !!}
    @endif
</div>

<div class="form-group">
	{!! Form::label('title', 'Title:', ['class' => 'control-label']) !!}
	<small class="required">(Required)</small>
	{!! Form::text('title', null, ['id'=>'title', 'class' => 'form-control','required','onkeyup'=>"sel_url()"]) !!}
</div>

<div class="form-group">
	{!! Form::label('Slug', 'Slug:', ['class' => 'control-label']) !!}
	<small class="required">(Required)</small>
	{!! Form::text('slug', null, ['id'=>'slug', 'class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('Sort Order', 'Sort Order:', ['class' => 'control-label']) !!}
    {!! Form::text('sort_order', null, ['id'=>'sort_order', 'class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('status', 'Status:', ['class' => 'control-label']) !!}
    <small class="required">(Required)</small>
    {!! Form::Select('status',array('active'=>'Active','inactive'=>'Inactive'),Input::old('status'),['class'=>'form-control ','required']) !!}
</div>

<div class="form-group">
        <label class="control-label col-md-12">Banner Image</label>
        <div class="col-md-12">
            <div class="fileupload fileupload-new" data-provides="fileupload">
                <div class="fileupload-new thumbnail" style="width: 120px; height: 120px;">
                    {{--<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />--}}
                    @if($data['image'] != '')
                        {{--<img src="{{URL::to($data['image'])}}" alt="" />--}}
                        <a href="{{ route('product-image.image.show', $data['slug']) }}" class="btn btn-info btn-xs" data-toggle="modal" data-target="#imageView"><img src="{{ URL::to('') }}/{{$data['image']}}" height="50px" width="50px" alt="{{$data['image']}}" />
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
         Image size should be less than 300KB & resolution is width:900px and height:250px
         </span>
        </div>
    </div>
	
	<div class="col-md-6">
		
		<div class="form-group">
			{!! Form::label('Meta Title', 'Meta Title:', ['class' => 'control-label']) !!}
			{!! Form::text('meta_title', null, ['id'=>'meta_title', 'class' => 'form-control']) !!}
		</div>
		
	</div>
	
	<div class="col-md-6">
		
		<div class="form-group">
			{!! Form::label('Meta Keywords', 'Meta Keywords:', ['class' => 'control-label']) !!}
			{!! Form::text('meta_keyword', null, ['id'=>'meta_keyword', 'class' => 'form-control']) !!}
		</div>
		
	</div>

    <div class="col-md-12">

        <div class="form-group">
            {!! Form::label('Meta Desc', 'Meta Desc:', ['class' => 'control-label']) !!}
            {!! Form::textarea('meta_desc', null, ['id'=>'meta_desc', 'class' => 'form-control']) !!}       
        </div>

        <div class="form-group">
            {!! Form::label('Short Desc', 'Short Desc:', ['class' => 'control-label']) !!}
            {!! Form::textarea('short_desc', null, ['id'=>'short_desc', 'class' => 'form-control']) !!}         
        </div>

    </div>
	
	

<a href="{{ route('product-subgroup-index') }}" class="btn btn-default" type="button"> Close </a>
{!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}

<script>
    function sel_url() {
        $('#title').on('keyup', function () {
            var string = $(this).val();
            string = string.split(" ");
            var myStr1 = string.join('-');
            var myStr = myStr1.toLowerCase();
            $('#slug').val(myStr);
        });
    }
</script>

<script type="text/javascript" src="<?php echo URL::to('')."/ckeditor/ckeditor.js"; ?>"></script>

<script>
    
    CKEDITOR.replace( "meta_desc", {});
    CKEDITOR.replace( "short_desc", {});

</script>