<div class="modal-dialog"  style="width: 75%;">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">{{$pageTitle}}</h4>
            <a href="" class="btn btn-default" style="float: right;margin-top: -30px;color: #fff;" type="button"> X </a>
        </div>

        <div class="modal-body">
            <div style="padding: 30px;">
                <table id="" class="table table-bordered table-hover table-striped">
                   <tr>
                        <th class="col-lg-4">Product Group</th>
                        <td>{{ isset($data->relProductGroup->title)?$data->relProductGroup->title:''}}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-4">Product SubGroup</th>
                        {{--<td>{{ isset($data->product_subgroup_id)?$data->relSubGroup->title:''}}</td>--}}
                        <td>{{ @$data->relSubGroup->title}}</td>
                    </tr>
                  <!--   <tr>
                        <th class="col-lg-4">Category</th>
                        <td>{{ isset($data->relCatProduct->title)?$data->relCatProduct->title:''}}</td>
                    </tr> -->
                   <tr>
                        <th> Title </th>
                        <td>{{$data->title}}</td>
                    </tr>                
                    <tr>
                        <th> Slug </th>
                        <td>{{$data->slug}}</td>
                    </tr>
                    <tr>
                        <th> Meta Title </th>
                        <td>{{$data->meta_title}}</td>
                    </tr>
                    <tr>
                        <th> Pick up/Now Price </th>
                        <td>{{$data->sell_rate}}</td>
                    </tr>

                    <tr>
                        <th> Delivered Price </th>
                        <td>{{$data->cost_price}}</td>
                    </tr>
                    <tr>
                        <th>Before Price </th>
                        <td>{{$data->before_price}}</td>
                    </tr>
                   
                    <tr>
                        <th> Product Code </th>
                        <td>{{$data->product_code}}</td>
                    </tr>
                    <tr>
                        <th> Sizes </th>
                        <td>{{$data->size}}</td>
                    </tr>
                    <tr>
                        <th> Other Sizes</th>
                        <td>{{$data->other_size}}</td>
                    </tr>
                    <tr>
                        <th> Stock Quantity </th>
                        <td>{{$data->stock_unit_quantity}}</td>
                    </tr>
                    <tr>
                        <th> Delivery Info </th>
                        <td>{{$data->delivery_info}}</td>
                    </tr>
                     <tr>
                        <th> Description </th>
                        <td>{{$data->short_description}}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="modal-footer">
            <a href="{{ URL::previous()}}" class="btn btn-default" type="button"> Close </a>
        </div>

    </div>
</div>

