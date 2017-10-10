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
						<div class="step-text active">
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
						<div class="step-text">
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
			</div>

			<div class="login_box_container">
					
					<div class="col-md-12">
						@if(Session::has('flash_message_error'))
			                <div class="alert alert-success">
			                    <p>Email already presents</p>
			                </div>
			            @endif

						{!! Form::open(['route' => 'customer-billing-detail']) !!}
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="col-md-6">

							<div class="form-group">
								<label>First Name</label>
								{!! Form::text('first_name', '', ['id'=>'first_name', 'class' => 'form-control','required']) !!}
							</div>
							
							<div class="form-group">
								<label>Last Name</label>
								{!! Form::text('last_name', '', ['id'=>'last_name', 'class' => 'form-control','required']) !!}
							</div>

							<div class="form-group">
								<label>Email Address</label>
								{!! Form::email('email', '', ['id'=>'email', 'class' => 'form-control','required']) !!}
							</div>
							
							<div class="form-group">
								<label>Telephone</label>
								{!! Form::text('telephone', '', ['id'=>'telephone', 'class' => 'form-control','required']) !!}
							</div>

							<div class="form-group">
								<label>Country</label>
								{!! Form::Select('country',array('Australia'=>'Australia'),Input::old('country'),['class'=>'form-control ','required']) !!}
							</div>
							
							
						</div>

						<div class="col-md-6">
							
							
							<div class="form-group">
								<label>Address</label>
								{!! Form::textarea('address', '', ['id'=>'address', 'class' => 'form-control', 'cols'=>'15' , 'rows'=>'4']) !!}
							</div>


							<div class="form-group">
								<label>Suburb</label>
								{!! Form::text('suburb', '', ['id'=>'suburb', 'class' => 'form-control','required']) !!}
							</div>

							<div class="form-group">
								<label>Post code</label>
								{!! Form::text('postcode', '', ['id'=>'post_code', 'class' => 'form-control','required']) !!}
							</div>
							<div class="form-group">
								<label>State</label>
								{!! Form::Select('state',array('ACT'=>'ACT','NSW' => 'NSW',
										'VIC' => 'VIC','QLD' => 'QLD','SA'=>'SA','WA' => 'WA','TAS' => 'TAS','NT'=>'NT'),Input::old('state'),['class'=>'form-control ','required']) !!}
								
							</div>
							

							

							<div class="form-group">
								<input type="submit" class="form-control login_btn" name="submit" value="Submit">
							</div>
						</div>
					{!! Form::close() !!}
				
			</div>


		</div>


	</div>

@stop