<div class="modal-dialog"  style="width: 75%;">
	<div class="modal-content" style="float: left;width: 100%;" >

		<a href="" class="btn" type="button" style="float:right;position:relative;z-index:99;cursor:pointerl"> X </a>

		<div class="modal-body">

			<div class="row">
		      	<div class="col-xs-8">
					<a href="{{URL::to('')}}" id="header_logo">
						<h2 class="text-light text-default-light">OFF THE WALL</h2>

					</a>
				</div>
				<div class="col-xs-4 text-right" style="margin-bottom:20px;">
					<h1 class="text-light text-default-light print_the_pages" style="font-size: 20px;" >Print Invoice</h1>
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
								<th>Type</th>
								<th>Details</th>								
								<th>Quantity</th>
								<th class="text-right">Total Price</th>
							</tr>

						</thead>

						<tbody>

							@if(!empty($order_data[0]->relOrderDetail))

								@foreach($order_data[0]->relOrderDetail as $orderdetails)

									<?php	
										$order_details_data = explode("===",$orderdetails->details);
									?>

									<tr>
										<td>
											Only Printing
										</td>
										<td>
											{{$order_details_data['0']}}
											<br/>
											{{$order_details_data['1']}}
											<br/>
											{{$order_details_data['2']}}
											<br/>
											
										</td>
										<td>
											1
										</td>	
										<td class="text-right">
											AUD {{str_replace("Price:","",$order_details_data['3'])}}
										</td>									
									</tr>



									<tr>
										<td colspan="2" >
											&nbsp;
										</td>
										<td class="text-right"><strong>Price</strong></td>
										<td class="text-right">
											AUD {{str_replace("Price:","",$order_details_data['3'])}}
										</td>
									</tr>

								@endforeach

							@endif	

						</tbody>

					</table>

				</div>
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
					<th style="border-bottom: 2px solid #ddd;padding:5px;text-align: left; ">Type</th>
					<th style="border-bottom: 2px solid #ddd;padding:5px;text-align: left; ">Details</th>								
					<th style="border-bottom: 2px solid #ddd;padding:5px;text-align: left; ">Quantity</th>
					<th style="border-bottom: 2px solid #ddd;padding:5px;text-align: right; ">Total Price</th>
				</tr>

			</thead>

			<tbody>

				@if(!empty($order_data[0]->relOrderDetail))

					@foreach($order_data[0]->relOrderDetail as $orderdetails)

						<?php	
							$order_details_data = explode("===",$orderdetails->details);
						?>

						<tr>
							<td valign="top" style="border-bottom: 1px solid #ddd;padding:5px; ">
								Only Printing
							</td>
							<td valign="top" style="border-bottom: 1px solid #ddd;padding:5px; ">
								{{$order_details_data['0']}}
								<br/>
								{{$order_details_data['1']}}
								<br/>
								{{$order_details_data['2']}}
								<br/>
								
							</td>
							<td valign="top" style="border-bottom: 1px solid #ddd;padding:5px; ">
								1
							</td>	
							<td valign="top" style="border-bottom: 1px solid #ddd;padding:5px; text-align: right; ">
								AUD {{str_replace("Price:","",$order_details_data['3'])}}
							</td>									
						</tr>



						<tr>
							<td colspan="2" style="border-bottom: 1px solid #ddd;padding:5px; " >
								&nbsp;
							</td>
							<td style="border-bottom: 1px solid #ddd;padding:5px; "><strong>Price</strong></td>
							<td style="border-bottom: 1px solid #ddd;padding:5px; text-align: right;">
								AUD {{str_replace("Price:","",$order_details_data['3'])}}
							</td>
						</tr>

					@endforeach

				@endif	

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