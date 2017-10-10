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
						<div class="step-text ">
							<div class="header">Step 4</div>
							<div class="your-basket">check order</div>
						</div>
					</div>

					<div class="step">
						<div class="step_images">
							<img src="{{URL::to('')}}/web/images/step5.png">
						</div>
						<div class="step-text active">
							<div class="header">Step 5</div>
							<div class="your-basket">secure payment</div>
						</div>
					</div>

				</div>
			</div>

			<div class="cart-item-container">

				<div class="thankyou-message">
					<p style="color: #ff7722;font-size: 20px;text-align: center;margin-top: 50px;">Congratulations your order have been successfully sent.</p>	
				</div>
			</div>
		</div>

</div>

@stop