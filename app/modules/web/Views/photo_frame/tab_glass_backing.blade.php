<div id="tab-glass-and-backing" class="card card-tab-content" data-tab-name="Glass & Backing" style="display:none;">
		<div id="glass-type-row" class="row">
			<div class="col-lg-6">
				<h3 class="card-title">Glass</h3>
				<fieldset id="glass-type">

					@if(!empty($glass_backing_data))
						
						@foreach($glass_backing_data as $glass_backing)

							@if($glass_backing->type == 'glass')

								<label class="material-radio" data-glass-type="{{$glass_backing->slug}}">
									<input type="radio" name="glass-type" value="{{$glass_backing->slug}}" <?=$glass_backing->slug=='clear-glass'?'checked':'';?> data-calc-product/>
									<span class="outer"><span class="inner"></span></span>
									{{$glass_backing->title}}
								</label>

							@endif


						@endforeach
					@endif

					</fieldset>
			</div>
			<div class="col-lg-6">
				<div id="extra-info">

					@if(!empty($glass_backing_data))
						<?php
							$count = 1;
						?>
						@foreach($glass_backing_data as $glass_backing)

							@if($glass_backing->type == 'glass')

								<div class="glass-info" data-info-id="{{$glass_backing->slug}}">
									{!! $glass_backing->description !!}
								</div>

							@endif

							<?php $count++; ?>

						@endforeach
					@endif
					
					
				</div>
			</div>
		</div>
		<div id="backing-type-row" class="row">
			<div class="col-lg-6">
				<h3 class="card-title">Backing</h3>
				<fieldset id="backing-type">

				@if(!empty($glass_backing_data))
					<?php
						$count = 1;
					?>
					@foreach($glass_backing_data as $glass_backing)

						@if($glass_backing->type == 'backing')

							<label class="material-radio" data-backing-type="{{$glass_backing->slug}}">
								<input <?= $count=='1'?'checked':'' ?> type="radio" name="backing-type" value="{{$glass_backing->slug}}" data-calc-product/>
								<span class="outer"><span class="inner"></span></span>
								{{$glass_backing->title}}
							</label>

						@endif

						<?php $count++; ?>

					@endforeach
				@endif
				  
				</fieldset>
			</div>
			<div class="col-lg-6">
				
				@if(!empty($glass_backing_data))
					<?php
						$count = 1;
					?>
					@foreach($glass_backing_data as $glass_backing)

						@if($glass_backing->type == 'backing')

							<div class="backing-info" data-info-id="{{$glass_backing->slug}}">
								{!! $glass_backing->description !!}
							</div>

						@endif

						<?php $count++; ?>

					@endforeach
				@endif


				
				

			</div>
		</div>
		<a class="prev-button btn btn-primary text-center" href="#">
			<i class="fa fa-chevron-left" aria-hidden="true"></i> </a>
		<a class="next-button btn btn-primary text-center " href="#"><i class="fa fa-chevron-right" aria-hidden="true"></i>
		</a>
	</div>