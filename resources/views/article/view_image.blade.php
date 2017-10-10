{{--<div class="modal-dialog" style="z-index:auto">--}}
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            {{--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>--}}
            <h4 class="modal-title">Image View</h4>
        </div>
        <div class="modal-body">
            <div class="fileupload-new thumbnail">
                @if($image != null)
                    @foreach($image as $value)
                        <img src="{{ URL::to($value->featured_image) }} " >
                        {{--<img src="{{ URL::to($value->file_name) }} " width="135px" height="100px">--}}
                    @endforeach
                @endif
            </div>
        </div>

        <div class="modal-footer">
            <a href=""  class="btn btn-default" type="button"> Close </a>
        </div>

    </div>
</div>

