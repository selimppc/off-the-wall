<div class="row" id="tools-row">
	<div id="tab-dimensions" class="card card-tab-content container-fluid" data-tab-name="Size">
		<div class="row">
			<div class="col-xs-12">
				<h3 class="card-title"><span class="hidden-sm hidden-xs tab-number">1. </span>Image Size</h3>
				<div id="dimensions-unit-selection">
					<fieldset id="unit-choice-radio">
						<label for="unit-cm" class="material-radio">
							<input name="unit-type" id="unit-cm" value="cm" checked="checked" type="radio">
							<span class="outer"><span class="inner"></span></span>
							cm
						</label>
						
					</fieldset>
				</div>
			</div>
		</div>
		<div class="row" style="margin-top: 20px;">
			<div class="col-xs-12 col-sm-6">
				<div class="modal fade active" id="rebateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div style="max-width: 600px;" class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span></button>
								<!-- <h4 class="modal-title" id="myModalLabel">Size Guide</h4> -->
							</div>
							<img style="width: 100%;" class="modal-content" id="img01" src="{{URL::to('')}}/web/photo_frame/static/images/Rebate.jpg">
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
				<form>
					<div class="row">
						<fieldset><input type="hidden" id="image-ratio" data-is-locked="false" value="0.015">
							<div class="col-xs-12" id="dimensions-input-wrapper">
								<div class="dimensions-container"><label for="dimensions-width">Width</label>
									<div class="input-group">
										<input type="number" id="dimensions-width" value="10.2" min="10" max="152.5" step="0.1" class="inch-cm" data-cm-min="10" data-cm-max="152.5" data-redraw data-calc-product data-for="width"/>
									</div>
								</div>
								<div id="multiply-dimensions-sign">X</div>
								<div class="dimensions-container"><label for="dimensions-height">Height</label>
									<div class="input-group">
										<input type="number" id="dimensions-height" value="15.2" min="10" max="152.5" step="0.1" class="inch-cm" data-cm-min="10" data-cm-max="152.5" data-inch-min="4" data-inch-max="60" data-cm-step="0.1" data-inch-step="0.25" data-redraw data-calc-product data-for="height"/>
										&nbsp;
										<span class="inch-cm dimensions-unit-addon" data-type="unit-label">cm</span>
									</div>
								</div>
								<div class="preset-size-container visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block">
									<select name="Preset Size" id="preset-size-list">
										<option value="-">Standard Sizes</option>

										@if(!empty($data))
											@foreach($data as $values)

												<option value="{{$values->value}}" data-value="{{$values->value}}" data-width-inch="{{$values->width_inch}}" data-height-inch="{{$values->height_inch}}" data-width-cm="{{$values->width_cm}}" data-height-cm="{{$values->height_cm}}">{{$values->title}}
										</option>

											@endforeach
										@endif

										
										
									</select>
									<i class="fa fa-unlock ratio-lock hidden-xs hidden-sm" aria-hidden="true" title="Ratio is unlocked, you can enter any size."></i>
									<i class="fa fa-lock ratio-lock hidden hidden-xs hidden-sm" aria-hidden="true" title="Size ratio is now locked to your uploaded image's dimensions. To unlock the ratio, select 'Remove Image'"></i>
									
								</div>
							</div>
						</fieldset>
					</div>
				</form>
			</div>
			<div class="col-xs-12 col-sm-6">
				<hr class="visible-xs">
				<form id="upload">
					<div class="row">
						<div class="col-xs-12">
<!--							<button title="Print and frame your images or just preview them! (Optional)" type="button" data-toggle="modal" data-target="#upload-image-modal" class="button upload-button">-->
							<div title="Print and frame your images or just preview them! (Optional)" class="button upload-button">
<!--								<a href="#!" style="text-decoration:none; display: inline !important;">-->
									<i class="fa fa-upload"></i>
									<span id="upload-text"><span style="display: block;">Upload Image</span>(Optional)</span>
<!--								</a>-->
								<input type="file" id="upload-input-1"  class="upload-input-inside-btn">
							</div>
							<!-- <div id="upload-info-alert" style="text-align:center; padding: 5px !important;" class="alert alert-info" role="alert">Print or preview your images. (Optional)
							</div> -->
							<div class="image-details" style="display:none">
<!--								<span class="col-xs-12" id="image-summary-name"></span>-->
								<span class="btn btn-default remove-image" data-calc-product> <i class="fa fa-trash-o"></i><span>  Remove Image</span></span>
							</div>
							<div class="print-quality-container" style="display:none;">
								<h5 style="display: inline-block;">Printing Quality</h5>
								<button style="display:block; cursor: pointer; float: right; padding: 2px 4px; margin-top: 7px;" type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-trigger="click" data-placement="bottom" data-content="This tool checks your uploaded image and estimates the printing quality at the size you've entered.
                             We recommend aiming for 'Good' or better, however we'll still be able to print your images regardless of the quality listed here.
                             Please note that this is an estimate and may not be indicative of the final quality.
                             You're always welcome to contact us to check your images for you.">
									<i class="fa fa-question-circle" style="padding: 0; font-size: 2rem;"></i></button>
								<div class="progress">
									<div id="print-quality-progress" class="progress-bar progress-bar-info progress-bar-striped" style="width: 100%">
										<span id="print-quality-text">No Image Detected</span></div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="alert alert-danger alert-closable col-xs-12 dimension-alerts" role="alert" id="dimension-warning" style="display: none; margin-top: 5px;">
			<button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<p>The size entered including mats or slips should be within the following dimensions:</p>
			<span>Min : <strong class="inch-cm" data-type="unit-value" data-inch-value="4" data-cm-value="10">10</strong> x <strong class="inch-cm" data-type="unit-value" data-inch-value="4" data-cm-value="10">10</strong> <span class="inch-cm" data-type="unit-label">cm</span> , Max : <strong class="inch-cm" data-type="unit-value" data-inch-value="60" data-cm-value="152.5">152.5</strong> x <strong class="inch-cm" data-type="unit-value" data-inch-value="40" data-cm-value="101.5">101.5</strong> <span class="inch-cm" data-type="unit-label">cm</span></span>
		</div>
	</div>
</div>