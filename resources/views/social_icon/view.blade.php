<div class="modal-dialog"  style="width: 75%;">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">{{$pageTitle}}</h4>
        </div>

        <div class="modal-body">
            <div style="padding: 30px;">
                <table id="" class="table table-bordered table-hover table-striped">
                    <tr>
                        <th class="col-lg-4">Title</th>
                        <td>{{ isset($data->title)?$data->title:''}}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-4">Link (full-length)</th>
                        <td>{{ isset($data->link)?public_path()."/".$data->link:'' }}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-4">Icon</th>
                        <td>
                            @if($data->icon != '')
                                <div>
                                    <a href="{{ route('social_icon.image.show', $data->slug) }}" class="btn btn-info btn-xs" data-toggle="modal" data-target="#imageView"><img src="{{ URL::to($data->icon) }}" height="50px" width="50px" alt="{{$data->icon}}" />
                                    </a>
                                </div>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th class="col-lg-4">Status</th>
                        <td>{{ isset($data->status)?$data->status:'' }}</td>
                    </tr>


                </table>
            </div>
        </div>
        <div class="modal-footer">
            <a href="" class="btn btn-default" type="button"> Close </a>
        </div>

    </div>
</div>