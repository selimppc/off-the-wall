@extends('web::layout.web_master')

@section('content')
	<div class="col-md-12">
		@include('web::layout.web_sidemenu')
		
		<div class="col-md-9 col-sm-12 col-xs-12 row-right-0 padding-left-0-m" style="position: relative;">
			<div class="inner_banner margin-top-20 padding-left-0-m margin-top-10-m margin-bottom-10-m  margin-bottom-30">
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