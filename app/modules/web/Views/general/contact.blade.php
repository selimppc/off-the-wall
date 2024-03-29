@extends('web::layout.web_master')

@section('content')
	<div class="col-md-12">
		@include('web::layout.web_sidemenu')
		    	
		<div class="col-md-9 col-sm-12 col-xs-12 row-right-0 padding-left-0-m" >
			<div class="inner_banner margin-top-20 padding-left-0-m margin-top-10-m margin-bottom-10-m margin-bottom-30" style="position: relative;">
				@if(!empty($data->featured_image))
					<img src="<?=$data->featured_image?>">
				@else
					<img src="{{URL::to('')}}/web/images/inner-banner.png">
				@endif

				@include('web::layout.web_app_link')
			</div>
		
			<div class="general-page-header">
				{{$data->title}}
			</div>

			<div class="row">

				<div class="general-page-description">

					<div class="col-md-6">
						<div class="row">

							<?php
								if(!empty($data->desc)){
									echo $data->desc;
								}else{
									echo 'No content yet.';
								}
							?>

						</div>
					</div>

					<div class="col-md-6">

						{!! Form::open(['route' => 'contactsubmit','class' => 'contact-form']) !!}

							<div class="form-group">
								<label>Name</label>
								{!! Form::text('name', null, ['id'=>'name', 'class' => '','required']) !!}
							</div>
							<div class="form-group">
								<label>Email</label>
								{!! Form::email('email', null, ['id'=>'email', 'class' => '','required']) !!}
							</div>
							<div class="form-group">
								<label>Phone</label>
								{!! Form::text('phone', null, ['id'=>'phone', 'class' => '','required']) !!}
							</div>
							<div class="form-group">
								<label>Subject</label>
								{!! Form::text('subject', null, ['id'=>'subject', 'class' => '','required']) !!}
							</div>
							<div class="form-group">
								<label>Message</label>
								{!! Form::textarea('message', null, ['id'=>'message', 'class' => '','required']) !!}
							</div>
							
							<div class="form-group">
								<input type="submit" name="submit" value="Send" class="submitbtn">
							</div>
							
							<div class="form-group">
								
								@if(Session::has('flash_message_success'))
									<div class="btn btn-success pull-right" style="width:100%;">
										{!!Session::get('flash_message_success')!!}
									</div>
								@endif
								
								@if(Session::has('flash_message_error'))
									<div class="btn btn-danger pull-right" style="width:100%;">
										{!!Session::get('flash_message_error')!!}
									</div>
								@endif
							</div>
								
						{!! Form::close() !!}

					</div>
					

					<div class="col-md-12">
						<div class="row">

							<div id="map"></div>
					    	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBehGXKGJPBWLju8rBtkt-BWgUTfFGSb9Y&callback=initMap"
					        async defer></script>

					    </div>
					</div>

					<style>
				      #map {
				        width: 100%;
				        height: 300px;
				      }
				    </style>

				    <script>
					  function initMap() {
					    var mapDiv = document.getElementById('map');

					    var uluru = {lat: -33.949607, lng: 151.139075};
					    var map = new google.maps.Map(mapDiv, {
					      center: {lat: -33.949607, lng: 151.139075},
					      zoom: 20,
					      center: uluru
					    });
					    var marker = new google.maps.Marker({
				          position: uluru,
				          map: map,
				          
				          title: '425 Princess Highway, Rockdale NSW 2216'
				        });
					  }
					</script>
				</div>
				
			</div>
		</div>
	</div>
@stop
