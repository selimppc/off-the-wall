<div class="modal-dialog"  style="width: 75%;">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title text-center">View Of : {{ isset($data->title)?ucfirst($data->title):'' }}</h4>
        </div>
        <div class="modal-body">
            <table class="table table-bordered table-hover table-striped">
                <tr>
                    <th>Title</th>
                    <td>{{isset($data->title)?ucfirst($data->title):''}}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{isset($data->status)?ucfirst($data->status):''}}</td>
                </tr><tr>
                    <th>User Type</th>
                    <td>{{isset($data->user_type)? ucfirst($data->user_type):''}}</td>
                </tr>
            </table>
        </div>

        <div class="modal-footer">
            <a href="{{ URL::previous()}}" class="btn btn-default btn-xs" type="button"> Close </a>
        </div>

    </div>
</div>