<div class="clearfix"></div>
<div class="">
  <div class=" pt-5 bg-white">
    <div class=" container" id="offtwl__general-content-container">
      <div class="row">
        <div class="col-sm-4 col-md-3 mb-10">
          <ul class="nav nav-tabs vertical-tabs info-tabs" role="tablist">
            <li role="presentation" class="active">
              <a href="#tab-1" aria-controls="product-description-tab" role="tab" data-toggle="tab">@if(!empty($product_description))
                {!! $product_description->title !!}
              @endif</a>
            </li>
            <li role="presentation">
              <a href="#tab-2" aria-controls="faq-tab" role="tab" data-toggle="tab">
                @if(!empty($how_to_order))
                {!! $how_to_order->title !!}
              @endif
              </a>
            </li>
            <li role="presentation">
              <a href="#tab-3" aria-controls="shipping-tab" role="tab" data-toggle="tab">
                  @if(!empty($shipping_rule))
                    {!! $shipping_rule->title !!}
                  @endif
              </a>
            </li>
          </ul>
        </div>
        <div class="col-sm-8 col-md-9">
          <div class="offtwl__tab-content tab-content ">
            <div role="tabpanel" class="tab-pane fade in active" id="tab-1">
              
              @if(!empty($product_description))
                {!! $product_description->desc !!}
              @endif

            </div>
            <div role="tabpanel" class="tab-pane fade" id="tab-2">
              @if(!empty($how_to_order))
                {!! $how_to_order->desc !!}
              @endif
            </div>
            <div role="tabpanel" class="tab-pane fade" id="tab-3">
              
              @if(!empty($shipping_rule))
                {!! $shipping_rule->desc !!}
              @endif
      
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>