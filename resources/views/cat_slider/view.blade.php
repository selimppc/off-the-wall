<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">{{$pageTitle}}</h4>
        </div>

        <div class="modal-body">
            <div style="padding: 30px;">
                <table id="" class="table table-bordered table-hover table-striped">
                    <tr>
                        <th class="col-lg-4"> Title </th>
                        <td>{{ isset($data->title)?$data->title:'' }}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-4"> Slug </th>
                        <td>{{ isset($data->slug)?$data->slug:'' }}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-4"> Desc </th>
                        <td>{{ isset($data->desc)?$data->desc:'' }}</td>
                    </tr><tr>
                        <th class="col-lg-4"> Url </th>
                        <td>{{ isset($data->url)?$data->url:'' }}</td>
                    </tr><tr>
                        <th class="col-lg-4"> Status </th>
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