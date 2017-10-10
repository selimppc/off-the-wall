@extends('web::layout.web_master')
@section('content')

<div class="col-md-12">
	@include('web::layout.web_sidemenu')

	<div class="col-md-9 col-sm-12 col-xs-12 row-right-0 padding-left-0-m">
		<div class="application_container margin-top-30">
			<div class="border-top-2 border-bottom-2">
				<div class="header">
					Custom Framing
				</div>								
			</div>

			<div id="dvApp" class="margin-top-30 margin-bottom-30">

					<div id="appFrame">
						<form role="form" class='row'>
							<div class="form-group col-md-4">
							     <div class="input-group">
								      <div class="input-group-addon">Width</div>
								      <input type="text" class="form-control" id="imgWidth" placeholder="Enter width">
								      <div class="input-group-addon">cm</div>
								 </div>
							</div>
							<div class="form-group col-md-4">
							    <div class="input-group">
							      <div class="input-group-addon">Height</div>
							      <input type="text" class="form-control" id="imgHeight" placeholder="Enter height">
							      <div class="input-group-addon">cm</div>
							    </div>
							</div>
							<a class="btn btn-default" id="btnImgSize">Submit</a>
						</form>
						<canvas id="imgCanvas" style="display:none;"></canvas>
					</div>

			</div>
		</div>
	</div>

</div>
<a href="{{Url::to('')}}" id="site_url">&nbsp;</a>
<script type="text/javascript">
	/*---js for photo_size.html----*/
	function cmToPixel(cm){
		return (cm*28.35).toFixed(2);
	}

	$(document).ready(function(){
		document.getElementById("btnImgSize").addEventListener("click",function(){
			console.log('hi its worked');
			var width = $('#imgWidth').val();
			var height = $('#imgHeight').val();
			var canvas = document.getElementById('imgCanvas');
			var ctx=canvas.getContext("2d");

			canvas.width = +cmToPixel(width);
			canvas.height = +cmToPixel(height);
			ctx.fillStyle="#FFFFFF";
			ctx.fillRect(1,1,canvas.width-2,canvas.height-2);
			ctx.stroke(); 

			var site_url = $('#site_url').attr("href");

			var photo = canvas.toDataURL('image/jpeg', 1.0);// $('#appFrame img')[0].currentSrc;                
				$.ajax({
				  method: 'POST',
				  url: site_url+'/apps/photo_upload',
				  data: {_token: '{!! csrf_token() !!}', photo: photo
				  },
				  success:function(data){
				  		// console.log(data);
						window.location.href = "frame_photo";
					}
				});
		});
	});
	</script>

@stop