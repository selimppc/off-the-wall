<?php
	use App\Helpers\Fastway;
?>

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
					<div class="step-text">
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
					<div class="step-text active">
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
						</tr>
					</thead>

					<tbody>
						<?php
							$total_value = 0;
							$total_weight = 0;
							$total_qty = 0;
							$count = 0;
						?>
						@if(!empty($product_cart_r))
							@foreach($product_cart_r as $product_cart)
								<?php
									$product_id = $product_cart['product_id'];
									$product = DB::table('product')->where('id',$product_id)->first();

									$product_variation_id =  $product_cart['color'];
									$color = DB::table('product_variation')->where('id',$product_variation_id)->first();

									if(!empty($product->weight)){
										$total_weight+=$product->weight;
									}else{
										$total_weight+=0.5;
									}

									$total_qty+=$product_cart['product_qty'];
								
								?>
								<tr>
									
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
									<td style="padding-top: 15px!important;">
										{{$product_cart['product_qty']}}
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
									
								</tr>
								<?php $count++;?>
							@endforeach
						@endif

						@if(!empty($photo_frame_cart))

							@foreach($photo_frame_cart as $frame_cart)
								<?php

									$total_weight+=0.5;
									$total_qty+=$frame_cart['product']['quantity'];
								?>

								<tr>
									<td>
										<div class="added-images">
											<img src="{{$frame_cart['thumb']}}">
										</div>

										<div class="added-item-container">
											<a class="product-name" href="#">
												Custom Picture Framing
											</a>
										</div>
									</td>

									<td style="padding-top: 5px!important;">
									{{$frame_cart['product']['quantity']}}
									</td>
									
									<td>
										<div class="unit-price">
											${{$frame_cart['product']['price']}}
										</div>
									</td>

									<td class="text-align-right">
										<div class="linetotal">
											
											<span class="line_total">
												${{number_format($frame_cart['product']['price'] * $frame_cart['product']['quantity'],2)}}	
												<?php
													$total_value+= $frame_cart['product']['price'] * $frame_cart['product']['quantity'];
												?>
											</span>
										</div>
									</td>
								
								</tr>

							@endforeach

						@endif

						@if(!empty($photo_frame_canvas_print_cart))
							<?php
								$total_weight+=$photo_frame_canvas_print_cart['weight'];
								$total_qty+=$photo_frame_canvas_print_cart['qty'];
							?>
							<tr>
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
								<td style="padding-top: 5px!important;">
									{{$photo_frame_canvas_print_cart['qty']}}
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

							
							</tr>

						@endif


						@if(!empty($photo_frame_only_printing_cart))

							<?php
								$total_weight+=$photo_frame_only_printing_cart['weight'];
								$total_qty+=$photo_frame_only_printing_cart['qty'];
							?>

							<tr>
								<td>
									<div class="added-item-container">
										<a class="product-name" href="#">
											Canvas Stretching Only ({{$photo_frame_only_printing_cart['edge_type']}})
										</a>
									</div>
								</td>
								
								<td style="padding-top: 5px!important;">
									{{$photo_frame_only_printing_cart['qty']}}
								</td>

								<td>
									<div class="unit-price">
										${{number_format($photo_frame_only_printing_cart['total_price'],2)}}
									</div>	
								</td>

								<td class="text-align-right">
									<div class="linetotal">
										
										<span class="line_total">
											${{number_format($photo_frame_only_printing_cart['total_price'] * $photo_frame_only_printing_cart['qty'],2)}}

											<?php
												$total_value+=$photo_frame_only_printing_cart['total_price']*$photo_frame_only_printing_cart['qty'];
											?>

										</span>
									</div>
								</td>

							
							</tr>

						@endif


						@if(!empty($photo_frame_only_stretching_cart))

							<?php
								$total_weight+=$photo_frame_only_stretching_cart['weight'];
								$total_qty+=$photo_frame_only_stretching_cart['qty'];
							?>
							<tr>
								<td>
									<div class="added-item-container">
										<a class="product-name" href="#">
											Canvas Printing Only
										</a>
									</div>									
								</td>
								<td style="padding-top: 5px!important;">
									{{$photo_frame_only_stretching_cart['qty']}}
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

																
							</tr>

						@endif

						@if(!empty($photo_frame_plain_mirror_cart))

							<?php
								$total_weight+=$photo_frame_plain_mirror_cart['weight'];
								$total_qty+=$photo_frame_plain_mirror_cart['qty'];
							?>

							<tr>
								<td>
									<div class="added-item-container">
										<a class="product-name" href="#">
											Plain Mirror 
										</a>
									</div>									
								</td>
								<td style="padding-top: 5px!important;">
									{{$photo_frame_plain_mirror_cart['qty']}}	
								</td>
								<td>
									<div class="unit-price">
										${{number_format($photo_frame_plain_mirror_cart['total_price'],2)}}
									</div>	
								</td>

								<td class="text-align-right">
									<div class="linetotal">
										
										<span class="line_total">
											${{number_format($photo_frame_plain_mirror_cart['total_price'] * $photo_frame_plain_mirror_cart['qty'],2)}}	

											<?php
												$total_value+=$photo_frame_plain_mirror_cart['total_price']*$photo_frame_plain_mirror_cart['qty'];
											?>

										</span>
									</div>
								</td>
								
							</tr>

						@endif

						<tr class="sub-total-tr">
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>Sub Total:</td>
							<td class="text-align-right">${{number_format($total_value,2)}}</td>
							
						</tr>

						<tr class="sub-total-tr">
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>Shipping Charge:</td>
							<td class="text-align-right">
								<?php

									if($shipping_method == 'fastway'){

										$shipping_cost = Fastway::freight_calculation($delivery_data->suburb,$delivery_data->postcode,$total_weight,'');

										if(isset($shipping_cost['shipping_value'])){
											if($total_qty > 3 && $total_qty < 11){
												$shipping_data = $shipping_cost['shipping_value'] + 2.5; 	
											}elseif ($total_qty > 10 && $total_qty < 31) {
												$shipping_data = $shipping_cost['shipping_value'] + 7.5; 
											}elseif ($total_qty > 30) {
												$shipping_data = $shipping_cost['shipping_value'] + 10; 
											}else{
												$shipping_data = $shipping_cost['shipping_value'];
											}
											#echo $shipping_data = $shipping_cost['shipping_value'];
										}else{
											$shipping_data = 0;
											$shipping_cost['error'];
										}

									}else{

										$shipping_data = 0.00;

									}
									

								?>
								$<span id="shipping_value_return">{{$shipping_data}}</span>
							</td>
							
						</tr>

						<tr class="sub-total-tr">
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>Total:</td>
							<td class="text-align-right">${{number_format($total_value + $shipping_data,2)}}</td>
							
						</tr>

					</tbody>
				</table>

				
				
			</div>

			<div class="col-md-6">
				<div class="row">
					<div class="billing_address">
						<h2>Billing Details</h2>
						<p>{{$user_data->first_name}} {{$user_data->last_name}}</p>
						<p>{{$user_data->email}}</p>
						<p>{{$user_data->address}}</p>
						<p>{{$user_data->suburb}} {{$user_data->state}} {{$user_data->postcode}}</p>
						<p>{{$user_data->country}}</p>
						<p>{{$user_data->telephone}}</p>
					</div>
				</div>
			</div>

			<div class="col-md-6">
				<div class="row">
					<div class="billing_address">
						<h2>Delivery Details</h2>
						<p>{{$delivery_data->first_name}} {{$delivery_data->last_name}}</p>
						<p>{{$delivery_data->email}}</p>
						<p>{{$delivery_data->address}}</p>
						<p>{{$delivery_data->suburb}} {{$delivery_data->state}} {{$delivery_data->postcode}}</p>
						<p>{{$delivery_data->country}}</p>
						<p>{{$delivery_data->telephone}}</p>
					</div>
				</div>
			</div>

			<div class="col-md-12 margin-top-30">
				<div class="row">
					<a href="{{URL::to('')}}" class="cart-continue-shopping">Continue Shopping</a>


					<form id="submit_payment" method="post" action="https://www.paypal.com/cgi-bin/webscr">
							<input type="hidden" name="address_override" value="1">
							<input type="hidden" name="cmd" value="_cart">
							<input type="hidden" name="upload" value="1">
							<input type="hidden" name="business" value="offthewallframing@gmail.com">
							<input type="hidden" name="currency_code" value="AUD">
							
							<?php
								$total_value = 0;

								$count = 1;
							?>
							@if(count($product_cart_r) > 0)
								@foreach($product_cart_r as $product_cart)
									<?php
										$product_id = $product_cart['product_id'];
										$product = DB::table('product')->where('id',$product_id)->first();
									?>
	              					
										<input type="hidden" name="item_name_{{$count}}" value="{{$product->title}}">
										<input type="hidden" name="amount_{{$count}}" value="{{$product_cart['product_price']}}">
										<input type="hidden" name="quantity_{{$count}}" value="{{$product_cart['product_qty']}}">
											
			                  			<?php $count++;?>
								@endforeach	
								
							@endif

							@if(count($photo_frame_cart) > 0)

								@foreach($photo_frame_cart as $frame_cart)

									<input type="hidden" name="item_name_{{$count}}" value="{{$frame_cart['product']['frame']['frameMaterial']}} , 
											{{$frame_cart['product']['frame']['frameCode']}}">
									<input type="hidden" name="amount_{{$count}}" value="{{$frame_cart['product']['newDiscountedPrice']}}">

									<input type="hidden" name="quantity_{{$count}}" value="{{$frame_cart['product']['quantity']}}">

									<?php
										$count++;
									?>

								@endforeach

							@endif

							@if(count($photo_frame_canvas_print_cart) > 0)

								<input type="hidden" name="item_name_{{$count}}" value="Canvas Print">
								<input type="hidden" name="amount_{{$count}}" value="{{$photo_frame_canvas_print_cart['total_price']}}">
								<input type="hidden" name="quantity_{{$count}}" value="{{$photo_frame_canvas_print_cart['qty']}}">

								<?php
									$count++;
								?>

							@endif

							@if(count($photo_frame_only_printing_cart) > 0)

								<input type="hidden" name="item_name_{{$count}}" value="Canvas Stretching Only ">
								<input type="hidden" name="amount_{{$count}}" value="{{$photo_frame_only_printing_cart['total_price']}}">
								<input type="hidden" name="quantity_{{$count}}" value="{{$photo_frame_only_printing_cart['qty']}}">

								<?php
									$count++;
								?>

							@endif

							@if(count($photo_frame_only_stretching_cart) > 0)

								<input type="hidden" name="item_name_{{$count}}" value="Canvas Only Printing ">
								<input type="hidden" name="amount_{{$count}}" value="{{$photo_frame_only_stretching_cart->total_price}}">
								<input type="hidden" name="quantity_{{$count}}" value="{{$photo_frame_only_stretching_cart->qty}}">

								<?php
									$count++;
								?>

							@endif

							@if(count($photo_frame_plain_mirror_cart) > 0)

								<input type="hidden" name="item_name_{{$count}}" value="Plain MIrror({{$photo_frame_plain_mirror_cart['frame_code']}})">
								<input type="hidden" name="amount_{{$count}}" value="{{$photo_frame_plain_mirror_cart['total_price']}}">

								<input type="hidden" name="quantity_{{$count}}" value="{{$photo_frame_plain_mirror_cart['qty']}}">

								<?php
									$count++;
								?>

							@endif

							<input type="hidden" name="shipping" value="0.00">
