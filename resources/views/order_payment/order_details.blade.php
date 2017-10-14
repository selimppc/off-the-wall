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
					<h1 style="font-size: 20px;" class="text-light text-default-light print_the_pages">Print Invoice</h1>
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


<!-- print the product -->
<div class="print_wrap" style="display:none;width:100%;float:left;">
	<div id="print_verification_letter">

		<table border="0" cellspacing="0" cellpadding="0" style="font-size:14px;width:100%;font-family:'arial';color:#000;line-height:20px;">

			<tr>
				<td colspan="8" style="font-size: 30px;">OFF THE WALL</td>
			</tr>

			<tr>
				<td colspan="8">&nbsp;</td>
			</tr>

			<tr>
				<td colspan="8">&nbsp;</td>
			</tr>

			<tr>
				<td valign="top" colspan="2">
					<h4 class="text-light">Prepared by</h4>
					<address>
						<strong>OFF THE WALL</strong><br>
						Sydney<br>
						Australia<br>
						
					</address>
				</td>

				<td valign="top" colspan="2">
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
				</td>

				<td valign="top" colspan="2">
					<h4 class="text-light">Delivery Address</h4>
					<address>
						
						<strong>{{$delivery_data->first_name}} {{$delivery_data->last_name}}</strong><br/>
						{{$delivery_data->address}}<br>
						{{$delivery_data->suburb}}<br>
						{{$delivery_data->state}}, {{$delivery_data->postcode}} <br>
						{{$delivery_data->country}}<br/>
						<abbr title="Phone">P:</abbr> {{$delivery_data->telephone}}<br/>
						{{$delivery_data->email}}
					</address>
				</td>

				<td valign="top" colspan="2">
					<div class="well" style="min-height: 20px;padding: 19px;margin-bottom: 20px;background-color: #f5f5f5;border: 1px solid #e3e3e3;  border-radius: 4px;-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,0.05);box-shadow: inset 0 1px 1px rgba(0,0,0,0.05);">
						<div class="clearfix">
							<div style="width: 50%;float: left;" class="pull-left"> INVOICE NO : </div>
							<div style="width: 50%;float: left;" class="pull-right"> {{$order_data[0]->invoice_id}} </div>
						</div>
						<div class="clearfix">
							<div style="width: 50%;float: left;" class="pull-left"> INVOICE DATE : </div>
							<div style="width: 50%;float: left;" class="pull-right"> {{date_format($order_data[0]->created_at, 'd/m/Y')}} </div>
						</div>
						<br/><br/>
					</div>
				</td>
			</tr>

		</table>
		<br/><br/><br/>
		<table border="0" cellspacing="0" cellpadding="0" style="font-size:14px;width:100%;font-family:'arial';color:#000;line-height:20px;">
			<thead>
				<tr>
					<th style="border-bottom: 2px solid #ddd;padding:5px; "><div style="text-align: left;">Product Name</div></th>
					<th style="border-bottom: 2px solid #ddd;padding:5px; "><div style="text-align: left;">Matt Colour</div></th>
					<th style="border-bottom: 2px solid #ddd;padding:5px; "><div style="text-align: left;">Qty</div></th>								
					<th style="border-bottom: 2px solid #ddd;padding:5px; "><div style="text-align: right;">price</div></th>
					<th style="border-bottom: 2px solid #ddd;padding:5px; "><div style="text-align: right;">Total</div></th>
					
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
							<td style="border-bottom: 1px solid #ddd;padding:5px; ">
								{{$product->title}}
							</td>
							<td style="border-bottom: 1px solid #ddd;padding:5px; ">
								@if(!empty($product_variation))
									{{$product_variation->title}}
								@else
									N/A
								@endif
							</td>
							<td style="border-bottom: 1px solid #ddd;padding:5px; ">
								{{@$orderdetails->qty}}
							</td>
							<td style="border-bottom: 1px solid #ddd;padding:5px; text-align: right;">
								{{$orderdetails->price}}
							</td>
							<td style="border-bottom: 1px solid #ddd;padding:5px; text-align: right;">
								<?php
									$total+= $orderdetails->qty * $orderdetails->price;
								?>
								{{$orderdetails->price*$orderdetails->qty}}
							</td>
						</tr>
					@endforeach
				@endif

				<tr>
					<td colspan="3" style="border-bottom: 1px solid #ddd;padding:5px; " >
						&nbsp;
					</td>
					<td style="border-bottom: 1px solid #ddd;padding:5px; "><strong>Subtotal</strong></td>
					<td style="border-bottom: 1px solid #ddd;padding:5px;text-align: right; ">$ {{$total}}</td>
				</tr>
				<tr>
					<td colspan="3" style="border-bottom: 1px solid #ddd;padding:5px; " >
						&nbsp;
					</td>
					<td style="border-bottom: 1px solid #ddd;padding:5px; "><strong>Shipping free</strong></td>
					<td style="border-bottom: 1px solid #ddd;padding:5px;text-align: right; ">$ 0.00</td>
				</tr>
				<tr>
					<td colspan="3" style="border-bottom: 1px solid #ddd;padding:5px; " >
						&nbsp;
					</td>
					<td style="border-bottom: 1px solid #ddd;padding:5px; "><strong>GST</strong></td>
					<td style="border-bottom: 1px solid #ddd;padding:5px;text-align: right; ">$ 0.00</td>
				</tr>
				<tr>
					<td colspan="3" style="border-bottom: 1px solid #ddd;padding:5px; " >
						&nbsp;
					</td>
					<td style="border-bottom: 1px solid #ddd;padding:5px; "><strong>Total</strong></td>
					<td style="border-bottom: 1px solid #ddd;padding:5px;text-align: right; ">$ {{$total}}</td>
				</tr>
				
			</tbody>
		</table>

	</div>
</div>	

<script>
	
	 $('.print_the_pages').on('click',function(){
            PrintDiv();
            return false;
        });

	 function PrintDiv() {    
           var divToPrint = $('#print_verification_letter');
           //console.log(divToPrint.html());
           var popupWin = window.open('', 'width=900,height=500');
           popupWin.document.open();
           popupWin.document.write('<html><body onload=\"window.focus(); window.print(); window.close()\">' + divToPrint.html() + '</html>');
           popupWin.document.close();
        }

</script>