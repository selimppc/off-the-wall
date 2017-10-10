<div class="modal-dialog"  style="width: 75%;">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">{{$pageTitle}}</h4>
        </div>

        <div class="modal-body">
            <div style="padding: 30px;">
                <table id="" class="table table-bordered table-hover table-striped">
                    <tr>
                        <th class="col-lg-4">Frame Category</th>
                        <td>{{ isset($data->relCategory)?$data->relCategory->title:'' }}</td>
                    </tr>
                    
                    <tr>
                        <th class="col-lg-4">Frame Code</th>
                        <td>{{ isset($data->frame_code)?$data->frame_code:'' }}</td>
                    </tr>                    

                    <tr>
                        <th class="col-lg-4">Frame Width</th>
                        <td>{{ isset($data->frame_width)?$data->frame_width:'' }}</td>
                    </tr>                    
                    
                    <tr>
                        <th class="col-lg-4">Frame Depth</th>
                        <td>{{ isset($data->frame_depth)?$data->frame_depth:'' }}</td>
                    </tr>

                    <tr>
                        <th class="col-lg-4">Frame Rebate</th>
                        <td>{{ isset($data->frame_rebate)?$data->frame_rebate:'' }}</td>
                    </tr>

                    <tr>
                        <th class="col-lg-4">Frame Rate</th>
                        <td>{{ isset($data->frame_rate)?$data->frame_rate:'' }}</td>
                    </tr>

                    <tr>
                        <th class="col-lg-4">Frame Min Width</th>
                        <td>{{ isset($data->frame_min)?$data->frame_min:'' }}</td>
                    </tr>

                    <tr>
                        <th class="col-lg-4">Frame Max Width</th>
                        <td>{{ isset($data->frame_max)?$data->frame_max:'' }}</td>
                    </tr>

                    <tr>
                        <th class="col-lg-4">Sort Order</th>
                        <td>{{ isset($data->sort_order)?$data->sort_order:'' }}</td>
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