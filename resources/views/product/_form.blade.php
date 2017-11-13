

@if($errors->any())
    <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<div class="col-md-12" style="float:left;">
<div class="col-md-6">
    <div class="row">
        <div class="form-group">
            {!! Form::label('product_group_id', 'Product Group:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            @if(count($product_group_id)>0)
                {!! Form::select('product_group_id', $product_group_id,Input::old('product_group_id'),['class' => 'form-control','id'=>'product_group_id_add','required']) !!}
            @else
                {!! Form::text('product_group_id', 'No Category ID available',['id'=>'product_group_id','class' => 'form-control','required','disabled']) !!}
            @endif
        </div>

        <div class="form-group">
            <label for="product_subgroup_id" class="control-label">Product SubGroup:</label>
            <small class="required">(Required)</small>
            <select class='form-control' required="required" id="product_subgroup_id_add" name="product_subgroup_id">
                @if(isset($data->relSubGroup->title)):
                    <option value="{{$data->relSubGroup->id}}">{{$data->relSubGroup->title}}</option>
                @endif;
                
            </select>
        </div>

     

        <div class="form-group">
            {!! Form::label('title', 'Product Title:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::text('title', null, ['id'=>'title', 'class' => 'form-control','required','onkeyup'=>"sel_url()"]) !!}
        </div>

        <div class="form-group">
            {!! Form::label('Slug', 'Slug:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::text('slug', null, ['id'=>'slug', 'class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('Meta Title', 'Meta Title:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::text('meta_title', null, ['id'=>'meta_title', 'class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('Pick up Price', 'Pick up/Now Price:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::text('sell_rate', null, ['id'=>'sell_rate', 'class' => 'form-control','required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('Delivered Price', 'Delivered Price:', ['class' => 'control-label']) !!}
            {!! Form::text('cost_price', null, ['id'=>'cost_price', 'class' => 'form-control']) !!}
        </div>
        

        <div class="form-group">
            {!! Form::label('Before Price', 'Before Price:', ['class' => 'control-label']) !!}
            {!! Form::text('before_price', null, ['id'=>'before_price', 'class' => 'form-control']) !!}
        </div>
       
       <div class="form-group">
            {!! Form::label('meta_keyword', 'Meta Keyword:', ['class' => 'control-label']) !!}
            {!! Form::text('meta_keyword', null, ['id'=>'meta_keyword', 'class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('meta_desc', 'Meta Desc:', ['class' => 'control-label']) !!}
            {!! Form::textarea('meta_desc', null, ['id'=>'meta_desc', 'class' => 'form-control']) !!}
        </div>

    </div>
</div>

<div class="col-md-6" style="padding-right: 0;">

        <div class="form-group">
            {!! Form::label('Weight', 'Weight:', ['class' => 'control-label']) !!}
            {!! Form::text('weight', null, ['id'=>'weight', 'class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('Sort Order', 'Sort Order:', ['class' => 'control-label']) !!}
            {!! Form::text('sort_order', null, ['id'=>'sort_order', 'class' => 'form-control']) !!}
        </div>

        <div class="form-group" >
            {!! Form::label('is_featured', 'Is featured?', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::Select('is_featured',array('No'=>'No','Yes'=>'Yes'),Input::old('status'),['class'=>'form-control ','required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('Product Code', 'Product Code:', ['class' => 'control-label']) !!}
            {!! Form::text('product_code', null, ['id'=>'product_code', 'class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('Sizes', 'Sizes:', ['class' => 'control-label']) !!}
            {!! Form::text('size', null, ['id'=>'size', 'class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('Other Sizes', 'Other sizes:', ['class' => 'control-label']) !!}
            {!! Form::text('other_size', null, ['id'=>'other_size', 'class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('Stock Quantity', 'Stock Quantity:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::text('stock_unit_quantity', null, ['id'=>'stock_unit_quantity', 'class' => 'form-control','required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('Delivery Info', 'Delivery Info:', ['class' => 'control-label']) !!}
            {!! Form::text('delivery_info', null, ['id'=>'delivery_info', 'class' => 'form-control']) !!}
        </div>

         <div class="form-group">
            {!! Form::label('status', 'Status:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::Select('status',array('active'=>'Active','inactive'=>'Inactive'),Input::old('status'),['class'=>'form-control ','required']) !!}
        </div>




    <div class="form-group">
        <label class="control-label col-md-12">Featured Image</label>
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
         Attached image thumbnail is
         supported in Latest Firefox, Chrome, Opera,
         Safari and Internet Explorer 10 only<br/><br/>
         Image size should be less than 300KB & resolution is width:800px and height:880px
         </span>
        </div>
    </div>

</div>

    <div class="form-group" style="width: 100%;float: left;">
        {!! Form::label('Description', 'Description', ['class' => 'control-label']) !!}
        {!! Form::textarea('short_description', null, ['id'=>'short_description', 'class' => 'form-control', 'cols'=>'30' , 'rows'=>'5']) !!}
    </div>


</div>


<div class="col-md-12" style="float:left;margin-bottom:50px;">
    <a href="{{ route('product-index') }}" class="btn btn-default" type="button"> Close </a>
    {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
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

        $("#product_group_id_add").on('change',function(e){

            var product_group_id = $("#product_group_id_add").val();
            var site_url = $('#site_url').attr("href");
            $.ajax({
                url: site_url+'/product_category/cat_product_group_ajax',
                type: 'POST',
                dataType: 'json',
                data: {_token: '{!! csrf_token() !!}',product_group_id:product_group_id,},
                success: function(response)
                {
                    $("#product_subgroup_id_add").html(response.message);
                }
            });


            return false;
        });

        $("#product_subgroup_id_add").on('change',function(e){

            var product_subgroup_id = $("#product_subgroup_id_add").val();
            var site_url = $('#site_url').attr("href");
            $.ajax({
                url: site_url+'/product_category/cat_product_category_ajax',
                type: 'POST',
                dataType: 'json',
                data: {_token: '{!! csrf_token() !!}',product_subgroup_id:product_subgroup_id,},
                success: function(response)
                {
                    $("#product_category_id").html(response.message);
                }
            });


            return false;
        });

    });
</script>

<script type="text/javascript" src="<?php echo URL::to('')."/ckeditor/ckeditor.js"; ?>"></script>

<script>
    
    CKEDITOR.replace( "short_description", {});

</script>