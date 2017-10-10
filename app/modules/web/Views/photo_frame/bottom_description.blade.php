<div class="container-fluid col-xs-10 col-xs-push-1 bottom-description" id="text-content-container">
	<ul class="nav nav-tabs" role="tablist">
		<li role="presentation" class="active"><a href="#product-description-tab" aria-controls="product-description-tab" role="tab" data-toggle="tab">Product Description</a></li>
		<li role="presentation"><a href="#faq-tab" aria-controls="faq-tab" role="tab" data-toggle="tab">How to Order</a></li>
		<li role="presentation"><a href="#shipping-tab" aria-controls="shipping-tab" role="tab" data-toggle="tab">Shipping & Returns</a></li>
	</ul>
	<div class="tab-content">
		<div style="color: #000;" role="tabpanel" class="tab-pane fade in active" id="product-description-tab">
			
			@if(!empty($product_description))
				{!! $product_description->desc !!}
			@endif
			
		</div>
		<div style="color: #000;" role="tabpanel" class="tab-pane fade" id="faq-tab">
			
			@if(!empty($how_to_order))
				{!! $how_to_order->desc !!}
			@endif

		</div>
		<div style="color: #000;" role="tabpanel" class="tab-pane fade" id="shipping-tab">
			
			@if(!empty($shipping_rule))
				{!! $shipping_rule->desc !!}
			@endif
			
		</div>
	</div>
</div>

