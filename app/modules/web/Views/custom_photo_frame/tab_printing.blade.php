<div id="offtwl__print-info-tab" class="offtwl__cardbox offtwl__cardbox-tab-content" data-tab-name="Printing" style="display:none;">
  <div id="offtwl__type-paper-row" class="row">
    <div class="col-lg-6">
      <div class="clearfix">
        <h3 class="offtwl__cardbox-title">Paper</h3>
        <fieldset id="offtwl__type-paper">
          
          @if(!empty($printing_data))
            @foreach($printing_data as $printing)

              @if($printing->type == 'option')

                <label class="mtd-radio" data-paper-type="{{$printing->slug}}">
                  <input type="radio" name="printing-type" value="{{$printing->slug}}" data-offtwl__calculation-item/>
                  <span class="offtwl__outer-el"><span class="inner"></span></span>
                  {{$printing->title}}
                </label>

              @endif

            @endforeach       
          @endif

          <label class="mtd-radio" data-paper-type="none">
            <input type="radio" name="printing-type" value="none" checked="checked" data-offtwl__calculation-item/>
            <span class="offtwl__outer-el"><span class="inner"></span></span>
            No printing/Preview only <i class="fa fa-ban"></i> </label>
        </fieldset>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="clearfix">
        <div id="offtwl__extra-notes">
          

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

          </div>
        </div>
      </div>
    </div>
   
  </div>
  <a class="prev-button btn btn-primary text-center" href="#"><i class="fa fa-chevron-left" aria-hidden="true"></i>
  </a>
  <a class="next-button btn btn-primary text-center disabled" href="#">
    <i class="fa fa-chevron-right" aria-hidden="true"></i>
  </a>
  
</div>