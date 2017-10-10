@extends('web::layout.web_master')
@section('content')

<div class="col-md-12">
	@include('web::layout.web_sidemenu')

	<div class="col-md-9 col-sm-12 col-xs-12 row-right-0 padding-left-0-m">
		<div class="application_container margin-top-30">
			<div class="border-top-2 border-bottom-2">
				<div class="header">
					PHOTO upload
				</div>								
			</div>

			<div class="row margin-top-30 margin-bottom-30">
				{!! Form::open(['route' => 'apps-photos-store','files'=>'true']) !!}
                  
                 
						<div id="appFrame">

							<div class="col-md-6">
								
									<div class="form-group">
									     <div class="input-group" style="margin:auto;">
											<span class="btn btn-default btn-file">
											    Browse Photo <input name="image" type="file" onchange="previewFile()" required>
											</span>	
											<input style="background: #ff7722;border-color: #ff7722;color: #fff;margin-left: 20px;" type="submit" id="btnImgUpload" value="Upload" class="btn btn-default submit" />									    
										 </div>
									</div>

									<div class="form-group nb-text margin-top-30">
										<p>N.B: If you want to better performance, please check below instruction.
											<br/><br/>
											Maximam Image size is below 2M
										    <br/>
										    Maximum width is 1000px
										    <br/>
										    Maximum height is 1000px
									</div>
									
								
							</div>

							<div class="col-md-6" style="text-align:center;">
								<img id='preview' src="{{URL::to('')}}/web/images/preview.jpg" height="200" alt="Image preview...">
								<div id="message"></div>
							</div>
						</div>
						
					

                {!! Form::close() !!}
			</div>

		</div>
	</div>

</div>

<script type="text/javascript">
	/*---js for photo_size.html----*/
	 function previewFile(){
       var preview = document.querySelector('#preview'); //selects the query named img
       var file    = document.querySelector('input[type=file]').files[0]; //sames as here

       var imagefile = file.type;
		var match= ["image/jpeg","image/png","image/jpg"];

		if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
			$('#preview').attr('src','images/noimage.png');
			$("#message").html("<p id='error'>Please Select A valid Image File</p>"+"<h4 style=\"color : #fff;\">Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
			return false;
		}else{
	       var reader  = new FileReader();
	       $("#message").empty();
	       reader.onloadend = function () {
	           preview.src = reader.result;
	       }

	       if (file) {
	           reader.readAsDataURL(file); //reads the data as a URL
	       } else {
	           preview.src = "";
	       }
	    }
  }
</script>
@stop