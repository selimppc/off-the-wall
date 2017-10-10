@if($errors->any())
    <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<div class="col-md-6">

    <div class="form-group">
        {!! Form::label('product_group_id', 'Product Group:', ['class' => 'control-label']) !!}
        <small class="required">(Required)</small>
        @if(count($product_group_id)>0)
            {!! Form::select('group_id', $product_group_id,Input::old('product_group_id'),['class' => 'form-control','id'=>'product_group_id','required']) !!}
        @else
            {!! Form::text('product_group_id', 'No Category ID available',['id'=>'product_group_id','class' => 'form-control','required','disabled']) !!}
        @endif
    </div>

    <div class="form-group">
        {!! Form::label('title', 'Title:', ['class' => 'control-label']) !!}
        <small class="required">(Required)</small>
        {!! Form::text('title', null, ['id'=>'title', 'class' => 'form-control','required','onkeyup'=>"sel_url()"]) !!}
    </div>


    <div class="form-group">
        {!! Form::label('Slug', 'Slug:', ['class' => 'control-label']) !!}
        {!! Form::text('slug', null, ['id'=>'slug', 'class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('status', 'Status:', ['class' => 'control-label']) !!}
        <small class="required">(Required)</small>
        {!! Form::Select('status',array('active'=>'Active','inactive'=>'Inactive'),Input::old('status'),['class'=>'form-control ','required']) !!}
    </div>

    <a href="{{ route('product-category-index') }}" class="btn btn-default" type="button"> Close </a>
    {!! Form::submit('Save changes', ['class' => 'btn btn-success']) !!}

</div>

<div class="col-md-6">

    <div class="form-group">
        <label for="product_subgroup_id" class="control-label">Product SubGroup:</label>
        <small class="required">(Required)</small>
        <select class='form-control' required="required" id="product_subgroup_id" name="product_subgroup_id">
            @if(isset($data->relCatsubgroup->title)):
                <option value="$data->relCatsubgroup->id">{{$data->relCatsubgroup->title}}</option>
            @endif;
            
        </select>
    </div>

    <div class="form-group">
        {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}
        {!! Form::textarea('description', null, ['id'=>'desc', 'class' => 'form-control', 'cols'=>'15' , 'rows'=>'5']) !!}
    </div>

    <div class="form-group last">
        <label class="control-label col-md-3">Featured Image</label>
        <div class="col-md-9">
            <div class="fileupload fileupload-new" data-provides="fileupload">
                <div class="fileupload-new thumbnail" style="width: 120px; height: 120px;">
                    {{--<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />--}}
                    @if($data['image'] != '')
                        {{--<img src="{{URL::to($data['image'])}}" alt="" />--}}
                        <a href="{{ route('product-category-image.image.show', $data['slug']) }}" class="btn btn-info btn-xs" data-toggle="modal" data-target="#imageView"><img src="{{ URL::to('') }}/uploads/product_category_image/{{$data['image']}}" height="50px" width="50px" alt="{{$data['image']}}" />
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

</div>
 



 









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
<a href="{{Url::to('')}}" id="site_url">&nbsp;</a>
<script>
    $(function(){

        $("#product_group_id").on('change',function(e){

            var product_group_id = $("#product_group_id").val();
            var site_url = $('#site_url').attr("href");
            $.ajax({
                url: site_url+'/product_category/cat_product_group_ajax',
                type: 'POST',
                dataType: 'json',
                data: {_token: '{!! csrf_token() !!}',product_group_id:product_group_id,},
                success: function(response)
                {
                    $("#product_subgroup_id").html(response.message);
                }
            });


            return false;
        });

    });
</script>