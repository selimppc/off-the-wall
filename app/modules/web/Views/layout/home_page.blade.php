@extends('web::layout.web_master')

@section('content')

<div style="position: absolute;top: 6%;z-index: 99999;right: 5%;    background: rgba(255,255,255,.5);padding: 15px 15px 20px 15px;">
<h1 style="color: #444;text-transform: uppercase;font-size: 16px;
    font-weight: 700;text-align: center;margin: 0;font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;letter-spacing: .5px;">Start Customising</h1>
<a href="{{URL::to('')}}/custom-picture-frame" style="color: #fff;
    font-size: 12px;background: #018b8d;padding: 10px 30px;
    border-radius: 5px;box-shadow: 1px 10px 5px #888888;
    text-decoration: none;text-transform: uppercase; margin-top: 10px;
    display: inline-block;letter-spacing: .5px;" class="customize-your-photo-frame">
Custom Picture Framing
</a>
</div>

<div class="col-md-12">
	<div class="row">
		<div class="home-banner margin-top-30">
			<div class="camera_wrap camera_azure_skin" id="camera_wrap_1">

				@if(!empty($slider_data))
					@foreach($slider_data as $slider)

						<div data-src="{{URL::to('/')}}/{{$slider->image}}">
			                <div class="camera_caption fadeFromBottom">
			                   {{$slider->name}}
			                </div>
			            </div>

					@endforeach
				@endif
	            
	        </div><!-- #camera_wrap_1 -->
		</div>
	</div>
</div>
	
<div class="col-md-12">
	<div class="margin-top-30 mobile-menu-480">
		@include('web::layout.web_sidemenu')
	</div>

	<div class="col-md-9 col-sm-12 col-xs-12 row-right-0 padding-left-0-m margin-top-10-m">
		<div class="border-top-2 border-bottom-2">
			<div class="header">
				Featured Products
			</div>								
		</div>

		<div class="row">

			@if(!empty($featured_product_data))
				@foreach($featured_product_data as $featured_product)

					<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
						<a href="{{URL::to('')}}/{{$featured_product->slug}}" class="featured_product_a">
							<div class="product-listing-image">
								<img src="{{URL::to('/')}}/{{$featured_product->thumb}}">
							</div>

							<div class="product-listing-bottom">
								<div class="product-name">
									{{$featured_product->title}}
								</div>
								<div class="product-price">
										AUD {{$featured_product->sell_rate}}
								</div>
							</div>
						</a>
						<a class="product-listing-buy-now-button" href="{{URL::to('')}}/{{$featured_product->slug}}">Buy Now</a>
					</div>



				@endforeach
			@endif

		</div>
	</div>
</div>

<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
	<div class="row">
		<div class="home-text-container home-text-bg">
			<div class="col-md-3 col-sm-12 col-xs-12 row-left-0">
				<div class="home-header">
					<span>OFF THE WALL</span><br /><br />
					Latest & interactive mirrors shop in sydney.
				</div>
			</div>

			<div class="col-md-9 col-sm-12 col-xs-12">
				<div class="home-body-text">
					<?php
						echo $data->desc;
					?>
				</div>
			</div>
		</div>
	</div>
</div>

						
<script type='text/javascript' src="{{ URL::asset('web/scripts/jquery.mobile.customized.min.js') }}"></script> 
<script type='text/javascript' src="{{ URL::asset('web/scripts/jquery.easing.1.3.js') }}"></script> 
<script type='text/javascript' src="{{ URL::asset('web/scripts/camera.js') }}"></script> 

 <script>
	jQuery(function(){
		
		jQuery('#camera_wrap_1').camera({
			thumbnails: false,
			pagination:false,
			playPause: false
		});

		

	});

</script>
							
@stop