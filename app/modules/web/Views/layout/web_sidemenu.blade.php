<div id="all_prods_cont" class="col-md-3 col-sm-12 col-xs-12 row-left-0 margin-top-10-m margin-bottom-10-m padding-right-0-m">
	<div class="border-top-2-resp border-bottom-2-resp">
			<div class="header">
				<span>All Product</span>
			</div>
			<span class="mobile_menu open_mobile_menu">=</span>
									
	</div>

	<div id="home_product_list" class="home-product-list left-sidebar">
		

		<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
		 
			

			<?php
				$product_page_type = DB::table('page_parent')->whereNotIn('id',['3'])->orderBy('sort_order','asc')->get();
			?>
			@if(!empty($product_page_type))
				@foreach($product_page_type as $product_page)
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingOne">
					      <h4 class="panel-title">
					        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#product_page_{{$product_page->id}}" aria-expanded="true" aria-controls="collapseOne">
					          {{$product_page->title}}
					        </a>
					      </h4>
					    </div>

					    <div id="product_page_{{$product_page->id}}" class="panel-collapse collapse <?php if(Request::segment(1) ==$product_page->slug ){echo 'in';}?>" role="tabpanel" aria-labelledby="headingOne">
		      				<div class="panel-body">
		      					<?php
		      						$sub_child_pages = DB::table('article')->where('status','active')->where('type',$product_page->id)->Where('sub_page_id',NULL)->get();
		      					?>
		      					@if(!empty($sub_child_pages))
		      						<ul>
		      							@foreach($sub_child_pages as $sub_child)
		      								<li>
		      									<a href="{{URL::to('')}}/{{$product_page->slug}}/{{$sub_child->slug}}" >
		      										{{$sub_child->title}}
		      									</a>
		      								</li>
		      							@endforeach
		      						</ul>
		      					@endif
		      				</div>
		      			</div>
					</div>
				@endforeach
			@endif


			<?php
				$product_group_data = DB::table('groups')->where('status','active')->orderBy('sortorder','asc')->get();
				$count = 1;
			?>

			@if(!empty($product_group_data))
				@foreach($product_group_data as $productgrop)
					<div class="panel panel-default <?php if($productgrop->id == '11'){echo 'special';} ?>">
						<div class="panel-heading" role="tab" id="headingOne">
							<h4 class="panel-title">
						        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#product_group_{{$productgrop->id}}" aria-expanded="true" aria-controls="collapseOne">
						          {{$productgrop->title}}
						        </a>
						    </h4>
						</div>

						<div id="product_group_{{$productgrop->id}}" class="panel-collapse collapse <?php if(Request::segment(1) ==$productgrop->slug ){echo 'in';}?>" role="tabpanel" aria-labelledby="headingOne">
							<div class="panel-body">
								
								<?php
									$product_subgroup_data = DB::table('product_subgroup')->where('status','active')->where('product_group_id',$productgrop->id)->orderBy('sort_order','asc')->get();
								?>								
								@if(!empty($product_subgroup_data))
										<ul>
											@foreach($product_subgroup_data as $product_subgroup)
												<li>
													<a href="{{URL::to('')}}/{{$productgrop->slug}}/{{$product_subgroup->slug}}">{{$product_subgroup->title}}</a>
												</li>
											@endforeach
										</ul>
									@endif	
								
							</div>
						</div>
					</div>
					<?php $count++;?>
				@endforeach
			@endif
		 
			<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingOne">
					<h4 class="panel-title">
				        <a role="button" href="{{URL::to('')}}/customer-reviews">
				         Customer reviews
				        </a>
				    </h4>
				</div>
			</div>
			
			<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingOne">
					<h4 class="panel-title">
				        <a style="font-size:15px;" role="button" href="http://mithun.visionads.com.au/otw/public/apps">
				         upload & customise your own
				        </a>
				    </h4>
				</div>
			</div>

		</div>
		
	</div>
	
</div>

<script>
	$(".mobile_menu").click(function(){
	    $("#home_product_list").toggle();
	});
</script>