@if($errors->any())
    <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<div class="col-md-12" style="float:left;">
	<div class="col-md-12">
    	<div class="row">
    		<div class="form-group">
	            {!! Form::label('title', 'Color:', ['class' => 'control-label']) !!}
	            <small class="required">(Required)</small>
	            {!! Form::text('title', null, ['id'=>'title', 'class' => 'form-control','required','onkeyup'=>"sel_url()"]) !!}
	        </div>

	        <div class="form-group">
	            {!! Form::label('Slug', 'Slug:', ['class' => 'control-label']) !!}
	            <small class="required">(Required)</small>
	            {!! Form::text('slug', null, ['id'=>'slug', 'class' => 'form-control']) !!}
	        </div>

	        <!-- <div class="form-group">
	            {!! Form::label('Size', 'Size:', ['class' => 'control-label']) !!}
	            <small class="required">(Required)</small>
	            {!! Form::text('size', null, ['id'=>'size', 'class' => 'form-control']) !!}
	        </div>

	        <div class="form-group">
	            {!! Form::label('Color', 'Color:', ['class' => 'control-label']) !!}
	            <small class="required">(Required)</small>
	            {!! Form::text('color', null, ['id'=>'color', 'class' => 'form-control']) !!}
	        </div> -->

	        <div class="form-group">
	            {!! Form::label('status', 'Status:', ['class' => 'control-label']) !!}
	            <small class="required">(Required)</small>
	            {!! Form::Select('status',array('active'=>'Active','inactive'=>'Inactive'),Input::old('status'),['class'=>'form-control ','required']) !!}
	        </div>

	        <input type="hidden" name="product_id" value="{{$productdata->id}}" >

	        <div class="form-group">
	        	<a href="{{ route('productvariation-index', $productdata->slug) }}" class="btn btn-default" type="button"> Close </a>
    			{!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}			
	        </div>

    	</div>
    </div>

    <div class="col-md-6" style="padding-right: 0;">
    	<div class="row_s">
    		<!-- <div class="form-group">
	            {!! Form::label('Sell Quantity', 'Sell Quantity:', ['class' => 'control-label']) !!}
	            <small class="required">(Required)</small>
	            {!! Form::text('sell_quantity', null, ['id'=>'sell_quantity', 'class' => 'form-control','required','onkeyup'=>"sel_url()"]) !!}
	        </div>

	        <div class="form-group">
	            {!! Form::label('Stock Balance', 'Stock Balance:', ['class' => 'control-label']) !!}
	            <small class="required">(Required)</small>
	            {!! Form::text('stock_balance', null, ['id'=>'stock_balance', 'class' => 'form-control']) !!}
	        </div>

	        <div class="form-group">
	            {!! Form::label('Sell Rate', 'Sell Rate:', ['class' => 'control-label']) !!}
	            <small class="required">(Required)</small>
	            {!! Form::text('sell_rate', null, ['id'=>'sell_rate', 'class' => 'form-control']) !!}
	        </div>

	        <div class="form-group">
	            {!! Form::label('Cost Price', 'Cost Price:', ['class' => 'control-label']) !!}
	            <small class="required">(Required)</small>
	            {!! Form::text('cost_price', null, ['id'=>'cost_price', 'class' => 'form-control']) !!}
	        </div>
 -->
	        

	        
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