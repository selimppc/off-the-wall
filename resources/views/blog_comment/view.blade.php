<div class="modal-dialog" style="width: 75%;">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">{{$pageTitle}}</h4>
        </div>

        <div class="modal-body">
            <div style="padding: 30px;">
                <table id="" class="table table-bordered table-hover table-striped">
                    <tr>
                        <th class="col-lg-4">Blog Item</th>
                        <td>{{ isset($data->relBlogItem->title)?$data->relBlogItem->title:'' }}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-4">Name</th>
                        <td>{{ isset($data->name)?$data->name:''}}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-4">Email</th>
                        <td>{{ isset($data->email)?$data->email:'' }}</td>
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