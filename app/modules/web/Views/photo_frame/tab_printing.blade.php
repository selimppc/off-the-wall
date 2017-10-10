<div id="tab-printing" class="card card-tab-content" data-tab-name="Printing" style="display:none;">
	<div id="paper-type-row" class="row">
		<div class="col-lg-6">
			<h3 class="card-title">Paper</h3>
			<fieldset id="paper-type">

				@if(!empty($printing_data))
					@foreach($printing_data as $printing)

						@if($printing->type == 'option')

							<label class="material-radio" data-paper-type="{{$printing->slug}}">
								<input type="radio" name="printing-type" value="{{$printing->slug}}" data-calc-product/>
								<span class="outer"><span class="inner"></span></span>
								{{$printing->title}}
							</label>

						@endif

					@endforeach				
				@endif
				
				
				<label class="material-radio" data-paper-type="none">
					<input type="radio" name="printing-type" value="none" checked="checked" data-calc-product/>
					<span class="outer"><span class="inner"></span></span>
					No printing/Preview only <i class="fa fa-ban"></i> </label>
			</fieldset>
		</div>
		<div class="col-lg-6">
			<div id="extra-info">

				@if(!empty($printing_data))
					@foreach($printing_data as $printing)
						@if($printing->type == 'option')

							<div class="printing-info" data-info-id="{{$printing->slug}}">
								{!! $printing->description !!}
							</div>

						@endif
					@endforeach
				@endif
				
				
				<div class="printing-info" data-info-id="none">
					<ul class='list-group'>
						<div style="margin-top: 30px;" class="col-xs-12 text-center" id="upload-2">

							<div title="Print and frame your images or just preview them! (Optional)" class="button upload-button">
								
								<i class="fa fa-upload"></i>
								<span class="upload-text"><span style="display: block;">Upload Image</span>(Optional)</span>
								
								<input type="file" id="upload-input-2"  class="upload-input-inside-btn">
							</div>
							<div class="image-details" style="display:none">
								<span class="col-xs-12" id="image-summary-name"></span>
								<span class="btn btn-default remove-image" data-calc-product> <i class="fa fa-trash-o"></i><span>  Remove Image</span></span>
							</div>
						</div>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-xs-12">
			<ul class='list-group'>
				<li class='list-group-item'>
					<h4>Printer Information</h4>
				</li>
				<li class='list-group-item'><span>
					@if(!empty($printing_data))
					@foreach($printing_data as $printing)
						@if($printing->type == 'information')
							{!! $printing->description !!}
						@endif
					@endforeach
					@endif</span></li>
			</ul>
		</div>
	</div>
	<a class="prev-button btn btn-primary text-center" href="#"> <i class="fa fa-chevron-left" aria-hidden="true"></i>
	</a>
	<a class="next-button btn btn-primary text-center" href="#"><i class="fa fa-chevron-right" aria-hidden="true"></i>
	</a>
</div>