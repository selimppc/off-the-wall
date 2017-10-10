<div class="modal-dialog"  style="width: 75%;">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Update Image Size</h4>
        </div>
        <div class="modal-body">

            {!! Form::model($data, ['files'=>'true','method' => 'PATCH', 'route'=> ['admin-photo-frame-update', $data->id]]) !!}
               @include('photo_frame._form')
            {!! Form::close() !!}

        </div>
    </div>
</div>