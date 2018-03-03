<div class="row" id="offtwl__dimension-tab-row">
  <div id="offtwl__dimension-tab" class="offtwl__cardbox offtwl__cardbox-tab-content container-fluid" data-tab-name="Size">
    <div class="offtwl__cd">
      <div class="offtwl__tt">
        <div class="offtwl__tt">
          <div class="offtwl__zz">
            <div class="offtwl__xx inline-block">
              <h3 class="offtwl__cardbox-title">
                Please Select Size
              </h3>
            </div>
            <div class="inline-block hidden" id="offtwl__dimension-type-wrapper">
              <fieldset id="offtwl__dimention-type-choice-radio">
                <label class="mtd-radio" for="offtwl__dimention-type-cm">
                  <input name="unit-type" id="offtwl__dimention-type-cm" value="cm" checked="checked" type="radio">
                  <span class="offtwl__outer-el"><span class="inner"></span></span>
                  cm
                </label>
              </fieldset>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-20">
        <div class="col-xs-12 col-sm-6">
          <div class="modal fade active" id="dimentionInstructionModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="offtwl__zzz modal-content offtwl__tt">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="modal-content">
                    <img class="img-full" id="img01" src="./images/dimention-info.jpg">
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
          <form class="offtwl__dimention-input-form">
            <div class="clearfix">
              <div class="offtwl__ss">
                <div class="offtwl__sd">
                  <div class="offtwl__sfd">
                    <fieldset>
                      <input type="hidden" id="offtwl__dimention-image-ratio" data-locked="false" value="0.015">
                      <div id="offtwl__dimensions-input-holder">
                        <div class="offtwl__presets-type-holder mb-10">
                          <select name="preset-type" id="preset-type-list" class="form-control">
                            <option value="-">Default Sizes</option>

                            @if(!empty($data))
                              @foreach($data as $values)

                                <option value="{{$values->value}}" data-value="{{$values->value}}" data-width-inch="{{$values->width_inch}}" data-height-inch="{{$values->height_inch}}" data-width-cm="{{$values->width_cm}}" data-height-cm="{{$values->height_cm}}">{{$values->title}}
                            </option>


                              @endforeach
                            @endif
                            
                          </select>
                        </div>
                        <div class="clearfix mb-20">
                          <div class="offtwl__dimension-container"><label for="offtwl__dmnsn-width">Width</label>
                            <div class="input-group">
                              <input type="number" id="offtwl__dmnsn-width" value="10.2" min="10" max="152.5" step="0.1" class="offtwl__dmnsn-inch-cm" data-cm-min="10" data-cm-max="152.5" data-inch-min="4" data-inch-max="60" data-cm-step="0.1" data-inch-step="0.25" data-offtwl__redraw data-offtwl__calculation-item data-for="width"/>
                            </div>
                          </div>
                          <div id="multiply-dimensions-sign">X</div>
                          <div class="offtwl__dimension-container"><label for="offtwl__dmnsn-height">Height</label>
                            <div class="input-group">
                              <input type="number" id="offtwl__dmnsn-height" value="15.2" min="10" max="152.5" step="0.1" class="offtwl__dmnsn-inch-cm" data-cm-min="10" data-cm-max="152.5" data-inch-min="4" data-inch-max="60" data-cm-step="0.1" data-inch-step="0.25" data-offtwl__redraw data-offtwl__calculation-item data-for="height"/>
                              &nbsp;
                              <span class="offtwl__dmnsn-unit-addon" data-type="offtwl__dmnsn-unit-label">cm</span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </fieldset>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="col-xs-12 col-sm-6">
          <hr class="visible-xs">
          <form id="offtwl__upload-form">
            <div class="button offtwl__upload-img-button">
              <i class="fa fa-upload"></i>
              <span class="offtwl__upload-btn-text">
                    <span class="display-block">Upload</span>
                    <input type="file" id="offtwl__upload-form-input-1" class="upload-input-inside-btn">
                  </span>
            </div>
            <p class="text-center">N.B: Upload image not mandatory</p>
            <div class="text-center offtwl__image-description" style="display:none">
              <span class="btn btn-default remove-image" data-offtwl__calculation-item> <i class="fa fa-trash-o"></i><span>  Remove Image</span></span>
            </div>
            <div class="offtwl__upload-img-quality-holder" style="display:none;">
              <div class="clearfix mtb-10">
                <h5 class="pull-left">Printing Quality</h5>
                <button type="button" class="btn btn-default pull-right" data-container="body" data-toggle="popover" data-trigger="click" data-placement="left" data-content="This tool checks your uploaded image and estimates the printing quality at the size you've entered.
                                         We recommend aiming for 'Good' or better, however we'll still be able to print your images regardless of the quality listed here.
                                         Please note that this is an estimate and may not be indicative of the final quality.
                                         You're always welcome to contact us to check your images for you.">
                  <i class="fa fa-question-circle no-pad" style="font-size: 2rem;"></i>
                </button>
              </div>
              <div class="upload__progress progress">
                <div id="offtwl__upload-quality-progress" class="progress-bar progress-bar-info progress-bar-striped" style="width: 100%">
                  <span id="offtwl__upload-quality-text">No Image Detected</span>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="mt-5  alert alert-danger alert-closablecol-xs-12 offtwl__dimension-warning" role="alert" id="offtwl__dmnsn-warning" style="display: none;">
        <button type="button" class="close" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <p>The size entered including mats or slips should be within the following dimensions:</p>
        <div>Min :
          <strong class="offtwl__dmnsn-inch-cm" data-type="offtwl__dmnsn-unit-value" data-inch-value="4" data-cm-value="10">10</strong>
          x
          <strong class="offtwl__dmnsn-inch-cm" data-type="offtwl__dmnsn-unit-value" data-inch-value="4" data-cm-value="10">10</strong>
          <span class="offtwl__dmnsn-inch-cm" data-type="offtwl__dmnsn-unit-label">cm</span>
          , Max :
          <strong class="offtwl__dmnsn-inch-cm" data-type="offtwl__dmnsn-unit-value" data-inch-value="60" data-cm-value="152.5">152.5</strong>
          x
          <strong class="offtwl__dmnsn-inch-cm" data-type="offtwl__dmnsn-unit-value" data-inch-value="40" data-cm-value="101.5">101.5</strong>
          <span class="offtwl__dmnsn-inch-cm" data-type="offtwl__dmnsn-unit-label">cm</span>
        </div>
      </div>
    </div>
  </div>
</div>