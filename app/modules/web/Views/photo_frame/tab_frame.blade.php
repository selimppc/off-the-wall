<div id="tab-frames" class="card card-tab-content" data-tab-name="Frames">
	<div class="row">
		<h3 class="card-title col-xs-6">Select a frame</h3>
		<div class="col-xs-6" id="frame-filter-inputs">
			<div class="hidden btn-group col-xs-12 col-md-6 col-md-push-0 col-lg-push-1">
				<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span id="current-filter-type">Filter by Code</span> <span class="caret"></span></button>
				<ul class="dropdown-menu">
					<li><a href="#" data-frame-filter data-filter-type="Filter by Code" data-filter-target="#frame-code-filter">Code</a></li>
					<li role="separator" class="divider"></li>
					<li><a href="#" data-frame-filter data-filter-type="Filter by Rate" data-filter-target="#frame-rate-list">Rate</a></li>
				</ul>
			</div>
			<div id="filter-input-box-group">
				<!-- <input type="text" placeholder="Enter Code" id="frame-code-filter" data-filter-input/> -->
				<select name="frame-rate-list" id="frame-rate-list" data-filter-input style="display:none;">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
					<option value="12">12</option>
					<option value="13">13</option>
					<option value="14">14</option>
					<option value="15">15</option>
					<option value="16">16</option>
					<option value="20">20</option>
				</select>
			</div>
		</div>
	</div>
	<div id="frame-category-tabs">
		<ul class="card-tab-list" id="frame-category-tab-list">
			@if(!empty($frame_category))
				@foreach($frame_category as $category)
					<li>
						<a href="#frame-tab-{{$category->title}}">{{$category->title}}</a>
					</li>
				@endforeach
			@endif
		</ul>
		<div class="row" id="float-frame-warning" style="display:none;">
			<div class="col-xs-12">
				<div class="alert material-alert-warning">
					<p>These frames are for framing a canvas only. By selecting one of these frames, <strong>your mat,
							slip, fillet, image, and glass option will be removed!</strong></p>
				</div>
			</div>
		</div>

		@if(!empty($frame_category))
			@foreach($frame_category as $category)

				<div id="frame-tab-{{$category->title}}" class="frame-selection-container" style="display:none">

					@if(!empty($category->relFrame))

						@foreach($category->relFrame as $frame)

							<div class="frame-thumb-container" data-frame-code="{{$frame->frame_code}}" data-frame-id="331" data-frame-material="{{$category->title}}" data-frame-width="{{$frame->frame_width}}" data-frame-depth="{{$frame->frame_depth}}" data-frame-rebate="{{$frame->frame_rebate}}" data-frame-rate="{{$frame->frame_rate}}" data-frame-min="{{$frame->frame_min}}" data-frame-max="{{$frame->frame_max}}" data-frame-desc="{{$frame->frame_code}}" data-frame-tile="{{$frame->thumb_link}}" data-frame-description="">
							<img src="{{$frame->image_link}}" alt="{{$frame->frame_code}}" class="frame-thumb-image"/>
							<div class="tag-container"><span class="frame-nametag">{{$frame->frame_code}}</span> <span class="frame-widthtag">{{$frame->frame_width}}cm</span> <span class="frame-ratetag">{{$frame->frame_rate}}</span></div>
						</div>

						@endforeach

						

					@endif

					
					
				</div>

			@endforeach
		@endif	
		
		
	</div>
	<div class="alert alert-danger alert-closable col-xs-12 dimension-alerts" role="alert" id="larger-than-max-error" style="display:none; padding-top:5px;">
		<button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		The selected frame can only support a maximum length of <span style="font-weight:bold;" id="max-frame-length-error">92</span> cm. Please choose a different frame or adjust the <a href="#tab-dimensions">size</a>.
	</div>
	<div class="alert alert-danger alert-closable col-xs-12 dimension-alerts" role="alert" id="larger-than-max-error" style="display:none; padding-top:5px;">
		<button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<span>The selected frame (including matboard) can only support a maximum length of <span style="font-weight:bold;" id="max-frame-length-error">999</span> cm</span>
		<p>Your current selection's size : <span id="error-current-selection-size"></span></p>
	</div>
	<div style="display: none;" id="frame-details-panel" class="panel-heading toggle-collapse" role="button" data-toggle="collapse" href="#frame-details" aria-expanded="true"><span class="panel-title"><i class="fa fa-list"></i> <span class="hidden-xs">Frame </span>Details </span>
		<span class="panel-title pull-right"><i style="margin-left: 5px;" id="frame-details-icon" class="toggle-icon fa fa-minus"></i></span></div>
	<!-- <label style="padding-top: 5px;" class="pull-right"><input type="checkbox" id="hide-unstable-frames" checked> Hide Unsuitable Frames</label> -->
	<div class="panel-body collapse in table-clean flat-input row" id="frame-details">
		<table class="table table-hover table-condensed" id="frame-details-table">
			<tbody>
				<tr>
					<td class="detail-key"> Code</td>
					<td class="detail-value" id="frame-detail-code"></td>
					<td></td>
				</tr>
				<tr>
					<td class="detail-key"> Width</td>
					<td class="detail-value" id="frame-detail-width"></td>
					<td></td>
				</tr>
				<tr>
					<td class="detail-key"> Depth</td>
					<td class="detail-value" id="frame-detail-depth"></td>
					<td></td>
				</tr>
				<tr>
					<td class="detail-key"> Rebate</td>
					<td class="detail-value" id="frame-detail-rebate"></td>
					<td></td>
				</tr>
				<tr>
					<td class="detail-key">Colour</td>
					<td class="detail-value" id="frame-detail-colour"></td>
					<td></td>
				</tr>
				<tr>
					<td class="detail-key">Material</td>
					<td class="detail-value" id="frame-detail-material"></td>
					<td></td>
				</tr>
				<tr>
					<td class="detail-key">Extra Info</td>
					<td class="detail-value" id="frame-detail-description"></td>
					<td></td>
				</tr>
			</tbody>
		</table>
	</div>
	<a class="prev-button btn btn-primary text-center disabled" href="#"> <i class="fa fa-chevron-left" aria-hidden="true"></i> </a> <a class="next-button btn btn-primary text-center" href="#"><i class="fa fa-chevron-right" aria-hidden="true"></i> </a></div>