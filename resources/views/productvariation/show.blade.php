<div class="modal-dialog"  style="width: 75%;">
    <div class="modal-content">
    	<div class="modal-header">
            <h4 class="modal-title">{{$pageTitle}}</h4>
        </div>

        <div class="modal-body">
            <div style="padding: 30px;">
            	<table id="" class="table table-bordered table-hover table-striped">
            		<tr>
                        <th> Product </th>
                        <td>{{ isset($data->relProduct->title)?$data->relProduct->title:''}}</td>
                    </tr>                
                    <tr>
                        <th> Color </th>
                        <td>{{$data->title}}</td>
                    </tr>
                    <tr>
                        <th> Slug </th>
                        <td>{{$data->slug}}</td>
                    </tr>
                    <!-- <tr>
                        <th> Size </th>
                        <td>{{$data->size}}</td>
                    </tr>
                    <tr>
                        <th> Color </th>
                        <td>{{$data->color}}</td>
                    </tr>
                    <tr>
                        <th> Sell quantity </th>
                        <td>{{$data->sell_quantity}}</td>
                    </tr>
                    <tr>
                        <th> Stock Balance </th>
                        <td>{{$data->stock_balance}}</td>
                    </tr>
                    <tr>
                        <th> Sell Rate </th>
                        <td>{{$data->sell_rate}}</td>
                    </tr>
                    <tr>
                        <th> Cost Price </th>
                        <td>{{$data->cost_price}}</td>
                    </tr> -->
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