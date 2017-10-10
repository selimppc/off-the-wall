<div class="modal-dialog"  style="width: 75%;">
    <div class="modal-content">
        <div class="modal-header">
            {{--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>--}}
            <h4 class="modal-title">{{ isset($data->first_name)?$data->first_name:''}}{{isset($data->last_name)?$data->last_name:''}}</h4>
        </div>

        <div class="modal-body">
            <div style="padding: 30px;">
                <table id="" class="table table-bordered table-hover table-striped" style="font-size: medium">
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
                        <th class="col-lg-4">Address</th>
                        <td>{{ isset($data->address)?$data->address:''}}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-4">Phone Number</th>
                        <td>{{ isset($data->phone_number)?$data->phone_number:'' }}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-4">State</th>
                        <td>{{ isset($data->state)?$data->state:''}}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-4">Country</th>
                        <td>{{ isset($data->country_id)?$data->relCountry->title:'' }}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-4">Status</th>
                        <td>{{ isset($data->status)?$data->status:'' }}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-4">Type</th>
                        <td>{{ isset($data->type)?$data->type:''  }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="modal-footer">
            <a href="{{ URL::previous()  }}" class="btn btn-default" type="button"> Close </a>
        </div>

    </div>
</div>