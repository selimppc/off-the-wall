<div id="offtwl__frames-tab" class="offtwl__cardbox offtwl__cardbox-tab-content" data-tab-name="Frames">
  <div class="row">
    <div class="col-xs-9 col-sm-10">
      <h3 class="offtwl__cardbox-title">Please select your choice of frame from our range</h3>
    </div>
  </div>
  <div id="">
    <div class="row">
      <div class="col-sm7 col-md-6">
        @if(!empty($frame_category))
          <?php
            $category_count = 1;
          ?>
          <select name="" id="select-frame-dropdown" class="form-control">
            @foreach($frame_category as $category)
                <option value="offtwl__frm-tab-{{$category->id}}" <?=$category_count=='1'?'selected':'';?>>
                    {{$category->title}}
                </option>
                <?php
                  $category_count++;
                ?>
            @endforeach
          </select>  
        @endif  
        
      </div>
    </div>

    @if(!empty($frame_category))
      <?php
        $category_hidden_count = 1;
      ?>
      <ul class="nav nav-tabs hidden" id="offtwl__frame-ctgry-tab-list">
          @foreach($frame_category as $category)

            <li class="<?=$category_hidden_count=='1'?'active':'';?>">
              <a data-toggle="tab" href="#offtwl__frm-tab-{{$category->id}}">{{$category->title}}</a>
            </li>

            <?php
              $category_hidden_count++;
            ?>                
          @endforeach
      </ul>

    @endif  
    
    <div class="row" id="offtwl__frame-warning" style="display:none;">
      <div class="col-xs-12">
        <div class="alert mtd-alert-warning">
          <p>These frames are for framing a canvas only. By selecting one of these frames,
            <strong>your mat,
              slip, fillet, image, and glass option will be removed!
            </strong>
          </p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12">
        <div class="tab-content">

          @if(!empty($frame_category))
          <?php
            $category_product_count = 1;
          ?>
              @foreach($frame_category as $category)

              <div id="offtwl__frm-tab-{{$category->id}}" class="tab-pane fade <?=$category_product_count=='1'?'in active':'';?> offtwl__select-frame-container">

                @if(!empty($category->relFrame))

                  @foreach($category->relFrame as $frame)

                  <div class="offtwl__thumb-frame-container" data-frame-code="{{$frame->frame_code}}"  data-frame-material="Wood" data-frame-width="{{$frame->frame_width}}" data-frame-depth="{{$frame->frame_depth}}" data-frame-rebate="{{$frame->frame_rebate}}" data-frame-rate="{{$frame->frame_rate}}" data-frame-min="{{$frame->frame_min}}" data-frame-max="{{$frame->frame_max}}" data-frame-desc="{{$category->title}}" data-frame-tile="{{$frame->thumb_link}}" data-frame-description="">
                  <img data-original="{{$frame->image_link}}" src="{{$frame->image_link}}" alt="{{$frame->frame_code}}" class="offtwl__frame-thumb lazy"/>
                  <div class="offtwl__frame-tag-container">
                    <span class="offtwl__frame-tag--name">{{$frame->frame_code}}</span>
                    <span class="offtwl__frame-tag--width">{{$frame->frame_width}} cm</span>
                    <span class="offtwl__frame-tag--rate">Rate {{$frame->frame_rate}}</span>
                  </div>
                </div>

                @endforeach
              @endif  

                <?php
                  $category_product_count++;
                ?>

                </div>
              @endforeach

            

          @endif

          
            <div class="row">
    <div class="col-sm-12">
      <div id="offtwl__frame-details-container" class="panel-heading toggle-collapse" role="button" data-toggle="collapse" href="#offtwl__frame-details-info" aria-expanded="true">
    <span class="panel-title">
      Frame Details
      <i style="margin-left: 5px;" id="offtwl__frame-details-info-icon" class="toggle-icon fa fa-plus"></i>
    </span>
      </div>
      <div class="panel-body collapse table-clean flat-input row pb-0" id="offtwl__frame-details-info">
        <div class="offtwl__ss">
          <div class="offtwl__sz">
            <table class="table table-hover table-condensed mb-0" id="offtwl__frame-details-info-table">
              <tbody>
                <tr>
                  <td class="detail-key" style="width: 50%;"> Code</td>
                  <td class="detail-value" style="width: 50%;" id="frame-detail-code"></td>
                  <td></td>
                </tr>
                <tr>
                  <td class="detail-key" style="width: 50%;"> Width</td>
                  <td class="detail-value" style="width: 50%;" id="frame-detail-width"></td>
                  <td></td>
                </tr>
                <tr>
                  <td class="detail-key" style="width: 50%;"> Depth</td>
                  <td class="detail-value" style="width: 50%;" id="frame-detail-depth"></td>
                  <td></td>
                </tr>
                <tr>
                  <td class="detail-key" style="width: 50%;"> Rebate</td>
                  <td class="detail-value" style="width: 50%;" id="frame-detail-rebate"></td>
                  <td></td>
                </tr>
                <tr>
                  <td class="detail-key" style="width: 50%;">Colour</td>
                  <td class="detail-value" style="width: 50%;" id="frame-detail-colour"></td>
                  <td></td>
                </tr>
                <tr>
                  <td class="detail-key" style="width: 50%;">Material</td>
                  <td class="detail-value" style="width: 50%;" id="frame-detail-material"></td>
                  <td></td>
                </tr>
                <tr>
                  <td class="detail-key" style="width: 50%;">Extra Info</td>
                  <td class="detail-value" style="width: 50%;" id="frame-detail-description"></td>
                  <td></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
          
           
          </div>
          
          
        </div>
      </div>
    </div>
  </div>
  <div class="mt-20 alert alert-danger alert-closable col-xs-12 offtwl__dimension-warning" role="alert" id="larger-than-max-error" style="display:none;">
    <button type="button" class="close" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    The selected frame can only support a maximum length of
    <span class="text-bold" id="max-frame-length-error">92</span>
    cm. Please choose a different frame or adjust the
    <a href="#offtwl__dimension-tab">size</a>
    .
  </div>
  <div class="mt-20 alert alert-danger alert-closable col-xs-12 offtwl__dimension-warning pt-5" role="alert" id="larger-than-max-error" style="display:none;">
    <button type="button" class="close" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <span>The selected frame (including matboard) can only support a maximum length of <span class="text-bold" id="max-frame-length-error">999</span> cm</span>
    <p>Your current selection's size :
      <span id="error-current-selection-size"></span>
    </p>
  </div>
  
  <a class="prev-button btn btn-primary text-center disabled" href="#">
    <i class="fa fa-chevron-left" aria-hidden="true"></i></a>
  <a class="next-button btn btn-primary text-center" href="#"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
</div>