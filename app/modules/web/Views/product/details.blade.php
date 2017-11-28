@extends('web::layout.web_master')

@section('content')

	<div style="width: 98%;display: inline-block;margin-bottom: -40px;margin-left: 1%;">
								
		@if(Session::has('flash_message_success'))
			<div class="btn btn-success pull-right" style="width:100%;">
				{!!Session::get('flash_message_success')!!}
			</div>
		@endif
		
		@if(Session::has('flash_message_error'))
			<div class="btn btn-danger pull-right" style="width:100%;">
				{!!Session::get('flash_message_error')!!}
			</div>
		@endif
	</div>

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

				<a data-toggle="modal" data-target="#myModal" class="image_gallery_container">
					<img alt="{{$product->meta_title}}" title="{{$product->title}}" src="{{URL::to('')}}/web/images/ask.png">
					<br/>
						EMAIL TO A FRIEND
				</a>




				<!-- Modal -->
				<div id="myModal" class="modal fade" role="dialog">
				  <div class="modal-dialog">

				    <!-- Modal content-->
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal">&times;</button>
				        <h4 class="modal-title">Email to a friend</h4>
				      </div>
				      <div class="modal-body" style="display: inline-block;width: 100%;">
				        
				        	{!! Form::open(['route' => 'email-to-a-friend-store']) !!}

				        		<input type="hidden" name="_token" value="{{ csrf_token() }}">

				        		<div class="form-group">
						            <label for="email" class="control-label" style="color: #000;">Email:</label>
						            <small class="required">(Required)</small>
						            {!! Form::email('email', null, ['id'=>'email', 'class' => 'form-control','required']) !!}
						        </div>

						        <div class="form-group">
						            <label for="subject" class="control-label" style="color: #000;">Subject:</label>
						            <small class="required">(Required)</small>
						            {!! Form::text('subject', null, ['id'=>'subject', 'class' => 'form-control','required']) !!}
						        </div>

						        <div class="form-group">
							        <label for="message" class="control-label" style="color: #000;">Message:</label>

							        <?php
							        	$message_email_to_a_friend = 'Product Name :: '.$product->title;
							        ?>
							        {!! Form::textarea('message', $message_email_to_a_friend, ['id'=>'message', 'class' => 'form-control', 'cols'=>'30' , 'rows'=>'5']) !!}
							    </div>

							    <div class="pull-right">

							    	<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				        			{!! Form::submit('Send', ['class' => 'btn btn-success']) !!}

				        		</div>

				        	{!! Form::close() !!}
				      </div>

				      
				    </div>

				  </div>
				</div>

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
								<label for="price1">${{$product->sell_rate}}</label>
							</div>

							<!-- @if(!empty($product->cost_price))
								<div class="price">
									<input id="price2" type="radio" name="price" value="{{$product->cost_price}}">
									<label for="price2">Delivered<br/> ${{$product->cost_price}}</label>
								</div>
							@endif -->

						@else

							@if(!empty($product->before_price))
								<div class="price">
									<!-- <input  id="price1" type="radio" name="price" value="{{$product->before_price}}"> -->
									<label for="price1">Before<br/> ${{$product->before_price}}</label>
								</div>

								<div class="price">
									<input  checked id="price1" type="radio" name="price" value="{{$product->sell_rate}}">
									<label for="price1">Now<br/> ${{$product->sell_rate}}</label>
								</div>

							@else
							
								<div class="price">
									<input  checked id="price1" type="radio" name="price" value="{{$product->sell_rate}}">
									<label for="price1">${{$product->sell_rate}}</label>
								</div>

							@endif

							

							<!-- @if(!empty($product->cost_price))
								<div class="price">
									<input id="price2" type="radio" name="price" value="{{$product->cost_price}}">
									<label for="price2">Delivered<br/> ${{$product->cost_price}}</label>
								</div>
							@endif -->


						@endif
					</div>
					
					<div class="quantity">
						<label>Quantity</label>
						<select name="quantity">
							<?php
								if($product->stock_unit_quantity > 0):
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
								<label>
									@if($product->product_group_id == 13)
										Matt Colour
									@else
										Colour
									@endif
								</label>
								<select name="color">
									@foreach($product_variation_r as $product_variation)
										<option value="{{$product_variation->id}}">{{$product_variation->title}}</option>
									@endforeach
									
								</select>
							</div>
						</div>
					@endif

					
					@if($product->stock_unit_quantity > 0)

						<div class="buy_now_button">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input type="hidden" name="product_id" value="{{$product->id}}">
							<input type="hidden" name="weight" value="{{$product->weight}}">
							<input type="submit" name="submit" value="Buy Now">
						</div>
					@endif
					

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