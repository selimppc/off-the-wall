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

				

					<table class="table table-striped cart-table">
					<thead>
						<tr>
							<td>Item</td>							
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
						@if(!empty($product_cart_r))
							
							@foreach($product_cart_r as $product_cart)
								<?php
									$product_id = $product_cart['product_id'];
									$product = DB::table('product')->where('id',$product_id)->first();

									$product_variation_id =  $product_cart['color'];
									$color = DB::table('product_variation')->where('id',$product_variation_id)->first();
								?>
								<tr>
									<form method="post" action="{{URL::to('/')}}/order/update_cart">

									{{ csrf_field() }}

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
										<input class="cart-quantity" type="number" min="1" name="product_quantity" value="{{$product_cart['product_qty']}}">
									</td>
									<td>
										<div class="unit-price">
											${{number_format($product_cart['product_price'],2)}}
										</div>
									</td>
									<td class="text-align-right">
										<div class="linetotal">
											
											<span class="line_total">
												${{number_format($product_cart['product_qty']*$product_cart['product_price'],2)}}				
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
						@endif

						@if(!empty($photo_frame_cart))

							<tr>
								<form method="post" action="{{URL::to('/')}}/order/update_cart_photo_frame">

								{{ csrf_field() }}
								<td>
									<div class="added-images">
										<img src="{{$photo_frame_cart['thumb']}}">
									</div>
									<div class="added-item-container">
										<a class="product-name" href="#">
											Custom Picture Framing
										</a>
									</div>
								</td>

								<td>
									<input class="cart-quantity" type="number" min="1" name="product_quantity" value="{{$photo_frame_cart['product']['quantity']}}">
								</td>

								<td>
									<div class="unit-price">
										${{number_format($photo_frame_cart['product']['price'],2)}}
									</div>
								</td>

								<td class="text-align-right">
									<div class="linetotal">
										
										<span class="line_total">
											${{number_format($photo_frame_cart['product']['price'] * $photo_frame_cart['product']['quantity'],2)}}

											<?php
												$total_value+= $photo_frame_cart['product']['price'] * $photo_frame_cart['product']['quantity'];
											?>
										</span>
									</div>
								</td>

								<td>
									<div class="delete_product">
										
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<input type="submit" name="update_product" class="product_update" value="">

									</form>
										<form method="post" action="{{URL::to('/')}}/order/remove_cart_photo_frame" style="float:left;">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<input type="hidden" name="product_index" value="{{$count}}">
											<input type="submit" name="remove_product" class="product_remove_cross" value="">
										</form>
										
									</div>
								</td>

							</tr>

						@endif

						@if(!empty($photo_frame_canvas_print_cart))
							<tr>
								<form method="post" action="{{URL::to('/')}}/order/update_cart_canvas_print">

								{{ csrf_field() }}
								<td>
									<div class="added-images">
										<img src="{{$photo_frame_canvas_print_cart['image']}}">
									</div>
									<div class="added-item-container">
										<a class="product-name" href="#">
											Canvas Print
										</a>
									</div>
								</td>
								<td>
									<input class="cart-quantity" type="number" min="1" name="product_quantity_canvas_print" value="{{$photo_frame_canvas_print_cart['qty']}}">
								</td>
								<td>
									<div class="unit-price">
										${{number_format($photo_frame_canvas_print_cart['total_price'],2)}}
									</div>
								</td>
								<td class="text-align-right">
									<div class="linetotal">
										
										<span class="line_total">
											${{number_format($photo_frame_canvas_print_cart['total_price'] * $photo_frame_canvas_print_cart['qty'],2)}}

											<?php
												$total_value+= $photo_frame_canvas_print_cart['total_price'] * $photo_frame_canvas_print_cart['qty'];
											?>
										</span>
									</div>
								</td>
								<td>
									<div class="delete_product">
										<input type="hidden" name="width" value="{{$photo_frame_canvas_print_cart['width']}}">
										<input type="hidden" name="height" value="{{$photo_frame_canvas_print_cart['height']}}">
										<input type="hidden" name="image" value="{{$photo_frame_canvas_print_cart['image']}}">
										<input type="hidden" name="edge_type" value="{{$photo_frame_canvas_print_cart['edge_type']}}">
										<input type="hidden" name="total_price" value="{{$photo_frame_canvas_print_cart['total_price']}}">
										
										<input type="submit" name="update_product" class="product_update" value="">
									</form>
										<form method="post" action="{{URL::to('/')}}/order/remove_cart_canvas_print" style="float:left;">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<input type="hidden" name="product_index" value="{{$count}}">
											<input type="submit" name="remove_product" class="product_remove_cross" value="">
										</form>
										
									</div>
								</td>
							</tr>
						@endif

						@if(!empty($photo_frame_only_printing_cart))

							<tr>
								<form method="post" action="{{URL::to('/')}}/order/update_cart_canvas_stretching_only">

								{{ csrf_field() }}
								<td>
									<div class="added-item-container">
										<a class="product-name" href="#">
											Canvas Stretching Only ({{$photo_frame_only_printing_cart['edge_type']}})
										</a>
									</div>
								</td>
								<td>
									<input class="cart-quantity" type="number" min="1" name="product_quantity" value="{{$photo_frame_only_printing_cart['qty']}}">
								</td>
								<td>
									<div class="unit-price">										
										${{number_format($photo_frame_only_printing_cart['total_price'],2)}}
									</div>
								</td>
								<td class="text-align-right">
									<div class="linetotal">
										
										<span class="line_total">
											${{number_format($photo_frame_only_printing_cart['total_price']*$photo_frame_only_printing_cart['qty'],2)}}
											<?php
												$total_value+=$photo_frame_only_printing_cart['total_price']*$photo_frame_only_printing_cart['qty'];
											?>
										</span>
									</div>
								</td>
								<td>
									<div class="delete_product">
										
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<input type="submit" name="update_product" class="product_update" value="">
									</form>
										<form method="post" action="{{URL::to('/')}}/order/remove_cart_canvas_stretching_only" style="float:left;">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<input type="hidden" name="product_index" value="{{$count}}">
											<input type="submit" name="remove_product" class="product_remove_cross" value="">
										</form>
										
									</div>
								</td>
							</tr>

						@endif


						@if(!empty($photo_frame_only_stretching_cart))


							<tr>
								<form method="post" action="{{URL::to('/')}}/order/update_cart_canvas_only_printing">

								{{ csrf_field() }}
								<td>
									<div class="added-item-container">
										<a class="product-name" href="#">
											Canvas Only Printing 
										</a>
									</div>
								</td>
								<td>
									<input class="cart-quantity" type="number" min="1" name="product_quantity" value="{{$photo_frame_only_stretching_cart['qty']}}">
								</td>
								<td>
									<div class="unit-price">
										${{number_format($photo_frame_only_stretching_cart['total_price'],2)}}
									</div>
								</td>
								<td class="text-align-right">
									<div class="linetotal">
										
										<span class="line_total">
											${{number_format($photo_frame_only_stretching_cart['total_price'] * $photo_frame_only_stretching_cart['qty'],2)}}
											<?php
												$total_value+=$photo_frame_only_stretching_cart['total_price'] * $photo_frame_only_stretching_cart['qty'];
											?>
										</span>
									</div>
								</td>
								<td>
									<div class="delete_product">
										
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<input type="submit" name="update_product" class="product_update" value="">
									</form>
										<form method="post" action="{{URL::to('/')}}/order/remove_cart_canvas_only_print" style="float:left;">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<input type="hidden" name="product_index" value="{{$count}}">
											<input type="submit" name="remove_product" class="product_remove_cross" value="">
										</form>
										
									</div>
								</td>
							</tr>

						@endif

						@if(!empty($photo_frame_plain_mirror_cart))
							<tr>
								<form method="post" action="{{URL::to('/')}}/order/update_cart_plain_mirror">

								{{ csrf_field() }}
								<td>
									<div class="added-item-container">
										<a class="product-name" href="#">
											Plain Mirror
										</a>
									</div>
								</td>
								<td>
									<input class="cart-quantity" type="number" min="1" name="product_quantity" value="{{$photo_frame_plain_mirror_cart['qty']}}">
								</td>
								<td>
									<div class="unit-price">
										${{number_format($photo_frame_plain_mirror_cart['total_price'],2)}}
									</div>
								</td>
								<td class="text-align-right">
									<div class="linetotal">
										
										<span class="line_total">
											${{number_format($photo_frame_plain_mirror_cart['total_price']*$photo_frame_plain_mirror_cart['qty'],2)}}

											<?php
												$total_value+=$photo_frame_plain_mirror_cart['total_price']*$photo_frame_plain_mirror_cart['qty'];
											?>
										</span>
									</div>
								</td>
								<td>
									<div class="delete_product">										
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<input type="submit" name="update_product" class="product_update" value="">
									</form>
										<form method="post" action="{{URL::to('/')}}/order/remove_cart_plain_mirror" style="float:left;">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<input type="hidden" name="product_index" value="{{$count}}">
											<input type="submit" name="remove_product" class="product_remove_cross" value="">
										</form>
										
									</div>
								</td>
							</tr>
						@endif

						<tr class="sub-total-tr">
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>Total:</td>
							<td class="text-align-right">${{number_format($total_value,2)}}</td>
							<td></td>
						</tr>

					</tbody>
				</table>
	
				
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