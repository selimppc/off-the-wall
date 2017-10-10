@extends('web::layout.web_master')
@section('content')

<link href="{{ URL::asset('web/css/photo_frame.css') }}" rel="stylesheet" type="text/css" media="all" />

<script type="text/javascript" src="{{ URL::asset('web/js/vendor/fabric.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('web/js/vendor/darkroom.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('web/js/vendor/spectrum.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('web/js/app.js') }}"></script>

<div class="col-md-12">
	@include('web::layout.web_sidemenu')

	<div class="col-md-9 col-sm-12 col-xs-12 row-right-0 padding-left-0-m">
		<div class="application_container margin-top-30">
			<div class="border-top-2 border-bottom-2">
				<div class="header">
					PHOTO edit
				</div>								
			</div>

			
			<div class="margin-top-30 margin-bottom-30" id="dvApp">

				<div id="appFrame">

					<div class="info">
						<form class="form-inline">
							
							 <div class="form-group form-group-sm">
							    <label class="col-lg-3 col-sm-3 control-label" for="formGroupInputWidth">Width:</label>
							    <div class="col-sm-4 ">
							    	<!-- <div class="input-group-addon">Width:</div> -->
							      <input class="form-control" type="text" id="formGroupInputWidth" placeholder="width" readonly>
							      <!-- <div class="input-group-addon">cm</div> -->
							    </div>
							</div>
						    <!-- <label class="col-sm-1 control-label" for="formGroupInputWidth">cm</label> -->
							 <div class="form-group form-group-sm">
							    <label class="col-lg-3 col-sm-3 control-label" for="formGroupInputHeight">Height:</label>
							    <div class="col-sm-4 ">
							    	<!-- <div class="input-group-addon">Height:</div> -->
							      	<input class="form-control" type="text" id="formGroupInputHeight" placeholder="Height" readonly>
							      	<!-- <div class="input-group-addon">cm</div> -->
							    </div>
							    <!-- <label class="col-sm-1 control-label" for="formGroupInputHeight">cm</label> -->
							  </div>
						</form>
					</div>
					@if(Session::has('apps_image'))
						<img src="{{URL::to('')}}/web/temImages/{{Session::get('apps_image')}}" id="target" style="height: 1000px">
					@else
						<img src="{{URL::to('')}}/web/temImages/hd-wallpapers-nature-3.jpg" id="target" style="height: 1000px">
					@endif
					
					<canvas id="imgCanvas" style="display: none;"></canvas>
					<script>
					  new Darkroom('#target');
					</script>

				</div>

			</div>

		</div>
	</div>
</div>

<div class="loading" style="display:none;color: #fff;position: absolute;    margin-left: 30%;
    top: 40%;width: 50%;text-align: center;background: #ff7722;padding: 40px;z-index: 9;">Please wait a moment.</div>

<a href="{{Url::to('')}}" id="site_url">&nbsp;</a>
<script type="text/javascript">
	
	$( window ).load(function(){
	// console.log("hiron Das");
	var flag = 0;
	var marginArray = [];

	setTimeout(function(){
		marginArray[flag]=centerElement(".canvas-container");
	}, 1000);
	// console.log(flag);
	sizeInfo(pixelToCM, ['#formGroupInputWidth', '#formGroupInputHeight']);

	$(".darkroom-button").click(function(){
		childId = $(this).children().children().attr("xlink:href");

		if(childId == "#rotate-left" || childId == "#rotate-right"){

			marginArray[++flag]=centerElementRotate(".canvas-container");
			sizeInfo(pixelToCM, ['#formGroupInputWidth', '#formGroupInputHeight'], true);

		} else if (childId == "#done"){
			var self = this;
			flag++;
			var myVar = setTimeout(function(){ 
				self.nextElementSibling.click(); 
			}, 100);	
			
		}else if (childId == "#redo"){
			++flag;
			$('.canvas-container').css({"margin-top": marginArray[flag]});
			console.log(marginArray);
			console.log(flag);
		}
		else if (childId == "#undo"){
			--flag;
			$('.canvas-container').css({"margin-top": marginArray[flag]});
			console.log(marginArray);
			console.log(flag);
		}
		else if (childId == "#crop"){

		}
		else if (childId == "#save"){
			
			$(".application_container").hide();
			$(".loading").show();
			// $('#dvApp').append
			setTimeout(function(){
				var canvas = document.getElementById('imgCanvas');
				var ctx=canvas.getContext("2d");
				var img=document.querySelector("#appFrame img");
				canvas.width  = img.width;
				canvas.height = img.height;
				ctx.drawImage(img,0,0);

				var site_url = $('#site_url').attr("href");

				var photo = canvas.toDataURL('image/jpeg', 1.0);// $('#appFrame img')[0].currentSrc;                
				$.ajax({
				  method: 'POST',
				  dataType: 'json',
				  url: site_url+'/apps/photo_upload',
				  data: {_token: '{!! csrf_token() !!}',photo: photo },
				  success:function(data){

						window.location.href = "frame_photo";
					}
				});
			}, 100);
		}
		else{

			marginArray[flag]=centerElement(".canvas-container");
			sizeInfo(pixelToCM, ['#formGroupInputWidth', '#formGroupInputHeight']);
		}

	});
});

$("#dvApp").hide();
$(".loading").show();
setTimeout(function(){
	$("#dvApp").show();
	$(".loading").hide();
}, 30000);
</script>

<style>
	
	.form-inline .form-control{
		background: transparent;
	    color: #fff;
	    border: none;
	    box-shadow: none;
	    margin-top: -5px;
	}

</style>
@stop