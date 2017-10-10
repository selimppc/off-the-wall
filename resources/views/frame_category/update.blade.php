<div class="modal-dialog"  style="width: 75%;">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Update Frame Category</h4>
        </div>
        <div class="modal-body">

            {!! Form::model($data, ['files'=>'true','method' => 'PATCH', 'route'=> ['admin-frame-category-update', $data->id]]) !!}
               @include('frame_category._form')
            {!! Form::close() !!}

        </div>
    </div>
</div>