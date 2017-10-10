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
								<th>Mirror Size</th>
								<th>Frame</th>	
								<th>Backing</th>							
								<th>Quantity</th>
								<th class="text-right">Frame Price</th>
								<th class="text-right">Backing Price</th>
								<th class="text-right">Mirror Price</th>
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
											{{$order_details_data['0']}}<br/>
											{{$order_details_data['1']}}
										</td>
										<td>
											{{str_replace("Frame Code:","",$order_details_data['4'])}}
										</td>
										<td>
											{{str_replace("Backing Type:","",$order_details_data['6'])}}
										</td>
										<td>
											1
										</td>
										<td class="text-right">
											{{str_replace("Frame Price:","",$order_details_data['5'])}}
										</td>
										<td class="text-right">
											AU {{str_replace("Backing Type Price:","",$order_details_data['7'])}}
										</td>
										<td class="text-right">
											AU
											<?php
												$total_price = str_replace("Total Price:","",$order_details_data['2']);

												$frame_price = str_replace("Frame Price: AU","",$order_details_data['5']);

												$backing_price = str_replace("Backing Type Price:","",$order_details_data['7']);

												echo $total_price - ($frame_price + $backing_price);
											?>
										</td>
										<td class="text-right">
											AU {{str_replace("Total Price:","",$order_details_data['2'])}}
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