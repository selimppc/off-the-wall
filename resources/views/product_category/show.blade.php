<div class="modal-dialog"  style="width: 75%;">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">{{$pageTitle}}</h4>
        </div>

        <div class="modal-body">
            <div style="padding: 30px;">
                <table id="" class="table table-bordered table-hover table-striped">
                    <tr>
                        <th class="col-lg-4">Group</th>
                        <td>{{ isset($data->relCatgroup->title)?$data->relCatgroup->title:''}}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-4">SubGroup</th>
                        <td>{{ isset($data->relCatsubgroup->title)?$data->relCatsubgroup->title:''}}</td>
                    </tr>
                    <tr>
                        <th> Title </th>
                        <td>{{$data->title}}</td>
                    </tr>
                
                    <tr>
                        <th> Slug </th>
                        <td>{{$data->slug}}</td>
                    </tr>

                    <tr>
                        <th> Description </th>
                        <td>{{$data->description}}</td>
                    </tr>

                    <tr>
                        <th> Status </th>
                        <td>{{$data->status}}</td>
                    </tr>

                     <tr>
                        <th class="col-lg-4">Image</th>
                        <td>
                            <div>
                                <a href="{{ route('product-category-image.image.show', $data->slug) }}" class="btn btn-info btn-xs" data-toggle="modal" data-target="#imageView"><img src="{{ URL::to('') }}/uploads/product_category_image/{{$data->image}}" height="50px" width="50px" alt="{{$data->image}}" />
                                </a>
                            </div>
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

