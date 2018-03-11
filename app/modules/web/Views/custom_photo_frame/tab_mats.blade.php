<div id="offtwl__mats-tab" class="offtwl__cardbox offtwl__cardbox-tab-content container-fluid" data-tab-name="Mats" style="display:none;">
  <div class="divis">
    <div class="divis-inner">
      <h3 class="offtwl__cardbox-title">Mat Boards</h3>
      <div data-for="offtwl__how-many-mats">

        <label class="mtd-radio offtwl__how-many-mats-radio">
          <input type="radio" name="offtwl__how-many-mats" value="0" checked="checked" data-offtwl__calculation-item/>
          <span class="offtwl__outer-el"><span class="inner"></span></span>
          None
        </label>

        <label class="mtd-radio offtwl__how-many-mats-radio">
          <input type="radio" name="offtwl__how-many-mats" value="1" data-offtwl__calculation-item/>
          <span class="offtwl__outer-el"><span class="inner"></span></span>
          Single
        </label>

        <label class="mtd-radio offtwl__how-many-mats-radio">
          <input type="radio" name="offtwl__how-many-mats" value="2" data-offtwl__calculation-item/>
          <span class="offtwl__outer-el"><span class="inner"></span></span>
          Double
        </label>
        
      </div>
    </div>
  </div>
  <form name="offtwl__form-matboard" id="offtwl__form-matboard">
    <h4 class="mt-20 mb-0">Top Mats</h4>
    <fieldset id="offtwl__field-matboard-1" disabled class="mtb-20">
      <fieldset id="offtwl__uniform-fieldset">
        <label for="offtwl__matbrd-wdt-unfrm" class="mtd-radio" data-width-type="offtwl__unifrm" id="offtwl__unifrm-label">
          <input type="radio" name="offtwl__typeof-matboard-wdt" value="offtwl__unifrm" id="offtwl__matbrd-wdt-unfrm" checked="checked" data-offtwl__calculation-item data-offtwl__redraw/>
          <span class="offtwl__outer-el"><span class="inner"></span></span>
          Uniform Width
        </label> <label for="offtwl__unifrm-width">
          <span class="inline-block"> <input type="number" min="2.5" max="20" step="0.1" id="offtwl__unifrm-width" value="5.1" class="offtwl__dmnsn-inch-cm" data-cm-min="2.5" data-cm-max="20" data-inch-min="1" data-inch-max="8" data-cm-step="0.1" data-inch-step="0.1" data-offtwl__redraw data-offtwl__calculation-item/> <span class="offtwl__dmnsn-inch-cm" data-type="offtwl__dmnsn-unit-label">cm</span> </span>
        </label>
      </fieldset>
      <fieldset name="offtwl__matboard-var" class="offtwl__mat-wdt-type" id="offtwl__fldst-var">
        <label for="offtwl__matboard-wdt-var" class="mtd-radio" data-width-type="variable" id="variable-label">
          <input type="radio" name="offtwl__typeof-matboard-wdt" value="variable" id="offtwl__matboard-wdt-var" data-offtwl__redraw data-offtwl__calculation-item/>
          <span class="offtwl__outer-el"><span class="inner"></span></span>
          Custom Width
        </label>
        <fieldset class="text-center inline-block" id="variable-width" disabled><label for="offtwl__dimnsn-top">Top:
            <br/>
            <input type="number" id="offtwl__dimnsn-top" value="5.1" min="2.5" max="20" step="0.1" class="offtwl__dmnsn-inch-cm" data-cm-min="2.5" data-cm-max="20" data-inch-min="1" data-inch-max="8" data-cm-step="0.1" data-inch-step="0.25" data-offtwl__redraw data-offtwl__calculation-item/>
          </label> <label for="offtwl__dimnsn-left">Left:
            <br/>
            <input type="number" id="offtwl__dimnsn-left" value="5.1" min="2.5" max="20" step="0.1" class="offtwl__dmnsn-inch-cm" data-cm-min="2.5" data-cm-max="20" data-inch-min="1" data-inch-max="8" data-cm-step="0.1" data-inch-step="0.25" data-offtwl__redraw data-offtwl__calculation-item/>
          </label> <label for="offtwl__dimnsn-right">Right:
            <br/>
            <input type="number" id="offtwl__dimnsn-right" value="5.1" min="2.5" max="20" step="0.1" class="offtwl__dmnsn-inch-cm" data-cm-min="2.5" data-cm-max="20" data-inch-min="1" data-inch-max="8" data-cm-step="0.1" data-inch-step="0.25" data-offtwl__redraw data-offtwl__calculation-item/>
          </label> <label for="offtwl__dimnsn-bottom">Bottom:
            <br/>
            <input type="number" id="offtwl__dimnsn-bottom" value="5.1" min="2.5" max="20" step="0.1" class="offtwl__dmnsn-inch-cm" data-cm-min="2.5" data-cm-max="20" data-inch-min="1" data-inch-max="8" data-cm-step="0.1" data-inch-step="0.1" data-offtwl__redraw data-offtwl__calculation-item/>
            <span class="offtwl__dmnsn-inch-cm" data-type="offtwl__dmnsn-unit-label">cm</span>
          </label></fieldset>
      </fieldset>
    </fieldset>
    <div class="offtwl__matboard-item-wrapper clearfix" data-offtwl__mat-obj="mat1">
      
      @if(!empty($mat_data))
        @foreach($mat_data as $mat)

          <div class="offtwl__matboard-sqr" style="background-color:#{{$mat->color}}" data-name="{{$mat->name}}" data-code="{{$mat->code}}" data-color-code="{{$mat->color}}" data-offtwl__mat-obj="mat1" data-slider-value="1" data-selected="false" title="{{$mat->name}}"></div>

        @endforeach
      @endif

      
    </div>
    <div class="alert alert-danger" id="offtwl__mat1-dimnsn-not-valid">
      <span class="glyphicon glyphicon-remove"></span>
      The matboard size you have selected exceeds the
      <strong>maximum
        size
      </strong>
      of our available mats.
    </div>
    <fieldset id="fieldset-matboard-2" style="display:none;">
      <hr class="mtb-20">
      <h4>Bottom Mats</h4>
      <fieldset class="offtwl__mat-wdt-type mt-20 mtb-10"><label for="offtwl__matboard-2-wdt">
          Width:
          <input type="number" min="0.5" max="20" step="0.1" id="offtwl__matboard-2-wdt" value="0.5" class="offtwl__dmnsn-inch-cm" data-cm-min="0.5" data-cm-max="20" data-inch-min="0.2" data-inch-max="8" data-cm-step="0.1" data-inch-step="0.25" data-offtwl__redraw data-offtwl__calculation-item/>
          <span class="offtwl__dmnsn-inch-cm" data-type="offtwl__dmnsn-unit-label">cm</span>
        </label>
      </fieldset>
      <div class="offtwl__matboard-item-wrapper clearfix" data-offtwl__mat-obj="mat2">

        @if(!empty($mat_data))
          @foreach($mat_data as $mat)

            <div class="offtwl__matboard-sqr" style="background-color:#{{$mat->color}}" data-name="{{$mat->name}}" data-code="{{$mat->code}}" data-color-code="{{$mat->color}}" data-offtwl__mat-obj="mat2" data-slider-value="1" data-selected="false" title="{{$mat->name}}"></div>

          @endforeach
        @endif
       
      </div>
      <div class="error-message"></div>
    </fieldset>
  </form>
  <a class="prev-button btn btn-primary text-center" href="#"><i class="fa fa-chevron-left" aria-hidden="true"></i>
  </a>
  <a class="next-button btn btn-primary text-center" href="#"><i class="fa fa-chevron-right" aria-hidden="true"></i>
  </a>
</div>