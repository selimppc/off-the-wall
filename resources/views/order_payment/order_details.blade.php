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
								<th>Details</th>
								<th>Qty</th>								
								<th class="text-right">Price</th>
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

									?>

									<tr>
										<td>
											@if(count($orderdetails->image_link) > 0)
												<a download="{{URL::to('')}}/{{$orderdetails->original_image_link}}" target="_blank" href="{{URL::to('')}}/{{$orderdetails->original_image_link}}">
													<img style="width: 50px; height: 50px;" src="{{URL::to('')}}/{{$orderdetails->image_link}}">
												</a>
											@else
												<img style="width: 50px; height: 50px;" src="{{URL::to('')}}/{{$product->image}}">
											@endif	

											<br/>
											<?php

												if(count($product) > 0){
													echo $product->title;
												}

												if($orderdetails->product_id == -1){
													echo 'Photo Frame';
												}

												if($orderdetails->product_id == -2){
													echo 'Canvas Print';
												}

												if($orderdetails->product_id == -3){
													echo 'Canvas Stetching Only';
												}

												if($orderdetails->product_id == -4){
													echo 'Canvas Printing Only';
												}

												if($orderdetails->product_id == -5){
													echo 'Plain mirror';
												}
											?>

										</td>


										<td>

											<?php
												// Photo Frame
												if($orderdetails->product_id == -1){
													$order_details_data = explode("===",$orderdetails->details);

													echo isset($order_details_data['0'])?$order_details_data['0'] .' , ':'';
													echo isset($order_details_data['1'])?$order_details_data['1'] .' , ':'';
													
													echo isset($order_details_data['14'])?$order_details_data['14'].' , ':''; 
													echo isset($order_details_data['15'])?$order_details_data['15'].' , ':'';

													// mat data show
													echo isset($order_details_data['18'])?str_replace("Mat 1","Top Mat",$order_details_data['18']).' , ':''; 
													echo isset($order_details_data['19'])?$order_details_data['19'].' , ':'';
													echo isset($order_details_data['20'])?$order_details_data['20'].' , ':'';
													echo isset($order_details_data['21'])?$order_details_data['21'].' , ':'';
													echo isset($order_details_data['22'])?$order_details_data['22'].' , ':'';
													echo isset($order_details_data['23'])?$order_details_data['23'].' , ':'';
													echo isset($order_details_data['26'])?str_replace("Mat 2","Bottom Mat",$order_details_data['26']).' , ':'';
													echo isset($order_details_data['27'])?$order_details_data['27'].' , ':'';
													echo isset($order_details_data['28'])?$order_details_data['28'].' , ':'';
													echo isset($order_details_data['29'])?$order_details_data['29'].' , ':'';
													echo isset($order_details_data['30'])?$order_details_data['30'].' , ':'';
													echo isset($order_details_data['31'])?$order_details_data['31'].' , ':'';

													// glasss
													echo isset($order_details_data['38'])?$order_details_data['38'].' , ':'';

													// backing
													echo isset($order_details_data['39'])?$order_details_data['39'].' , ':'';

													// paper
													echo isset($order_details_data['2'])?$order_details_data['2'].' , ':'';



												}

												// Canvas Print
												if($orderdetails->product_id == -2){
													$order_details_data = explode("===",$orderdetails->details);

													echo isset($order_details_data['0'])?$order_details_data['0'] . ' , ':'';

													echo isset($order_details_data['1'])?$order_details_data['1'] . ' , ':'';

													echo isset($order_details_data['2'])?$order_details_data['2']:'';
												}

												// Canvas Stetching Only
												if($orderdetails->product_id == -3){
													$order_details_data = explode("===",$orderdetails->details);

														echo isset($order_details_data['0'])?$order_details_data['0']:'';

														echo isset($order_details_data['1'])?$order_details_data['1']:'';
												}

												// Canvas Printing Only
												if($orderdetails->product_id == -4){

													$order_details_data = explode("===",$orderdetails->details);

													echo isset($order_details_data['0'])?$order_details_data['0'].' , ':'';
													echo isset($order_details_data['1'])?$order_details_data['1'].' , ':'';
													echo isset($order_details_data['2'])?$order_details_data['2']:'';
												}

												// Plain mirror
												if($orderdetails->product_id == -5){
													$order_details_data = explode("===",$orderdetails->details);

													echo isset($order_details_data['0'])?$order_details_data['0'] . ' , ':'';
													echo isset($order_details_data['1'])?$order_details_data['1']. ' , ':'';
													echo isset($order_details_data['4'])?$order_details_data['4'].' , ':'';
													echo isset($order_details_data['6'])?$order_details_data['6']:'';
												}
											?>

										</td>

										<td>	
											{{$orderdetails->qty}}
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
								<td colspan="2" >
									&nbsp;
								</td>
								<td colspan="2"  class="text-right"><strong>Subtotal</strong></td>
								<td class="text-right">$ {{$total}}</td>
							</tr>

							<tr>
								<td colspan="2" >
									&nbsp;
								</td>
								<td colspan="2" class="text-right"><strong>Shipping type</strong></td>
								<td class="text-right">{{$order_data[0]->shipping_type}}</td>
							</tr>

							<tr>
								<td colspan="2" >
									&nbsp;
								</td>
								<td colspan="2" class="text-right"><strong>Shipping value</strong></td>
								<td class="text-right">$ {{$order_data[0]->shipping_value}}</td>
							</tr>
							<tr>
								<td colspan="2" >
									&nbsp;
								</td>
								<td  colspan="2"class="text-right"><strong>GST</strong></td>
								<td class="text-right">$ 0.00</td>
							</tr>
							<tr>
								<td colspan="2" >
									&nbsp;
								</td>
								<td colspan="2" class="text-right"><strong>Total</strong></td>
								<td class="text-right">$ {{$total + $order_data[0]->shipping_value}}</td>
							</tr>

						</tbody>

					</table>	

				</div>
			</div>	


	    </div>

	</div>
</div>	    



<!-- print the product -->



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