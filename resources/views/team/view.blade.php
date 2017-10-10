<div class="modal-dialog"  style="width: 75%;">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">{{$pageTitle}}</h4>
        </div>

        <div class="modal-body">
            <div style="padding: 30px;">
                <table id="" class="table table-bordered table-hover table-striped">
                    <tr>
                        <th class="col-lg-4">First Name</th>
                        <td>{{ isset($data->first_name)?$data->first_name:''}}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-4">Last Name</th>
                        <td>{{ isset($data->last_name)?$data->last_name:'' }}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-4">Email</th>
                        <td>{{ isset($data->email)?$data->email:'' }}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-4">Phone</th>
                        <td>{{ isset($data->phone)?$data->phone:'' }}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-4">Designation</th>
                        <td>{{ isset($data->designation)?$data->designation:'' }}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-4">Responsibility</th>
                        <td>{{ isset($data->responsibility)?$data->responsibility:'' }}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-4">Status</th>
                        <td>{{ isset($data->status)?$data->status:'' }}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-4">Image</th>
                        <td>
                           {!! HTML::image('/'.$data->image) !!}
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="modal-footer">
            <a href="{{ URL::previous()}}" class="btn btn-default" type="button"> Close </a>
        </div>

    </div>
</div>