@extends('web::layout.web_master')

@section('content')
	
	<div class="col-md-12">

		@include('web::layout.web_sidemenu')


		<div class="col-md-9 col-sm-12 col-xs-12 row-right-0">
		<div class="cart_container">
			<div class="step-container">
				<div class="step">
					<div class="step_images">
						<img src="{{URL::to('')}}/web/images/step1.png">
					</div>
					<div class="step-text active">
						<div class="header">Step 1</div>
						<div class="your-basket">my basket</div>
					</div>
				</div>

				<div class="step">
					<div class="step_images">
						<img src="{{URL::to('')}}/web/images/step2.png">
					</div>
					<div class="step-text">
						<div class="header">Step 2</div>
						<div class="your-basket">billing details</div>
					</div>
				</div>

				<div class="step">
					<div class="step_images">
						<img src="{{URL::to('')}}/web/images/step3.png">
					</div>
					<div class="step-text">
						<div class="header">Step 3</div>
						<div class="your-basket">delivery details</div>
					</div>
				</div>

				<div class="step">
					<div class="step_images">
						<img src="{{URL::to('')}}/web/images/step4.png">
					</div>
					<div class="step-text">
						<div class="header">Step 4</div>
						<div class="your-basket">check order</div>
					</div>
				</div>

				<div class="step">
					<div class="step_images">
						<img src="{{URL::to('')}}/web/images/step5.png">
					</div>
					<div class="step-text">
						<div class="header">Step 5</div>
						<div class="your-basket">secure payment</div>
					</div>
				</div>

			</div>


			<div class="cart-item-container">

				@if(!empty($product_cart_r))

					<table class="table table-striped cart-table">
					<thead>
						<tr>
							<td>Item</td>
							<td>Matt Colour</td>
							<td>Qty</td>
							<td>Unit Price</td>
							<td class="text-align-right">Line Total</td>
							<td></td>
						</tr>
					</thead>

					<tbody>
						<?php
							$total_value = 0;

							$count = 0;
						?>
						@foreach($product_cart_r as $product_cart)
							<?php
								$product_id = $product_cart['product_id'];
								$product = DB::table('product')->where('id',$product_id)->first();

								$product_variation_id =  $product_cart['color'];
								$color = DB::table('product_variation')->where('id',$product_variation_id)->first();
							?>
							<tr>
								<form method="post" action="{{URL::to('/')}}/order/update_cart">
								<td>
									<div class="added-images">
										<img src="{{Url::to('')}}/{{$product->thumb}}">
									</div>
									<div class="added-item-container">
										<a class="product-name" href="#">
											{{$product->title}}
										</a>
									</div>
								</td>
								<td>
									<div class="unit-price">
										@if(!empty($color))
											{{$color->title}}
										@else
											N/A
										@endif
									</div>
								</td>
								<td>
									<input class="cart-quantity" type="number" min="1" name="product_quantity" value="{{$product_cart['product_qty']}}">
								</td>
								<td>
									<div class="unit-price">
										${{$product_cart['product_price']}}
									</div>
								</td>
								<td class="text-align-right">
									<div class="linetotal">
										
										<span class="line_total">
											${{$product_cart['product_qty']*$product_cart['product_price']}}				
											<?php
												$total_value+=$product_cart['product_qty']*$product_cart['product_price'];
											?>
										</span>
									</div>
								</td>	
								<td>
									<div class="delete_product">
										<input type="hidden" name="product_id" value="{{$product_id}}">
										<input type="hidden" name="color" value="{{$product_cart['color']}}">
										<input type="hidden" name="product_price" value="{{$product_cart['product_price']}}">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<input type="hidden" name="product_index" value="{{$count}}">
										<input type="submit" name="update_product" class="product_update" value="">
									</form>
										<form method="post" action="{{URL::to('/')}}/order/remove_cart" style="float:left;">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<input type="hidden" name="product_index" value="{{$count}}">
											<input type="submit" name="remove_product" class="product_remove_cross" value="">
										</form>
										
									</div>
								</td>
							</tr>
							<?php $count++;?>
						@endforeach
							<tr class="sub-total-tr">
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>Total:</td>
								<td class="text-align-right">${{$total_value}}</td>
								<td></td>
							</tr>
					</tbody>
				</table>

				@elseif(!empty($photo_frame_cart))

					<table class="table table-striped cart-table">
						<thead>
							<tr>
								<td>Image Frame</td>
								<td>Frame</td>
								<td>Quantity</td>
								<td class="text-align-right">Frame Price</td>
								<td class="text-align-right">Total Price</td>
							</tr>
						</thead>

						<tbody>
							
								<tr>
									<td>
										<div class="added-images">
											<img src="{{$photo_frame_cart['thumb']}}">
										</div>
									</td>

									<td>
										<div class="added-item-container">
											
											{{$photo_frame_cart['product']['frame']['frameMaterial']}} , 
											{{$photo_frame_cart['product']['frame']['frameCode']}}
											
										</div>
									</td>
									<td style="padding-top: 15px!important;">
									{{$photo_frame_cart['product']['quantity']}}
									</td>
									<td class="text-align-right" style="padding-top: 15px!important;">
									AUD {{$photo_frame_cart['product']['framePrice']+$photo_frame_cart['product']['glassPrice']+$photo_frame_cart['product']['backingPrice']}}
									</td>
									<td class="text-align-right" style="padding-top: 15px!important;">
									AUD {{$photo_frame_cart['product']['price']}}
									</td>
								
								</tr>

								<tr class="sub-total-tr">
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>Discount:</td>
									<td class="text-align-right">AUD {{$photo_frame_cart['product']['discountedPrice']}}</td>
									
								</tr>

								<tr class="sub-total-tr">
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>Total:</td>
									<td class="text-align-right">AUD {{$photo_frame_cart['product']['newDiscountedPrice']}}</td>
									
								</tr>
							
						</tbody>
					</table>
				@elseif(!empty($photo_frame_canvas_print_cart))

					<table class="table table-striped cart-table">
						<thead>
							<tr>
								<td>Image Frame</td>
								<td>Width</td>
								<td>Height</td>
								<td>Quantity</td>
								<td class="text-align-right">Frame Price</td>
								<td class="text-align-right">Total Price</td>
							</tr>
						</thead>

						<tbody>
							
								<tr>
									<td>
										<div class="added-images">
											<img src="{{$photo_frame_canvas_print_cart['image']}}">
										</div>
									</td>
									<td>
										{{$photo_frame_canvas_print_cart['width']}}
									</td>
									<td>
										{{$photo_frame_canvas_print_cart['height']}}
									</td>
									<td>
										1
									</td>
									<td class="text-align-right">
										{{$photo_frame_canvas_print_cart['total_price']}}
									</td>
									<td class="text-align-right">
										{{$photo_frame_canvas_print_cart['total_price']}}
									</td>

								
								</tr>

								<tr class="sub-total-tr">
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>Total:</td>
									<td class="text-align-right">${{$photo_frame_canvas_print_cart['total_price']}}</td>
									
								</tr>

							
							
						</tbody>
					</table>

					<!-- Only Printing -->

				@elseif(!empty($photo_frame_only_printing_cart))

					<table class="table table-striped cart-table">
						<thead>
							<tr>
								<td>Type</td>
								<td>Width</td>
								<td>Height</td>
								<td>Quantity</td>
								<td class="text-align-right">Frame Price</td>
								<td class="text-align-right">Total Price</td>
							</tr>
						</thead>

						<tbody>
							
								<tr>
									<td>Only Printing ({{$photo_frame_only_printing_cart['edge_type']}})</td>
									<td>
										{{$photo_frame_only_printing_cart['width']}}
									</td>
									<td>
										{{$photo_frame_only_printing_cart['height']}}
									</td>
									<td>
										1
									</td>
									<td class="text-align-right">
										{{$photo_frame_only_printing_cart['total_price']}}
									</td>
									<td class="text-align-right">
										{{$photo_frame_only_printing_cart['total_price']}}
									</td>

								
								</tr>

								<tr class="sub-total-tr">
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>Total:</td>
									<td class="text-align-right">${{$photo_frame_only_printing_cart['total_price']}}</td>
									
								</tr>

							
							
						</tbody>
					</table>


			   <!-- Only Streaching -->		

			   @elseif(!empty($photo_frame_only_stretching_cart))

				<table class="table table-striped cart-table">

					<thead>
						<tr>
							<td>Type</td>
							<td>Width</td>
							<td>Height</td>
							<td>Quantity</td>
							<td class="text-align-right">Frame Price</td>
							<td class="text-align-right">Total Price</td>
						</tr>
					</thead>

					<tbody>
						<tr>
							<td>Canvas Stretching Only</td>
							<td>
								{{$photo_frame_only_stretching_cart->width}}
							</td>
							<td>
								{{$photo_frame_only_stretching_cart->height}}
							</td>
							<td>
								1
							</td>
							<td class="text-align-right">
								{{$photo_frame_only_stretching_cart->total_price}}
							</td>
							<td class="text-align-right">
								{{$photo_frame_only_stretching_cart->total_price}}
							</td>
						</tr>
					</tbody>
					
				</table>


				@elseif(!empty($photo_frame_plain_mirror_cart))

					<table class="table table-striped cart-table">
						<thead>
							<tr>
								<td>Mirror Size</td>
								<td>Frame</td>								
								<td>Backing</td>
								<td>Quantity</td>
								<td class="text-align-right">Frame Price</td>
								<td class="text-align-right">Backing Price</td>
								<td class="text-align-right">Mirror Price</td>
								<td class="text-align-right">Total Price</td>
							</tr>
						</thead>

						<tbody>
							<tr>
								<td>
									Width :: {{$photo_frame_plain_mirror_cart['width']}}<br/>
									Height :: {{$photo_frame_plain_mirror_cart['height']}}
								</td>
								<td>
									{{$photo_frame_plain_mirror_cart['frame_code']}}	
								</td>
								<td>
									{{$photo_frame_plain_mirror_cart['backing_type']}}	
								</td>
								<td>
									1
								</td>
								<td class="text-align-right">
									{{$photo_frame_plain_mirror_cart['frame_price']}}	
								</td>
								<td class="text-align-right">
									AU {{$photo_frame_plain_mirror_cart['backing_type_price']}}	
								</td>
								<td class="text-align-right">
									AU 
									<?php
									 $frame_price=str_replace("AU ","",$photo_frame_plain_mirror_cart['frame_price']);

									 echo $photo_frame_plain_mirror_cart['total_price'] - ($frame_price + $photo_frame_plain_mirror_cart['backing_type_price']);
									?>
										
								</td>
								<td class="text-align-right">
									AU {{$photo_frame_plain_mirror_cart['total_price']}}	
								</td>
							</tr>

							<tr class="sub-total-tr">
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>Total:</td>
								<td class="text-align-right">${{$photo_frame_plain_mirror_cart['total_price']}}</td>
								
							</tr>
						</tbody>

					</table>	

				@else
					<div class="empty_cart">Your Cart is empty</div>
				@endif
				
			</div>


			<div class="col-md-12 margin-top-30">
				<div class="row">
					<a href="{{URL::to('')}}" class="cart-continue-shopping">Continue Shopping</a>

					@if(Session::has('product_cart') && count(Session::get('product_cart')) > 0)
						<a href="{{URL::to('')}}/order/billingaddress" class="cart-checkout">Checkout</a>	
					@elseif(Session::has('photo_frame_cart') && count(Session::get('photo_frame_cart')) > 0)

						<a href="{{URL::to('')}}/order/billingaddress" class="cart-checkout">Checkout</a>

					@elseif(Session::has('photo_frame_canvas_print_cart') && count(Session::get('photo_frame_canvas_print_cart')) > 0)	
					
						<a href="{{URL::to('')}}/order/billingaddress" class="cart-checkout">Checkout</a>

					@elseif(Session::has('photo_frame_only_printing_cart') && count(Session::get('photo_frame_only_printing_cart')) > 0)	
					
						<a href="{{URL::to('')}}/order/billingaddress" class="cart-checkout">Checkout</a>	

					@elseif(Session::has('photo_frame_only_stretching_cart') && count(Session::get('photo_frame_only_stretching_cart')) > 0)	
					
						<a href="{{URL::to('')}}/order/billingaddress" class="cart-checkout">Checkout</a>		

					@elseif(Session::has('photo_frame_plain_mirror_cart') && count(Session::get('photo_frame_plain_mirror_cart')) > 0)	
					
						<a href="{{URL::to('')}}/order/billingaddress" class="cart-checkout">Checkout</a>		

					@endif


					
				</div>
			</div>

		</div>
	</div>


	</div>

@stop