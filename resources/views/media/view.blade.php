<div class="modal-dialog"  style="width: 75%;">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">{{$pageTitle}}</h4>
        </div>

        <div class="modal-body">
            <div style="padding: 30px;">
                <table id="" class="table table-bordered table-hover table-striped">
                    <tr>
                        <th class="col-lg-4">File</th>
                        <td>
                            <div>
                                <a href="{{ route('media.image.show', $data->id) }}" class="btn btn-info btn-xs" data-toggle="modal" data-target="#imageView"><img src="{{ URL::to($data->thumbnail) }}" height="50px" width="50px" alt="{{$data->thumbnail}}" />
                                </a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th class="col-lg-4">Type</th>
                        <td>{{ isset($data->type)?$data->type:'' }}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-4">Alt Text</th>
                        <td>{{ isset($data->alt_text)?$data->alt_text:'' }}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-4">Url (full-length)</th>
                        <td>{{ isset($data->file_name)?public_path()."/".$data->file_name:'' }}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-4">Url (thumbnail)</th>
                        <td>{{ isset($data->thumbnail)?public_path()."/".$data->thumbnail:'' }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="modal-footer">
            <a href="{{ URL::previous()}}" class="btn btn-default" type="button"> Close </a>
        </div>

    </div>
</div>