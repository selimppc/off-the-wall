<div class="modal-dialog" style="width: 75%;">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Update Information</h4>
        </div>
        <div class="modal-body">

            {!! Form::model($data, ['method' => 'PATCH', 'route'=> ['blog_comment-update', $data->id]]) !!}
               @include('blog_comment._form')
            {!! Form::close() !!}

        </div>
    </div>
</div>