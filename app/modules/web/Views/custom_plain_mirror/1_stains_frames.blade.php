
@if(count($frame_r) > 0)
    @foreach($frame_r as $frame)

        <div class="frame offtwl__thumb-frame-container" data-filtr="rate-{{$frame->frame_rate}} code-{{$frame->frame_code}} {{$frame->frame_color}}">
            <span class="hide fweight">35</span>
            <span class="hide code">{{$frame->frame_code}}</span>
            <span class="hide rebate">{{$frame->frame_rebate}}</span>
            <span class="hide width">{{$frame->frame_width}}</span>
            <span class="hide frate">{{$frame->frame_rate}}</span>
            <span class="hide id">{{$frame->id}}</span>
            <span class="hide fmin">{{$frame->frame_min_width}}</span>
            <span class="hide fmax">{{$frame->frame_max_width}}</span>
            <span class="hide fprice">{{$frame->price}}</span>
            <span class="hide fimg"></span>
            <div class="offtwl__frame-tag-container selectframe">
              <img data-src-top="{{$frame->image_link}}" border="0" alt="" src="{{$frame->thumb_link}}" class="offtwl__frame-thumb">
              <strong class="hidden">
                <a href="http://offthewallframing.com.au/web/photo_frame/plain_mirror/images/frame_images/thumb/framing_282_A53601.jpg" class="zoom">zoom</a>
              </strong>
              <div class="offtwl__frame-tag-desc">
                <div class="name">
                  <b>Code:</b> {{$frame->frame_code}}
                </div>
              </div>
              <div class="offtwl__frame-tag-desc">
                <b>Color:</b> {{$frame->frame_color}}
              </div>
              <div class="offtwl__frame-tag-desc">
                <b>Material:</b> {{$frame->frame_material}}
              </div>
              <div class="offtwl__frame-tag-desc">
                <b>Width:</b> {{$frame->frame_width}} cm
              </div>
              <div class="offtwl__frame-tag-desc">
                <b>Height:</b> {{$frame->frame_height}} cm
              </div>
              <div class="offtwl__frame-tag-desc offtwl__frame-tag-rate">
                <b>Rate:</b> {{$frame->frame_rate}}
              </div>
            </div>
          </div>

    @endforeach
@endif    



