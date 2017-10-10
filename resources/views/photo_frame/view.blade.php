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
                        <td>{{ isset($data->title)?$data->title:'' }}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-4">Value</th>
                        <td>{{ isset($data->value)?$data->value:'' }}</td>
                    </tr>                    
                    <tr>
                        <th class="col-lg-4">Width (inch)</th>
                        <td>{{ isset($data->width_inch)?$data->width_inch:'' }}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-4">Height (inch)</th>
                        <td>{{ isset($data->height_inch)?$data->height_inch:'' }}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-4">Width (cm)</th>
                        <td>{{ isset($data->width_cm)?$data->width_cm:'' }}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-4">Height (cm)</th>
                        <td>{{ isset($data->height_cm)?$data->height_cm:'' }}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-4">Status</th>
                        <td>{{ isset($data->status)?$data->status:'' }}</td>
                    </tr>


                </table>
            </div>
        </div>
        <div class="modal-footer">
            <a href="{{ URL::previous()}}" class="btn btn-default" type="button"> Close </a>
        </div>

    </div>
</div>