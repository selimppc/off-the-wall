<div class="modal-dialog"  style="width: 75%;">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">{{$pageTitle}}</h4>
        </div>

        <div class="modal-body">
            <div style="padding: 30px;">
                <table id="" class="table table-bordered table-hover table-striped">
                    <tr>
                        <th> Title </th>
                        <td>{{$data->title}}</td>
                    </tr>
                
                    <tr>
                        <th> Slug </th>
                        <td>{{$data->slug}}</td>
                    </tr>

                    <tr>
                        <th> Status </th>
                        <td>{{$data->status}}</td>
                    </tr>

                </table>
            </div>
        </div>
        <div class="modal-footer">
            <a href="{{ URL::previous()}}" class="btn btn-default" type="button"> Close </a>
        </div>

    </div>
</div>

