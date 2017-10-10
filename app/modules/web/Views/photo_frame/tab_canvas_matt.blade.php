<div id="tab-mats" class="card card-tab-content container-fluid" data-tab-name="Mats" style="display:none;">
	<h3 class="card-title">Mat Boards</h3> <label for="number-of-mats">
		<label class="material-radio number-of-mats-radio">
			<input type="radio" name="number-of-mats" value="1" data-calc-product/>
			<span class="outer"><span class="inner"></span></span>
			Single
		</label> <label class="material-radio number-of-mats-radio">
			<input type="radio" name="number-of-mats" value="2" data-calc-product/>
			<span class="outer"><span class="inner"></span></span>
			Double
		</label> <label class="material-radio number-of-mats-radio">
			<input type="radio" name="number-of-mats" value="0" checked="checked" data-calc-product/>
			<span class="outer"><span class="inner"></span></span>
			None
		</label> </label>
	<form name="matboard-form" id="matboard-form">

		<h4 class="mt-20 mb-0">Top Mats</h4>

		<fieldset id="fieldset-matboard-1" disabled class="mtb-20">
			<fieldset id="fieldset-for-uniform">
				<label for="matboard-width-uniform" class="material-radio" data-width-type="uniform" id="uniform-label">
					<input type="radio" name="matboard-width-type" value="uniform" id="matboard-width-uniform" checked="checked" data-calc-product data-redraw/>
					<span class="outer"><span class="inner"></span></span>
					Uniform Width
				</label> <label for="uniform-width">
					<span class="inline-block"> <input type="number" min="2.5" max="20" step="0.1" id="uniform-width" value="5.1" class="inch-cm" data-cm-min="2.5" data-cm-max="20" data-inch-min="1" data-inch-max="8" data-cm-step="0.1" data-inch-step="0.1" data-redraw data-calc-product/> <span class="inch-cm" data-type="unit-label">cm</span> </span>
				</label>
			</fieldset>
			<fieldset name="matboard-variable" class="mat-width-type" id="fieldset-variable">
				<label for="matboard-width-variable" class="material-radio" data-width-type="variable" id="variable-label">
					<input type="radio" name="matboard-width-type" value="variable" id="matboard-width-variable" data-redraw data-calc-product/>
					<span class="outer"><span class="inner"></span></span>
					Custom Width
				</label>
				<fieldset class="text-center inline-block" id="variable-width" disabled><label for="dimensions-top">Top:<br/>
						<input type="number" id="dimensions-top" value="5.1" min="2.5" max="20" step="0.1" class="inch-cm" data-cm-min="2.5" data-cm-max="20" data-inch-min="1" data-inch-max="8" data-cm-step="0.1" data-inch-step="0.25" data-redraw data-calc-product/>
					</label> <label for="dimensions-left">Left:<br/>
						<input type="number" id="dimensions-left" value="5.1" min="2.5" max="20" step="0.1" class="inch-cm" data-cm-min="2.5" data-cm-max="20" data-inch-min="1" data-inch-max="8" data-cm-step="0.1" data-inch-step="0.25" data-redraw data-calc-product/>
					</label> <label for="dimensions-right">Right:<br/>
						<input type="number" id="dimensions-right" value="5.1" min="2.5" max="20" step="0.1" class="inch-cm" data-cm-min="2.5" data-cm-max="20" data-inch-min="1" data-inch-max="8" data-cm-step="0.1" data-inch-step="0.25" data-redraw data-calc-product/>
					</label> <label for="dimensions-bottom">Bottom:<br/>
						<input type="number" id="dimensions-bottom" value="5.1" min="2.5" max="20" step="0.1" class="inch-cm" data-cm-min="2.5" data-cm-max="20" data-inch-min="1" data-inch-max="8" data-cm-step="0.1" data-inch-step="0.1" data-redraw data-calc-product/>
						<span class="inch-cm" data-type="unit-label">cm</span> </label></fieldset>
			</fieldset>
		</fieldset>
		<div class="matboard-grid" data-mat-object="mat1">

			@if(!empty($mat_data))
				@foreach($mat_data as $mat)

					<div class="matboard-square" style="background-color:#{{$mat->color}}" data-name="{{$mat->name}}" data-code="{{$mat->code}}" data-mat-id="40" data-color-code="{{$mat->color}}" data-mat-object="mat1" data-slider-value="1" data-selected="false" title="{{$mat->name}}"></div>

				@endforeach
			@endif
			
		</div>
		<p class="alert alert-danger" id="mat1-dimensions-invalid">
			<span class="glyphicon glyphicon-remove"></span> The matboard size you have selected exceeds the <strong>maximum
				size</strong> of our available mats.
		</p>
		<fieldset id="fieldset-matboard-2" style="display:none;">
			<hr class="mtb-20">
			<h4>Bottom Mats</h4>
			<fieldset class="mat-width-type mt-20 mb-10" id="fieldset-matboard-2"><label for="matboard-2-width">
					Width:
					<input type="number" min="0.5" max="20" step="0.1" id="matboard-2-width" value="0.5" class="inch-cm" data-cm-min="0.5" data-cm-max="20" data-inch-min="0.2" data-inch-max="8" data-cm-step="0.1" data-inch-step="0.25" data-redraw data-calc-product/>
				</label> <span class="inch-cm" data-type="unit-label">cm</span>
			</fieldset>
			<div class="matboard-grid" data-mat-object="mat2">
				
				@if(!empty($mat_data))
					@foreach($mat_data as $mat)

						<div class="matboard-square" style="background-color:#{{$mat->color}}" data-name="{{$mat->name}}" data-code="{{$mat->code}}" data-mat-id="40" data-color-code="{{$mat->color}}" data-mat-object="mat2" data-slider-value="2" data-selected="false" title="{{$mat->name}}"></div>

					@endforeach
				@endif

			</div>
			<p class="error-message" id="mat1-dimensions-invalid"></p>

		</fieldset>
	</form>
	<a class="prev-button btn btn-primary text-center" href="#"> <i class="fa fa-chevron-left" aria-hidden="true"></i>
	</a>
	<a class="next-button btn btn-primary text-center" href="#"><i class="fa fa-chevron-right" aria-hidden="true"></i>
	</a></div>