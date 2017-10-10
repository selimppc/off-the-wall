<div class="modal-dialog"  style="width: 75%;">
	<div class="modal-content" style="float: left;width: 100%;" >
	    <!-- <button style="padding: 10px;position: relative;z-index: 99;" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
	    <a href="" class="btn" type="button" style="float:right;position:relative;z-index:99;cursor:pointerl"> X </a>
	    <div class="modal-body">
	      	<div class="row">
		      	<div class="col-xs-8">
					<a href="{{URL::to('')}}" id="header_logo">
						<h2 class="text-light text-default-light">OFF THE WALL</h2>

					</a>
				</div>
				<div class="col-xs-4 text-right" style="margin-bottom:20px;">
					<h1 class="text-light text-default-light">Invoice</h1>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-3">
					<h4 class="text-light">Prepared by</h4>
					<address>
						<strong>OFF THE WALL</strong><br>
						Sydney<br>
						Australia<br>
						
					</address>
				</div><!--end .col -->
				<div class="col-xs-3">
					<h4 class="text-light">Prepared for</h4>
					<address>
						<strong>Billing Address</strong><br/><br/>
						<strong>{{$customer_data->first_name}} {{$customer_data->last_name}}</strong>
						<br/>
						{{$customer_data->address}}<br>
						{{$customer_data->suburb}}<br>
						{{$customer_data->state}}, {{$customer_data->postcode}}<br>
						{{$customer_data->country}}<br/>
						<abbr title="Phone">P:</abbr> {{$customer_data->telephone}}<br/>
						{{$customer_data->email}}
					</address>
				</div><!--end .col -->
				
				<div class="col-xs-3">
					<h4 class="text-light">Delivery Address</h4>
					<address>
						<strong>Delivery Address</strong><br/><br/>
						<strong>{{$delivery_data->first_name}} {{$delivery_data->last_name}}</strong><br/>
						{{$delivery_data->address}}<br>
						{{$delivery_data->suburb}}<br>
						{{$delivery_data->state}}, {{$delivery_data->postcode}} <br>
						{{$delivery_data->country}}<br/>
						<abbr title="Phone">P:</abbr> {{$delivery_data->telephone}}<br/>
						{{$delivery_data->email}}
					</address>
				</div><!--end .col -->
				
				<div class="col-xs-3">
					<div class="well">
						<div class="clearfix">
							<div class="pull-left"> INVOICE NO : </div>
							<div class="pull-right"> {{$order_data[0]->invoice_id}} </div>
						</div>
						<div class="clearfix">
							<div class="pull-left"> INVOICE DATE : </div>
							<div class="pull-right"> {{date_format($order_data[0]->created_at, 'd/m/Y')}} </div>
						</div>
					</div>
				</div><!--end .col -->
			</div>

			<div class="row">
				<div class="col-md-12">
				
					<table class="table">
						<thead>
							<tr>
								<th>Product Name</th>
								<th>Matt Colour</th>
								<th>Qty</th>								
								<th class="text-right">price</th>
								<th class="text-right">Total</th>
								
							</tr>
						</thead>
						<tbody>

							@if(!empty($order_data[0]->relOrderDetail))
								<?php $total = 0; ?>
								@foreach($order_data[0]->relOrderDetail as $orderdetails)
								<?php

									$product_id = $orderdetails->product_id;
									$product = DB::table('product')->where('id',$product_id)->first();

									$color_id = $orderdetails->product_variation_id;
									$product_variation = DB::table('product_variation')->where('id',$color_id)->first();
								?>
									<tr>
										<td>
											{{$product->title}}
										</td>
										<td>
											@if(!empty($product_variation))
												{{$product_variation->title}}
											@else
												N/A
											@endif
										</td>
										<td>
											{{@$orderdetails->qty}}
										</td>
										<td class="text-right">
											{{$orderdetails->price}}
										</td>
										<td class="text-right">
											<?php
												$total+= $orderdetails->qty * $orderdetails->price;
											?>
											{{$orderdetails->price*$orderdetails->qty}}
										</td>
									</tr>
								@endforeach
							@endif

							<tr>
								<td colspan="3" >
									&nbsp;
								</td>
								<td class="text-right"><strong>Subtotal</strong></td>
								<td class="text-right">$ {{$total}}</td>
							</tr>
							<tr>
								<td colspan="3" >
									&nbsp;
								</td>
								<td class="text-right"><strong>Shipping free</strong></td>
								<td class="text-right">$ 0.00</td>
							</tr>
							<tr>
								<td colspan="3" >
									&nbsp;
								</td>
								<td class="text-right"><strong>GST</strong></td>
								<td class="text-right">$ 0.00</td>
							</tr>
							<tr>
								<td colspan="3" >
									&nbsp;
								</td>
								<td class="text-right"><strong>Total</strong></td>
								<td class="text-right">$ {{$total}}</td>
							</tr>
							
						</tbody>
					</table>
				</div><!--end .col -->
			</div>
	    </div>

	</div>
</div>