@if(count($frame_r) > 0)
    @foreach($frame_r as $frame)

        <div class="frame" data-filtr="rate-{{$frame->frame_rate}} code-{{$frame->frame_code}}" style="text-align: left; margin-bottom: 10px;border-bottom:1px dotted #ccc; min-height: 155px;">
            <span class="hide code">{{$frame->frame_code}}</span>
            <span class="hide rebate">{{$frame->frame_rebate}}</span>
            <span class="hide width">{{$frame->frame_width}}</span>
            <span class="hide frate">{{$frame->frame_rate}}</span>
            <span class="hide id">{{$frame->id}}</span>
            <span class="hide fmin">{{$frame->frame_min_width}}</span>
            <span class="hide fmax">{{$frame->frame_max_width}}</span>
            <span class="hide fprice">{{$frame->price}}</span>
            <span class="hide fimg"></span>
    <div class="col">
        <strong>
            <a href="javascript: $('#size-notice').show();void(true);" class="selectframe" >
                <img data-src-top="{{$frame->image_link}}" border="0" alt="" src="{{$frame->thumb_link}}" style="float: right; margin-right: 5px;" class="dropshadow">
            </a>
        </strong>
    </div>
    <div class="col" style="padding-left:5px">
        <div class="name">
            <b>Code:</b> {{$frame->frame_code}}
        </div>
        <br />
        <b>Color:</b> {{$frame->frame_color}}

        <br />
        <b>Material:</b> {{$frame->frame_material}}

        <br />
        <b>Width:</b> {{$frame->frame_width}} cm

        <br />
        <b>Height:</b> {{$frame->frame_height}} cm

        <br />
        <div class="rate">
            <b style="color: red;">Rate:</b> {{$frame->frame_rate}}
        </div>
        <br />
        <br />
        <strong>
            <a href="javascript: void(true);" class="selectframe">Select</a>
        </strong>
        <strong>
            <a href="{{$frame->thumb_link}}" class="zoom">zoom</a>
        </strong>
    </div>
</div>
<div style="clear: both;"></div>

    @endforeach
@endif