<input type="hidden" name="shipping2" value="2.00">
							<input type="hidden" name="return" value="{{URL::to('')}}/order/thank-you">

							<input type="hidden" name="handling_cart" value="{{$shipping_data}}">
					
							<!-- <input style="float:right;" class="paynowbutton" type="image" src="{{URL::to('')}}/web/images/paynow.png" border="0" name="submit" width="120" alt="Make payments with PayPal - it's fast, free and secure!"> -->
						
					</form>
					<div class="loading" style="color: #ff7722;display:none;text-align: right;">Please wait a moment</div>
					<div id="paynowbutton_btn"><img style="float: right;width: 120px; cursor:pointer;" src="{{URL::to('')}}/web/images/paynow.png"></div>

										

						
				</div>
			</div>

		</div>
	</div>


	</div>
<a href="{{Url::to('')}}" id="site_url">&nbsp;</a>
<script>
	$(function(){

		$("#paynowbutton_btn").on('click',function(e){
			
			$('.loading').show();
            var shipping_value = $('#shipping_value_return').html();
            var site_url = $('#site_url').attr("href");
            $.ajax({
                url: site_url+'/order/saveorder',
                type: 'POST',
                dataType: 'json',
                data: {_token: '{!! csrf_token() !!}',shipping_value:shipping_value,},
                success: function(response)
                {
                    $('#submit_payment').submit();
                }
            });

            


        });
	});

</script>

@stop