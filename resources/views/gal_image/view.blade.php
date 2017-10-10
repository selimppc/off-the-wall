<div class="modal-dialog"  style="width: 75%;">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">{{$pageTitle}}</h4>
        </div>

        <div class="modal-body">
            <div style="padding: 30px;">
                <table id="" class="table table-bordered table-hover table-striped">
                    <tr>
                        <th class="col-lg-4">Product</th>
                        <td>{{ isset($data->relProductGallery->title)?$data->relProductGallery->title:''}}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-4">Name</th>
                        <td>{{ isset($data->name)?$data->name:'' }}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-4">Slug</th>
                        <td>{{ isset($data->name)?$data->slug:'' }}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-4">Image</th>
                        <td>
                            <div>
                                <a href="{{ route('gal_image.image.show', $data->slug) }}" class="btn btn-info btn-xs" data-toggle="modal" data-target="#imageView"><img src="{{ URL::to($data->image) }}" height="50px" width="50px" alt="{{$data->image}}" />
                                </a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th class="col-lg-4">status</th>
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