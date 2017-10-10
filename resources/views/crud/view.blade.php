<div class="modal-dialog">
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


                </table>
            </div>
        </div>
        <div class="modal-footer">
            <a href="" class="btn btn-default" type="button"> Close </a>
        </div>

    </div>
</div>