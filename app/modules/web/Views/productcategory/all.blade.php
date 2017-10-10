@extends('web::layout.web_master')

@section('content')

<div class="col-md-12">
	@include('web::layout.web_sidemenu')
	
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

	<div class="col-md-9 col-sm-12 col-xs-12 row-right-0">
		<div class="inner_banner margin-top-20 margin-top-10-m margin-bottom-10-m margin-bottom-20">


			@if(!empty($product_subgroup->image))
				<img src="{{URL::to('')}}/{{$product_subgroup->image}}">
			@else
				<img src="{{URL::to('')}}/web/images/inner-banner.png">
			@endif
			
		</div>
	</div>

	<div class="col-md-9 col-sm-12 col-xs-12 row-right-0 ">
		<div class="width100 floatleft border-top-2 border-bottom-2">
			<div class="product-listing-header">
				<h2>{{$product_subgroup->title}}</h2>
				@if(!empty($product_subgroup->short_desc))
					<div class="short_descsription">
						{{$product_subgroup->short_desc}}
					</div>
				@endif
			</div>
		</div>

		<div class="row">
			@if(!empty($productdata))
				@foreach($productdata as $product)
					<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
						<a href="{{URL::to('/')}}/{{$product->slug}}" class="featured_product_a">
							<div class="product-listing-image">
								<img src="{{URL::to('/')}}/{{$product->thumb}}">
							</div>

							<div class="product-listing-bottom">
								<div class="product-name">
									{{$product->title}}
								</div>
								<div class="product-price">
									AUD {{$product->sell_rate}}
								</div>
							</div>
						</a>
						<a class="product-listing-buy-now-button" href="{{URL::to('/')}}/{{$product->slug}}">Buy Now</a>
					</div>
				@endforeach
			@else
				<div class="no_product">No product yet</div>
			@endif
		</div>
	</div>
</div>
@stop