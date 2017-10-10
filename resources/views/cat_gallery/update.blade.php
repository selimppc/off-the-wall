<div class="modal-dialog" style="width: 75%;">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Update Information</h4>
        </div>
        <div class="modal-body">

            {!! Form::model($data, ['method' => 'PATCH', 'route'=> ['cat_gallery-update', $data->slug]]) !!}
               @include('cat_gallery._form')
            {!! Form::close() !!}

        </div>
    </div>
</div>