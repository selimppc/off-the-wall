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

				@if(!empty($product_cart_r))

					<table class="table table-striped cart-table">
					<thead>
						<tr>
							<td>Item</td>
							<td>Matt Colour</td>
							<td>Qty</td>
							<td>Unit Price</td>
							<td class="text-align-right">Line Total</td>
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
								
							</tr>
							<?php $count++;?>
						@endforeach
							<tr class="sub-total-tr">
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>Total:</td>
								<td class="text-align-right">${{$total_value}}</td>
								
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
									<td>
										Only Printing ({{$photo_frame_only_printing_cart['edge_type']}})
									</td>
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


				<!-- Canvas Stretching Only -->	

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
									<td>
										Canvas Stretching Only
									</td>
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

								<tr class="sub-total-tr">
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>Total:</td>
									<td class="text-align-right">${{$photo_frame_only_stretching_cart->total_price}}</td>
									
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

					@if(Session::has('product_cart') && count(Session::get('product_cart')) > 0)
						
						<form id="submit_payment" method="post" action="https://www.paypal.com/cgi-bin/webscr">
							<input type="hidden" name="address_override" value="1">
							<input type="hidden" name="cmd" value="_cart">
							<input type="hidden" name="upload" value="1">
							<input type="hidden" name="business" value="offthewallframing@gmail.com">
							<input type="hidden" name="currency_code" value="AUD">
							<!-- <input type="hidden" name="invoice" value="10" > -->

							<input type="hidden" name="shipping" value="0.00">
							<input type="hidden" name="shipping2" value="20.00">

							<?php
								$total_value = 0;

								$count = 1;
							?>
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

							<input type="hidden" name="return" value="{{URL::to('')}}/order/thank-you">
					
							<!-- <input style="float:right;" class="paynowbutton" type="image" src="{{URL::to('')}}/web/images/paynow.png" border="0" name="submit" width="120" alt="Make payments with PayPal - it's fast, free and secure!"> -->
						
					</form>
					<div class="loading" style="color: #ff7722;display:none;text-align: right;">Please wait a moment</div>
					<div id="paynowbutton_btn"><img style="float: right;width: 120px; cursor:pointer;" src="{{URL::to('')}}/web/images/paynow.png"></div>

					@elseif(Session::has('photo_frame_cart') && count(Session::get('photo_frame_cart')) > 0)

						<form id="submit_payment" method="post" action="https://www.paypal.com/cgi-bin/webscr">
							<input type="hidden" name="address_override" value="1">
							<input type="hidden" name="cmd" value="_cart">
							<input type="hidden" name="upload" value="1">
							<input type="hidden" name="business" value="offthewallframing@gmail.com">
							<input type="hidden" name="currency_code" value="AUD">
							<!-- <input type="hidden" name="invoice" value="10" > -->

							<input type="hidden" name="shipping" value="0.00">
							<input type="hidden" name="shipping2" value="20.00">

              					
									<input type="hidden" name="item_name_1" value="{{$photo_frame_cart['product']['frame']['frameMaterial']}} , 
											{{$photo_frame_cart['product']['frame']['frameCode']}}">
									<input type="hidden" name="amount_1" value="{{$photo_frame_cart['product']['newDiscountedPrice']}}">
									
		                  		
							<input type="hidden" name="return" value="{{URL::to('')}}/order/thank-you">
					
							<!-- <input style="float:right;" class="paynowbutton" type="image" src="{{URL::to('')}}/web/images/paynow.png" border="0" name="submit" width="120" alt="Make payments with PayPal - it's fast, free and secure!"> -->
						
					</form>
					<div class="loading" style="color: #ff7722;display:none;text-align: right;">Please wait a moment</div>
					<div id="paynowbutton_btn"><img style="float: right;width: 120px; cursor:pointer;" src="{{URL::to('')}}/web/images/paynow.png"></div>


					@elseif(Session::has('photo_frame_canvas_print_cart') && count(Session::get('photo_frame_canvas_print_cart')) > 0)

						<form id="submit_payment" method="post" action="https://www.paypal.com/cgi-bin/webscr">
							<input type="hidden" name="address_override" value="1">
							<input type="hidden" name="cmd" value="_cart">
							<input type="hidden" name="upload" value="1">
							<input type="hidden" name="business" value="offthewallframing@gmail.com">
							<input type="hidden" name="currency_code" value="AUD">
							<!-- <input type="hidden" name="invoice" value="10" > -->

							<input type="hidden" name="shipping" value="0.00">
							<input type="hidden" name="shipping2" value="20.00">

              					
							<input type="hidden" name="item_name_1" value="Canvas Print">
							<input type="hidden" name="amount_1" value="{{$photo_frame_canvas_print_cart['total_price']}}">
									
		                  		
							<input type="hidden" name="return" value="{{URL::to('')}}/order/thank-you">
					
							<!-- <input style="float:right;" class="paynowbutton" type="image" src="{{URL::to('')}}/web/images/paynow.png" border="0" name="submit" width="120" alt="Make payments with PayPal - it's fast, free and secure!"> -->
						
					</form>
					<div class="loading" style="color: #ff7722;display:none;text-align: right;">Please wait a moment</div>
					<div id="paynowbutton_btn"><img style="float: right;width: 120px; cursor:pointer;" src="{{URL::to('')}}/web/images/paynow.png"></div>



					<!-- Only Printing -->
					@elseif(Session::has('photo_frame_only_printing_cart') && count(Session::get('photo_frame_only_printing_cart')) > 0)

						<form id="submit_payment" method="post" action="https://www.paypal.com/cgi-bin/webscr">
							<input type="hidden" name="address_override" value="1">
							<input type="hidden" name="cmd" value="_cart">
							<input type="hidden" name="upload" value="1">
							<input type="hidden" name="business" value="offthewallframing@gmail.com">
							<input type="hidden" name="currency_code" value="AUD">
							<!-- <input type="hidden" name="invoice" value="10" > -->

							<input type="hidden" name="shipping" value="0.00">
							<input type="hidden" name="shipping2" value="20.00">

              					
							<input type="hidden" name="item_name_1" value="Canvas Print">
							<input type="hidden" name="amount_1" value="{{$photo_frame_only_printing_cart['total_price']}}">
									
		                  		
							<input type="hidden" name="return" value="{{URL::to('')}}/order/thank-you">
					
							<!-- <input style="float:right;" class="paynowbutton" type="image" src="{{URL::to('')}}/web/images/paynow.png" border="0" name="submit" width="120" alt="Make payments with PayPal - it's fast, free and secure!"> -->
						
					</form>
					<div class="loading" style="color: #ff7722;display:none;text-align: right;">Please wait a moment</div>
					<div id="paynowbutton_btn"><img style="float: right;width: 120px; cursor:pointer;" src="{{URL::to('')}}/web/images/paynow.png"></div>


					<!-- Canvas Stretching Only -->
					@elseif(Session::has('photo_frame_only_stretching_cart') && count(Session::get('photo_frame_only_stretching_cart')) > 0)

						<form id="submit_payment" method="post" action="https://www.paypal.com/cgi-bin/webscr">
							<input type="hidden" name="address_override" value="1">
							<input type="hidden" name="cmd" value="_cart">
							<input type="hidden" name="upload" value="1">
							<input type="hidden" name="business" value="offthewallframing@gmail.com">
							<input type="hidden" name="currency_code" value="AUD">
							<!-- <input type="hidden" name="invoice" value="10" > -->

							<input type="hidden" name="shipping" value="0.00">
							<input type="hidden" name="shipping2" value="20.00">

              					
							<input type="hidden" name="item_name_1" value="Canvas Print">
							<input type="hidden" name="amount_1" value="{{$photo_frame_only_stretching_cart->total_price}}">
									
		                  		
							<input type="hidden" name="return" value="{{URL::to('')}}/order/thank-you">
					
							<!-- <input style="float:right;" class="paynowbutton" type="image" src="{{URL::to('')}}/web/images/paynow.png" border="0" name="submit" width="120" alt="Make payments with PayPal - it's fast, free and secure!"> -->
						
					</form>
					<div class="loading" style="color: #ff7722;display:none;text-align: right;">Please wait a moment</div>
					<div id="paynowbutton_btn"><img style="float: right;width: 120px; cursor:pointer;" src="{{URL::to('')}}/web/images/paynow.png"></div>


					@elseif(Session::has('photo_frame_plain_mirror_cart') && count(Session::get('photo_frame_plain_mirror_cart')) > 0)

						<form id="submit_payment" method="post" action="https://www.paypal.com/cgi-bin/webscr">
							<input type="hidden" name="address_override" value="1">
							<input type="hidden" name="cmd" value="_cart">
							<input type="hidden" name="upload" value="1">
							<input type="hidden" name="business" value="offthewallframing@gmail.com">
							<input type="hidden" name="currency_code" value="AUD">
							<!-- <input type="hidden" name="invoice" value="10" > -->

							<input type="hidden" name="shipping" value="0.00">
							<input type="hidden" name="shipping2" value="20.00">

              					
							<input type="hidden" name="item_name_1" value="{{$photo_frame_plain_mirror_cart['frame_code']}}">
							<input type="hidden" name="amount_1" value="{{$photo_frame_plain_mirror_cart['total_price']}}">
									
		                  		
							<input type="hidden" name="return" value="{{URL::to('')}}/order/thank-you">
					
							<!-- <input style="float:right;" class="paynowbutton" type="image" src="{{URL::to('')}}/web/images/paynow.png" border="0" name="submit" width="120" alt="Make payments with PayPal - it's fast, free and secure!"> -->
						
					</form>
					<div class="loading" style="color: #ff7722;display:none;text-align: right;">Please wait a moment</div>
					<div id="paynowbutton_btn"><img style="float: right;width: 120px; cursor:pointer;" src="{{URL::to('')}}/web/images/paynow.png"></div>

					@endif
					

						
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
            var value = '';
            var site_url = $('#site_url').attr("href");
            $.ajax({
                url: site_url+'/order/saveorder',
                type: 'POST',
                dataType: 'json',
                data: {_token: '{!! csrf_token() !!}',value:value,},
                success: function(response)
                {
                    $('#submit_payment').submit();
                }
            });

            


        });
	});

</script>

@stop