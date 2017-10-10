<div id="order-step-tabs" class="row">
	<div class="first-step-overlay"></div>
	<ul class="card-tab-list" id="list-of-tabs">
		<li><a href="#tab-frames"><span class="hidden-sm hidden-xs tab-number">2. </span>Frames</a></li>
		<li><a href="#tab-mats"><span class="hidden-sm hidden-xs tab-number">3. </span>Mats</a></li>
		<li><a href="#tab-glass-and-backing"><span class="hidden-sm hidden-xs tab-number">4. </span>Glass
				& Backing</a></li>
		<li><a href="#tab-printing"><span class="hidden-sm hidden-xs tab-number">5. </span>Printing</a></li>
		
	</ul>
	
	@include('web::photo_frame.tab_frame')
	@include('web::photo_frame.tab_mats')
	@include('web::photo_frame.tab_printing')
	@include('web::photo_frame.tab_canvas_matt')
	@include('web::photo_frame.tab_glass_backing')


	
	
</div>