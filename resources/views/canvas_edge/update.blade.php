<div class="modal-dialog"  style="width: 75%;">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Update Canvas Edge</h4>
        </div>
        <div class="modal-body">

            {!! Form::model($data, ['files'=>'true','method' => 'PATCH', 'route'=> ['admin-canvas-edge-update', $data->id]]) !!}
               @include('canvas_edge._form')
            {!! Form::close() !!}

        </div>
    </div>
</div>