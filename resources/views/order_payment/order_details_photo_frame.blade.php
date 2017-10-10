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
								<th>Image Size</th>
								<th>Frame</th>
								<th>Mat</th>
								<th>Glass & Backing</th>
								<th>Printing</th>
								<th>Quantity</th>
								<th>Total Price</th>
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
											<img style="width: 88px;display: inline-block;" src="{{$orderdetails->image_link}}"><br/>
											<a style="color: #018b8d;    font-weight: 700;" target="_blank" href="{{$orderdetails->image_link}}">Download Image</a>
											<br/><br/>
											{{$order_details_data['0']}} cm<br/>
											{{$order_details_data['1']}} cm
										</td>

										<td>	
											{{$order_details_data['8']}}
											<br/>
											{{$order_details_data['9']}}
											<br/>
											{{$order_details_data['10']}}
											<br/>
											{{$order_details_data['11']}}
											<br/>
											{{$order_details_data['12']}}
											<br/>
											{{$order_details_data['13']}}
											<br/>
											{{$order_details_data['14']}}
											<br/>
											{{$order_details_data['15']}}
											<!-- <br/>
											{{$order_details_data['37']}} -->
										</td>
										<td>
										
											{{$order_details_data['18']}}
											<br/>
											{{$order_details_data['19']}}
											<br/>
											{{$order_details_data['20']}}
											<br/>
											{{$order_details_data['21']}}
											<br/>
											{{$order_details_data['22']}}
											<br/>
											{{$order_details_data['23']}}
											<br/>
											{{$order_details_data['24']}}
											<!-- <br/>
											{{$order_details_data['25']}} -->
											<br/><br/>

											{{$order_details_data['26']}}
											<br/>
											{{$order_details_data['27']}}
											<br/>
											{{$order_details_data['28']}}
											<br/>
											{{$order_details_data['29']}}
											<br/>
											{{$order_details_data['30']}}
											<br/>
											{{$order_details_data['31']}}
											<br/>
											{{$order_details_data['32']}}
											<!-- <br/>
											{{$order_details_data['33']}} -->

										</td>
										<td>			
											{{$order_details_data['38']}}
											<br/>
											{{$order_details_data['39']}}
										</td>
										<td>			
											{{$order_details_data['2']}}
										</td>
										<td>			
											{{$order_details_data['40']}}
										</td>
										<td class="text-right">			
											AUD {{$order_details_data['34']}}
										</td>
									</tr>

									<tr>
										<td colspan="5" >
											&nbsp;
										</td>
										<td class="text-right"><strong>Discunt</strong></td>
										<td class="text-right">AUD {{$order_details_data['35']}}</td>
									</tr>

									<tr>
										<td colspan="5" >
											&nbsp;
										</td>
										<td class="text-right"><strong>Price</strong></td>
										<td class="text-right">AUD {{$order_details_data['36']}}</td>
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