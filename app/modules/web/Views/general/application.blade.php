@extends('web::layout.web_master')
@section('content')

<div class="col-md-12">
	@include('web::layout.web_sidemenu')

	<div class="col-md-9 col-sm-12 col-xs-12 row-right-0 padding-left-0-m">
		<div class="application_container margin-top-30">
			<div class="border-top-2 border-bottom-2">
				<div class="header">
					PHOTO FRAMING APPLICATION
				</div>								
			</div>

			<div class="row margin-top-30 margin-bottom-30">

				<div class="col-md-6 margin-top-30">
						
					<a class="photo_frame" href="{{URL::to('')}}/apps/photo-upload">
						<img src="{{URL::to('')}}/web/images/preview.jpg">
						<p>Please upload your desired photo which you set into the frame </p>
					</a>

				</div>

				<div class="col-md-6 margin-top-30">

					<a class="photo_frame" href="{{URL::to('')}}/apps/custom-size">
						<img src="{{URL::to('')}}/web/images/preview.jpg">
						<p>From this section you can choose your custom frame size </p>
					</a>

				</div>

			</div>

		</div>
	</div>

</div>

@stop