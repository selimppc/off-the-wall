@extends('web::layout.web_master')
@section('content')

<link href="{{ URL::asset('web/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" media="all"/>

<link href="{{ URL::asset('web/css/spectrum.css') }}" rel="stylesheet" type="text/css" media="all" />
<link href="{{ URL::asset('web/css/photo_frame.css') }}" rel="stylesheet" type="text/css" media="all" />

<script type="text/javascript" src="{{ URL::asset('web/js/vendor/fabric.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('web/js/vendor/darkroom.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('web/js/vendor/spectrum.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('web/js/app.js') }}"></script>

<div class="col-md-12">
	
	<div id="photo_frame_leftd" class="col-md-3 col-sm-12 col-xs-12 row-left-0 margin-top-10-m margin-bottom-10-m padding-right-0-m margin-top-30">

		<div class="border-top-2-resp border-bottom-2-resp">
			<div class="header">
				<span>Specification</span>
			</div>		

			<div class="home-product-list left-sidebar">
				<div class="panel-group" id="accordion">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								Original Picture Size
							</h4>
						</div>
						<div class="panel-collapse collapse in">
							<div class="panel-body">
								<ul>
									<li>
										<a href="#"><span id="photo_width"></span>cm &times; <span id="photo_height"></span>cm</a>
									</li>
								</ul>
							</div>
						</div>
					</div>

					<div class="panel panel-default margin-top-30">
						<div class="panel-heading">
							<h4 class="panel-title">
								Framed Size
							</h4>
						</div>
						<div class="panel-collapse collapse in">
							<div class="panel-body">
								<ul>
									<li>
										<a href="#">
											<span id="frame_width"></span>cm &times; <span id="frame_height"></span>cm
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>

					<div class="panel panel-default margin-top-30">
						<div class="panel-heading">
							<h4 class="panel-title">
								Frame Code
							</h4>
						</div>
						<div class="panel-collapse collapse in">
							<div class="panel-body">
								<ul>
									<li>
										<a href="#">
											<span id="frame_code"></span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>

					<div class="panel panel-default margin-top-30">
						<div class="panel-heading">
							<h4 class="panel-title">
								Mats Width
							</h4>
						</div>
						<div class="panel-collapse collapse in">
							<div class="panel-body">
								<ul>
									<li>
										<a href="#">
											<span id="mats_width"></span>cm
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>

					<div class="panel panel-default margin-top-30">
						<div class="panel-heading">
							<h4 class="panel-title">
								Mats Color
							</h4>
						</div>
						<div class="panel-collapse collapse in">
							<div class="panel-body">
								<ul>
									<li>
										<a href="#">
											<span id="mats_color">
								Top:<span id="mats_color">
													<input class='show-color sp-disabled' disabled="disabled" type='color' name='color' value='#ffffff' />
												&nbsp;
												Bottom:
													<input class='show-color sp-disabled' disabled="disabled" type='color' name='color' value='#ffffff' />
												</span>
							
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>

	</div>

	<div class="col-md-9 col-sm-12 col-xs-12 row-right-0 padding-left-0-m">
		<div class="application_container margin-top-30">
			<div class="border-top-2 border-bottom-2">
				<div class="header">
					Photo Frame
				</div>								
			</div>

			<div class='col-md-12 col-sm-12 col-xs-12 margin-top-30' id="dvApp" style="" >
				<div id="appFrame" class="row ">
					<!-- <img src="temImages/Tackett_Hallowee.jpg" id="target" style="height: 2000px"> -->
					<div id="app-window">
						
						<div id="frame-window">
							<div id="image-window">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<img id="imageString" src="{{URL::to('')}}/web/images/photo_string.png">
								</div>
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div id="framed-image">

										<?php
											session_start();
										?>
										
										<img id='originalImage' src="{{URL::to('')}}/web/photos/{{$_SESSION['modify_img']}}" >
										
										
											
										
									</div>
								</div>
							</div>
							<div id="image-frame"></div>
						</div>
						
						<div class="col-lg-2 col-md-2 col-sm-2" id = "zoom">
							<div id="zoom-in">
								<i class='fa-lg fa fa-search-plus'></i>
							</div>
							<div id="zoom-out">
								<i class=' fa-lg fa fa-search-minus'></i>
							</div>
						</div>
					</div>

					<div  class="col-lg-12 col-md-12 col-sm-12" id="app-index">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<!-- Trigger the modal with a button -->
							<button type="button" id="roomViewButton" class="btn btn-info btn-sm" data-toggle="modal" data-target="#roomView" style="    float: right;
    margin-top: 10px;">Room View</button>

							<!-- Modal -->
							<div id="roomView" class="modal fade" role="dialog">
									  <div class="modal-dialog">

									    <!-- Modal content-->
									    <div class="modal-content">
									      <div class="modal-header">
									        <button type="button" class="close" data-dismiss="modal">&times;</button>
									        <h4 class="modal-title">Room View</h4>
									      </div>
									      <div class="modal-body row">
									        <div class="col-lg-12 col-md-12 col-sm-12" id="wall">
									        	<div id="frameCanvas"></div>
									        	<div id="photoZoom">
									        		<input type='range' min='50' max='150' value='70' class="rangeZoom"></input>
									        	</div>
									        </div>
									        <div class="col-lg-12 col-md-12 col-sm-12" id="wall-index"></div>
									      </div>
									      
									    </div>

									  </div>
									</div>
							<!-- <div class="container"> -->
								<ul class="nav nav-tabs" id="index-tab" style="margin-top: 10px">
								  <li class="active"><a data-target="#index-frames" data-toggle="tab">Frame</a></li>
								  <li><a data-target="#index-mats" data-toggle="tab">Mats</a></li>
								  <li><a data-target="#index-color" data-toggle="tab">Wall Color</a></li>
								  <!-- <li><a href="#">Menu 3</a></li> -->
								</ul>


								<div class="tab-container">
									<div id="index-frames" class='tab-pane active'>
										<div class="row">
											<div class="col-lg-3 tab-bar"></div>
											<div class="col-lg-9 tab-bar tab-bar-left"></div>
										</div>
									</div>
									
									<div id="index-mats" class='tab-pane'>
										
										<div class = "col-lg-4 col-md-4 col-sm-2 tab-bar">
												<form class="form-inline" style='padding-top:15px'>
													<div class="form-group">
													  <label for="mats-width-bottom">Top:</label>
													  <select class="form-control" id="mats-width-bottom">
														<option value="0">0 cm</option>
														<option value="0.5">0.5 cm</option>
														<option value="1">1 cm</option>
														<option value='1.5'>1.5 cm</option>
														<option value='2'>2 cm</option>
														<option value='2.5'>2.5 cm</option>
														<option value="3">3 cm</option>
														<option value='3.5'>3.5 cm</option>
														<option value='4'>4 cm</option>
														<option value='4.5'>4.5 cm</option>
														<option value='5'>5 cm</option>
														<option value='5.5'>5.5 cm</option>
														<option value="6">6 cm</option>
														<option value="6.5">6.5 cm</option>
														<option value="7">7 cm</option>
														<option value='7.5'>7.5 cm</option>
														<option value='8'>8 cm</option>
														<option value='8.5'>8.5 cm</option>
														<option value="9">9 cm</option>
														<option value='9.5'>9.5 cm</option>
														<option value='10'>10 cm</option>
														<option value='10.5'>10.5 cm</option>
														<option value='11'>11 cm</option>
													  </select>
													   <input type="radio" id="bottomMat"name="mats" value="bottom" checked="checked"> 
													   <span id="bottom_mat_color">
															<input class='bottom-color sp-disabled' disabled="disabled" type='color' name='color' value='#ffffff' />
														</span>									
													</div>
													<br><br>
													<div class="form-group">
													  <label for="mats-width-top">Bottom:</label>
													  <select class="form-control" id="mats-width-top">
														<option value="0">0 cm</option>
														<option value="0.5">0.5 cm</option>
														<option value="1">1 cm</option>
														<option value='1.5'>1.5 cm</option>
														<option value='2'>2 cm</option>
														<option value='2.5'>2.5 cm</option>
														<option value="3">3 cm</option>
														<option value='3.5'>3.5 cm</option>
														<option value='4'>4 cm</option>
														<option value='4.5'>4.5 cm</option>
														<option value='5'>5 cm</option>
														<option value='5.5'>5.5 cm</option>
														<option value="6">6 cm</option>
														<option value="6.5">6.5 cm</option>
														<option value="7">7 cm</option>
														<option value='7.5'>7.5 cm</option>
														<option value='8'>8 cm</option>
														<option value='8.5'>8.5 cm</option>
														<option value="9">9 cm</option>
														<option value='9.5'>9.5 cm</option>
														<option value='10'>10 cm</option>
														<option value='10.5'>10.5 cm</option>
														<option value='11'>11 cm</option>
													  </select>
													   <input type="radio" id="topMat" name="mats" value="top"> 
													   <span id="top_mat_color">
															<input class='top-color sp-disabled' disabled="disabled" type='color' name='color' value='#ffffff' />
														</span>									
													   </div>
												</form>
											</div>
											<div class = "col-lg-8 col-md-8 col-sm-10 tab-bar" >
												<input type='text' id="matColor"/>
											</div>
											
									</div>
								
								<div id="index-color" class='tab-pane tab-bar'>
									<input type="text" id="wallColor"> 
								</div>
							<!-- </div> -->
						</div>
					</div>
				</div>
				
			</div>


			
		</div>
	</div>

</div>

<style type="text/css">
.modal-dialog{
	width: 70%;
}
</style>
@stop