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
	
		<div class="col-md-9 col-sm-12 col-xs-12 row-right-0 padding-left-0-m">
			<div class="inner_banner margin-top-20 padding-left-0-m margin-top-10-m margin-bottom-10-m  margin-bottom-30">
				@if(!empty($data->featured_image))
					<img src="<?=$data->featured_image?>">
				@else
					<img src="{{URL::to('')}}/web/images/inner-banner.png">
				@endif
				
			</div>
		
			<div class="general-page-header">
				{{$data->title}}
			</div>

			<div class="row">

				<div class="general-page-description">
					<?php
						if(!empty($data->desc)){
							echo $data->desc;
						}else{
							echo 'No content yet.';
						}
					?>
				</div>
				
			</div>
		</div>
	</div>
@stop