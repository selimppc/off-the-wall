@extends('web::layout.web_master')

@section('content')
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="product-details-container">
			<div class="col-md-4 col-sm-12 col-xs-12">
				<div class="product-thum-image">
					<img id="zoom_01" data-zoom-image="{{URL::to('')}}/{{$product->image}}" src="{{URL::to('')}}/{{$product->thumb}}" width="100%">
				</div>
				<a href="{{URL::to('')}}/{{$product->image}}" class="fancybox image_gallery_container">
					<img alt="{{$product->meta_title}}" title="{{$product->title}}" src="{{URL::to('')}}/web/images/enlarge.png"><br/>
						ENLARGE
				</a>

				<!-- <a href="#" class="image_gallery_container">
					<img alt="{{$product->meta_title}}" title="{{$product->title}}" src="{{URL::to('')}}/web/images/print.png"><br/>
						PRINT
				</a> -->

				<a href="#" class="image_gallery_container">
					<img alt="{{$product->meta_title}}" title="{{$product->title}}" src="{{URL::to('')}}/web/images/ask.png">
					<br/>
						EMAIL
				</a>
			</div>
			<div class="col-md-4 col-sm-12 col-xs-12">
				<div class="product-header">
					{{$product->title}}
				</div>
				<div class="product-descrption">
					<?php echo $product->short_description;?>
				</div>
			</div>
			<div class="col-md-4 col-sm-12 col-xs-12">
				<div class="product-specification-header">
					Product Specification
				</div>

				<div class="product-specification-description">
					<table class="table">

						@if(!empty($product->product_code))
							<tr>
								<td>Product Code</td>
								<td>{{$product->product_code}}</td>
							</tr>
						@endif

						@if(!empty($product->size))
							<tr>
								<td>Sizes</td>
								<td>{{$product->size}}</td>
							</tr>
						@endif

						@if(!empty($product->other_size))
							<tr>
								<td>Other sizes</td>
								<td>{{$product->other_size}}</td>
							</tr>
						@endif

						@if(!empty($product->stock_unit_quantity))
							<tr>
								<td>Stock Level</td>
								<td>{{$product->stock_unit_quantity}}</td>
							</tr>
						@endif

						@if(!empty($product->delivery_info))
							<tr>
								<td>Delivery Info</td>
								<td>{{$product->delivery_info}}</td>
							</tr>
						@endif
					</table>
					

					<div class="price_row">
						Price
					</div>

					<form method="post" action="{{URL::to('/')}}/order/add_to_cart">

					<div class="price_container">

						@if($product->product_group_id == 10)

							<div class="price">
								<input checked id="price1" type="radio" name="price" value="{{$product->sell_rate}}">
								<label for="price1">Pick up<br/> ${{$product->sell_rate}}</label>
							</div>

							@if(!empty($product->cost_price))
								<div class="price">
									<input id="price2" type="radio" name="price" value="{{$product->cost_price}}">
									<label for="price2">Delivered<br/> ${{$product->cost_price}}</label>
								</div>
							@endif

						@else

							@if(!empty($product->before_price))
								<div class="price">
									<input  id="price1" type="radio" name="price" value="{{$product->before_price}}">
									<label for="price1">Before<br/> ${{$product->before_price}}</label>
								</div>
							@endif

							<div class="price">
								<input  checked id="price1" type="radio" name="price" value="{{$product->sell_rate}}">
								<label for="price1">Pick up<br/> ${{$product->sell_rate}}</label>
							</div>

							@if(!empty($product->cost_price))
								<div class="price">
									<input id="price2" type="radio" name="price" value="{{$product->cost_price}}">
									<label for="price2">Delivered<br/> ${{$product->cost_price}}</label>
								</div>
							@endif


						@endif
					</div>
					
					<div class="quantity">
						<label>Quantity</label>
						<select name="quantity">
							<?php
								if(count($product->stock_unit_quantity) > 0):
									for($i=1;$i<= $product->stock_unit_quantity;$i++){
							?>
										<option value="{{$i}}">{{$i}}</option>
							<?php
									}
								endif;
							?>
						</select>
					</div>
					
						
					@if(!empty($product_variation_r))
						<div class="quantity float-right">
							<div class="width50">
								<label>Matt Colour</label>
								<select name="color">
									@foreach($product_variation_r as $product_variation)
										<option value="{{$product_variation->id}}">{{$product_variation->title}}</option>
									@endforeach
									
								</select>
							</div>
						</div>
					@endif

					

					<div class="buy_now_button">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="product_id" value="{{$product->id}}">
						<input type="submit" name="submit" value="Buy Now">
					</div>

					

					</form>
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="related_product_container">
			<div class="border-top-2 border-bottom-2">
				<div class="header">	
					Related Products
				</div>								
			</div>
			<div class="row">
				@if(!empty($related_product_r))
					@foreach($related_product_r as $related_product)

						<div class="col-lg-2 col-md-3 col-sm-6 col-xs-12">
							<a href="{{URL::to('')}}/{{$related_product->slug}}" class="featured_product_a">
								<div class="product-listing-image">
									<img alt="{{$related_product->meta_title}}" title="{{$related_product->title}}" src="{{URL::to('')}}/{{$related_product->thumb}}">
								</div>

								<div class="product-listing-bottom">
									<div class="product-name">
										{{$related_product->title}}
									</div>
									<div class="product-price">
										AUD {{$related_product->sell_rate}}
									</div>
								</div>
							</a>
							<a class="product-listing-buy-now-button" href="{{URL::to('')}}/{{$related_product->slug}}">Buy Now</a>
						</div>

					@endforeach
				@endif
			</div>	
		</div>
	</div>

	<script type='text/javascript' src="{{ URL::asset('web/scripts/jquery.fancybox.js') }}"></script> 
	 <script>
		jQuery(function(){
			
			
			jQuery('.fancybox').fancybox({
	     		'padding':0
	     	});

		});
	</script>


	<script>
	     $('#zoom_01').elevateZoom({
			cursor: "crosshair",
			responsive:'True',
			zoomWindowFadeIn: 500,
			zoomWindowFadeOut: 750,
			zoomWindowWidth:410,
			zoomWindowHeight:378
	   }); 
	</script>
@stop