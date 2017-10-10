<div class="modal-dialog"  style="width: 75%;">
    <div class="modal-content">
        <div class="modal-header">
            {{--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>--}}
            <h4 class="modal-title">Update User Information</h4>
        </div>
        <div class="modal-body">

            {!! Form::model($data, ['method' => 'PATCH', 'route'=> ['user.update', $data->id]]) !!}
            @include('user.user_info.update_view')
            {!! Form::close() !!}

        </div>
    </div>
</div>