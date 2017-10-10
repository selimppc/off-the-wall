<div class="modal-dialog"  style="width: 75%;">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">{{$pageTitle}}</h4>
        </div>

        <div class="modal-body">
            <div style="padding: 30px;">
                <table id="" class="table table-bordered table-hover table-striped">
                    
                    <tr>
                        <th class="col-lg-4">Frame Code</th>
                        <td>{{ isset($data->frame_code)?$data->frame_code:'' }}</td>
                    </tr>                    

                    <tr>
                        <th class="col-lg-4">Frame Rate</th>
                        <td>{{ isset($data->frame_rate)?$data->frame_rate:'' }}</td>
                    </tr>                    
                    
                    <tr>
                        <th class="col-lg-4">Frame Rebate</th>
                        <td>{{ isset($data->frame_rebate)?$data->frame_rebate:'' }}</td>
                    </tr>

                    <tr>
                        <th class="col-lg-4">Frame Width</th>
                        <td>{{ isset($data->frame_width)?$data->frame_width:'' }}</td>
                    </tr>

                    <tr>
                        <th class="col-lg-4">Frame Height</th>
                        <td>{{ isset($data->frame_height)?$data->frame_height:'' }}</td>
                    </tr>

                    <tr>
                        <th class="col-lg-4">Frame Min Width</th>
                        <td>{{ isset($data->frame_min_width)?$data->frame_min_width:'' }}</td>
                    </tr>

                    <tr>
                        <th class="col-lg-4">Frame Max Width</th>
                        <td>{{ isset($data->frame_max_width)?$data->frame_max_width:'' }}</td>
                    </tr>

                    <tr>
                        <th class="col-lg-4">Price</th>
                        <td>{{ isset($data->price)?$data->price:'' }}</td>
                    </tr>

                    <tr>
                        <th class="col-lg-4">Frame Color</th>
                        <td>{{ isset($data->frame_color)?$data->frame_color:'' }}</td>
                    </tr>

                    <tr>
                        <th class="col-lg-4">Frame Material</th>
                        <td>{{ isset($data->frame_material)?$data->frame_material:'' }}</td>
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