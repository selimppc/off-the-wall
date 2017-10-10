<div class="modal-dialog"  style="width: 75%;">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">{{$pageTitle}}</h4>
        </div>

        <div class="modal-body">
            <div style="padding: 30px;">
                <table id="" class="table table-bordered table-hover table-striped">
                    <tr>
                        <th class="col-lg-4">Menu Type</th>
                        <td>{{ isset($data->menu_type_id)?$data->menu_type_id:''}}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-4">Name</th>
                        <td>{{ isset($data->name)?$data->name:''}}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-4">Slug</th>
                        <td>{{ isset($data->slug)?$data->slug:''}}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-4">Alias</th>
                        <td>{{ isset($data->alias)?$data->alias:'' }}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-4">Url</th>
                        <td>{{ isset($data->url)?$data->url:''}}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-4">Type</th>
                        <td>{{ isset($data->type)?$data->type:''}}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-4">Status</th>
                        <td>{{ isset($data->status)?$data->status:''}}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-4">Parent</th>
                        <td>{{ isset($data->parent)?$data->parent:''}}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-4">Ext Name</th>
                        <td>{{ isset($data->type)?$data->type:''}}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-4">Order</th>
                        <td>{{ isset($data->order)?$data->order:''}}</td>
                    </tr>


                </table>
            </div>
        </div>
        <div class="modal-footer">
            <a href="" class="btn btn-default" type="button"> Close </a>
        </div>

    </div>
</div>