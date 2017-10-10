@extends('web::layout.web_master')

@section('content')

<div class="col-md-12">
	@include('web::layout.web_sidemenu')
	<div class="col-md-9 col-sm-12 col-xs-12 row-right-0">

		<div class="inner_banner margin-top-50 margin-bottom-50">
			<img src="{{URL::to('')}}/web/images/inner-banner.png">
		</div>

		<div class="general-page-header">
				Customer reviews
		</div>

		@if($errors->any())
		    <ul class="alert alert-danger">
		        @foreach($errors->all() as $error)
		            <li>{{ $error }}</li>
		        @endforeach
		    </ul>
		@endif

		<div class="row">

			<div class="customer_reviews_section">
				<button type="button" class="btn btn-primary reviewbutton" data-toggle="modal" data-target=".bs-example-modal-sm">Add Reviews</button>

					<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
					  <div class="modal-dialog">

					    <div class="modal-content">
					    	{!! Form::open(['route' => 'customerreviews-store','files'=>'true']) !!}
					    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
						     <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						        <h4 class="modal-title" id="gridSystemModalLabel"></h4>
						      </div>

						      <div class="modal-body">
						      		

						      			<div class="form-group">
								            {!! Form::label('name', 'Your Name:', ['class' => 'control-label']) !!}
								            <small class="required">(Required)</small>
								            {!! Form::text('name', null, ['id'=>'name', 'class' => 'form-control','required']) !!}
								        </div>

								        <div class="form-group">
								            {!! Form::label('location', 'Location:', ['class' => 'control-label']) !!}
								            <small class="required">(Required)</small>
								            {!! Form::text('location', null, ['id'=>'location', 'class' => 'form-control','required']) !!}
								        </div>

								        <div class="form-group">
									        {!! Form::label('message', 'Your Comment', ['class' => 'control-label']) !!}
									        {!! Form::textarea('message', null, ['id'=>'message', 'class' => 'form-control', 'cols'=>'30' , 'rows'=>'5']) !!}
									    </div>

						      		
						      </div>

						      <div class="modal-footer">
						        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						        {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
						      </div>

						    {!! Form::close() !!}
					    </div>
					  </div>
					</div>

					<div class="all_reviews_container">

						@if(!empty($all_customer_reviews))
							@foreach($all_customer_reviews as $customer_reviews)
								<div class="customer_reviews">
									<div class="customer_left">
										<div class="customer_name">{{$customer_reviews->name}}</div>
										<div class="customer_location">{{$customer_reviews->location}}</div>
										<div class="customer_reviews_date">
											<?php
												echo date("dS F Y h:m A", strtotime("$customer_reviews->created_at")); // gives 201101
											?>
											
										</div>
									</div>

									<div class="customer_right">
										
										<div class="comment"><span class="quation">"</span> <span class="desc">{{$customer_reviews->message}}</span> <span class="quation">"</span></div>
									</div>
								</div>
							@endforeach
						@endif
					</div>
			</div>
		</div>

	</div>
</div>
@stop