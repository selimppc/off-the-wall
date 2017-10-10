<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Update Information</h4>
        </div>
        <div class="modal-body">

            {!! Form::model($data, ['method' => 'PATCH', 'route'=> ['crud-update', $data->id]]) !!}
               @include('crud._form')
            {!! Form::close() !!}

        </div>
    </div>
</div>