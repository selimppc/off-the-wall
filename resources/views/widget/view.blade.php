<div class="modal-dialog"  style="width: 75%;">
    <div class="modal-content">
        <div class="modal-header">
            <a href="{{ URL::previous() }}" class="btn btn-xs btn-default pull-right" type="button"> x </a>
            <h4 class="modal-title">{{$pageTitle}}</h4>
        </div>

        <div class="modal-body">
            <div style="padding: 30px;">
                <table id="" class="table table-bordered table-hover table-striped">
                    <tr>
                        <th class="col-lg-4">Title</th>
                        <td>{{ isset($data->title)?$data->title:''}}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-4">Widget Name</th>
                        <td>{{ isset($data->widget_name)?$data->widget_name:''}}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-4">Show Title</th>
                        <td>{{ isset($data->showtitle)?$data->showtitle:'' }}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-4">Content</th>
                        <td>{{ isset($data->content)?$data->content:'' }}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-4">Position</th>
                        <td>{{ isset($data->position)?$data->position:''}}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-4">Order</th>
                        <td>{{ isset($data->order)?$data->order:'' }}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-4">Status</th>
                        <td>{{ isset($data->status)?$data->status:'' }}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-4">Widget Menu</th>
                        <td>
                        @foreach($widget_menu as $widget_menus)
                        ->{{ isset($widget_menus->relMenu->name)?$widget_menus->relMenu->name:'' }}<br>
                            @endforeach
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="modal-footer">
            <a href="" class="btn btn-default" type="button"> Close </a>
        </div>

    </div>
</div>