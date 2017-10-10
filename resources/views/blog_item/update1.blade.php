<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Update Information</h4>
        </div>
        <div class="modal-body">

            {!! Form::model($data, ['method' => 'PATCH', 'route'=> ['blog_item-update', $data->id]]) !!}
               @include('blog_item._form')
            {!! Form::close() !!}

        </div>
    </div>
</div>