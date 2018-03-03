<div id="order-step-tabs" class="row">
  <div class="clearfix">
    <div class="clearfix">
      <div class="offtwl__ss clearfix">
        <div class="first-step-overlay"></div>
        <ul class="offtwl__cardbox-tab-list vertical-tabs dark-tabs" id="list-of-tabs">
          <li>
            <a href="#offtwl__frames-tab">Frames</a>
          </li>
          <li>
            <a href="#offtwl__mats-tab">Mats</a>
          </li>
          <li>
            <a href="#offtwl__glass-and-backing-tab">Glass
              & Backing
            </a>
          </li>
          <li>
            <a href="#offtwl__print-info-tab">Printing</a>
          </li>
          <!--		<li><a id="show-more-tabs" href="#" title="Show more framing options (Slips and Fillets)">+</a></li>-->
          <!--		<li><a href="#tab-slips"><span class="hidden-sm hidden-xs tab-number">6. </span>Slips</a></li>-->
        </ul>
        <div class="clearfix bg-white">
          <div class="col-xs-12">
            @include('web::custom_photo_frame.tab_frame')
            @include('web::custom_photo_frame.tab_mats')
            @include('web::custom_photo_frame.tab_printing')

            <div id="offtwl__glass-and-backing-tab" class="offtwl__cardbox offtwl__cardbox-tab-content" data-tab-name="Glass & Backing" style="display:none;">
              <div id="glass-type-row" class="row">
                <div class="col-lg-6">
                  <h3 class="offtwl__cardbox-title">Glass</h3>
                  <fieldset id="glass-type">

                    @if(!empty($glass_backing_data))
            
                      @foreach($glass_backing_data as $glass_backing)

                        @if($glass_backing->type == 'glass')

                          <label class="mtd-radio" data-glass-type="{{$glass_backing->slug}}">
                            <input type="radio" name="glass-type" value="{{$glass_backing->slug}}" <?=$glass_backing->slug=='clear-glass'?'checked':'';?> data-offtwl__calculation-item/>
                            <span class="offtwl__outer-el"><span class="inner"></span></span>
                            {{$glass_backing->title}}
                          </label>

                        @endif


                      @endforeach
                    @endif
                  </fieldset>
                </div>
                <div class="col-lg-6">
                  <div id="offtwl__extra-notes-2">

                    @if(!empty($glass_backing_data))
                      <?php
                        $count = 1;
                      ?>
                      @foreach($glass_backing_data as $glass_backing)

                        @if($glass_backing->type == 'glass')

                          <div class="offtwl__glass-notes" data-info-id="{{$glass_backing->slug}}">
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
                  <h3 class="offtwl__cardbox-title">Backing</h3>
                  <fieldset id="backing-type">

                    @if(!empty($glass_backing_data))
                      <?php
                        $backing_count = 1;
                      ?>
                      @foreach($glass_backing_data as $glass_backing)

                        @if($glass_backing->type == 'backing')

                          <label class="mtd-radio" data-backing-type="{{$glass_backing->slug}}">
                            <input <?= $backing_count=='1'?'checked':'' ?> type="radio" name="backing-type" value="{{$glass_backing->slug}}" data-offtwl__calculation-item/>
                            <span class="offtwl__outer-el"><span class="inner"></span></span>
                            {{$glass_backing->title}}
                          </label>

                          <?php $backing_count++; ?>

                        @endif

                        

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
                <i class="fa fa-chevron-left" aria-hidden="true"></i></a>
              <a class="next-button btn btn-primary text-center " href="#">
                <i class="fa fa-chevron-right" aria-hidden="true"></i>
              </a>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>