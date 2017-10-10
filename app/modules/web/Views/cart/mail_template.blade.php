<div class="cart-item-container">

			@if(!empty($product_cart_r))

				<table class="table table-striped cart-table" style="width: 100%;margin-bottom: 20px;">
				<thead style="background: #546f7a;color: #fff;">
					<tr>
						<td style="padding:8px;">Item</td>
						<td style="padding:8px;text-align:center;">Matt Colour</td>
						<td style="padding:8px;text-align:center;">Qty</td>
						<td style="padding:8px;text-align:right;">Unit Price</td>
						<td style="padding:8px;text-align:right;" class="text-align-right">Line Total</td>
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
							
							<td style="padding:8px;color: #576d78;text-transform: uppercase;font-weight: 700;float: left;">
									
								{{$product->title}}
								
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
							<td style="padding: 8px;outline: none;width: 50px;text-align: center;">
								{{$product_cart['product_qty']}}
							</td>
							<td style="padding:8px;text-align:right;">
								
									${{$product_cart['product_price']}}
								
							</td>
							<td style="padding:8px;text-align:right;">
								
										${{$product_cart['product_qty']*$product_cart['product_price']}}				
										<?php
											$total_value+=$product_cart['product_qty']*$product_cart['product_price'];
										?>
								
							</td>	
							
						</tr>
						<?php $count++;?>
					@endforeach
						<tr style="background-color: #f1f1f1;">
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td style="padding:8px;text-align:right;">Total:</td>
							<td style="padding:8px;text-align:right;">${{$total_value}}</td>
							
						</tr>
				</tbody>
			</table>


			@else
				<div class="empty_cart">Your Cart is empty</div>
			@endif
			
		</div>

		<div class="col-md-6" style="width:50%;float:left;">
			<div class="row">
				<div class="billing_address">
					<h2 style="text-transform: uppercase;font-size: 14px;font-weight: 700;color: #576d78;margin: 0;margin-bottom: 20px;">Billing Details</h2>
					<p style="color: #666;font-size: 13px;margin-bottom: 2px;">{{$user_data->first_name}} {{$user_data->last_name}}</p>
					<p style="color: #666;font-size: 13px;margin-bottom: 2px;">{{$user_data->email}}</p>
					<p style="color: #666;font-size: 13px;margin-bottom: 2px;">{{$user_data->address}}</p>
					<p style="color: #666;font-size: 13px;margin-bottom: 2px;">{{$user_data->suburb}} {{$user_data->state}} {{$user_data->postcode}}</p>
					<p style="color: #666;font-size: 13px;margin-bottom: 2px;">{{$user_data->country}}</p>
					<p style="color: #666;font-size: 13px;margin-bottom: 2px;">{{$user_data->telephone}}</p>
				</div>
			</div>
		</div>

		<div class="col-md-6" style="width:50%;float:left;">
			<div class="row">
				<div class="billing_address">
					<h2 style="text-transform: uppercase;font-size: 14px;font-weight: 700;color: #576d78;margin: 0;margin-bottom: 20px;">Delivery Details</h2>
					<p style="color: #666;font-size: 13px;margin-bottom: 2px;">{{$delivery_data->first_name}} {{$delivery_data->last_name}}</p>
					<p style="color: #666;font-size: 13px;margin-bottom: 2px;">{{$delivery_data->email}}</p>
					<p style="color: #666;font-size: 13px;margin-bottom: 2px;">{{$delivery_data->address}}</p>
					<p style="color: #666;font-size: 13px;margin-bottom: 2px;">{{$delivery_data->suburb}} {{$delivery_data->state}} {{$delivery_data->postcode}}</p>
					<p style="color: #666;font-size: 13px;margin-bottom: 2px;">{{$delivery_data->country}}</p>
					<p style="color: #666;font-size: 13px;margin-bottom: 2px;">{{$delivery_data->telephone}}</p>
				</div>
			</div>
		</div>